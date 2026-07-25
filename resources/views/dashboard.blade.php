@extends('layout.main')

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
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-[#00a351] flex items-center justify-center text-xl font-bold">
                    📥
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
                <div class="w-12 h-12 rounded-2xl bg-sky-50 text-[#4a9fc6] flex items-center justify-center text-xl font-bold">
                    🏭
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
                <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-500 flex items-center justify-center text-xl font-bold">
                    📦
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
                <div class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl font-bold">
                    🚢
                </div>
            </div>
            <div class="mt-3 flex items-center text-xs text-purple-600 font-medium">
                <span>Siap diexport</span>
            </div>
        </div>
    </div>


</div>
@endsection