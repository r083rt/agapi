<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //
    protected $guarded = ['id'];

    public function cities(){
    	return $this->hasMany('App\Models\City');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User','profiles');
    }
}
