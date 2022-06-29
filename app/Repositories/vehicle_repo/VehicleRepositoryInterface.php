<?php
namespace App\Repositories\vehicle_repo;

use App\Repositories\BaseRepositoryInterface;

interface VehicleRepositoryInterface extends BaseRepositoryInterface
{
    public function getVehicle($search);
    public function getVehicleofRoute($route);
}
