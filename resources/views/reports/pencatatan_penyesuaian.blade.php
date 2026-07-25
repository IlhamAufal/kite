@extends('layouts.main')

@section('title', 'Pencatatan Penyesuaian - KITE')
@section('header-title', 'Pencatatan Penyesuaian')

@section('content')
<div class="space-y-6">
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-[#5eb3d6] to-[#4a9fc6] p-6 text-white shadow-md">
        <h2 class="font-fredoka text-xl tracking-wide">Laporan Pencatatan Penyesuaian</h2>
        <p class="text-sky-100 text-xs mt-1">Koreksi/perubahan dokumen PEB</p>
    </div>

    @include('layouts.partials.report_filter', [
        'actionUrl' => route('reports.pencatatan-penyesuaian'),
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
                            <!-- <th class="px-4 py-3">Key Number</th> -->
                            <th class="px-4 py-3">PEB Baru</th>
                            <th class="px-4 py-3">PEB Lama</th>
                            <th class="px-4 py-3">Packing Slip</th>
                            <th class="px-4 py-3">Delivery Date</th>
                            <th class="px-4 py-3">Pembeli</th>
                            <th class="px-4 py-3">Negara</th>
                            <th class="px-4 py-3">Kode Barang</th>
                            <th class="px-4 py-3">Nama Barang</th>
                            <th class="px-4 py-3">Satuan</th>
                            <th class="px-4 py-3 text-right">Jumlah</th>
                            <th class="px-4 py-3">Mata Uang</th>
                            <th class="px-4 py-3 rounded-r-xl text-right">Nilai</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($data as $i => $row)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-4 py-3 text-slate-400">{{ ($data->currentPage() - 1) * $data->perPage() + $i + 1 }}</td>
                                <!-- <td class="px-4 py-3 font-medium text-slate-700">{{ $row->key_number }}</td> -->
                                <td class="px-4 py-3">{{ $row->peb_baru }}</td>
                                <td class="px-4 py-3">{{ $row->peb_lama }}</td>
                                <td class="px-4 py-3">{{ $row->packingslipid }}</td>
                                <td class="px-4 py-3">{{ $row->delivery_date?->format('d/m/Y') }}</td>
                                <td class="px-4 py-3">{{ $row->cust_name }}</td>
                                <td class="px-4 py-3">{{ $row->county }}</td>
                                <td class="px-4 py-3 font-medium text-slate-700">{{ $row->item_id }}</td>
                                <td class="px-4 py-3">{{ $row->item_name }}</td>
                                <td class="px-4 py-3 text-center">{{ $row->unit }}</td>
                                <td class="px-4 py-3 text-right font-mono">{{ number_format($row->qty, 4) }}</td>
                                <td class="px-4 py-3 text-center">{{ $row->currency_code }}</td>
                                <td class="px-4 py-3 text-right font-mono">{{ number_format($row->amount, 4) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="14" class="px-4 py-12 text-center text-slate-400">
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
