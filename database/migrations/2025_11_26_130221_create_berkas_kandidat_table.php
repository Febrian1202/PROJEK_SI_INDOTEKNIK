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
        Schema::create('berkas_kandidat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lamaran_id')->constrained('lamaran')->onDelete('cascade');
            $table->foreignId('dokumen_id')->constrained('master_dokumen')->onDelete('cascade'); // Jenis dokumen ini apa
            $table->string('nama_file_asli');
            $table->string('path_file'); // Lokasi file di server
            $table->dateTime('tgl_upload');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas_kandidat');
    }
};
