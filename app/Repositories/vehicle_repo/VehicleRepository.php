<?php
namespace App\Repositories\vehicle_repo;

use App\Models\Vehicle;
use App\Repositories\BaseRepository;

class VehicleRepository extends BaseRepository implements VehicleRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Vehicle::class;
    }
    //list sản phẩm kèm paginate
    public function getVehicle($search)
    {
        return $this->model->where('vehicle_name','like','%'. $search .'%')->latest()->paginate(10);
    }

    public function getVehicleofRoute($route)
    {
        return $this->model->join('route_details','vehicles.id','=','route_details.vehicle')->select('vehicles.*')->where('route_details.route_id',$route)->distinct()->get();
    }
}
