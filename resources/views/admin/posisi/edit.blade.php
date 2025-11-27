<x-admin-layout>
    <div class="mb-6">
        <a href="{{ route('admin.posisi.index') }}" class="text-gray-500 hover:text-brand-blue flex items-center gap-1 text-sm mb-2">
            &larr; Kembali
        </a>
        <h1 class="text-2xl font-bold text-brand-navy">Edit Lowongan</h1>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 max-w-3xl">
        <form action="{{ route('admin.posisi.update', $posisi->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Posisi</label>
                <input type="text" name="nama_posisi" value="{{ $posisi->nama_posisi }}" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue focus:border-brand-blue" required>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="4" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue focus:border-brand-blue">{{ $posisi->deskripsi }}</textarea>
            </div>

            <div class="mb-6">
                <label class="flex items-center space-x-3">
                    <input type="checkbox" name="is_active" value="1" {{ $posisi->is_active ? 'checked' : '' }} class="h-5 w-5 text-green-600 rounded border-gray-300 focus:ring-green-500">
                    <span class="text-gray-900 font-medium">Lowongan Dibuka (Aktif)</span>
                </label>
            </div>

            <div class="mb-8">
                <label class="block text-sm font-semibold text-gray-700 mb-3">Dokumen Persyaratan</label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    @foreach($dokumen as $doc)
                        <label class="flex items-center space-x-3 p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="checkbox" name="syarat_dokumen[]" value="{{ $doc->id }}" 
                                {{ in_array($doc->id, $selectedDokumen) ? 'checked' : '' }}
                                class="h-4 w-4 text-brand-blue rounded border-gray-300 focus:ring-brand-blue">
                            <span class="text-gray-700 text-sm">{{ $doc->nama_dokumen }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="bg-brand-blue text-white px-6 py-2.5 rounded-lg hover:bg-blue-700 font-medium">
                Update Data
            </button>
        </form>
    </div>
</x-admin-layout>