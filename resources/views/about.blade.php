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

        <x-footer></x-footer>
    </body>
</x-layout>
