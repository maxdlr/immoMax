<?php

namespace Database\Seeders;

use App\Models\LodgingType;
use Illuminate\Database\Seeder;

class LodgingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LodgingType::factory()->count(4)->create();
    }
}
