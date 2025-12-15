<x-admin-layout>
    <x-slot:title>Create Lamaran</x-slot:title>
    <div class="mb-6">
        <a href="{{ route('admin.posisi.index') }}" class="text-gray-500 hover:text-brand-blue flex items-center gap-1 text-sm mb-2">
            &larr; Kembali
        </a>
        <h1 class="text-2xl font-bold text-brand-navy">Tambah Lowongan Baru</h1>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 max-w-3xl">
        <form action="{{ route('admin.posisi.store') }}" method="POST">
            @csrf
            
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Posisi / Jabatan</label>
                <input type="text" name="nama_posisi" class="w-full pl-2 bg-gray-50 shadow-md rounded-md border-gray-300 focus:ring-brand-orange focus:border-brand-orange" placeholder="Contoh: Site Manager" required>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Pekerjaan</label>
                <textarea name="deskripsi" rows="4" class="w-full pl-2 bg-gray-50 shadow-md rounded-md border-gray-300 focus:ring-brand-orange focus:border-brand-orange" placeholder="Jelaskan tanggung jawab dan kualifikasi..."></textarea>
            </div>

            <div class="mb-8">
                <label class="block text-sm font-semibold text-gray-700 mb-3">Dokumen Persyaratan Wajib</label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    @foreach($dokumen as $doc)
                        <label class="flex items-center space-x-3 p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="syarat_dokumen[]" value="{{ $doc->id }}" class="h-4 w-4 text-brand-blue rounded border-gray-300 focus:ring-brand-blue">
                            <span class="text-gray-700 text-sm">{{ $doc->nama_dokumen }}</span>
                        </label>
                    @endforeach
                </div>
                <p class="text-xs text-gray-500 mt-2">*Centang dokumen yang wajib diupload pelamar untuk posisi ini.</p>
            </div>

            <button type="submit" class="bg-brand-blue text-white px-6 py-2.5 rounded-lg hover:bg-blue-700 font-medium w-full md:w-auto">
                Simpan Lowongan
            </button>
        </form>
    </div>
</x-admin-layout>