<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //

    public function profiles(){
    	return $this->hasMany('App\Models\Profile');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User','profiles');
    }
}
