<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $guarded = ['id'];
    protected $appends = ['size'];

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

    //siapa aja users yang membaca post
    public function readers()
    {
        return $this->morphToMany('App\Models\User', 'read');
    }

    // replace size attribute with human readable size
    public function getSizeAttribute($value)
    {
        $value = (int) $value;
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
        for ($i = 0; $value > 1024; $i++) {
            $value /= 1024;
        }

        return round($value, 2) . ' ' . $units[$i];
    }
}
