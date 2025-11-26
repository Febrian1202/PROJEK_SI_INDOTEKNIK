<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lamaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kandidat_id')->constrained('kandidat_profil')->onDelete('cascade');
            $table->foreignId('posisi_id')->constrained('posisi')->onDelete('cascade');
            $table->date('tgl_lamar');
            $table->enum('status', ['Baru', 'Diproses', 'Diterima', 'Ditolak'])->default('Baru');
            $table->text('catatan_hr')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lamaran');
    }
};
