<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Murottal extends Model
{
    //
    public function file(){
        return $this->morphOne('App\Models\File','file');
    }
}
