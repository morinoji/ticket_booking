<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $guarded = [];
    public function getImages()
    {
        return $this->hasMany(RouteImage::class,'route_id','id');
    }
}
