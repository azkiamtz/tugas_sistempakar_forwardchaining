<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Kang Admin",
            "email" => "admin@localhost",
            "password" => bcrypt(123),
            "role" => "ADM"
        ]);
        User::create([
            "name" => "Kang User",
            "email" => "hakimkiyul@gmail.com",
            "password" => bcrypt(123),
            "role" => "USR"
        ]);
    }
}
