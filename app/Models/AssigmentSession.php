<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class AssigmentSession extends Model
{
    //
    protected $fillable = ['assigment_id','session_id','user_id','total_score'];

    public function assigment(){
        return $this->belongsTo('App\Models\Assigment');
    }

    public function session(){
        return $this->belongsTo('App\Models\Session');
    }
    public function latest_session(){
        return $this->belongsTo('App\Models\Session','session_id')->where('sessions.user_id', Auth::user()->id);
    }
    public function teacher(){
        return $this->belongsTo('App\Models\User', 'user_id');   
    }
}
