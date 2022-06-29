<?php
namespace App\Repositories\comp_repo;

use App\Repositories\BaseRepositoryInterface;

interface CompRepositoryInterface extends BaseRepositoryInterface
{
    public function getComp($search,$route);
    public function injectImage($comps);
    public function getCompOfRoute($route);

}
