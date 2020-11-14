<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //

    public function type(){
        return $this->morphOne('App\Models\Type','type');
    }
    public function fileable(){
        return $this->morphTo(__FUNCTION__, 'file_type', 'file_id');
    }
}
