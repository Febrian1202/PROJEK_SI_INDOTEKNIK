<x-layout>
    <x-slot:title>Lowongan</x-slot:title>

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
                        <span class="text-xl font-bold text-white">Lowongan Pekerjaan</span>
                        <span class="text-xs text-brand-gray hidden md:block">Temukan karir impian dan tumbuh bersama
                            kami</span>
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


    {{-- Fix Later --}}
    {{-- <div class="relative bg-brand-navy rounded-3xl p-8 md:p-12 mb-12 overflow-hidden shadow-2xl shadow-brand-navy/20">

        <div
            class="absolute top-0 right-0 -mt-10 -mr-10 w-64 h-64 bg-brand-blue/20 rounded-full blur-3xl pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 left-0 -mb-10 -ml-10 w-40 h-40 bg-brand-orange/20 rounded-full blur-3xl pointer-events-none">
        </div>
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5">
        </div>

        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">

            <div class="max-w-2xl text-center md:text-left">
                <span
                    class="inline-block py-1 px-3 rounded-full bg-brand-orange/20 text-brand-orange text-xs font-bold tracking-wider mb-4 border border-brand-orange/30">
                    KARIR & PENGEMBANGAN
                </span>
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-6 leading-tight">
                    Wujudkan Potensi Terbaikmu <br>
                    Bersama <span class="text-brand-orange">Indoteknik</span>
                </h1>
                <p class="text-gray-300 text-lg mb-8 leading-relaxed">
                    Bergabunglah dengan tim profesional kami dalam membangun infrastruktur masa depan.
                    Temukan posisi yang sesuai dengan keahlian Anda.
                </p>

                <div class="flex flex-wrap justify-center md:justify-start gap-8 border-t border-white/10 pt-6">
                    <div>
                        <span class="block text-3xl font-bold text-white">{{ $lowongan->total() }}</span>
                        <span class="text-xs text-gray-400 uppercase tracking-widest">Posisi Terbuka</span>
                    </div>
                    <div class="w-px h-10 bg-white/10 hidden md:block"></div>
                    <div>
                        <span class="block text-3xl font-bold text-white">Full Time</span>
                        <span class="text-xs text-gray-400 uppercase tracking-widest">Tipe Pekerjaan</span>
                    </div>
                    <div class="w-px h-10 bg-white/10 hidden md:block"></div>
                    <div>
                        <span class="block text-3xl font-bold text-white">On Site</span>
                        <span class="text-xs text-gray-400 uppercase tracking-widest">Penempatan</span>
                    </div>
                </div>
            </div>

            <div class="hidden md:block opacity-10 transform scale-150 translate-x-10">
                <svg class="w-64 h-64 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3l1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z" />
                </svg>
            </div>
        </div>
    </div> --}}

    <div class="pt-24 pb-12 min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="flex flex-col md:flex-row justify-between items-end mb-8 gap-4">

                <div class="relative w-full md:w-72">
                    <input type="text" placeholder="Cari posisi..."
                        class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brand-orange/50 focus:border-brand-orange shadow-sm transition-all">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($lowongan as $item)
                    <div
                        class="bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-lg hover:border-brand-blue/30 transition-all duration-300 flex flex-col h-full group">
                        <div class="p-6 flex-1">
                            <div class="flex items-start justify-between mb-1">
                                <div
                                    class="w-12 h-12 bg-blue-50 text-brand-blue rounded-lg flex items-center justify-center mb-4 group-hover:bg-brand-blue group-hover:text-white transition-colors">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg>
                                </div>
                                <span
                                    class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full font-bold">Aktif</span>
                            </div>

                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $item->nama_posisi }}</h3>
                            <p class="text-gray-500 text-sm line-clamp-3 mb-4">
                                {{ $item->deskripsi }}
                            </p>

                            <div class="flex flex-wrap gap-2 mb-4">
                                <span
                                    class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded border border-gray-200 flex items-center">
                                    <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Penempatan Sesuai Site
                                </span>
                                <span
                                    class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded border border-gray-200">Full
                                    Time</span>
                            </div>
                        </div>

                        <div
                            class="px-6 py-4 bg-gray-50 border-t border-gray-100 rounded-b-xl flex justify-between items-center">
                            <span class="text-xs text-gray-400">Diposting
                                {{ $item->created_at->diffForHumans() }}</span>
                            <a href="{{ route('kandidat.lowongan.show', $item->id) }}"
                                class="text-sm font-bold text-brand-orange hover:text-orange-700 flex items-center group-hover:underline">
                                Detail & Lamar
                                <svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div
                        class="col-span-1 md:col-span-3 py-16 text-center bg-white rounded-2xl border border-dashed border-gray-300">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Belum Ada Lowongan</h3>
                        <p class="text-gray-500 text-sm mt-1">Cek kembali nanti untuk posisi terbaru.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $lowongan->links() }}
            </div>
        </div>
    </div>
    <x-footer></x-footer>
</x-layout>
