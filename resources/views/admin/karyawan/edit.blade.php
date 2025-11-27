<x-admin-layout>
    <x-slot:title>Edit Karyawan</x-slot:title>
    <div class="mb-6">
        <a href="{{ route('admin.karyawan.index') }}" class="text-gray-500 hover:text-brand-blue flex items-center gap-1 text-sm mb-2">
            &larr; Kembali
        </a>
        <h1 class="text-2xl font-bold text-brand-navy">Edit Data Karyawan</h1>
        <p class="text-gray-500">{{ $karyawan->kandidat->nama_lengkap }} - {{ $karyawan->lamaran->posisi->nama_posisi }}</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 max-w-3xl">
        <form action="{{ route('admin.karyawan.update', $karyawan->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">NIK Karyawan</label>
                    <input type="text" name="nik_karyawan" value="{{ $karyawan->nik_karyawan }}" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Bergabung</label>
                    <input type="date" name="tgl_bergabung" value="{{ $karyawan->tgl_bergabung }}" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Penempatan Site</label>
                    <select name="site_id" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue">
                        @foreach($sites as $site)
                            <option value="{{ $site->id }}" {{ $karyawan->site_id == $site->id ? 'selected' : '' }}>
                                {{ $site->nama_site }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Status Kepegawaian</label>
                    <select name="status_karyawan" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue">
                        <option value="Kontrak" {{ $karyawan->status_karyawan == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                        <option value="Tetap" {{ $karyawan->status_karyawan == 'Tetap' ? 'selected' : '' }}>Tetap</option>
                        <option value="Probation" {{ $karyawan->status_karyawan == 'Probation' ? 'selected' : '' }}>Probation</option>
                        <option value="Resign" {{ $karyawan->status_karyawan == 'Resign' ? 'selected' : '' }}>Resign / Keluar</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.karyawan.index') }}" class="px-6 py-2.5 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 font-medium">Batal</a>
                <button type="submit" class="bg-brand-blue text-white px-6 py-2.5 rounded-lg hover:bg-blue-700 font-medium">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>