<x-layout>
    <x-slot:title>{{ $posisi->nama_posisi }}</x-slot:title>

    <nav class="bg-brand-navy border-b border-gray-200 fixed top-0 w-full z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <div class="flex items-center gap-4">
                    <a href="{{ route('kandidat.lowongan') }}"
                        class="p-2 rounded-lg text-white hover:bg-gray-100 hover:text-brand-orange transition-colors"
                        title="Kembali ke Dashboard">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </a>

                    <div class="h-6 w-px bg-gray-300 hidden md:block"></div>

                    <div class="flex flex-col">
                        <span class="text-xl font-bold text-white">{{ $posisi->nama_posisi }}</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">

                    <div class="text-right hidden md:block">
                        <p class="text-md font-bold text-white leading-tight">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-brand-orange font-medium truncate max-w-[150px]">
                            {{ Auth::user()->email }}</p>
                    </div>

                    <div
                        class="h-10 w-10 md:h-14 md:w-14 rounded-full bg-gray-200 border-2 border-brand-orange/30 overflow-hidden flex items-center justify-center shadow-sm">
                        @if (Auth::user()->kandidatProfil && Auth::user()->kandidatProfil->foto)
                            <img src="{{ asset('storage/' . Auth::user()->kandidatProfil->foto) }}" alt="Foto Profil"
                                class="w-full h-full object-cover">
                        @else
                            <span class="text-brand-navy font-bold text-lg">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </span>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </nav>

    <div class="pt-28 pb-12 min-h-screen bg-gray-50">
        <div class="max-w-5xl mx-auto px-6 lg:px-8">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-md border border-gray-100 p-8 mb-6">
                        <div class="flex items-start justify-between mb-6">
                            <div>
                                <h1 class="text-3xl font-bold text-brand-navy mb-2">{{ $posisi->nama_posisi }}</h1>
                                <span class="bg-blue-100 text-brand-blue px-3 py-1 rounded-full text-sm font-semibold">Full Time</span>
                            </div>
                            <div class="w-16 h-16 bg-brand-gray rounded-xl flex items-center justify-center text-brand-navy">
                                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            </div>
                        </div>

                        <div class="prose max-w-none text-gray-600 mb-8">
                            <h3 class="text-lg font-bold text-gray-900 mb-2">Deskripsi Pekerjaan</h3>
                            <p class="whitespace-pre-line">{{ $posisi->deskripsi }}</p>
                        </div>

                        <div class="border-t border-gray-100 pt-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Persyaratan Dokumen</h3>
                            <ul class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                @foreach($posisi->syaratDokumen as $syarat)
                                    <li class="flex items-center gap-2 text-sm text-gray-600">
                                        <svg class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                        {{ $syarat->nama_dokumen }}
                                        @if($syarat->pivot->is_mandatory)
                                            <span class="text-red-500 text-xs font-bold">*Wajib</span>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg border border-brand-blue/20 p-6 sticky top-24">
                        
                        @if($sudahLamar)
                            <div class="text-center py-8">
                                <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900">Lamaran Terkirim</h3>
                                <p class="text-gray-500 text-sm mt-2 mb-6">Anda sudah melamar posisi ini. Silakan cek status di menu Riwayat.</p>
                                <a href="{{ route('kandidat.riwayat') }}" class="block w-full bg-gray-100 text-gray-700 text-center py-3 rounded-lg font-bold hover:bg-gray-200 transition">
                                    Cek Riwayat
                                </a>
                            </div>
                        @else
                            <h3 class="text-lg font-bold text-brand-navy mb-4">Lamar Sekarang</h3>
                            
                            @if(Auth::user()->kandidatProfil)
                                <form action="{{ route('kandidat.lowongan.store', $posisi->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                                    @csrf
                                    
                                    @foreach($posisi->syaratDokumen as $syarat)
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                                Upload {{ $syarat->nama_dokumen }} 
                                                @if($syarat->pivot->is_mandatory) <span class="text-red-500">*</span> @endif
                                            </label>
                                            <input type="file" name="berkas_{{ $syarat->id }}" accept=".pdf,.jpg,.jpeg" 
                                                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-brand-orange/10 file:text-brand-orange hover:file:bg-brand-orange/20 cursor-pointer border border-gray-300 rounded-lg"
                                                {{ $syarat->pivot->is_mandatory ? 'required' : '' }}>
                                            @error('berkas_' . $syarat->id)
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endforeach

                                    <div class="pt-4">
                                        <button type="submit" class="w-full bg-brand-orange text-white py-3 rounded-lg font-bold hover:bg-orange-600 transition shadow-lg shadow-orange-500/30">
                                            Kirim Lamaran
                                        </button>
                                    </div>
                                </form>
                            @else
                                <div class="bg-yellow-50 border border-yellow-200 p-4 rounded-lg text-center">
                                    <p class="text-yellow-800 text-sm mb-3">Anda harus melengkapi Biodata Diri sebelum bisa melamar.</p>
                                    <a href="{{ route('profil.index') }}" class="text-brand-orange font-bold text-sm hover:underline">Lengkapi Profil Sekarang &rarr;</a>
                                </div>
                            @endif

                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout>