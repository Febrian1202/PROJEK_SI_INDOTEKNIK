<x-layout title="Syarat & Ketentuan">
    <x-slot:title>Syarat & Ketentuan</x-slot:title>

    <nav class="bg-brand-navy border-b border-gray-200 fixed top-0 w-full z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <div class="flex items-center gap-4">
                    <a href="{{ route('kandidat.dashboard') }}"
                        class="p-2 rounded-lg text-white hover:bg-gray-100 hover:text-brand-orange transition-colors"
                        title="Kembali ke Beranda">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </a>

                    <div class="h-6 w-px bg-gray-300 hidden md:block"></div>

                    <div class="flex flex-col">
                        <span class="text-xl font-bold text-white">Syarat & Ketentuan</span>
                        <span class="text-xs text-brand-gray hidden md:block">Informasi kebijakan perusahaan dan persyaratan umum.</span>
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
            
            

            <div class="text-center mb-10">
                <h1 class="text-3xl font-bold text-brand-navy mb-2">Syarat & Ketentuan</h1>
                <p class="text-gray-600">Ketentuan penggunaan portal rekrutmen PT. Indoteknik Prima Mekongga.</p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 md:p-10 space-y-8">
                
                <div class="mt-3">
                    <h3 class="text-lg font-bold text-brand-navy mb-1 flex items-center gap-2">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-brand-blue/10 text-brand-blue text-sm">1</span>
                        Keaslian Data
                    </h3>
                    <p class="text-gray-600 leading-relaxed pl-10 text-justify">
                        Pelamar wajib memberikan informasi dan dokumen yang benar, akurat, dan dapat dipertanggungjawabkan. Pemalsuan dokumen atau manipulasi data akan mengakibatkan diskualifikasi secara otomatis dari proses seleksi dan dapat diproses sesuai hukum yang berlaku.
                    </p>
                </div>

                <div class="mt-3">
                    <h3 class="text-lg font-bold text-brand-navy mb-1 flex items-center gap-2">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-brand-blue/10 text-brand-blue text-sm">2</span>
                        Proses Seleksi
                    </h3>
                    <p class="text-gray-600 leading-relaxed pl-10 text-justify">
                        Keputusan panitia seleksi rekrutmen bersifat mutlak dan tidak dapat diganggu gugat. PT. Indoteknik Prima Mekongga berhak untuk membatalkan atau menunda proses rekrutmen sewaktu-waktu tanpa pemberitahuan sebelumnya jika diperlukan.
                    </p>
                </div>

                <div class="mt-3">
                    <h3 class="text-lg font-bold text-brand-navy mb-1 flex items-center gap-2">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-brand-blue/10 text-brand-blue text-sm">3</span>
                        Biaya Rekrutmen
                    </h3>
                    <div class="pl-10">
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r">
                            <p class="text-red-700 font-medium">
                                <strong>PENTING:</strong> Seluruh proses rekrutmen ini TIDAK DIPUNGUT BIAYA apapun (GRATIS).
                            </p>
                        </div>
                        <p class="text-gray-600 leading-relaxed mt-3 text-justify">
                            Hati-hati terhadap penipuan yang mengatasnamakan PT. Indoteknik Prima Mekongga. Kami tidak pernah bekerjasama dengan agen perjalanan (travel) manapun dalam proses seleksi ini.
                        </p>
                    </div>
                </div>

                <div class="mt-3">
                    <h3 class="text-lg font-bold text-brand-navy mb-1 flex items-center gap-2">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-brand-blue/10 text-brand-blue text-sm">4</span>
                        Kerahasiaan Data
                    </h3>
                    <p class="text-gray-600 leading-relaxed pl-10 text-justify">
                        Seluruh data pribadi dan dokumen yang diunggah pelamar akan dijaga kerahasiaannya dan hanya digunakan untuk kepentingan proses seleksi dan administrasi kepegawaian internal perusahaan.
                    </p>
                </div>

                <div class="mt-3">
                    <h3 class="text-lg font-bold text-brand-navy mb-1 flex items-center gap-2">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-brand-blue/10 text-brand-blue text-sm">5</span>
                        Penempatan Kerja
                    </h3>
                    <p class="text-gray-600 leading-relaxed pl-10 text-justify">
                        Pelamar yang dinyatakan lolos seleksi harus bersedia ditempatkan di seluruh wilayah operasional kerja PT. Indoteknik Prima Mekongga (termasuk Site Pomalaa, Morosi, Mandiodo, dan lokasi lainnya) sesuai kebutuhan perusahaan.
                    </p>
                </div>

            </div>

            <div class="mt-8 text-center text-sm text-gray-500">
                Terakhir diperbarui: {{ date('d F Y') }}
            </div>

        </div>
    </div>

</x-layout>