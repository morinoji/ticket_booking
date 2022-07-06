<?php
namespace App\Repositories\comp_repo;

use App\Models\TravelComp;
use App\Repositories\BaseRepository;

class CompRepository extends BaseRepository implements CompRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return TravelComp::class;
    }

    public function injectImage($comps)
    {
        foreach ($comps as $element){
            $image=$this->model->find($element->id)->getImages[0]->image;
            $element->thumb_image=$image;
        }
        return $comps;
    }

    //list sản phẩm kèm paginate
    public function getComp($search,$route)
    {
        if($route==0){
            $comps=$this->model->join('route_details','travel_comps.id','=','route_details.comp_id')->select('travel_comps.*')->where('comp_name','like','%'. $search .'%')->distinct()->latest()->paginate(10);
            return $this->injectImage($comps);
        }else{
            $comps=$this->model->join('route_details','travel_comps.id','=','route_details.comp_id')->select('travel_comps.*')->where('comp_name','like','%'. $search .'%')->distinct()->where('route_id',$route)->latest()->paginate(10);
            return $this->injectImage($comps);
        }
    }

    public function getCompOfRoute($route)
    {
        return $this->model->join('route_details','travel_comps.id','=','route_details.comp_id')->select('travel_comps.*')->where('route_id',$route)->get();
    }

    public function paginate()
    {   $comps=$this->model->latest()->paginate(10);
        return $this->injectImage($comps);
    }

//    public function findWeb($id)
//    {
//        return $this->model->join()
//    }
}
