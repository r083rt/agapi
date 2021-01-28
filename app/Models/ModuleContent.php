<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleContent extends Model
{
    protected $fillable = ['name','value'];
    public function audio(){
        return $this->morphOne(\App\Models\File::class,'file')->where('type','audio/m4a');
    }
}
