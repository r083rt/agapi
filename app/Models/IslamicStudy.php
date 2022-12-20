<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class IslamicStudy extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function category(){
        return $this->belongsTo(IslamicStudyCategory::class, 'islamic_study_category_id', 'id');
    }

    public function thumbnail(){
        return $this->morphOne(File::class, 'file')->where('key', 'thumbnail_islamic_study')->orderBy('id', 'desc');
    }

    public function content(){
        return $this->morphOne(File::class, 'file')->where('key', 'content_islamic_study')->orderBy('id', 'desc');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
