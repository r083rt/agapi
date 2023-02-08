<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function document_results()
    {
        return $this->morphMany('App\Models\File', 'file')->where('key', 'document_result');
    }

    public function quiz_results()
    {
        return $this->belongsToMany('App\Models\Assigment', 'task_assigments', 'task_id', 'assigment_id');
    }
}
