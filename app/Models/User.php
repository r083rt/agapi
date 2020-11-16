<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens,HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'kta_id', 'user_activated_at', 'avatar', 'role_id',
        'point'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function payment()
    {
        return $this->morphOne('App\Models\Payment','payment');
    }

    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }

    public function payments()
    {
        return $this->morphMany('App\Models\Payment','payment');
    }

    public function guest_events()
    {
        return $this->belongsToMany('App\Models\Event', 'event_guests', 'user_id', 'event_id')->withTimeStamps();
    }

    public function events()
    {
        return $this->hasMany('App\Models\Event');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function lesson_plans()
    {
        return $this->hasMany('App\Models\LessonPlan');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'author_id', 'id');
    }

    // public function lesson_plans_likes(){
    //     return $this->hasManyThrough('App\Models\LessonPlanLike','App\Models\LessonPlan')->whereHas('like',function($query){
    //         $query->where('user_id','!=',Auth::user()->id);
    //     });
    // }
    public function lesson_plans_likes(){
       return $this->hasManyThrough('App\Models\Like','App\Models\LessonPlan','user_id','like_id')->where('like_type','=','App\Models\LessonPlan')->where('likes.user_id','!=',Auth::user()->id);

    }
    public function lesson_plans_likes_without_auth(){
        return $this->hasManyThrough('App\Models\Like','App\Models\LessonPlan','user_id','like_id')->where('like_type','=','App\Models\LessonPlan');
 
     }

    // public function lesson_plans_ratings(){
    //     return $this->hasManyThrough('App\Models\LessonPlanRating','App\Models\LessonPlan')->whereHas('rating',function($query){
    //         $query->where('user_id','!=',Auth::user()->id);
    //     });
    // }
    public function lesson_plans_ratings(){
        return $this->hasManyThrough('App\Models\Rating','App\Models\LessonPlan','user_id','rating_id')->where('ratings.user_id','!=',Auth::user()->id);
    }

    public function lesson_plans_my_likes(){
        return $this->hasManyThrough('App\Models\LessonPlanLike','App\Models\LessonPlan')->whereHas('like',function($query){
            $query->where('user_id',Auth::user()->id);
        });
    }

    public function lesson_plans_my_ratings(){
        return $this->hasManyThrough('App\Models\LessonPlanRating','App\Models\LessonPlan')->whereHas('rating',function($query){
            $query->where('user_id',Auth::user()->id);
        });
    }

    public function lesson_plans_comments(){
        return $this->hasManyThrough('App\Models\LessonPlanComment','App\Models\LessonPlan');
    }

    public function books(){
        return $this->hasMany('App\Models\Book');
    }

    public function main_chats(){
        return $this->belongsToMany('App\Models\Chat','main_chats')->withPivot('isAdmin');
    }

    public function chat_channels(){
        return $this->belongsToMany('App\Models\Channel','chat_channels');
    }

    public function ratings(){
        return $this->hasMany('App\Models\Rating');
    }

    public function lesson_plan_guided_users(){
        return $this->belongsToMany('App\Models\User','lesson_plan_guided_users','parent_id','child_id')->withTimestamps();
    }

    public function lesson_plan_guided_parent(){
        return $this->belongsTo('App\Models\LessonPlanGuidedUser','id','parent_id');
    }

    public function follows(){
        return $this->belongsToMany('App\Models\User','follows','parent_id','child_id')->withTimestamps();
    }

    public function follower(){
        return $this->belongsToMany('App\Models\User','follows','child_id','parent_id')->withTimestamps();
    }

    public function lesson_plan_guided_child(){
        return $this->belongsTo('App\Models\LessonPlanGuidedUser','id','child_id');
    }

    public function assigments(){
        return $this->hasMany('App\Models\Assigment');
    }

    public function given_assigments(){
        return $this->hasMany('App\Models\Assigment','teacher_id','id');
    }

    public function publish_assigments(){
        //return $this->hasMany('App\Models\Assigment')->where('is_publish',true);
        return $this->hasMany('App\Models\Assigment')->where('is_publish',true)->whereNull('teacher_id');
    }

    public function unpublish_assigments(){
        //return $this->hasMany('App\Models\Assigment')->where('is_publish',false);
        return $this->hasMany('App\Models\Assigment')->where('is_publish',false)->whereNull('teacher_id');
    }

    public function bookmark_posts(){
        return $this->morphedByMany('App\Models\Post','bookmark');
    }

    public function sessions(){
        return $this->hasMany('App\Models\Session');
    }

    public function assigment_sessions(){
        return $this->hasMany('App\Models\AssigmentSession');
    }
    public function modules(){
        return $this->hasMany('App\Models\Module');
    }
    /////modul////
    public function templates(){
        return $this->belongsToMany('App\Models\Template','user_templates','user_id','template_id');
    }
    public function template_categories(){
        return $this->morphedByMany('App\Models\TemplateCategory','bookmark');
    }

    public function question_lists(){
        return $this->belongsToMany('App\Models\QuestionList','assigment_question_lists','creator_id','question_list_id');
    }
    public function posts_have_read(){
        return $this->morphToMany('App\Models\Post','read');
    }
    // public function notifications(){
    //     return $this->morphMany('App\Models\Notification','notifiable');
    // }
    public function pns_status(){
        return $this->hasOne('App\Models\PnsStatus');
    }
    public function bank_account(){
        return $this->hasOne('App\Models\BankAccount');
    }
    public function questionnary_sessions(){
        return $this->hasManyThrough('App\Models\QuestionnarySession','App\Models\Session');
    }
    public function documents(){
        return $this->hasManyThrough('App\Models\File','App\Models\Post','author_id','file_id')->where('file_type','App\Models\Post')->where('files.value','document');
    }
}