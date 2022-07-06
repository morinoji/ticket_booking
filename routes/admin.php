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

Route::prefix('admin')->group(function () {
    Route::get('/', [
        'uses' => 'Admin\AdminController@loginAdmin',
    ]);

    Route::post('/', [
        'uses' => 'Admin\AdminController@postLoginAdmin',
    ]);

    Route::get('/logout', [
        'as' => 'administrator.logout',
        'uses' => 'Admin\AdminController@logout',
    ]);

});

Route::prefix('administrator')->group(function () {

    Route::prefix('users')->group(function () {

        Route::get('/', [
            'as' => 'administrator.users.index',
            'uses' => 'Admin\AdminUserController@index',
            'middleware' => 'can:user-list',
        ]);

        Route::get('/create', [
            'as' => 'administrator.users.create',
            'uses' => 'Admin\AdminUserController@create',
            'middleware' => 'can:user-add',
        ]);

        Route::post('/store', [
            'as' => 'administrator.users.store',
            'uses' => 'Admin\AdminUserController@store',
            'middleware' => 'can:user-add',
        ]);

        Route::get('/edit/{id}', [
            'as' => 'administrator.users.edit',
            'uses' => 'Admin\AdminUserController@edit',
            'middleware' => 'can:user-edit',
        ]);

        Route::put('/update/{id}', [
            'as' => 'administrator.users.update',
            'uses' => 'Admin\AdminUserController@update',
            'middleware' => 'can:user-edit',
        ]);

        Route::put('/update-status/{id}', [
            'as' => 'administrator.users.status.update',
            'uses' => 'Admin\AdminUserController@updateStatus',
            'middleware' => 'can:user-edit',
        ]);

        Route::get('/delete/{id}', [
            'as' => 'administrator.users.delete',
            'uses' => 'Admin\AdminUserController@delete',
            'middleware' => 'can:user-delete',
        ]);

    });

    Route::prefix('employees')->group(function () {
        Route::get('/', [
            'as' => 'administrator.employees.index',
            'uses' => 'App\Http\Controllers\Admin\AdminEmployeeController@index',
            'middleware' => 'can:employee-list',
        ]);
        Route::get('/detail/{id}', [
            'as' => 'administrator.employees.detail',
            'uses' => 'App\Http\Controllers\Admin\AdminEmployeeController@detail',
            'middleware' => 'can:employee-list',
        ]);

        Route::get('/create', [
            'as' => 'administrator.employees.create',
            'uses' => 'App\Http\Controllers\Admin\AdminEmployeeController@create',
            'middleware' => 'can:employee-add',
        ]);

        Route::post('/store', [
            'as' => 'administrator.employees.store',
            'uses' => 'App\Http\Controllers\Admin\AdminEmployeeController@store',
            'middleware' => 'can:employee-add',
        ]);

        Route::get('/edit/{id}', [
            'as' => 'administrator.employees.edit',
            'uses' => 'App\Http\Controllers\Admin\AdminEmployeeController@edit',
            'middleware' => 'can:employee-edit',
        ]);

        Route::put('/update/{id}', [
            'as' => 'administrator.employees.update',
            'uses' => 'App\Http\Controllers\Admin\AdminEmployeeController@update',
            'middleware' => 'can:employee-edit',
        ]);

        Route::get('/delete/{id}', [
            'as' => 'administrator.employees.delete',
            'uses' => 'App\Http\Controllers\Admin\AdminEmployeeController@delete',
            'middleware' => 'can:employee-delete',
        ]);

    });

    Route::prefix('roles')->group(function () {
        Route::get('/', [
            'as' => 'administrator.roles.index',
            'uses' => 'App\Http\Controllers\Admin\AdminRoleController@index',
            'middleware' => 'can:role-list',
        ]);

        Route::get('/create', [
            'as' => 'administrator.roles.create',
            'uses' => 'App\Http\Controllers\Admin\AdminRoleController@create',
            'middleware' => 'can:role-add',
        ]);

        Route::get('/edit/{id}', [
            'as' => 'administrator.roles.edit',
            'uses' => 'App\Http\Controllers\Admin\AdminRoleController@edit',
            'middleware' => 'can:role-edit',
        ]);

        Route::post('/store', [
            'as' => 'administrator.roles.store',
            'uses' => 'App\Http\Controllers\Admin\AdminRoleController@store',
            'middleware' => 'can:role-add',
        ]);

        Route::put('/update/{id}', [
            'as' => 'administrator.roles.update',
            'uses' => 'App\Http\Controllers\Admin\AdminRoleController@update',
            'middleware' => 'can:role-edit',
        ]);

        Route::get('/delete/{id}', [
            'as' => 'administrator.roles.delete',
            'uses' => 'App\Http\Controllers\Admin\AdminRoleController@delete',
            'middleware' => 'can:role-delete',
        ]);

    });

    Route::prefix('permissions')->group(function () {
        Route::get('/create', [
            'as' => 'administrator.permissions.create',
            'uses' => 'App\Http\Controllers\Admin\AdminPermissionController@create',
            'middleware' => 'can:permission-list',
        ]);

        Route::post('/store', [
            'as' => 'administrator.permissions.store',
            'uses' => 'App\Http\Controllers\Admin\AdminPermissionController@store',
            'middleware' => 'can:permission-add',
        ]);

    });

    Route::prefix('notification')->group(function () {
        Route::get('/', [
            'as' => 'administrator.notification.index',
            'uses' => 'App\Http\Controllers\Admin\AdminNotificationController@index',
            'middleware' => 'can:notification-list',
        ]);

        Route::get('/edit', [
            'as' => 'administrator.notification.edit',
            'uses' => 'App\Http\Controllers\Admin\AdminNotificationController@edit',
            'middleware' => 'can:notification-edit',
        ]);

        Route::put('/update', [
            'as' => 'administrator.notification.update',
            'uses' => 'App\Http\Controllers\Admin\AdminNotificationController@update',
            'middleware' => 'can:notification-edit',
        ]);

//        Route::get('/delete/{id}', [
//            'as'=>'administrator.notification.delete',
//            'uses'=>'App\Http\Controllers\Admin\AdminNotificationController@delete',
//            'middleware'=>'can:notification-delete',
//        ]);

    });

    Route::prefix('logo')->group(function () {
        Route::get('/', [
            'as' => 'administrator.logo.add',
            'uses' => 'App\Http\Controllers\Admin\AdminLogoController@create',
            'middleware' => 'can:logo-list',
        ]);

        Route::post('/store', [
            'as' => 'administrator.logo.store',
            'uses' => 'App\Http\Controllers\Admin\AdminLogoController@store',
            'middleware' => 'can:logo-add',
        ]);
    });

    Route::prefix('history-data')->group(function () {
        Route::get('/', [
            'as' => 'administrator.history_data.index',
            'uses' => 'App\Http\Controllers\Admin\AdminHistoryDataController@index',
            'middleware' => 'can:history-data-list',
        ]);
    });

});

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
