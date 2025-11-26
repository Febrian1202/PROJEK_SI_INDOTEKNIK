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
        Schema::create('posisi_syarat_dokumen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('posisi_id')->constrained('posisi')->onDelete('cascade');
            $table->foreignId('dokumen_id')->constrained('master_dokumen')->onDelete('cascade');
            $table->boolean('is_mandatory')->default(true); // Wajib atau Opsional
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posisi_syarat_dokumen');
    }
};
