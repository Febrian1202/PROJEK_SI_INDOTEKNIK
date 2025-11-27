<x-admin-layout title="Tambah Site Baru">
    <div class="mb-6">
        <a href="{{ route('admin.sites.index') }}" class="text-gray-500 hover:text-brand-blue flex items-center gap-1 text-sm mb-2">
            &larr; Kembali
        </a>
        <h1 class="text-2xl font-bold text-brand-navy">Tambah Lokasi Site</h1>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 max-w-2xl">
        <form action="{{ route('admin.sites.store') }}" method="POST">
            @csrf
            
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Site</label>
                <input type="text" name="nama_site" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue" placeholder="Contoh: Site Morowali Utara" required>
            </div>

            <div class="mb-8">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi Fisik (Kabupaten/Kota)</label>
                <input type="text" name="lokasi_fisik" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue" placeholder="Contoh: Kab. Morowali" required>
            </div>

            <button type="submit" class="bg-brand-blue text-white px-6 py-2.5 rounded-lg hover:bg-blue-700 font-medium w-full">
                Simpan Site
            </button>
        </form>
    </div>
</x-admin-layout>