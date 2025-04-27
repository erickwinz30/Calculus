<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lunch;
use App\Models\Snack;
use App\Models\Dinner;
use App\Models\Breakfast;
use App\Models\ModelFood;
use Illuminate\Http\Request;
use App\Models\ModelMainPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ControllerMainPage extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function mainPage()
    {
        $title = 'Home';
        $todaysDate = Carbon::now()->format('Y-m-d');
        $currentUserId = auth()->user()->id;

        // dd($currentUserId);

        // $breakfast = Breakfast::where('created_at', $todaysDate)->where('user_id', $currentUserId)->get();
        $breakfast = Breakfast::whereDate('created_at', $todaysDate)
            ->where('user_id', $currentUserId)
            ->get();

        $breakfastCalories = Breakfast::select('food.food_calories')
            ->join('food', 'breakfasts.id_food', '=', 'food.id')
            ->whereDate('breakfasts.created_at', $todaysDate)
            ->where('breakfasts.user_id', $currentUserId)
            ->sum('food.food_calories');

        $lunch = Lunch::whereDate('created_at', $todaysDate)
            ->where('user_id', $currentUserId)
            ->get();

        $lunchCalories = Lunch::select('food.food_calories')
            ->join('food', 'lunches.id_food', '=', 'food.id')
            ->whereDate('lunches.created_at', $todaysDate)
            ->where('lunches.user_id', $currentUserId)
            ->sum('food.food_calories');

        $dinner = Dinner::whereDate('created_at', $todaysDate)
            ->where('user_id', $currentUserId)
            ->get();

        $dinnerCalories = Dinner::select('food.food_calories')
            ->join('food', 'dinners.id_food', '=', 'food.id')
            ->whereDate('dinners.created_at', $todaysDate)
            ->where('dinners.user_id', $currentUserId)
            ->sum('food.food_calories');

        $snack = Snack::whereDate('created_at', $todaysDate)
            ->where('user_id', $currentUserId)
            ->get();

        $snackCalories = Snack::select('food.food_calories')
            ->join('food', 'snacks.id_food', '=', 'food.id')
            ->whereDate('snacks.created_at', $todaysDate)
            ->where('snacks.user_id', $currentUserId)
            ->sum('food.food_calories');

        $totalNutritions = DB::table('breakfasts')
            ->join('food as breakfast_food', 'breakfasts.id_food', '=', 'breakfast_food.id')
            ->select(
                DB::raw('SUM(breakfast_food.food_calories) as total_calories'),
                DB::raw('SUM(breakfast_food.carbohydrate) as total_carbohydrate'),
                DB::raw('SUM(breakfast_food.fat) as total_fat'),
                DB::raw('SUM(breakfast_food.cholesterol) as total_cholesterol'),
                DB::raw('SUM(breakfast_food.protein) as total_protein'),
                DB::raw('SUM(breakfast_food.sodium) as total_sodium'),
                DB::raw('SUM(breakfast_food.sugar) as total_sugar')
            )
            ->unionAll(
                DB::table('lunches')
                    ->join('food as lunch_food', 'lunches.id_food', '=', 'lunch_food.id')
                    ->select(
                        DB::raw('SUM(lunch_food.food_calories)'),
                        DB::raw('SUM(lunch_food.carbohydrate)'),
                        DB::raw('SUM(lunch_food.fat)'),
                        DB::raw('SUM(lunch_food.cholesterol)'),
                        DB::raw('SUM(lunch_food.protein)'),
                        DB::raw('SUM(lunch_food.sodium)'),
                        DB::raw('SUM(lunch_food.sugar)')
                    )
            )
            ->unionAll(
                DB::table('dinners')
                    ->join('food as dinner_food', 'dinners.id_food', '=', 'dinner_food.id')
                    ->select(
                        DB::raw('SUM(dinner_food.food_calories)'),
                        DB::raw('SUM(dinner_food.carbohydrate)'),
                        DB::raw('SUM(dinner_food.fat)'),
                        DB::raw('SUM(dinner_food.cholesterol)'),
                        DB::raw('SUM(dinner_food.protein)'),
                        DB::raw('SUM(dinner_food.sodium)'),
                        DB::raw('SUM(dinner_food.sugar)')
                    )
            )
            ->unionAll(
                DB::table('snacks')
                    ->join('food as snack_food', 'snacks.id_food', '=', 'snack_food.id')
                    ->select(
                        DB::raw('SUM(snack_food.food_calories)'),
                        DB::raw('SUM(snack_food.carbohydrate)'),
                        DB::raw('SUM(snack_food.fat)'),
                        DB::raw('SUM(snack_food.cholesterol)'),
                        DB::raw('SUM(snack_food.protein)'),
                        DB::raw('SUM(snack_food.sodium)'),
                        DB::raw('SUM(snack_food.sugar)')
                    )
            )
            ->get()
            ->first();

        return view('main-page', [
            'title' => $title,
            'date' => $todaysDate,
            'breakfast' => $breakfast,
            'breakfastCalories' => $breakfastCalories,
            'lunch' => $lunch,
            'lunchCalories' => $lunchCalories,
            'dinner' => $dinner,
            'dinnerCalories' => $dinnerCalories,
            'snack' => $snack,
            'snackCalories' => $snackCalories,
            'totalNutrition' => $totalNutritions,
        ]);

        //     if ($date === null) {!
        //         $date = date('Y-m-d');
        //     }

        //     if ($request->has('date')) {
        //         $date = $request->input('date');
        //     }

        //     $xx = new ModelMainPage();
        //     $breakfast['breakfast'] = $xx->readBreakfast($date);
        //     $breakfastCalorie['breakfastCalorie'] = $xx->readBreakfastCalorie($date);
        //     $lunch['lunch'] = $xx->readLunch($date);
        //     $lunchCalorie['lunchCalorie'] = $xx->readLunchCalorie($date);
        //     $dinner['dinner'] = $xx->readDinner($date);
        //     $dinnerCalorie['dinnerCalorie'] = $xx->readDinnerCalorie($date);
        //     $snack['snack'] = $xx->readSnack($date);
        //     $snackCalorie['snackCalorie'] = $xx->readSnackCalorie($date);
        //     $totalNutrition['totalNutrition'] = $xx->readNutrition($date);
        //     $title['title'] = 'Home';

        //     $allCalories = array_merge($breakfast, $breakfastCalorie, $lunch, $lunchCalorie, $dinner, $dinnerCalorie, $snack, $snackCalorie, $totalNutrition, $title);

        //     return view('main-page', $allCalories)->with('date', $date);
    }
}
