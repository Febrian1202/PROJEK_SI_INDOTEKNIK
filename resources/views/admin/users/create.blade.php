<x-admin-layout title="Tambah User Baru">
    <div class="mb-6">
        <a href="{{ route('admin.users.index') }}" class="text-gray-500 hover:text-brand-blue flex items-center gap-1 text-sm mb-2">
            &larr; Kembali
        </a>
        <h1 class="text-2xl font-bold text-brand-navy">Tambah User Baru</h1>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 max-w-2xl">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                <input type="text" name="name" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <input type="email" name="email" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Role / Hak Akses</label>
                <select name="role" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue">
                    <option value="kandidat">Kandidat</option>
                    <option value="admin">Admin</option>
                    <option value="direktur">Direktur</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                <input type="password" name="password" class="w-full rounded-lg border-gray-300 focus:ring-brand-blue" required placeholder="Minimal 8 karakter">
            </div>

            <button type="submit" class="bg-brand-blue text-white px-6 py-2.5 rounded-lg hover:bg-blue-700 font-medium w-full">
                Simpan User
            </button>
        </form>
    </div>
</x-admin-layout>