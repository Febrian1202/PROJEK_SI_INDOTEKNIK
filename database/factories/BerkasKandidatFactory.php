<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BerkasKandidat>
 */
class BerkasKandidatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'lamaran_id' => \App\Models\Lamaran::factory(),
            'dokumen_id' => \App\Models\MasterDokumen::factory(),
            'nama_file_asli' => 'file_dummy.pdf',
            'path_file' => 'uploads/dummy/' . fake()->uuid() . '.pdf',
            'tgl_upload' => now(),
        ];
    }
}
