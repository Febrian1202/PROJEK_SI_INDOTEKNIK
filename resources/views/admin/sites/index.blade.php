<x-admin-layout title="Master Data Site">
    <x-slot:title>CRUD Site</x-slot:title>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-brand-navy">Daftar Lokasi Site</h1>
        <a href="{{ route('admin.sites.create') }}" class="bg-brand-blue text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Site
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
                    <th class="px-6 py-3">Nama Site</th>
                    <th class="px-6 py-3">Lokasi Fisik</th>
                    <th class="px-6 py-3">Total Karyawan</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($sites as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-brand-orange/10 rounded text-brand-orange">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                </div>
                                {{ $item->nama_site }}
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-500">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                {{ $item->lokasi_fisik }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-blue-50 text-brand-blue px-3 py-1 rounded-full text-xs font-bold">
                                {{ $item->karyawan_count }} Orang
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center flex justify-center gap-3">
                            <a href="{{ route('admin.sites.edit', $item->id) }}" class="text-blue-600 hover:text-blue-900 font-medium">Edit</a>
                            <form action="{{ route('admin.sites.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus site ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-medium">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center py-8 text-gray-400">Belum ada data site.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">{{ $sites->links() }}</div>
    </div>
</x-admin-layout>