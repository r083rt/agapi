<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IslamicStudyCategory extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function islamic_studies(){
        return $this->hasMany(IslamicStudy::class, 'islamic_study_category_id', 'id');
    }
}
