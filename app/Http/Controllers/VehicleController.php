<?php

namespace App\Http\Controllers;

use App\Repositories\vehicle_repo\VehicleRepositoryInterface;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class VehicleController extends Controller
{
    use StorageImageTrait;
    protected $repository;

    public function __construct(VehicleRepositoryInterface $repository)
    {
        $this->repository=$repository;
    }

    public function index(){
        $search='';
        if(isset($_GET['query']) && !empty($_GET['query'])){
            $search=$_GET['query'];
        }
         $vehicles=$this->repository->getVehicle($search);
         return view('vehicles.index',compact('vehicles'));
    }

    public function toAdd(){
        return view('vehicles.add');
    }

    public function create(Request $request){
        $attrs=[
            'vehicle_name'=>$request->name,
            'vehicle_slots'=>$request->slots,
        ];
        $data = $this->storageTraitUpload($request, 'thumb', 'vehicles');
        if (!empty($data)) {
            $attrs['image'] = $data['file_path'];
        } else {
            $attrs['image'] = '';
        }
        $this->repository->create($attrs);
        return redirect()->route('indexVeh');
    }

    public function toUpdate(Request $request){
        $vehicle=$this->repository->find($request->id);
        return view('vehicles.update',compact('vehicle'));
    }

    public function edit($id, Request $request)
    {
        $attrs = [
            'vehicle_name' => $request->name,
            'vehicle_slots' => $request->slots,
        ];
        $data = $this->storageTraitUpload($request, 'thumb', 'vehicles');
        if (!empty($data)) {
            $attrs['image'] = $data['file_path'];
        }
        $this->repository->update($id,$attrs);
        return back();
    }

    public function delete($id)
    {
        try {
$this->repository->delete($id);
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
