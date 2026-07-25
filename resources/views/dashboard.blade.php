@extends('layouts.main')

@section('title', 'Dashboard - IT Inventory KITE PT Yupi Indo Jelly Gum Tbk')
@section('header-title', 'Dashboard Overview')

@section('content')
<div class="space-y-6">

    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-[#5eb3d6] to-[#4a9fc6] p-6 text-white shadow-md">
        <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="font-fredoka text-2xl md:text-3xl tracking-wide">IT INVENTORY - PT. YUPI INDO JELLY GUM</h2>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400 font-montserrat">Pemasukan Raw Material</p>
                    <h3 class="text-2xl font-bold text-slate-800 mt-1 font-montserrat">1,248 <span class="text-xs font-normal text-slate-500">dokumen</span></h3>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-[#00a351] flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            </div>
            <div class="mt-3 flex items-center text-xs text-emerald-600 font-medium">
                <span>↑ 12% dari bulan lalu</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400 font-montserrat">Pemakaian Bahan Baku</p>
                    <h3 class="text-2xl font-bold text-slate-800 mt-1 font-montserrat">856 <span class="text-xs font-normal text-slate-500">dokumen</span></h3>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-sky-50 text-[#4a9fc6] flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
            </div>
            <div class="mt-3 flex items-center text-xs text-slate-500 font-medium">
                <span>Diperbarui hari ini</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400 font-montserrat">Hasil Produksi</p>
                    <h3 class="text-2xl font-bold text-slate-800 mt-1 font-montserrat">3,420 <span class="text-xs font-normal text-slate-500">dokumen</span></h3>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-500 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            </div>
            <div class="mt-3 flex items-center text-xs text-emerald-600 font-medium">
                <span>↑ 5.4% dari bulan lalu</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400 font-montserrat">Pengeluaran (PEB)</p>
                    <h3 class="text-2xl font-bold text-slate-800 mt-1 font-montserrat">940 <span class="text-xs font-normal text-slate-500">dokumen</span></h3>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-3 flex items-center text-xs text-purple-600 font-medium">
                <span>Siap diexport</span>
            </div>
        </div>
    </div>


</div>
@endsection