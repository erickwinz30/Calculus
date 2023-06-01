<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerLogin;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

//login
Route::get('login',[ControllerLogin::class, 'login']);
Route::post('actionlogin',[ControllerLogin::class, 'actionlogin']);


Route::get('/berhasil', function () {
    return view('success');
});

//registrasi
Route::get('registrasi',[ControllerLogin::class,'registrasi']);
Route::post('postregistrasi',[ControllerLogin::class,'postregistrasi']);
