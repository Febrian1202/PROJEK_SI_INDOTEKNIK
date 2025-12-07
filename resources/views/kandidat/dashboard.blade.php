<x-layout>
    <x-slot:title>Dashboard</x-slot:title>

    <nav class="bg-brand-navy border-b border-gray-200 fixed top-0 w-full z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <div class="flex items-center gap-4">
                    <a href="{{ route('home') }}"
                        class="p-2 rounded-lg text-white hover:bg-gray-100 hover:text-brand-orange transition-colors"
                        title="Kembali ke Beranda">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </a>

                    <div class="h-6 w-px bg-gray-300 hidden md:block"></div>

                    <div class="flex flex-col">
                        <span class="text-xl font-bold text-white">Dashboard Kandidat</span>
                        <span class="text-xs text-brand-gray hidden md:block">Portal Rekrutmen Indoteknik</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">

                    <div class="text-right hidden md:block">
                        <p class="text-md font-bold text-white leading-tight">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-brand-orange font-medium truncate max-w-[150px]">
                            {{ Auth::user()->email }}</p>
                    </div>

                    <div
                        class="h-10 w-10 md:h-14 md:w-14 rounded-full bg-gray-200 border-2 border-brand-orange/30 overflow-hidden flex items-center justify-center shadow-sm">
                        @if (Auth::user()->kandidatProfil && Auth::user()->kandidatProfil->foto)
                            <img src="{{ asset('storage/' . Auth::user()->kandidatProfil->foto) }}" alt="Foto Profil"
                                class="w-full h-full object-cover">
                        @else
                            <span class="text-brand-navy font-bold text-lg">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </span>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </nav>

    <div class="pt-24 pb-12 mt-4 min-h-screen bg-gray-50">
        <div class="max-w-7xl mt-3 mx-auto px-6 lg:px-8">

            <div class="bg-brand-navy rounded-2xl p-8 mb-10 text-white shadow-lg relative overflow-hidden">
                <div class="absolute right-0 top-0 h-full w-1/2 bg-gradient-to-l from-brand-blue/50 to-transparent">
                </div>
                <div class="relative z-10">
                    <h1 class="text-3xl font-bold mb-2">Halo, {{ Auth::user()->name }}! 👋</h1>
                    <p class="text-gray-300 mb-6">Selamat datang di Portal Rekrutmen PT. Indoteknik Prima Mekongga.</p>

                    <div class="flex gap-4">
                        <div class="bg-white/10 px-4 py-2 rounded-lg backdrop-blur-sm border border-white/20">
                            <span class="block text-2xl font-bold">{{ $totalLamaran }}</span>
                            <span class="text-xs text-gray-300">Total Lamaran</span>
                        </div>
                        <div class="bg-white/10 px-4 py-2 rounded-lg backdrop-blur-sm border border-white/20">
                            <span class="block text-2xl font-bold">{{ $lamaranAktif }}</span>
                            <span class="text-xs text-gray-300">Sedang Diproses</span>
                        </div>
                    </div>
                </div>
            </div>

            <h2 class="text-xl font-bold text-brand-navy mb-6 border-l-4 border-brand-orange pl-3">Menu Kandidat</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-6">

                <a href="{{ route('kandidat.lowongan') }}"
                    class="group bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md hover:border-brand-blue/30 transition-all duration-300">
                    <div
                        class="w-12 h-12 bg-blue-50 text-brand-blue rounded-lg flex items-center justify-center mb-4 group-hover:bg-brand-blue group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Lowongan Pekerjaan</h3>
                    <p class="text-sm text-gray-500">Lihat daftar posisi yang tersedia dan mulai karir Anda di sini.</p>
                </a>

                <a href="{{ route('profil.index') }}"
                    class="group bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md hover:border-brand-blue/30 transition-all duration-300">
                    <div
                        class="w-12 h-12 bg-orange-50 text-brand-orange rounded-lg flex items-center justify-center mb-4 group-hover:bg-brand-orange group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Biodata Diri</h3>
                    <p class="text-sm text-gray-500">Lengkapi data diri, KTP, dan informasi kontak Anda.</p>
                </a>

                <a href="{{ route('kandidat.riwayat') }}"
                    class="group bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md hover:border-brand-blue/30 transition-all duration-300">
                    <div
                        class="w-12 h-12 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center mb-4 group-hover:bg-purple-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Riwayat Lamaran</h3>
                    <p class="text-sm text-gray-500">Pantau status lamaran Anda (Diterima, Ditolak, Diproses).</p>
                </a>

                <a href="{{ route('kandidat.panduan') }}"
                    class="group bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md hover:border-brand-blue/30 transition-all duration-300">
                    <div
                        class="w-12 h-12 bg-green-50 text-green-600 rounded-lg flex items-center justify-center mb-4 group-hover:bg-green-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Cara Melamar</h3>
                    <p class="text-sm text-gray-500">Panduan langkah demi langkah proses rekrutmen.</p>
                </a>

                <a href="{{ route('kandidat.syarat') }}"
                    class="group bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md hover:border-brand-blue/30 transition-all duration-300">
                    <div
                        class="w-12 h-12 bg-red-50 text-red-600 rounded-lg flex items-center justify-center mb-4 group-hover:bg-red-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Syarat & Ketentuan</h3>
                    <p class="text-sm text-gray-500">Informasi kebijakan perusahaan dan persyaratan umum.</p>
                </a>

                <a href="#"
                    class="group bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md hover:border-brand-blue/30 transition-all duration-300">
                    <div
                        class="w-12 h-12 bg-gray-100 text-gray-600 rounded-lg flex items-center justify-center mb-4 group-hover:bg-gray-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Bantuan</h3>
                    <p class="text-sm text-gray-500">Hubungi admin jika mengalami kendala sistem.</p>
                </a>

            </div>
        </div>
    </div>
</x-layout>
