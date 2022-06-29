<?php

namespace App;
use App\CompImage;
use Illuminate\Database\Eloquent\Model;

class TravelComp extends Model
{

    protected $guarded = [];

    public function getImages()
    {
        return $this->hasMany(CompImage::class,'comp_id','id');
    }
}
