<?php

namespace App\Http\Controllers;

use App\Models\CompImage;
use App\Models\RouteDetail;
use App\Models\WorkingArea;
use App\Repositories\comp_repo\CompRepositoryInterface;
use App\Repositories\route_repo\RouteRepositoryInterface;
use App\Repositories\vehicle_repo\VehicleRepositoryInterface;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class TravelCompController extends Controller
{
    use StorageImageTrait;
    protected $repository;
    protected $route;
    protected $vehicle;
    protected $imageModel;
    protected $areas;
    protected $details;
    public function __construct(CompRepositoryInterface $repository, RouteRepositoryInterface $route, VehicleRepositoryInterface $vehicle, CompImage $imageModel, WorkingArea $areas, RouteDetail $details)
    {
        $this->repository=$repository;
        $this->route=$route;
        $this->vehicle=$vehicle;
        $this->imageModel=$imageModel;
        $this->areas=$areas;
        $this->details=$details;
    }

    public function index(){
        $search='';
        $route='';
        if(isset($_GET['query']) && !empty($_GET['query'])){
            $search=$_GET['query'];
        }
        if(isset($_GET['route']) && !empty($_GET['route'])){
            $route=$_GET['route'];
        }
        $routes=$this->route->getAll();
        $comps=$this->repository->getComp($search,$route);
        return view('travel_comp.index',compact('comps','routes'));
    }

    public function toAdd(){
        $routes=$this->route->getAll();
        $vehicles=$this->vehicle->getAll();
        return view('travel_comp.add',compact('routes','vehicles'));
    }

    public function create(Request $request){
        try {
            \DB::beginTransaction();
            $attrsComp=[
                'comp_name'=>$request->name,
                'description'=>$request->description,
                'color'=>$request->color
            ];
            if ($request->file('logo')!=null) {
                $data = $this->storageTraitUpload($request, 'logo', 'logo-companies');
                $attrsComp['image']=$data['file_path'];
            }

            $comp=$this->repository->create($attrsComp);
            if ($request->file('images')!=null) {
                foreach ($request->images as $element){
                    $data = $this->storageTraitUploadMultiple($element, 'companies/'.$comp->id);
                    $this->imageModel->create([
                        'image'=>$data['file_path'],
                        'comp_id'=>$comp->id
                    ]);
                }
            }

            if($request->areas){
               for($i=0;$i<count($request->areas);$i++){
                   $this->areas->create([
                      'area'=>$request->areas[$i],
                       'description'=>$request->descrs[$i],
                       'comp_id'=>$comp->id
                   ]);
               }
            }

            if($request->routes){
                for($i=0;$i<count($request->routes);$i++){
                    $this->details->create([
                        'route_id'=>$request->routes[$i],
                        'comp_id'=>$comp->id,
                        'depart_time'=>$request->times[$i],
                        'close_time'=>$request->close_times[$i],
                        'frequency'=>$request->frequencies[$i],
                        'price'=>$request->prices[$i],
                        'vehicle'=>$request->vehicles[$i]
                    ]);
                }
            }

            \DB::commit();
            return redirect()->route('indexComp');
        }catch(\Exception $exception){
            \DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
        }

    }

    public function toUpdate($id){
        $comp=$this->repository->find($id);
        $images=$this->imageModel->where('comp_id',$comp->id)->get();
        $areas=$this->areas->where('comp_id',$comp->id)->get();
        $routes=$this->details->where('comp_id',$comp->id)->get();
        $allRoutes=$this->route->getAll();
        $vehicles=$this->vehicle->getAll();

        return view('travel_comp.update',compact('comp','images','areas','routes','allRoutes','vehicles'));
    }

    public function edit(Request $request){
        try {
            \DB::beginTransaction();
            $comp=$this->repository->find($request->id);
            $attrsComp=[
                'comp_name'=>$request->name,
                'description'=>$request->description,
                'color'=>$request->color
            ];
            if ($request->file('logo')!=null) {
                $data = $this->storageTraitUpload($request, 'logo', 'logo-companies');
                File::delete(public_path().$comp->image);
                $attrsComp['image']=$data['file_path'];
            }
            $this->repository->update($request->id,$attrsComp);
            if ($request->file('images')!=null) {
                $images=$this->imageModel->where('comp_id',$request->id)->get();
                foreach ($images as $element){
                    File::delete(public_path().$element->image);
                    $element->delete();
                }
                foreach ($request->images as $element){
                    $data = $this->storageTraitUploadMultiple($element, 'companies/'.$comp->id);
                    $this->imageModel->create([
                        'image'=>$data['file_path'],
                        'comp_id'=>$comp->id
                    ]);
                }
            }

            if($request->areas){
                $this->areas->where('comp_id',$request->id)->delete();
                for($i=0;$i<count($request->areas);$i++){
                    $this->areas->create([
                        'area'=>$request->areas[$i],
                        'description'=>$request->descrs[$i],
                        'comp_id'=>$comp->id
                    ]);
                }
            }

            if($request->routes){
                $this->details->where('comp_id',$request->id)->delete();
                for($i=0;$i<count($request->routes);$i++){
                    $this->details->create([
                        'route_id'=>$request->routes[$i],
                        'comp_id'=>$comp->id,
                        'depart_time'=>$request->times[$i],
                        'close_time'=>$request->close_times[$i],
                        'frequency'=>$request->frequencies[$i],
                        'price'=>$request->prices[$i],
                        'vehicle'=>$request->vehicles[$i]
                    ]);
                }
            }

            \DB::commit();
            return back();
        }catch(\Exception $exception){
            \DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
        }
    }

    public function delete($id)
    {
        try {
            $images=$this->imageModel->where('comp_id',$id)->get();
            $this->areas->where('comp_id',$id)->delete();
            $this->details->where('comp_id',$id)->delete();
            foreach ($images as $element){
                File::delete(public_path().$element->image);
                $element->delete();
            }
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
