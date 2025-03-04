<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'John Doe', 'email' => 'john@example.com', 'password' => bcrypt('password')],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'password' => bcrypt('password')],
        ]);
    }
}