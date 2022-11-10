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
        'event.participant' => 'EventParticipantController', // untuk mengelola peserta acara
        'event.barcode' => 'EventBarcodeController', // untuk mengelola barcode acara
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
        'user.pns-status' => 'UserPnsStatusController', //untuk status pns user
        'user.event' => 'UserEventController', //untuk acara user
        'user.event-attendance' => 'UserEventAttendanceController', // untuk mengambil data absensi user
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
        'province.event' => 'ProvinceEventController', // untuk mengambil event berdasarkan provinsi
        'province.calendar-event' => 'ProvinceCalendarEventController', // untuk mengambil event berdasarkan provinsi
        'province-member' => 'ProvinceMemberController', // untuk mengambil member berdasarkan provinsi
        'province-pns-member' => 'ProvincePnsMemberController', // untuk mengambil anggota pns berdasarkan provinsi
        'province-non-pns-member' => 'ProvinceNonPnsMemberController', // untuk mengambil anggota non pns berdasarkan provinsi
        'province-expired-member' => 'ProvinceExpiredMemberController', // untuk mengambil anggota yang sudah expired berdasarkan provinsi
        'province-extend-member' => 'ProvinceExtendMemberController', // untuk mengambil anggota yang sudah extend berdasarkan provinsi
        'province.city-member' => 'ProvinceCityMemberController', // untuk mengambil member berdasarkan provinsi dan kota
        'province.city-pns-member' => 'ProvinceCityPnsMemberController', // untuk mengambil anggota pns berdasarkan provinsi dan kota
        'province.city-non-pns-member' => 'ProvinceCityNonPnsMemberController', // untuk mengambil anggota non pns berdasarkan provinsi dan kota
        'city' => 'CityController', // untuk mengambil kota
        'city.district' => 'CityDistrictController', // untuk mengambil kecamatan
        'district' => 'DistrictController', // untuk mengambil kecamatan
        'kta' => 'KtaController', // untuk generate kartu tanda anggota
        'educational-level' => 'EducationalLevelController', //untuk mendapatkan data jenjang ajar
        'grade' => 'GradeController', //untuk mendapatkan data kelas yang diajar
        'setting' => 'SettingController', //untuk mendapatkan data dari table setting
    ]);

    Route::get('/personal-conversation/search/{keyword}', 'PersonalConversationController@search');

    Route::get('/event/{event_id}/participant/search/{search}', 'EventParticipantController@search');

    Route::get('/event/{eventId}/participant/{userId}/generate-card', 'EventParticipantController@generateCard');

    //mendapatkan event berdasarkan tahun dan bulan
    Route::get('event/month/{month}/year/{year}', 'EventController@geteventbydate');

    //mendapatkan event berdasarkan province_id, tahun dan bulan
    Route::get('/province/{province_id}/event/month/{month}/year/{year}', 'ProvinceEventController@getprovinceeventbydate');

    //search province with total member
    Route::get('/province-member/search/{keyword}', 'ProvinceMemberController@search');
    Route::get('/province-pns-member/search/{keyword}', 'ProvincePnsMemberController@search');
    Route::get('/province-non-pns-member/search/{keyword}', 'ProvinceNonPnsMemberController@search');
    Route::get('/province-expired-member/search/{keyword}', 'ProvinceExpiredMemberController@search');
    Route::get('/province-extend-member/search/{keyword}', 'ProvinceExtendMemberController@search');

    Route::get('/province/{provinceId}/city-member/search/{keyword}', 'ProvinceCityMemberController@search');
    Route::get('/province/{provinceId}/city-pns-member/search/{keyword}', 'ProvinceCityPnsMemberController@search');
    Route::get('/province/{provinceId}/city-non-pns-member/search/{keyword}', 'ProvinceCityNonPnsMemberController@search');
    //end search province with total member

    //total member
    Route::get('/users/total-member', 'UserController@gettotalmember');
    Route::get('/users/total-pns-member', 'UserController@gettotalpnsmember');
    Route::get('/users/total-non-pns-member', 'UserController@gettotalnonpnsmember');
    Route::get('/users/total-expired-member', 'UserController@gettotalexpiredmember');
    Route::get('/payment/extended-total', 'PaymentController@gettotalextendmember');
    //end total member


    //kongres 2022
    Route::get('/kongres/payments', 'Kongres2022PaymentController@getPaymentUsers');
    Route::get('/kongres/payments/total', 'Kongres2022PaymentController@getPaymentUsersCount');
    Route::get('/kongres/payments/search/{keyword}', 'Kongres2022PaymentController@search');
    //end kongres 2022

    //mendapatkan cs number
    Route::get('/cs-number', 'SettingController@getcsnumber');
});
