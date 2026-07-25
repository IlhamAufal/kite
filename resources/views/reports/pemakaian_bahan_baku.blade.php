@extends('layouts.main')

@section('title', 'Pemakaian Bahan Baku - KITE')
@section('header-title', 'Pemakaian Bahan Baku')

@section('content')
<div class="space-y-6">
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-[#5eb3d6] to-[#4a9fc6] p-6 text-white shadow-md">
        <h2 class="font-fredoka text-xl tracking-wide">Laporan Pemakaian Bahan Baku</h2>
        <p class="text-sky-100 text-xs mt-1">Data pemakaian bahan baku di produksi</p>
    </div>

    @include('layouts.partials.report_filter', [
        'actionUrl' => route('reports.pemakaian-bahan-baku'),
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
                            <th class="px-4 py-3">Key Number</th>
                            <th class="px-4 py-3">Bukti Pengeluaran Nomor</th>
                            <th class="px-4 py-3">Bukti Pengeluaran Tanggal</th>
                            <th class="px-4 py-3">Kode Barang</th>
                            <th class="px-4 py-3">Nama Barang</th>
                            <th class="px-4 py-3">Satuan</th>
                            <th class="px-4 py-3 text-right">Jumlah Digunakan</th>
                            <th class="px-4 py-3 rounded-r-xl">Gudang</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($data as $i => $row)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-4 py-3 text-slate-400">{{ ($data->currentPage() - 1) * $data->perPage() + $i + 1 }}</td>
                                <td class="px-4 py-3 font-medium text-slate-700">{{ $row->key_number }}</td>
                                <td class="px-4 py-3">{{ $row->no_pengeluaran }}</td>
                                <td class="px-4 py-3">{{ $row->tgl_pengeluaran?->format('d/m/Y') }}</td>
                                <td class="px-4 py-3 font-medium text-slate-700">{{ $row->id_product }}</td>
                                <td class="px-4 py-3">{{ $row->name_product }}</td>
                                <td class="px-4 py-3 text-center">{{ $row->uom }}</td>
                                <td class="px-4 py-3 text-right font-mono">{{ number_format($row->qty_usage, 4) }}</td>
                                <td class="px-4 py-3 text-center">{{ $row->warehouse }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-4 py-12 text-center text-slate-400">
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
