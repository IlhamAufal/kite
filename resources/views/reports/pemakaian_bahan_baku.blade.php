@extends('layouts.main')

@section('title', 'Pemakaian Bahan Baku - KITE')
@section('header-title', 'Pemakaian Bahan Baku')

@section('content')
<div class="space-y-6">
    <div class="relative overflow-hidden rounded-2xl bg-blue-600 p-6 text-white shadow-md">
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
                <div class="relative" x-data="{ open: false }">
                    <!-- Tombol utama diubah menjadi tema hijau -->
                    <button @click="open = !open" class="px-4 py-2 bg-green-600 border border-transparent rounded-lg text-xs font-medium text-white hover:bg-green-700 transition flex items-center gap-1.5 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        Download
                    </button>
                    
                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-44 bg-white rounded-xl border border-slate-200 shadow-lg z-50">
                        <!-- Efek hover pada dropdown disesuaikan menjadi nuansa hijau -->
                        <a href="{{ route('reports.pemakaian-bahan-baku', array_merge(request()->query(), ['download' => 'xlsx'])) }}" class="block px-4 py-2.5 text-xs text-slate-600 hover:bg-green-50 hover:text-green-700 transition-colors rounded-t-xl">Microsoft Excel (.xlsx)</a>
                        <a href="{{ route('reports.pemakaian-bahan-baku', array_merge(request()->query(), ['download' => 'pdf'])) }}" class="block px-4 py-2.5 text-xs text-slate-600 hover:bg-green-50 hover:text-green-700 transition-colors rounded-b-xl">PDF Document (.pdf)</a>
                    </div>
                </div>
            </div>
            <div class="table-wrap p-6">
                <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 font-bold font-montserrat text-[10px] tracking-wider text-slate-800">
                    <!-- Baris 1: Header Utama / Group Header -->
                    <tr class="text-center">
                        <th rowspan="2" class="px-4 py-3 rounded-l-xl align-middle">No</th>
                        
                        <!-- Group Bukti Pengeluaran (2 Sub-kolom) -->
                        <th colspan="2" class="px-4 py-2 border-b border-slate-200">Bukti Pengeluaran</th>
                        
                        <th rowspan="2" class="px-4 py-3 align-middle">Kode Barang</th>
                        <th rowspan="2" class="px-4 py-3 align-middle">Nama Barang</th>
                        <th rowspan="2" class="px-4 py-3 align-middle">Satuan</th>
                        
                        <!-- Group Jumlah (2 Sub-kolom) -->
                        <th colspan="2" class="px-4 py-2 border-b border-slate-200">Jumlah</th>
                        
                        <th rowspan="2" class="px-4 py-3 align-middle">Gudang</th>
                        <th rowspan="2" class="px-4 py-3 rounded-r-xl align-middle">Penerima Subkontrak</th>
                    </tr>

                    <!-- Baris 2: Sub-Header -->
                    <tr class="text-center">
                        <!-- Sub-kolom Bukti Pengeluaran -->
                        <th class="px-4 py-2 border-r border-slate-200/50">Nomor</th>
                        <th class="px-4 py-2 border-r border-slate-200/50">Tanggal</th>

                        <!-- Sub-kolom Jumlah -->
                        <th class="px-4 py-2 text-right border-r border-slate-200/50">Digunakan</th>
                        <th class="px-4 py-2 text-right">Disubkontrakkan</th>
                    </tr>
                </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($data as $i => $row)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-4 py-3 text-slate-400">{{ ($data->currentPage() - 1) * $data->perPage() + $i + 1 }}</td>
                                <td class="px-4 py-3">{{ $row->no_pengeluaran }}</td>
                                <td class="px-4 py-3">{{ $row->tgl_pengeluaran?->format('d/m/Y') }}</td>
                                <td class="px-4 py-3 font-medium text-slate-700">{{ $row->id_product }}</td>
                                <td class="px-4 py-3">{{ $row->name_product }}</td>
                                <td class="px-4 py-3 text-center">{{ $row->uom }}</td>
                                <td class="px-4 py-3 text-right font-mono">{{ number_format($row->qty_usage, 4) }}</td>
                                <td class="px-4 py-3 text-right font-mono">{{ number_format($row->jumlah_disubkontrakkan, 4) }}</td>
                                <td class="px-4 py-3">{{ $row->penerima_subkontrak }}</td>
                                <td class="px-4 py-3 text-center">{{ $row->warehouse }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="px-4 py-12 text-center text-slate-400">
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
