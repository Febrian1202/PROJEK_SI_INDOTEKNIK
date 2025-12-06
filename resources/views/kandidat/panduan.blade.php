<x-layout title="Cara Melamar">
    <x-slot:title>Panduan Melamar</x-slot:title>

    <nav class="bg-brand-navy border-b border-gray-200 fixed top-0 w-full z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <div class="flex items-center gap-4">
                    <a href="{{ route('kandidat.dashboard') }}"
                        class="p-2 rounded-lg text-white hover:bg-gray-100 hover:text-brand-orange transition-colors"
                        title="Kembali ke Dashboard">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </a>

                    <div class="h-6 w-px bg-gray-300 hidden md:block"></div>

                    <div class="flex flex-col">
                        <span class="text-xl font-bold text-white">Cara Melamar</span>
                        <span class="text-xs text-brand-gray hidden md:block">Panduan langkah demi langkah proses rekrutmen</span>
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

    <div class="pt-24 pb-12 min-h-screen bg-gray-50">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                <h1 class="text-2xl font-bold text-brand-navy mb-6">Panduan Melamar Pekerjaan</h1>
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="h-8 w-8 bg-brand-orange text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">1</div>
                        <div>
                            <h3 class="font-bold text-lg">Lengkapi Profil</h3>
                            <p class="text-gray-600">Pastikan biodata diri, NIK, dan alamat sudah terisi dengan benar di menu Biodata Diri.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="h-8 w-8 bg-brand-orange text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">2</div>
                        <div>
                            <h3 class="font-bold text-lg">Pilih Lowongan</h3>
                            <p class="text-gray-600">Buka menu "Lowongan Pekerjaan", pilih posisi yang sesuai dengan kualifikasi Anda.</p>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</x-layout>