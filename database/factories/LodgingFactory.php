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
class LodgingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'roomCount' => rand(1, 5),
            'surface' => rand(50, 600),
            'price' => rand(250000, 1000000),
            'lodging_type_id' => LodgingType::all()->shuffle()->first()->id,
            'city_id' => LodgingType::all()->shuffle()->first()->id,
        ];
    }
}
