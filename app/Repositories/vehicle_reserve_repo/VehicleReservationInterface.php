<?php
namespace App\Repositories\vehicle_reserve_repo;

use App\Repositories\BaseRepositoryInterface;

interface VehicleReservationInterface extends BaseRepositoryInterface
{
    public function getVehicleReservation($search,$dateRange,$status,$comp);
    public function getCompOfVeh($vehicle);
}
