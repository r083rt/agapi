<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    public function templatable()
    {
        return $this->morphTo();
    }
    //
    public function template_category(){
        return $this->belongsTo('App\Models\TemplateCategory');
    }
    public function module(){
        
    }
}
