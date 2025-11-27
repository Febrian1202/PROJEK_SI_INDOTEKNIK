<x-admin-layout title="Manajemen Pelamar">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-brand-navy">Daftar Pelamar Masuk</h1>
        
        <form method="GET" action="{{ route('admin.lamaran.index') }}" class="flex gap-2">
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
                    <th class="px-6 py-3">Pelamar</th>
                    <th class="px-6 py-3">Posisi Dilamar</th>
                    <th class="px-6 py-3">Tgl Lamar</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($lamaran as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="font-medium text-gray-900">{{ $item->kandidat->nama_lengkap }}</div>
                            <div class="text-xs text-gray-500">{{ $item->kandidat->no_telp }}</div>
                        </td>
                        <td class="px-6 py-4">{{ $item->posisi->nama_posisi }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ \Carbon\Carbon::parse($item->tgl_lamar)->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            @php
                                $badgeColor = match($item->status) {
                                    'Baru' => 'bg-blue-100 text-blue-700',
                                    'Diproses' => 'bg-yellow-100 text-yellow-700',
                                    'Diterima' => 'bg-green-100 text-green-700',
                                    'Ditolak' => 'bg-red-100 text-red-700',
                                    default => 'bg-gray-100 text-gray-700'
                                };
                            @endphp
                            <span class="{{ $badgeColor }} px-2.5 py-0.5 rounded-full text-xs font-bold">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('admin.lamaran.show', $item->id) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-brand-blue/10 text-brand-blue hover:bg-brand-blue hover:text-white transition">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-8 text-gray-400">Tidak ada data pelamar.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">{{ $lamaran->withQueryString()->links() }}</div>
    </div>
</x-admin-layout>