<x-layout>

<body class="font-sans antialiased bg-gray-50">

    <div class="min-h-screen flex flex-col items-center justify-center p-6 relative overflow-hidden">


        <div
            class="absolute top-0 left-0 w-full h-64 bg-brand-navy transform -skew-y-6 origin-top-left -translate-y-20 z-0">
        </div>

        <div
            class="w-full max-w-md bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] p-8 relative z-10 border border-gray-100">

            <a href="{{ route('home') }}"
                class="absolute top-3 left-3 text-gray-400 hover:text-brand-orange transition-colors duration-300 p-1"
                title="Kembali ke Beranda">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>

            <div class="text-center mb-8">
                <div class="inline-flex justify-center items-center p-3 bg-brand-gray rounded-full mb-4">
                    <img src="{{ asset('assets/img/Logo-09.png') }}" alt="Logo" class="h-10 w-auto">
                </div>
                <h2 class="text-2xl font-bold text-brand-navy">Login Dashboard</h2>
                <p class="text-sm text-gray-500 mt-2">
                    Belum terdaftar? <a href="/register" class="text-brand-blue hover:underline font-medium">Daftar
                        Disini!</a>
                </p>
            </div>

            <form action="{{ route('login.process') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-semibold text-brand-navy mb-2">Email</label>
                    <input type="email" name="email" id="email" required
                        class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 text-brand-navy placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-all"
                        placeholder="nama@indoteknik.com">
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-brand-navy mb-2">Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 text-brand-navy placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-all"
                        placeholder="••••••••">
                </div>

                <div class="flex items-center justify-between pt-2">
                    <button type="submit"
                        class="group bg-brand-orange hover:bg-orange-600 text-white font-bold py-2.5 px-6 rounded-lg shadow-lg shadow-orange-500/30 transition-all duration-300 transform hover:-translate-y-0.5 flex items-center gap-2">
                        Sign In
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>

                    <a href="#" class="text-sm text-gray-500 hover:text-brand-navy transition-colors">
                        Lupa Password?
                    </a>
                </div>
            </form>
        </div>

        <div class="mt-8 text-center relative z-10">
            <p class="text-gray-400 text-xs uppercase tracking-widest font-semibold">
                Sistem Informasi &copy; {{ date('Y') }} <span class="text-brand-navy">Indoteknik</span>
            </p>
        </div>

    </div>

</body>
</x-layout>