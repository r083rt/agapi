<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = ['user_id','book_category_id','title','description'];

    public function book_category(){
        return $this->belongsTo('App\Models\BookCategory');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
