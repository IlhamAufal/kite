@extends('layouts.main')

@section('title', 'Pengeluaran Hasil Produksi - KITE')
@section('header-title', 'Pengeluaran Hasil Produksi')

@section('content')
<div class="space-y-6">
    <div class="relative overflow-hidden rounded-2xl bg-blue-600 p-6 text-white shadow-md">
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
                <div class="relative" x-data="{ open: false }">
                    <!-- Tombol utama diubah menjadi tema hijau -->
                    <button @click="open = !open" class="px-4 py-2 bg-green-600 border border-transparent rounded-lg text-xs font-medium text-white hover:bg-green-700 transition flex items-center gap-1.5 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        Download
                    </button>
                    
                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-44 bg-white rounded-xl border border-slate-200 shadow-lg z-50">
                        <!-- Efek hover pada dropdown disesuaikan menjadi nuansa hijau -->
                        <a href="{{ route('reports.pengeluaran-hasil-produksi', array_merge(request()->query(), ['download' => 'xlsx'])) }}" class="block px-4 py-2.5 text-xs text-slate-600 hover:bg-green-50 hover:text-green-700 transition-colors rounded-t-xl">Microsoft Excel (.xlsx)</a>
                        <a href="{{ route('reports.pengeluaran-hasil-produksi', array_merge(request()->query(), ['download' => 'pdf'])) }}" class="block px-4 py-2.5 text-xs text-slate-600 hover:bg-green-50 hover:text-green-700 transition-colors rounded-b-xl">PDF Document (.pdf)</a>
                    </div>
                </div>
            </div>
            <div class="table-wrap p-6">
                <table class="w-full text-left text-xs text-slate-600">
                    <thead class="bg-slate-50 font-bold font-montserrat text-[10px] tracking-wider text-slate-800">
                        <tr class="text-center">
                            <th rowspan="2" class="px-4 py-3 rounded-l-xl align-middle">No</th>

                            <th colspan="2" class="px-4 py-2 border-b border-slate-200">PEB</th>

                            <th colspan="2" class="px-4 py-2 border-b border-slate-200">Bukti Pengeluaran</th>

                            <th rowspan="2" class="px-4 py-3 align-middle">Pembeli/Penerima</th>
                            <th rowspan="2" class="px-4 py-3 align-middle">Negara Tujuan</th>

                            <th colspan="2" class="px-4 py-2 border-b border-slate-200">Barang</th>

                            <th rowspan="2" class="px-4 py-3 align-middle">Satuan</th>
                            <th rowspan="2" class="px-4 py-3 text-right align-middle">Jumlah</th>

                            <th colspan="2" class="px-4 py-2 border-b border-slate-200">Nilai</th>

                            <th colspan="4" class="px-4 py-2 border-b border-slate-200">Berat</th>
                        </tr>

                        <tr class="text-center">
                            <th class="px-4 py-2 border-r border-slate-200/50">Nomor</th>
                            <th class="px-4 py-2 border-r border-slate-200/50">Tanggal</th>

                            <th class="px-4 py-2 border-r border-slate-200/50">Nomor</th>
                            <th class="px-4 py-2 border-r border-slate-200/50">Tanggal</th>

                            <th class="px-4 py-2 border-r border-slate-200/50">Kode</th>
                            <th class="px-4 py-2 border-r border-slate-200/50">Nama</th>

                            <th class="px-4 py-2 border-r border-slate-200/50">Mata Uang</th>
                            <th class="px-4 py-2 border-r border-slate-200/50 text-right">Nilai Barang</th>

                            <th class="px-4 py-2 border-r border-slate-200/50 text-right">Net Weight</th>
                            <th class="px-4 py-2 border-r border-slate-200/50 text-right">Gross Weight</th>
                            <th class="px-4 py-2 border-r border-slate-200/50 text-right">Total Kg Net</th>
                            <th class="px-4 py-2 text-right">Total Kg Gross</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($data as $i => $row)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-4 py-3 text-slate-400">{{ ($data->currentPage() - 1) * $data->perPage() + $i + 1 }}</td>
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
                                <td class="px-4 py-3 text-right font-mono">{{ number_format($row->total_kg_net, 4) }}</td>
                                <td class="px-4 py-3 text-right font-mono font-bold">{{ number_format($row->total_kg_gross, 4) }}</td>
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
