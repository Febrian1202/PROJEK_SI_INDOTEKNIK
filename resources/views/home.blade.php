<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <body class="font-sans antialiased">
        <x-nav-bar></x-nav-bar>
        {{-- <div class="relative w-full h-screen">

            <div class="absolute inset-0 bg-cover bg-center"
                style="background-image: url('assets/img/pexels-yury-kim-181374-585419.jpg')">
            </div>

            <div class="absolute inset-0 bg-black/60"></div>



            <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">

                <img src="{{ asset('assets/img/Logo-white v3.png') }}" 
                    alt="Logo Indoteknik" 
                    class="h-auto w-4/5 md:w-1/2 max-w-3xl mb-6 mx-auto drop-shadow-[0_5px_15px_rgba(0,0,0,0.8)] brightness-110">

                <div class="w-16 h-1 bg-brand-blue mb-6"></div>

                <p class="text-gray-200 max-w-2xl text-base md:text-lg mb-8 leading-relaxed">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates et aperiam dignissimos dolorem
                    ipsum nam excepturi veniam esse provident quasi. Quas autem odit vitae, iusto rem reprehenderit
                    pariatur suscipit labore.
                </p>

                <a href="#"
                    class="border border-brand-blue text-white px-8 py-3 rounded-full font-semibold hover:bg-brand-blue hover:text-black transition duration-300 uppercase tracking-widest text-sm">
                    Get Started
                </a>
            </div>

            <button
                class="absolute left-4 top-1/2 -translate-y-1/2 z-20 text-white/50 hover:text-white hover:bg-white/10 p-2 rounded-full transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-10 h-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </button>
            <button
                class="absolute right-4 top-1/2 -translate-y-1/2 z-20 text-white/50 hover:text-white hover:bg-white/10 p-2 rounded-full transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-10 h-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </button>
        </div> --}}
        <section>
            <div class="relative w-full h-screen overflow-hidden group" x-data="{
                active: 0,
                images: [
                    '{{ asset('assets/img/dokumentasi/1.webp') }}',
                    'assets/img/dokumentasi/5.webp', // Gambar Dummy 2
                    'assets/img/dokumentasi/3.webp' // Gambar Dummy 3
                ],
                next() {
                    this.active = (this.active + 1) % this.images.length;
                },
                prev() {
                    this.active = (this.active - 1 + this.images.length) % this.images.length;
                },
                init() {
                    // Auto slide setiap 5 detik (Opsional, hapus jika tidak mau)
                    setInterval(() => { this.next() }, 7000);
                }
            }">

                <div class="absolute inset-0 flex transition-transform duration-700 ease-in-out will-change-transform"
                    :style="'transform: translateX(-' + (active * 100) + '%)'">

                    <template x-for="img in images">
                        <div class="min-w-full h-full bg-cover bg-center" :style="`background-image: url('${img}')`">
                        </div>
                    </template>

                </div>

                <div class="absolute inset-0 bg-black/40 z-10"></div>

                <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">

                    <img src="{{ asset('assets/img/Logo-white v3.png') }}" alt="Logo Indoteknik"
                        class="h-auto w-4/5 md:w-1/2 max-w-3xl mb-6 mx-auto drop-shadow-[0_5px_15px_rgba(0,0,0,0.8)] brightness-110">

                    <div class="w-16 h-1 bg-brand-blue mb-6"></div>

                    <p class="text-gray-200 max-w-2xl text-base md:text-lg mb-8 leading-relaxed">
                        Kami hadir sebagai perusahaan kontraktor umum dan penyedia tenaga kerja profesional yang
                        berkomitmen
                        memberikan layanan terbaik bagi klien kami.
                    </p>

                    <a href="{{ route('login') }}"
                        class="border border-brand-blue text-white px-8 py-3 rounded-full font-semibold hover:bg-brand-blue hover:text-black transition duration-300 uppercase tracking-widest text-sm">
                        Gabung Bersama Kami
                    </a>
                </div>

                <button @click="prev()"
                    class="absolute left-4 top-1/2 -translate-y-1/2 z-30 p-3 rounded-full text-white/50 hover:text-white hover:bg-white/20 transition duration-300 focus:outline-none group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-8 h-8 group-hover:-translate-x-1 transition-transform">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>

                <button @click="next()"
                    class="absolute right-4 top-1/2 -translate-y-1/2 z-30 p-3 rounded-full text-white/50 hover:text-white hover:bg-white/20 transition duration-300 focus:outline-none group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-8 h-8 group-hover:translate-x-1 transition-transform">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>

                {{-- <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-30 flex space-x-2">
                <template x-for="(img, index) in images">
                    <button @click="active = index" class="w-3 h-3 rounded-full transition-all duration-300"
                        :class="active === index ? 'bg-brand-orange w-8' : 'bg-white/50 hover:bg-white'">
                    </button>
                </template>
            </div> --}}

            </div>
        </section>
        <section class="py-12 bg-white transition-all duration-2000 ease-out" x-data="{ shown: false }"
            x-intersect.threshold.0.3="shown = true"
            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <div class="flex items-center justify-center gap-4 mb-4">
                        <div class="h-1 w-12 bg-brand-orange rounded-full"></div>
                        <h2 class="text-3xl md:text-4xl font-bold text-brand-navy">Layanan Kami</h2>
                        <div class="h-1 w-12 bg-brand-orange rounded-full"></div>
                    </div>
                    <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                        Kami menyediakan berbagai layanan unggulan untuk memenuhi kebutuhan proyek Anda dengan standar
                        profesional dan kualitas terbaik.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <div
                        class="group bg-white p-8 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-blue/20">
                        <div
                            class="mb-6 inline-block p-4 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-blue group-hover:text-white transition-colors duration-300">
                            <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <h3
                            class="text-xl font-bold text-brand-navy mb-3 group-hover:text-brand-blue transition-colors">
                            Layanan Konstruksi Umum</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Kami melaksanakan pembangunan dan renovasi berbagai jenis bangunan serta infrastruktur
                            sesuai standar mutu dan waktu pelaksanaan.
                        </p>
                        <a href="#"
                            class="inline-flex items-center font-semibold text-brand-orange hover:text-orange-700 transition-colors">
                            Selengkapnya
                            <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>

                    <div
                        class="group bg-white p-8 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-blue/20">
                        <div
                            class="mb-6 inline-block p-4 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-blue group-hover:text-white transition-colors duration-300">
                            <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <h3
                            class="text-xl font-bold text-brand-navy mb-3 group-hover:text-brand-blue transition-colors">
                            Perdagangan Besar & Ritel</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Kami menyediakan dan mendistribusikan berbagai material teknik, peralatan industri, dan
                            kebutuhan proyek secara efisien.
                        </p>
                        <a href="#"
                            class="inline-flex items-center font-semibold text-brand-orange hover:text-orange-700 transition-colors">
                            Selengkapnya
                            <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>

                    <div
                        class="group bg-white p-8 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-blue/20">
                        <div
                            class="mb-6 inline-block p-4 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-blue group-hover:text-white transition-colors duration-300">
                            <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <h3
                            class="text-xl font-bold text-brand-navy mb-3 group-hover:text-brand-blue transition-colors">
                            Penunjang Pertambangan</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Kami mendukung kegiatan pertambangan dengan penyediaan tenaga ahli, peralatan, dan layanan
                            teknis lapangan.
                        </p>
                        <a href="#"
                            class="inline-flex items-center font-semibold text-brand-orange hover:text-orange-700 transition-colors">
                            Selengkapnya
                            <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>

                    <div
                        class="group bg-white p-8 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-blue/20">
                        <div
                            class="mb-6 inline-block p-4 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-blue group-hover:text-white transition-colors duration-300">
                            <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3
                            class="text-xl font-bold text-brand-navy mb-3 group-hover:text-brand-blue transition-colors">
                            Penyedia Tenaga Kerja Profesional</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Kami menyalurkan tenaga kerja terampil dan berpengalaman untuk mendukung kebutuhan
                            operasional di berbagai sektor industri.
                        </p>
                        <a href="#"
                            class="inline-flex items-center font-semibold text-brand-orange hover:text-orange-700 transition-colors">
                            Selengkapnya
                            <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>

                    <div
                        class="group bg-white p-8 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-blue/20">
                        <div
                            class="mb-6 inline-block p-4 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-blue group-hover:text-white transition-colors duration-300">
                            <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.75" />
                            </svg>
                        </div>
                        <h3
                            class="text-xl font-bold text-brand-navy mb-3 group-hover:text-brand-blue transition-colors">
                            Layanan Transportasi Dan Pergudangan</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Kami melayani pengangkutan dan penyimpanan material proyek dengan sistem logistik yang aman
                            dan terintegrasi.
                        </p>
                        <a href="#"
                            class="inline-flex items-center font-semibold text-brand-orange hover:text-orange-700 transition-colors">
                            Selengkapnya
                            <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>

                    <div
                        class="group bg-white p-8 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-blue/20">
                        <div
                            class="mb-6 inline-block p-4 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-blue group-hover:text-white transition-colors duration-300">
                            <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                            </svg>
                        </div>
                        <h3
                            class="text-xl font-bold text-brand-navy mb-3 group-hover:text-brand-blue transition-colors">
                            Jasa Penyewaan Dan Sewa Guna Usaha</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Kami menyediakan peralatan kerja, kendaraan operasional, dan perlengkapan proyek untuk
                            disewa sesuai kebutuhan klien.
                        </p>
                        <a href="#"
                            class="inline-flex items-center font-semibold text-brand-orange hover:text-orange-700 transition-colors">
                            Selengkapnya
                            <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>

                </div>
            </div>
        </section>
        <section class="py-24 bg-brand-navy transition-all duration-1000 ease-out" x-data="{ activeTab: 'visi', shown: false }"
            x-intersect.threshold.0.2="shown = true"
            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <div class="flex justify-center mb-12 border-b border-gray-200">
                    <div class="flex space-x-12">
                        <button @click="activeTab = 'visi'"
                            :class="activeTab === 'visi' ? 'border-brand-orange text-gray-100' :
                                'border-transparent text-gray-400 hover:text-gray-200'"
                            class="pb-4 text-[30px] font-bold border-b-4 transition-all duration-300 focus:outline-none">
                            Visi
                        </button>

                        <button @click="activeTab = 'misi'"
                            :class="activeTab === 'misi' ? 'border-brand-orange text-gray-100' :
                                'border-transparent text-gray-400 hover:text-gray-200'"
                            class="pb-4 text-[30px] font-bold border-b-4 transition-all duration-300 focus:outline-none">
                            Misi
                        </button>
                    </div>
                </div>

                <div x-show="activeTab === 'visi'" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                    <div>
                        <h3 class="text-3xl font-bold text-brand-gray mb-6">Visi Perusahaan</h3>
                        <div class="w-16 h-1 bg-brand-orange mb-6"></div>
                        <p class="text-lg text-white leading-relaxed">
                            PT. Indoteknik Prima Mekongga menjadi perusahaan barang dan jasa yang terpercaya,
                            professional dan unggul dalam kualitas, inovasi, serta mewujudkan Zero Accident di setiap
                            kegiatan. Dan memiliki kekuatan pada pelayanan terhadap mitra kerja dan memberikan kepuasan
                            dan kerja sama yang baik yang terus-menerus meningkat pada mitra kerja.
                    </div>

                    <div class="relative h-80 lg:h-96 rounded-2xl overflow-hidden shadow-xl">
                        <img src="{{ asset('assets/img/pexels-yury-kim-181374-585419.jpg') }}" alt="Foto Tim Lapangan"
                            class="absolute inset-0 w-full h-full object-cover">
                    </div>
                </div>

                <div x-show="activeTab === 'misi'" style="display: none;"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                    <div class="relative h-80 lg:h-96 rounded-2xl overflow-hidden shadow-xl">
                        <img src="{{ asset('assets/img/pexels-yury-kim-181374-585419.jpg') }}" alt="Foto Meeting"
                            class="absolute inset-0 w-full h-full object-cover grayscale hover:grayscale-0 transition duration-500">
                    </div>

                    <div>
                        <h3 class="text-3xl font-bold text-brand-gray mb-6">Misi Perusahaan</h3>
                        <div class="w-16 h-1 bg-brand-orange mb-6"></div>

                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-brand-orange mt-1 mr-3 flex-shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-white">Memberikan solusi yang efisien, tepat waktu, dan berkualitas
                                    tinggi.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-brand-orange mt-1 mr-3 flex-shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-white">Menerapkan standar keselamatan kerja tertinggi di setiap
                                    kegiatan.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-brand-orange mt-1 mr-3 flex-shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-white">Membangun kemitraan jangka panjang dengan klien dan mitra
                                    kerja.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-brand-orange mt-1 mr-3 flex-shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-white">Mengembangkan sumber daya manusia yang kompeten dan
                                    profesional.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-brand-orange mt-1 mr-3 flex-shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-white">Mendorong penggunaan teknologi modern untuk meningkatkan
                                    produktivitas dan akurasi kerja.</span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>
        <section class="py-16 bg-white transition-all duration-1000 ease-out" x-data="{ shown: false }"
            x-intersect.threshold.0.1="shown = true"
            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <div class="text-center mb-16">
                    <div class="flex items-center justify-center gap-4 mb-4">
                        <div class="h-1 w-12 bg-brand-orange rounded-full"></div>
                        <h2 class="text-3xl md:text-4xl font-bold text-brand-navy">Our Team</h2>
                        <div class="h-1 w-12 bg-brand-orange rounded-full"></div>
                    </div>
                    <p class="text-gray-600 max-w-3xl mx-auto text-lg">
                        Kami percaya bahwa setiap keberhasilan proyek adalah hasil kerja tim yang solid. Dipimpin oleh
                        individu berpengalaman dan berdedikasi untuk memberikan hasil terbaik.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 justify-items-center">

                    <div
                        class="w-full max-w-sm bg-white rounded-2xl border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden hover:-translate-y-2 transition-all duration-300 hover:shadow-xl group">
                        <div class="h-32 bg-brand-navy relative">
                            <div class="absolute -bottom-12 left-1/2 transform -translate-x-1/2">
                                <div class="p-1 bg-white rounded-full">
                                    <img class="w-24 h-24 rounded-full object-cover border-4 border-brand-orange"
                                        src="{{ asset('assets/img/pexels-yury-kim-181374-585419.jpg') }}"
                                        alt="Foto Profil">
                                </div>
                            </div>
                        </div>
                        <div class="pt-16 pb-8 px-6 text-center">
                            <h3
                                class="text-xl font-bold text-brand-navy mb-1 group-hover:text-brand-blue transition-colors">
                                MUH. ILHAM NAFRUDDIN</h3>
                            <p class="text-brand-orange font-semibold text-sm uppercase tracking-wider mb-4">Komisaris
                                Utama</p>

                            <p class="text-gray-500 text-sm leading-relaxed mb-6">
                                Seorang pemimpin visioner yang menanamkan nilai integritas dan inovasi di setiap langkah
                                perusahaan untuk tumbuh tangguh dan terpercaya.
                            </p>

                            <div class="flex justify-center space-x-4">
                                <a href="#" class="text-gray-400 hover:text-brand-blue"><svg class="w-5 h-5"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                    </svg></a>
                                <a href="#" class="text-gray-400 hover:text-brand-blue"><svg class="w-5 h-5"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                    </svg></a>
                            </div>
                        </div>
                    </div>

                    <div
                        class="w-full max-w-sm bg-white rounded-2xl border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden hover:-translate-y-2 transition-all duration-300 hover:shadow-xl group">
                        <div class="h-32 bg-brand-navy relative">
                            <div class="absolute -bottom-12 left-1/2 transform -translate-x-1/2">
                                <div class="p-1 bg-white rounded-full">
                                    <img class="w-24 h-24 rounded-full object-cover border-4 border-brand-orange"
                                        src="{{ asset('assets/img/pexels-yury-kim-181374-585419.jpg') }}"
                                        alt="Foto Profil">
                                </div>
                            </div>
                        </div>
                        <div class="pt-16 pb-8 px-6 text-center">
                            <h3
                                class="text-xl font-bold text-brand-navy mb-1 group-hover:text-brand-blue transition-colors">
                                JARIAH</h3>
                            <p class="text-brand-orange font-semibold text-sm uppercase tracking-wider mb-4">Direktur
                                Utama</p>

                            <p class="text-gray-500 text-sm leading-relaxed mb-6">
                                Membangun dengan hati. Setiap proyek adalah tanggung jawab kami untuk menghadirkan karya
                                yang kuat, estetis, dan bermanfaat bagi masyarakat.
                            </p>

                            <div class="flex justify-center space-x-4">
                                <a href="#" class="text-gray-400 hover:text-brand-blue"><svg class="w-5 h-5"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                    </svg></a>
                                <a href="#" class="text-gray-400 hover:text-brand-blue"><svg class="w-5 h-5"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                    </svg></a>
                            </div>
                        </div>
                    </div>

                    <div
                        class="w-full max-w-sm bg-white rounded-2xl border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden hover:-translate-y-2 transition-all duration-300 hover:shadow-xl group">
                        <div class="h-32 bg-brand-navy relative">
                            <div class="absolute -bottom-12 left-1/2 transform -translate-x-1/2">
                                <div class="p-1 bg-white rounded-full">
                                    <img class="w-24 h-24 rounded-full object-cover border-4 border-brand-orange"
                                        src="{{ asset('assets/img/pexels-yury-kim-181374-585419.jpg') }}"
                                        alt="Foto Profil">
                                </div>
                            </div>
                        </div>
                        <div class="pt-16 pb-8 px-6 text-center">
                            <h3
                                class="text-xl font-bold text-brand-navy mb-1 group-hover:text-brand-blue transition-colors">
                                NAMA ANGGOTA</h3>
                            <p class="text-brand-orange font-semibold text-sm uppercase tracking-wider mb-4">Manager
                                Operasional</p>

                            <p class="text-gray-500 text-sm leading-relaxed mb-6">
                                Memastikan seluruh kegiatan operasional di lapangan berjalan sesuai standar K3 dan
                                timeline proyek yang telah ditetapkan.
                            </p>

                            <div class="flex justify-center space-x-4">
                                <a href="#" class="text-gray-400 hover:text-brand-blue"><svg class="w-5 h-5"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                    </svg></a>
                                <a href="#" class="text-gray-400 hover:text-brand-blue"><svg class="w-5 h-5"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                    </svg></a>
                            </div>
                        </div>
                    </div>

                    <div
                        class="w-full max-w-sm bg-white rounded-2xl border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] overflow-hidden hover:-translate-y-2 transition-all duration-300 hover:shadow-xl group">
                        <div class="h-32 bg-brand-navy relative">
                            <div class="absolute -bottom-12 left-1/2 transform -translate-x-1/2">
                                <div class="p-1 bg-white rounded-full">
                                    <img class="w-24 h-24 rounded-full object-cover border-4 border-brand-orange"
                                        src="{{ asset('assets/img/pexels-yury-kim-181374-585419.jpg') }}"
                                        alt="Foto Profil">
                                </div>
                            </div>
                        </div>
                        <div class="pt-16 pb-8 px-6 text-center">
                            <h3
                                class="text-xl font-bold text-brand-navy mb-1 group-hover:text-brand-blue transition-colors">
                                NAMA ANGGOTA</h3>
                            <p class="text-brand-orange font-semibold text-sm uppercase tracking-wider mb-4">Manager
                                Operasional</p>

                            <p class="text-gray-500 text-sm leading-relaxed mb-6">
                                Memastikan seluruh kegiatan operasional di lapangan berjalan sesuai standar K3 dan
                                timeline proyek yang telah ditetapkan.
                            </p>

                            <div class="flex justify-center space-x-4">
                                <a href="#" class="text-gray-400 hover:text-brand-blue"><svg class="w-5 h-5"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                    </svg></a>
                                <a href="#" class="text-gray-400 hover:text-brand-blue"><svg class="w-5 h-5"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                    </svg></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <x-footer></x-footer>
</x-layout>
