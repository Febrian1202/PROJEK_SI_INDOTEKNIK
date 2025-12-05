<x-layout>
    <x-slot:title>Profil</x-slot:title>

    <div class="pt-24 pb-12 min-h-screen bg-gray-50">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <div class="mb-6">
                <a href="{{ route('kandidat.dashboard') }}"
                    class="inline-flex items-center text-gray-500 hover:text-brand-orange transition-colors font-medium text-sm group">
                    <svg class="w-5 h-5 mr-1 transition-transform group-hover:-translate-x-1" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Dashboard
                </a>
            </div>
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-brand-navy">Profil Saya</h1>
                <p class="text-gray-500">Lengkapi data diri Anda sebelum melamar pekerjaan.</p>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <div class="bg-brand-navy px-8 py-6">
                    <div class="flex items-center gap-4">
                        <div class="bg-brand-navy px-8 py-6 relative overflow-hidden">
                            <div class="flex items-center gap-6 relative z-10">

                                <div
                                    class="h-24 w-24 rounded-full bg-white p-1 shadow-lg overflow-hidden relative group">
                                    @if ($profil && $profil->foto)
                                        <img src="{{ asset('storage/' . $profil->foto) }}" alt="Foto Profil"
                                            class="w-full h-full object-cover rounded-full">
                                    @else
                                        <div
                                            class="w-full h-full bg-brand-orange text-white flex items-center justify-center text-3xl font-bold rounded-full">
                                            {{ substr(Auth::user()->name, 0, 1) }}
                                        </div>
                                    @endif

                                    <div
                                        class="absolute inset-0 bg-black/30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity rounded-full">
                                        <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                </div>

                                <div class="text-white">
                                </div>
                            </div>
                        </div>
                        <div class="text-white">
                            <h2 class="text-xl font-bold">{{ Auth::user()->name }}</h2>
                            <p class="text-brand-orange/80 text-sm">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-brand-navy mb-2">Ganti Foto Profil</label>
                            <input type="file" name="foto" accept="image/*"
                                class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-brand-orange/10 file:text-brand-orange
                                hover:file:bg-brand-orange/20 cursor-pointer
                            " />
                            <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG. Maksimal 2MB.</p>
                            @error('foto')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-brand-navy mb-2">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                class="w-full pl-2 bg-gray-50 shadow-md rounded-md border-gray-300 focus:ring-brand-orange focus:border-brand-orange"
                                required>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-brand-navy mb-2">Nomor KTP (NIK)</label>
                            <input type="number" name="no_ktp" value="{{ old('no_ktp', $profil->no_ktp ?? '') }}"
                                class="w-full pl-2 bg-gray-50 shadow-md rounded-md border-gray-300 focus:ring-brand-orange focus:border-brand-orange"
                                placeholder="16 Digit NIK" required>
                            @error('no_ktp')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-brand-navy mb-2">Nomor WhatsApp /
                                Telp</label>
                            <input type="number" name="no_telp" value="{{ old('no_telp', $profil->no_telp ?? '') }}"
                                class="pl-2 bg-gray-50 shadow-md rounded-md w-full border-gray-300 focus:ring-brand-orange focus:border-brand-orange"
                                placeholder="Contoh: 0812..." required>
                            @error('no_telp')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-brand-navy mb-2">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir"
                                value="{{ old('tgl_lahir', $profil->tgl_lahir ?? '') }}"
                                class="w-full pl-2 bg-gray-50 shadow-md rounded-md border-gray-300 focus:ring-brand-orange focus:border-brand-orange"
                                required>
                            @error('tgl_lahir')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-brand-navy mb-2">Alamat Domisili
                                Lengkap</label>
                            <textarea name="alamat_domisili" rows="3"
                                class="w-full pl-2 bg-gray-50 shadow-md rounded-md border-gray-300 focus:ring-brand-orange focus:border-brand-orange"
                                placeholder="Jalan, RT/RW, Kelurahan, Kecamatan..." required>{{ old('alamat_domisili', $profil->alamat_domisili ?? '') }}</textarea>
                            @error('alamat_domisili')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="mt-8 flex justify-end">
                        <button type="submit"
                            class="bg-brand-orange text-white px-6 py-3 rounded-lg font-bold hover:bg-orange-600 transition shadow-lg shadow-orange-500/30">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-layout>
