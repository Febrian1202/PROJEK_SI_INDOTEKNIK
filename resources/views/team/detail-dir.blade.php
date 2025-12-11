<x-layout>
    <x-slot:title>Direktur Utama</x-slot:title>

    <body class="font-sans antialiased bg-gray-50">

        <x-nav-bar />

        <div class="bg-brand-navy h-64 w-full absolute top-0 z-0">
            <div class="absolute inset-0 bg-white/5 opacity-30"
                style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 20px 20px;">
            </div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-12">

            <div class="mb-6">
                <a href="{{ route('home') }}"
                    class="inline-flex items-center text-white/80 hover:text-white transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Tim Kami
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 sticky top-24">

                        <div class="relative h-80 bg-gray-200 group overflow-hidden">
                            <img src="{{ asset('assets/img/team/ilham-nafruddin.png') }}"
                                alt="Foto Profil"
                                class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-105">

                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

                            <div class="absolute bottom-4 left-4 text-white">
                                <span
                                    class="bg-brand-orange px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider shadow-sm">Direktur
                                    Utama</span>
                            </div>
                        </div>

                        <div class="p-6 space-y-6">
                            <div>
                                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Informasi
                                    Kontak</h3>
                                <ul class="space-y-4">
                                    <li class="flex items-start gap-3 text-sm">
                                        <div
                                            class="shrink-0 w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-brand-blue">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-gray-500 text-xs">Email</p>
                                            <a href="mailto:budi.santoso@indoteknik.com"
                                                class="font-medium text-brand-navy hover:text-brand-orange transition-colors">lorem@indoteknik.com</a>
                                        </div>
                                    </li>
                                    <li class="flex items-start gap-3 text-sm">
                                        <div
                                            class="shrink-0 w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-brand-blue">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-gray-500 text-xs">Telepon</p>
                                            <p class="font-medium text-brand-navy">(0405) 2310860</p>
                                        </div>
                                    </li>
                                    <li class="flex items-start gap-3 text-sm">
                                        <div
                                            class="shrink-0 w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-brand-blue">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-gray-500 text-xs">Lokasi</p>
                                            <p class="font-medium text-brand-navy">Head Office, Kendari</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="pt-6 border-t border-gray-100">
                                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Social Media
                                </h3>
                                <div class="flex gap-2">
                                    <a href="#"
                                        class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500 hover:bg-[#0077b5] hover:text-white transition-all duration-300">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                        </svg>
                                    </a>
                                    <a href="#"
                                        class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500 hover:bg-pink-600 hover:text-white transition-all duration-300">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 space-y-8">

                    <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                        <h1 class="text-3xl font-bold text-brand-navy mb-2">Muh. Ilham Nafruddin</h1>
                        <p class="text-gray-500 text-lg">Direktur Utama</p>
                        <div class="h-1 w-20 bg-brand-orange rounded-full mt-4"></div>

                        <div class="mt-6 prose text-gray-600 leading-relaxed text-justify">
                            <p>
                                Muh. Ilham Nafruddin adalah seorang profesional berpengalaman dengan rekam jejak lebih dari 15
                                tahun di industri konstruksi dan manajemen proyek. Beliau memiliki visi yang kuat dalam
                                mengembangkan infrastruktur berkelanjutan yang tidak hanya fungsional tetapi juga ramah
                                lingkungan.
                            </p>
                            <p class="mt-4">
                                Sebagai Direktur Utama PT. Indoteknik Prima Mekongga, beliau bertanggung jawab atas arah
                                strategis perusahaan, pengawasan operasional proyek skala besar, serta membangun
                                kemitraan jangka panjang dengan klien di sektor pertambangan dan pemerintahan.
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="p-2 bg-brand-orange/10 rounded-lg text-brand-orange">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-brand-navy">Pendidikan</h3>
                            </div>
                            <ul class="space-y-4">
                                <li class="relative pl-6 border-l-2 border-gray-200">
                                    <div class="absolute -left-[5px] top-1.5 w-2.5 h-2.5 rounded-full bg-brand-orange">
                                    </div>
                                    <p class="text-sm font-bold text-gray-800">S1 Teknik Sipil</p>
                                    <p class="text-xs text-gray-500">Universitas Hasanuddin (2005 - 2009)</p>
                                </li>
                                <li class="relative pl-6 border-l-2 border-gray-200">
                                    <div class="absolute -left-[5px] top-1.5 w-2.5 h-2.5 rounded-full bg-gray-300">
                                    </div>
                                    <p class="text-sm font-bold text-gray-800">Magister Manajemen</p>
                                    <p class="text-xs text-gray-500">Universitas Gadjah Mada (2012 - 2014)</p>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-white rounded-2xl shadow-sm p-6 border border-gray-100">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="p-2 bg-blue-100 rounded-lg text-brand-blue">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-bold text-brand-navy">Sertifikasi</h3>
                            </div>
                            <ul class="space-y-3">
                                <li class="flex items-center gap-2 text-sm text-gray-600">
                                    <svg class="w-4 h-4 text-green-500" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Ahli K3 Konstruksi Utama
                                </li>
                                <li class="flex items-center gap-2 text-sm text-gray-600">
                                    <svg class="w-4 h-4 text-green-500" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Project Management Professional (PMP)
                                </li>
                                <li class="flex items-center gap-2 text-sm text-gray-600">
                                    <svg class="w-4 h-4 text-green-500" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    IAMPI Certified Engineer
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm p-8 border border-gray-100">
                        <h3 class="text-lg font-bold text-brand-navy mb-6">Keahlian & Kompetensi</h3>
                        <div class="space-y-4">

                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium text-gray-700">Manajemen Proyek</span>
                                    <span class="text-sm font-medium text-brand-orange">95%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-brand-navy h-2 rounded-full" style="width: 95%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium text-gray-700">Analisis Struktur</span>
                                    <span class="text-sm font-medium text-brand-orange">90%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-brand-navy h-2 rounded-full" style="width: 90%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium text-gray-700">Kepemimpinan Tim</span>
                                    <span class="text-sm font-medium text-brand-orange">85%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-brand-navy h-2 rounded-full" style="width: 85%"></div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <x-footer />

    </body>
</x-layout>
