<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm max-w-xl mb-6">
    <h3 class="font-montserrat font-bold text-slate-700 text-sm mb-4">Filter Data</h3>
    
    <form action="{{ $actionUrl }}" method="GET" class="space-y-4">
        <div>
            <label for="from_date" class="block text-xs font-semibold text-slate-600 mb-1 font-montserrat">From Date</label>
            <input type="date" id="from_date" name="from_date" value="{{ $fromDate ?? date('Y-m-01') }}" 
                   class="w-full text-xs bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#00a351]">
        </div>

        <div>
            <label for="to_date" class="block text-xs font-semibold text-slate-600 mb-1 font-montserrat">To Date</label>
            <input type="date" id="to_date" name="to_date" value="{{ $toDate ?? date('Y-m-d') }}" 
                   class="w-full text-xs bg-white border border-slate-200 rounded-xl px-3 py-2.5 text-slate-700 focus:outline-none focus:ring-2 focus:ring-[#00a351]">
        </div>

        <button type="submit" class="w-full bg-[#4a82e8] hover:bg-[#3b71d4] text-white font-medium text-xs py-2.5 rounded-xl shadow-sm transition font-montserrat">
            Search
        </button>
    </form>
</div>