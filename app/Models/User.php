<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;
// soft delete
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password', 'kta_id', 'user_activated_at', 'avatar', 'role_id',
        'point', 'expired_at',
    ];

    protected $dates = [
        'user_activated_at',
    ];

    // appends age
    protected $appends = [
        'age',
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


    public function files()
    {
        return $this->morphMany('App\Models\File', 'file');
    }

    public function votable()
    {
        return $this->hasOne('App\Models\Votable');
    }

    public function votes()
    {
        return $this->belongsToMany('App\Models\Candidate', 'votes', 'user_id', 'candidate_id')->withPivot('created_at', 'votable_id');
    }

    public function banner()
    {
        return $this->morphOne('App\Models\File', 'file')->where('key','banner')->orderBy('id', 'desc');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
        // return $this->morphOne('App\Models\Payment', 'payment');
    }

    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }

    public function payments()
    {
        return $this->hasMany('App\Models\Payment');
        // return $this->morphMany('App\Models\Payment', 'payment');
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
    public function lesson_plans_likes()
    {
        return $this->hasManyThrough('App\Models\Like', 'App\Models\LessonPlan', 'user_id', 'like_id')->where('like_type', '=', 'App\Models\LessonPlan')->where('likes.user_id', '!=', Auth::user()->id);
    }
    public function lesson_plans_likes_without_auth()
    {
        return $this->hasManyThrough('App\Models\Like', 'App\Models\LessonPlan', 'user_id', 'like_id')->where('like_type', '=', 'App\Models\LessonPlan');
    }

    // public function lesson_plans_ratings(){
    //     return $this->hasManyThrough('App\Models\LessonPlanRating','App\Models\LessonPlan')->whereHas('rating',function($query){
    //         $query->where('user_id','!=',Auth::user()->id);
    //     });
    // }
    public function lesson_plans_ratings()
    {
        return $this->hasManyThrough('App\Models\Rating', 'App\Models\LessonPlan', 'user_id', 'rating_id')->where('ratings.user_id', '!=', Auth::user()->id);
    }

    public function lesson_plans_my_likes()
    {
        return $this->hasManyThrough('App\Models\LessonPlanLike', 'App\Models\LessonPlan')->whereHas('like', function ($query) {
            $query->where('user_id', Auth::user()->id);
        });
    }

    public function lesson_plans_my_ratings()
    {
        return $this->hasManyThrough('App\Models\LessonPlanRating', 'App\Models\LessonPlan')->whereHas('rating', function ($query) {
            $query->where('user_id', Auth::user()->id);
        });
    }

    public function lesson_plans_comments()
    {
        return $this->hasManyThrough('App\Models\LessonPlanComment', 'App\Models\LessonPlan');
    }

    public function books()
    {
        return $this->hasMany('App\Models\Book');
    }

    public function main_chats()
    {
        return $this->belongsToMany('App\Models\Chat', 'main_chats')->withPivot('isAdmin');
    }

    public function chat_channels()
    {
        return $this->belongsToMany('App\Models\Channel', 'chat_channels');
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }

    public function lesson_plan_guided_users()
    {
        return $this->belongsToMany('App\Models\User', 'lesson_plan_guided_users', 'parent_id', 'child_id')->withTimestamps();
    }

    public function lesson_plan_guided_parent()
    {
        return $this->belongsTo('App\Models\LessonPlanGuidedUser', 'id', 'parent_id');
    }

    public function follows()
    {
        return $this->belongsToMany('App\Models\User', 'follows', 'parent_id', 'child_id')->withTimestamps();
    }

    public function follower()
    {
        return $this->belongsToMany('App\Models\User', 'follows', 'child_id', 'parent_id')->withTimestamps();
    }

    public function lesson_plan_guided_child()
    {
        return $this->belongsTo('App\Models\LessonPlanGuidedUser', 'id', 'child_id');
    }

    public function assigments()
    {
        return $this->hasMany('App\Models\Assigment');
    }

    public function given_assigments()
    {
        return $this->hasMany('App\Models\Assigment', 'teacher_id', 'id');
    }

    public function publish_assigments()
    {
        //return $this->hasMany('App\Models\Assigment')->where('is_publish',true);
        return $this->hasMany('App\Models\Assigment')->where('is_publish', true)->whereNull('teacher_id');
    }

    public function unpublish_assigments()
    {
        //return $this->hasMany('App\Models\Assigment')->where('is_publish',false);
        return $this->hasMany('App\Models\Assigment')->where('is_publish', false)->whereNull('teacher_id');
    }
    public function comment()
    {
        return $this->hasOne('App\Models\Comment');
    }
    public function bookmark_posts()
    {
        return $this->morphedByMany('App\Models\Post', 'bookmark');
    }

    public function sessions()
    {
        return $this->hasMany('App\Models\Session');
    }

    public function assigment_sessions()
    {
        return $this->hasMany('App\Models\AssigmentSession');
    }
    public function modules()
    {
        return $this->hasMany('App\Models\Module');
    }
    /////modul////
    public function templates()
    {
        return $this->belongsToMany('App\Models\Template', 'user_templates', 'user_id', 'template_id');
    }
    public function template_categories()
    {
        return $this->morphedByMany('App\Models\TemplateCategory', 'bookmark');
    }

    public function question_lists()
    {
        return $this->belongsToMany('App\Models\QuestionList', 'assigment_question_lists', 'creator_id', 'question_list_id');
    }
    public function posts_have_read()
    {
        return $this->morphToMany('App\Models\Post', 'read');
    }
    // public function notifications(){
    //     return $this->morphMany('App\Models\Notification','notifiable');
    // }
    public function pns_status()
    {
        return $this->hasOne('App\Models\PnsStatus');
    }
    public function bank_account()
    {
        return $this->hasOne('App\Models\BankAccount');
    }
    public function questionnary_sessions()
    {
        return $this->hasManyThrough('App\Models\QuestionnarySession', 'App\Models\Session');
    }
    public function documents()
    {
        return $this->hasManyThrough('App\Models\File', 'App\Models\Post', 'author_id', 'file_id')->where('file_type', 'App\Models\Post')->where('files.value', 'document');
    }
    public function appreciations()
    {
        return $this->belongsToMany(\App\Models\Appreciation::class, 'user_appreciations')->orderBy('id', 'asc');
    }
    public function conversations()
    {
        return $this->belongsToMany(\App\Models\Conversation::class, 'user_conversations')->orderBy('id', 'asc')->withPivot('is_admin', 'is_archived', 'is_muted', 'is_accepted')->withTimestamps();
    }
    public function getTodayPendingPayment()
    {
        $date_now = date('Y-m-d');
        return $this->payments()->where('status', 'pending')->where('master_payment_id', '!=', null)->whereDate('created_at', $date_now);
    }
    public function rooms()
    {
        return $this->belongsToMany('App\Models\Room', 'user_rooms', 'user_id', 'room_id')->withPivot('is_admin');
    }
    public function receivesBroadcastNotificationsOn()
    {
        return 'notification.' . $this->id;
    }
    public function balance()
    {
        // $payments_in = $this->payments()->where('type','IN')
        // ->whereHas('necessary', function($query){
        //     $query->where('necessaries.name','topup');
        // })->where('status','success')->sum('value');
        $payments_in = $this->payments()->where('type', 'IN')
            ->whereNotNull('necessary_id')->where('status', 'success')->sum('value');
        $payments_out = $this->payments()->where('type', 'OUT')
            ->has('purchased_item')
            ->sum('value');
        return $payments_in - $payments_out;
    }

    public function isExpired()
    {
        $user_activated_at = $this->user_activated_at;
        $diffMonth = \Carbon\Carbon::now()->diffInMonths($user_activated_at);
        return $diffMonth > 6;
    }
    public function age()
    {
        $birthdate = new \Carbon\Carbon($this->profile->birthdate);
        $now = \Carbon\Carbon::now();
        return $now->diffInYears($birthdate);
    }
    /*
    user dapat merakit soal premium jika:
    1. memiliki minimal 1 butir soal yang masuk kualifikasi

    #nilai is_paid
    # NULL belum dicek (tidak masuk kualifikasi)
    # -1 tahap konfirmasi mau dijadikan berbayar atau tidak
    # 0 terkonfirmasi TIDAK terbayar. TIDAK usah dilakukan pengecekan lgi
    # >0 terkonfirmasi terbayar. TIDAK usah dilakukan pengecekan lagi
     */
    public function canCreatePremiumAssigment()
    {
        $query = $this->question_lists()->whereNull('ref_id')->where(function ($query2) {
            $query2->where('is_paid', [-1, 0, 1]);
        });
        if ($query->exists()) {
            return true;
        } else {
            $query = $this->assigments()->whereNull('ref_id')->where(function ($query) {
                $query->where('is_paid', '>=', 0)->orWhere('is_paid', -1);
            });
            if ($query->exists()) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function departments()
    {
        return $this->hasMany('App\Models\Department');
    }

    public function kongres_2022_surat_mandat()
    {
        return $this->morphOne('App\Models\File', 'fileable')->where('key', 'kongres_2022_surat_mandat');
    }

    public function getAgeAttribute()
    {
        if(!$this->profile){
            return null;
        }
        $birthdate = new \Carbon\Carbon($this->profile->birthdate);
        $now = \Carbon\Carbon::now();
        return $now->diffInYears($birthdate);
    }

    public function front_membercard()
    {
        return $this->morphOne('App\Models\File', 'file')->where('key', 'front_membercard');
    }

    public function back_membercard()
    {
        return $this->morphOne('App\Models\File', 'file')->where('key', 'back_membercard');
    }
}
