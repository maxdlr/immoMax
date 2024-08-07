<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Lodging;
use App\Models\LodgingType;
use App\Models\TransactionType;
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
            ->recycle(City::all()->shuffle()->first())
            ->recycle(TransactionType::all()->shuffle()->first())
            ->hasMedia(5, ['type' => 'LODGING'])
            ->create();
    }
}
