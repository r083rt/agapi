<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $guarded = ['id'];

    public function districts(){
    	return $this->hasMany('App\Models\District');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User','profiles');
    }
}
