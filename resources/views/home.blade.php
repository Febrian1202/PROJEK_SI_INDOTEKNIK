<x-layout>
    <body class="font-sans antialiased">
    <x-nav-bar></x-nav-bar>
        <div class="relative w-full h-screen">

            <div class="absolute inset-0 bg-cover bg-center"
                style="background-image: url('assets/img/pexels-yury-kim-181374-585419.jpg')">
            </div>

            <div class="absolute inset-0 bg-black/60"></div>

            

            <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4">

                <h1 class="text-4xl md:text-6xl font-bold text-brand-blue uppercase tracking-tight mb-4">
                    INDO<span class="text-brand-orange">TEKNIK</span>
                </h1>

                <div class="w-16 h-1 bg-brand-blue mb-6"></div>

                <p class="text-gray-200 max-w-2xl text-base md:text-lg mb-8 leading-relaxed">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates et aperiam dignissimos dolorem ipsum nam excepturi veniam esse provident quasi. Quas autem odit vitae, iusto rem reprehenderit pariatur suscipit labore.
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
        </div>
        <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="flex items-center justify-center gap-4 mb-4">
                    <div class="h-1 w-12 bg-brand-orange rounded-full"></div>
                    <h2 class="text-3xl md:text-4xl font-bold text-brand-navy">Layanan Kami</h2>
                    <div class="h-1 w-12 bg-brand-orange rounded-full"></div>
                </div>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                    Kami menyediakan berbagai layanan unggulan untuk memenuhi kebutuhan proyek Anda dengan standar profesional dan kualitas terbaik.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <div class="group bg-white p-8 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-blue/20">
                    <div class="mb-6 inline-block p-4 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-blue group-hover:text-white transition-colors duration-300">
                        <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="xM19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brand-navy mb-3 group-hover:text-brand-blue transition-colors">Layanan Konstruksi Umum</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Kami melaksanakan pembangunan dan renovasi berbagai jenis bangunan serta infrastruktur sesuai standar mutu dan waktu pelaksanaan.
                    </p>
                    <a href="#" class="inline-flex items-center font-semibold text-brand-orange hover:text-orange-700 transition-colors">
                        Selengkapnya
                        <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>

                <div class="group bg-white p-8 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-blue/20">
                    <div class="mb-6 inline-block p-4 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-blue group-hover:text-white transition-colors duration-300">
                        <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brand-navy mb-3 group-hover:text-brand-blue transition-colors">Perdagangan Besar & Ritel</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Kami menyediakan dan mendistribusikan berbagai material teknik, peralatan industri, dan kebutuhan proyek secara efisien.
                    </p>
                    <a href="#" class="inline-flex items-center font-semibold text-brand-orange hover:text-orange-700 transition-colors">
                        Selengkapnya
                        <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>

                <div class="group bg-white p-8 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-blue/20">
                    <div class="mb-6 inline-block p-4 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-blue group-hover:text-white transition-colors duration-300">
                        <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brand-navy mb-3 group-hover:text-brand-blue transition-colors">Penunjang Pertambangan</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Kami mendukung kegiatan pertambangan dengan penyediaan tenaga ahli, peralatan, dan layanan teknis lapangan.
                    </p>
                    <a href="#" class="inline-flex items-center font-semibold text-brand-orange hover:text-orange-700 transition-colors">
                        Selengkapnya
                        <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>

                <div class="group bg-white p-8 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-blue/20">
                    <div class="mb-6 inline-block p-4 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-blue group-hover:text-white transition-colors duration-300">
                        <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brand-navy mb-3 group-hover:text-brand-blue transition-colors">Penyedia Tenaga Kerja Profesional</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Kami menyalurkan tenaga kerja terampil dan berpengalaman untuk mendukung kebutuhan operasional di berbagai sektor industri.
                    </p>
                    <a href="#" class="inline-flex items-center font-semibold text-brand-orange hover:text-orange-700 transition-colors">
                        Selengkapnya
                        <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>

                <div class="group bg-white p-8 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-blue/20">
                    <div class="mb-6 inline-block p-4 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-blue group-hover:text-white transition-colors duration-300">
                        <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.75" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brand-navy mb-3 group-hover:text-brand-blue transition-colors">Layanan Transportasi Dan Pergudangan</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Kami melayani pengangkutan dan penyimpanan material proyek dengan sistem logistik yang aman dan terintegrasi.
                    </p>
                    <a href="#" class="inline-flex items-center font-semibold text-brand-orange hover:text-orange-700 transition-colors">
                        Selengkapnya
                        <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>

                <div class="group bg-white p-8 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-2 transition-all duration-300 hover:shadow-xl hover:border-brand-blue/20">
                    <div class="mb-6 inline-block p-4 bg-brand-gray rounded-xl text-brand-navy group-hover:bg-brand-blue group-hover:text-white transition-colors duration-300">
                        <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brand-navy mb-3 group-hover:text-brand-blue transition-colors">Jasa Penyewaan Dan Sewa Guna Usaha</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Kami menyediakan peralatan kerja, kendaraan operasional, dan perlengkapan proyek untuk disewa sesuai kebutuhan klien.
                    </p>
                    <a href="#" class="inline-flex items-center font-semibold text-brand-orange hover:text-orange-700 transition-colors">
                        Selengkapnya
                        <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </section>
    <section class="py-24 bg-gray-50" x-data="{ activeTab: 'visi' }">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            
            <div class="flex justify-center mb-12 border-b border-gray-200">
                <div class="flex space-x-12">
                    <button 
                        @click="activeTab = 'visi'" 
                        :class="activeTab === 'visi' ? 'border-brand-orange text-brand-navy' : 'border-transparent text-gray-400 hover:text-gray-600'"
                        class="pb-4 text-xl font-bold border-b-4 transition-all duration-300 focus:outline-none">
                        Visi
                    </button>

                    <button 
                        @click="activeTab = 'misi'" 
                        :class="activeTab === 'misi' ? 'border-brand-orange text-brand-navy' : 'border-transparent text-gray-400 hover:text-gray-600'"
                        class="pb-4 text-xl font-bold border-b-4 transition-all duration-300 focus:outline-none">
                        Misi
                    </button>
                </div>
            </div>

            <div x-show="activeTab === 'visi'" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <div>
                    <h3 class="text-3xl font-bold text-brand-navy mb-6">Visi Perusahaan</h3>
                    <div class="w-16 h-1 bg-brand-orange mb-6"></div>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Menjadi perusahaan kontraktor umum dan penyedia tenaga kerja terpercaya yang berdaya saing tinggi, berorientasi pada kualitas, keselamatan kerja, dan keberlanjutan di era globalisasi.
                    </p>
                </div>

                <div class="relative h-80 lg:h-96 rounded-2xl overflow-hidden shadow-xl">
                    <img src="{{ asset('assets/img/pexels-yury-kim-181374-585419.jpg') }}" alt="Foto Tim Lapangan" class="absolute inset-0 w-full h-full object-cover">
                </div>
            </div>

            <div x-show="activeTab === 'misi'" style="display: none;"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <div>
                    <h3 class="text-3xl font-bold text-brand-navy mb-6">Misi Perusahaan</h3>
                    <div class="w-16 h-1 bg-brand-orange mb-6"></div>
                    
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-brand-orange mt-1 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-600">Memperkuat posisi sebagai perusahaan jasa yang mengutamakan kualitas dan kuantitas.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-brand-orange mt-1 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-600">Menjaga integritas dan profesionalisme dalam setiap pekerjaan dan kemitraan.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-brand-orange mt-1 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-600">Membangun budaya K3 untuk mencapai target <span class="font-bold text-brand-navy">zero accident</span>.</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-brand-orange mt-1 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-600">Menumbuhkan kompetensi dan kesejahteraan karyawan sebagai aset utama.</span>
                        </li>
                    </ul>
                </div>

                <div class="relative h-80 lg:h-96 rounded-2xl overflow-hidden shadow-xl">
                    <img src="{{ asset('assets/img/pexels-yury-kim-181374-585419.jpg') }}" alt="Foto Meeting" class="absolute inset-0 w-full h-full object-cover grayscale hover:grayscale-0 transition duration-500">
                </div>
            </div>

        </div>
    </section>
</x-layout>
