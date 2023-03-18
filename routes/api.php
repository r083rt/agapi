<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Like;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\LessonPlan;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware([
    'auth:api',
    'expired',
    // 'verified'
])->get('/user', function (Request $request) {
    $query = $request->query("exclude");

    $loads=[
        //'bank_account',
        'pns_status',
        'role',
        'bookmark_posts' => function($query){
            $query->with([
                'files',
                'authorId.profile',
                'comments',
                'comments.user',
                'likes',
            ]);
        },
        'posts'=>function($query){
            $query->with([
                'likes', 'liked'
            ])->withCount('likes', 'liked')
            ->orderBy('created_at', 'desc');
        },
        'posts.meeting_rooms',
        'posts.events',
        'posts.files',
        'posts.authorId.role',
        'posts.authorId.profile',
        'posts.comments',
        'posts.comments.user',
        'posts.likes',
        'profile.district',
        'profile.province',
        'profile.city',
        'profile.educational_level',
        'payments' => function ($query) {
            $query->where('status', 'success');
        },
        'events' => function ($query) {
            $query->orderBy('created_at', 'desc');
        },
        'events.users',
        'guest_events' => function ($query) {
            $query->orderBy('created_at', 'desc');
        },
        'lesson_plans' => function ($query) {
            $query
                ->withCount('likes', 'comments')
                ->orderBy('created_at', 'desc');
        },
        'lesson_plans.user',
        'lesson_plans.contents',
        'lesson_plans.grade',
        'lesson_plans.cover',
        'lesson_plans.template',
        //'lesson_plan_guided_users',
        'follows.lesson_plans.cover',
        'follower',
        'lesson_plans'=>function($query){
            $query
            ->orderBy('created_at','desc')
            ->with([
                'user.profile',
                'contents',
                'grade',
                'likes',
                'comments' => function($query){
                    $query
                    ->with('likes', 'liked')
                    ->withCount('likes', 'liked')
                    ->orderBy('created_at', 'desc');
                },
                'reviews' => function($query){
                    $query->orderBy('created_at','desc');
                },
                'reviews.user',
                'comments.user',
                'ratings',
                'cover'
            ])
            ->withCount([
                'likes',
                'liked',
                'comments',
                'reviews',
                'ratings as ratings_value_count'=>function($query){
                    $query->select(DB::raw('SUM(value)'));
            },
                'rated as rated_value_count'=>function($query){
                    $query->select(DB::raw('SUM(value)'));
            }]);
        },
        'books' => function($query){
            $query->with(['user','book_category']);
        },
        'appreciations'
    ];

    //membuang relasi yang diexclude'kan
    if(!empty($query)){
        $excludes = explode(',',$query);
        foreach($loads as $key=>$load){
            $relation_name = preg_match('/^[0-9]+$/',$key)?$load:$key;
            foreach($excludes as $exclude){
                if(preg_match("/^".preg_quote($exclude)."/i",$relation_name)){
                    unset($loads[$key]);
                }
            }
        }
    }

//    return $loads;
$userId = $request->user()->id;

    $res = \App\Models\User::find($userId)
        ->load($loads)
        ->loadCount([
            'lesson_plans',
            'lesson_plans_likes',
            'lesson_plans_ratings',
            //'lesson_plan_guided_users',
            // 'lesson_plans_comments',
            'books',
            'question_lists'
        ]);
    $lesson_plans_my_likes_count = Like::where('like_type','=','App\Models\LessonPlan')->where('user_id', Auth::user()->id)->count();
    $lesson_plans_my_ratings_count = Rating::where('rating_type','=','App\Models\LessonPlan')->where('user_id', Auth::user()->id)->count();
    $lesson_plans_comments_count = Comment::where('comment_type','=','App\Models\LessonPlan')->where('user_id',Auth::user()->id)->count();
    $lesson_plans_comments = Comment::where('comment_type','=','App\Models\LessonPlan')->where('user_id',Auth::user()->id)->get();
    $res->lesson_plans_my_likes_count = $lesson_plans_my_likes_count;
    $res->lesson_plans_my_ratings_count = $lesson_plans_my_ratings_count;
    $res->lesson_plans_comments_count = $lesson_plans_comments_count;
    $res->lesson_plans_comment = $lesson_plans_comments;
    return $res;
});


Route::group(['namespace'=>'API\\v1'],function(){
    // API WITHOUT SECURITY ----------------------------------------------------------------------------
    Route::get('/auth/assigment',function(Request $request){ // GET USER AUTH FOR ASSIGMENT APPS
        return $request->user();
    });

    Route::get('/auth/lessonplan',function(Request $request){ // GET USER AUTH FOR RPP APPS
        return $request->user();
    });

    Route::get('/auth/kta',function(Request $request){ // GET USER AUTH FOR KTA APPS
        return $request->user();
    });

    Route::apiResources([
        'settings' => 'SettingController'
    ]);

    Route::post('/register', 'UserController@register'); // FOR REGISTER PURPOSE

    Route::post('/payment/notification/handler', 'PaymentController@notificationHandler'); // PAYMENT NOTIFICATION HANDLER

    Route::post('/payment/notification/queuehandler', 'PaymentController@notificationQueueHandler'); // NOT FOR PRODUCTION NOTIFICATION HANDLER WITH QUEUE

    Route::get('/payment/notification/test/{id}', 'PaymentController@test'); // TEST PAYMENT NOTIFICATION

    Route::get('/lessonplans/download/{id}', 'LessonPlanController@download'); // DOWNLOAD RPP

    // END API WITHOUT SECURITY ------------------------------------------------------------------------
});

Route::middleware('checkWhiteListIp')->post('/paymenthandler', [App\Http\Controllers\API\v1\PaymentController::class,'paymentHandler']);
//test

