<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController\HomeController;
use App\Http\Controllers\WebController\RouteWebController;

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



Route::group(['middleware' => 'locale'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('indexHome');
    Route::get('/popular-route', [RouteWebController::class, 'listingPop'])->name('listingPop');
    Route::get('/route/{id}', [RouteWebController::class, 'findRoute'])->name('findRoute');
    Route::get('change-language/{language}', [HomeController::class,'changeLanguage'])->name('changeLanguage');

});
