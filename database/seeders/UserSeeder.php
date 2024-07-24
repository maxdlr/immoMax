<?php

namespace Database\Seeders;

use App\Models\Lodging;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $lodgings = Lodging::all()->shuffle()->filter(function () {
                return rand(1, 12) % 3 === 0;
            });

            User::factory()
                ->hasAttached($lodgings)
                ->hasAttached(Role::where(['name' => 'USER'])->get())
                ->create();
        }
    }
}
