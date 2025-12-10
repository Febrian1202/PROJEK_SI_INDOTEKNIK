<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" type="image/png" href="assets/img/Logo-09.png">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>

    <title>{{ $title }}</title>
</head>

<body class="font-sans antialiased bg-gray-50">

    <div x-data="{ sidebarOpen: false, isLoaded: false }" x-init="setTimeout(() => isLoaded = true, 100)" class="flex h-screen overflow-hidden">

        <div x-show="sidebarOpen" @click="sidebarOpen = false"
            x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-20 bg-black/50">
        </div>

        <aside
            :class="[
                sidebarOpen ? 'translate-x-0' : '-translate-x-full',
                isLoaded ? 'transition-transform duration-300 ease-in-out' : ''
            ]"
            class="fixed inset-y-0 left-0 z-30 w-64 bg-white border-r border-gray-200 flex flex-col">

            <div class="h-16 flex items-center justify-between px-6 border-b border-gray-100 min-w-[256px]">

                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/img/Logo-09.png') }}" alt="Logo" class="h-8 w-auto">
                    <h1 class="text-lg font-bold text-brand-navy tracking-wide truncate">INTERNAL</h1>
                </div>

                <button @click="sidebarOpen = false" class="text-gray-400 hover:text-red-500 focus:outline-none ">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

            </div>

            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <a href="{{ Auth::user()->role == 'admin' ? route('admin.dashboard') : route('direktur.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('*.dashboard') ? 'bg-brand-blue/10 text-brand-blue' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} font-semibold rounded-lg transition-colors">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    Dashboard
                </a>

                @if (Auth::user()->role == 'admin')
                    <div class="pt-4 pb-2 px-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Master Data
                    </div>

                    <a href="{{ route('admin.users.index') }}"
                        class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.users.*') ? 'bg-brand-blue/10 text-brand-blue' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} rounded-lg transition-colors">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Kelola User
                    </a>
                    <a href="{{ route('admin.posisi.index') }}"
                        class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.posisi.*') ? 'bg-brand-blue/10 text-brand-blue' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} rounded-lg transition-colors">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Kelola Lowongan
                    </a>
                    <a href="{{ route('admin.dokumen.index') }}"
                        class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.dokumen.*') ? 'bg-brand-blue/10 text-brand-blue' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} rounded-lg transition-colors">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Master Dokumen
                    </a>
                    <a href="{{ route('admin.sites.index') }}"
                        class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.sites.*') ? 'bg-brand-blue/10 text-brand-blue' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} rounded-lg transition-colors">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Manajemen Site
                    </a>

                    <div class="pt-4 pb-2 px-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Operasional
                    </div>

                    <a href="{{ route('admin.lamaran.index') }}"
                        class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.lamaran.*') ? 'bg-brand-blue/10 text-brand-blue' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} rounded-lg transition-colors">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        Manajemen Pelamar
                    </a>
                    <a href="{{ route('admin.karyawan.index') }}"
                        class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.karyawan.*') ? 'bg-brand-blue/10 text-brand-blue' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} rounded-lg transition-colors">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                        </svg>
                        Data Karyawan
                    </a>
                @endif

                @if (Auth::user()->role == 'direktur')
                    <div class="pt-4 pb-2 px-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Eksekutif
                    </div>

                    <a href="{{ route('direktur.approval.index') }}"
                        class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('direktur.approval.*') ? 'bg-brand-blue/10 text-brand-blue' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} rounded-lg transition-colors">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Persetujuan (Approval)
                    </a>

                    <a href="{{ route('direktur.laporan.index') }}"
                        class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('direktur.laporan.*') ? 'bg-brand-blue/10 text-brand-blue' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} rounded-lg transition-colors">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Laporan Kinerja
                    </a>

                    <div class="pt-4 pb-2 px-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Monitoring
                        Data</div>

                    <a href="{{ route('direktur.pelamar.index') }}"
                        class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('direktur.pelamar.*') ? 'bg-brand-blue/10 text-brand-blue' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg transition-colors">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Data Pelamar
                    </a>

                    <a href="{{ route('direktur.karyawan.index') }}"
                        class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('direktur.karyawan.*') ? 'bg-brand-blue/10 text-brand-blue' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg transition-colors">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                        </svg>
                        Data Karyawan
                    </a>
                @endif
            </nav>

            <div class="p-4 border-t border-gray-100">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex w-full items-center gap-3 px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors font-medium">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="h-16 bg-brand-navy border-b border-gray-200 flex items-center justify-between px-4 lg:px-8">

                <div class="flex items-center gap-3">

                    <button @click="sidebarOpen = !sidebarOpen"
                        class="text-brand-gray hover:text-brand-blue focus:outline-none p-2 rounded-md hover:bg-gray-100 transition-colors">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    @php
                        // Tentukan route dashboard berdasarkan role
                        $dashboardRouteName = Auth::user()->role == 'admin' ? 'admin.dashboard' : 'direktur.dashboard';

                        // Cek: Apakah user sedang berada di dashboard?
                        $isDashboard = request()->routeIs($dashboardRouteName);
                    @endphp

                    @if (!$isDashboard)
                        <a href="{{ route($dashboardRouteName) }}"
                            class="text-brand-gray hover:text-brand-blue focus:outline-none p-2 rounded-md hover:bg-gray-100 transition-colors group"
                            title="Kembali ke Dashboard">
                            <svg class="w-6 h-6 group-hover:-translate-x-1 transition-transform" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('home') }}"
                            class="text-brand-gray hover:text-brand-blue focus:outline-none p-2 rounded-md hover:bg-gray-100 transition-colors group"
                            title="Lihat Halaman Depan">
                            <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                        </a>
                    @endif

                </div>

                <div class="flex items-center gap-4">
                    <div class="relative" x-data="{
                    open: false,
                    count: 0,
                    notifications: [],
                    checkNotifications() {
                        fetch('{{ route('admin.notifications.get') }}')
                            .then(res => res.json())
                            .then(data => {
                                this.count = data.count;
                                this.notifications = data.notifications;
                            });
                    },
                    markRead() {
                        this.open = !this.open;
                        if (this.open && this.count > 0) {
                            // Saat dibuka, tandai sudah dibaca (opsional, atau biarkan user klik manual)
                            fetch('{{ route('admin.notifications.read') }}', {
                                method: 'POST',
                                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                            }).then(() => {
                                this.count = 0; // Reset counter visual
                            });
                        }
                    },
                    init() {
                        this.checkNotifications(); // Cek pas load
                        setInterval(() => this.checkNotifications(), 5000); // Cek ulang tiap 5 detik
                    }
                }">

                    <button @click="markRead()"
                        class="relative p-2 text-brand-gray hover:text-brand-blue transition-colors">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>

                        <span x-show="count > 0" x-transition.scale
                            class="absolute top-1 right-1 w-5 h-5 bg-red-500 text-white text-[10px] font-bold flex items-center justify-center rounded-full border-2 border-white"
                            x-text="count">
                        </span>
                    </button>

                    <div x-show="open" @click.outside="open = false" x-transition
                        class="absolute right-0 mt-2 w-80 bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden z-50"
                        style="display: none;">

                        <div class="px-4 py-3 border-b border-gray-100 bg-gray-50 flex justify-between items-center">
                            <h3 class="font-bold text-gray-700 text-sm">Notifikasi</h3>
                            <span class="text-xs text-gray-400">Terbaru</span>
                        </div>

                        <div class="max-h-64 overflow-y-auto">
                            <template x-if="notifications.length === 0">
                                <div class="p-4 text-center text-gray-400 text-sm">
                                    Tidak ada notifikasi baru.
                                </div>
                            </template>

                            <template x-for="notif in notifications" :key="notif.id">
                                <a :href="'/admin/lamaran/' + notif.data.lamaran_id"
                                    class="block p-4 border-b border-gray-50 hover:bg-blue-50 transition-colors">
                                    <div class="flex items-start gap-3">
                                        <div class="bg-blue-100 text-blue-600 p-2 rounded-full shrink-0">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-800"
                                                x-text="notif.data.nama_pelamar"></p>
                                            <p class="text-xs text-gray-500">Melamar posisi <span
                                                    class="text-brand-blue" x-text="notif.data.posisi"></span></p>
                                            <p class="text-[10px] text-gray-400 mt-1">Baru saja</p>
                                        </div>
                                    </div>
                                </a>
                            </template>
                        </div>
                    </div>
                </div>
                    <div class="flex items-center gap-3 pl-4 border-l border-gray-200">
                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-bold text-white">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-brand-gray uppercase">{{ Auth::user()->role }}</p>
                        </div>
                        <div
                            class="h-10 w-10 rounded-full bg-brand-blue text-white flex items-center justify-center font-bold text-lg overflow-hidden">
                            @if (Auth::user()->kandidatProfil && Auth::user()->kandidatProfil->foto)
                                <img src="{{ asset('storage/' . Auth::user()->kandidatProfil->foto) }}"
                                    class="w-full h-full object-cover">
                            @else
                                {{ substr(Auth::user()->name, 0, 1) }}
                            @endif
                        </div>
                    </div>
                </div>

            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-4 lg:p-8">
                {{ $slot }}
            </main>
        </div>
    </div>

</body>

</html>
