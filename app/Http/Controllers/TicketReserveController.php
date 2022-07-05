<?php

namespace App\Http\Controllers;

use App\Repositories\comp_repo\CompRepositoryInterface;
use App\Repositories\route_repo\RouteRepositoryInterface;
use App\Repositories\ticket_repo\TicketRepositoryInterface;
use App\TicketStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TicketReserveController extends Controller
{
    protected $ticketRepository;
    protected $routeRepository;
    protected $compRepository;

    public function __construct(TicketRepositoryInterface $ticketRepository, RouteRepositoryInterface $routeRepository, CompRepositoryInterface $compRepository)
    {
        $this->ticketRepository=$ticketRepository;
        $this->routeRepository=$routeRepository;
        $this->compRepository=$compRepository;
    }

    public function index(){
        $routes=$this->routeRepository->getAll();

        $search='';
        $dateRange='';
        $status=0;
        $route='';
        if(isset($_GET['search_query']) && !empty($_GET['search_query'])){
            $search=$_GET['search_query'];
        }
        if(isset($_GET['date_range']) && !empty($_GET['date_range'])){
            $dateRange=$_GET['date_range'];
        }
        if(isset($_GET['status']) && !empty($_GET['status'])){
            $status=$_GET['status'];
        }
        if(isset($_GET['route']) && !empty($_GET['route'])){
            $route=$_GET['route'];
        }
        $ticket=$this->ticketRepository->getTickets($search,$dateRange,$status, $route);
        $data=$ticket['data'];
        $statuses=$ticket['statuses'];
        $datePicked=$ticket['datePicked'];
        $statusText=$ticket['statusText'];
        $searchText=$ticket['searchText'];

        return view('tickets.index',compact('data','statuses','datePicked','statusText','searchText'));
    }

    public function getComps(Request $request){
        $comps=$this->compRepository->getCompOfRoute($request->route);
        return $comps;
    }

    public function toAdd(){
       $routes= $this->routeRepository->getAll();
       $comps= $this->compRepository->getCompOfRoute($routes[0]->id);
        return view('tickets.add',compact('routes','comps'));
    }

    public function create(Request $request){
        $attrs=[
          'route_id'=>$request->route,
          'comp_id'=>$request->comp,
          'full_name'=>$request->name,
          'phone'=>$request->phone_number,
          'email'=>$request->email,
          'guest_number'=>$request->guest,
          'depart_datetime'=>$request->depart_time,
          'depart_address'=>$request->depart_address,
          'destination'=>$request->destination,
          'note'=>$request->note,
          'status_id'=>1,
        ];

        $this->ticketRepository->create($attrs);
        return redirect()->route('indexTicket');
    }

    public function changeStatus(Request $request){
        $this->ticketRepository->update($request->id,[
            'status_id'=>$request->status
        ]);
    }

    public function update(Request $request){
        $routes= $this->routeRepository->getAll();
        $comps= $this->compRepository->getCompOfRoute($routes[0]->id);
        $data=$this->ticketRepository->find($request->id);
        $statuses=TicketStatus::all();
        return view('tickets.update',compact('routes','comps','data','statuses'));
    }

    public function edit($id,Request $request){
        $attrs=[
            'route_id'=>$request->route,
            'comp_id'=>$request->comp,
            'full_name'=>$request->name,
            'phone'=>$request->phone_number,
            'email'=>$request->email,
            'guest_number'=>$request->guest,
            'depart_datetime'=>$request->depart_time,
            'depart_address'=>$request->depart_address,
            'destination'=>$request->destination,
            'note'=>$request->note,

        ];

        $this->ticketRepository->update($id,$attrs);
        return back();
    }


    public function delete(Request $request)
    {
        try {
            $this->ticketRepository->delete($request->id);
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
