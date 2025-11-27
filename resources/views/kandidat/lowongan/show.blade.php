<x-layout>
    <x-slot:title>{{ $posisi->nama_posisi }}</x-slot:title>
    <div class="pt-24 pb-12 min-h-screen bg-gray-50">
        <div class="max-w-5xl mx-auto px-6 lg:px-8">
            
            <div class="mb-6">
                <a href="{{ route('kandidat.lowongan') }}" class="text-gray-500 hover:text-brand-orange text-sm flex items-center gap-1">
                    &larr; Kembali ke Daftar Lowongan
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 mb-6">
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