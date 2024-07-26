<?php

namespace Database\Factories;

use App\Models\LodgingType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LodgingType>
 */
class LodgingTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['T1', 'T2', 'T3', 'T4']),
        ];
    }
}
