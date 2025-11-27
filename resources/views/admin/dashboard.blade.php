<x-admin-layout>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Total Pelamar</p>
                <h3 class="text-3xl font-bold text-brand-navy mt-1">1,240</h3>
            </div>
            <div class="p-3 bg-blue-50 rounded-full text-brand-blue">
                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Lamaran Baru</p>
                <h3 class="text-3xl font-bold text-green-600 mt-1">18</h3>
            </div>
            <div class="p-3 bg-green-50 rounded-full text-green-600">
                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Lowongan Aktif</p>
                <h3 class="text-3xl font-bold text-brand-orange mt-1">5</h3>
            </div>
            <div class="p-3 bg-orange-50 rounded-full text-brand-orange">
                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
            <h3 class="font-bold text-brand-navy text-lg">Pelamar Terbaru</h3>
            
            <div class="flex gap-2">
                <select class="text-sm border-gray-300 rounded-md shadow-sm focus:border-brand-blue focus:ring focus:ring-brand-blue/20 text-gray-600">
                    <option>Semua Status</option>
                    <option>Baru</option>
                    <option>Diterima</option>
                </select>
            </div>
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
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900">Budi Santoso</td>
                        <td class="px-6 py-4">Driver Dump Truck</td>
                        <td class="px-6 py-4 text-gray-500">27 Nov 2025</td>
                        <td class="px-6 py-4">
                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">Baru</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button class="text-brand-blue hover:underline font-medium">Detail</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900">Siti Aminah</td>
                        <td class="px-6 py-4">Staff Administrasi</td>
                        <td class="px-6 py-4 text-gray-500">26 Nov 2025</td>
                        <td class="px-6 py-4">
                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">Review</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button class="text-brand-blue hover:underline font-medium">Detail</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900">Ahmad Dani</td>
                        <td class="px-6 py-4">Site Manager</td>
                        <td class="px-6 py-4 text-gray-500">25 Nov 2025</td>
                        <td class="px-6 py-4">
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">Ditolak</span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button class="text-brand-blue hover:underline font-medium">Detail</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</x-admin-layout>