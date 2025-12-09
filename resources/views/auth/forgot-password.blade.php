<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <body class="font-sans antialiased bg-gray-50">
        <div class="min-h-screen flex flex-col items-center justify-center p-6 relative overflow-hidden">
            <div
                class="absolute top-0 left-0 w-full h-64 bg-brand-navy transform -skew-y-6 origin-top-left -translate-y-20 z-0">
            </div>

            <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 relative z-10 border border-gray-100">

                <a href="{{ route('login') }}"
                    class="absolute top-4 left-4 text-gray-400 hover:text-brand-orange transition-colors">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>

                <div class="text-center mb-8">
                    <div class="inline-flex justify-center items-center p-3 bg-brand-gray rounded-full mb-4">
                        <svg class="w-8 h-8 text-brand-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-brand-navy">Lupa Password?</h2>
                    <p class="text-sm text-gray-500 mt-2">Masukkan email Anda untuk menerima link reset password.</p>
                </div>

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('password.email') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-semibold text-brand-navy mb-2">Email
                            Terdaftar</label>
                        <input type="email" name="email" id="email" required
                            class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 text-brand-navy focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-all"
                            placeholder="nama@email.com">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full bg-brand-navy hover:bg-brand-blue text-white font-bold py-3 px-6 rounded-lg shadow-lg transition-all">
                        Kirim Link Reset
                    </button>
                </form>
            </div>
        </div>
    </body>
</x-layout>
