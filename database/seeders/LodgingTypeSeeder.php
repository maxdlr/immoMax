<?php

namespace Database\Seeders;

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
        DB::table('lodging_types')->insert(['name' => 'T1']);
        DB::table('lodging_types')->insert(['name' => 'T2']);
        DB::table('lodging_types')->insert(['name' => 'T3']);
        DB::table('lodging_types')->insert(['name' => 'T4']);
    }
}
