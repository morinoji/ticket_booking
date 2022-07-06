<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Role extends Model
{
    protected $guarded = [];

    public function permissions(){
        return $this->belongsToMany(Permission::class, 'permission_role' , 'role_id' , 'permission_id');
    }
}