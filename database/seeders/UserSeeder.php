<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'johndoe',
                'email' => 'john@example.com',
                'password' => Hash::make('password123'),
                'name' => 'John Doe',
                'sex' => 'Laki-laki',
                'date_of_birth' => '1990-01-15',
                'profile_pic' => 'avatar.png',
                'height' => 170.00,
                'weight' => 70.00,
                'bmr' => 1680.50,
                'role' => 'client',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'janedoe',
                'email' => 'jane@example.com',
                'password' => Hash::make('password123'),
                'name' => 'Jane Doe',
                'sex' => 'Perempuan',
                'date_of_birth' => '1995-05-20',
                'profile_pic' => 'avatar.png',
                'height' => 160.00,
                'weight' => 55.00,
                'bmr' => 1390.00,
                'role' => 'client',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin123'),
                'name' => 'Administrator',
                'sex' => 'Laki-laki',
                'date_of_birth' => '1985-12-10',
                'profile_pic' => 'avatar.png',
                'height' => 175.00,
                'weight' => 80.00,
                'bmr' => 1850.00,
                'role' => 'client',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
