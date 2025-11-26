<nav id="main-nav" class="fixed top-0 left-0 w-full z-50 transition-all duration-300 border-b border-transparent">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between">
            
            <div class="flex items-center gap-3">
                <img class="h-10 w-auto" src="assets/img/Logo-09.png" alt="Logo Indoteknik">
                <span class="text-white font-bold text-xl tracking-wide hidden sm:block">
                    INDOTEKNIK
                </span>
            </div>

            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="#" class="bg-brand-blue text-white rounded-md px-3 py-2 text-sm font-medium">
                        Beranda
                    </a>

                    <a href="#" class="text-gray-300 hover:bg-brand-orange hover:text-white rounded-md px-3 py-2 text-sm font-medium transition duration-300">
                        Tentang Kami
                    </a>
                    <a href="#" class="text-gray-300 hover:bg-brand-orange hover:text-white rounded-md px-3 py-2 text-sm font-medium transition duration-300">
                        Layanan
                    </a>
                    <a href="#" class="text-gray-300 hover:bg-brand-orange hover:text-white rounded-md px-3 py-2 text-sm font-medium transition duration-300">
                        Kontak
                    </a>
                </div>
            </div>

            <div class="hidden md:block">
                <a href="#" class="bg-brand-orange hover:bg-orange-600 text-white font-bold py-2 px-6 rounded-full shadow-lg transition transform hover:scale-105">
                    Login
                </a>
            </div>

            <div class="-mr-2 flex md:hidden">
                <button type="button" onclick="toggleMobileMenu()" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-brand-blue hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="sr-only">Buka menu utama</span>
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="hidden md:hidden bg-brand-navy border-t border-brand-blue" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <a href="#" class="bg-brand-blue text-white block rounded-md px-3 py-2 text-base font-medium">Beranda</a>
            <a href="#" class="text-gray-300 hover:bg-brand-orange hover:text-white block rounded-md px-3 py-2 text-base font-medium">Tentang Kami</a>
            <a href="#" class="text-gray-300 hover:bg-brand-orange hover:text-white block rounded-md px-3 py-2 text-base font-medium">Layanan</a>
            <a href="#" class="text-gray-300 hover:bg-brand-orange hover:text-white block rounded-md px-3 py-2 text-base font-medium">Kontak</a>
            <a href="#" class="text-brand-orange font-bold block rounded-md px-3 py-2 text-base">Login</a>
        </div>
    </div>
</nav>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    }
</script>