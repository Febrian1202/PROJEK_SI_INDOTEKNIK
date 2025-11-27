<x-admin-layout title="Master Dokumen Persyaratan">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-brand-navy">Master Dokumen</h1>
        <a href="{{ route('admin.dokumen.create') }}" class="bg-brand-blue text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Dokumen
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">{{ session('error') }}</div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">Nama Dokumen</th>
                    <th class="px-6 py-3">Tipe File</th>
                    <th class="px-6 py-3">Digunakan Di</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($dokumen as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $item->nama_dokumen }}</td>
                        <td class="px-6 py-4">
                            <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs font-mono border border-gray-200">
                                {{ $item->tipe_file }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500">
                            {{ $item->posisi()->count() }} Lowongan
                        </td>
                        <td class="px-6 py-4 text-center flex justify-center gap-3">
                            <a href="{{ route('admin.dokumen.edit', $item->id) }}" class="text-blue-600 hover:text-blue-900 font-medium">Edit</a>
                            <form action="{{ route('admin.dokumen.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus dokumen ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center py-8 text-gray-400">Belum ada data dokumen.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">{{ $dokumen->links() }}</div>
    </div>
</x-admin-layout>