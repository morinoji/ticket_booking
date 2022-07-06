<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Repositories\comp_repo\CompRepositoryInterface;
use App\Repositories\route_repo\RouteRepositoryInterface;

class HomeController extends Controller
{
    protected $routeRepo;
    protected $compRepo;

    public function __construct(RouteRepositoryInterface $routeRepository, CompRepositoryInterface $compRepository)
    {
        $this->routeRepo=$routeRepository;
        $this->compRepo=$compRepository;
    }

    public function index(){
        $sliders=Slider::all();
        if(isset($_GET['query-route']) && !empty($_GET['query-route'])){
            $is_route=true;
            $search=$_GET['query-route'];
            $results=$this->routeRepo->getRoutes($search,0);
            return view('client.search.results',compact('results','sliders','search','is_route'));
        }else if(isset($_GET['query-comp']) && !empty($_GET['query-comp'])){
            $is_route=false;
            $search=$_GET['query-comp'];
            $results=$this->compRepo->getComp($search,0);
            return view('client.search.results',compact('results','sliders','search','is_route'));
        }else{

            $popRoutes=$this->routeRepo->getPopRoutes();
            $comps=$this->compRepo->getAll();
            return view('client.home.index',compact('sliders','popRoutes','comps'));
        }
    }

    public function changeLanguage($language)
    {
        \Session::put('website_language', $language);
        return redirect()->back();
    }
}
