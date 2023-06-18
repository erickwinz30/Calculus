<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ModelFood extends Model
{
    // use HasFactory;
    public function searchFood($foodName) {
        $searchResult = DB::table('list_food')
        ->where('food_name', 'like', '%'.$foodName.'%')
        ->get();

        return $searchResult;
    }

    public function addCalorieBreakfast($x) {
        $TODAY_DATE = Carbon::now('Asia/Jakarta');
        $amount = $x['input_gram'];
        $addFood = DB::table('list_food')->where('id_list_food', $x['input_id'])->first();

        //calculate old calories
        $foodListWeight = $addFood->weight;

        $list_food_calories = $addFood->food_calories / $foodListWeight;
        $list_cholesterol = $addFood->cholesterol / $foodListWeight;
        $list_fat = $addFood->fat / $foodListWeight;
        $list_protein = $addFood->protein / $foodListWeight;
        $list_carbohydrate = $addFood->carbohydrate / $foodListWeight;
        $list_sodium = $addFood->sodium / $foodListWeight;
        $list_sugar = $addFood->sugar / $foodListWeight;

        $id_food = Str::random(10);

        //calculate new calorie
        $new_food_calories = $list_food_calories * $amount;
        $new_cholesterol = $list_cholesterol * $amount;
        $new_fat = $list_fat * $amount;
        $new_protein = $list_protein * $amount;
        $new_carbohydrate = $list_carbohydrate * $amount;
        $new_sodium = $list_sodium * $amount;
        $new_sugar = $list_sugar * $amount;

        $addCalorieToFood = DB::table('food')->insert([
            'id_food' => $id_food,
            'food_name' => $addFood->food_name,
            'food_calories' => $new_food_calories,
            'cholesterol' => $new_cholesterol,
            'fat' => $new_fat,
            'protein' => $new_protein,
            'carbohydrate' => $new_carbohydrate,
            'sodium' => $new_sodium,
            'sugar' => $new_sugar,
            'weight' => $amount,
        ]);

        $addCalorieToBreakfast = DB::table('breakfast')->insert([
            'id' => Auth::user()->id,
            'id_food' => $id_food,
            'date' => $TODAY_DATE,
        ]);
    }

    public function addCalorieLunch($x) {
        $TODAY_DATE = Carbon::now('Asia/Jakarta');
        $amount = $x['input_gram'];
        $addFood = DB::table('list_food')->where('id_list_food', $x['input_id'])->first();

        //calculate old calories
        $foodListWeight = $addFood->weight;

        $list_food_calories = $addFood->food_calories / $foodListWeight;
        $list_cholesterol = $addFood->cholesterol / $foodListWeight;
        $list_fat = $addFood->fat / $foodListWeight;
        $list_protein = $addFood->protein / $foodListWeight;
        $list_carbohydrate = $addFood->carbohydrate / $foodListWeight;
        $list_sodium = $addFood->sodium / $foodListWeight;
        $list_sugar = $addFood->sugar / $foodListWeight;

        $id_food = Str::random(10);

        //calculate new calorie
        $new_food_calories = $list_food_calories * $amount;
        $new_cholesterol = $list_cholesterol * $amount;
        $new_fat = $list_fat * $amount;
        $new_protein = $list_protein * $amount;
        $new_carbohydrate = $list_carbohydrate * $amount;
        $new_sodium = $list_sodium * $amount;
        $new_sugar = $list_sugar * $amount;

        $addCalorieToFood = DB::table('food')->insert([
            'id_food' => $id_food,
            'food_name' => $addFood->food_name,
            'food_calories' => $new_food_calories,
            'cholesterol' => $new_cholesterol,
            'fat' => $new_fat,
            'protein' => $new_protein,
            'carbohydrate' => $new_carbohydrate,
            'sodium' => $new_sodium,
            'sugar' => $new_sugar,
            'weight' => $amount,
        ]);

        $addCalorieToBreakfast = DB::table('lunch')->insert([
            'id' => Auth::user()->id,
            'id_food' => $id_food,
            'date' => $TODAY_DATE,
        ]);
    }

    public function addCalorieDinner($x) {
        $TODAY_DATE = Carbon::now('Asia/Jakarta');
        $amount = $x['input_gram'];
        $addFood = DB::table('list_food')->where('id_list_food', $x['input_id'])->first();

        //calculate old calories
        $foodListWeight = $addFood->weight;

        $list_food_calories = $addFood->food_calories / $foodListWeight;
        $list_cholesterol = $addFood->cholesterol / $foodListWeight;
        $list_fat = $addFood->fat / $foodListWeight;
        $list_protein = $addFood->protein / $foodListWeight;
        $list_carbohydrate = $addFood->carbohydrate / $foodListWeight;
        $list_sodium = $addFood->sodium / $foodListWeight;
        $list_sugar = $addFood->sugar / $foodListWeight;

        $id_food = Str::random(10);

        //calculate new calorie
        $new_food_calories = $list_food_calories * $amount;
        $new_cholesterol = $list_cholesterol * $amount;
        $new_fat = $list_fat * $amount;
        $new_protein = $list_protein * $amount;
        $new_carbohydrate = $list_carbohydrate * $amount;
        $new_sodium = $list_sodium * $amount;
        $new_sugar = $list_sugar * $amount;

        $addCalorieToFood = DB::table('food')->insert([
            'id_food' => $id_food,
            'food_name' => $addFood->food_name,
            'food_calories' => $new_food_calories,
            'cholesterol' => $new_cholesterol,
            'fat' => $new_fat,
            'protein' => $new_protein,
            'carbohydrate' => $new_carbohydrate,
            'sodium' => $new_sodium,
            'sugar' => $new_sugar,
            'weight' => $amount,
        ]);

        $addCalorieToBreakfast = DB::table('dinner')->insert([
            'id' => Auth::user()->id,
            'id_food' => $id_food,
            'date' => $TODAY_DATE,
        ]);
    }

    public function addCalorieSnack($x) {
        $TODAY_DATE = Carbon::now('Asia/Jakarta');
        $amount = $x['input_gram'];
        $addFood = DB::table('list_food')->where('id_list_food', $x['input_id'])->first();

        //calculate old calories
        $foodListWeight = $addFood->weight;

        $list_food_calories = $addFood->food_calories / $foodListWeight;
        $list_cholesterol = $addFood->cholesterol / $foodListWeight;
        $list_fat = $addFood->fat / $foodListWeight;
        $list_protein = $addFood->protein / $foodListWeight;
        $list_carbohydrate = $addFood->carbohydrate / $foodListWeight;
        $list_sodium = $addFood->sodium / $foodListWeight;
        $list_sugar = $addFood->sugar / $foodListWeight;

        $id_food = Str::random(10);

        //calculate new calorie
        $new_food_calories = $list_food_calories * $amount;
        $new_cholesterol = $list_cholesterol * $amount;
        $new_fat = $list_fat * $amount;
        $new_protein = $list_protein * $amount;
        $new_carbohydrate = $list_carbohydrate * $amount;
        $new_sodium = $list_sodium * $amount;
        $new_sugar = $list_sugar * $amount;

        $addCalorieToFood = DB::table('food')->insert([
            'id_food' => $id_food,
            'food_name' => $addFood->food_name,
            'food_calories' => $new_food_calories,
            'cholesterol' => $new_cholesterol,
            'fat' => $new_fat,
            'protein' => $new_protein,
            'carbohydrate' => $new_carbohydrate,
            'sodium' => $new_sodium,
            'sugar' => $new_sugar,
            'weight' => $amount,
        ]);

        $addCalorieToBreakfast = DB::table('snack')->insert([
            'id' => Auth::user()->id,
            'id_food' => $id_food,
            'date' => $TODAY_DATE,
        ]);
    }

    public function addListFood($x) {
        $weight = $x['weight'];
        $food_calories = $x['food_calories'];
        $cholesterol = $x['cholesterol'];
        $fat = $x['fat'];
        $protein = $x['protein'];
        $carbohydrate = $x['carbohydrate'];
        $sodium = $x['sodium'];
        $sugar = $x['sugar'];

        $list_food = DB::table('list_food')->insert([
            'id_list_food' => Str::random(10),
            'food_name' => $x->food_name,
            'food_calories' => $food_calories,
            'cholesterol' => $cholesterol,
            'fat' => $fat,
            'protein' => $protein,
            'carbohydrate' => $carbohydrate,
            'sodium' => $sodium,
            'sugar' => $sugar,
            'weight' => $weight,
        ]);
    }

    public function getFoodInfo($id_food) {
        $foodInfo = DB::table('food')->where('id_food', $id_food)->get();

        return $foodInfo;
    }

    public function updateFoodInfo($req, $id_food) {
        $food = DB::table('food')->where('id_food', $id_food)->first();
        $updatedWeight = $req['weight'];

        $foodOldWeight = $food->weight;
        
        //calculate old calories
        $old_food_calories = $food->food_calories / $foodOldWeight;
        $old_cholesterol = $food->cholesterol / $foodOldWeight;
        $old_fat = $food->fat / $foodOldWeight;
        $old_protein = $food->protein / $foodOldWeight;
        $old_carbohydrate = $food->carbohydrate / $foodOldWeight;
        $old_sodium = $food->sodium / $foodOldWeight;
        $old_sugar = $food->sugar / $foodOldWeight;

        //calculate new calories
        $new_food_calories = $old_food_calories * $updatedWeight;
        $new_cholesterol = $old_cholesterol * $updatedWeight;
        $new_fat = $old_fat * $updatedWeight;
        $new_protein = $old_protein * $updatedWeight;
        $new_carbohydrate = $old_carbohydrate * $updatedWeight;
        $new_sodium = $old_sodium * $updatedWeight;
        $new_sugar = $old_sugar * $updatedWeight;

        $updateFoodInfo = DB::table('food')->where('id_food', $id_food)->update([
            'food_calories' => $new_food_calories,
            'cholesterol' => $new_cholesterol,
            'fat' => $new_fat,
            'protein' => $new_protein,
            'carbohydrate' => $new_carbohydrate,
            'sodium' => $new_sodium,
            'sugar' => $new_sugar,
            'weight' => $updatedWeight,
        ]);
    }

    public function deleteBreakfastInfo($id_food) {
        $deleteBreakfast = DB::table('breakfast')->where('id_food', $id_food)->delete();

        $deleteFood = DB::table('food')->where('id_food', $id_food)->delete();
    }   

    public function deleteLunchInfo($id_food) {
        $deleteBreakfast = DB::table('lunch')->where('id_food', $id_food)->delete();

        $deleteFood = DB::table('food')->where('id_food', $id_food)->delete();
    }  

    public function deleteDinnerInfo($id_food) {
        $deleteBreakfast = DB::table('dinner')->where('id_food', $id_food)->delete();

        $deleteFood = DB::table('food')->where('id_food', $id_food)->delete();
    }  

    public function deleteSnackInfo($id_food) {
        $deleteBreakfast = DB::table('snack')->where('id_food', $id_food)->delete();

        $deleteFood = DB::table('food')->where('id_food', $id_food)->delete();
    }  
}
