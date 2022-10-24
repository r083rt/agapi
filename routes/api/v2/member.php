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
        'post.like' => 'PostLikeController', // untuk like postingan
        'post.read' => 'PostReadController', // untuk mengambil post yang sudah dibaca
        'personal-conversation' => 'PersonalConversationController', // untuk mengelola pesan pribadi
        'event' => 'EventController', // untuk acara
        'story' => 'StoryController', // untuk story
        'user' => 'UserController', // untuk anggota
        'user.story' => 'UserStoryController', // untuk user story
        'user.post' => 'UserPostController',
        'user.profile' => 'UserProfileController',
        'user.gallery' => 'UserGalleryController', // untuk mengambil gallery dari user
        'user.album' => 'UserAlbumController', // untuk album
        'user.personal-conversation' => 'UserPersonalConversationController', // untuk mengambil conversation chat dari user
        'user.avatar' => 'UserAvatarController',
        'user.push-token' => 'UserPushTokenController', // untuk menyimpan expo push token ke database
        'user.member-card' => 'UserMemberCardController', // untuk generate kartu tanda anggota
        'user.payment' => 'UserPaymentController', // untuk pembayaran
        'murottal' => 'MurottalController', // untuk murottal audio
        'daily-prayer' => 'DailyPrayerController', // untuk doa harian
        'membership-fee' => 'MembershipFeeController', // untuk membership
        'membership-fee-status' => 'MembershipFeeStatusController', // untuk status membership
        'subscribe-fee' => 'SubscribeFeeController', // untuk subscribe
        'subscribe-fee-status' => 'SubscribeFeeStatusController', // untuk status subscribe
        'article' => 'ArticleController', // untuk artikel
        'notification' => 'NotificationController',
        'year.month.event' => 'YearMonthEventController', // untuk mengambil event berdasarkan tahun dan bulan
        'year.month.province.event' => 'YearMonthProvinceEventController', // untuk mengambil event berdasarkan tahun, bulan, dan provinsi
        'province' => 'ProvinceController', // untuk mengambil provinsi
        'province.city' => 'ProvinceCityController', // untuk mengambil kota
        'city' => 'CityController', // untuk mengambil kota
        'city.district' => 'CityDistrictController', // untuk mengambil kecamatan
        'district' => 'DistrictController', // untuk mengambil kecamatan
        'generate-kta' => 'GenerateKtaController', // untuk generate kartu tanda anggota
    ]);

    Route::get('/personal-conversation/search/{keyword}', 'PersonalConversationController@search');

});
