<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    //

    public function educational_level(){
        return $this->belongsTo('App\Models\EducationalLevel');
    }
}
