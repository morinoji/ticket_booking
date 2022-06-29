<?php
namespace App\Repositories\ticket_repo;

use App\Repositories\BaseRepository;
use App\TicketReservation;
use App\TicketStatus;
use Carbon\Carbon;

class TicketRepository extends BaseRepository implements TicketRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return TicketReservation::class;
    }
    //list tuyến đường kèm paginate
    public function getTickets($search,$dateRange,$status,$route)
    {
        $query = $this->model->join('routes','ticket_reservations.route_id','=','routes.id')->leftJoin('travel_comps','ticket_reservations.comp_id','=','travel_comps.id')->select('ticket_reservations.*','routes.route_name','travel_comps.comp_name');

        if ($dateRange!='') {
            $dateRangeDetail=explode(' - ',$dateRange);
            $datePicked=$dateRange;
            foreach ($dateRangeDetail as $index=>$element){
                $dateRangeDetail[$index]=date('Y-m-d',strtotime(str_replace('/', '-', $element)));
            }
            $startDAte= date('Y-m-d 00:00:00',strtotime($dateRangeDetail[0]));
            $endDate=date('Y-m-d 23:59:59',strtotime($dateRangeDetail[1]));
            $query=$query->whereBetween('ticket_reservations.created_at',[$startDAte,$endDate]);
        }else{
            $startDAte=Carbon::now()->startOfMonth()->setTime('0','0','0')->toDateString();
            $endDate=Carbon::now()->lastOfMonth()->setTime('23','59','59')->toDateString();
            $query=$query->whereBetween('ticket_reservations.created_at',[$startDAte,$endDate]);
            $datePicked=date('d/m/Y',strtotime($startDAte)).' - '.date('d/m/Y',strtotime($endDate));
        }
        if($route!=0){
            $query->where('route_id',$route);
        }
        if ($status!=0 ){
            $query = $query->where('status_id','=',$status);
            $statusText=$status;
        }else{
            $statusText=0;
        }
        if ($search!='') {
            $query = $query->where('ticket_reservations.full_name','like','%'. $search .'%')->orWhere('ticket_reservations.phone','like','%'. $search .'%');
            $searchText=$search;
        }else{
            $searchText='';
        }
        $statuses=TicketStatus::all();
        $data = $query->latest('ticket_reservations.updated_at')->paginate(10)->appends(request()->query());
//        return [view('order.index',compact('data','statuses','datePicked','statusText','searchText')]);
        return ['data'=>$data, 'statuses'=>$statuses, 'datePicked'=>$datePicked, 'statusText'=>$statusText, 'searchText'=>$searchText];
    }
}
