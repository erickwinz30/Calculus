<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ModelMainPage extends Model
{
    use HasFactory;

    public function readBreakfast()
    {
        $id = Auth::user()->id;
        $date = '2023-06-01';

        $breakfast = DB::table('breakfast')
            ->join('food', 'breakfast.id_food', '=', 'food.id_food')
            ->select('food.food_name', 'food.food_calories')
            ->where('breakfast.id', $id)
            ->where('breakfast.date', $date)
            ->get();

        return $breakfast;
    }

    public function readLunch()
    {
        $id = Auth::user()->id;
        $date = '2023-06-01';

        $lunch = DB::table('lunch')
            ->join('food', 'lunch.id_food', '=', 'food.id_food')
            ->select('food.food_name', 'food.food_calories')
            ->where('lunch.id', $id)
            ->where('lunch.date', $date)
            ->get();

        return $lunch;
    }

    public function readDinner()
    {
        $id = Auth::user()->id;

        $date = '2023-06-01';

        $dinner = DB::table('dinner')
            ->join('food', 'dinner.id_food', '=', 'food.id_food')
            ->select('food.food_name', 'food.food_calories')
            ->where('dinner.id', $id)
            ->where('dinner.date', $date)
            ->get();

        return $dinner;
    }

    public function readSnack()
    {
        $id = Auth::user()->id;
        $date = '2023-06-01';

        $snack = DB::table('snack')
            ->join('food', 'snack.id_food', '=', 'food.id_food')
            ->select('food.food_name', 'food.food_calories')
            ->where('snack.id', $id)
            ->where('snack.date', $date)
            ->get();

        return $snack;
    }

    public function readNutrition()
    {
        $userID = 1; // Replace with the user's ID
        $date = '2023-06-01'; // Replace with the desired date

        $subquery = DB::query()
            ->select('id', 'id_food', 'date')
            ->from('breakfast')
            ->unionAll(function ($query) {
                $query->select('id', 'id_food', 'date')
                    ->from('lunch');
            })
            ->unionAll(function ($query) {
                $query->select('id', 'id_food', 'date')
                    ->from('dinner');
            })
            ->unionAll(function ($query) {
                $query->select('id', 'id_food', 'date')
                    ->from('snack');
            });

        $totalNutrition = DB::table('users')
            ->joinSub($subquery, 'meals', function ($join) {
                $join->on('users.id', '=', 'meals.id');
            })
            ->join('food as meals_food', 'meals.id_food', 'meals_food.id_food')
            ->where('users.id', $userID)
            ->whereColumn('users.id', 'meals.id')
            ->whereDate('meals.date', $date)
            ->select(
                DB::raw('SUM(meals_food.cholesterol) AS total_cholesterol'),
                DB::raw('SUM(meals_food.fat) AS total_fat'),
                DB::raw('SUM(meals_food.protein) AS total_protein'),
                DB::raw('SUM(meals_food.carbohydrate) AS total_carbohydrate'),
                DB::raw('SUM(meals_food.sodium) AS total_sodium'),
                DB::raw('SUM(meals_food.sugar) AS total_sugar')
            )
            ->first();

        return $totalNutrition;
    }
}
