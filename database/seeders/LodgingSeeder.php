<?php

namespace Database\Seeders;

use App\Models\Lodging;
use App\Models\LodgingType;
use Illuminate\Database\Seeder;

class LodgingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lodging::factory()->count(10)->has(LodgingType::factory()->count(1))->create();
    }
}
