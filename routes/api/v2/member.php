<?php
use Illuminate\Support\Facades\Route;

// api untuk daftar guru ke aplikasi agpaii digital
Route::post('/register', 'AuthController@register');

Route::group(['middleware' => 'auth:api'], function () {
    // api untuk mendapatkan data user yang sedang login
    Route::get('/me', 'AuthController@getUserAccount');
    // api resources
    Route::resources([
        'post' => 'PostController',
        'post.comment' => 'PostCommentController', // comment post
        'user.post' => 'UserPostController',
        'event' => 'EventController', // untuk acara
        'user.story' => 'UserStoryController', // untuk user story
        'story' => 'StoryController', // untuk story
        'user.gallery' => 'UserGalleryController', // untuk mengambil gallery dari user
        'user.personal-conversation' => 'UserPersonalConversationController', // untuk mengambil conversation chat dari user
        'user.avatar' => 'UserAvatarController',
        'user.push-token' => 'UserPushTokenController', // untuk menyimpan expo push token ke database
        'user.member-card' => 'UserMemberCardController', // untuk generate kartu tanda anggota
        'murottal' => 'MurottalController', // untuk murottal audio
        'daily-prayer' => 'DailyPrayerController', // untuk doa harian
        'post.like' => 'PostLikeController', // untuk like postingan
        'user' => 'UserController', // untuk anggota
        'membership-fee' => 'MembershipFeeController', // untuk membership
        'membership-fee-status' => 'MembershipFeeStatusController', // untuk status membership
    ]);

    Route::get('/personal-conversation/search/{keyword}', 'PersonalConversationController@search');

});
