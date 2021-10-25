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
    Route::get('/sales',function(){
        return view('sales');
    });
    Route::post('/create_payer',[\App\Http\Controllers\UserController::class,'create_pay']);
    Route::post('/update_presence_pay',[\App\Http\Controllers\UserController::class,'update_presencepay']);
    Route::post('/admin/setPanelColor',[\App\Http\Controllers\UserController::class,'setPanelColor']);
    Route::post('/create_sale',[\App\Http\Controllers\UserController::class,'create_sale']);
    Route::post('/getEditSaleModalContent',[\App\Http\Controllers\UserController::class,'get_edit_sale_form']);
    Route::post('/update_sale',[\App\Http\Controllers\UserController::class,'update_sale']);
    Route::post('/more_log',[\App\Http\Controllers\Controller::class,'more_log']);
    Route::post('/update_wpapiconfig',[\App\Http\Controllers\Controller::class,'update_wpapiconfig']);
    Route::post('/getPayModalContent',[\App\Http\Controllers\UserController::class,'get_paydetail']);
    Route::get('/logout',function(){
        \Illuminate\Support\Facades\Auth::logout();
        return response()->redirectTo('/login');
    });
});

Route::get('/feed_database',function(){
    \Illuminate\Support\Facades\Artisan::call('migrate:refresh --seed');
});
