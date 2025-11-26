<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KandidatProfil>
 */
class KandidatProfilFactory extends Factory
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
            'user_id' => \App\Models\User::factory(), // Default jika dipanggil sendiri
            'nama_lengkap' => fake()->name(),
            'no_ktp' => fake()->nik(),
            'no_telp' => fake()->phoneNumber(),
            'alamat_domisili' => fake()->address(),
            'tgl_lahir' => fake()->date('Y-m-d', '2000-01-01'),
        ];
    }
}
