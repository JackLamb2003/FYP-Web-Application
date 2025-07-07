<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            DriverSeeder::class,
            TrackSeeder::class,
            UserSeeder::class,
            LongBeachSeeder::class,
            AtlantaSeeder::class,
            OrlandoSeeder::class,
            EnglishTownSeeder::class,
            STLouisSeeder::class,
            SeattleSeeder::class,
            GrantsvilleSeeder::class,
            IrwindaleSeeder::class,
        ]);
    }
}
