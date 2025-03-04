<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    public function run()
    {
        DB::table('bookings')->insert([
            ['user_id' => 1, 'karaoke_id' => 1, 'date' => '2023-10-01', 'time' => '19:00'],
            ['user_id' => 2, 'karaoke_id' => 2, 'date' => '2023-10-02', 'time' => '20:00'],
            ['user_id' => 1, 'karaoke_id' => 3, 'date' => '2023-10-03', 'time' => '21:00'],
        ]);
    }
}
