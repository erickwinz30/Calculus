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

    public function searchFood($query) {
        $searchResult = $query;
    }
    
    public function addListFood(Request $x) {
        $this->validate($x, [
            'food_name' => 'required|min:2|max:30',
            'food_calories' => 'required|numeric',
            'cholesterol' => 'required|numeric',
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
}
