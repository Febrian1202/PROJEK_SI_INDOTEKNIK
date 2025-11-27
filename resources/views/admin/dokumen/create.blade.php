<x-admin-layout title="Tambah Dokumen">
    <div class="mb-6">
        <a href="{{ route('admin.dokumen.index') }}" class="text-gray-500 hover:text-brand-blue flex items-center gap-1 text-sm mb-2">
            &larr; Kembali
        </a>
        <h1 class="text-2xl font-bold text-brand-navy">Tambah Jenis Dokumen</h1>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 max-w-2xl">
        <form action="{{ route('admin.dokumen.store') }}" method="POST">
            @csrf
            
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Dokumen</label>
                <input type="text" name="nama_dokumen" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue" placeholder="Contoh: Sertifikat Vaksin" required>
                <p class="text-xs text-gray-500 mt-1">Nama ini akan muncul di form upload pelamar.</p>
            </div>

            <div class="mb-8">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Format File yang Diizinkan</label>
                <select name="tipe_file" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue">
                    <option value="PDF">PDF (Dokumen Standar)</option>
                    <option value="JPG/PNG">JPG/PNG (Gambar/Foto)</option>
                    <option value="PDF/JPG">PDF atau Gambar (Fleksibel)</option>
                </select>
            </div>

            <button type="submit" class="bg-brand-blue text-white px-6 py-2.5 rounded-lg hover:bg-blue-700 font-medium w-full">
                Simpan Dokumen
            </button>
        </form>
    </div>
</x-admin-layout>