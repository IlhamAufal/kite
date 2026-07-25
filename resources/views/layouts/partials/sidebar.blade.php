<aside class="w-64 bg-slate-900 text-slate-300 flex flex-col transition-all duration-300 shadow-xl z-20">

    <div class="h-16 flex items-center justify-center px-6 bg-gradient-to-r from-[#5eb3d6] to-[#4a9fc6]">
        <a href="{{ route('dashboard') }}" class="font-fredoka text-2xl tracking-wide text-white drop-shadow-sm">
            YUPI KITE
        </a>
    </div>

    <div class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
        <nav class="space-y-1">

            {{-- Dashboard --}}
            <a href="{{ route('dashboard') }}"
               class="flex items-center px-4 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('dashboard') ? 'bg-white/10 text-white shadow-inner' : 'hover:bg-white/5 text-slate-400 hover:text-white' }}">
                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0h4"/>
                </svg>
                Dashboard
            </a>

            {{-- Reports Collapsible --}}
            <div x-data="{ open: {{ request()->is('reports/*') ? 'true' : 'false' }} }">
                <button @click="open = !open"
                        class="w-full flex items-center justify-between px-4 py-2.5 rounded-xl text-sm font-medium transition {{ request()->is('reports/*') ? 'bg-white/10 text-white' : 'hover:bg-white/5 text-slate-400 hover:text-white' }}">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Reports
                    </span>
                    <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-90': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>

                <div x-show="open" x-collapse x-cloak
                     class="mt-1 ml-4 pl-3 border-l border-slate-700 space-y-0.5">
                    @php
                        $reports = [
                            ['route' => 'reports.pemasukan-bahan-baku',        'name' => 'Pemasukan Bahan Baku'],
                            ['route' => 'reports.pemakaian-bahan-baku',       'name' => 'Pemakaian Bahan Baku'],
                            ['route' => 'reports.mutasi-bahan-baku',          'name' => 'Mutasi Bahan Baku'],
                            ['route' => 'reports.pemasukan-hasil-produksi',   'name' => 'Pemasukan Hasil Produksi'],
                            ['route' => 'reports.pengeluaran-hasil-produksi', 'name' => 'Pengeluaran Hasil Produksi'],
                            ['route' => 'reports.mutasi-hasil-produksi',      'name' => 'Mutasi Hasil Produksi'],
                            ['route' => 'reports.pencatatan-penyesuaian',     'name' => 'Pencatatan Penyesuaian'],
                            ['route' => 'reports.peb-change-log',             'name' => 'PEB Change Log'],
                        ];
                    @endphp

                    @foreach($reports as $report)
                        <a href="{{ route($report['route']) }}"
                           class="block px-3 py-1.5 rounded-lg text-xs transition {{ request()->routeIs($report['route']) ? 'bg-[#00a351]/20 text-white font-semibold' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                            {{ $report['name'] }}
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- System Collapsible --}}
            <div x-data="{ open: {{ request()->is('datalog*') ? 'true' : 'false' }} }">
                <button @click="open = !open"
                        class="w-full flex items-center justify-between px-4 py-2.5 rounded-xl text-sm font-medium transition {{ request()->is('datalog*') ? 'bg-white/10 text-white' : 'hover:bg-white/5 text-slate-400 hover:text-white' }}">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        System
                    </span>
                    <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-90': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>

                <div x-show="open" x-collapse x-cloak
                     class="mt-1 ml-4 pl-3 border-l border-slate-700 space-y-0.5">
                    <a href="{{ route('datalog') }}"
                       class="block px-3 py-1.5 rounded-lg text-xs transition {{ request()->routeIs('datalog') ? 'bg-[#00a351]/20 text-white font-semibold' : 'text-slate-400 hover:bg-white/5 hover:text-white' }}">
                        Data Log
                    </a>
                </div>
            </div>

        </nav>
    </div>

    <div class="p-4 border-t border-slate-800 text-xs text-slate-500 text-center">
        &copy; {{ date('Y') }} PT. Yupi Indo Jelly Gum Tbk
    </div>
</aside>
