<x-admin-layout title="Persetujuan Kandidat">
    <x-slot:title>Halaman Persetujuan</x-slot:title>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-brand-navy">Persetujuan Kandidat</h1>
        <p class="text-gray-500 text-sm">Daftar kandidat yang telah lolos seleksi HR dan menunggu persetujuan Anda.</p>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">Kandidat</th>
                    <th class="px-6 py-3">Posisi</th>
                    <th class="px-6 py-3">Catatan HR</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($lamaran as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="font-bold text-brand-navy">{{ $item->kandidat->nama_lengkap }}</div>
                            <div class="text-xs text-gray-500">{{ $item->kandidat->no_telp }}</div>
                        </td>
                        <td class="px-6 py-4">{{ $item->posisi->nama_posisi }}</td>
                        <td class="px-6 py-4">
                            <span class="bg-blue-50 text-blue-700 px-3 py-1 rounded text-xs italic">
                                "{{ $item->catatan_hr ?? 'Siap direview' }}"
                            </span>
                        </td>
                        <td class="px-6 py-4 flex justify-center gap-2">
                            <a href="{{ route('admin.lamaran.show', $item->id) }}" class="bg-green-100 text-green-700 px-3 py-1.5 rounded-lg hover:bg-green-200 transition font-bold text-xs flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Setujui
                            </a>
                            
                            <form action="{{ route('direktur.approval.action', $item->id) }}" method="POST" onsubmit="return confirm('Tolak kandidat ini?');">
                                @csrf
                                <input type="hidden" name="action" value="tolak">
                                <button type="submit" class="bg-red-100 text-red-700 px-3 py-1.5 rounded-lg hover:bg-red-200 transition font-bold text-xs flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                    Tolak
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center py-12 text-gray-400">Tidak ada persetujuan tertunda.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">{{ $lamaran->links() }}</div>
    </div>
</x-admin-layout>