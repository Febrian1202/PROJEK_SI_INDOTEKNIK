<x-admin-layout title="Data Karyawan">
    <x-slot:title>Data Karyawan</x-slot>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-brand-navy">Data Karyawan Aktif</h1>
    </div>

    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 mb-6">
        <form method="GET" action="{{ route('admin.karyawan.index') }}" class="flex flex-col md:flex-row gap-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama Karyawan..."
                class="flex-1 rounded-lg border-gray-300 focus:ring-brand-blue">

            <select name="site_id" class="rounded-lg border-gray-300 focus:ring-brand-blue md:w-48">
                <option value="">Semua Site</option>
                @foreach ($sites as $site)
                    <option value="{{ $site->id }}" {{ request('site_id') == $site->id ? 'selected' : '' }}>
                        {{ $site->nama_site }}</option>
                @endforeach
            </select>

            <select name="status" class="rounded-lg border-gray-300 focus:ring-brand-blue md:w-40">
                <option value="">Semua Status</option>
                <option value="Tetap" {{ request('status') == 'Tetap' ? 'selected' : '' }}>Tetap</option>
                <option value="Kontrak" {{ request('status') == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                <option value="Probation" {{ request('status') == 'Probation' ? 'selected' : '' }}>Probation</option>
            </select>

            <button type="submit"
                class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 font-medium">Filter</button>
        </form>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">Nama & NIK</th>
                    <th class="px-6 py-3">Jabatan</th>
                    <th class="px-6 py-3">Penempatan</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Bergabung</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($karyawan as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="font-bold text-gray-900">{{ $item->kandidat->nama_lengkap }}</div>
                            <div class="text-xs text-gray-500 font-mono">{{ $item->nik_karyawan }}</div>
                        </td>
                        <td class="px-6 py-4 text-gray-700">
                            {{ $item->lamaran?->posisi?->nama_posisi ?? 'Posisi Tidak Ditemukan' }}
                        </td>
                        <td class="px-6 py-4">
                            <span class="flex items-center gap-1 text-gray-600">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $item->site->nama_site }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $statusClass = match ($item->status_karyawan) {
                                    'Tetap' => 'bg-green-100 text-green-700',
                                    'Kontrak' => 'bg-blue-100 text-blue-700',
                                    'Probation' => 'bg-yellow-100 text-yellow-700',
                                    default => 'bg-gray-100 text-gray-700',
                                };
                            @endphp
                            <span class="{{ $statusClass }} px-2.5 py-0.5 rounded-full text-xs font-bold">
                                {{ $item->status_karyawan }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500">
                            {{ \Carbon\Carbon::parse($item->tgl_bergabung)->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 text-center flex justify-center gap-2">
                            <a href="{{ route('admin.karyawan.edit', $item->id) }}"
                                class="text-blue-600 hover:text-blue-900 font-medium">Edit</a>
                            <span class="text-gray-300">|</span>
                            <form action="{{ route('admin.karyawan.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Hapus data karyawan ini?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="text-red-600 hover:text-red-900 font-medium">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-8 text-gray-400">Data karyawan tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">{{ $karyawan->withQueryString()->links() }}</div>
    </div>
</x-admin-layout>
