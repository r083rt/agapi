<?php
use Illuminate\Support\Facades\Route;

// api untuk mendapatkan data user yang sedang login
Route::get('/me', 'AuthController@getUserAccount');
// api untuk daftar guru ke aplikasi agpaii digital
Route::post('/register', 'AuthController@register');
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
]);

Route::get('/personal-conversation/search/{keyword}', 'PersonalConversationController@search');
