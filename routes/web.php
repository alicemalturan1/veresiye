<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/login',function(){return view('login');})->name('login');

Route::post('/login',[\App\Http\Controllers\UserController::class,'login']);
Route::group(['middleware'=>'auth'],function(){


    Route::get('/', function () {
        return view("statistics");
    });
    Route::get('/book', function () {
        return view("book");
    });
    Route::post('/create_payer',[\App\Http\Controllers\UserController::class,'create_pay']);
    Route::post('/update_presence_pay',[\App\Http\Controllers\UserController::class,'update_presencepay']);
    Route::post('/bilgilendir',[\App\Http\Controllers\UserController::class,'bilgilendir']);
});
