<x-admin-layout>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Total Pelamar</p>
                <h3 class="text-3xl font-bold text-brand-navy mt-1">{{ number_format($totalPelamar) }}</h3>
            </div>
            <div class="p-3 bg-blue-50 rounded-full text-brand-blue">
                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Perlu Review</p>
                <h3 class="text-3xl font-bold text-green-600 mt-1">{{ $perluReview }}</h3>
            </div>
            <div class="p-3 bg-green-50 rounded-full text-green-600">
                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Lowongan Aktif</p>
                <h3 class="text-3xl font-bold text-brand-orange mt-1">{{ $lowonganAktif }}</h3>
            </div>
            <div class="p-3 bg-orange-50 rounded-full text-brand-orange">
                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
            <h3 class="font-bold text-brand-navy text-lg">Pelamar Terbaru</h3>
            <a href="#" class="text-sm text-brand-blue hover:underline">Lihat Semua</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">Nama Pelamar</th>
                        <th class="px-6 py-3">Posisi</th>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    
                    @forelse($lamaranTerbaru as $lamaran)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $lamaran->kandidat->nama_lengkap ?? 'User #' . $lamaran->kandidat_id }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $lamaran->posisi->nama_posisi ?? '-' }}
                            </td>
                            <td class="px-6 py-4 text-gray-500">
                                {{ $lamaran->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $statusClass = match($lamaran->status) {
                                        'Baru' => 'bg-blue-100 text-blue-700',
                                        'Diproses' => 'bg-yellow-100 text-yellow-700',
                                        'Diterima' => 'bg-green-100 text-green-700',
                                        'Ditolak' => 'bg-red-100 text-red-700',
                                        default => 'bg-gray-100 text-gray-700'
                                    };
                                @endphp
                                <span class="{{ $statusClass }} px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ $lamaran->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button class="text-brand-blue hover:underline font-medium">Detail</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                                Belum ada lamaran masuk.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

</x-admin-layout>