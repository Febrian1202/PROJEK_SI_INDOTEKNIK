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

                    <h1 class="text-brand-gray text-6xl font-bold mb-7">Tentang Kami</h1>

                    <div class="w-16 h-1 bg-brand-orange mb-5"></div>

                    <span class="text-gray-200 max-w-2xl text-base md:text-lg mb-8 leading-relaxed"><a
                            href="{{ route('home') }}"
                            class="text-brand-orange hover:text-brand-blue ransition-colors duration-300">Home</a> /
                        About</span>
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
        <section class="py-24 bg-brand-gray transition-all duration-1000 ease-out">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">

                    <div>
                        <h3 class="text-3xl font-bold text-brand-navy text-bold mb-6">Tentang Perusahaan</h3>
                        <div class="w-16 h-1 bg-brand-orange mb-6"></div>
                        <p class="text-lg text-brand-navy leading-relaxed text-justify">
                            PT. Indoteknik Prima Mekongga adalah Perusahaan Kontraktor Umum (General Contractor) yang
                            bergerak di bidang barang dan jasa. Kami hadir sebagai solusi terpadu yang menggabungkan
                            kekuatan teknis dalam pembangunan dengan komitmen terhadap keberlanjutan lingkungan melalui
                            praktik yang ramah lingkungan.
                        </p>
                        <br>
                        <p class="text-lg text-brand-navy leading-relaxed text-justify">
                            Kami menawarkan berbagai jenis layanan untuk memenuhi kebutuhan di berbagai sektor mulai
                            dari Konstruksi gedung hunian, Jasa pekerjaan konstruksi prapabrikasi bangunan gedung.
                            <strong>INDUSTRI
                                PERALATAN lISTRIK LAINNYA, KONSTRUKSI UMUM, PERDANGAN
                                BESAR, PENYEDIA TENAGA KERJA, NAVIGASI PENERBANGAN,
                                AKTIFITAS PENUNJANG PERTAMBANGAN, REAL ESTATE.</strong>
                        </p>
                        <br>
                        <p class="text-lg text-brand-navy leading-relaxed text-justify">
                            Dengan tim profesional yang berpengalaman serta semangat inovatif,
                            PT Indoteknik Prima Mekongga siap menjadi mitra terpercaya dalam
                            membangun masa depan yang lebih baik dan berkelanjutan.
                            Dengan mengedepankan standar kualitas tinggi dan efisiensi waktu
                            serta menerapkan norma - norma K3 ( Keselamatan dan Kesehatan Kerja
                            ), kami berkomitmen memberikan hasil terbaik untuk setiap mitra kerja.
                        </p>
                    </div>

                    <div
                        class="relative h-96 lg:h-[600px] w-full rounded-2xl overflow-hidden shadow-2xl border-4 border-white/10">
                        <img src="{{ asset('assets/img/dokumentasi/0.jpeg') }}" alt="Foto Tim Lapangan"
                            class="absolute inset-0 w-full h-full object-cover">
                    </div>

                </div>

            </div>
        </section>
        <section class="py-12 bg-brand-navy transition-all duration-2000 ease-out" x-data="{ shown: false }"
            x-intersect.threshold.0.3="shown = true"
            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <div class="flex items-center justify-center gap-4 mb-4">
                        <div class="h-1 w-12 bg-brand-orange rounded-full"></div>
                        <h2 class="text-3xl md:text-6xl font-bold text-brand-gray">Slogan</h2>
                        <div class="h-1 w-12 bg-brand-orange rounded-full"></div>
                    </div>
                    <div class="flex items-center justify-center gap-4 ">
                        <img src="assets/img/slogan.png" alt="Logo Slogan" class="w-1/3 h-auto mt-2">
                    </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 sm:grid-cols-1 gap-8">
                    <div class="p-6 text-justify text-brand-gray">
                        <h1 class="font-bold text-xl relative inline-block mb-4">
                            Makna & Filosofi
                            <span class="absolute -bottom-2 left-0 w-full h-1 bg-brand-orange rounded-full"></span>
                        </h1>
                        <p class="text-xl">“Safe Work” Logo ini dirancang dengan
                            mengusung makna yang kuat dan relevan terhadap nilai inti perusahaan PT. INDOTEKNIK PRIMA
                            MEKONGGA yang mempresentasi visual dari komitmen kami terhadap keselamatan kerja,
                            profesinalisme dan kemajuan industri.
                        </p>
                        <br>
                        <p class="text-xl"><strong>“S” mewakili SAFE</strong></p>
                        <p class="text-xl"><strong>“W” mewakili WORK</strong></p>
                        <br>
                        <p class="text-xl">
                            Keduanya berpadu dalam desain yang menampilkan elemen roda
                            gigi dan tameng (perisai), yang membetuk fondasi filosofi
                            perusahaan. “SAFE WORK IS SMART WORK” bahwa keselamatan
                            bukan hanya prioritas, tetapi bagian dari strategi kerja cerdas.
                        </p>
                    </div>

                    <div class="p-6 text-justify text-brand-gray">
                        <h2 class="font-bold text-m relative inline-block mb-4">
                            Huruf S dan W
                            <span class="absolute -bottom-2 left-0 w-full h-[2px] bg-brand-orange rounded-full"></span>
                        </h2>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-brand-orange mt-1 mr-3 flex-shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>S (Safe): Mewakili keselamatan kerja, salah satu nilai inti dalam industri
                                    konstruksi dan teknik. Ini menekankan bahwa perusahaan sangat
                                    menjunjung tinggi keselamatan tenaga kerja, proyek, dan lingkungan.</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-brand-orange mt-1 mr-3 flex-shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>W (Work): Simbol etos kerja, produktivitas, dan profesionalisme.
                                Menggambarkan komitmen perusahaan dalam menyelesaikan
                                pekerjaan secara efisien dan berkualitas tinggi.</span>
                            </li>
                        </ul>
                        <h2 class="font-bold text-m relative inline-block mb-4">
                            Roda Gigi
                            <span class="absolute -bottom-2 left-0 w-full h-[2px] bg-brand-orange rounded-full"></span>
                        </h2>
                        <ul>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-brand-orange mt-1 mr-3 flex-shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>
                                    Menjadi wadah dari “S” dan “W”, menggambarkan bahwa keselamatan
                                dan kerja keras adalah bagian integral dari sistem kerja perusahaan.
                                </span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-brand-orange mt-1 mr-3 flex-shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>
                                Simbol engineering, mekanisme, dan inovasi teknis.
                                </span>
                            </li>
                        </ul>
                        <h2 class="font-bold text-m relative inline-block mb-4">
                            Perisai
                            <span class="absolute -bottom-2 left-0 w-full h-[2px] bg-brand-orange rounded-full"></span>
                        </h2>
                        <ul>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-brand-orange mt-1 mr-3 flex-shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>
                                    Simbol perlindungan, memperkuat makna dari “Safe” sebagai komitmen terhadap keamanan dan kepatuhan terhadap standar keselamatan kerja.
                                </span>
                            </li>
                        </ul>
                        <h2 class="font-bold text-m relative inline-block mb-4">
                            Warna
                            <span class="absolute -bottom-2 left-0 w-full h-[2px] bg-brand-orange rounded-full"></span>
                        </h2>
                        <ul>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-brand-orange mt-1 mr-3 flex-shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>
                                Biru: Kepercayaan, profesionalisme, dan keamanan.
                                </span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-brand-orange mt-1 mr-3 flex-shrink-0" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span>
                                Kuning: Energi kerja, optimisme, dan hasil maksimal.
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <x-footer></x-footer>
    </body>
</x-layout>
