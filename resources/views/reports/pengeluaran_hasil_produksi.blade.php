@extends('layouts.main')

@section('title', 'Pengeluaran Hasil Produksi - KITE')
@section('header-title', 'Pengeluaran Hasil Produksi')

@section('content')
<div class="space-y-6">
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-[#5eb3d6] to-[#4a9fc6] p-6 text-white shadow-md">
        <h2 class="font-fredoka text-xl tracking-wide">Laporan Pengeluaran Hasil Produksi</h2>
        <p class="text-sky-100 text-xs mt-1">Data barang jadi diekspor (PEB)</p>
    </div>

    @include('layouts.partials.report_filter', [
        'actionUrl' => route('reports.pengeluaran-hasil-produksi'),
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
                    <thead class="bg-slate-50 text-slate-500 uppercase font-montserrat text-[10px] tracking-wider">
                        <tr>
                            <th class="px-4 py-3 rounded-l-xl">No</th>
                            <th class="px-4 py-3">Key Number</th>
                            <th class="px-4 py-3">No PEB</th>
                            <th class="px-4 py-3">Tgl PEB</th>
                            <th class="px-4 py-3">Packing Slip</th>
                            <th class="px-4 py-3">Tgl Pengeluaran</th>
                            <th class="px-4 py-3">Pembeli</th>
                            <th class="px-4 py-3">Negara Tujuan</th>
                            <th class="px-4 py-3">Kode Barang</th>
                            <th class="px-4 py-3">Nama Barang</th>
                            <th class="px-4 py-3">Satuan</th>
                            <th class="px-4 py-3 text-right">Jumlah</th>
                            <th class="px-4 py-3">Mata Uang</th>
                            <th class="px-4 py-3 text-right">Nilai Barang</th>
                            <th class="px-4 py-3 text-right">Net Weight</th>
                            <th class="px-4 py-3 text-right">Gross Weight</th>
                            <th class="px-4 py-3 rounded-r-xl text-right">Total Kg Net</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($data as $i => $row)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-4 py-3 text-slate-400">{{ ($data->currentPage() - 1) * $data->perPage() + $i + 1 }}</td>
                                <td class="px-4 py-3 font-medium text-slate-700">{{ $row->key_number }}</td>
                                <td class="px-4 py-3">{{ $row->peb_nomor }}</td>
                                <td class="px-4 py-3">{{ $row->peb_tanggal?->format('d/m/Y') }}</td>
                                <td class="px-4 py-3">{{ $row->bk_pengeluaran_nomor }}</td>
                                <td class="px-4 py-3">{{ $row->bk_pengeluaran_tanggal?->format('d/m/Y') }}</td>
                                <td class="px-4 py-3">{{ $row->pembeli }}</td>
                                <td class="px-4 py-3">{{ $row->negara_tujuan }}</td>
                                <td class="px-4 py-3 font-medium text-slate-700">{{ $row->kode_barang }}</td>
                                <td class="px-4 py-3">{{ $row->nama_barang }}</td>
                                <td class="px-4 py-3 text-center">{{ $row->satuan }}</td>
                                <td class="px-4 py-3 text-right font-mono">{{ number_format($row->jumlah, 4) }}</td>
                                <td class="px-4 py-3 text-center">{{ $row->mata_uang }}</td>
                                <td class="px-4 py-3 text-right font-mono">{{ number_format($row->nilai_barang, 2) }}</td>
                                <td class="px-4 py-3 text-right font-mono">{{ number_format($row->net_weight, 4) }}</td>
                                <td class="px-4 py-3 text-right font-mono">{{ number_format($row->gross_weight, 4) }}</td>
                                <td class="px-4 py-3 text-right font-mono font-bold">{{ number_format($row->total_kg_net, 4) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="17" class="px-4 py-12 text-center text-slate-400">
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
