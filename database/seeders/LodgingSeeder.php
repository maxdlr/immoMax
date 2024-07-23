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
        Lodging::factory()
            ->count(30)
            ->recycle(LodgingType::all()->shuffle()->first())
            ->hasMedia(10)
            ->create();
    }
}
