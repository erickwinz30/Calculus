<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ModelMainPage extends Model
{
    use HasFactory;

    public function readBreakfast($date)
    {
        $userId = Auth::user()->id;

        $breakfast = DB::table('breakfasts')
            ->join('food', 'breakfasts.id_food', '=', 'food.id') // Perbaiki dari 'breakfast' ke 'breakfasts'
            ->where('breakfasts.user_id', $userId)
            ->where('breakfasts.created_at', $date)
            ->select(DB::raw('SUM(food.food_calories) as total_breakfast_calorie'))
            ->first();

        return $breakfast;
        // dd($breakfast);
    }

    public function readBreakfastCalorie($date)
    {
        $userId = Auth::user()->id;

        $breakfastCalorie = DB::table('breakfasts')
            ->join('food', 'breakfasts.id_food', '=', 'food.id')
            ->where('breakfasts.user_id', $userId)
            ->where('breakfasts.created_at', $date)
            ->select(DB::raw('SUM(food.food_calories) as total_breakfast_calorie'))
            ->first();

        return $breakfastCalorie;
    }

    public function readLunch($date)
    {
        $userId = Auth::user()->id;

        $lunch = DB::table('lunches')
            ->join('food', 'lunches.id_food', '=', 'food.id')
            ->select('food.id', 'food.food_name', 'food.food_calories', 'food.weight')
            ->where('lunches.user_id', $userId)
            ->where('lunches.created_at', $date)
            ->get();

        return $lunch;
    }

    public function readLunchCalorie($date)
    {
        $userId = Auth::user()->id;

        $lunchCalorie = DB::table('lunches')
            ->join('food', 'lunches.id_food', '=', 'food.id')
            ->where('lunches.id', $userId)
            ->where('lunches.created_at', $date)
            ->select(DB::raw('SUM(food.food_calories) as total_lunch_calorie'))
            ->first();

        return $lunchCalorie;
    }

    public function readDinner($date)
    {
        $userId = Auth::user()->id;

        $dinner = DB::table('dinners')
            ->join('food', 'dinners.id_food', '=', 'food.id')
            ->select('food.id', 'food.food_name', 'food.food_calories', 'food.weight')
            ->where('dinners.user_id', $userId)
            ->where('dinners.created_at', $date)
            ->get();

        return $dinner;
    }

    public function readDinnerCalorie($date)
    {
        $userId = Auth::user()->id;

        $dinnerCalorie = DB::table('dinners')
            ->join('food', 'dinners.id_food', '=', 'food.id')
            ->where('dinners.user_id', $userId)
            ->where('dinners.created_at', $date)
            ->select(DB::raw('SUM(food.food_calories) as total_dinner_calorie'))
            ->first();

        return $dinnerCalorie;
    }

    public function readSnack($date)
    {
        $userId = Auth::user()->id;

        $snack = DB::table('snacks')
            ->join('food', 'snacks.id_food', '=', 'food.id')
            ->select('food.id', 'food.food_name', 'food.food_calories', 'food.weight')
            ->where('snacks.id', $userId)
            ->where('snacks.created_at', $date)
            ->get();

        return $snack;
    }

    public function readSnackCalorie($date)
    {
        $userId = Auth::user()->id;

        $snackCalorie = DB::table('snacks')
            ->join('food', 'snacks.id_food', '=', 'food.id')
            ->where('snacks.id', $userId)
            ->where('snacks.created_at', $date)
            ->select(DB::raw('SUM(food.food_calories) as total_snack_calorie'))
            ->first();

        return $snackCalorie;
    }

    public function readNutrition($date)
    {
        $userID = Auth::user()->id;

        $subquery = DB::query()
            ->select('id', 'id_food', 'created_at')
            ->from('breakfasts')
            ->unionAll(function ($query) {
                $query->select('id', 'id_food', 'created_at')
                    ->from('lunches');
            })
            ->unionAll(function ($query) {
                $query->select('id', 'id_food', 'created_at')
                    ->from('dinners');
            })
            ->unionAll(function ($query) {
                $query->select('id', 'id_food', 'created_at')
                    ->from('snacks');
            });

        $totalNutrition = DB::table('users')
            ->joinSub($subquery, 'meals', function ($join) {
                $join->on('users.id', '=', 'meals.id');
            })
            ->join('food as meals_food', 'meals.id_food', 'meals_food.id')
            ->where('users.id', $userID)
            ->whereColumn('users.id', 'meals.id')
            ->whereDate('meals.created_at', $date)
            ->select(
                DB::raw('SUM(meals_food.food_calories) AS total_calories'),
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
