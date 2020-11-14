<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemplateCategory extends Model
{
    public function users()
    {
        return $this->morphToMany('App\Models\User','bookmark');
    }
    
}
