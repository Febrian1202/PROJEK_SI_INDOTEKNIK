<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-brand-navy">Executive Overview</h1>
            <p class="text-gray-500 text-sm">Laporan kinerja rekrutmen bulan ini.</p>
        </div>
        <button class="bg-brand-navy text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-brand-blue transition">
            <svg class="w-4 h-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
            Unduh Laporan PDF
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-gradient-to-br from-brand-navy to-brand-blue p-6 rounded-xl shadow-lg text-white">
            <p class="text-white/70 text-sm font-medium">Karyawan Diterima</p>
            <h3 class="text-4xl font-bold mt-2">12</h3>
            <div class="mt-4 flex items-center text-xs text-green-300">
                <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                +2 dari bulan lalu
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <p class="text-gray-500 text-sm font-medium">Menunggu Persetujuan</p>
            <h3 class="text-4xl font-bold text-brand-orange mt-2">3</h3>
            <p class="text-xs text-gray-400 mt-2">Berkas kandidat tahap akhir</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <p class="text-gray-500 text-sm font-medium">Total Pelamar</p>
            <h3 class="text-4xl font-bold text-brand-navy mt-2">1,240</h3>
            <p class="text-xs text-gray-400 mt-2">Database talenta</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <p class="text-gray-500 text-sm font-medium">Posisi Terbuka</p>
            <h3 class="text-4xl font-bold text-gray-700 mt-2">5</h3>
            <p class="text-xs text-gray-400 mt-2">Lowongan aktif</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
            <h3 class="font-bold text-brand-navy text-lg">Menunggu Persetujuan Anda</h3>
            <span class="bg-brand-orange/10 text-brand-orange px-3 py-1 rounded-full text-xs font-bold">Prioritas</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-gray-500 border-b border-gray-100 bg-white">
                    <tr>
                        <th class="px-6 py-4 font-medium">Kandidat</th>
                        <th class="px-6 py-4 font-medium">Posisi Dilamar</th>
                        <th class="px-6 py-4 font-medium">Rekomendasi HR</th>
                        <th class="px-6 py-4 font-medium text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center font-bold text-gray-500 text-xs">BS</div>
                                <span class="font-semibold text-brand-navy">Budi Santoso</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">Site Manager</td>
                        <td class="px-6 py-4">
                            <span class="text-green-600 bg-green-50 px-2 py-1 rounded text-xs font-bold">Sangat Direkomendasikan</span>
                        </td>
                        <td class="px-6 py-4 flex justify-center gap-2">
                            <button class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition" title="Setujui">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </button>
                            <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Tolak">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                            <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Lihat Detail">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center font-bold text-gray-500 text-xs">SA</div>
                                <span class="font-semibold text-brand-navy">Siti Aminah</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">Staff Admin</td>
                        <td class="px-6 py-4">
                            <span class="text-blue-600 bg-blue-50 px-2 py-1 rounded text-xs font-bold">Cukup Baik</span>
                        </td>
                        <td class="px-6 py-4 flex justify-center gap-2">
                            <button class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></button>
                            <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
                            <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition"><svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</x-admin-layout>