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
                        class="border border-brand-blue text-white px-8 py-3 rounded-xl font-semibold hover:bg-brand-blue hover:text-black transition duration-300 uppercase tracking-widest text-sm">
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
                        Kami menyediakan berbagai layanan di bidang konstruksi umum dan penyedia tenaga kerja
                        profesional dan berintegritas untuk mendukung kebutuhan proyek industri dan infrastruktur
                    </p>
                </div>

                <div class="container mx-auto">
                    <div class="flex flex-wrap justify-center gap-8">

                        <div
                            class="w-full max-w-sm group bg-white p-8 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-blue/20 flex flex-col">
                            <div
                                class="mb-3 inline-block p-4 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-blue group-hover:text-white transition-colors duration-300 w-fit">
                                <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                </svg>
                            </div>
                            <h3
                                class="text-xl font-bold text-brand-navy mb-3 group-hover:text-brand-blue transition-colors relative inline-block">
                                Industri Peralatan Listrik Lainnya
                                <span
                                    class="absolute -bottom-2 left-0 w-full h-1 bg-gray-200 rounded-full group-hover:bg-brand-blue transition-colors duration-300"></span>
                            </h3>
                            <p class="text-gray-600 mb-0 mt-4 leading-relaxed text-justify">
                                Menyediakan dan memproduksi berbagai peralatan serta komponen listrik untuk kebutuhan
                                industri dan proyek.
                            </p>

                        </div>

                        <div
                            class="w-full max-w-sm group bg-white p-8 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-blue/20 flex flex-col">
                            <div
                                class="mb-3 inline-block p-4 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-blue group-hover:text-white transition-colors duration-300 w-fit">
                                <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
                                </svg>
                            </div>
                            <h3
                                class="text-xl font-bold text-brand-navy mb-3 group-hover:text-brand-blue transition-colors relative inline-block">
                                Konstruksi Umum
                                <span
                                    class="absolute -bottom-2 left-0 w-full h-1 bg-gray-200 rounded-full group-hover:bg-brand-blue transition-colors duration-300"></span>
                            </h3>
                            <p class="text-gray-600 mb-0 mt-4 leading-relaxed text-justify">
                                Melaksanakan pekerjan konstruksi bangunan, jalan, jembatan, dan infrastruktur lainnya
                                dengan
                                standar mutu tinggi.
                            </p>

                        </div>

                        <div
                            class="w-full max-w-sm group bg-white p-8 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-blue/20 flex flex-col">
                            <div
                                class="mb-3 inline-block p-4 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-blue group-hover:text-white transition-colors duration-300 w-fit">
                                <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                                </svg>
                            </div>
                            <h3
                                class="text-xl font-bold text-brand-navy mb-3 group-hover:text-brand-blue transition-colors relative inline-block">
                                Perdagangan Besar
                                <span
                                    class="absolute -bottom-2 left-0 w-full h-1 bg-gray-200 rounded-full group-hover:bg-brand-blue transition-colors duration-300"></span>
                            </h3>
                            <p class="text-gray-600 mb-0 mt-4 leading-relaxed text-justify">
                                Melayani distribusi dan penjualan material teknik, alat listrik, serta perlengkapan
                                konstruksi dalam skala besar.
                            </p>

                        </div>

                        <div
                            class="w-full max-w-sm group bg-white p-8 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-blue/20 flex flex-col">
                            <div
                                class="mb-3 inline-block p-4 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-blue group-hover:text-white transition-colors duration-300 w-fit">
                                <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <h3
                                class="text-xl font-bold text-brand-navy mb-3 group-hover:text-brand-blue transition-colors relative inline-block">
                                Penyedia Tenaga Kerja
                                <span
                                    class="absolute -bottom-2 left-0 w-full h-1 bg-gray-200 rounded-full group-hover:bg-brand-blue transition-colors duration-300"></span>
                            </h3>
                            <p class="text-gray-600 mb-0 mt-4 leading-relaxed text-justify">
                                Menyuplai tenaga kerja terampil dan profesional untuk berbagai bidang industri dan
                                proyek
                                konstruksi.
                            </p>

                        </div>

                        <div
                            class="w-full max-w-sm group bg-white p-8 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-blue/20 flex flex-col">
                            <div
                                class="mb-3 inline-block p-4 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-blue group-hover:text-white transition-colors duration-300 w-fit">
                                <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                </svg>
                            </div>
                            <h3
                                class="text-xl font-bold text-brand-navy mb-3 group-hover:text-brand-blue transition-colors relative inline-block">
                                Navigasi Penerbangan
                                <span
                                    class="absolute -bottom-2 left-0 w-full h-1 bg-gray-200 rounded-full group-hover:bg-brand-blue transition-colors duration-300"></span>
                            </h3>
                            <p class="text-gray-600 mb-0 mt-4 leading-relaxed text-justify">
                                Memberikan layanan teknis dan dukungan operasional pada sistem navigasi penerbangan dan
                                infrastruktur bandara.
                            </p>

                        </div>

                        <div
                            class="w-full max-w-sm group bg-white p-8 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-blue/20 flex flex-col">
                            <div
                                class="mb-3 inline-block p-4 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-blue group-hover:text-white transition-colors duration-300 w-fit">
                                <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.75" />
                                </svg>
                            </div>
                            <h3
                                class="text-xl font-bold text-brand-navy mb-3 group-hover:text-brand-blue transition-colors relative inline-block">
                                Aktivitas Penunjang Pertambangan
                                <span
                                    class="absolute -bottom-2 left-0 w-full h-1 bg-gray-200 rounded-full group-hover:bg-brand-blue transition-colors duration-300"></span>
                            </h3>
                            <p class="text-gray-600 mb-0 mt-4 leading-relaxed text-justify">
                                Menunjang kegiatan pertambangan melalui penyediaan jasa teknis,
                                peralatan, dan tenaga ahli di lapangan.
                            </p>

                        </div>
                        <div
                            class="w-full max-w-sm group bg-white p-8 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-blue/20 flex flex-col">
                            <div
                                class="mb-3 inline-block p-4 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-blue group-hover:text-white transition-colors duration-300 w-fit">
                                <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                            </div>
                            <h3
                                class="text-xl font-bold text-brand-navy mb-3 group-hover:text-brand-blue transition-colors relative inline-block">
                                Real Estate
                                <span
                                    class="absolute -bottom-2 left-0 w-full h-1 bg-gray-200 rounded-full group-hover:bg-brand-blue transition-colors duration-300"></span>
                            </h3>
                            <p class="text-gray-600 mb-0 mt-4 leading-relaxed text-justify">
                                Mengembangkan dan mengelola properti komersial maupun hunian dengan konsep efisien dan
                                berkelanjutan.
                            </p>

                        </div>

                    </div>
                    <div class="text-center mt-10">
                        <a href="{{ route("service") }}"
                            class="group inline-flex items-center gap-2 px-8 py-3 bg-white border-2 border-brand-blue text-brand-blue font-bold rounded-xl transition-all duration-300 hover:bg-brand-blue hover:text-white hover:shadow-lg hover:shadow-blue-500/30 hover:-translate-y-1">
                            Lihat Selengkapnya

                            <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform duration-300"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
