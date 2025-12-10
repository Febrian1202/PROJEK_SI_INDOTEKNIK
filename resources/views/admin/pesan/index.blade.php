<x-admin-layout title="Pesan Masuk">
    <x-slot:title>Pesan Masuk</x-slot:title>
    
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-brand-navy">Kotak Masuk</h1>
            <p class="text-sm text-gray-500">Pesan dari formulir kontak website.</p>
        </div>
        <div class="bg-blue-50 text-brand-blue px-4 py-2 rounded-lg text-sm font-bold">
            Total: {{ $pesanMasuk->total() }} Pesan
        </div>
    </div>

    @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-4">Pengirim</th>
                        <th class="px-6 py-4">Subjek</th>
                        <th class="px-6 py-4">Isi Pesan</th>
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($pesanMasuk as $pesan)
                        <tr class="hover:bg-gray-50 transition">
                            
                            <td class="px-6 py-4">
                                <span class="block font-bold text-gray-800">{{ $pesan->name }}</span>
                                <a href="mailto:{{ $pesan->email }}" class="text-xs text-brand-blue hover:underline">{{ $pesan->email }}</a>
                            </td>

                            <td class="px-6 py-4 font-medium text-gray-700">
                                {{ $pesan->subject }}
                            </td>

                            <td class="px-6 py-4 text-gray-600 max-w-xs">
                                <div class="truncate" title="{{ $pesan->message }}">
                                    {{ Str::limit($pesan->message, 50) }}
                                </div>
                                <button onclick="alert('Pesan Lengkap:\n\n{{ str_replace(["\r", "\n"], [' ', '\n'], addslashes($pesan->message)) }}')" 
                                        class="text-xs text-brand-orange hover:underline mt-1">
                                    Baca Full
                                </button>
                            </td>

                            <td class="px-6 py-4 text-gray-500 whitespace-nowrap">
                                {{ $pesan->created_at->format('d M Y') }}<br>
                                <span class="text-xs">{{ $pesan->created_at->format('H:i') }}</span>
                            </td>

                            <td class="px-6 py-4 text-center">
                                <form action="{{ route('admin.pesan.destroy', $pesan->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-400 hover:text-red-500 transition-colors p-2" title="Hapus Pesan">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                                <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Belum ada pesan masuk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-gray-100">
            {{ $pesanMasuk->links() }}
        </div>
    </div>
</x-admin-layout>