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

    //list-food
    Route::get('add-food', function () {
        return view('add-food', [
            'title' => 'Add Food'
        ]);
    });
    Route::post('add-food/add', [ControllerFood::class, 'addListFood']);

    Route::get('add-calorie-breakfast', function () {
        return view('add-calorie-breakfast', [
            'title' => 'Add Calorie'
        ]);
    });
    Route::get('add-calorie-lunch', function () {
        return view('add-calorie-lunch', [
            'title' => 'Add Calorie'
        ]);
    });
    Route::get('add-calorie-dinner', function () {
        return view('add-calorie-dinner', [
            'title' => 'Add Calorie'
        ]);
    });
    Route::get('add-calorie-snack', function () {
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

    Route::get('nutrition-info', function () {
        return view('nutrition-info', [
            'title' => 'Nutrition Information'
        ]);
    });

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
