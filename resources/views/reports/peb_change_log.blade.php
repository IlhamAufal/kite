@extends('layouts.main')

@section('title', 'PEB Change Log - KITE')
@section('header-title', 'PEB Change Log')

@section('content')
<div class="space-y-6">
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-[#5eb3d6] to-[#4a9fc6] p-6 text-white shadow-md">
        <h2 class="font-fredoka text-xl tracking-wide">Laporan PEB Change Log</h2>
        <p class="text-sky-100 text-xs mt-1">History perubahan dokumen PEB</p>
    </div>

    @include('layouts.partials.report_filter', [
        'actionUrl' => route('reports.peb-change-log'),
        'filterType' => 'date',
    ])

    @if(isset($data))
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <h3 class="font-montserrat font-bold text-slate-700 text-sm">
                    Hasil Pencarian
                    <span class="text-slate-400 font-normal">({{ $data->total() ?? 0 }} data)</span>
                </h3>
            </div>
            <div class="table-wrap p-6">
                <table class="w-full text-left text-xs text-slate-600">
                    <thead class="bg-slate-50 font-bold font-montserrat text-[10px] tracking-wider text-slate-800">
                        <tr>
                            <th class="px-4 py-3 rounded-l-xl">No</th>
                            <th class="px-4 py-3">Datetime Change</th>
                            <th class="px-4 py-3">Internal Packing Slip</th>
                            <th class="px-4 py-3">Packing Slip ID</th>
                            <th class="px-4 py-3">PEB Date Baru</th>
                            <th class="px-4 py-3">PEB Date Lama</th>
                            <th class="px-4 py-3">User ID</th>
                            <th class="px-4 py-3">Data Area</th>
                            <th class="px-4 py-3 text-right">Rec Version</th>
                            <th class="px-4 py-3">Partition</th>
                            <th class="px-4 py-3 rounded-r-xl">Rec ID</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($data as $i => $row)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-4 py-3 text-slate-400">{{ ($data->currentPage() - 1) * $data->perPage() + $i + 1 }}</td>
                                <td class="px-4 py-3">{{ $row->datetimechange?->format('d/m/Y H:i:s') }}</td>
                                <td class="px-4 py-3">{{ $row->internalpackingslipid }}</td>
                                <td class="px-4 py-3">{{ $row->packingslipid }}</td>
                                <td class="px-4 py-3">{{ $row->pebdatebaru?->format('d/m/Y') }}</td>
                                <td class="px-4 py-3">{{ $row->pebdatelama?->format('d/m/Y') }}</td>
                                <td class="px-4 py-3 font-medium text-slate-700">{{ $row->userid }}</td>
                                <td class="px-4 py-3 text-center">{{ $row->dataareaid }}</td>
                                <td class="px-4 py-3 text-right font-mono">{{ $row->recversion }}</td>
                                <td class="px-4 py-3">{{ $row->partition_col }}</td>
                                <td class="px-4 py-3 font-mono text-slate-500">{{ $row->recid }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="px-4 py-12 text-center text-slate-400">
                                    Tidak ada data untuk filter yang dipilih.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if(isset($data) && $data->hasPages())
                <div class="px-6 py-4 border-t border-slate-100">
                    {{ $data->withQueryString()->links() }}
                </div>
            @endif
        </div>
    @endif
</div>
@endsection
