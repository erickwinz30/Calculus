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

Route::get('main', [ControllerMainPage::class, 'mainPage']);
// Route::middleware(['auth', CheckRole::class.':client'])->group(function () {
//     Route::get('main', [ControllerMainPage::class, 'mainPage'])->name('main.page');
// });

// Route::get('account/asset/public/img/logo.png', function () {
//     return 
// });

Route::get('account/{username}', [ControllerAccountInfo::class, 'viewAccount']);
Route::post('account/update', [ControllerAccountInfo::class, 'updateAccount']);
Route::get('account/{username}', [ControllerAccountInfo::class, 'viewAccount']);
Route::get('about', [ControllerAbout::class, 'aboutPage']);

//login
Route::get('login',[ControllerLogin::class, 'login']);
Route::post('actionlogin',[ControllerLogin::class, 'actionlogin']);


Route::get('/berhasil', function () {
    return view('success');
});

//registrasi
Route::get('registrasi',[ControllerLogin::class,'registrasi']);
Route::post('postregistrasi',[ControllerLogin::class,'postregistrasi']);
