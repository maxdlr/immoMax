<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Lodging;
use App\Models\LodgingType;

use App\Models\Media;
use App\Models\Role;
use App\Models\User;
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

        City::factory()->create(['name' => 'PARIS']);
        City::factory()->create(['name' => 'LYON']);
        City::factory()->create(['name' => 'MARSEILLE']);
        City::factory()->create(['name' => 'NANTES']);

        Role::factory()->create(['name' => 'ADMIN']);
        Role::factory()->create(['name' => 'USER']);

        Media::factory()->create(['type' => null]);

        $this->call([
            LodgingSeeder::class,
            UserSeeder::class
        ]);

        $lodgings = Lodging::all()->shuffle()->filter(function () {
            return rand(1, 12) % 3 === 0;
        });

        User::factory()
            ->hasAttached($lodgings)
            ->hasAttached(Role::where(['name' => 'ADMIN'])->get())
            ->create(['name' => 'maxdlr', 'email' => 'contact@maxdlr.com']);
    }
}
