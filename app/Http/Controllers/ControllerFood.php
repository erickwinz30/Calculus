<?php

namespace App\Http\Controllers;

use App\Models\ModelFood;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ControllerFood extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function searchFood($foodName) {
        $searchResult = $foodName;

        $xx = new ModelFood();
        $searchResult = $xx->searchFood($searchResult);
        $title = 'Add Calorie';

        Log::info($searchResult);

        return compact('searchResult', 'title');
    }

    public function addCalorieBreakfast(Request $x) {
        Log::info($x);
        $xx = new ModelFood();
        $xx->addCalorieBreakfast($x);
    }

    public function addCalorieLunch(Request $x) {
        Log::info($x);
        $xx = new ModelFood();
        $xx->addCalorieLunch($x);
    }

    public function addCalorieDinner(Request $x) {
        Log::info($x);
        $xx = new ModelFood();
        $xx->addCalorieDinner($x);
    }

    public function addCalorieSnack(Request $x) {
        Log::info($x);
        $xx = new ModelFood();
        $xx->addCalorieSnack($x);
    }
    
    public function addListFood(Request $x) {
        $this->validate($x, [
            'food_name' => 'required|min:2|max:30',
            'food_calories' => 'required|numeric',
            'cholesterol' => 'required|numeric',
            'fat' => 'required|numeric',
            'protein' => 'required|numeric',
            'carbohydrate' => 'required|numeric',
            'sodium' => 'required|numeric',
            'sugar' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);
        $xx = new ModelFood();
        $xx->addListFood($x);
        return redirect('/home');
    }

    public function nutritionInfo($id_food) {
        $x = new ModelFood();
        $foodInfo['foodInfo'] = $x->getFoodInfo($id_food);
        $title['title'] = 'Nutrition Information';

        $allNutritionInfo = array_merge($foodInfo, $title);
        return view('nutrition-info', $allNutritionInfo);
    }

    public function updateFoodInfo(Request $req, $id_food) {
        // Log::info([$req, $id_food]);
        $xx = new ModelFood();
        $xx->updateFoodInfo($req, $id_food);

        return redirect('/home');
    }
}
