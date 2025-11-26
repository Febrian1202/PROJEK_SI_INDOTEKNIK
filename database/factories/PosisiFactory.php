<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posisi>
 */
class PosisiFactory extends Factory
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
            'nama_posisi' => fake()->jobTitle(),
            'deskripsi' => fake()->paragraph(),
            'is_active' => true,
        ];
    }
}
