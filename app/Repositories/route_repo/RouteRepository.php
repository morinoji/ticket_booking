<?php
namespace App\Repositories\route_repo;

use App\Repositories\BaseRepository;
use App\Route;

class RouteRepository extends BaseRepository implements RouteRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Route::class;
    }
    //list tuyến đường kèm paginate
    public function getRoutes($search,$comp)
    {
        if($comp==0){
            $routes=$this->model->leftJoin('route_details','routes.id','=','route_details.route_id')->select('routes.*','route_details.comp_id')->where('route_name','like','%'. $search .'%')->latest('routes.updated_at')->paginate(10);
            return $this->injectImage($routes);
        }else{
            $routes=$this->model->leftJoin('route_details','routes.id','=','route_details.route_id')->select('routes.*','route_details.comp_id')->where('route_name','like','%'. $search .'%')->where('comp_id',$comp)->latest('routes.updated_at')->paginate(10);
            return $this->injectImage($routes);
        }
    }

    public function getPopRoutes()
    {
        return $this->model->where('is_pop',1)->get();
    }

    public function getPopAhead()
    {
        \DB::statement("SET SQL_MODE=''");
        return $this->model->orderBy('is_pop','desc')->paginate(8);
    }
    public function findWeb($id)
    {
       return $this->model->leftJoin('route_details','routes.id','=','route_details.route_id')->where('route_details.route_id',$id)->get();
    }
    public function injectImage($routes)
    {
        foreach ($routes as $element){
            $image=$this->model->find($element->id)->getImages;
            if(count($image)!=0){
                $element->thumb_image=$image[0]->image;
            }else{
                $element->thumb_image='';
            }

        }
        return $routes;
    }
}
