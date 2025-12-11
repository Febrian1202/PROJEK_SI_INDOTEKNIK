<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

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

                <div class="text-center mb-8">
                </div>

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 text-red-700">
                        <p class="font-bold">Gagal Masuk</p>
                        <p class="text-sm">{{ $errors->first('email') }}</p>
                    </div>
                @endif
                <form action="{{ route('login.process') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-semibold text-brand-navy mb-2">Email</label>
                        <input type="email" name="email" id="email" required
                            class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 text-brand-navy placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-all"
                            placeholder="nama@indoteknik.com">
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>

                        <div class="relative" x-data="{ show: false }">

                            <input :type="show ? 'text' : 'password'" name="password" id="password" required
                                placeholder="••••••••"
                                class="w-full pl-4 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand-orange/50 focus:border-brand-orange transition-all">

                            <button type="button" @click="show = !show"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-brand-navy transition-colors focus:outline-none">
                                <svg x-show="!show" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>

                                <svg x-show="show" style="display: none;" class="w-5 h-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
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

                        <a href="{{ route('password.request') }}"
                            class="text-sm text-gray-500 hover:text-brand-navy transition-colors">
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
