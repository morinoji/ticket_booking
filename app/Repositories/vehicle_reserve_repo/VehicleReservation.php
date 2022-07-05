<?php
namespace App\Repositories\vehicle_reserve_repo;

use App\Repositories\BaseRepository;
use App\TravelComp;
use App\Vehicle;
use App\VehicleComp;
use App\VehicleStatus;
use Carbon\Carbon;

class VehicleReservation extends BaseRepository implements VehicleReservationInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\VehicleReservation::class;
    }
    //list tuyến đường kèm paginate
    public function getVehicleReservation($search,$dateRange,$status,$comp)
    {
        $query = $this->model->leftJoin('travel_comps','vehicle_reservations.comp_id','=','travel_comps.id')->leftJoin('vehicles','vehicle_reservations.vehicle_id','=','vehicles.id')->select('vehicle_reservations.*','travel_comps.comp_name','vehicles.vehicle_name','vehicles.vehicle_slots');

        if ($dateRange!='') {
            $dateRangeDetail=explode(' - ',$dateRange);
            $datePicked=$dateRange;
            foreach ($dateRangeDetail as $index=>$element){
                $dateRangeDetail[$index]=date('Y-m-d',strtotime(str_replace('/', '-', $element)));
            }

            $startDAte= date('Y-m-d 00:00:00',strtotime($dateRangeDetail[0]));
            $endDate=date('Y-m-d 23:59:59',strtotime($dateRangeDetail[1]));
            $query=$query->whereBetween('vehicle_reservations.created_at',[$startDAte,$endDate]);

        }else{
            $startDAte=Carbon::now()->startOfMonth()->setTime('0','0','0')->toDateString();
            $endDate=Carbon::now()->lastOfMonth()->setTime('23','59','59')->toDateString();
            $query=$query->whereBetween('vehicle_reservations.created_at',[$startDAte,$endDate]);
            $datePicked=date('d/m/Y',strtotime($startDAte)).' - '.date('d/m/Y',strtotime($endDate));
        }
        if($comp!=0){
            $query->where('vehicle_reservations.comp_id',$comp);
        }
        if ($status!=0 ){
            $query = $query->where('status_id','=',$status);
            $statusText=$status;
        }else{
            $statusText=0;
        }
        if ($search!='') {
            $query = $query->where('vehicle_reservations.full_name','like','%'. $search .'%')->orWhere('vehicle_reservations.phone','like','%'. $search .'%');
            $searchText=$search;
        }else{
            $searchText='';
        }
        $statuses=VehicleStatus::all();
        $data = $query->latest('vehicle_reservations.updated_at')->paginate(10)->appends(request()->query());
//        return [view('order.index',compact('data','statuses','datePicked','statusText','searchText')]);
        return ['data'=>$data, 'statuses'=>$statuses, 'datePicked'=>$datePicked, 'statusText'=>$statusText, 'searchText'=>$searchText];
    }

    public function getCompOfVeh($vehicle){
//        $comps= VehicleComp::join('travel_comps','vehicle_comps.comp_id','=','travel_comps.id')->select('travel_comps.*')->where('vehicle_comps.vehicle_id',$vehicle)->get();
        $comps=TravelComp::join("route_details",'travel_comps.id','=','route_details.comp_id')->where('route_details.vehicle',$vehicle)->distinct()->get();
        return $comps;
    }
}
