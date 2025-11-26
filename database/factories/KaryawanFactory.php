<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
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
            'kandidat_id' => \App\Models\KandidatProfil::factory(),
            'lamaran_id' => \App\Models\Lamaran::factory(),
            'nik_karyawan' => fake()->unique()->numerify('EMP#####'),
            'site_penempatan' => fake()->city(),
            'tgl_bergabung' => fake()->date(),
            'status_karyawan' => fake()->randomElement(['Kontrak', 'Tetap']),
            ];
    }
}
