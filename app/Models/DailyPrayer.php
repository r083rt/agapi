<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyPrayer extends Model
{
    //
    public function file(){
        return $this->morphOne('App\Models\File','file');
    }
}
