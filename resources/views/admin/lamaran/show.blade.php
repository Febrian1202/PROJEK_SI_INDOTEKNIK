<x-admin-layout title="Detail Pelamar">
    <x-slot:title>Detail Pelamar</x-slot:title>
    <div class="mb-6">
        
        @if(Auth::user()->role == 'direktur')
            <a href="{{ route('direktur.dashboard') }}" class="text-gray-500 hover:text-brand-blue flex items-center gap-1 text-sm mb-2 group">
                <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Dashboard
            </a>
        @else
            <a href="{{ route('admin.lamaran.index') }}" class="text-gray-500 hover:text-brand-blue flex items-center gap-1 text-sm mb-2 group">
                <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Daftar
            </a>
        @endif

        <div class="flex justify-between items-start">

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-2 space-y-6">
            
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="font-bold text-brand-navy mb-4 border-b pb-2">Data Diri Kandidat</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-gray-500">NIK / No. KTP</p>
                        <p class="font-medium">{{ $lamaran->kandidat->no_ktp }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Tanggal Lahir</p>
                        <p class="font-medium">{{ \Carbon\Carbon::parse($lamaran->kandidat->tgl_lahir)->format('d F Y') }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">No. Telepon</p>
                        <p class="font-medium">{{ $lamaran->kandidat->no_telp }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-gray-500">Alamat Domisili</p>
                        <p class="font-medium">{{ $lamaran->kandidat->alamat_domisili }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h3 class="font-bold text-brand-navy mb-4 border-b pb-2">Berkas Persyaratan</h3>
                <div class="space-y-3">
                    @foreach($lamaran->berkas as $berkas)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border border-gray-200 hover:bg-blue-50 transition">
                            <div class="flex items-center gap-3">
                                <svg class="w-8 h-8 text-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>
                                <div>
                                    <p class="font-medium text-sm text-gray-900">{{ $berkas->jenisDokumen->nama_dokumen }}</p>
                                    <p class="text-xs text-gray-500">{{ $berkas->nama_file_asli }}</p>
                                </div>
                            </div>
                            <a href="{{ asset('storage/' . $berkas->path_file) }}" target="_blank" class="text-sm text-brand-blue font-bold hover:underline">
                                Lihat / Download
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="lg:col-span-1">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 sticky top-6">
                <h3 class="font-bold text-brand-navy mb-4">Proses Lamaran</h3>
                
                <form action="{{ route('admin.lamaran.update', $lamaran->id) }}" method="POST" x-data="{ status: '{{ $lamaran->status }}' }">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Update Status</label>
                        <select name="status" x-model="status" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue">
                            <option value="Baru">Baru</option>
                            <option value="Diproses">Diproses (Interview/Review)</option>
                            <option value="Diterima">Diterima (Lolos)</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>
                    </div>

                    <div class="mb-4" x-show="status == 'Diterima'" x-transition>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Penempatan Site <span class="text-red-500">*</span></label>
                        <select name="site_id" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue bg-green-50">
                            <option value="">-- Pilih Lokasi Kerja --</option>
                            @foreach($sites as $site)
                                <option value="{{ $site->id }}">{{ $site->nama_site }} ({{ $site->lokasi_fisik }})</option>
                            @endforeach
                        </select>
                        <p class="text-xs text-gray-500 mt-1">Wajib diisi jika kandidat diterima.</p>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Catatan HRD (Internal)</label>
                        <textarea name="catatan_hr" rows="3" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue" placeholder="Contoh: Hasil interview bagus, nego gaji disepakati...">{{ $lamaran->catatan_hr }}</textarea>
                    </div>

                    <button type="submit" class="w-full bg-brand-blue text-white py-2.5 rounded-lg font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-500/30">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>

    </div>
</x-admin-layout>