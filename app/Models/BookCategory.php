<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    //
    protected $fillable = ["name"];

    public function books(){
        return $this->hasMany('App\Models\Book');
    }
}
