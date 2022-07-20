<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuth;

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

Route::get('/login',[CustomAuth::class,'login'])->middleware('AlreadyLoggedIn','preventBack');

Route::get('/registeration',[CustomAuth::class,'registeration'])->middleware('AlreadyLoggedIn');
Route::post('regsiter-user',[CustomAuth::class,'registerUser'])->name
('register-user');
Route::post('login-user',[CustomAuth::class,'loginUser'])->
name('login-user');
Route::get('/dashboard',[CustomAuth::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/logout',[CustomAuth::class,'logout']);