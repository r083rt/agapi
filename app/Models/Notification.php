<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public $incrementing = false;
    protected $fillable = ['id','type','data','read_at'];
    public function notifiable(){
        return $this->morphTo();
    }
    public function setDataAttribute($value){
        $this->attributes['data'] = json_encode($value);
    }
    public function getDataAttribute($value){
        return json_decode($value);
    }
}
