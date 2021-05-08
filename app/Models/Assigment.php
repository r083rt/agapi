<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assigment extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['user_id', 'teacher_id', 'grade_code', 'grade_id','assigment_category_id','topic','subject','indicator','password','start_at','end_at','description','note','timer','code','is_publish','semester','education_year','name','is_public','ref_id'];

    public function grade(){
        return $this->belongsTo('App\Models\Grade');
    }

    //pembuat soal, bukan pemberi soal ke murid
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    //mengambil teacher (pemberi soal), bukan user (pembuat soal)
    public function teacher(){
        return $this->belongsTo('App\Models\User', 'teacher_id');   
    }

    public function assigment_category(){
        return $this->belongsTo('App\Models\AssigmentCategory');
    }

    public function comments(){
        //return $this->belongsToMany('App\Models\Comment','App\Models\AssigmentComment');
        return $this->morphMany('App\Models\Comment','comment');
    }

    public function likes()
    {
        //return $this->belongsToMany('App\Models\Like', 'App\Models\AssigmentLike')->withPivot('created_at')->withTimestamps();
        return $this->morphMany('App\Models\Like','like');
    }

    public function liked()
    {
       // return $this->belongsToMany('App\Models\Like', 'App\Models\AssigmentLike')->withPivot('created_at')->withTimestamps()->where('user_id', Auth::user()->id);
        return $this->morphOne('App\Models\Like','like')->where('user_id', Auth::check() ? Auth::user()->id : 0);

    }

    public function ratings(){
        //return $this->belongsToMany('App\Models\Rating','App\Models\AssigmentRating');
        return $this->morphMany('App\Models\Rating','rating');

    }

    public function reviews(){
        //return $this->belongsToMany('App\Models\Review','App\Models\AssigmentReview');    
        return $this->morphMany('App\Models\Review','review');

    }

    public function question_lists(){
        return $this->belongsToMany('App\Models\QuestionList','App\Models\AssigmentQuestionList')->withPivot('creator_id','user_id','assigment_type_id');
    }
    
    public function question_lists_select_options_only(){
        return $this->belongsToMany('App\Models\QuestionList','App\Models\AssigmentQuestionList','assigment_id','question_list_id')->withPivot('creator_id','user_id','assigment_type_id')->wherePivotIn('assigment_type_id',\App\Models\AssigmentType::where('description','=','selectoptions')->get()->map(function($data){
            return $data->id;
        }));
    
    }
    

    // public function sessions(){
    //     return $this->morphMany('App\Models\Session','session');
    // }

    public function sessions(){
        return $this->belongsToMany('App\Models\Session','App\Models\AssigmentSession')->withPivot('total_score','user_id');
    }
    public function assigment_sessions(){
        return $this->hasMany('App\Models\AssigmentSession')->orderBy('id','desc');
    }
    public function latest_assigment_session(){
        return $this->hasOne('App\Models\AssigmentSession')->orderBy('id','desc');
    }
    public function assigment_session(){
        return $this->hasOne('App\Models\AssigmentSession','assigment_id')->orderBy('assigment_sessions.id','desc'); //orderBy id DESC agar mengambil data terbaru dari user sekarang
    }
    public function auth_sessions(){
        return $this->belongsToMany('App\Models\Session','App\Models\AssigmentSession','assigment_id','session_id')->withPivot('total_score','user_id')->where('sessions.user_id', Auth::user()->id)->orderBy('sessions.id','desc');
    }
    public function latest_auth_session(){
        return $this->auth_sessions()->limit(1);
    }

  
    // public function 
}
