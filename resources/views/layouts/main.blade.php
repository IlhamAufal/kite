<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'IT Inventory KITE - PT. Yupi Indo Jelly Gum Tbk')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        :root {
            --font-primary: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Helvetica Neue', Arial, sans-serif;
        }

        body, .font-poppins { font-family: var(--font-primary); }
        .font-fredoka { font-family: var(--font-primary); font-weight: 700; }
        .font-montserrat { font-family: var(--font-primary); }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        .table-wrap { overflow-x: auto; }
        .table-wrap table { min-width: 100%; }

        [x-cloak] { display: none !important; }

        @keyframes slideInRight {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slideOutRight {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
        .toast-enter { animation: slideInRight 0.3s ease-out; }
        .toast-exit { animation: slideOutRight 0.3s ease-in; }
    </style>

    @stack('styles')
</head>
<body class="bg-slate-50 font-poppins text-slate-800 antialiased" x-data="{ showLogoutModal: false }">

    <div class="flex h-screen overflow-hidden">

        @include('layouts.partials.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">

            <header class="h-16 bg-white shadow-sm flex items-center justify-between px-8 z-10">
                <div class="flex items-center space-x-3">
                    <button id="sidebar-toggle" class="lg:hidden mr-2 text-slate-500 hover:text-slate-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <h1 class="font-montserrat font-bold text-lg text-slate-700">@yield('header-title', 'Dashboard')</h1>
                </div>

                <div class="flex items-center space-x-4">
                    @yield('header-actions')

                    <div class="flex items-center space-x-3 pl-4 border-l border-slate-200">
                        <span class="text-sm font-medium text-slate-600 hidden sm:block">{{ Auth::user()->userid ?? '' }}</span>
                    </div>

                    <form action="{{ route('logout') }}" method="POST" id="logout-form" class="inline">
                        @csrf
                        <button type="button" @click="showLogoutModal = true" class="bg-red-500 hover:bg-red-600 text-white text-xs font-medium px-4 py-2 rounded-full transition shadow-sm">
                            Logout
                        </button>
                    </form>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-slate-50 p-6">
                @yield('content')
            </main>

        </div>
    </div>

    {{-- Toast Notifications --}}
    <div id="toast-container" class="fixed bottom-5 right-5 z-50 space-y-3">
        @if(session('success'))
            <div class="toast-enter bg-[#00a351] text-white px-6 py-3 rounded-2xl shadow-lg flex items-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <span class="text-sm font-medium">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="toast-enter bg-red-500 text-white px-6 py-3 rounded-2xl shadow-lg flex items-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                <span class="text-sm font-medium">{{ session('error') }}</span>
            </div>
        @endif

        @if(session('warning'))
            <div class="toast-enter bg-amber-500 text-white px-6 py-3 rounded-2xl shadow-lg flex items-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
                <span class="text-sm font-medium">{{ session('warning') }}</span>
            </div>
        @endif
    </div>

    @stack('scripts')

    <script>
        document.querySelectorAll('#toast-container > div').forEach(function(toast) {
            setTimeout(function() {
                toast.classList.remove('toast-enter');
                toast.classList.add('toast-exit');
                setTimeout(function() { toast.remove(); }, 300);
            }, 4000);
        });

        document.getElementById('sidebar-toggle')?.addEventListener('click', function() {
            document.querySelector('aside').classList.toggle('-translate-x-full');
        });
    </script>

    {{-- Logout Confirmation Modal --}}
    <div x-show="showLogoutModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm" x-cloak>
        <div @click.away="showLogoutModal = false" class="bg-white rounded-2xl shadow-xl p-6 w-full max-w-sm mx-4">
            <div class="flex items-center gap-3 mb-4">
                <div class="p-2 bg-red-50 text-red-500 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-800 text-sm">Konfirmasi Logout</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Apakah anda yakin ingin keluar dari sistem?</p>
                </div>
            </div>
            <div class="flex gap-2 justify-end">
                <button @click="showLogoutModal = false" class="px-4 py-2 border border-slate-200 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 transition">Batal</button>
                <button @click="document.getElementById('logout-form').submit()" class="px-4 py-2 bg-red-500 text-white rounded-lg text-xs font-medium hover:bg-red-600 transition">Ya, Logout</button>
            </div>
        </div>
    </div>

</body>
</html>
