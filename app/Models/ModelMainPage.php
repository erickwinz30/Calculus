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
        $id = Auth::user()->id;

        $breakfast = DB::table('breakfast')
            ->join('food', 'breakfast.id_food', '=', 'food.id_food')
            ->select('food.id_food','food.food_name', 'food.food_calories', 'food.weight')
            ->where('breakfast.id', $id)
            ->where('breakfast.date', $date)
            ->get();

        return $breakfast;
    }

    public function readBreakfastCalorie($date) {
        $id = Auth::user()->id;

        $breakfastCalorie = DB::table('breakfast')
            ->join('food', 'breakfast.id_food', '=', 'food.id_food')
            ->where('breakfast.id', $id)
            ->where('breakfast.date', $date)
            ->select(DB::raw('SUM(food.food_calories) as total_breakfast_calorie'))
            ->first();

        return $breakfastCalorie;
    }

    public function readLunch($date)
    {
        $id = Auth::user()->id;

        $lunch = DB::table('lunch')
            ->join('food', 'lunch.id_food', '=', 'food.id_food')
            ->select('food.food_name', 'food.food_calories', 'food.weight')
            ->where('lunch.id', $id)
            ->where('lunch.date', $date)
            ->get();

        return $lunch;
    }

    public function readLunchCalorie($date) {
        $id = Auth::user()->id;

        $lunchCalorie = DB::table('lunch')
            ->join('food', 'lunch.id_food', '=', 'food.id_food')
            ->where('lunch.id', $id)
            ->where('lunch.date', $date)
            ->select(DB::raw('SUM(food.food_calories) as total_lunch_calorie'))
            ->first();

        return $lunchCalorie;
    }

    public function readDinner($date)
    {
        $id = Auth::user()->id;

        $dinner = DB::table('dinner')
            ->join('food', 'dinner.id_food', '=', 'food.id_food')
            ->select('food.food_name', 'food.food_calories', 'food.weight')
            ->where('dinner.id', $id)
            ->where('dinner.date', $date)
            ->get();

        return $dinner;
    }

    public function readDinnerCalorie($date) {
        $id = Auth::user()->id;

        $dinnerCalorie = DB::table('dinner')
            ->join('food', 'dinner.id_food', '=', 'food.id_food')
            ->where('dinner.id', $id)
            ->where('dinner.date', $date)
            ->select(DB::raw('SUM(food.food_calories) as total_dinner_calorie'))
            ->first();

        return $dinnerCalorie;
    }

    public function readSnack($date)
    {
        $id = Auth::user()->id;

        $snack = DB::table('snack')
            ->join('food', 'snack.id_food', '=', 'food.id_food')
            ->select('food.food_name', 'food.food_calories', 'food.weight')
            ->where('snack.id', $id)
            ->where('snack.date', $date)
            ->get();

        return $snack;
    }

    public function readSnackCalorie($date) {
        $id = Auth::user()->id;

        $snackCalorie = DB::table('snack')
            ->join('food', 'snack.id_food', '=', 'food.id_food')
            ->where('snack.id', $id)
            ->where('snack.date', $date)
            ->select(DB::raw('SUM(food.food_calories) as total_snack_calorie'))
            ->first();

        return $snackCalorie;
    }

    public function readNutrition($date)
    {
        $userID = Auth::user()->id;

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
