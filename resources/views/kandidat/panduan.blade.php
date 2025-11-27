<x-layout title="Cara Melamar">
    <x-nav-bar></x-nav-bar>
    <div class="pt-24 pb-12 min-h-screen bg-gray-50">
        <div class="max-w-4xl mx-auto px-6 lg:px-8">
            <div class="mb-6">
                <a href="{{ route('kandidat.dashboard') }}" class="text-gray-500 hover:text-brand-orange text-sm flex items-center gap-1">&larr; Kembali ke Dashboard</a>
            </div>
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                <h1 class="text-2xl font-bold text-brand-navy mb-6">Panduan Melamar Pekerjaan</h1>
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="h-8 w-8 bg-brand-orange text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">1</div>
                        <div>
                            <h3 class="font-bold text-lg">Lengkapi Profil</h3>
                            <p class="text-gray-600">Pastikan biodata diri, NIK, dan alamat sudah terisi dengan benar di menu Biodata Diri.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="h-8 w-8 bg-brand-orange text-white rounded-full flex items-center justify-center font-bold flex-shrink-0">2</div>
                        <div>
                            <h3 class="font-bold text-lg">Pilih Lowongan</h3>
                            <p class="text-gray-600">Buka menu "Lowongan Pekerjaan", pilih posisi yang sesuai dengan kualifikasi Anda.</p>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
</x-layout>