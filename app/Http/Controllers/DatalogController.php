<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('loguser')
            ->orderBy('login_at', 'DESC');

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('login_at', [$request->from_date, $request->to_date]);
        }

        if ($download = $request->download) {
            $logs = $query->get();
            if ($download === 'xlsx') {
                return Excel::download(new \App\Exports\DatalogExport($request->from_date, $request->to_date), 'datalog.xlsx');
            }
            $rows = $logs->map(fn($r, $i) => [
                $i + 1,
                $r->userid,
                \Carbon\Carbon::parse($r->login_at)->format('d/m/Y H:i'),
                $r->status,
                $r->ip_address,
                $r->user_agent,
            ]);
            $pdf = Pdf::loadView('pdf.report', [
                'title' => 'Data Log System',
                'subtitle' => 'Riwayat aktivitas login pengguna ke sistem',
                'columns' => ['No', 'User ID', 'Login Date', 'Status', 'IP Address', 'User Agent'],
                'rows' => $rows,
            ]);
            return $pdf->download('datalog.pdf');
        }

        $logs = $query->paginate(50)->withQueryString();

        return view('datalog', compact('logs'));
    }
}