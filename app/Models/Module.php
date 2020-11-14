<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Module extends Model
{
    //protected $fillable = ['grade_id','description','is_publish','subject'];
    public function module_contents(){
        return $this->hasMany('App\Models\ModuleContent');
    }
    // public function template(){
    //     return $this->belongsTo('App\Models\Template');
    // }
    public function template(){
        return $this->morphOne('App\Models\Template','template');
    }
    public function likes(){
        return $this->morphMany('App\Models\Like','like');
    }
    public function liked(){
        return $this->morphOne('App\Models\Like','like')->where('user_id', Auth::check() ? Auth::user()->id : 0);
    }
    public function comments(){
        return $this->morphMany('App\Models\Comment','comment');
    }
    public function grade(){
        return $this->belongsTo('App\Models\Grade');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
}
