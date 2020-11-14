<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    //

    public function post(){
        return $this->belongsTo('App\Models\Post','ad_id','id')->whereHas('ads',function($query){
            $query->where('ad_type','App\Models\Post');
        });
    }
}
