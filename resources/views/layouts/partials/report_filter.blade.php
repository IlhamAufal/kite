{{-- Reusable Report Filter Component

    Usage:
    @include('layouts.partials.report_filter', [
        'actionUrl'  => route('reports.pemasukan-bahan-baku'),
        'filterType' => 'date',       // 'date' atau 'month'
        'fromDate'   => old('from_date', date('Y-m-01')),
        'toDate'     => old('to_date', date('Y-m-d')),
        'month'      => old('month', date('m')),
        'year'       => old('year', date('Y')),
    ])

--}}

<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm mb-6">
    <h3 class="font-montserrat font-bold text-slate-700 text-sm mb-4 flex items-center">
        <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
        </svg>
        Filter Data
    </h3>

<div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm mb-6">
    <form action="{{ $actionUrl }}" method="GET" class="w-full">
        
        @if(($filterType ?? 'date') === 'date')
            {{-- Date Range Filter & Action Buttons dalam 1 Grid Sejajar --}}
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                <div class="md:col-span-5">
                    <label for="from_date" class="block text-xs font-semibold text-slate-600 mb-1.5 font-montserrat">Dari Tanggal</label>
                    <input type="date" id="from_date" name="from_date"
                           value="{{ $fromDate ?? old('from_date', date('Y-m-01')) }}"
                           class="w-full text-xs bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#00a351] focus:border-transparent transition">
                </div>

                <div class="md:col-span-5">
                    <label for="to_date" class="block text-xs font-semibold text-slate-600 mb-1.5 font-montserrat">Sampai Tanggal</label>
                    <input type="date" id="to_date" name="to_date"
                           value="{{ $toDate ?? old('to_date', date('Y-m-d')) }}"
                           class="w-full text-xs bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#00a351] focus:border-transparent transition">
                </div>

                <div class="md:col-span-2 flex items-center space-x-2">
                    <button type="submit"
                            class="w-full bg-[#4a82e8] hover:bg-[#3b71d4] text-white font-medium text-xs py-2.5 rounded-xl shadow-sm transition font-montserrat flex items-center justify-center">
                        <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Cari Data
                    </button>

                    @if(isset($showReset) && $showReset)
                        <a href="{{ $actionUrl }}"
                           class="bg-slate-200 hover:bg-slate-300 text-slate-600 font-medium text-xs px-3 py-2.5 rounded-xl transition font-montserrat text-center">
                            Reset
                        </a>
                    @endif
                </div>
            </div>

        @else
            {{-- Month/Year Filter & Action Buttons dalam 1 Grid Sejajar --}}
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                <div class="md:col-span-5">
                    <label for="month" class="block text-xs font-semibold text-slate-600 mb-1.5 font-montserrat">Bulan</label>
                    <select id="month" name="month"
                            class="w-full text-xs bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#00a351] focus:border-transparent transition">
                        @for($m = 1; $m <= 12; $m++)
                            <option value="{{ sprintf('%02d', $m) }}" {{ ($month ?? old('month', date('m'))) == sprintf('%02d', $m) ? 'selected' : '' }}>
                                {{ strftime('%B', mktime(0, 0, 0, $m, 1)) }}
                            </option>
                        @endfor
                    </select>
                </div>

                <div class="md:col-span-5">
                    <label for="year" class="block text-xs font-semibold text-slate-600 mb-1.5 font-montserrat">Tahun</label>
                    <select id="year" name="year"
                            class="w-full text-xs bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#00a351] focus:border-transparent transition">
                        @for($y = date('Y'); $y >= date('Y') - 10; $y--)
                            <option value="{{ $y }}" {{ ($year ?? old('year', date('Y'))) == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endfor
                    </select>
                </div>

                <div class="md:col-span-2 flex items-center space-x-2">
                    <button type="submit"
                            class="w-full bg-[#4a82e8] hover:bg-[#3b71d4] text-white font-medium text-xs py-2.5 rounded-xl shadow-sm transition font-montserrat flex items-center justify-center">
                        <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Cari Data
                    </button>

                    @if(isset($showReset) && $showReset)
                        <a href="{{ $actionUrl }}"
                           class="bg-slate-200 hover:bg-slate-300 text-slate-600 font-medium text-xs px-3 py-2.5 rounded-xl transition font-montserrat text-center">
                            Reset
                        </a>
                    @endif
                </div>
            </div>
        @endif

    </form>
</div>
</div>
