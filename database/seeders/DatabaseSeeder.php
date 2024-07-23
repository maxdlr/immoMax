<?php

namespace Database\Seeders;

use App\Models\LodgingType;

use App\Models\Media;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        LodgingType::factory()->create(['name' => 'T1']);
        LodgingType::factory()->create(['name' => 'T2']);
        LodgingType::factory()->create(['name' => 'T3']);
        LodgingType::factory()->create(['name' => 'T4']);

        $this->call([
            LodgingSeeder::class,
            UserSeeder::class
        ]);

    }
}
