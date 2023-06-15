<?php

namespace App\Http\Controllers;

use App\Models\ModelFood;
use App\Models\ModelMainPage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ControllerMainPage extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
  
    public function mainPage(Request $request, $date = null) {
        if ($date === null) {
            $date = date('Y-m-d');
        }
    
        if ($request->has('date')) {
            $date = $request->input('date');
        }

        $xx = new ModelMainPage();
        $breakfast['breakfast'] = $xx->readBreakfast($date);
        $breakfastCalorie['breakfastCalorie'] = $xx->readBreakfastCalorie($date);
        $lunch['lunch'] = $xx->readLunch($date);
        $lunchCalorie['lunchCalorie'] = $xx->readLunchCalorie($date);
        $dinner['dinner'] = $xx->readDinner($date);
        $dinnerCalorie['dinnerCalorie'] = $xx->readDinnerCalorie($date);
        $snack['snack'] = $xx->readSnack($date);
        $snackCalorie['snackCalorie'] = $xx->readSnackCalorie($date);
        $totalNutrition['totalNutrition'] = $xx->readNutrition($date);
        $title['title'] = 'Home';

        $allCalories = array_merge($breakfast, $breakfastCalorie, $lunch, $lunchCalorie, $dinner, $dinnerCalorie, $snack, $snackCalorie, $totalNutrition, $title);

        return view('main-page', $allCalories)->with('date', $date);
    }
}
