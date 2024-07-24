<?php

namespace Database\Seeders;

use App\Models\Lodging;
use App\Models\LodgingType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
