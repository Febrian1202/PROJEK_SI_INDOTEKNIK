<x-admin-layout>
    
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-brand-navy">Executive Overview</h1>
            <p class="text-gray-500 text-sm">Laporan kinerja rekrutmen bulan {{ date('F Y') }}.</p>
        </div>
        <a href="#" class="bg-brand-navy text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-brand-blue transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
            Unduh Laporan PDF
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        
        <div class="bg-gradient-to-br from-brand-navy to-brand-blue p-6 rounded-xl shadow-lg text-white relative overflow-hidden group">
            <div class="absolute right-0 top-0 opacity-10 transform translate-x-2 -translate-y-2 group-hover:scale-110 transition-transform">
                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.31-8.86c-1.77-.45-2.34-.94-2.34-1.67 0-.84.79-1.43 2.1-1.43 1.38 0 1.9.66 1.94 1.64h1.71c-.05-1.34-.87-2.57-2.49-2.97V5H10.9v1.69c-1.51.32-2.72 1.3-2.72 2.81 0 1.79 1.49 2.69 3.66 3.21 1.95.46 2.34 1.15 2.34 1.87 0 .53-.39 1.39-2.1 1.39-1.6 0-2.23-.72-2.32-1.64H8.04c.1 1.7 1.36 2.66 2.86 2.97V19h2.34v-1.67c1.52-.29 2.72-1.16 2.73-2.77-.01-2.2-1.9-2.96-3.66-3.42z"/></svg>
            </div>
            <p class="text-white/70 text-sm font-medium">Karyawan Diterima</p>
            <h3 class="text-4xl font-bold mt-2">{{ $karyawanBaru }}</h3>
            <div class="mt-4 flex items-center text-xs text-green-300 bg-white/10 w-fit px-2 py-1 rounded">
                <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                {{ $trendText }}
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Menunggu Persetujuan</p>
                <h3 class="text-4xl font-bold text-brand-orange mt-2">{{ $menungguApproval }}</h3>
            </div>
            <p class="text-xs text-gray-400 mt-2">Kandidat lolos seleksi awal HR</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Total Database Pelamar</p>
                <h3 class="text-4xl font-bold text-brand-navy mt-2">{{ number_format($totalPelamar) }}</h3>
            </div>
            <p class="text-xs text-gray-400 mt-2">Talent pool perusahaan</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Lowongan Aktif</p>
                <h3 class="text-4xl font-bold text-gray-700 mt-2">{{ $posisiTerbuka }}</h3>
            </div>
            <p class="text-xs text-gray-400 mt-2">Posisi jabatan dibuka</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
            <div class="flex items-center gap-2">
                <h3 class="font-bold text-brand-navy text-lg">Menunggu Persetujuan Anda</h3>
                @if($menungguApproval > 0)
                    <span class="bg-brand-orange text-white px-2 py-0.5 rounded-full text-xs font-bold animate-pulse">{{ $menungguApproval }} Baru</span>
                @endif
            </div>
            <span class="text-xs text-gray-500">Menampilkan yang berstatus 'Diproses'</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-gray-500 border-b border-gray-100 bg-white">
                    <tr>
                        <th class="px-6 py-4 font-medium">Kandidat</th>
                        <th class="px-6 py-4 font-medium">Posisi Dilamar</th>
                        <th class="px-6 py-4 font-medium">Catatan HR</th>
                        <th class="px-6 py-4 font-medium text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($listApproval as $lamaran)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center font-bold text-brand-blue text-sm border-2 border-white shadow-sm overflow-hidden">
                                        @if($lamaran->kandidat->foto)
                                            <img src="{{ asset('storage/' . $lamaran->kandidat->foto) }}" class="w-full h-full object-cover">
                                        @else
                                            {{ substr($lamaran->kandidat->nama_lengkap, 0, 2) }}
                                        @endif
                                    </div>
                                    <div>
                                        <span class="block font-semibold text-brand-navy">{{ $lamaran->kandidat->nama_lengkap }}</span>
                                        <span class="text-xs text-gray-500">{{ $lamaran->kandidat->no_telp }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-gray-700 font-medium">{{ $lamaran->posisi->nama_posisi }}</span>
                                <span class="block text-xs text-gray-400">{{ $lamaran->created_at->diffForHumans() }}</span>
                            </td>
                            <td class="px-6 py-4">
                                @if($lamaran->catatan_hr)
                                    <span class="bg-blue-50 text-blue-700 px-3 py-1.5 rounded-lg text-xs italic block max-w-xs">
                                        "{{ $lamaran->catatan_hr }}"
                                    </span>
                                @else
                                    <span class="text-gray-400 italic text-xs">- Belum ada catatan -</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 flex justify-center gap-2">
                                <a href="{{ route('admin.lamaran.show', $lamaran->id) }}" class="p-2 bg-green-50 text-green-600 hover:bg-green-600 hover:text-white rounded-lg transition" title="Tinjau & Setujui">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                </a>
                                
                                <form action="{{ route('direktur.approval.action', $lamaran->id) }}" method="POST" onsubmit="return confirm('Tolak kandidat ini?');">
                                    @csrf
                                    <input type="hidden" name="action" value="tolak">
                                    <button type="submit" class="p-2 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded-lg transition" title="Tolak">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                    </button>
                                </form>

                                <a href="{{ route('admin.lamaran.show', $lamaran->id) }}" class="p-2 bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white rounded-lg transition" title="Lihat Berkas">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-gray-400">
                                <div class="flex flex-col items-center">
                                    <svg class="w-12 h-12 mb-3 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    <p>Tidak ada kandidat yang menunggu persetujuan.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-admin-layout>