<?php

namespace Database\Factories;

use App\Enum\LodgingDescriptionEnum;
use App\Enum\LodgingTitleEnum;
use App\Models\City;
use App\Models\Lodging;
use App\Models\LodgingType;
use App\Models\TransactionType;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $description = '';
        for ($i = 0; $i < 30; $i++) {
            $description .= $this->faker->randomElement(LodgingDescriptionEnum::cases())->value;
        }
        
        return [
            'title' => $this->faker->randomElement(LodgingTitleEnum::cases())->value,
            'description' => $description,
            'roomCount' => rand(1, 5),
            'surface' => rand(50, 600),
            'price' => rand(250000, 1000000),
            'lodging_type_id' => LodgingType::all()->shuffle()->first()->id,
            'city_id' => City::all()->shuffle()->first()->id,
            'transaction_type_id' => TransactionType::all()->shuffle()->first()->id,
        ];
    }
}
