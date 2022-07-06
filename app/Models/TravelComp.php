<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TravelComp extends Model
{

    protected $guarded = [];

    public function getImages()
    {
        return $this->hasMany(CompImage::class,'comp_id','id');
    }

    public function getAreas()
    {
        return $this->hasMany(WorkingArea::class,'comp_id','id');
    }

    public function getDetails()
    {
        return $this->hasMany(RouteDetail::class,'comp_id','id');
    }
}
