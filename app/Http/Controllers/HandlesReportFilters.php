<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

trait HandlesReportFilters
{
    protected function applyDateFilter($query, Request $request, string $column): void
    {
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween($column, [$request->from_date, $request->to_date]);
        }
    }

    protected function applyMonthFilter($query, Request $request): void
    {
        if ($request->filled('month') && $request->filled('year')) {
            $query->where('bulan', $request->month)->where('tahun', $request->year);
        }
    }

    protected function renderOrExport(Request $request, $query, array $config)
    {
        $view = $config['view'];
        $title = $config['title'];
        $subtitle = $config['subtitle'];
        $columns = $config['columns'];
        $exportClass = $config['exportClass'] ?? null;
        $filename = $config['filename'];
        $map = $config['map'];

        if ($download = $request->download) {
            $allData = $query->get();

            if ($download === 'xlsx' && $exportClass) {
                return Excel::download(
                    new $exportClass($request->from_date, $request->to_date, $request->month, $request->year),
                    $filename . '.xlsx'
                );
            }

            $rows = $allData->map(fn($r, $i) => $map($r, $i));
            $pdf = Pdf::loadView('pdf.report', compact('title', 'subtitle', 'columns', 'rows'));
            return $pdf->download($filename . '.pdf');
        }

        $data = $query->paginate(50)->withQueryString();
        return view($view, compact('data'));
    }
}
