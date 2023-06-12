<?php

use App\Http\Controllers\ControllerAbout;
use App\Http\Controllers\ControllerAccountInfo;
use Illuminate\Support\Facades\Route;
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
    Route::get('add-food', function () {
        return view('add-food');
    });
    Route::get('account/{username}', [ControllerAccountInfo::class, 'viewAccount']);
    Route::post('account/update', [ControllerAccountInfo::class, 'updateAccount']);
    Route::get('account/{username}', [ControllerAccountInfo::class, 'viewAccount']);
    Route::get('about', [ControllerAbout::class, 'aboutPage']);
});


// Route::middleware(['auth', CheckRole::class.':client'])->group(function () {
//     Route::get('main', [ControllerMainPage::class, 'mainPage'])->name('main.page');
// });

Route::get('home', [ControllerMainPage::class, 'mainPage']);

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
Route::get('add-food', function () {
    return view('add-food', [
        'title' => 'Add Food'
    ]);
});
Route::get('add-calorie', function () {
    return view('add-calorie-page', [
        'title' => 'Add Calorie'
    ]);
});
Route::get('change-height-weight', function () {
    return view('change-height-weight', [
        'title' => 'Change Height Weight'
    ]);
});

// Route::get('account/asset/public/img/logo.png', function () {
//     return 
// });

Route::get('account/{username}', [ControllerAccountInfo::class, 'viewAccount']);
Route::post('account/update', [ControllerAccountInfo::class, 'updateAccount']);
Route::get('account/{username}', [ControllerAccountInfo::class, 'viewAccount']);
Route::get('about', [ControllerAbout::class, 'aboutPage']);

//login
Route::get('login', [ControllerLogin::class, 'login']);
Route::post('actionlogin', [ControllerLogin::class, 'actionlogin']);


Route::get('/berhasil', function () {
    return view('success');
});

//registrasi
Route::get('registrasi', [ControllerLogin::class, 'registrasi']);
Route::post('postregistrasi', [ControllerLogin::class, 'postregistrasi']);
