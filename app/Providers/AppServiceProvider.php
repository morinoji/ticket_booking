<?php

namespace App\Providers;

use App\Repositories\comp_repo\CompRepository;
use App\Repositories\comp_repo\CompRepositoryInterface;
use App\Repositories\route_repo\RouteRepository;
use App\Repositories\route_repo\RouteRepositoryInterface;
use App\Repositories\ticket_repo\TicketRepository;
use App\Repositories\ticket_repo\TicketRepositoryInterface;
use App\Repositories\vehicle_repo\VehicleRepository;
use App\Repositories\vehicle_repo\VehicleRepositoryInterface;
use App\Repositories\vehicle_reserve_repo\VehicleReservation;
use App\Repositories\vehicle_reserve_repo\VehicleReservationInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            VehicleRepositoryInterface::class,
            VehicleRepository::class
        );
        $this->app->singleton(
            CompRepositoryInterface::class,
            CompRepository::class
        );
        $this->app->singleton(
            RouteRepositoryInterface::class,
            RouteRepository::class
        );
        $this->app->singleton(
            TicketRepositoryInterface::class,
            TicketRepository::class
        );
        $this->app->singleton(
            VehicleReservationInterface::class,
            VehicleReservation::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

}
