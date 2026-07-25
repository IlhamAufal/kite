@extends('layouts.main')

@section('title', 'Dashboard - KITE')
@section('header-title', 'IT INVENTORY - PT. YUPI INDO JELLY GUM')

@section('content')
<div class="space-y-6">
    <div class="relative overflow-hidden rounded-2xl bg-blue-600 p-6 text-white shadow-md">
        <h2 class="font-fredoka text-xl tracking-wide">Dashboard</h2>
        <p class="text-sky-100 text-xs mt-1">Sistem Pelaporan dan Pencatatan Persediaan Barang</p>
    </div>

    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 space-y-3">
        <div class="flex items-center gap-2 border-b border-slate-100 pb-3">
            <div class="p-2 bg-blue-50 text-blue-600 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h2 class="font-bold text-slate-800 text-sm">Selamat Datang</h2>
        </div>
        <div class="text-xs text-slate-600 leading-relaxed space-y-2">
            <p>Selamat datang di halaman <strong class="text-slate-800">IT Inventory</strong> PT. YUPI INDO JELLY GUM.</p>
            <p>Untuk melihat <strong class="text-slate-800">Laporan</strong>, silahkan klik menu <strong class="text-slate-800">Reports</strong> yang ada di sebelah kiri halaman.</p>
            <p>Lalu pilih rentang tanggal / waktu tertentu, dan tekan tombol <span class="px-2 py-0.5 bg-slate-100 text-slate-700 font-semibold rounded text-[11px]">Search</span>.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 space-y-4">
        <div class="flex items-center gap-2 border-b border-slate-100 pb-3">
            <div class="p-2 bg-green-50 text-green-600 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                </svg>
            </div>
            <h2 class="font-bold text-slate-800 text-sm">Pintasan Halaman Report</h2>
        </div>

        <div class="flex flex-wrap gap-2.5">
            <a href="{{ route('reports.pemasukan-bahan-baku') }}" class="px-3.5 py-2 bg-slate-100 hover:bg-green-600 hover:text-white text-slate-700 text-xs font-medium rounded-lg transition-all shadow-sm">Pemasukan Bahan Baku</a>
            <a href="{{ route('reports.pemakaian-bahan-baku') }}" class="px-3.5 py-2 bg-slate-100 hover:bg-green-600 hover:text-white text-slate-700 text-xs font-medium rounded-lg transition-all shadow-sm">Pemakaian Bahan Baku</a>
            <a href="{{ route('reports.mutasi-bahan-baku') }}" class="px-3.5 py-2 bg-slate-100 hover:bg-green-600 hover:text-white text-slate-700 text-xs font-medium rounded-lg transition-all shadow-sm">Mutasi Bahan Baku</a>
            <a href="{{ route('reports.pemasukan-hasil-produksi') }}" class="px-3.5 py-2 bg-slate-100 hover:bg-green-600 hover:text-white text-slate-700 text-xs font-medium rounded-lg transition-all shadow-sm">Pemasukan Hasil Produksi</a>
            <a href="{{ route('reports.pengeluaran-hasil-produksi') }}" class="px-3.5 py-2 bg-slate-100 hover:bg-green-600 hover:text-white text-slate-700 text-xs font-medium rounded-lg transition-all shadow-sm">Pengeluaran Hasil Produksi</a>
            <a href="{{ route('reports.mutasi-hasil-produksi') }}" class="px-3.5 py-2 bg-slate-100 hover:bg-green-600 hover:text-white text-slate-700 text-xs font-medium rounded-lg transition-all shadow-sm">Mutasi Hasil Produksi</a>
            <a href="{{ route('reports.pencatatan-penyesuaian') }}" class="px-3.5 py-2 bg-slate-100 hover:bg-green-600 hover:text-white text-slate-700 text-xs font-medium rounded-lg transition-all shadow-sm">Pencatatan Penyesuaian</a>
            <a href="{{ route('reports.peb-change-log') }}" class="px-3.5 py-2 bg-slate-100 hover:bg-green-600 hover:text-white text-slate-700 text-xs font-medium rounded-lg transition-all shadow-sm">PEB Change Log</a>
            <a href="{{ route('datalog') }}" class="px-3.5 py-2 bg-slate-100 hover:bg-green-600 hover:text-white text-slate-700 text-xs font-medium rounded-lg transition-all shadow-sm">Data Log</a>
        </div>
    </div>
</div>
@endsection
