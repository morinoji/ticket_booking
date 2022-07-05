<?php

namespace App\Http\Controllers\WebController;

use App\HotLocation;
use App\Http\Controllers\Controller;
use App\Repositories\vehicle_repo\VehicleRepositoryInterface;
use App\Repositories\vehicle_reserve_repo\VehicleReservationInterface;
use App\Slider;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    protected $slider;
    protected $loc;
    protected $vehicleRepo;
    protected $vehicleReserve;

    public function __construct(Slider $slider,HotLocation $loc,VehicleRepositoryInterface $vehicleRepository, VehicleReservationInterface $vehicleReservation)
    {
        $this->slider=$slider;
        $this->loc=$loc;
        $this->vehicleRepo=$vehicleRepository;
        $this->vehicleReserve=$vehicleReservation;
    }

    public function index(){
        $sliders=$this->slider->all();
        $locs=$this->loc->all();
        $vehicles=$this->vehicleRepo->getAll();

        return view('client.rental.vehicle_rental',compact('sliders','locs','vehicles'));
    }

    public function create(Request $request){
        $attrs=[
            'full_name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'guest_number'=>$request->guest,
            'depart_datetime'=>$request->day .' '. $request->time,
            'depart_address'=>$request->depart_addr,
            'destination'=>$request->destination,
            'note'=>$request->note,
            'status_id'=>1,
        ];

        $this->vehicleReserve->create($attrs);

    }
}
