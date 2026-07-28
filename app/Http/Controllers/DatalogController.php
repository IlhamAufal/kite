<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatalogController extends Controller
{
    use HandlesReportFilters;

    public function index(Request $request)
    {
        $query = DB::table('loguser');
        $this->applyDateFilter($query, $request, 'login_at');

        return $this->renderOrExport($request, $query->orderBy('login_at', 'desc'), [
            'view' => 'datalog',
            'title' => 'Data Log System',
            'subtitle' => 'Riwayat aktivitas login pengguna ke sistem',
            'columns' => ['No', 'User ID', 'Login Date', 'Status', 'IP Address', 'User Agent'],
            'exportClass' => \App\Exports\DatalogExport::class,
            'filename' => 'datalog',
            'map' => fn($r, $i) => [
                $i + 1,
                $r->userid,
                \Carbon\Carbon::parse($r->login_at)->format('d/m/Y H:i'),
                $r->status,
                $r->ip_address,
                $r->user_agent,
            ],
        ]);
    }
}
