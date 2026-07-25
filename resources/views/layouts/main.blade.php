<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'IT Inventory KITE - PT. Yupi Indo Jelly Gum Tbk')</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&family=Montserrat:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 font-poppins text-slate-800 antialiased">

    <div class="flex h-screen overflow-hidden">
        
        <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col transition-all duration-300 shadow-xl z-20">
            <div class="h-16 flex items-center justify-center px-6 bg-gradient-to-r from-[#5eb3d6] to-[#4a9fc6]">
                <span class="font-fredoka text-2xl tracking-wide text-white drop-shadow-sm">YUPI KITE</span>
            </div>

            <div class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
                @include('layout.partial.sidebar')
            </div>

            <div class="p-4 border-t border-slate-800 text-xs text-slate-500 text-center">
                &copy; {{ date('Y') }} PT. Yupi Indo Jelly Gum Tbk
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            
            <header class="h-16 bg-white shadow-sm flex items-center justify-between px-8 z-10">
                <div class="flex items-center space-x-3">
                    <h1 class="font-montserrat font-bold text-lg text-slate-700">@yield('header-title', 'Dashboard')</h1>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- <span class="text-sm font-medium text-slate-600">Administrator</span> -->
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-xs font-medium px-4 py-2 rounded-full transition shadow-sm">
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

    @if(session('success'))
        <div class="fixed bottom-5 right-5 bg-[#00a351] text-white px-6 py-3 rounded-2xl shadow-lg z-50 animate-bounce">
            {{ session('success') }}
        </div>
    @endif

</body>
</html>