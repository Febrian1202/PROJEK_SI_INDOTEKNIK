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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kandidat_id')->constrained('kandidat_profil')->onDelete('cascade');
            $table->foreignId('lamaran_id')->constrained('lamaran')->onDelete('cascade');
            $table->string('nik_karyawan')->unique(); // Digenerate setelah diterima
            $table->string('site_penempatan'); // Inputan admin
            $table->date('tgl_bergabung');
            $table->string('status_karyawan'); // Kontrak/Tetap
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
