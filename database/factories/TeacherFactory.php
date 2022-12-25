<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_lengkap' => fake()->name(),
            'nama_panggilan' => fake()->firstName(),
            'jenis_kelamin' => fake()->randomElement(['l', 'p']),
            'tempat_lahir' => \Indonesia::allCities()->random()->id,
            'tanggal_lahir' => fake()->date('d/m/Y'),
            'alamat' => fake()->address(),
            'village_id' => \Indonesia::allVillages()->random()->id,
            'kodepos' => fake()->postcode(),
        ];
    }
}
