<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <body class="font-sans antialiased">
        <x-nav-bar></x-nav-bar>

        <section>
            <div class="relative w-full h-[40vh] overflow-hidden group" x-data="{
                active: 0,
                images: [
                    '{{ asset('assets/img/dokumentasi/1.webp') }}',
                    'assets/img/dokumentasi/7.webp', // Gambar Dummy 2
                    'assets/img/dokumentasi/6.webp' // Gambar Dummy 3
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

                <div class="absolute inset-0 bg-black/50 z-10"></div>

                <div
                    class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4 translate-y-10">

                    <h1 class="text-brand-gray text-4xl font-bold mb-5 md:mb-6 lg:mb-7 lg:text-6xl md:text-5xl">Layanan Kami</h1>

                    <div class="w-16 h-1 bg-brand-orange rounded-full mb-5"></div>

                    <span class="text-gray-200 max-w-2xl text-base md:text-lg mb-8 leading-relaxed"><a
                            href="{{ route('home') }}"
                            class="text-brand-orange hover:text-brand-blue ransition-colors duration-300">Home</a> /
                        Service</span>
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
                                <span class="absolute -bottom-2 left-0 w-full h-1 bg-gray-200 rounded-full group-hover:bg-brand-blue transition-colors duration-300"></span>
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
                                <span class="absolute -bottom-2 left-0 w-full h-1 bg-gray-200 rounded-full group-hover:bg-brand-blue transition-colors duration-300"></span>
                            </h3>
                            <p class="text-gray-600 mb-0 mt-4 leading-relaxed text-justify">
                                Melaksanakan pekerjan konstruksi bangunan, jalan, jembatan, dan infrastruktur lainnya dengan
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
                                <span class="absolute -bottom-2 left-0 w-full h-1 bg-gray-200 rounded-full group-hover:bg-brand-blue transition-colors duration-300"></span>
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
                                <span class="absolute -bottom-2 left-0 w-full h-1 bg-gray-200 rounded-full group-hover:bg-brand-blue transition-colors duration-300"></span>
                            </h3>
                            <p class="text-gray-600 mb-0 mt-4 leading-relaxed text-justify">
                                Menyuplai tenaga kerja terampil dan profesional untuk berbagai bidang industri dan proyek
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
                                <span class="absolute -bottom-2 left-0 w-full h-1 bg-gray-200 rounded-full group-hover:bg-brand-blue transition-colors duration-300"></span>
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
                                <span class="absolute -bottom-2 left-0 w-full h-1 bg-gray-200 rounded-full group-hover:bg-brand-blue transition-colors duration-300"></span>
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
                                <span class="absolute -bottom-2 left-0 w-full h-1 bg-gray-200 rounded-full group-hover:bg-brand-blue transition-colors duration-300"></span>
                            </h3>
                            <p class="text-gray-600 mb-0 mt-4 leading-relaxed text-justify">
                                Mengembangkan dan mengelola properti komersial maupun hunian dengan konsep efisien dan
                                berkelanjutan.
                            </p>
                            
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 bg-brand-navy transition-all duration-1000 ease-out">
            <div class="max-w-7xl mx-auto px-6  lg:px-8">

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                    <div
                        class="relative h-96 lg:h-[600px] w-full rounded-2xl overflow-hidden shadow-2xl border-4 border-white/10">
                        <img src="{{ asset('assets/img/dokumentasi/0.jpeg') }}" alt="Foto Tim Lapangan"
                            class="absolute inset-0 w-full h-full object-cover">
                    </div>
                    <div>
                        <h3 class="text-3xl font-bold text-brand-gray text-bold mb-6 tracking-wider">Cara <strong>PT. INDOTEKNIK PRIMA MEKONGGA</strong> Bekerja</h3>
                        <div class="w-16 h-1 bg-brand-orange rounded-full mb-6"></div>
                        <p class="text-lg text-brand-gray leading-relaxed text-justify">
                            6 Langkah cara kami bekerja
                        </p>
                    </div>
                </div>

            </div>
        </section>
        <x-footer></x-footer>
    </body>
</x-layout>