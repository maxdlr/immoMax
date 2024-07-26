<?php

namespace Database\Factories;

use App\Models\Lodging;
use App\Models\LodgingType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Lodging>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $seed = rand(1, 2000);

        return [
            'path' => "https://picsum.photos/seed/$seed/1280/720",
            'size' => $this->faker->randomNumber(3),
            'alt' => $this->faker->sentence(3),
            'lodging_id' => LodgingType::all()->shuffle()->first()->id,
            'type' => 'LODGING'
        ];
    }
}
