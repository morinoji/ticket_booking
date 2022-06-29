<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Repositories\route_repo\RouteRepositoryInterface;
use App\Repositories\vehicle_repo\VehicleRepositoryInterface;
use App\RouteDetail;
use App\RouteImage;
use App\Slider;
use Illuminate\Http\Request;

class RouteWebController extends Controller
{
    protected $routeRepo;
    protected $vehicleRepo;
    protected $images;
    protected $routeDetail;

    public function __construct(RouteRepositoryInterface $routeRepository,VehicleRepositoryInterface $vehicleRepository, RouteImage $images, RouteDetail $routeDetail)
    {
        $this->routeRepo=$routeRepository;
        $this->vehicleRepo=$vehicleRepository;
        $this->images=$images;
        $this->routeDetail=$routeDetail;
    }

    public function listingPop(){
        $sliders=Slider::all();
        $routes=$this->routeRepo->getPopAhead();
        return view('client.route.index',compact('routes','sliders'));
    }

    public function findRoute(Request $request){
        $route=$this->routeRepo->findWeb($request->id)->first();
        $des=explode(PHP_EOL,$route->description);
        $detail=explode(',',$route->detail);
        $vehicles=$this->vehicleRepo->getVehicleofRoute($request->id);
        $images=$this->images->where('route_id',$request->id)->get();
        $route->images=$images;
        $route->detail=$detail;
        $routes=$this->routeDetail->join('vehicles','route_details.vehicle','vehicles.id')->join('routes','route_details.route_id','routes.id')->select('route_details.*','vehicles.vehicle_name','vehicles.vehicle_slots','routes.route_name')->where('route_id',$route->route_id)->get();

        return view('client.route_detail.index',compact('route','vehicles','des','routes'));
    }
}
