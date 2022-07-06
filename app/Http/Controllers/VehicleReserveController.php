<?php

namespace App\Http\Controllers;

use App\Models\TicketStatus;
use App\Models\VehicleComp;
use App\Repositories\comp_repo\CompRepositoryInterface;
use App\Repositories\vehicle_repo\VehicleRepositoryInterface;
use App\Repositories\vehicle_reserve_repo\VehicleReservationInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VehicleReserveController extends Controller
{
    protected $vehicleReservation;
    protected $vehicleRepository;
    protected $compRepository;
    protected $vehicleComp;

    public function __construct(VehicleReservationInterface $vehicleReservation, VehicleRepositoryInterface  $vehicleRepository, CompRepositoryInterface $compRepository, VehicleComp  $vehicleComp)
    {
        $this->vehicleReservation=$vehicleReservation;
        $this->vehicleRepository=$vehicleRepository;
        $this->compRepository=$compRepository;
        $this->vehicleComp=$vehicleComp;
    }

    public function index(){
        $comps=$this->compRepository->getAll();
        $search='';
        $dateRange='';
        $status=0;
        $comp='';
        if(isset($_GET['search_query']) && !empty($_GET['search_query'])){
            $search=$_GET['search_query'];
        }
        if(isset($_GET['date_range']) && !empty($_GET['date_range'])){
            $dateRange=$_GET['date_range'];
        }
        if(isset($_GET['status']) && !empty($_GET['status'])){
            $status=$_GET['status'];
        }
        if(isset($_GET['comp']) && !empty($_GET['comp'])){
            $comp=$_GET['comp'];
        }

        $ticket=$this->vehicleReservation->getVehicleReservation($search,$dateRange,$status, $comp);
        $data=$ticket['data'];
        $statuses=$ticket['statuses'];
        $datePicked=$ticket['datePicked'];
        $statusText=$ticket['statusText'];
        $searchText=$ticket['searchText'];

        return view('vehicle_reservation.index',compact('data','statuses','datePicked','statusText','searchText'));
    }

    public function getComps(Request $request){

        $comps=$this->vehicleReservation->getCompOfVeh($request->id);
        return $comps;
    }

    public function toAdd(){
        $vehicles= $this->vehicleRepository->getAll();
        $comps= $this->vehicleReservation->getCompOfVeh($vehicles[0]->id);
        return view('vehicle_reservation.add',compact('vehicles','comps'));
    }

    public function create(Request $request){

        $attrs=[
            'vehicle_id'=>$request->vehicle,
            'comp_id'=>$request->comp,
            'full_name'=>$request->name,
            'phone'=>$request->phone_number,
            'email'=>$request->email,
            'guest_number'=>$request->  guest,
            'depart_datetime'=>$request->depart_time,
            'depart_address'=>$request->depart_address,
            'destination'=>$request->destination,
            'note'=>$request->note,
            'status_id'=>1,
        ];

        $this->vehicleReservation->create($attrs);
        return redirect()->route('indexVehRes');
    }

    public function changeStatus(Request $request){
        $this->vehicleReservation->update($request->id,[
            'status_id'=>$request->status
        ]);
    }

    public function update(Request $request){
        $data=$this->vehicleReservation->find($request->id);
        $vehicles= $this->vehicleRepository->getAll();
        $comps= $this->vehicleReservation->getCompOfVeh($data->vehicle_id);
        $statuses=TicketStatus::all();
        return view('vehicle_reservation.update',compact('vehicles','comps','data','statuses'));
    }

    public function edit($id,Request $request){
        $attrs=[
            'vehicle_id'=>$request->vehicle,
            'comp_id'=>$request->comp,
            'full_name'=>$request->name,
            'phone'=>$request->phone_number,
            'email'=>$request->email,
            'guest_number'=>$request->  guest,
            'depart_datetime'=>$request->depart_time,
            'depart_address'=>$request->depart_address,
            'destination'=>$request->destination,
            'note'=>$request->note,
        ];

        $this->vehicleReservation->update($id,$attrs);
        return back();
    }


    public function delete(Request $request)
    {
        try {
            $this->vehicleReservation->delete($request->id);
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $ex) {
            Log::error($ex->getMessage() . '----------' . $ex->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
}
