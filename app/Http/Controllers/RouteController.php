<?php

namespace App\Http\Controllers;

use App\RelatedRoute;
use App\Repositories\comp_repo\CompRepositoryInterface;
use App\Repositories\route_repo\RouteRepositoryInterface;
use App\RouteImage;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class RouteController extends Controller
{
    use StorageImageTrait;

    protected $CompRepository;
    protected $RouteRepository;
    protected $images;
    protected $related;

    public function __construct(CompRepositoryInterface $CompRepository, RouteRepositoryInterface $RouteRepository, RouteImage $routeImage, RelatedRoute $related){
        $this->CompRepository=$CompRepository;
        $this->RouteRepository=$RouteRepository;
        $this->images=$routeImage;
        $this->related=$related;
    }

    public function index(){
        $comps=$this->CompRepository->getAll();
        $search='';
        $comp=0;
        if(isset($_GET['query']) && !empty($_GET['query'])){
            $search=$_GET['query'];
        }
        if(isset($_GET['comp']) && !empty($_GET['comp'])){
            $comp=$_GET['comp'];
        }
        $routes=$this->RouteRepository->getRoutes($search, $comp);

        return view('route.index',compact('comps','routes'));
    }

    public function toAdd(){
        $routes=$this->RouteRepository->getAll();
        return view('route.add',compact('routes'));
    }

    public function create(Request $request){

        try {
            \DB::beginTransaction();
            $detail='';
            $attrs=[
                'route_name'=>$request->name,
                'distance'=>$request->distance,
                'time'=>$request->time,
                'description'=>$request->description,
                'is_pop'=>$request->is_pop?'1': '0'
            ];


            if(!empty($request->routes)){
                foreach ($request->routes as $element){
                    $detail.=$element.',';
                }
            }
            $attrs['detail'] = trim($detail,',');
            $route=$this->RouteRepository->create($attrs);
            if($request->relatedRoutes){
                $this->related->where('main_route',$route->id)->delete();
                for($i=0;$i<count($request->relatedRoutes);$i++){
                    $this->related->create([
                        'main_route'=>$route->id,
                        'related_route'=>$request->relatedRoutes[$i],
                    ]);
                }
            }
            if ($request->file('images')!=null) {
                foreach ($request->images as $element){
                    $data = $this->storageTraitUploadMultiple($element, 'routes/'.$route->id);
                    $this->images->create([
                        'image'=>$data['file_path'],
                        'route_id'=>$route->id
                    ]);
                }
            }
            \DB::commit();
            return redirect()->route('indexRoute');
        }catch(\Exception $exception){
            \DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
        }

    }

    public function toUpdate(Request $request){
        $array=[];
        $route=$this->RouteRepository->find($request->id);
        $routes=$this->RouteRepository->getAll();
        $detail=explode(',',$route->detail);
        $images=$this->images->where('route_id',$request->id)->get();
        $related=$this->related->where('main_route',$request->id)->get();
        foreach ($related as $element){
            array_push($array, $element->related_route);
        }

        return view('route.update',compact('route','detail','images','routes','array'));
    }

    public function edit($id, Request $request)
    {
        $attrs=[
            'route_name'=>$request->name,
            'distance'=>$request->distance,
            'time'=>$request->time,
            'description'=>$request->description,
            'is_pop'=>$request->is_pop?'1': '0'
        ];
        $data = $this->storageTraitUpload($request, 'image', 'route');
        $detail='';
        if (!empty($data)) {
            $attrs['image'] = $data['file_path'];
        }

        if(!empty($request->routes)){
            foreach ($request->routes as $element){
                $detail.=$element.',';
            }
        }
        $attrs['detail'] = trim($detail,',');
        $route=$this->RouteRepository->update($id,$attrs);
        if($request->relatedRoutes){
            $this->related->where('main_route',$route->id)->delete();
            for($i=0;$i<count($request->relatedRoutes);$i++){
                $this->related->create([
                    'main_route'=>$route->id,
                    'related_route'=>$request->relatedRoutes[$i],

                ]);
            }
        }
        if ($request->file('images')!=null) {
            $images=$this->images->where('route_id',$request->id)->get();
            foreach ($images as $element){
                File::delete(public_path().$element->image);
                $element->delete();
            }
            foreach ($request->images as $element){
                $data = $this->storageTraitUploadMultiple($element, 'routes/'.$route->id);
                $this->images->create([
                    'image'=>$data['file_path'],
                    'route_id'=>$route->id
                ]);
            }
        }
        return back();
    }

    public function delete($id)
    {
        try {
            $this->RouteRepository->delete($id);
            $this->related->where('main_route',$id)->delete();
            $images=$this->images->where('route_id',$id)->get();
            foreach ($images as $element){
                File::delete(public_path().$element->image);
                $element->delete();
            }
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
