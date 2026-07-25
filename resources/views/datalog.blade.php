@extends('layouts.main')

@section('title', 'Data Log System - KITE')
@section('header-title', 'Data Log')

@section('content')
<div class="space-y-6">
    <div class="relative overflow-hidden rounded-2xl bg-blue-600 p-6 text-white shadow-md">
        <h2 class="font-fredoka text-xl tracking-wide">Data Log System</h2>
        <p class="text-sky-100 text-xs mt-1">Riwayat aktivitas login pengguna ke sistem</p>
    </div>

    @include('layouts.partials.report_filter', [
        'actionUrl' => route('datalog'),
        'filterType' => 'date',
    ])

    @if(isset($logs))
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <h3 class="font-montserrat font-bold text-slate-700 text-sm">
                    Hasil Pencarian
                    <span class="text-slate-400 font-normal">({{ $logs->total() ?? 0 }} data)</span>
                </h3>
                <div class="relative" x-data="{ open: false }">
                    <!-- Tombol utama diubah menjadi tema hijau -->
                    <button @click="open = !open" class="px-4 py-2 bg-green-600 border border-transparent rounded-lg text-xs font-medium text-white hover:bg-green-700 transition flex items-center gap-1.5 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        Download
                    </button>
                    
                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-44 bg-white rounded-xl border border-slate-200 shadow-lg z-50">
                        <!-- Efek hover pada dropdown disesuaikan menjadi nuansa hijau -->
                        <a href="{{ route('datalog', array_merge(request()->query(), ['download' => 'xlsx'])) }}" class="block px-4 py-2.5 text-xs text-slate-600 hover:bg-green-50 hover:text-green-700 transition-colors rounded-t-xl">Microsoft Excel (.xlsx)</a>
                        <a href="{{ route('datalog', array_merge(request()->query(), ['download' => 'pdf'])) }}" class="block px-4 py-2.5 text-xs text-slate-600 hover:bg-green-50 hover:text-green-700 transition-colors rounded-b-xl">PDF Document (.pdf)</a>
                    </div>
                </div>
            </div>
            <div class="table-wrap p-6">
                <table class="w-full text-left text-xs text-slate-600">
                    <thead class="bg-slate-50 font-bold font-montserrat text-[10px] tracking-wider text-slate-800">
                        <tr>
                            <th class="px-4 py-3 rounded-l-xl">No</th>
                            <th class="px-4 py-3">User ID</th>
                            <th class="px-4 py-3">Login Date</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">IP Address</th>
                            <th class="px-4 py-3 rounded-r-xl">User Agent</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($logs as $index => $row)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-4 py-3 text-slate-400">{{ ($logs->currentPage() - 1) * $logs->perPage() + $index + 1 }}</td>
                                <td class="px-4 py-3 font-medium text-slate-700">{{ $row->userid }}</td>
                                <td class="px-4 py-3">{{ \Carbon\Carbon::parse($row->login_at)->format('d/m/Y H:i') }}</td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium {{ strtolower($row->status) === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ $row->status }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 font-mono text-[11px]">{{ $row->ip_address }}</td>
                                <td class="px-4 py-3 text-slate-400 max-w-[200px] truncate" title="{{ $row->user_agent }}">{{ $row->user_agent }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-12 text-center text-slate-400">
                                    Tidak ada data untuk filter yang dipilih.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if(isset($logs) && $logs->hasPages())
                <div class="px-6 py-4 border-t border-slate-100">
                    {{ $logs->withQueryString()->links() }}
                </div>
            @endif
        </div>
    @endif
</div>
@endsection
