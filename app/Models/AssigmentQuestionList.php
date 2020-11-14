<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssigmentQuestionList extends Model
{
    //
  
    public function assigment_type(){
        return $this->belongsTo('App\Models\AssigmentType');
    }

    public function creator(){
        return $this->belongsTo('App\Models\User');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function assigment(){
        return $this->belongsTo('App\Models\Assigment');
    }
    public function assigment_type_selectoptions_only(){
        return $this->belongsTo('App\Models\AssigmentType','assigment_type_id')->where('description','=','selectoptions');
    }
}   
