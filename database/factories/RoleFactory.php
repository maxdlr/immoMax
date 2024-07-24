<?php

namespace Database\Factories;

use App\Models\Lodging;
use App\Models\LodgingType;
use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
