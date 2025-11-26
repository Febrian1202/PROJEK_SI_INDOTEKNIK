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
</x-layout>
