<?php

use Illuminate\Support\Facades\Route;

// api untuk login
Route::post('/login', 'AuthController@login');

// api untuk daftar guru ke aplikasi agpaii digital
Route::post('/register', 'AuthController@register');

// api untuk forgot password via otp
Route::get('/otp-client/search/{email}', 'OtpClientController@searchUserByEmail');
Route::get('/otp-client/user/search/{phone_number}', 'OtpClientController@searchUser');
Route::get('/otp-client/search-name/{name}', 'OtpClientController@searchUserName');
Route::resource('/otp-client', 'OtpClientController');
Route::post('/otp-client/verify', 'OtpClientController@verify');
Route::post('/otp-client/change-password', 'OtpClientController@changePassword');
// end api forgot password

Route::group(['middleware' => 'auth:api'], function () {

    // api untuk mendapatkan data user yang sedang login
    Route::get('/me', 'AuthController@getUserAccount');

    // Cari Anggota -------------------------------------

    Route::get('/province/search/{keyword}', 'MemberInfoProvinceController@searchAllMember');
    Route::get('/province/{provinceId}/search/{keyword}', 'MemberInfoProvinceController@searchMember');
    Route::get('/district/{districtId}/search/{keyword}', 'MemberInfoDistrictController@searchMember');
    Route::get('/city/{cityId}/search/{keyword}', 'MemberInfoCityController@searchMember');
    // Kartu tanda anggota ---------------------------------------------------------------

    Route::get('/membercard/generate/front', 'MemberCardController@generateFrontCard');

    Route::get('/membercard/renew/front', 'MemberCardController@renewFrontCard');

    Route::get('/membercard/generate/back', 'MemberCardController@generateBackCard');

    Route::get('/membercard/renew/back', 'MemberCardController@renewBackCard');

    // End Kartu tanda anggota -----------------------------------------------------------

    // api resources
    Route::resources([
        'post' => 'PostController',
        'post.comment' => 'PostCommentController', // comment post
        'post.like' => 'PostLikeController', // untuk like postingan
        'post.read' => 'PostReadController', // untuk mengambil post yang sudah dibaca
        'post-bookmark' => 'PostBookmarkController', // untuk bookmark post
        'personal-conversation' => 'PersonalConversationController', // untuk mengelola pesan pribadi
        'chat.term' => 'ChatController', // untuk mengelola chat
        'event' => 'EventController', // untuk acara
        'event.participant' => 'EventParticipantController', // untuk mengelola peserta acara
        'event.barcode' => 'EventBarcodeController', // untuk mengelola barcode acara
        // 'event.session' => 'EventSessionController',
        
        'story' => 'StoryController', // untuk story
        'story.read' => 'StoryReadController', // untuk mengambil story yang sudah dibaca
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
        'user.lesson-plan' => 'UserLessonPlanController', //
        'user.module' => 'UserModuleController', //
        'user.islamic-study' => 'UserIslamicStudyController',
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
        'member-all' => 'MemberInfoProvinceController',
        
        
        'province' => 'ProvinceController', // untuk mengambil provinsi
        'province.province-member-info' => 'MemberInfoProvinceController',
        'city.city-member-info' => 'MemberInfoCityController',
        'district.district-member-info' => 'MemberInfoDistrictController',

        'province.city' => 'ProvinceCityController', // untuk mengambil kota
        'province.event' => 'ProvinceEventController', // untuk mengambil event berdasarkan provinsi
        'province.calendar-event' => 'ProvinceCalendarEventController', // untuk mengambil event berdasarkan provinsi
        'province-member' => 'ProvinceMemberController', // untuk mengambil member berdasarkan provinsi
        'province-member-detail' => 'ProvinceMemberDetailController',
        'province-certificate-member' => 'ProvinceCertificateController',
        'province-inpassing-member' => 'ProvinceInpassingController',
        'province-bsi-member' => 'ProvinceBSIController',
        'province-pns-member' => 'ProvincePnsMemberController', // untuk mengambil anggota pns berdasarkan provinsi
        'province-non-pns-member' => 'ProvinceNonPnsMemberController', // untuk mengambil anggota non pns berdasarkan provinsi
        'province-expired-member' => 'ProvinceExpiredMemberController', // untuk mengambil anggota yang sudah expired berdasarkan provinsi
        'province-extend-member' => 'ProvinceExtendMemberController', // untuk mengambil anggota yang sudah extend berdasarkan provinsi
        'province-pension-member' => 'ProvincePensionMemberController', // untuk mengambil anggota pensiun berdasarkan provinsi
        'province.city-member' => 'ProvinceCityMemberController', // untuk mengambil member berdasarkan provinsi dan kota
        'province.city-pns-member' => 'ProvinceCityPnsMemberController', // untuk mengambil anggota pns berdasarkan provinsi dan kota
        'province.city-non-pns-member' => 'ProvinceCityNonPnsMemberController', // untuk mengambil anggota non pns berdasarkan provinsi dan kota
        'province.city-expired-member' => 'ProvinceCityExpiredMemberController', // untuk mengambil anggota yang sudah expired berdasarkan provinsi dan kota
        'province.city-extend-member' => 'ProvinceCityExtendMemberController', // untuk mengambil anggota yang sudah extend berdasarkan provinsi dan kota
        'province.city-pension-member' => 'ProvinceCityPensionMemberController',
        'province.city-certificate-member' => 'ProvinceCityCertificateController', // untuk mengambil anggota pensiun berdasarkan provinsi dan kota
        'province.city-inpassing-member' => 'ProvinceCityInpassingController',
        'province.city-bsi-member' => 'ProvinceCityBSIController',
        'city' => 'CityController', // untuk mengambil kota
        'city.district' => 'CityDistrictController', // untuk mengambil kecamatan
        'city.district-member' => 'CityDistrictMemberController', // untuk mengambil member berdasarkan kota dan kecamatan
        'city.district-pns-member' => 'CityDistrictPnsMemberController', // untuk mengambil anggota pns berdasarkan kota dan kecamatan
        'city.district-non-pns-member' => 'CityDistrictNonPnsMemberController', // untuk mengambil anggota non pns berdasarkan kota dan kecamatan
        'city.district-extend-member' => 'CityDistrictExtendMemberController', // untuk mengambil anggota yang sudah expired berdasarkan kota dan kecamatan
        'city.district-pension-member' => 'CityDistrictPensionMemberController',
        'city.district-certificate-member' => 'CityDistrictCertificateController', // untuk mengambil anggota pensiun berdasarkan kota
        'city.district-inpassing-member' => 'CityDistrictInpassingController',
        'city.district-bsi-member' => 'CityDistrictBSIController',
        'district' => 'DistrictController', // untuk mengambil kecamatan
        'kta' => 'KtaController', // untuk generate kartu tanda anggota
        'event-categories' => 'EventCategoryController', // untuk mencari kategori event
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
        'assignment-uses' => 'AssignmentUsesController', //
        'assignment-session' => 'AssignmentSessionController', //
        'room' => 'RoomController', //
        'lesson-plan' => 'LessonPlanController', //
        'lesson-plan-cover' => 'LessonPlanCoverController', //
        'lesson-plan-liked' => 'LessonPlanLikedController', //
        'module' => 'ModuleController', //
        'module-like' => 'ModuleLikeController', //
        'module.content' => 'ModuleContentController', //
        'module-cover' => 'ModuleCoverController', //
        'islamic-study' => 'IslamicStudyController', //
        'islamic-study.like' => 'IslamicStudyLikeController', //
        'islamic-study.comment' => 'IslamicStudyCommentController', //
        'islamic-study-category' => 'IslamicStudyCategoryController', //
        'category.islamic-study' => 'CategoryIslamicStudyController', //
        'islamic-study.upvote' => 'IslamicStudyUpVoteController', //
        'islamic-study.downvote' => 'IslamicStudyDownVoteController', //
        'classroom' => 'ClassRoomController', //
        'classroom.task' => 'ClassRoomTaskController', //
        'task.result' => 'TaskResultController', //
        'training-event' => 'TrainingEventController', // untuk mendapatkan data acara pelatihan
        'file' => 'FileController', //
    ]);

    Route::get('/post/user/{id}', 'PostController@userPost');
    Route::post('/post/update/{id}', 'PostController@updatePost');
    Route::get('/event/session/{id}', 'EventSessionController@show');

    Route::get('/classroom/search/{keyword}', 'ClassRoomController@search');

    //get 3 thumbnail islamic study highest vote
    Route::get('/islamic-studies/highest/vote', 'IslamicStudyController@gethighestvote');

    //search islamic study user
    Route::get('/user/islamic-studies/search/{keyword}', 'UserIslamicStudyController@search');

    //search islamic study
    Route::get('/islamic-studies/search/{keyword}', 'IslamicStudyController@search');

    //get islamic study group by category
    Route::get('/category/islamic-studies', 'IslamicStudyCategoryController@getcategorywithislamicstudies');

    //get notif module liked
    Route::get('/notification-module', 'NotificationController@notifmodule');

    //get module by grade
    Route::get('/module/grade/{gradeLabel}', 'ModuleController@getmodulebygrade');

    //search module
    Route::get('/module/search/{keyword}', 'ModuleController@search');

    //search moodule user
    Route::get('/user/module/search/{keyword}', 'UserModuleController@search');

    //search module like
    Route::get('/module-like/search/{keyword}', 'ModuleLikeController@search');

    //generate cover module
    Route::post('/modules/generate/cover', 'ModuleCoverController@generatecover');

    //generate cover module by id
    Route::post('/modules/generate/cover/selected', 'ModuleCoverController@generatecoverbycoverid');

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

    Route::get('/users', 'UserController@index');

    Route::get('/users/search/{keyword}', 'UserController@search');

    Route::get('/users/province/{province_id}', 'UserController@getUserByProvince');

    //Update status guru
    Route::post('/users/{id}/updatestatus', 'UserController@updateStatus');

    Route::get('/users/province/{province_id}/search/{keyword}', 'UserController@searchInProvince');


   
    // Events 

    Route::get('/event/sessions/show/{id}/{user_id}', 'EventController@showSession');

    Route::post('/event/{eventId}/sessions/{sessionId}/users/{userId}/presents', 'EventController@addPresents');

    Route::post('/event/participant/{userId}/event/{eventId}', 'EventParticipantController@addParticipant');

    Route::get('/event/participant/{user_id}', 'EventParticipantController@getParticipatedEvents');

    Route::get('/event/all-participants/{event_id}', 'EventParticipantController@getEventParticipants');

    Route::get('/event/{event_id}/participant/search/{search}', 'EventParticipantController@search');

    Route::get('/event/{eventId}/participant/{userId}/generate-card', 'EventParticipantController@generateCard');

    //mendapatkan event berdasarkan id pembuat
    Route::get('/event/created/{userId}', 'EventController@getCreatedEvents');

    //mendapatkan event berdasarkan tahun dan bulan
    Route::get('/event/month/{month}/year/{year}', 'EventController@geteventbydate');

    //mendapatkan kategori event
    Route::get('/event/category', 'EventController@geteventcategory');

    //mendapatkan event berdasarkan province_id, tahun dan bulan
    Route::get('/province/{province_id}/event/month/{month}/year/{year}', 'ProvinceEventController@getprovinceeventbydate');

    //search province with total member
    Route::get('/province-member/search/{keyword}', 'ProvinceMemberController@search');
    Route::get('/province-pns-member/search/{keyword}', 'ProvincePnsMemberController@search');
    Route::get('/province-non-pns-member/search/{keyword}', 'ProvinceNonPnsMemberController@search');
    Route::get('/province-expired-member/search/{keyword}', 'ProvinceExpiredMemberController@search');
    Route::get('/province-extend-member/search/{keyword}', 'ProvinceExtendMemberController@search');
    Route::get('/province-pension-member/search/{keyword}', 'ProvincePensionMemberController@search');

    Route::get('/province/{provinceId}/city-member/search/{keyword}', 'ProvinceCityMemberController@search');
    Route::get('/province/{provinceId}/city-pns-member/search/{keyword}', 'ProvinceCityPnsMemberController@search');
    Route::get('/province/{provinceId}/city-non-pns-member/search/{keyword}', 'ProvinceCityNonPnsMemberController@search');
    Route::get('/province/{provinceId}/city-expired-member/search/{keyword}', 'ProvinceCityExpiredMemberController@search');
    Route::get('/province/{provinceId}/city-extend-member/search/{keyword}', 'ProvinceCityExtendMemberController@search');
    Route::get('/province/{provinceId}/city-pension-member/search/{keyword}', 'ProvinceCityPensionMemberController@search');
    //end search province with total member

    //search city with total member
    Route::get('/city/{cityId}/district-member/search/{keyword}', 'CityDistrictMemberController@search');
    Route::get('/city/{cityId}/district-pns-member/search/{keyword}', 'CityDistrictPnsMemberController@search');
    Route::get('/city/{cityId}/district-non-pns-member/search/{keyword}', 'CityDistrictNonPnsMemberController@search');
    Route::get('/city/{cityId}/district-extend-member/search/{keyword}', 'CityDistrictExtendMemberController@search');
    // Route::get('/city/{cityId}/district-expired-member/search/{keyword}', 'CityDistrictExpiredMemberController@search');
    Route::get('/city/{cityId}/district-pension-member/search/{keyword}', 'CityDistrictPensionMemberController@search');
    //end search city with total member

    //total member
    Route::get('/users/total-member', 'UserController@gettotalmember');
    Route::get('/users/total-pns-member', 'UserController@gettotalpnsmember');
    Route::get('/users/total-non-pns-member', 'UserController@gettotalnonpnsmember');
    Route::get('/users/total-expired-member', 'UserController@gettotalexpiredmember');
    Route::get('/users/total-pension-member', 'UserController@gettotalpensionmember');
    Route::get('/users/total-certificate-member', 'UserController@gettotalcertificatemember');
    Route::get('/users/total-inpassing-member', 'UserController@gettotalinpassingmember');
    Route::get('/users/total-bsi-member', 'UserController@gettotalbsimember');
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


  
    //Payment Status
    Route::post('/payment/status', 'PaymentController@paymentNotif');
   
});
