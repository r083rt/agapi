<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = ["user_id", "nip", "nik", "contact", "school_place", "home_address", "educational_level_id", "unit_kerja", "nama_kepala_satuan_pendidikan", "nip_kepala_satuan_pendidikan", "gender", "birthdate", "province_id", "city_id", "district_id",'long_bio','short_bio','headmaster_name','headmaster_nip','grade_id','school_status'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function district()
    {
        return $this->belongsTo('App\Models\District');
    }

    public function province()
    {
        return $this->belongsTo('App\Models\Province');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function educational_level(){
        return $this->belongsTo('App\Models\EducationalLevel');
    }
    public function grade(){
        return $this->belongsTo('App\Models\Grade');
    }
}
