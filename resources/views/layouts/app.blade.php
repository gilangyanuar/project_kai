<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>KAI Admin</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Google Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-[Inter]">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-72 bg-indigo-900 text-white flex flex-col">
        <div class="p-6 text-center border-b border-indigo-800">
            <div class="flex justify-center mb-3">
                <img src="{{ asset('assets/icon.png') }}" 
                     alt="Logo KAI" 
                     class="h-16 w-auto object-contain">
            </div>
            <p class="mt-2 text-lg font-medium">Admin</p>
        </div>

        <nav class="flex-1 mt-8 space-y-2">
            <a  href="{{ route('dashboard') }}" 
                class="flex items-center gap-4 px-6 py-3 {{ request()->routeIs('dashboard') ? 'bg-blue-600 font-semibold' : 'hover:bg-indigo-800' }}">
                <span class="material-symbols-outlined">dashboard</span>
                Dashboard
            </a>

            <a  href="{{ route('user.index') }}" 
                class="flex items-center gap-4 px-6 py-3 {{ request()->routeIs('user.*') ? 'bg-blue-600 font-semibold' : 'hover:bg-indigo-800' }}">
                <span class="material-symbols-outlined">group</span>
                Manajemen User
            </a>

            <a  href="{{ route('master.index') }}" 
                class="flex items-center gap-4 px-6 py-3 {{ request()->routeIs('master.*') ? 'bg-blue-600 font-semibold' : 'hover:bg-indigo-800' }}">
                <span class="material-symbols-outlined">database</span>
                Master Data
            </a>

            <a  href="{{ route('arsip.index') }}"
                class="flex items-center gap-4 px-6 py-3 {{ request()->routeIs('arsip.*') ? 'bg-blue-600 font-semibold' : 'hover:bg-indigo-800' }}">
                <span class="material-symbols-outlined">folder</span>
                Arsip Laporan
            </a>

            <a class="flex items-center gap-4 px-6 py-3 hover:bg-indigo-800">
                <span class="material-symbols-outlined">settings</span>
                Pengaturan
            </a>
        </nav>
    </aside>

    <!-- MAIN -->
    <main class="flex-1 bg-white rounded-l-3xl">

        <!-- TOP BAR -->
        <header class="flex items-center justify-between px-10 py-6 border-b">
            <div>
            <h1 class="text-3xl font-extrabold">
                @yield('title', 'Dashboard')
            </h1>
            
            <p class="text-gray-500 mt-1">
                @yield('breadcrumb', 'Dashboard')
            </p>
        </div>

            <div class="flex items-center gap-6">
                <span class="material-symbols-outlined text-2xl cursor-pointer">
                    notifications
                </span>

                <div class="flex items-center gap-3">
                    <img src="https://i.pravatar.cc/40"
                         class="w-10 h-10 rounded-full object-cover">
                    <span class="font-medium">Budiman</span>
                    <span class="material-symbols-outlined cursor-pointer">
                        logout
                    </span>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <section class="px-10 py-8">
            @yield('content')
        </section>

    </main>

</div>

</body>
</html>
