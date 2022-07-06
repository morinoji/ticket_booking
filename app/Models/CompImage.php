<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class CompImage extends Model implements Auditable
{
    protected $guarded = [];

    public function getComp(){
        return $this->hasOne(TravelComp::class);
    }
}
