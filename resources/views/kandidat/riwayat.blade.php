<x-layout title="Riwayat Lamaran">
    <x-slot:title>Riwayat Lamaran</x-slot:title>

    <div class="pt-24 pb-12 min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="mb-6">
                <a href="{{ route('kandidat.dashboard') }}" class="text-gray-500 hover:text-brand-orange text-sm flex items-center gap-1">
                    &larr; Kembali ke Dashboard
                </a>
            </div>
            
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-brand-navy">Riwayat Lamaran</h1>
                <p class="text-gray-500 mt-1">Pantau status lamaran pekerjaan yang telah Anda kirim.</p>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r shadow-sm flex justify-between items-center">
                    <span>{{ session('success') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-green-700 font-bold">&times;</button>
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-r shadow-sm">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                
                <div class="hidden md:block overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                            <tr>
                                <th class="px-6 py-4 font-semibold">Posisi Dilamar</th>
                                <th class="px-6 py-4 font-semibold">Tanggal Kirim</th>
                                <th class="px-6 py-4 font-semibold">Status</th>
                                <th class="px-6 py-4 font-semibold">Catatan HR</th>
                                <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($lamaran as $item)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-gray-900 text-base">{{ $item->posisi->nama_posisi }}</div>
                                        <div class="text-xs text-gray-500 mt-1">Full Time • On Site</div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $item->created_at->format('d F Y') }}
                                        <span class="text-xs text-gray-400 block">{{ $item->created_at->format('H:i') }} WIB</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $statusColor = match($item->status) {
                                                'Baru' => 'bg-blue-100 text-blue-700 border-blue-200',
                                                'Diproses' => 'bg-yellow-100 text-yellow-700 border-yellow-200',
                                                'Diterima' => 'bg-green-100 text-green-700 border-green-200',
                                                'Ditolak' => 'bg-red-100 text-red-700 border-red-200',
                                                default => 'bg-gray-100 text-gray-700'
                                            };
                                        @endphp
                                        <span class="{{ $statusColor }} px-3 py-1 rounded-full text-xs font-bold border inline-flex items-center gap-1.5">
                                            @if($item->status == 'Diterima')
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                            @elseif($item->status == 'Ditolak')
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                            @elseif($item->status == 'Diproses')
                                                <svg class="w-3 h-3 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                            @endif
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($item->catatan_hr)
                                            <div class="text-xs text-gray-600 bg-gray-50 p-2 rounded border border-gray-200 italic max-w-xs">
                                                "{{ $item->catatan_hr }}"
                                            </div>
                                        @else
                                            <span class="text-gray-400 text-xs">-</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        @if($item->status == 'Baru')
                                            <form action="{{ route('kandidat.lamaran.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin membatalkan lamaran ini? Berkas Anda akan dihapus permanen.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-medium hover:underline transition-colors">
                                                    Batalkan
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-gray-400 text-xs italic">Tidak ada aksi</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4 text-gray-400">
                                                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                                            </div>
                                            <h3 class="text-lg font-bold text-gray-900">Belum Ada Lamaran</h3>
                                            <p class="text-gray-500 text-sm mt-1 mb-4">Anda belum melamar pekerjaan apapun saat ini.</p>
                                            <a href="{{ route('kandidat.lowongan') }}" class="text-white bg-brand-orange hover:bg-orange-600 px-4 py-2 rounded-lg font-bold transition shadow-lg shadow-orange-500/30">
                                                Cari Lowongan
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="md:hidden">
                    @forelse($lamaran as $item)
                        <div class="p-4 border-b border-gray-100 last:border-0">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-bold text-brand-navy text-base">{{ $item->posisi->nama_posisi }}</h3>
                                
                                @php
                                    $statusColor = match($item->status) {
                                        'Baru' => 'bg-blue-100 text-blue-700',
                                        'Diproses' => 'bg-yellow-100 text-yellow-700',
                                        'Diterima' => 'bg-green-100 text-green-700',
                                        'Ditolak' => 'bg-red-100 text-red-700',
                                        default => 'bg-gray-100 text-gray-700'
                                    };
                                @endphp
                                <span class="{{ $statusColor }} px-2 py-1 rounded text-xs font-bold">
                                    {{ $item->status }}
                                </span>
                            </div>
                            
                            <p class="text-xs text-gray-500 mb-3">Dikirim pada {{ $item->created_at->format('d M Y') }}</p>
                            
                            @if($item->catatan_hr)
                                <div class="bg-gray-50 p-3 rounded text-xs text-gray-600 italic mb-3 border border-gray-200">
                                    Catatan HR: "{{ $item->catatan_hr }}"
                                </div>
                            @endif

                            @if($item->status == 'Baru')
                                <form action="{{ route('kandidat.lamaran.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Batalkan lamaran ini?');">
                                    @csrf @method('DELETE')
                                    <button class="w-full py-2 border border-red-200 text-red-600 rounded-lg text-sm font-medium hover:bg-red-50 transition">
                                        Batalkan Lamaran
                                    </button>
                                </form>
                            @endif
                        </div>
                    @empty
                        <div class="p-8 text-center">
                            <p class="text-gray-500 text-sm">Belum ada riwayat lamaran.</p>
                            <a href="{{ route('kandidat.lowongan') }}" class="text-brand-orange text-sm font-bold mt-2 block">Cari Lowongan</a>
                        </div>
                    @endforelse
                </div>

            </div>

            <div class="mt-6">
                {{ $lamaran->links() }}
            </div>

        </div>
    </div>

</x-layout>