<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-brand-navy">Kelola Lowongan (Posisi)</h1>
        <a href="{{ route('admin.posisi.create') }}" class="bg-brand-blue text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Lowongan
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">Nama Posisi</th>
                    <th class="px-6 py-3">Syarat Dokumen</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($posisi as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $item->nama_posisi }}</td>
                        <td class="px-6 py-4 text-gray-500">
                            <div class="flex flex-wrap gap-1">
                                @foreach($item->syaratDokumen as $dokumen)
                                    <span class="bg-gray-100 px-2 py-0.5 rounded text-xs border border-gray-200">{{ $dokumen->nama_dokumen }}</span>
                                @endforeach
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if($item->is_active)
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-bold">Aktif</span>
                            @else
                                <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs font-bold">Tutup</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 flex justify-center gap-2">
                            <a href="{{ route('admin.posisi.edit', $item->id) }}" class="text-blue-600 hover:text-blue-900 font-medium">Edit</a>
                            <form action="{{ route('admin.posisi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus lowongan ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-4">
            {{ $posisi->links() }}
        </div>
    </div>
</x-admin-layout>