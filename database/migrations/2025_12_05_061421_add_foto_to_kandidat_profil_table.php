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
        Schema::table('kandidat_profil', function (Blueprint $table) {
            
            // Tambah kolom foto (nullable karena user baru belum punya foto)
            $table->string('foto')->nullable()->after('tgl_lahir');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kandidat_profil', function (Blueprint $table) {
            //
            $table->dropColumn('foto');
        });
    }
};
