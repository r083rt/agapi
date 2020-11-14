<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function posts()
    {
        return $this->morphedByMany('App\Models\Post', 'report');
    }
    public function reportable()
    {
        return $this->morphTo();
    }
}
