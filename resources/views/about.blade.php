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

                    <h1 class="text-brand-gray text-4xl font-bold mb-5 md:mb-6 lg:mb-7 lg:text-6xl md:text-5xl">Tentang
                        Kami</h1>

                    <div class="w-16 h-1 bg-brand-orange rounded-full mb-5"></div>

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
                        <div class="w-16 h-1 bg-brand-orange rounded-full mb-6"></div>
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
                    <div class="flex items-center justify-center translate-y-6">
                        <img src="assets/img/slogan.png" alt="Logo Slogan" class="w-1/3 h-auto mt-2">
                    </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-8">
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
                        <h2 class="font-bold text-m relative inline-block mb-4 mt-2">
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
                        <h2 class="font-bold text-m relative inline-block mb-4 mt-2">
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
                                    Simbol perlindungan, memperkuat makna dari “Safe” sebagai komitmen terhadap keamanan
                                    dan kepatuhan terhadap standar keselamatan kerja.
                                </span>
                            </li>
                        </ul>
                        <h2 class="font-bold text-m relative inline-block mb-4 mt-2">
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

        <section class="py-12 bg-white transition-all duration-2000 ease-out" x-data="{ shown: false }"
            x-intersect.threshold.0.3="shown = true"
            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-12'">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="text-center mb-16">
                    <div class="flex items-center justify-center gap-4 mb-4">
                        <div class="h-1 w-12 bg-brand-orange rounded-full"></div>
                        <h2 class="text-3xl md:text-4xl font-bold text-brand-navy">Nilai-Nilai Utama</h2>
                        <div class="h-1 w-12 bg-brand-orange rounded-full"></div>
                    </div>
                    <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                        6 Poin nilai utama yang dipegang teguh <strong>INDOTEKNIK PRIMA MEKONGGA</strong>
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <div
                        class="group bg-white p-6 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-blue/20">

                        <div class="flex items-center gap-4 mb-4">

                            <div
                                class="inline-block p-3 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-navy group-hover:text-white transition-colors duration-300 shrink-0">
                                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </div>

                            <h3
                                class="text-xl font-bold text-brand-navy group-hover:text-brand-navy transition-colors text-center">
                                INTEGRITAS
                            </h3>

                        </div>

                        <p class="text-gray-600 mb-4 leading-relaxed pl-1 text-justify">
                            Menjaga kejujuran, tanggung jawab, dan kepercayaan dalam setiap pekerjaan.
                        </p>

                    </div>
                    <div
                        class="group bg-white p-6 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-navy/20">

                        <div class="flex items-center gap-4 mb-4">

                            <div
                                class="inline-block p-3 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-navy group-hover:text-white transition-colors duration-300 shrink-0">
                                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                                </svg>
                            </div>

                            <h3
                                class="text-xl font-bold text-brand-navy group-hover:text-brand-navy transition-colors text-center">
                                PROFESIONALISME
                            </h3>

                        </div>

                        <p class="text-gray-600 mb-4 leading-relaxed pl-1 text-justify">
                            Bekerja dengan disiplin, kompeten, dan berorientasi pada hasil yang terbaik.
                        </p>

                    </div>
                    <div
                        class="group bg-white p-6 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-navy/20">

                        <div class="flex items-center gap-4 mb-4">

                            <div
                                class="inline-block p-3 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-navy group-hover:text-white transition-colors duration-300 shrink-0">
                                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                </svg>
                            </div>

                            <h3
                                class="text-xl font-bold text-brand-navy group-hover:text-brand-navy transition-colors text-center">
                                KERJA SAMA TIM
                            </h3>

                        </div>

                        <p class="text-gray-600 mb-4 leading-relaxed pl-1 text-justify">
                            Membangun kolaborasi dan komunikasi yang solid di setiap lini kerja.
                        </p>

                    </div>
                    <div
                        class="group bg-white p-6 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-navy/20">

                        <div class="flex items-center gap-4 mb-4">

                            <div
                                class="inline-block p-3 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-navy group-hover:text-white transition-colors duration-300 shrink-0">
                                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                </svg>
                            </div>

                            <h3
                                class="text-xl font-bold text-brand-navy group-hover:text-brand-navy transition-colors text-center">
                                KESELAMATAN
                            </h3>

                        </div>

                        <p class="text-gray-600 mb-4 leading-relaxed pl-1 text-justify">
                            Mengutamakan budaya kerja aman dan penerapan standar K3,
                        </p>

                    </div>
                    <div
                        class="group bg-white p-6 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-navy/20">

                        <div class="flex items-center gap-4 mb-4">

                            <div
                                class="inline-block p-3 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-navy group-hover:text-white transition-colors duration-300 shrink-0">
                                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.854 1.566-2.126C18.246 14.99 20.25 12.69 20.25 10a8.25 8.25 0 10-16.5 0c0 2.69 2.004 4.99 4.434 5.682.908.272 1.566 1.143 1.566 2.126V18a3 3 0 003 3 3 3 0 003-3z" />
                                </svg>
                            </div>

                            <h3
                                class="text-xl font-bold text-brand-navy group-hover:text-brand-navy transition-colors text-center">
                                INOVASI
                            </h3>

                        </div>

                        <p class="text-gray-600 mb-4 leading-relaxed pl-1 text-justify">
                            Berpikir kreatif dan adaptif untuk menghadirkan solusi yang efisien.
                        </p>

                    </div>
                    <div
                        class="group bg-white p-6 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-navy/20">

                        <div class="flex items-center gap-4 mb-4">

                            <div
                                class="inline-block p-3 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-navy group-hover:text-white transition-colors duration-300 shrink-0">
                                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                            </div>

                            <h3
                                class="text-xl font-bold text-brand-navy group-hover:text-brand-navy transition-colors text-left">
                                TANGGUNG JAWAB SOSIAL
                            </h3>

                        </div>

                        <p class="text-gray-600 mb-4 leading-relaxed pl-1 text-justify">
                            Peduli terhadap masyarakat dan lingkungan dalam setiap kegiatan perusahaan.
                        </p>

                    </div>

                </div>
            </div>
        </section>
        <section class="py-24 bg-brand-navy" x-data="{
            activeCert: null,
            certificates: [
                { title: 'Sertifikat Badan Usaha (SBU)', image: 'https://placehold.co/600x800/png?text=Scan+SBU' },
                { title: 'ISO 9001:2015 (Mutu)', image: 'https://placehold.co/600x800/png?text=Scan+ISO9001' },
                { title: 'ISO 45001:2018 (K3)', image: 'https://placehold.co/600x800/png?text=Scan+ISO45001' },
                { title: 'Sertifikat K3 Umum', image: 'https://placehold.co/600x800/png?text=Scan+K3' }
            ],
            openModal(cert) {
                this.activeCert = cert;
                document.body.style.overflow = 'hidden';
            },
            closeModal() {
                this.activeCert = null;
                document.body.style.overflow = 'auto';
            }
        }">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <div class="text-center mb-12">
                    <div class="flex items-center justify-center gap-4 mb-4">
                        <div class="h-1 w-12 bg-brand-orange rounded-full"></div>
                        <h2 class="text-3xl md:text-4xl font-bold text-white">Sertifikat & Perizinan</h2>
                        <div class="h-1 w-12 bg-brand-orange rounded-full"></div>
                    </div>
                    <p class="text-gray-300 max-w-2xl mx-auto text-lg">
                        Identitas resmi dan kelengkapan perizinan operasional PT. Indoteknik Prima Mekongga.
                    </p>
                </div>

                <div class="bg-brand-gray backdrop-blur-sm rounded-2xl border border-brand-blue/30 p-8 mb-12">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                        <div class="flex gap-4">
                            <div
                                class="w-12 h-12 rounded-lg bg-brand-blue/20 text-brand-blue flex items-center justify-center shrink-0 border border-brand-blue/30">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-brand-blue font-medium">Nama Perusahaan</p>
                                <h4 class="text-lg font-bold text-brand-navy">PT. INDOTEKNIK PRIMA MEKONGGA</h4>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div
                                class="w-12 h-12 rounded-lg bg-brand-blue/20 text-brand-blue flex items-center justify-center shrink-0 border border-brand-blue/30">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-brand-blue font-medium">Direktur Utama</p>
                                <h4 class="text-lg font-bold text-brand-navy capitalize">MUHAMMAD ILHAM NAFRUDDIN</h4>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div
                                class="w-12 h-12 rounded-lg bg-brand-blue/20 text-brand-blue flex items-center justify-center shrink-0 border border-brand-blue/30">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-brand-blue font-medium">Akte Notaris</p>
                                <h4 class="text-lg font-bold text-brand-navy">H. RUDI TAUFAN, S.H., M.Kn</h4>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div
                                class="w-12 h-12 rounded-lg bg-brand-orange/20 text-brand-orange flex items-center justify-center shrink-0 border border-brand-orange/30">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-brand-blue font-medium">SK Kemenkumham</p>
                                <h4 class="text-base font-bold text-brand-navy font-mono">NO.AHU-0000247.AH.01.01 TAHUN
                                    2025</h4>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div
                                class="w-12 h-12 rounded-lg bg-brand-orange/20 text-brand-orange flex items-center justify-center shrink-0 border border-brand-orange/30">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-brand-blue font-medium">Nomor Pokok Wajib Pajak (NPWP)</p>
                                <h4 class="text-base font-bold text-brand-navy font-mono">1091 031 1154 0831</h4>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div
                                class="w-12 h-12 rounded-lg bg-brand-orange/20 text-brand-orange flex items-center justify-center shrink-0 border border-brand-orange/30">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-brand-blue font-medium">Nomor Induk Berusaha (NIB)</p>
                                <h4 class="text-base font-bold text-brand-navy font-mono">1202250122565</h4>
                            </div>
                        </div>

                    </div>
                </div>

                <h3 class="text-xl font-bold text-white mb-6 text-center border-t border-brand-blue/20 pt-8">Scan
                    Dokumen Resmi</h3>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <template x-for="(cert, index) in certificates" :key="index">
                        <div @click="openModal(cert)"
                            class="group bg-brand-gray p-3 rounded-xl shadow-lg border border-brand-blue/30 hover:-translate-y-1 transition-all duration-300 cursor-pointer overflow-hidden relative">
                            <div class="aspect-[3/4] bg-white rounded-lg overflow-hidden relative mb-3">
                                <img :src="cert.image" :alt="cert.title"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div
                                    class="absolute inset-0 bg-brand-navy/60 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
                                    <svg class="w-8 h-8 text-brand-navy" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                    </svg>
                                </div>
                            </div>
                            <div class="text-center">
                                <h4 class="font-bold text-brand-navy text-sm leading-tight group-hover:text-brand-orange transition-colors"
                                    x-text="cert.title"></h4>
                            </div>
                        </div>
                    </template>
                </div>

                <div class="mt-12 text-center">
                    <a href="#"
                        class="inline-flex items-center gap-3 bg-brand-orange text-white px-8 py-3 rounded-full font-bold hover:bg-orange-600 transition shadow-lg shadow-orange-500/30 group">
                        <svg class="w-5 h-5 group-hover:animate-bounce" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Download Company Profile
                    </a>
                </div>

            </div>

            <div x-show="activeCert" style="display: none;"
                class="fixed inset-0 z-[100] flex items-center justify-center p-4" x-transition.opacity>
                <div class="absolute inset-0 bg-black/90 backdrop-blur-sm" @click="closeModal()"></div>
                <div class="relative bg-white max-w-3xl w-full max-h-[90vh] rounded-2xl overflow-hidden shadow-2xl flex flex-col"
                    x-show="activeCert" x-transition.scale.95>
                    <div class="flex justify-between items-center p-4 border-b bg-gray-50">
                        <h3 class="font-bold text-brand-navy text-lg" x-text="activeCert?.title"></h3>
                        <button @click="closeModal()" class="text-gray-400 hover:text-red-500"><svg class="w-6 h-6"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg></button>
                    </div>
                    <div class="flex-1 overflow-y-auto p-4 bg-gray-200 flex justify-center">
                        <img :src="activeCert?.image" class="max-w-full h-auto shadow-md">
                    </div>
                </div>
            </div>
        </section>
        {{-- <section class="py-24 bg-white" x-data="{
            activeCategory: 'all',
            projects: [{
                    title: 'Pembangunan Jembatan Konawe',
                    category: 'Konstruksi',
                    image: 'https://images.pexels.com/photos/220769/pexels-photo-220769.jpeg?auto=compress&cs=tinysrgb&w=800',
                    desc: 'Konstruksi jembatan penghubung antar desa sepanjang 50m dengan struktur beton bertulang.'
                },
                {
                    title: 'Hauling Ore Site Pomalaa',
                    category: 'Pertambangan',
                    image: 'https://images.pexels.com/photos/2832061/pexels-photo-2832061.jpeg?auto=compress&cs=tinysrgb&w=800',
                    desc: 'Kegiatan pengangkutan bijih nikel dari front penambangan menuju jetty stockpile.'
                },
                {
                    title: 'Instalasi Panel Listrik Smelter',
                    category: 'Kelistrikan',
                    image: 'https://images.pexels.com/photos/257736/pexels-photo-257736.jpeg?auto=compress&cs=tinysrgb&w=800',
                    desc: 'Pemasangan sistem kelistrikan tegangan menengah untuk area pabrik pemurnian.'
                },
                {
                    title: 'Perumahan Karyawan Morosi',
                    category: 'Properti',
                    image: 'https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?auto=compress&cs=tinysrgb&w=800',
                    desc: 'Pengembangan komplek hunian type 45 untuk tenaga kerja site Morosi.'
                },
                {
                    title: 'Maintenance Alat Berat',
                    category: 'Pertambangan',
                    image: 'https://images.pexels.com/photos/162553/keys-workshop-mechanic-tools-162553.jpeg?auto=compress&cs=tinysrgb&w=800',
                    desc: 'Perawatan rutin unit excavator dan dump truck untuk menjaga performa operasional.'
                },
                {
                    title: 'Renovasi Kantor Pusat',
                    category: 'Konstruksi',
                    image: 'https://images.pexels.com/photos/159306/construction-site-build-construction-work-159306.jpeg?auto=compress&cs=tinysrgb&w=800',
                    desc: 'Pemugaran gedung kantor utama di Kendari dengan konsep modern minimalis.'
                }
            ]
        }">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <div class="text-center mb-12">
                    <div class="flex items-center justify-center gap-4 mb-4">
                        <div class="h-1 w-12 bg-brand-orange rounded-full"></div>
                        <h2 class="text-3xl md:text-4xl font-bold text-brand-navy">Portofolio Proyek</h2>
                        <div class="h-1 w-12 bg-brand-orange rounded-full"></div>
                    </div>
                    <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                        Rekam jejak keberhasilan kami dalam menyelesaikan berbagai proyek strategis di Sulawesi
                        Tenggara.
                    </p>
                </div>

                <div class="flex flex-wrap justify-center gap-3 mb-12">
                    <button @click="activeCategory = 'all'"
                        :class="activeCategory === 'all' ? 'bg-brand-navy text-white shadow-lg shadow-brand-navy/30' :
                            'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                        class="px-6 py-2 rounded-full font-semibold text-sm transition-all duration-300 transform hover:-translate-y-1">
                        Semua Proyek
                    </button>

                    <template x-for="cat in ['Konstruksi', 'Pertambangan', 'Kelistrikan', 'Properti']">
                        <button @click="activeCategory = cat"
                            :class="activeCategory === cat ? 'bg-brand-navy text-white shadow-lg shadow-brand-navy/30' :
                                'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                            class="px-6 py-2 rounded-full font-semibold text-sm transition-all duration-300 transform hover:-translate-y-1"
                            x-text="cat">
                        </button>
                    </template>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <template x-for="(project, index) in projects" :key="index">

                        <div x-show="activeCategory === 'all' || activeCategory === project.category"
                            x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 transform scale-90"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            class="group relative h-80 rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 cursor-pointer">

                            <img :src="project.image" :alt="project.title"
                                class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-brand-navy via-brand-navy/20 to-transparent opacity-80 group-hover:opacity-90 transition-opacity">
                            </div>

                            <div
                                class="absolute bottom-0 left-0 w-full p-6 transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                                <span
                                    class="inline-block px-3 py-1 mb-3 text-xs font-bold text-white bg-brand-orange rounded-full uppercase tracking-wider shadow-sm"
                                    x-text="project.category"></span>

                                <h3 class="text-xl font-bold text-white mb-2 leading-tight" x-text="project.title">
                                </h3>

                                <div class="h-0 group-hover:h-auto overflow-hidden transition-all duration-500">
                                    <p class="text-gray-300 text-sm line-clamp-2 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100"
                                        x-text="project.desc"></p>
                                </div>
                            </div>

                            <div
                                class="absolute top-4 right-4 bg-white/10 backdrop-blur-md p-2 rounded-full text-white opacity-0 group-hover:opacity-100 -translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </div>

                        </div>

                    </template>
                </div>

            </div>
        </section> --}}
        <section class="py-24 bg-white" x-data="{
            activeCategory: 'all',
            projects: [{
                    title: 'Pengecetan Tower Crane & Ship Unloader',
                    client: 'PT. BOSOWA ENERGY',
                    loc: 'Jeneponto Coal Fired Steam Power Plant',
                    category: 'Konstruksi',
                    image: 'https://images.pexels.com/photos/220769/pexels-photo-220769.jpeg?auto=compress&cs=tinysrgb&w=800'
                },
                {
                    title: 'Pembuatan KM/WC & Perbaikan Gudang GA',
                    client: 'PT. ANTAM POMALAA',
                    loc: 'Pomalaa, Kolaka',
                    category: 'Konstruksi',
                    image: 'https://images.pexels.com/photos/159306/construction-site-build-construction-work-159306.jpeg?auto=compress&cs=tinysrgb&w=800'
                },
                {
                    title: 'Surface Preparation & Coating Storage Tank',
                    client: 'PT. ANTAM',
                    loc: 'Pomalaa',
                    category: 'Maintenance',
                    image: 'https://images.pexels.com/photos/257736/pexels-photo-257736.jpeg?auto=compress&cs=tinysrgb&w=800'
                },
                {
                    title: 'Pembersihan Raw Gas Feni Plant 3',
                    client: 'ANTAM UBPN KOLAKA',
                    loc: 'Kolaka (2025)',
                    category: 'Maintenance',
                    image: 'https://images.pexels.com/photos/2832061/pexels-photo-2832061.jpeg?auto=compress&cs=tinysrgb&w=800'
                },
                {
                    title: 'Pengecetan Cooling Tower',
                    client: 'PT. ANTAM',
                    loc: 'Pomalaa',
                    category: 'Maintenance',
                    image: 'https://images.pexels.com/photos/162553/keys-workshop-mechanic-tools-162553.jpeg?auto=compress&cs=tinysrgb&w=800'
                },
                {
                    title: 'Cleaning & Recoating Coal Firing System',
                    client: 'ANTAM UBPN KOLAKA',
                    loc: 'Kolaka (2025)',
                    category: 'Maintenance',
                    image: 'https://images.pexels.com/photos/1216589/pexels-photo-1216589.jpeg?auto=compress&cs=tinysrgb&w=800'
                },
                {
                    title: 'Pembuatan Paving Block',
                    client: 'ANTAM UBPN POMALAA',
                    loc: 'Pomalaa',
                    category: 'Konstruksi',
                    image: 'https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?auto=compress&cs=tinysrgb&w=800'
                }
            ]
        }">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <div class="text-center mb-12">
                    <div class="flex items-center justify-center gap-4 mb-4">
                        <div class="h-1 w-12 bg-brand-orange rounded-full"></div>
                        <h2 class="text-3xl md:text-4xl font-bold text-brand-navy">Portofolio Proyek</h2>
                        <div class="h-1 w-12 bg-brand-orange rounded-full"></div>
                    </div>
                    <p class="text-gray-600 max-w-3xl mx-auto text-lg">
                        Pengalaman kami dalam menyelesaikan berbagai proyek strategis bersama mitra terkemuka.
                    </p>
                </div>

                <div class="flex flex-wrap justify-center gap-3 mb-12">
                    <button @click="activeCategory = 'all'"
                        :class="activeCategory === 'all' ? 'bg-brand-navy text-white shadow-lg shadow-brand-navy/30' :
                            'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                        class="px-6 py-2 rounded-full font-semibold text-sm transition-all duration-300 transform hover:-translate-y-1">
                        Semua Proyek
                    </button>

                    <template x-for="cat in ['Konstruksi', 'Maintenance']">
                        <button @click="activeCategory = cat"
                            :class="activeCategory === cat ? 'bg-brand-navy text-white shadow-lg shadow-brand-navy/30' :
                                'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                            class="px-6 py-2 rounded-full font-semibold text-sm transition-all duration-300 transform hover:-translate-y-1"
                            x-text="cat">
                        </button>
                    </template>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <template x-for="(project, index) in projects" :key="index">

                        <div x-show="activeCategory === 'all' || activeCategory === project.category"
                            x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col h-full">

                            <div class="h-48 overflow-hidden relative">
                                <img :src="project.image" :alt="project.title"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                                <div class="absolute top-4 right-4">
                                    <span
                                        class="bg-white/90 text-brand-navy text-xs font-bold px-3 py-1 rounded-full shadow-sm"
                                        x-text="project.category"></span>
                                </div>
                            </div>

                            <div class="p-6 flex-1 flex flex-col">
                                <div class="text-xs font-bold text-brand-orange uppercase tracking-wider mb-2"
                                    x-text="project.client"></div>
                                <h3 class="text-lg font-bold text-brand-navy mb-3 leading-snug group-hover:text-brand-blue transition-colors"
                                    x-text="project.title"></h3>

                                <div
                                    class="mt-auto pt-4 border-t border-gray-50 flex items-center text-gray-500 text-sm">
                                    <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span x-text="project.loc"></span>
                                </div>
                            </div>

                        </div>

                    </template>
                </div>

            </div>
        </section>

        <x-footer></x-footer>
    </body>
</x-layout>
