<?php

use App\Http\Controllers\ControllerAbout;
use App\Http\Controllers\ControllerAccountInfo;
use App\Http\Controllers\ControllerFood;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ControllerLogin;
use App\Http\Controllers\ControllerMainPage;
use App\Http\Middleware\CheckRole;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['checkRole:client']], function () {
    Route::get('/', [ControllerMainPage::class, 'mainPage']);
    Route::get('home', [ControllerMainPage::class, 'mainPage']);
    Route::post('/', [ControllerMainPage::class, 'mainPage'])->name('mainPage.date');

    //searchFood
    Route::get('addBreakfast/search/{foodName}', [ControllerFood::class, 'searchFood']);
    Route::get('addLunch/search/{foodName}', [ControllerFood::class, 'searchFood']);
    Route::get('addDinner/search/{foodName}', [ControllerFood::class, 'searchFood']);
    Route::get('addSnack/search/{foodName}', [ControllerFood::class, 'searchFood']);

    //add Calorie
    Route::post('addBreakfast/save', [ControllerFood::class, 'addCalorieBreakfast'])->name('addBreakfast.save');
    Route::post('addLunch/save', [ControllerFood::class, 'addCalorieLunch'])->name('addLunch.save');
    Route::post('addDinner/save', [ControllerFood::class, 'addCalorieDinner'])->name('addDinner.save');
    Route::post('addSnack/save', [ControllerFood::class, 'addCalorieSnack'])->name('addSnack.save');

    //list-food
    Route::get('add-food', function () {
        return view('add-food', [
            'title' => 'Add Food'
        ]);
    });
    Route::post('add-food/add', [ControllerFood::class, 'addListFood']);

    Route::get('addBreakfast', function () {
        return view('add-calorie-breakfast', [
            'title' => 'Add Calorie'
        ]);
    });
    Route::get('addLunch', function () {
        return view('add-calorie-lunch', [
            'title' => 'Add Calorie'
        ]);
    });
    Route::get('addDinner', function () {
        return view('add-calorie-dinner', [
            'title' => 'Add Calorie'
        ]);
    });
    Route::get('addSnack', function () {
        return view('add-calorie-snack', [
            'title' => 'Add Calorie'
        ]);
    });

    //account
    Route::get('account', [ControllerAccountInfo::class, 'viewAccount']);
    Route::post('account/update', [ControllerAccountInfo::class, 'updateAccount']);

    //aboutus
    Route::get('aboutus', [ControllerAbout::class, 'aboutPage']);

    //height weight
    Route::get('change-height-weight', [ControllerAccountInfo::class, 'getHeightWeight']);
    Route::post('height-weight/update', [ControllerAccountInfo::class, 'updateHeightWeight']);

    //nutrition-info
    Route::get('nutrition-info/breakfast/{id_food}', [ControllerFood::class, 'nutritionInfoBreakfast']);
    Route::get('nutrition-info/lunch/{id_food}', [ControllerFood::class, 'nutritionInfoLunch']);
    Route::get('nutrition-info/dinner/{id_food}', [ControllerFood::class, 'nutritionInfoDinner']);
    Route::get('nutrition-info/snack/{id_food}', [ControllerFood::class, 'nutritionInfoSnack']);

    Route::post('nutrition-info/breakfast/{id_food}/update', [ControllerFood::class, 'updateFoodInfo']);
    Route::post('nutrition-info/lunch/{id_food}/update', [ControllerFood::class, 'updateFoodInfo']);
    Route::post('nutrition-info/dinner/{id_food}/update', [ControllerFood::class, 'updateFoodInfo']);
    Route::post('nutrition-info/snack/{id_food}/update', [ControllerFood::class, 'updateFoodInfo']);

    Route::post('nutrition-info/breakfast/{id_food}/delete', [ControllerFood::class, 'deleteBreakfastInfo']);
    Route::post('nutrition-info/lunch/{id_food}/delete', [ControllerFood::class, 'deleteLunchInfo']);
    Route::post('nutrition-info/dinner/{id_food}/delete', [ControllerFood::class, 'deleteDinnerInfo']);
    Route::post('nutrition-info/snack/{id_food}/delete', [ControllerFood::class, 'deleteSnackInfo']);

    Route::get('health-tips', function () {
        return view('healthtips', [
            'title' => 'Health Tips'
        ]);
    });
});

//login
Route::get('login', [ControllerLogin::class, 'login']);
Route::post('actionlogin', [ControllerLogin::class, 'actionlogin']);

//registrasi
Route::get('registrasi', [ControllerLogin::class, 'registrasi']);
Route::post('postregistrasi', [ControllerLogin::class, 'postregistrasi']);
