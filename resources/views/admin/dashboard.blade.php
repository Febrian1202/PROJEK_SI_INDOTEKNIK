<x-layout>

    <div class="pt-24 pb-12 min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-brand-navy">Dashboard Admin</h1>
                <p class="text-gray-500">Selamat datang kembali, {{ Auth::user()->name }}!</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <div class="text-gray-500 text-sm mb-1">Total Pelamar</div>
                    <div class="text-3xl font-bold text-brand-navy">1,240</div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <div class="text-gray-500 text-sm mb-1">Lowongan Aktif</div>
                    <div class="text-3xl font-bold text-brand-orange">8</div>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <div class="text-gray-500 text-sm mb-1">Perlu Review</div>
                    <div class="text-3xl font-bold text-brand-blue">45</div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 min-h-[400px] flex items-center justify-center text-gray-400">
                Area Konten Manajemen (Tabel Pelamar, dll)
            </div>

        </div>
    </div>
</x-layout>