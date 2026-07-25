<nav class="space-y-2">
    <a href="{{ route('dashboard') }}" 
       class="flex items-center px-4 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('dashboard') ? 'bg-white/10 text-white shadow-inner' : 'hover:bg-white/5 text-slate-400 hover:text-white' }}">
        <span class="mr-3">📊</span> Dashboard
    </a>

    <div class="pt-3 pb-1 text-xs font-semibold uppercase tracking-wider text-slate-500 px-4 font-montserrat">
        Reports Menu
    </div>
    
    <div class="space-y-1 pl-2">
        <a href="#" class="block px-4 py-2 rounded-lg text-xs transition {{ request()->is('reports/pencatatan-penyesuaian*') ? 'bg-[#00a351]/20 text-white font-semibold' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
            Pencatatan Penyesuaian
        </a>

        <a href="#" class="block px-4 py-2 rounded-lg text-xs transition {{ request()->is('reports/peb-change-log*') ? 'bg-[#00a351]/20 text-white font-semibold' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
            PEB Change Log
        </a>

        <a href="#" class="block px-4 py-2 rounded-lg text-xs transition {{ request()->is('reports/pemasukan-bahan-baku*') ? 'bg-[#00a351]/20 text-white font-semibold' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
            Pemasukan Bahan Baku
        </a>

        <a href="#" class="block px-4 py-2 rounded-lg text-xs transition {{ request()->is('reports/pemakaian-bahan-baku*') ? 'bg-[#00a351]/20 text-white font-semibold' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
            Pemakaian Bahan Baku
        </a>

        <a href="#" class="block px-4 py-2 rounded-lg text-xs transition {{ request()->is('reports/mutasi-bahan-baku*') ? 'bg-[#00a351]/20 text-white font-semibold' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
            Mutasi Bahan Baku
        </a>

        <a href="#" class="block px-4 py-2 rounded-lg text-xs transition {{ request()->is('reports/pemasukan-hasil-produksi*') ? 'bg-[#00a351]/20 text-white font-semibold' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
            Pemasukan Hasil Produksi
        </a>

        <a href="#" class="block px-4 py-2 rounded-lg text-xs transition {{ request()->is('reports/pengeluaran-hasil-produksi*') ? 'bg-[#00a351]/20 text-white font-semibold' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
            Pengeluaran Hasil Produksi
        </a>

        <a href="#" class="block px-4 py-2 rounded-lg text-xs transition {{ request()->is('reports/mutasi-hasil-produksi*') ? 'bg-[#00a351]/20 text-white font-semibold' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
            Mutasi Hasil Produksi
        </a>

        <a href="#" class="block px-4 py-2 rounded-lg text-xs transition {{ request()->is('reports/pemakaian-barang-sub-kontrak*') ? 'bg-[#00a351]/20 text-white font-semibold' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
            Pemakaian barang - sub kontrak
        </a>

        <a href="#" class="block px-4 py-2 rounded-lg text-xs transition {{ request()->is('reports/penyelesaian-waste-scrap*') ? 'bg-[#00a351]/20 text-white font-semibold' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
            Penyelesaian waste / scrap
        </a>
    </div>

    <div class="pt-4 pb-1 text-xs font-semibold uppercase tracking-wider text-slate-500 px-4 font-montserrat">
        System Log
    </div>
    
    <a href="#" class="flex items-center px-4 py-2.5 rounded-xl text-sm font-medium transition {{ request()->is('datalog*') ? 'bg-[#00a351]/20 text-white font-semibold shadow-inner' : 'hover:bg-white/5 text-slate-400 hover:text-white' }}">
        <span class="mr-3">📋</span> Data Log
    </a>
</nav>