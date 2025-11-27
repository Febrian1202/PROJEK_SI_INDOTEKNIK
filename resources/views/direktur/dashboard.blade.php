<x-layout>

    <div class="pt-24 pb-12 min-h-screen bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            
            <div class="mb-8 flex justify-between items-end">
                <div>
                    <h1 class="text-3xl font-bold text-brand-navy">Executive Dashboard</h1>
                    <p class="text-gray-500">Ringkasan Kinerja Perekrutan PT. Indoteknik</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-brand-navy text-white p-8 rounded-2xl shadow-lg relative overflow-hidden">
                    <div class="relative z-10">
                        <div class="text-brand-orange text-sm font-bold uppercase tracking-widest mb-2">Total Karyawan Baru</div>
                        <div class="text-5xl font-bold">12</div>
                        <div class="mt-4 text-sm text-gray-300">Bulan Ini</div>
                    </div>
                    <svg class="absolute -bottom-4 -right-4 w-32 h-32 text-white/10" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.31-8.86c-1.77-.45-2.34-.94-2.34-1.67 0-.84.79-1.43 2.1-1.43 1.38 0 1.9.66 1.94 1.64h1.71c-.05-1.34-.87-2.57-2.49-2.97V5H10.9v1.69c-1.51.32-2.72 1.3-2.72 2.81 0 1.79 1.49 2.69 3.66 3.21 1.95.46 2.34 1.15 2.34 1.87 0 .53-.39 1.39-2.1 1.39-1.6 0-2.23-.72-2.32-1.64H8.04c.1 1.7 1.36 2.66 2.86 2.97V19h2.34v-1.67c1.52-.29 2.72-1.16 2.73-2.77-.01-2.2-1.9-2.96-3.66-3.42z"/></svg>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-center">
                    <div class="text-center">
                        <p class="text-gray-500 mb-2">Approval Pending</p>
                        <p class="text-4xl font-bold text-brand-navy">0</p>
                        <p class="text-xs text-gray-400 mt-2">Semua berkas telah ditinjau</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>