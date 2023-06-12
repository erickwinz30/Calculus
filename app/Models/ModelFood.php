<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ModelFood extends Model
{
    // use HasFactory;

    public function addListFood($x) {
        $list_food = DB::table('list_food')->insert([
            'id_list_food' => Str::random(10),
            'food_name' => $x->food_name,
            'food_calories' => $x->food_calories,
            'cholesterol' => $x->cholesterol,
            'protein' => $x->protein,
            'carbohydrate' => $x->carbohydrate,
            'sodium' => $x->sodium,
            'sugar' => $x->sugar,
            'weight' => $x->weight,
        ]);
    }
}
