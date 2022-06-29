<?php

namespace App\Http\Controllers;
use App\TicketStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TicketStatusController extends Controller
{
    private $orderStatus;

    public function __construct(TicketStatus $orderStatus)
    {
        $this->orderStatus=$orderStatus;
    }

    public function index(){
        $data=$this->orderStatus->latest();
        if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
            $data = $data->where('name', 'LIKE', "%{$_GET['search_query']}%");
        }
        $data=$data->paginate(10)->appends(request()->query());
        return view('ticket_status.index',compact('data'));
    }
    public function deleteStatus(Request $request){
        $this->orderStatus->find($request->id)->delete();
    }
    public function updateStatus(Request $request){
        $this->orderStatus->find($request->id)->update([
            'name'=>$request->name,
            'color'=>$request->color
        ]);
    }

    public function addNewStatus(Request $request){
        $this->orderStatus->create([
            'name'=>$request->name,
            'color'=>$request->color
        ]);
    }
}
