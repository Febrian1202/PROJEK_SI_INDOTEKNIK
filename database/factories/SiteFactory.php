<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Site>
 */
class SiteFactory extends Factory
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
            'nama_site' => fake()->randomElement(['Site Pomalaa', 'Site Morosi', 'Site Mandiodo', 'Head Office']),
            'lokasi_fisik' => fake()->city() . ', Sulawesi Tenggara',
        ];
    }
}
