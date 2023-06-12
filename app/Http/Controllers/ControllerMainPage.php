<?php

namespace App\Http\Controllers;

use App\Models\ModelFood;
use App\Models\ModelMainPage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ControllerMainPage extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
  
    public function mainPage() {
        $xx = new ModelMainPage();
        $breakfast['breakfast'] = $xx->readBreakfast();
        $lunch['lunch'] = $xx->readLunch();
        $dinner['dinner'] = $xx->readDinner();
        $snack['snack'] = $xx->readSnack();
        $totalNutrition['totalNutrition'] = $xx->readNutrition();

        $allCalories = array_merge($breakfast, $lunch, $dinner, $snack, $totalNutrition);

        return view('main-page', $allCalories);
    }
}
