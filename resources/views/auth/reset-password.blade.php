<x-layout>
    <x-slot:title>Reset Password</x-slot:title>

    <body class="font-sans antialiased bg-gray-50">
        <div class="min-h-screen flex flex-col items-center justify-center p-6 relative overflow-hidden">
            <div
                class="absolute top-0 left-0 w-full h-64 bg-brand-navy transform -skew-y-6 origin-top-left -translate-y-20 z-0">
            </div>

            <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 relative z-10 border border-gray-100">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-brand-navy">Buat Password Baru</h2>
                    <p class="text-sm text-gray-500 mt-2">Silakan masukkan password baru Anda.</p>
                </div>

                <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div>
                        <label class="block text-sm font-semibold text-brand-navy mb-2">Email</label>
                        <input type="email" name="email" value="{{ $email ?? old('email') }}" readonly
                            class="w-full px-4 py-3 rounded-lg bg-gray-100 border border-gray-200 text-gray-500 cursor-not-allowed">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-brand-navy mb-2">Password Baru</label>
                        <input type="password" name="password" required
                            class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-all"
                            placeholder="Minimal 8 karakter">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-brand-navy mb-2">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" required
                            class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-all"
                            placeholder="Ulangi password">
                    </div>

                    <button type="submit"
                        class="w-full bg-brand-orange hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition-all">
                        Simpan Password Baru
                    </button>
                </form>
            </div>
        </div>
    </body>
</x-layout>
