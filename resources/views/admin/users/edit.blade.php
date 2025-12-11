<x-admin-layout title="Edit User">
    <x-slot:title>Edit User</x-slot:title>
    <div class="mb-6">
        <a href="{{ route('admin.users.index') }}" class="text-gray-500 hover:text-brand-blue flex items-center gap-1 text-sm mb-2">
            &larr; Kembali
        </a>
        <h1 class="text-2xl font-bold text-brand-navy">Edit User: {{ $user->name }}</h1>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 max-w-2xl">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ $user->name }}" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Role / Hak Akses</label>
                <select name="role" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue">
                    <option value="kandidat" {{ $user->role == 'kandidat' ? 'selected' : '' }}>Kandidat</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="direktur" {{ $user->role == 'direktur' ? 'selected' : '' }}>Direktur</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Password Baru (Opsional)</label>
                <input type="password" name="password" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue" placeholder="Kosongkan jika tidak ingin mengganti password">
            </div>

            <button type="submit" class="bg-brand-blue text-white px-6 py-2.5 rounded-lg hover:bg-blue-700 font-medium w-full">
                Update Data
            </button>
        </form>
    </div>
</x-admin-layout>