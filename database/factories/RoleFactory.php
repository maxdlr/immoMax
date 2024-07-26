<?php

namespace Database\Factories;

use App\Models\Lodging;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Lodging>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => '',
        ];
    }
}
