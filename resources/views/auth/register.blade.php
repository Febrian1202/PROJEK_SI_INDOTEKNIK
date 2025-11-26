<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - PT. Indoteknik Prima Mekongga</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>
<body class="font-sans antialiased bg-gray-50">

    <div class="min-h-screen flex flex-col items-center justify-center p-6 relative overflow-hidden">
        
        <div class="absolute top-0 left-0 w-full h-64 bg-brand-navy transform -skew-y-6 origin-top-left -translate-y-20 z-0"></div>
        
        <div class="w-full max-w-lg bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] p-8 relative z-10 border border-gray-100">
            
            <div class="text-center mb-8">
                <div class="inline-flex justify-center items-center p-3 bg-brand-gray rounded-full mb-4">
                    <img src="{{ asset('assets/img/Logo-09.png') }}" alt="Logo" class="h-10 w-auto">
                </div>
                <h2 class="text-2xl font-bold text-brand-navy">Buat Akun Baru</h2>
                <p class="text-sm text-gray-500 mt-2">
                    Sudah punya akun? <a href="{{ route('login') }}" class="text-brand-blue hover:underline font-medium">Masuk di sini</a>
                </p>
            </div>

            <form action="{{ route('register.process') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-semibold text-brand-navy mb-2">Nama Lengkap</label>
                    <input type="text" name="name" id="name" required 
                        class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 text-brand-navy placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-all"
                        placeholder="Contoh: Budi Santoso">
                </div>

                <div>
                    <label for="email" class="block text-sm font-semibold text-brand-navy mb-2">Alamat Email</label>
                    <input type="email" name="email" id="email" required 
                        class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 text-brand-navy placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-all"
                        placeholder="nama@indoteknik.com">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="password" class="block text-sm font-semibold text-brand-navy mb-2">Password</label>
                        <input type="password" name="password" id="password" required 
                            class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 text-brand-navy placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-all"
                            placeholder="••••••••">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-brand-navy mb-2">Ulangi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required 
                            class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 text-brand-navy placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-all"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="terms" name="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-brand-orange/30 accent-brand-orange" required>
                    </div>
                    <label for="terms" class="ml-2 text-sm font-medium text-gray-500">
                        Saya setuju dengan <a href="#" class="text-brand-blue hover:underline">Syarat & Ketentuan</a> yang berlaku.
                    </label>
                </div>

                <button type="submit" class="w-full group bg-brand-orange hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg shadow-lg shadow-orange-500/30 transition-all duration-300 transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                    Daftar Sekarang
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </form>
        </div>

        <div class="mt-8 text-center relative z-10">
            <p class="text-gray-400 text-xs uppercase tracking-widest font-semibold">
                Sistem Informasi &copy; {{ date('Y') }} <span class="text-brand-navy">Indoteknik</span>
            </p>
        </div>

    </div>

</body>
</html>