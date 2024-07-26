<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Lodging;
use App\Models\LodgingType;

use App\Models\Media;
use App\Models\Role;
use App\Models\TransactionType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public const array LODGING_TYPES = ['T1', 'T2', 'T3', 'T4'];
    public const array TRANSACTION_TYPES = ['SELL', 'RENT'];
    public const array ROLES = ['ADMIN', 'USER'];
    public const array CITIES = ['PARIS', 'LYON', 'MARSEILLE', 'NANTES', 'ANNECY', 'PAU', 'BORDEAUX', 'ORLEANS'];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach (self::LODGING_TYPES as $name) {
            LodgingType::factory()->create(['name' => $name]);
        }
        foreach (self::TRANSACTION_TYPES as $name) {
            TransactionType::factory()->create(['name' => $name]);
        }
        foreach (self::ROLES as $name) {
            Role::factory()->create(['name' => $name]);
        }
        foreach (self::CITIES as $name) {
            City::factory()->create(['name' => $name]);
        }

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

        User::factory()
            ->hasAttached($lodgings)
            ->hasAttached(Role::where(['name' => 'ADMIN'])->get())
            ->create(['name' => 'prof', 'email' => 'prof@prof.prof']);
    }
}
