<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tracks')->insert(['title' => 'STREETS OF LONG BEACH','round' => 'Round 1', 'location' => 'LONG BEACH, CALIFORNIA', 'date2025' => 'April 4th - April 5th', 'weather' => 'Sun']);
        DB::table('tracks')->insert(['title' => 'ROAD TO THE CHAMPIONSHIP','round' => 'Round 2', 'location' => 'ATLANTA, GEORGIA', 'date2025' => 'May 8th - May 10th', 'weather' => 'Sun']);
        DB::table('tracks')->insert(['title' => 'SCORCHED','round' => 'Round 3', 'location' => 'ORLANDO, FLORIDA', 'date2025' => 'May 30th - May 31st', 'weather' => 'Sun']);
        DB::table('tracks')->insert(['title' => 'THE GAUNTLET','round' => 'Round 4', 'location' => 'ENGLISHTOWN, NEW JERSEY', 'date2025' => 'June 19th - June 21st', 'weather' => 'Sun']);
        DB::table('tracks')->insert(['title' => 'CROSSROADS','round' => 'Round 5', 'location' => 'ST. LOUIS, MISSOURI', 'date2025' => 'July 17th - July 19th', 'weather' => 'Sun']);
        DB::table('tracks')->insert(['title' => 'THROWDOWN','round' => 'Round 6', 'location' => 'SEATTLE, WASHINGTON', 'date2025' => 'August 8th - August 9th', 'weather' => 'Sun']);
        DB::table('tracks')->insert(['title' => 'ELEVATED','round' => 'Round 7', 'location' => 'GRANTSVILLE, UTAH', 'date2025' => 'August 28th - August 30th', 'weather' => 'Sun']);
        DB::table('tracks')->insert(['title' => 'TITLE FIGHT','round' => 'Round 8', 'location' => 'IRWINDALE, CALIFORNIA', 'date2025' => 'October 17th - October 18th', 'weather' => 'Sun']);
    }
}
