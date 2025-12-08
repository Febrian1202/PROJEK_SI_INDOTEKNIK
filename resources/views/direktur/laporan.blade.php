<x-admin-layout title="Laporan Kinerja">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-brand-navy">Laporan Rekrutmen</h1>
            <p class="text-gray-500 text-sm">Periode: {{ date('F Y', mktime(0, 0, 0, $bulan, 10)) }}</p>
        </div>

        <form method="GET" action="{{ route('direktur.laporan.index') }}" class="flex gap-2">
            <select name="bulan" class="rounded-lg border-gray-300 text-sm focus:ring-brand-blue">
                @for($i=1; $i<=12; $i++)
                    <option value="{{ $i }}" {{ $bulan == $i ? 'selected' : '' }}>{{ date('F', mktime(0, 0, 0, $i, 10)) }}</option>
                @endfor
            </select>
            <select name="tahun" class="rounded-lg border-gray-300 text-sm focus:ring-brand-blue">
                @for($i=date('Y'); $i>=date('Y')-2; $i--)
                    <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
            <button type="submit" class="bg-brand-blue text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700">Filter</button>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
            <p class="text-gray-500 text-xs uppercase tracking-wider">Karyawan Baru</p>
            <h3 class="text-3xl font-bold text-green-600 mt-2">{{ $karyawanBaru }}</h3>
        </div>
        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
            <p class="text-gray-500 text-xs uppercase tracking-wider">Total Pelamar Masuk</p>
            <h3 class="text-3xl font-bold text-blue-600 mt-2">{{ $pelamarMasuk }}</h3>
        </div>
        <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
            <p class="text-gray-500 text-xs uppercase tracking-wider">Pelamar Ditolak</p>
            <h3 class="text-3xl font-bold text-red-600 mt-2">{{ $pelamarDitolak }}</h3>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
            <h3 class="font-bold text-gray-700">Detail Karyawan Baru ({{ \Carbon\Carbon::createFromDate($tahun, $bulan)->format('F Y') }})</h3>
        </div>
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">Posisi</th>
                    <th class="px-6 py-3">Penempatan</th>
                    <th class="px-6 py-3">Tanggal Bergabung</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($listKaryawan as $karyawan)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium">{{ $karyawan->kandidat->nama_lengkap }}</td>
                        <td class="px-6 py-4">{{ $karyawan->lamaran->posisi->nama_posisi }}</td>
                        <td class="px-6 py-4">{{ $karyawan->site->nama_site }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($karyawan->tgl_bergabung)->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center py-8 text-gray-400">Tidak ada rekrutmen di periode ini.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-8 text-right">
        <button onclick="window.print()" class="bg-gray-800 text-white px-6 py-2 rounded-lg hover:bg-black transition flex items-center gap-2 inline-flex">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
            Cetak Laporan
        </button>
    </div>

</x-admin-layout>