@extends('layout.main')

@section('title', 'Dashboard - IT Inventory KITE PT Yupi Indo Jelly Gum Tbk')
@section('header-title', 'Dashboard Overview')

@section('content')
<div class="space-y-6">

    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-[#5eb3d6] to-[#4a9fc6] p-6 text-white shadow-md">
        <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="font-fredoka text-2xl md:text-3xl tracking-wide">Selamat Datang di IT Inventory KITE! 👋</h2>
                <p class="text-sky-100 text-sm mt-1">Sistem Pemantauan & Pelaporan Fasilitas KITE PT. Yupi Indo Jelly Gum Tbk</p>
            </div>
            <div class="flex items-center space-x-2 bg-white/20 backdrop-blur-md px-4 py-2 rounded-xl text-xs font-medium">
                <span class="w-2.5 h-2.5 bg-emerald-400 rounded-full animate-ping"></span>
                <span>System Status: Active</span>
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

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="font-montserrat font-bold text-slate-800 text-base mb-4 flex items-center">
                <span class="mr-2">🔗</span> Status Integrasi System
            </h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50">
                    <div class="flex items-center space-x-3">
                        <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                        <div>
                            <p class="text-xs font-semibold text-slate-700">SAP S/4HANA Cloud</p>
                            <p class="text-[10px] text-slate-400">OData API Sync</p>
                        </div>
                    </div>
                    <span class="text-[11px] font-semibold bg-emerald-100 text-emerald-700 px-2.5 py-1 rounded-lg">Connected</span>
                </div>

                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50">
                    <div class="flex items-center space-x-3">
                        <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                        <div>
                            <p class="text-xs font-semibold text-slate-700">AX ERP (SQL Server)</p>
                            <p class="text-[10px] text-slate-400">Legacy DB Sync</p>
                        </div>
                    </div>
                    <span class="text-[11px] font-semibold bg-emerald-100 text-emerald-700 px-2.5 py-1 rounded-lg">Connected</span>
                </div>

                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50">
                    <div class="flex items-center space-x-3">
                        <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                        <div>
                            <p class="text-xs font-semibold text-slate-700">AWS SES Mailer</p>
                            <p class="text-[10px] text-slate-400">Automated Email Report</p>
                        </div>
                    </div>
                    <span class="text-[11px] font-semibold bg-emerald-100 text-emerald-700 px-2.5 py-1 rounded-lg">Ready</span>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2 bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-montserrat font-bold text-slate-800 text-base flex items-center">
                    <span class="mr-2">📋</span> Log Aktivitas Terakhir
                </h3>
                <a href="#" class="text-xs font-semibold text-[#00a351] hover:underline">Lihat Semua →</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-600">
                    <thead class="bg-slate-50 text-slate-500 uppercase font-montserrat text-[10px] tracking-wider">
                        <tr>
                            <th class="px-4 py-3 rounded-l-xl">Waktu</th>
                            <th class="px-4 py-3">Modul / Event</th>
                            <th class="px-4 py-3">Pengguna</th>
                            <th class="px-4 py-3 rounded-r-xl">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <tr>
                            <td class="px-4 py-3 text-slate-400">{{ date('H:i') }} WIB</td>
                            <td class="px-4 py-3 font-medium text-slate-700">Pemasukan Bahan Baku (PIB)</td>
                            <td class="px-4 py-3">System Auto-Sync</td>
                            <td class="px-4 py-3">
                                <span class="bg-emerald-50 text-emerald-600 px-2 py-0.5 rounded-md font-semibold text-[10px]">SUCCESS</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-slate-400">{{ date('H:i', strtotime('-15 mins')) }} WIB</td>
                            <td class="px-4 py-3 font-medium text-slate-700">PEB Change Log</td>
                            <td class="px-4 py-3">Admin KITE</td>
                            <td class="px-4 py-3">
                                <span class="bg-emerald-50 text-emerald-600 px-2 py-0.5 rounded-md font-semibold text-[10px]">SUCCESS</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-slate-400">{{ date('H:i', strtotime('-1 hour')) }} WIB</td>
                            <td class="px-4 py-3 font-medium text-slate-700">Pencatatan Penyesuaian</td>
                            <td class="px-4 py-3">User Inventory</td>
                            <td class="px-4 py-3">
                                <span class="bg-amber-50 text-amber-600 px-2 py-0.5 rounded-md font-semibold text-[10px]">UPDATED</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
@endsection