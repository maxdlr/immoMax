<?php

namespace Database\Seeders;

use App\Models\Lodging;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(10)
            ->has(Lodging::factory()
                ->count(rand(1, 10))
            )
            ->create();
    }
}
