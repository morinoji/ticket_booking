<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompImage extends Model
{
    protected $guarded = [];
    public function getComp(){
        return $this->hasOne(TravelComp::class);
    }
}
