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

    //list-food
    Route::get('add-food', function () {
        return view('add-food');
    });
    Route::post('add-food/add', [ControllerFood::class, 'addListFood']);

    //account
    Route::get('account', [ControllerAccountInfo::class, 'viewAccount']);
    Route::post('account/update', [ControllerAccountInfo::class, 'updateAccount']);

    //aboutus
    Route::get('aboutus', [ControllerAbout::class, 'aboutPage']);

    Route::get('height-weight', function () {
        return view('height-weight');
    });
    Route::post('height-weight/run', [ControllerAccountInfo::class, 'bmr']);

    Route::get('nutrition-info', function () {
        return view('nutrition-info');
    });
    
    Route::get('health-tips', function () {
        return view('healthtips');
    });
});

//login
Route::get('login', [ControllerLogin::class, 'login']);
Route::post('actionlogin', [ControllerLogin::class, 'actionlogin']);

//registrasi
Route::get('registrasi', [ControllerLogin::class, 'registrasi']);
Route::post('postregistrasi', [ControllerLogin::class, 'postregistrasi']);
