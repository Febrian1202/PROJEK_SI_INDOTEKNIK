<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lamaran>
 */
class LamaranFactory extends Factory
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
            'posisi_id' => \App\Models\Posisi::factory(),
            'tgl_lamar' => fake()->dateTimeBetween('-1 month', 'now'),
            'status' => 'Baru',
            'catatan_hr' => fake()->sentence(),
        ];
    }
}
