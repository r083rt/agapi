<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    //siapa aja users yang membaca post
    public function readers()
    {
        return $this->morphToMany('App\Models\User', 'read');
    }


    public function humanFileSize($size, $precision = 2)
    {
        for ($i = 0; ($size / 1024) > 0.9; $i++, $size /= 1024) {
        }
        return round($size, $precision) . ['B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'][$i];
    }

    // replace size attribute with human readable size
    protected function size(): Attribute
    {
        return new Attribute(
            function ($value) {
                return $this->humanFileSize($value);
            },
            function ($value) {
                return $value;
            }
        );
    }
}
