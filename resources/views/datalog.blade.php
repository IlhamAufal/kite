@extends('layouts.main')

@section('title', 'Data Log System - IT Inventory KITE PT Yupi Indo Jelly Gum Tbk')
@section('header-title', 'System Audit & Data Logs')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="font-montserrat font-bold text-xl text-slate-800">System Activity Logs</h2>
            <p class="text-slate-500 text-xs mt-1">Rekam jejak integrasi data, sinkronisasi ERP/SAP, dan aktivitas pengguna sistem KITE.</p>
        </div>
        <div class="flex items-center space-x-2">
            <button onclick="window.location.reload()" class="bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 px-4 py-2 rounded-xl text-xs font-semibold shadow-sm transition flex items-center">
                <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                Refresh Logs
            </button>
        </div>
    </div>

    <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
        <form action="{{ route('datalog.index') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
            <div>
                <label for="start_date" class="block text-xs font-semibold text-slate-600 mb-1.5 font-montserrat">Tanggal Mulai</label>
                <input type="date" id="start_date" name="start_date" value="{{ request('start_date', date('Y-m-d')) }}" 
                       class="w-full text-xs bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-slate-700 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#00a351]">
            </div>

            <div>
                <label for="end_date" class="block text-xs font-semibold text-slate-600 mb-1.5 font-montserrat">Tanggal Selesai</label>
                <input type="date" id="end_date" name="end_date" value="{{ request('end_date', date('Y-m-d')) }}" 
                       class="w-full text-xs bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-slate-700 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#00a351]">
            </div>

            <div>
                <label for="status" class="block text-xs font-semibold text-slate-600 mb-1.5 font-montserrat">Status Log</label>
                <select id="status" name="status" class="w-full text-xs bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-slate-700 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#00a351]">
                    <option value="">-- Semua Status --</option>
                    <option value="SUCCESS" {{ request('status') == 'SUCCESS' ? 'selected' : '' }}>SUCCESS</option>
                    <option value="UPDATED" {{ request('status') == 'UPDATED' ? 'selected' : '' }}>UPDATED</option>
                    <option value="FAILED" {{ request('status') == 'FAILED' ? 'selected' : '' }}>FAILED</option>
                </select>
            </div>

            <div class="flex items-center space-x-2">
                <button type="submit" class="flex-1 bg-[#00a351] hover:bg-[#008f46] text-white font-medium text-xs py-2.5 px-4 rounded-xl shadow-sm transition text-center font-montserrat">
                    Filter Data
                </button>
                <a href="{{ route('datalog.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-600 font-medium text-xs py-2.5 px-3 rounded-xl transition">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-5 border-b border-slate-100 flex items-center justify-between">
            <h3 class="font-montserrat font-bold text-slate-800 text-sm">Riwayat Aktivitas System</h3>
            <span class="text-xs text-slate-400">Menampilkan 1-10 dari total 45 data log</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-600">
                <thead class="bg-slate-50 font-bold font-montserrat text-[10px] tracking-wider text-slate-800">
                    <tr>
                        <th class="px-5 py-3.5">ID Log</th>
                        <th class="px-5 py-3.5">Waktu / Timestamp</th>
                        <th class="px-5 py-3.5">Modul / Source</th>
                        <th class="px-5 py-3.5">User / Trigger</th>
                        <th class="px-5 py-3.5">Aktivitas / Event</th>
                        <th class="px-5 py-3.5 text-center">Status</th>
                        <th class="px-5 py-3.5 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="px-5 py-3.5 font-mono text-slate-400">#LOG-8921</td>
                        <td class="px-5 py-3.5 font-medium text-slate-700">{{ date('Y-m-d H:i:s') }}</td>
                        <td class="px-5 py-3.5 font-semibold text-slate-700">Pemasukan Bahan Baku</td>
                        <td class="px-5 py-3.5">System Auto-Sync (AX ERP)</td>
                        <td class="px-5 py-3.5 text-slate-600">Upsert 12 record Dokumen PIB</td>
                        <td class="px-5 py-3.5 text-center">
                            <span class="inline-block bg-emerald-50 text-emerald-600 border border-emerald-200 px-2.5 py-0.5 rounded-full font-bold text-[10px]">SUCCESS</span>
                        </td>
                        <td class="px-5 py-3.5 text-center">
                            <button onclick="openModal('LOG-8921', 'Pemasukan Bahan Baku', 'SUCCESS', 'Upsert 12 record Dokumen PIB berhasil diproses ke database MySQL yp_kite tanpa hambatan.')" 
                                    class="text-[#4a9fc6] hover:text-[#5eb3d6] font-semibold text-xs transition">
                                Detail
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="px-5 py-3.5 font-mono text-slate-400">#LOG-8920</td>
                        <td class="px-5 py-3.5 font-medium text-slate-700">{{ date('Y-m-d H:i:s', strtotime('-15 mins')) }}</td>
                        <td class="px-5 py-3.5 font-semibold text-slate-700">PEB Change Log</td>
                        <td class="px-5 py-3.5">Admin KITE</td>
                        <td class="px-5 py-3.5 text-slate-600">Update status nomor PEB-2026-00412</td>
                        <td class="px-5 py-3.5 text-center">
                            <span class="inline-block bg-emerald-50 text-emerald-600 border border-emerald-200 px-2.5 py-0.5 rounded-full font-bold text-[10px]">SUCCESS</span>
                        </td>
                        <td class="px-5 py-3.5 text-center">
                            <button onclick="openModal('LOG-8920', 'PEB Change Log', 'SUCCESS', 'Perubahan nomor PEB berhasil diperbarui oleh Administrator.')" 
                                    class="text-[#4a9fc6] hover:text-[#5eb3d6] font-semibold text-xs transition">
                                Detail
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="px-5 py-3.5 font-mono text-slate-400">#LOG-8919</td>
                        <td class="px-5 py-3.5 font-medium text-slate-700">{{ date('Y-m-d H:i:s', strtotime('-45 mins')) }}</td>
                        <td class="px-5 py-3.5 font-semibold text-slate-700">Pencatatan Penyesuaian</td>
                        <td class="px-5 py-3.5">User Inventory</td>
                        <td class="px-5 py-3.5 text-slate-600">Manual adjustment stok bahan baku #RM-091</td>
                        <td class="px-5 py-3.5 text-center">
                            <span class="inline-block bg-amber-50 text-amber-600 border border-amber-200 px-2.5 py-0.5 rounded-full font-bold text-[10px]">UPDATED</span>
                        </td>
                        <td class="px-5 py-3.5 text-center">
                            <button onclick="openModal('LOG-8919', 'Pencatatan Penyesuaian', 'UPDATED', 'Penyesuaian stok bahan baku disesuaikan sebesar +25 KG.')" 
                                    class="text-[#4a9fc6] hover:text-[#5eb3d6] font-semibold text-xs transition">
                                Detail
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-slate-50/80 transition">
                        <td class="px-5 py-3.5 font-mono text-slate-400">#LOG-8918</td>
                        <td class="px-5 py-3.5 font-medium text-slate-700">{{ date('Y-m-d H:i:s', strtotime('-2 hours')) }}</td>
                        <td class="px-5 py-3.5 font-semibold text-slate-700">SAP Master Data</td>
                        <td class="px-5 py-3.5">SAP Cloud OData API</td>
                        <td class="px-5 py-3.5 text-slate-600">Gagal terhubung ke endpoint SAP OData API</td>
                        <td class="px-5 py-3.5 text-center">
                            <span class="inline-block bg-rose-50 text-rose-600 border border-rose-200 px-2.5 py-0.5 rounded-full font-bold text-[10px]">FAILED</span>
                        </td>
                        <td class="px-5 py-3.5 text-center">
                            <button onclick="openModal('LOG-8918', 'SAP Master Data', 'FAILED', 'Error 504: Connection Timeout saat menghubungi endpoint OData SAP S/4HANA.')" 
                                    class="text-[#4a9fc6] hover:text-[#5eb3d6] font-semibold text-xs transition">
                                Detail
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-500">
            <div>
                Menampilkan <span class="font-semibold text-slate-700">1</span> sampai <span class="font-semibold text-slate-700">4</span> dari <span class="font-semibold text-slate-700">45</span> log
            </div>
            <div class="flex items-center space-x-1">
                <button class="px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 text-slate-400 cursor-not-allowed" disabled>Prev</button>
                <button class="px-3 py-1.5 rounded-lg bg-[#00a351] text-white font-semibold">1</button>
                <button class="px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 text-slate-600">2</button>
                <button class="px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 text-slate-600">3</button>
                <button class="px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 text-slate-600">Next</button>
            </div>
        </div>
    </div>

</div>

<div id="logModal" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/50 backdrop-blur-sm hidden transition-opacity">
    <div class="bg-white w-full max-w-lg rounded-2xl shadow-xl overflow-hidden border border-slate-100 transform transition-all p-6 space-y-4">
        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
            <h3 class="font-montserrat font-bold text-slate-800 text-base" id="modalTitle">Detail Log Aktivitas</h3>
            <button onclick="closeModal()" class="text-slate-400 hover:text-slate-600 text-lg">&times;</button>
        </div>

        <div class="space-y-3 text-xs text-slate-600">
            <div class="flex justify-between py-1 border-b border-slate-50">
                <span class="font-semibold text-slate-400">ID Log:</span>
                <span id="modalId" class="font-mono text-slate-800 font-bold"></span>
            </div>
            <div class="flex justify-between py-1 border-b border-slate-50">
                <span class="font-semibold text-slate-400">Modul / Event:</span>
                <span id="modalModule" class="font-semibold text-slate-800"></span>
            </div>
            <div class="flex justify-between py-1 border-b border-slate-50">
                <span class="font-semibold text-slate-400">Status:</span>
                <span id="modalStatus" class="font-bold"></span>
            </div>
            <div>
                <span class="font-semibold text-slate-400 block mb-1">Pesan Detail / System Response:</span>
                <div id="modalMessage" class="bg-slate-50 p-3 rounded-xl border border-slate-200 text-slate-700 font-mono text-[11px] leading-relaxed"></div>
            </div>
        </div>

        <div class="pt-2 text-right">
            <button onclick="closeModal()" class="bg-slate-800 hover:bg-slate-900 text-white font-medium text-xs px-5 py-2.5 rounded-xl transition font-montserrat">
                Tutup
            </button>
        </div>
    </div>
</div>

<script>
    function openModal(id, module, status, message) {
        document.getElementById('modalId').innerText = '#' + id;
        document.getElementById('modalModule').innerText = module;
        document.getElementById('modalStatus').innerText = status;
        document.getElementById('modalMessage').innerText = message;
        
        const modal = document.getElementById('logModal');
        modal.classList.remove('hidden');
    }

    function closeModal() {
        const modal = document.getElementById('logModal');
        modal.classList.add('hidden');
    }
</script>
@endsection