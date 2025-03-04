<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaraokeSeeder extends Seeder
{
    public function run()
    {
        DB::table('karaokes')->insert([
            ['name' => 'Karaoke Night', 'location' => 'Downtown', 'capacity' => 50],
            ['name' => 'Sing Along', 'location' => 'Uptown', 'capacity' => 30],
            ['name' => 'Karaoke Bar', 'location' => 'Midtown', 'capacity' => 100],
        ]);
    }
}