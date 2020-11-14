<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssigmentType extends Model
{
    //
    public function scopeSelectoptions($query){
        $query->where('description','=','selectoptions');
    }
}
