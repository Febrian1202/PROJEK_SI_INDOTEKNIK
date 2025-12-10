<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <body class="font-sans antialiased">
        <x-nav-bar></x-nav-bar>


    </body>

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

            <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4 translate-y-10">

                <h1 class="text-brand-gray text-4xl font-bold mb-5 md:mb-6 lg:mb-7 lg:text-6xl md:text-5xl">Kontak</h1>

                <div class="w-16 h-1 bg-brand-orange rounded-full mb-5"></div>

                <span class="text-gray-200 max-w-2xl text-base md:text-lg mb-8 leading-relaxed"><a
                        href="{{ route('home') }}"
                        class="text-brand-orange hover:text-brand-blue ransition-colors duration-300">Home</a> /
                    Contact</span>
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

    <section id="contact" class="py-20 bg-gray-50 relative overflow-hidden">

        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-brand-orange/5 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 rounded-full bg-brand-navy/5 blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">

            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-brand-navy mb-4">Hubungi Kami</h2>
                <div class="h-1 w-20 bg-brand-orange mx-auto rounded-full"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                    Silakan hubungi kami untuk informasi lebih lanjut mengenai layanan atau peluang karir di PT.
                    Indoteknik Prima Mekongga.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

                <div class="space-y-8">

                    <div
                        class="group flex items-start gap-5 p-6 bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300">
                        <div
                            class="shrink-0 w-12 h-12 bg-brand-navy text-white rounded-xl flex items-center justify-center group-hover:bg-brand-orange transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-brand-navy mb-1">Alamat Kantor</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Jl. Nusantara No. 86, Kel. Dawi-Dawi,<br>
                                Kec. Pomalaa, Kab. Kolaka,<br>
                                Sulawesi Tenggara 93562
                            </p>
                        </div>
                    </div>

                    <div
                        class="group flex items-start gap-5 p-6 bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300">
                        <div
                            class="shrink-0 w-12 h-12 bg-brand-navy text-white rounded-xl flex items-center justify-center group-hover:bg-brand-orange transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-brand-navy mb-1">Nomor Telepon</h3>
                            <div class="flex flex-col sm:flex-row sm:gap-4 text-gray-600 font-medium">
                                <a href="tel:04052310860" class="hover:text-brand-orange transition-colors">(0405)
                                    2310860</a>
                                <span class="hidden sm:inline text-gray-300">|</span>
                                <a href="https://wa.me/6282143147168" target="_blank"
                                    class="hover:text-brand-orange transition-colors">0821 4314 7168</a>
                            </div>
                            <p class="text-sm text-gray-400 mt-1">Senin - Jumat, 08.00 - 17.00 WITA</p>
                        </div>
                    </div>

                    <div
                        class="group flex items-start gap-5 p-6 bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300">
                        <div
                            class="shrink-0 w-12 h-12 bg-brand-navy text-white rounded-xl flex items-center justify-center group-hover:bg-brand-orange transition-colors duration-300">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-brand-navy mb-1">Email</h3>
                            <a href="mailto:ptindoteknikprimamekongga3@gmail.com"
                                class="text-gray-600 hover:text-brand-orange transition-colors break-all">
                                ptindoteknikprimamekongga3@gmail.com
                            </a>
                        </div>
                    </div>

                </div>

                <div
                    class="h-full min-h-[400px] bg-white rounded-3xl shadow-lg border-4 border-white overflow-hidden relative group">
                    <iframe
                        class="w-full h-full absolute inset-0 filter grayscale group-hover:grayscale-0 transition-all duration-500"
                        src="https://maps.google.com/maps?q=Jl.%20Nusantara%20No.%2086%20Pomalaa%20Kolaka&t=&z=15&ie=UTF8&iwloc=&output=embed"
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>

                    <div
                        class="absolute bottom-4 left-4 right-4 bg-white/90 backdrop-blur-sm p-4 rounded-xl shadow-lg border border-gray-100 hidden sm:block">
                        <p class="text-xs font-bold text-brand-navy uppercase tracking-wider mb-1">Lokasi Kami</p>
                        <p class="text-sm text-gray-600">Pomalaa, Kabupaten Kolaka</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="py-12 bg-brand-navy">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">

            <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 p-8 md:p-12">

                <div class="text-center mb-10">
                    <h3 class="text-2xl font-bold text-brand-navy">Kirim Pesan Kepada Kami</h3>
                    <p class="text-gray-500 mt-2">Punya pertanyaan atau penawaran kerja sama? Isi formulir di bawah
                        ini.</p>
                </div>

                @if (session('success'))
                    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        <strong class="font-bold">Berhasil!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <form action="{{ route('pesan.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="sr-only">Nama Lengkap</label>
                            <input type="text" name="name" id="name" placeholder="Nama Lengkap"
                                class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl text-brand-navy placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all duration-300">
                        </div>

                        <div>
                            <label for="email" class="sr-only">Alamat Email</label>
                            <input type="email" name="email" id="email" placeholder="Alamat Email"
                                class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl text-brand-navy placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all duration-300">
                        </div>
                    </div>

                    <div>
                        <label for="subject" class="sr-only">Subjek</label>
                        <input type="text" name="subject" id="subject" placeholder="Subjek Pesan"
                            class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl text-brand-navy placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all duration-300">
                    </div>

                    <div>
                        <label for="message" class="sr-only">Pesan</label>
                        <textarea name="message" id="message" rows="6" placeholder="Tulis pesan Anda di sini..."
                            class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl text-brand-navy placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-orange/20 focus:border-brand-orange transition-all duration-300 resize-none"></textarea>
                    </div>

                    <div class="text-center pt-4">
                        <button type="submit"
                            class="inline-flex items-center justify-center px-10 py-4 bg-brand-orange text-white font-bold rounded-full shadow-lg shadow-orange-500/30 hover:bg-orange-600 hover:shadow-orange-600/40 hover:-translate-y-1 transition-all duration-300 group">
                            Kirim Pesan
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </section>
    <x-footer></x-footer>
</x-layout>
