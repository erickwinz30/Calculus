<?php

namespace Database\Seeders;

use App\Models\Breakfast;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Food;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $hanyang = User::create([
            'username' => 'hanyang123',
            'email' => 'hanyang123@gmail.com',
            'password' => bcrypt('hanyang123'),
            'name' => 'Hanyang',
            'sex' => 'Perempuan',
        ]);

        $hanyangId = User::where('username', 'hanyang123')->first()->id;

        Food::create([
            'food_name' => 'Nasi Putih',
            'food_calories' => 175,
            'carbohydrate' => 38,
            'fat' => 0,
            'cholesterol' => 0,
            'protein' => 3,
            'sodium' => 1,
            'sugar' => 0,
            'weight' => 100,
        ]);

        Food::create([
            'food_name' => 'Ayam Goreng',
            'food_calories' => 240,
            'carbohydrate' => 0,
            'fat' => 15,
            'cholesterol' => 85,
            'protein' => 25,
            'sodium' => 60,
            'sugar' => 0,
            'weight' => 150,
        ]);

        Food::create([
            'food_name' => 'Salmon Bakar',
            'food_calories' => 206,
            'carbohydrate' => 0,
            'fat' => 13,
            'cholesterol' => 55,
            'protein' => 22,
            'sodium' => 50,
            'sugar' => 0,
            'weight' => 120,
        ]);

        Food::create([
            'food_name' => 'Brokoli Rebus',
            'food_calories' => 34,
            'carbohydrate' => 7,
            'fat' => 0,
            'cholesterol' => 0,
            'protein' => 3,
            'sodium' => 20,
            'sugar' => 2,
            'weight' => 100,
        ]);

        Food::create([
            'food_name' => 'Kentang Goreng',
            'food_calories' => 312,
            'carbohydrate' => 38,
            'fat' => 15,
            'cholesterol' => 0,
            'protein' => 4,
            'sodium' => 200,
            'sugar' => 1,
            'weight' => 100,
        ]);

        $nasiPutihId = Food::where('food_name', 'Nasi Putih')->first()->id;

        Breakfast::create([
            'id_food' => $nasiPutihId,
            'user_id' => $hanyangId,
        ]);
    }
}
