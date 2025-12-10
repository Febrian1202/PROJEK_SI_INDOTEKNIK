<nav id="main-nav" class="fixed top-0 left-0 w-full z-50 transition-all duration-300 border-b border-transparent"
    x-data="{ mobileMenuOpen: false, scrolled: false, dropdownOpen: false }" @scroll.window="scrolled = (window.scrollY > 50)"
    :class="scrolled ? 'bg-brand-navy shadow-lg border-brand-blue/20 py-2' : 'bg-transparent py-4'">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">

            <a href="{{ route('home') }}">
                <div class="flex items-center gap-3">
                    <img class="h-10 w-auto" src="{{ asset('assets/img/Logo-09.png') }}" alt="Logo Indoteknik">
                    <span class="text-white font-bold text-xl tracking-wide hidden sm:block font-sans">
                        INDOTEKNIK
                    </span>
                </div>
            </a>

            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="{{ route('home') }}"
                        class="relative group font-medium text-base px-1 py-2 transition-colors duration-300 {{ request()->routeIs('home') ? 'text-white hover:text-brand-orange' : 'text-gray-300 hover:text-white' }}">
                        Beranda
                        <span
                            class="absolute bottom-0 left-0 {{ request()->routeIs('home') ? 'w-full' : 'w-0 group-hover:w-full transition-all duration-300 ease-out' }} h-0.5 bg-brand-orange rounded-full"></span>
                    </a>
                    <a href="{{ route('about') }}"
                        class="relative group font-medium text-base px-1 py-2 transition-colors duration-300 {{ request()->routeIs('about') ? 'text-white hover:text-brand-orange' : 'text-gray-300 hover:text-white' }}">
                        Tentang Kami
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-brand-orange {{ request()->routeIs('about') ? 'w-full' : 'w-0 group-hover:w-full transition-all duration-300 ease-out' }} rounded-full"></span>
                    </a>
                    <a href="{{ route('service') }}"
                        class="relative group font-medium text-base px-1 py-2 transition-colors duration-300 {{ request()->routeIs('service') ? 'text-white hover:text-brand-orange' : 'text-gray-300 hover:text-white' }}">
                        Layanan
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-brand-orange rounded-full {{ request()->routeIs('service') ? 'w-full' : 'w-0 group-hover:w-full transition-all duration-300 ease-out' }}"></span>
                    </a>
                    <a href="{{ route('contact') }}"
                        class="relative group font-medium text-base px-1 py-2 transition-colors duration-300 {{ request()->routeIs('contact') ? 'text-white hover:text-brand-orange' : 'text-gray-300 hover:text-white' }}">
                        Kontak
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-brand-orange rounded-full {{ request()->routeIs('contact') ? 'w-full' : 'w-0 group-hover:w-full transition-all duration-300 ease-out' }}"></span>
                    </a>
                </div>
            </div>

            <div class="hidden md:block">
                @guest
                    <div class="flex items-center gap-4">
                        <a href="{{ route('login') }}"
                            class="text-white font-medium hover:text-brand-orange transition-colors px-3 py-2">Masuk</a>
                        <a href="{{ route('register') }}"
                            class="bg-white text-brand-navy hover:bg-brand-orange hover:text-white font-bold py-2 px-5 rounded-lg shadow-md transition-all duration-300 transform hover:-translate-y-0.5 border border-transparent">Daftar</a>
                    </div>
                @endguest

                @auth
                    <div class="relative">
                        <button @click="dropdownOpen = !dropdownOpen" @click.outside="dropdownOpen = false"
                            class="flex items-center gap-2 text-white hover:text-brand-orange transition-colors focus:outline-none">
                            <div
                                class="h-9 w-9 rounded-full bg-brand-orange border-2 border-white/20 overflow-hidden flex items-center justify-center">
                                @if (Auth::user()->kandidatProfil && Auth::user()->kandidatProfil->foto)
                                    <img src="{{ asset('storage/' . Auth::user()->kandidatProfil->foto) }}" alt="Foto"
                                        class="w-full h-full object-cover">
                                @else
                                    <span
                                        class="text-white font-bold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                @endif
                            </div>
                            <span class="font-medium text-base max-w-[150px] truncate">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="dropdownOpen ? 'rotate-180' : ''"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="dropdownOpen" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                            class="absolute right-0 mt-3 w-48 bg-white rounded-xl shadow-2xl py-2 border border-gray-100 overflow-hidden z-50"
                            style="display: none;">
                            <div class="px-4 py-3 border-b border-gray-100 bg-gray-50">
                                <p class="text-sm text-gray-500">Halo,</p>
                                <p class="text-sm font-bold text-brand-navy truncate">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-brand-orange mt-0.5 uppercase">{{ Auth::user()->role ?? 'User' }}
                                </p>
                            </div>
                            <a href="{{ route(Auth::user()->role . '.dashboard') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-brand-gray hover:text-brand-blue transition-colors">Dashboard</a>
                            @if (Auth::user()->role == 'kandidat')
                                <a href="{{ route('profil.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-brand-gray hover:text-brand-blue transition-colors">Profil
                                    Saya</a>
                            @endif
                            <div class="border-t border-gray-100 my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>

            <div class="-mr-2 flex md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button"
                    class="inline-flex items-center justify-center rounded-md p-2 text-white hover:bg-white/10 focus:outline-none transition-colors">

                    <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>

                    <svg x-show="mobileMenuOpen" style="display: none;" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="mobileMenuOpen" style="display: none;" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="md:hidden bg-brand-navy border-t border-white/10 absolute w-full left-0 top-16 shadow-xl">

        <div class="space-y-1 px-4 pb-5 pt-3">

            <a href="{{ route('home') }}"
                class="block rounded-md px-3 py-2 text-base font-medium transition-colors 
               {{ request()->routeIs('home') ? 'bg-brand-blue/20 text-white border-l-4 border-brand-orange' : 'text-gray-300 hover:bg-brand-orange hover:text-white' }}">
                Beranda
            </a>

            <a href="{{ route('about') }}"
                class="block rounded-md px-3 py-2 text-base font-medium transition-colors 
               {{ request()->routeIs('about') ? 'bg-brand-blue/20 text-white border-l-4 border-brand-orange' : 'text-gray-300 hover:bg-brand-orange hover:text-white' }}">
                Tentang Kami
            </a>

            <a href="{{ route('service') }}"
                class="block rounded-md px-3 py-2 text-base font-medium transition-colors 
               {{ request()->routeIs('service') ? 'bg-brand-blue/20 text-white border-l-4 border-brand-orange' : 'text-gray-300 hover:bg-brand-orange hover:text-white' }}">
                Layanan
            </a>

            <a href="{{ route('contact') }}"
                class="block rounded-md px-3 py-2 text-base font-medium transition-colors 
               {{ request()->routeIs('contact') ? 'bg-brand-blue/20 text-white border-l-4 border-brand-orange' : 'text-gray-300 hover:bg-brand-orange hover:text-white' }}">
                Kontak
            </a>

            @guest
                <div class="border-t border-white/10 my-3 pt-3 flex flex-col gap-2">
                    <a href="{{ route('login') }}"
                        class="block w-full text-center rounded-md border border-white/20 px-3 py-2 text-base font-medium text-white hover:bg-white/10">Masuk</a>
                    <a href="{{ route('register') }}"
                        class="block w-full text-center rounded-md bg-brand-orange px-3 py-2 text-base font-medium text-white hover:bg-orange-600 shadow-sm">Daftar
                        Akun</a>
                </div>
            @endguest

            @auth
                <div class="border-t border-white/10 my-3 pt-3">
                    <div class="flex items-center gap-3 px-3 mb-3">
                        <div
                            class="h-10 w-10 rounded-full bg-brand-orange flex items-center justify-center text-white font-bold border-2 border-white/20">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div class="text-white">
                            <div class="text-base font-medium leading-none">{{ Auth::user()->name }}</div>
                            <div class="text-xs text-brand-orange mt-1 uppercase">{{ Auth::user()->role ?? 'User' }}</div>
                        </div>
                    </div>

                    <a href="{{ route(Auth::user()->role . '.dashboard') }}"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-brand-orange hover:text-white">Dashboard</a>
                    @if (Auth::user()->role == 'kandidat')
                        <a href="{{ route('profil.index') }}"
                            class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-brand-orange hover:text-white">Profil
                            Saya</a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}" class="mt-2">
                        @csrf
                        <button type="submit"
                            class="block w-full rounded-md px-3 py-2 text-left text-base font-medium text-red-400 hover:bg-red-500/10 hover:text-red-300 transition-colors">
                            Keluar
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</nav>
