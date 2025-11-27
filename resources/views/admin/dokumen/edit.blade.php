<x-admin-layout title="Edit Dokumen">
    <div class="mb-6">
        <a href="{{ route('admin.dokumen.index') }}" class="text-gray-500 hover:text-brand-blue flex items-center gap-1 text-sm mb-2">
            &larr; Kembali
        </a>
        <h1 class="text-2xl font-bold text-brand-navy">Edit Dokumen</h1>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 max-w-2xl">
        <form action="{{ route('admin.dokumen.update', $dokumen->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Dokumen</label>
                <input type="text" name="nama_dokumen" value="{{ $dokumen->nama_dokumen }}" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue" required>
            </div>

            <div class="mb-8">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Format File</label>
                <select name="tipe_file" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue">
                    <option value="PDF" {{ $dokumen->tipe_file == 'PDF' ? 'selected' : '' }}>PDF</option>
                    <option value="JPG/PNG" {{ $dokumen->tipe_file == 'JPG/PNG' ? 'selected' : '' }}>JPG/PNG</option>
                    <option value="PDF/JPG" {{ $dokumen->tipe_file == 'PDF/JPG' ? 'selected' : '' }}>PDF atau Gambar</option>
                </select>
            </div>

            <button type="submit" class="bg-brand-blue text-white px-6 py-2.5 rounded-lg hover:bg-blue-700 font-medium w-full">
                Update Dokumen
            </button>
        </form>
    </div>
</x-admin-layout>