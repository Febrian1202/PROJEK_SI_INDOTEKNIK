<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP - Indoteknik</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="assets/img/Logo-09.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen flex flex-col items-center justify-center p-6 relative overflow-hidden">
        @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
                    <strong class="font-bold">Berhasil!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative" role="alert">
                    <strong class="font-bold">Gagal!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
        <div class="absolute top-0 left-0 w-full h-64 bg-brand-navy transform -skew-y-6 origin-top-left -translate-y-20 z-0"></div>
        
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 relative z-10 border border-gray-100">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-brand-navy">Verifikasi Email</h2>
                <p class="text-sm text-gray-500 mt-2">
                    Kami telah mengirimkan kode 6 digit ke <br>
                    <span class="font-bold text-brand-blue">{{ request('email') }}</span>
                </p>
            </div>

            

            <form action="{{ route('verification.verify') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="email" value="{{ old('email', $email ?? request('email')) }}">

                <div>
                    <label class="block text-sm font-semibold text-brand-navy mb-2 text-center">Masukkan Kode OTP</label>
                    <input type="text" name="otp" required maxlength="6"
                        class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 text-center text-2xl tracking-[10px] font-bold text-brand-navy focus:ring-2 focus:ring-brand-orange focus:border-transparent transition-all"
                        placeholder="000000">
                    @error('otp') <p class="text-red-500 text-xs mt-2 text-center">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="w-full bg-brand-orange hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition-all">
                    Verifikasi Akun
                </button>
            </form>
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Belum menerima kode?
                </p>
                
                <form action="{{ route('verification.resend') }}" method="POST" class="inline-block mt-2">
                    @csrf
                    <input type="hidden" name="email" value="{{ request('email') ?? $email }}">
                    
                    <button type="submit" class="text-sm font-bold text-brand-orange hover:text-orange-700 hover:underline transition-colors bg-transparent border-none cursor-pointer">
                        Kirim Ulang Kode
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>