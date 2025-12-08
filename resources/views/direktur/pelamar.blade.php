<x-admin-layout title="Monitoring Pelamar">
    <x-slot:title>Monitoring Pelamar</x-slot:title>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-brand-navy">Monitoring Seluruh Pelamar</h1>
        <form method="GET" action="{{ route('direktur.pelamar.index') }}">
            <select name="status" class="rounded-lg border-gray-300 text-sm focus:ring-brand-blue" onchange="this.form.submit()">
                <option value="">Semua Status</option>
                <option value="Baru" {{ request('status') == 'Baru' ? 'selected' : '' }}>Baru</option>
                <option value="Diproses" {{ request('status') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="Diterima" {{ request('status') == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                <option value="Ditolak" {{ request('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">Posisi</th>
                    <th class="px-6 py-3">Tanggal</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($lamaran as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium">{{ $item->kandidat->nama_lengkap }}</td>
                        <td class="px-6 py-4">{{ $item->posisi->nama_posisi }}</td>
                        <td class="px-6 py-4">{{ $item->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded text-xs font-bold {{ $item->status == 'Diterima' ? 'bg-green-100 text-green-700' : ($item->status == 'Ditolak' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700') }}">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.lamaran.show', $item->id) }}" class="text-brand-blue hover:underline">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-8 text-gray-400">Data kosong.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">{{ $lamaran->links() }}</div>
    </div>
</x-admin-layout>