<x-admin-layout title="Kelola User">
    <x-slot:title>CRUD User</x-slot:title>

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-brand-navy">Kelola Pengguna</h1>
        <a href="{{ route('admin.users.create') }}" class="bg-brand-blue text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah User
        </a>
    </div>

    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 mb-6">
        <form method="GET" action="{{ route('admin.users.index') }}" class="flex flex-col md:flex-row gap-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama / Email..." class="flex-1 rounded-lg border-gray-300 focus:ring-brand-blue">
            
            <select name="role" class="rounded-lg border-gray-300 focus:ring-brand-blue">
                <option value="">Semua Role</option>
                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="direktur" {{ request('role') == 'direktur' ? 'selected' : '' }}>Direktur</option>
                <option value="kandidat" {{ request('role') == 'kandidat' ? 'selected' : '' }}>Kandidat</option>
            </select>

            <button type="submit" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 font-medium">Cari</button>
        </form>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">{{ session('error') }}</div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Role</th>
                    <th class="px-6 py-3">Bergabung</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-brand-gray flex items-center justify-center text-brand-blue font-bold text-xs">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                {{ $user->name }}
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-500">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            @php
                                $roleClass = match($user->role) {
                                    'admin' => 'bg-purple-100 text-purple-700',
                                    'direktur' => 'bg-amber-100 text-amber-700',
                                    'kandidat' => 'bg-blue-100 text-blue-700',
                                    default => 'bg-gray-100 text-gray-700'
                                };
                            @endphp
                            <span class="{{ $roleClass }} px-2.5 py-0.5 rounded-full text-xs font-bold uppercase">
                                {{ $user->role }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-500">{{ $user->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 text-center flex justify-center gap-2">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                            @if($user->id != auth()->id())
                                <span class="text-gray-300">|</span>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini? Data terkait (lamaran dll) mungkin akan ikut terhapus!')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-8 text-gray-400">Data user tidak ditemukan.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">{{ $users->withQueryString()->links() }}</div>
    </div>
</x-admin-layout>