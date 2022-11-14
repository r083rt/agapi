<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $guarded = ['id'];

    public function type()
    {
        return $this->morphOne('App\Models\Type', 'type');
    }
    public function fileable()
    {
        return $this->morphTo(__FUNCTION__, 'file_type', 'file_id');
    }

    public function thumbnail()
    {
        return $this->morphOne('App\Models\File', 'file')->where('key', 'thumbnail');
    }
}
