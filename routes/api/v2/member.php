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
        'post-bookmark' => 'PostBookmarkController', // untuk bookmark post
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
        'user.banner' => 'UserBannerController',
        'user.push-token' => 'UserPushTokenController', // untuk menyimpan expo push token ke database
        'user.member-card' => 'UserMemberCardController', // untuk generate kartu tanda anggota
        'user.payment' => 'UserPaymentController', // untuk pembayaran
        'user.pns-status' => 'UserPnsStatusController', //untuk status pns user
        'user.event' => 'UserEventController', //untuk acara user
        'user.event-attendance' => 'UserEventAttendanceController', // untuk mengambil data absensi user
        'user-bookmark' => 'UserBookmarkController', // untuk mengambil data bookmark user
        'user.question-list' => 'UserQuestionListController', //untuk mendapatkan data pert
        'user.assignment' => 'UserAssignmentController', //untuk mendapatkan data tugas
        'user.room' => 'UserRoomController',
        'user.lesson-plan' => 'UserLessonPlanController',//
        'user.module' => 'UserModuleController',//
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
        'province.city-expired-member' => 'ProvinceCityExpiredMemberController', // untuk mengambil anggota yang sudah expired berdasarkan provinsi dan kota
        'province.city-extend-member' => 'ProvinceCityExtendMemberController', // untuk mengambil anggota yang sudah extend berdasarkan provinsi dan kota
        'city' => 'CityController', // untuk mengambil kota
        'city.district' => 'CityDistrictController', // untuk mengambil kecamatan
        'city.district-member' => 'CityDistrictMemberController', // untuk mengambil member berdasarkan kota dan kecamatan
        'city.district-pns-member' => 'CityDistrictPnsMemberController', // untuk mengambil anggota pns berdasarkan kota dan kecamatan
        'city.district-non-pns-member' => 'CityDistrictNonPnsMemberController', // untuk mengambil anggota non pns berdasarkan kota dan kecamatan
        'city.district-extend-member' => 'CityDistrictExtendMemberController', // untuk mengambil anggota yang sudah expired berdasarkan kota dan kecamatan
        'district' => 'DistrictController', // untuk mengambil kecamatan
        'kta' => 'KtaController', // untuk generate kartu tanda anggota
        'educational-level' => 'EducationalLevelController', //untuk mendapatkan data jenjang ajar
        'grade' => 'GradeController', //untuk mendapatkan data kelas yang diajar
        'setting' => 'SettingController', //untuk mendapatkan data dari table setting
        'book' => 'BookController', //untuk mendapatkan data buku
        'book-category' => 'BookCategoryController', //untuk mendapatkan data kategori buku
        'book-category.book' => 'CategoryBookController', //untuk mendapatkan data buku berdasarkan kategori
        'department' => 'DepartmentController', //untuk mendapatkan data departemen
        'department-division' => 'DepartmentDivisionController', //untuk mendapatkan data divisi departemen
        'department.department-user' => 'DepartmentUserController', //untuk mendapatkan data user berdasarkan departemen
        'dpp-department' => 'DppDepartmentController', //untuk mendapatkan data departemen dpp
        'dpw-department' => 'DpwDepartmentController', //untuk mendapatkan data departemen dpw
        'dpd-department' => 'DpdDepartmentController', //untuk mendapatkan data departemen dpd
        'dpc-department' => 'DpcDepartmentController', //untuk mendapatkan data departemen dpc
        'question-list' => 'QuestionListController', //untuk mendapatkan data pertanyaan
        'assignment-category' => 'AssignmentCategoryController', //untuk mendapatkan data kategori tugas
        'assignment-category.type' => 'AssignmentCategoryTypeController', //untuk mendapatkan data tipe tugas berdasarkan kategori
        'assignment' => 'AssignmentController', //untuk mendapatkan data tugas
        'assignment-uses' => 'AssignmentUsesController',//
        'assignment-session' => 'AssignmentSessionController',//
        'room' => 'RoomController',//
        'lesson-plan' => 'LessonPlanController',//
        'lesson-plan-cover' => 'LessonPlanCoverController',//
        'lesson-plan-liked' => 'LessonPlanLikedController',//
        'module' => 'ModuleController',//
        'module-like' => 'ModuleLikeController',//
        'module.content' => 'ModuleContentController',//
    ]);

    //get module by grade
    Route::get('/module/grade/{gradeLabel}', 'ModuleController@getmodulebygrade');

    //search module
    Route::get('/module/search/{keyword}', 'ModuleController@search');

    //search moodule user
    Route::get('/user/module/search/{keyword}', 'UserModuleController@search');

    //search module like
    //search module
    Route::get('/module-like/search/{keyword}', 'ModuleLikeController@search');

    //generate cover lesson plan
    Route::post('/lesson-plans/generate/cover', 'LessonPlanCoverController@generatecover');

    //generate cover lesson plan by cover id
    Route::post('/lesson-plans/generate/cover/selected', 'LessonPlanCoverController@generatecoverbycoverid');

    //search rpp favorite
    Route::get('/lesson-plans/favorite/search/{keyword}', 'LessonPlanLikedController@search');

    //search rpp user
    Route::get('/user/lesson-plans/search/{keyword}', 'UserLessonPlanController@search');

    //list ranking by room id
    Route::get('/rooms/{id}/ranking', 'RoomController@ranking');

    //search user assignment
    Route::get('/user/assignment/search/{keyword}', 'UserAssignmentController@search');

    //search user question list
    Route::get('/user/question-lists/search/{keyword}', 'UserQuestionListController@search');

    //list student assignment session by assignment id
    Route::get('/assignment/{assignmentId}/session', 'AssignmentSessionController@getsessionbyassignment');

    //list student not graded
    Route::get('/assignment/{assignmentId}/not-yet-rated', 'AssignmentUsesController@assignmentnotyetrated');

    //input question list
    Route::post('/assignment/store/question-lists', 'AssignmentController@storequestionlist');
    Route::get('/assignment/{id}/question-lists', 'AssignmentController@showquestionlist');

    //search question list
    Route::get('/assignment/search/{keyword}/question-lists', 'QuestionListController@search');

    //filter question list by grade
    Route::get('/question-lists/filter/grade/{gradeId}', 'QuestionListController@filterbygrade');

    //search rooms
    Route::get('/user/rooms/search/{keyword}', 'UserRoomController@search');

    //search assignment
    Route::get('/assignment/search/{keyword}', 'AssignmentController@search');

    //department filter
    Route::get('/dpw-departments/province/{province_id}', 'DpwDepartmentController@getByProvince');
    Route::get('/dpd-departments/city/{city_id}', 'DpdDepartmentController@getByCity');
    Route::get('/dpc-departments/district/{district_id}', 'DpcDepartmentController@getByDistrict');
    //end department filter

    //department children
    Route::get('/dpp-departments/{parentId}/childrens', 'DppDepartmentController@childrens');
    Route::get('/dpw-departments/{parentId}/childrens', 'DpwDepartmentController@childrens');
    Route::get('/dpd-departments/{parentId}/childrens', 'DpdDepartmentController@childrens');
    Route::get('/dpc-departments/{parentId}/childrens', 'DpcDepartmentController@childrens');
    //end department children

    Route::get('/personal-conversation/search/{keyword}', 'PersonalConversationController@search');

    Route::get('/users/search/{keyword}', 'UserController@search');

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
    Route::get('/province/{provinceId}/city-expired-member/search/{keyword}', 'ProvinceCityExpiredMemberController@search');
    Route::get('/province/{provinceId}/city-extend-member/search/{keyword}', 'ProvinceCityExtendMemberController@search');
    //end search province with total member

    //search city with total member
    Route::get('/city/{cityId}/district-member/search/{keyword}', 'CityDistrictMemberController@search');
    Route::get('/city/{cityId}/district-pns-member/search/{keyword}', 'CityDistrictPnsMemberController@search');
    Route::get('/city/{cityId}/district-non-pns-member/search/{keyword}', 'CityDistrictNonPnsMemberController@search');
    Route::get('/city/{cityId}/district-extend-member/search/{keyword}', 'CityDistrictExtendMemberController@search');
    //end search city with total member

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
    Route::get('/kongres/province/{provinceId}/city-payments', 'Kongres2022PaymentController@getPaymentUsersByProvince');
    ROute::get('/kongres/province/{provinceId}/city-payments/search/{keyword}', 'Kongres2022PaymentController@searchByProvince');
    Route::get('/kongres/city/{cityId}/district-payments', 'Kongres2022PaymentController@getPaymentUsersByCity');
    Route::get('/kongres/city/{cityId}/district-payments/search/{keyword}', 'Kongres2022PaymentController@searchByCity');
    //end kongres 2022

    //mendapatkan cs number
    Route::get('/cs-number', 'SettingController@getcsnumber');
});
