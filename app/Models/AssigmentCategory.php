<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssigmentCategory extends Model
{
    //
    protected $fillable = ['name','description'];

    public function assigment_types(){
        return $this->hasMany('App\Models\AssigmentType');
    }
}
