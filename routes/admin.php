<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\TravelCompController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\TicketReserveController;
use App\Http\Controllers\TicketStatusController;
use App\Http\Controllers\VehicleReserveController;
use App\Http\Controllers\VehicleStatusController;
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



Route::group(['prefix' => 'admin/vehicles'], function () {
    Route::get('/', [VehicleController::class, 'index'])->name('indexVeh');
    Route::get('/add', [VehicleController::class, 'toAdd'])->name('addVeh');
    Route::post('/create', [VehicleController::class, 'create'])->name('createVeh');
    Route::get('/update/{id}', [VehicleController::class, 'toUpdate'])->name('updateVeh');
    Route::post('/edit/{id}', [VehicleController::class, 'edit'])->name('editVeh');
    Route::get('/delete/{id}', [VehicleController::class, 'delete'])->name('deleteVeh');
});

Route::group(['prefix' => 'admin/companies'], function () {
    Route::get('/', [TravelCompController::class, 'index'])->name('indexComp');
    Route::get('/add', [TravelCompController::class, 'toAdd'])->name('addComp');
    Route::post('/create', [TravelCompController::class, 'create'])->name('createComp');
    Route::get('/update/{id}', [TravelCompController::class, 'toUpdate'])->name('updateComp');
    Route::post('/edit/{id}', [TravelCompController::class, 'edit'])->name('editComp');
    Route::get('/delete/{id}', [TravelCompController::class, 'delete'])->name('deleteComp');
});

Route::group(['prefix' => 'admin/routes'], function () {
    Route::get('/', [RouteController::class, 'index'])->name('indexRoute');
    Route::get('/add', [RouteController::class, 'toAdd'])->name('addRoute');
    Route::post('/create', [RouteController::class, 'create'])->name('createRoute');
    Route::get('/update/{id}', [RouteController::class, 'toUpdate'])->name('updateRoute');
    Route::post('/edit/{id}', [RouteController::class, 'edit'])->name('editRoute');
    Route::get('/delete/{id}', [RouteController::class, 'delete'])->name('deleteRoute');
});

Route::group(['prefix' => 'admin/tickets'], function () {
    Route::get('/', [TicketReserveController::class, 'index'])->name('indexTicket');
    Route::get('/add', [TicketReserveController::class, 'toAdd'])->name('addTicket');
    Route::get('/search-comps', [TicketReserveController::class, 'getComps'])->name('searchComps');
    Route::post('/create', [TicketReserveController::class, 'create'])->name('createTicket');
    Route::get('/update/{id}', [TicketReserveController::class, 'update'])->name('updateTicket');
    Route::post('/edit/{id}', [TicketReserveController::class, 'edit'])->name('editTicket');
    Route::get('/delete', [TicketReserveController::class, 'delete'])->name('deleteTicket');
    Route::get('/changeStatus', [TicketReserveController::class, 'changeStatus'])->name('changeStatus');
});

Route::group(['prefix' => 'admin/ticket_statuses'], function () {
    Route::get('/', [TicketStatusController::class, 'index'])->name('indexOrderStatus');
    Route::get('/add', [TicketStatusController::class, 'addNewStatus'])->name('addOrderStatus');
    Route::get('/update', [TicketStatusController::class, 'updateStatus'])->name('updateOrderStatus');
    Route::get('/delete', [TicketStatusController::class, 'deleteStatus'])->name('deleteOrderStatus');
});

Route::group(['prefix' => 'admin/vehicle_statuses'], function () {
    Route::get('/', [VehicleStatusController::class, 'index'])->name('indexVehicleStatus');
    Route::get('/add', [VehicleStatusController::class, 'addNewStatus'])->name('addVehicleStatus');
    Route::get('/update', [VehicleStatusController::class, 'updateStatus'])->name('updateVehicleStatus');
    Route::get('/delete', [VehicleStatusController::class, 'deleteStatus'])->name('deleteVehicleStatus');
});

Route::group(['prefix' => 'admin/vehicle-reservation'], function () {
    Route::get('/', [VehicleReserveController::class, 'index'])->name('indexVehRes');
    Route::get('/add', [VehicleReserveController::class, 'toAdd'])->name('addVehRes');
    Route::get('/search-comps', [VehicleReserveController::class, 'getComps'])->name('searchCompsVeh');
    Route::post('/create', [VehicleReserveController::class, 'create'])->name('createVehRes');
    Route::get('/update/{id}', [VehicleReserveController::class, 'update'])->name('updateVehRes');
    Route::post('/edit/{id}', [VehicleReserveController::class, 'edit'])->name('editVehRes');
    Route::get('/delete', [VehicleReserveController::class, 'delete'])->name('deleteVehRes');
    Route::get('/changeStatus', [VehicleReserveController::class, 'changeStatus'])->name('changeStatus');
});

Route::prefix('admin/sliders')->group(function () {
    Route::get('/create', [
        'as' => 'sliders.create',
        'uses' => 'SliderController@create',

    ]);

    Route::get('/', [
        'as' => 'sliders.index',
        'uses' => 'SliderController@index',

    ]);

    Route::post('/upload', [
        'as' => 'sliders.upload',
        'uses' => 'SliderController@upload',
    ]);

    Route::get('/edit/{id}', [
        'as' => 'sliders.find',
        'uses' => 'SliderController@find'
    ]);

    Route::post('/update/{id}', [
        'as' => 'sliders.edit',
        'uses' => 'SliderController@edit',

    ]);

    Route::get('/delete/{id}', [
        'as' => 'sliders.delete',
        'uses' => 'SliderController@delete',

    ]);

});

Route::prefix('admin/hot-location')->group(function () {
    Route::get('/create', [
        'as' => 'hotloc.create',
        'uses' => 'HotLocationController@create',
    ]);

    Route::get('/', [
        'as' => 'hotloc.index',
        'uses' => 'HotLocationController@index',

    ]);

    Route::post('/upload', [
        'as' => 'hotloc.upload',
        'uses' => 'HotLocationController@upload',
    ]);

    Route::get('/edit/{id}', [
        'as' => 'hotloc.find',
        'uses' => 'HotLocationController@find'
    ]);

    Route::post('/update/{id}', [
        'as' => 'hotloc.edit',
        'uses' => 'HotLocationController@edit',

    ]);

    Route::get('/delete/{id}', [
        'as' => 'hotloc.delete',
        'uses' => 'HotLocationController@delete',

    ]);

});

Route::prefix('admin/infor')->group(function () {
    Route::get('/', [
        'as' => 'infor.index',
        'uses' => 'InfoController@index',
        //'middleware'=>'can:sliders-view'
    ]);

    Route::post('/upload', [
        'as' => 'infor.upload',
        'uses' => 'InfoController@upload',
    ]);


});
