<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController\HomeController;
use App\Http\Controllers\WebController\RouteWebController;
use App\Http\Controllers\WebController\CarrierController;
use App\Http\Controllers\WebController\TicketReserveController;
use App\Http\Controllers\WebController\RentalController;

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
    Route::get('/carrier/{id}', [CarrierController::class, 'findWeb'])->name('findCarrier');
    Route::get('change-language/{language}', [HomeController::class,'changeLanguage'])->name('changeLanguage');
    Route::get('/popular-carrier', [CarrierController::class, 'popCarrier'])->name('listingPopCarrier');
    Route::post('/postTicketReservation', [TicketReserveController::class, 'create'])->name('postTR');
    Route::post('/postTicketReservation-Carrier', [TicketReserveController::class, 'createCarrier'])->name('postTRC');
    Route::post('/postVehicleReservation', [RentalController::class, 'create'])->name('postRental');
    Route::get('/rental', [RentalController::class, 'index'])->name('rentalIndex');
});
