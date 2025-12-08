<x-admin-layout title="Monitoring Karyawan">
    <x-slot:title>Monitoring Karyawan</x-slot:title>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-brand-navy">Monitoring Data Karyawan</h1>
        <form method="GET" action="{{ route('direktur.karyawan.index') }}">
            <select name="site_id" class="rounded-lg border-gray-300 text-sm focus:ring-brand-blue" onchange="this.form.submit()">
                <option value="">Semua Site</option>
                @foreach($sites as $site)
                    <option value="{{ $site->id }}" {{ request('site_id') == $site->id ? 'selected' : '' }}>{{ $site->nama_site }}</option>
                @endforeach
            </select>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">NIK</th>
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">Jabatan</th>
                    <th class="px-6 py-3">Penempatan</th>
                    <th class="px-6 py-3">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($karyawan as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-mono text-xs">{{ $item->nik_karyawan }}</td>
                        <td class="px-6 py-4 font-medium">{{ $item->kandidat->nama_lengkap }}</td>
                        <td class="px-6 py-4">{{ $item->lamaran->posisi->nama_posisi }}</td>
                        <td class="px-6 py-4">{{ $item->site->nama_site }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">
                                {{ $item->status_karyawan }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-8 text-gray-400">Belum ada data karyawan.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">{{ $karyawan->links() }}</div>
    </div>
</x-admin-layout>