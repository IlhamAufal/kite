@extends('layouts.main')

@section('title', 'Mutasi Bahan Baku - KITE')
@section('header-title', 'Mutasi Bahan Baku')

@section('content')
<div class="space-y-6">
    <div class="relative overflow-hidden rounded-2xl bg-blue-600 p-6 text-white shadow-md">
        <h2 class="font-fredoka text-xl tracking-wide">Laporan Mutasi Bahan Baku</h2>
        <p class="text-sky-100 text-xs mt-1">Saldo bulanan bahan baku (awal + masuk - keluar = akhir)</p>
    </div>

    @include('layouts.partials.report_filter', [
        'actionUrl' => route('reports.mutasi-bahan-baku'),
        'filterType' => 'month',
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
                        <a href="{{ route('reports.mutasi-bahan-baku', array_merge(request()->query(), ['download' => 'xlsx'])) }}" class="block px-4 py-2.5 text-xs text-slate-600 hover:bg-green-50 hover:text-green-700 transition-colors rounded-t-xl">Microsoft Excel (.xlsx)</a>
                        <a href="{{ route('reports.mutasi-bahan-baku', array_merge(request()->query(), ['download' => 'pdf'])) }}" class="block px-4 py-2.5 text-xs text-slate-600 hover:bg-green-50 hover:text-green-700 transition-colors rounded-b-xl">PDF Document (.pdf)</a>
                    </div>
                </div>
            </div>
            <div class="table-wrap p-6">
                <table class="w-full text-left text-xs text-slate-600">
                    <thead class="bg-slate-50 font-bold font-montserrat text-[10px] tracking-wider text-slate-800">
                        <tr class="text-center">
                            <th rowspan="2" class="px-4 py-3 rounded-l-xl align-middle">No</th>
                            <th rowspan="2" class="px-4 py-3 align-middle">Kode Barang</th>
                            <th rowspan="2" class="px-4 py-3 align-middle">Nama Barang</th>
                            <th rowspan="2" class="px-4 py-3 align-middle">Satuan</th>
                            <th rowspan="2" class="px-4 py-3 text-right align-middle">Saldo Awal</th>

                            <th colspan="2" class="px-4 py-2 border-b border-slate-200">Pemasukan</th>
                            <th colspan="2" class="px-4 py-2 border-b border-slate-200">Pengeluaran</th>

                            <th rowspan="2" class="px-4 py-3 text-right align-middle">Saldo Akhir</th>
                            <th rowspan="2" class="px-4 py-3 rounded-r-xl align-middle">Gudang</th>
                        </tr>
                        <tr class="text-center">
                            <th class="px-4 py-2 border-r border-slate-200/50 text-right">Pemasukan</th>
                            <th class="px-4 py-2 border-r border-slate-200/50 text-right">Lain</th>
                            <th class="px-4 py-2 border-r border-slate-200/50 text-right">Pengeluaran</th>
                            <th class="px-4 py-2 text-right">Lain</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($data as $i => $row)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-4 py-3 text-slate-400">{{ ($data->currentPage() - 1) * $data->perPage() + $i + 1 }}</td>
                                <td class="px-4 py-3 font-medium text-slate-700">{{ $row->kode_barang }}</td>
                                <td class="px-4 py-3">{{ $row->nama_barang }}</td>
                                <td class="px-4 py-3 text-center">{{ $row->satuan }}</td>
                                <td class="px-4 py-3 text-right font-mono">{{ number_format($row->saldo_awal, 4) }}</td>
                                <td class="px-4 py-3 text-right font-mono text-emerald-600">{{ number_format($row->pemasukan, 4) }}</td>
                                <td class="px-4 py-3 text-right font-mono text-emerald-600">{{ number_format($row->pemasukan_lain, 4) }}</td>
                                <td class="px-4 py-3 text-right font-mono text-red-500">{{ number_format($row->pengeluaran, 4) }}</td>
                                <td class="px-4 py-3 text-right font-mono text-red-500">{{ number_format($row->pengeluaran_lain, 4) }}</td>
                                <td class="px-4 py-3 text-right font-mono font-bold">{{ number_format($row->saldo_akhir, 4) }}</td>
                                <td class="px-4 py-3 text-center">{{ $row->gudang }}</td>
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
