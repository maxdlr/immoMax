<?php

namespace Database\Factories;

use App\Models\LodgingType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LodgingType>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['PARIS', 'LYON', 'MARSEILLE', 'NANTES']),
        ];
    }
}
