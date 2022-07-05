<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Repositories\comp_repo\CompRepositoryInterface;
use App\Repositories\route_repo\RouteRepositoryInterface;
use App\Repositories\ticket_repo\TicketRepositoryInterface;
use App\TicketReservation;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class TicketReserveController extends Controller
{
    protected $ticketRepository;

    public function __construct(TicketReservation $ticketRepository)
    {
        $this->ticketRepository=$ticketRepository;
    }

    public function create(Request $request){
        $attrs=[
            'route_id'=>$request->route,
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

        $this->ticketRepository->create($attrs);

    }
    public function createCarrier(Request $request){
        $attrs=[
            'route_id'=>$request->route,
            'full_name'=>$request->name,
            'comp_id'=>$request->comp_id,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'guest_number'=>$request->guest,
            'depart_datetime'=>$request->day .' '. $request->time,
            'depart_address'=>$request->depart_addr,
            'destination'=>$request->destination,
            'note'=>$request->note,
            'status_id'=>1,
        ];

        $this->ticketRepository->create($attrs);

    }
}
