<?php
namespace App\Repositories\route_repo;

use App\Repositories\BaseRepositoryInterface;

interface RouteRepositoryInterface extends BaseRepositoryInterface
{
    public function getRoutes($search,$comp);
    public function getPopRoutes();
    public function getPopAhead();
    public function findWeb($id);
    public function injectImage($routes);

}
