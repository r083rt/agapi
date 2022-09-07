<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

// API VERSION 1
Route::group(['prefix' => 'v1', 'namespace' => 'API\\v1'], function () {

    // API WITH SECUTIRY -------------------------------------------------------------------------------
    Route::group(['middleware' => [
        'auth:api',
        'expired',
        // 'verified'
    ]], function () {

        Route::prefix('student')->group(function () {
            // Route::post('student/createassigmentsession',[App\Http\Controllers\API\v1\Student\AssigmentSessionController::class, 'createAssigmentSession']);
            include "v1/student.php";
        });

        Route::get('/auth/assigment', function (Request $request) { // GET USER AUTH FOR ASSIGMENT APPS
            $res = $request->user()
                ->load([
                    'assigment_sessions' => function ($query) {
                        $query->with('assigment', 'session');
                    },
                    'publish_assigments' => function ($query) {
                        $query
                            ->orderBy('created_at', 'desc')
                            ->with([
                                'sessions',
                                'user',
                                'grade',
                                'assigment_category',
                                'question_lists.answer_lists',
                                'likes',
                                'comments.user',
                                'comments' => function ($query) {
                                    $query
                                        ->with('likes', 'liked')
                                        ->withCount('likes', 'liked')
                                        ->orderBy('created_at', 'desc');
                                },
                            ])->withCount('comments', 'likes', 'liked');
                    },
                    'unpublish_assigments' => function ($query) {
                        $query
                            ->orderBy('created_at', 'desc')
                            ->with([
                                'sessions',
                                'user',
                                'grade',
                                'assigment_category',
                                'question_lists.answer_lists',
                                'likes',
                                'comments.user',
                                'comments' => function ($query) {
                                    $query
                                        ->with('likes', 'liked')
                                        ->withCount('likes', 'liked')
                                        ->orderBy('created_at', 'desc');
                                },
                            ])->withCount('comments', 'likes', 'liked');
                    },
                    'profile',
                    'role',
                    'bookmark_posts',
                    'assigments' => function ($query) {
                        $query
                            ->orderBy('created_at', 'desc')
                            ->with([
                                'sessions',
                                'user',
                                'grade',
                                'assigment_category',
                                'question_lists.answer_lists',
                                'likes',
                                'comments.user',
                                'comments' => function ($query) {
                                    $query
                                        ->with('likes', 'liked')
                                        ->withCount('likes', 'liked')
                                        ->orderBy('created_at', 'desc');
                                },
                            ])->withCount('comments', 'likes', 'liked');
                    },
                ]);
            // hitung berapa kali paket soal dikerjakan
            $count_sessions = 0;
            foreach ($res->assigments as $a => $assigment) {
                $count_sessions += $assigment->sessions->count();
            }
            $res->count_sessions = $count_sessions;
            // end
            // hitung total soal
            $count_question_lists = 0;
            foreach ($res->assigments as $a => $assigment) {
                $count_question_lists += $assigment->question_lists->count();
            }
            $res->count_question_lists = $count_question_lists;
            // end
            foreach ($res->assigments as $a => $assigment) {
                # code...
                foreach ($assigment->question_lists as $ql => $question_list) {
                    # code...
                    $question_list->pivot->assigment_type = App\Models\AssigmentType::find($question_list->pivot->assigment_type_id);
                }
            }
            foreach ($res->unpublish_assigments as $a => $assigment) {
                # code...
                foreach ($assigment->question_lists as $ql => $question_list) {
                    # code...
                    $question_list->pivot->assigment_type = App\Models\AssigmentType::find($question_list->pivot->assigment_type_id);
                }
            }
            foreach ($res->publish_assigments as $a => $assigment) {
                # code...
                foreach ($assigment->question_lists as $ql => $question_list) {
                    # code...
                    $question_list->pivot->assigment_type = App\Models\AssigmentType::find($question_list->pivot->assigment_type_id);
                }
            }
            return $res;
        });
        ///API di bawah merupakan perkembangan dari potongan endpoint di atas//////////////////
        Route::get('/auth/assigment_lite', function (Request $request) {
            $user = $request->user();
            $user_id = $user->id;
            $res = $user
                ->load(['profile', 'role'])->loadCount(['rooms' => function ($query) {
                $query->where('type', 'class');
            }]);
            $res->count_question_lists = \App\Models\QuestionList::whereHas('assigments', function ($query) use ($user_id) {
                $query->where('assigments.user_id', '=', $user_id)->where('is_publish', false);
            })->count();
            $res->count_sessions = \App\Models\Session::whereHas('assigments', function ($query) use ($user_id) {
                $query->where('assigments.user_id', '=', $user_id)->orWhere('assigments.teacher_id', '=', $user_id);
            })->count();
            $res->count_publish_assigments = \App\Models\Assigment::where('user_id', '=', $user_id)->where('is_publish', true)->whereNull('teacher_id')->count();
            $res->canCreatePremiumAssigment = $user->canCreatePremiumAssigment();
            return $res;
        });
        Route::get('/auth/assigments/unpublished', function (Request $request) {
            return \App\Models\Assigment::with('likes', 'comments.user', 'user', 'grade', 'assigment_category', 'question_lists.assigment_types', 'question_lists.images')->where('user_id', '=', auth('api')->user()->id)->where('is_publish', false)->whereNull('teacher_id')->orderBy('id', 'desc')->paginate();
        });
        Route::get('/auth/assigments/published', function (Request $request) {
            return \App\Models\Assigment::with('likes', 'comments.user', 'user', 'grade', 'assigment_category', 'question_lists.assigment_types', 'question_lists.images')
                ->where('user_id', '=', auth('api')->user()->id)->where('is_publish', true)->whereNull('teacher_id')->orderBy('id', 'desc')->paginate();
        });

        /////////////////////////////////////////////////////////////////////////////////////
        Route::get('/auth/lessonplan', function (Request $request) { // GET USER AUTH FOR RPP APPS
            return $request->user();
        });

        Route::get('/auth/kta', function (Request $request) { // GET USER AUTH FOR KTA APPS
            return $request->user();
        });

        Route::get('/userreport2', 'UserController@userreport2');

        Route::get('/auth/assigment/student', function (Request $request) {
            return $request->user()->load([
                'posts',
                'role',
                'profile.educational_level.grades',
                'profile.grade',
                'sessions.questions.answer',
                'sessions.assigments',
            ]);
        });

        // Route::get('/auth/assigment/student/finishedtoday', function(Request $request){
        //      $userProfile = auth('api')->user()->load('profile');
        //      $educationalLevelId = $userProfile->profile->educational_level_id;

        //      //paket soal utama
        //      $res = \App\Models\Session::withCount('questions')->with('assigments.grade')->where('user_id',auth('api')->user()->id)
        //      ->whereDate('created_at',\Carbon\Carbon::today())
        //      ->whereHas('assigments',function($query)use($educationalLevelId){
        //          $query->whereNotNull('teacher_id')->whereHas('grade', function($query)use($educationalLevelId){
        //             $query->where('educational_level_id',$educationalLevelId);
        //          });
        //      })->whereHas('assigment_session',function($query){
        //         $query->whereNotNull('total_score');  //hanya mengambil paket soal yang telah dinilai oleh guru, yaitu jika total_score'nya TIDAK null
        //      });

        //      //paket soal latihan mandiri
        //      $res2 = \App\Models\Session::where('user_id',auth('api')->user()->id)
        //      ->whereDate('created_at',\Carbon\Carbon::today())
        //      ->whereHas('assigments',function($query)use($educationalLevelId){
        //          $query->whereNull('teacher_id')->whereHas('grade', function($query)use($educationalLevelId){
        //             $query->where('educational_level_id',$educationalLevelId);
        //          });
        //      })->whereHas('assigment_session',function($query){
        //         $query->whereNotNull('total_score');  //hanya mengambil paket soal latihan mandiri yang telah dinilai oleh guru, yaitu jika total_score'nya TIDAK null
        //      });
        //      return ["main_assigment"=>$res->get(), "training_assigment_count"=>$res2->count()];
        //      //->get();
        // });

        Route::get('/auth/assigment/student/finishedtoday', function (Request $request) {
            $user = App\Models\User::findOrfail(auth('api')->user()->id);
            $userProfile = $user->load('profile');
            $educationalLevelId = $userProfile->profile->educational_level_id;
            if ($educationalLevelId == null) {
                return response()->json(['error_jenjang' => 'Harus pilih jenjang dulu']);
            }

            //paket soal utama
            $res = \App\Models\Session::withCount('questions')->with('assigments.grade')->where('user_id', auth('api')->user()->id)
                ->whereDate('created_at', \Carbon\Carbon::today())
                ->whereHas('assigments', function ($query) use ($educationalLevelId) {
                    $query->whereNotNull('teacher_id')->whereHas('grade', function ($query2) use ($educationalLevelId) {
                        $query2->where('educational_level_id', $educationalLevelId);
                    });
                });
            // ->whereHas('assigment_session',function($query){
            //    $query->whereNotNull('total_score');  //hanya mengambil paket soal yang telah dinilai oleh guru atau telah melalui proses penilaian otomatis, yaitu jika total_score'nya TIDAK null
            // });

            //paket soal latihan mandiri
            $res2 = \App\Models\Session::withCount('questions')->with('assigments.grade')->where('user_id', auth('api')->user()->id)
                ->whereDate('created_at', \Carbon\Carbon::today())
                ->whereHas('assigments', function ($query) use ($educationalLevelId) {
                    $query->whereNull('teacher_id')->whereHas('grade', function ($query) use ($educationalLevelId) {
                        $query->where('educational_level_id', $educationalLevelId);
                    });
                })->whereHas('assigment_session', function ($query) {
                $query->whereNotNull('total_score'); //hanya mengambil paket soal latihan mandiri yang telah dinilai oleh guru, yaitu jika total_score'nya TIDAK null
            });
            return ["main_assigment" => $res->get(), "training_assigment" => $res2->get()];

        });

        Route::apiResources([
            'role' => 'RoleController',
            'user' => 'UserController',
            'user.document' => 'UserDocumentController',
            'profile' => 'ProfileController',
            'grade' => 'GradeController',
            'subject' => 'SubjectController',
            'payment' => 'PaymentController',
            'province' => 'ProvinceController',
            'city' => 'CityController',
            'district' => 'DistrictController',
            'educationallevel' => 'EducationalLevelController',
            'event' => 'EventController',
            'attendance' => 'AttendanceController',
            'lessonplanformat' => 'LessonPlanFormatController',
            'lessonplan' => 'LessonPlanController',
            'lessonplanlike' => 'LessonPlanLikeController',
            'lessonplancomment' => 'LessonPlanCommentController',
            'lessonplanreview' => 'LessonPlanReviewController',
            'post' => 'PostController',
            'postcomment' => 'PostCommentController',
            'postlike' => 'PostLikeController',
            'postbookmark' => 'PostBookmarkController',
            'commentlike' => 'CommentLikeController',
            'lessonplancover' => 'LessonPlanCoverController',
            'bookcategory' => 'BookCategoryController',
            'book' => 'BookController',
            'chat' => 'ChatController',
            'mainchat' => 'MainChatController',
            'channel' => 'ChannelController',
            'chatchannel' => 'ChatChannelController',
            'lessonplanrating' => 'LessonPlanRatingController',
            'lessonplanguideduser' => 'LessonPlanGuidedUserController',
            'murottal' => 'MurottalController',
            'dailyprayer' => 'DailyPrayerController',
            'follow' => 'FollowController',
            'module' => 'ModuleController',
            'modulecontent' => 'ModuleContentController',
            'template' => 'TemplateController',
            'templatecategory' => 'TemplateCategoryController',
            'usertemplate' => 'UserTemplateController',
            'ad' => 'AdController',
            'questionnary' => 'QuestionnaryController',
            'questionnarysesion' => 'QuestionnarySessionController',
            'modules.comments' => 'ModuleCommentController',
            'modules.likes' => 'ModuleLikeController',
            'bank_account' => 'BankAccountController',
            'surah' => 'SurahController',
            'conversation' => 'ConversationController',
            'paymentvendor' => 'PaymentVendorController',
            'room' => 'RoomController',
            'student/room' => 'Student\RoomController',
            'tag' => 'TagController',
            'department/dpp' => 'DppDepartmentController',
            'province.department' => 'DpwDepartmentController',
            'city.department' => 'DpdDepartmentController',
        ]);

        Route::delete('module/{moduleId}/dislike', 'ModuleLikeController@dislike');

        // api resources untuk penilaian digital
        Route::apiResources([
            'assigmentguideduser' => 'AssigmentGuidedUserController',
            'assigmentcategory' => 'AssigmentCategoryController',
            'assigmenttype' => 'AssigmentTypeController',
            'assigment' => 'AssigmentController',
            'assigmentcomment' => 'AssigmentCommentController',
            'assigmentlike' => 'AssigmentLikeController',
            'assigmentrating' => 'AssigmentRatingController',
            'assigmentchat' => 'AssigmentChatController',
            'questionlistcategory' => 'QuestionListCategoryController',
            'questionlist' => 'QuestionListController',
            'assigmentquestionlist' => 'AssigmentQuestionListController',
            'answerlist' => 'AnswerListController',
            'session' => 'SessionController',
            'assigmentsession' => 'AssigmentSessionController',
            'question' => 'QuestionController',
            'answer' => 'AnswerController',
        ]);

        Route::post('/rooms/join', 'RoomController@join');
        Route::post('/rooms/changename', 'RoomController@changeRoomName');
        Route::get('/rooms/{roomid}/viewmember', 'RoomController@viewMembers');
        Route::get('/rooms/{room_id}/userlist', 'RoomController@userlist');
        Route::get('/rooms/getuserrooms', 'RoomController@get_user_rooms');
        Route::get('/eventyears', 'EventController@get_event_years');
        Route::post('/filterevent', 'EventController@filter_event');

        Route::post('/murottals/listening', 'MurottalController@listening');
        Route::get('/murottals/getdatalistening', 'MurottalController@listening_show');

        Route::get('/student/getjoinedrooms', 'Student\RoomController@getJoinedRooms');
        Route::post('/student/rooms/join', 'Student\RoomController@join');

        Route::get('/studentpost', 'PostController@studentpost');
        Route::get('/ownstudentpost', 'PostController@ownstudentpost');
        Route::get('/mediapost', 'PostController@mediapost');
        Route::get('/assigments/search/{key}', 'AssigmentController@search');

        /////////////////API PUBLISH untuk GURU///////////////////
        Route::get('/assigments/publish', 'AssigmentController@publish');
        Route::get('/assigments/publish2', 'AssigmentController@publish2'); //perbaikan dari endpoint atas dgn menghilangkan nested-loop
        Route::post('/assigments/{id}/softdelete', 'AssigmentController@softDelete');
        Route::post('/assigments/{id}/restore', 'AssigmentController@restore');
        Route::get('/assigments/getdeleteditems', 'AssigmentController@getDeletedItems');

        ////////////////////////////////////////////////////////////////////

        /////////////////API UNPUBLISH untuk GURU///////////////////
        Route::get('/assigments/unpublish', 'AssigmentController@unpublish');
        Route::get('/assigments/unpublish2', 'AssigmentController@unpublish2'); //perbaikan dari endpoint atas dgn menghilangkan nested-loop
        ////////////////////////////////////////////////////////////////////

        Route::get('/assigments/users/search/{key}', 'UserController@searchByKtaId');
        Route::get('/assigments/questionlists/search/{assigmentCategoryId}/{educationalLevelId}', 'AssigmentController@buildSearch');
        Route::get('/assigments/payable_questionlists/search/{assigmentCategoryId}/{educationalLevelId}', 'AssigmentController@payableBuildSearch');
        Route::get('/assigments/start/{code}/{ktaId}', 'AssigmentController@start');
        Route::post('/assigments/check', 'AssigmentController@check');
        Route::post('/assigments/share', 'AssigmentController@share');
        Route::post('/assigments/{id}/update', 'AssigmentController@update');
        Route::post('/assigments/setpublic', 'AssigmentController@setAssigmentToPublic');
        Route::get('/assigments/getsharedpublish', 'AssigmentController@getSharedAssigment');
        Route::get('/assigments/getassigmentworks', 'AssigmentController@getAssigmentWorks');
        Route::get('/assigments/getsharedpublishorderby', 'AssigmentController@getSharedAssigmentOrderBy');
        Route::get('/assigments/getmasterpublish/{subject?}', 'AssigmentController@getMasterAssigment');
        Route::get('/assigments/getstudentassigments/{assigment_id}', 'AssigmentController@getStudentAssigmentsById');
        Route::get('/assigments/getassigmentinfo/{key}', 'AssigmentController@getAssigmentInfoById');
        Route::get('/session/getsessionid/{key}', 'SessionController@getSessionById');
        Route::post('/session/savescore', 'SessionController@saveScore');
        Route::get('/assigment/selectoptionsonly/{assigment_id}', 'AssigmentController@selectOptionsOnly');
        Route::get('/assigment/selectoptionsonlywithanswer/{session_id}', 'AssigmentController@selectOptionsOnlyWithAnswer');

        Route::get('/finishedassigment/{type?}', 'AssigmentController@finishedAssigment');
        Route::post('/assigmentsession/checkandstore', 'AssigmentSessionController@checkAndStore');
        // ---------------------------------------
        Route::post('/publicpost/{post?}', 'PostController@setPublicPost');
        //-----------

        // api information ----------------------------------
        Route::get('/setting/information', 'SettingController@information');
        // --------------------------------------------------
        // api polymorphic untuk semua modules
        Route::apiResources([
            'comment' => 'CommentController',
        ]);

        Route::get('/users/grown/year/{year}/total', 'UserController@getMemberGrownByYear');

        Route::get('/users/grown/year/{year}/pnsmember', 'UserController@getPnsMemberByYear');

        Route::get('/users/grown/year/{year}/nonpnsmember', 'UserController@getNonPnsMemberByYear');

        Route::get('/users/grown/pnsmember', 'UserController@getPnsMember');

        Route::get('/users/grown/year/{year}/extendedmember', 'UserController@getExtendedMemberByYear');

        Route::get('/users/extendedmember', 'UserController@getExtendedMember');

        Route::get('/kongres/{id}/guide-location', 'Kongres2022Controller@getGuideLocation');

        Route::get('/kongres/{id}/guide-book', 'Kongres2022Controller@getGuideBook');

        Route::get('/users/{id}/kongres/surat-mandat', 'Kongres2022Controller@getKongres2022SuratMandat');

        Route::post('/kongres/surat-mandat', 'Kongres2022Controller@storeKongres2022SuratMandat');

        Route::get('/users/{id}/kongres/surat-tugas', 'Kongres2022Controller@getKongres2022SuratTugas');

        Route::post('/kongres/surat-tugas', 'Kongres2022Controller@storeKongres2022SuratTugas');

        Route::post('/kongres/payment/paymentUrl', 'Kongres2022Controller@createKongres2022Payment');

        Route::post('/kongres/attendance/store', 'AttendanceController@store');

        Route::get('/kongres/setting', 'Kongres2022Controller@getSetting');

        Route::get('/kongres/users/{id}/payment/checkstatus', 'Kongres2022Controller@checkPaymentStatus');

        Route::get('/kongres/users/{id}/payment/checkpayment', 'Kongres2022Controller@checkKongres2022Payment');

        Route::get('events/users/{id}/profitsum', 'EventController@getEventProfitSum');

        Route::get('events/users/{id}/profit', 'EventController@getEventProfit');

        Route::get('events/users/{id}/profitdates', 'EventController@getEventProtitDates');

        Route::get('events/users/{id}/withdrawprofit', 'EventController@getWithdrawEventProfit');

        Route::get('events/users/{id}/withdrawprofitdates', 'EventController@getWithdrawEventProfitDates');

        Route::get('events/payments/{id}/withdrawdetail', 'EventController@withdrawDetail');

        Route::post('events/users/requestwithdraw', 'EventController@requestWithdrawEventProfit');

        Route::get('events/{id}/registered/users', 'EventController@getRegisteredUsers');

        Route::post('events/{id}/paymenturl', 'EventController@paymentUrl');

        Route::get('events/{id}/paymentstatus', 'EventController@checkPaymentStatus');

        Route::get('events/{id}/partisipants', 'EventController@getPartisipants');

        Route::get('events/{id}/registered/users/count', 'EventController@getRegisteredUsersCount');

        Route::get('events/{id}/partisipants/count', 'EventController@getPartisipantsCount');

        Route::get('/users/active/count', 'UserController@getActiveUsers');

        Route::get('/users/active/listyear', 'UserController@getMemberGrownYears');

        Route::get('/users/active/grownbyyear/{year}', 'UserController@getMemberGrownByYear');

        Route::get('/users/active/grown', 'UserController@getMemberGrown');

        Route::get('/users/count', 'UserController@count');

        Route::get('/users/pns/search/{key}', 'UserController@searchPnsUsers');

        Route::get('/users/nonpns/search/{key}', 'UserController@searchNonPnsUsers');

        Route::get('/users/pns/count', 'UserController@getPnsCount');

        Route::get('/users/getall', 'UserController@index');

        Route::get('/users/getall/count', 'UserController@count');

        Route::get('/users/getexpired', 'UserController@getExpiredMembers');

        Route::get('/users/getexpired/count', 'UserController@getExpiredMembersCount');

        Route::get('/users/getexpired/search/{key}', 'UserController@searchExpiredMembers');

        Route::get('/users/pns', 'UserController@getPnsUsers');

        Route::get('/users/nonpns/count', 'UserController@getNonPnsCount');

        Route::get('/users/nonpns', 'UserController@getNonPnsUsers');

        Route::get('/users/setDefaultAvatar/{userId}', 'UserController@setDefaultAvatar'); // SET DEFAULT AVATAR FOR GIVEN USER ID

        Route::post('/users/changePassword', 'UserController@changePassword');

        Route::get('/getDetailTotalMember', 'UserController@getDetailTotalMember'); // route untuk mengambil total member tiap wilayah

        Route::post('/payment/paymentUrl', 'PaymentController@paymentUrl'); //route untuk pembayaran seperti store payment tapi return url untuk webview reactnative

        Route::get('/users/getbyprovince/{provinceId}', 'UserController@getByProvince'); //route untuk ambil data user by daerah

        Route::get('/users/getbycity/{provinceId}', 'UserController@getByCity');

        Route::get('/users/getbydistrict/{provinceId}', 'UserController@getByDistrict');

        Route::get('/users/search/{key}', 'UserController@searchbyname'); // SEARCH USER BY GIVEN KEY

        Route::post('/userslist', 'UserController@userslist');

        Route::post('/makeThumbnail/{bookId}', 'BookController@makeThumbnail'); // MAKE PDF THUMBNAIL

        Route::get('/lessonplans/search', 'LessonPlanController@searchbykey'); // SEARCH LESSONPLAN BY GIVEN KEY

        Route::get('/lessonplans/information', 'LessonPlanController@information'); // GET INFORMATION FOR RPP APPS

        Route::get('/payments/paymentreport/{from}/{to}', 'PaymentController@getPaymentReport');

        Route::get('/payments/paymentreportbyprovince/{from}/{to}/{provinceId}', 'PaymentController@getPaymentReportByProvince');

        Route::get('/payments/paymentreportbycity/{from}/{to}/{cityId}', 'PaymentController@getPaymentReportByCity');

        Route::get('/payments/getpaymentreportforardata', 'PaymentController@getPaymentReportForArdata');

        Route::get('/payments/getpaymentreportfordpp', 'PaymentController@getPaymentReportForDpp');

        Route::get('/payments/getpaymentreportforprovince/{provinceId}', 'PaymentController@getPaymentReportForProvince');

        Route::get('/payments/getpaymentreportforcity/{cityId}', 'PaymentController@getPaymentReportForCity');

        Route::get('/payments/bymonthyear/{month?}/{year?}', 'PaymentController@getPaymentByMonthYear');

        Route::get('/payments/bymonthyear/city/{province_id?}/{month?}/{year?}', 'PaymentController@getPaymentCityByMonthYear');

        Route::get('/payments/bymonthyear/cityusers/{city_id?}/{month?}/{year?}', 'PaymentController@getPaymentCityUsersByMonthYear');

        Route::post('/payments/transfer', 'PaymentController@transfer');

        Route::post('/payments/transfer/dpw', 'PaymentController@transferDpw');

        Route::post('/payments/transfer/dpd', 'PaymentController@transferDpd');

        Route::get('/payments/transfer/history', 'PaymentController@history');

        Route::get('/payments/transfer/history/dpw/{province_id}', 'PaymentController@historyDpw');

        Route::get('/payments/transfer/history/dpd/{city_id}', 'PaymentController@historyDpd');

        Route::get('/payments/getvaluetransactionstotal', 'PaymentController@paymenttransactiontotal');

        Route::get('/payments/getvaluetransactionstotaldpw/{province_id}', 'PaymentController@paymenttransactiontotalDPW');

        Route::get('/payments/getvaluetransactionstotaldpd/{city_id}', 'PaymentController@paymenttransactiontotalDPD');

        Route::get('/payments/getprovincepayment', 'PaymentController@getProvincePayment');

        Route::get('/payments/getcitypayment', 'PaymentController@getCityPayment');

        Route::post('/payments/getuniquepayment', 'PaymentController@makeUniquePayment');

        Route::post('/payments/confirmuniquepayment', 'PaymentController@confirmUniquePayment');

        Route::post('/payments/confirmovopayment', 'PaymentController@confirmOvoPayment');

        Route::get('/payments/extended/count', 'PaymentController@getExtendedCount');

        Route::get('/departments/dpw/provinces/{id}/getbytitle/{title}', 'DpwDepartmentController@getByTitle');

        Route::get('/departments/dpp/image', 'DppDepartmentController@getDepartmentTreeImage');

        Route::get('/departments/dpp/getbytitle/{title}', 'DppDepartmentController@getByTitle');

        Route::get('/departments/dpp/getperiode', 'DppDepartmentController@getPeriode');

        Route::get('/departments/dpp/getbyperiode/{start_year}', 'DppDepartmentController@getByPeriode');

        Route::get('/provinces/getprovinces', 'ProvinceController@getProvinces');

        Route::get('/provinces/payments/extended', 'ProvinceController@getPaymentsExtended');

        Route::get('provinces/{id}/cities/payments/extended', 'CityController@getPaymentsExtended');

        Route::get('provinces/{id}/cities/payments/extended/count', 'CityController@getPaymentsExtendedCount');

        Route::get('/provinces/{id}/getprovincebyid', 'ProvinceController@getProvinceById');

        Route::get('/provinces/{id}/departments/dpw/getperiode', 'DpwDepartmentController@getPeriode');

        Route::get('/provinces/{id}/departments/dpw/getbyperiode/{start_year}', 'DpwDepartmentController@getByPeriode');

        Route::get('/provinces/{provinceId}/pnsusers/search/{key}', 'ProvinceController@searchPnsUsers');

        Route::get('/provinces/{provinceId}/nonpnsusers/search/{key}', 'ProvinceController@searchNonPnsUsers');

        Route::get('/provinces/{id}/pnscount', 'ProvinceController@getPnsCount');

        Route::get('/provinces/{id}/getallmembers', 'UserController@getByProvince');

        Route::get('/provinces/{id}/getexpiredmembers', 'ProvinceController@getExpiredMembers');

        Route::get('/provinces/{id}/getexpiredmembers/count', 'ProvinceController@getExpiredMembersCount');

        Route::get('/provinces/{id}/getallmembers/count', 'UserController@getByProvinceCount');

        Route::get('/provinces/{id}/getexpiredmembers/search/{key}', 'ProvinceController@searchExpiredMembers');

        Route::get('/provinces/{id}/getallmembers/search/{key}', 'UserController@searchByProvince');

        Route::get('/provinces/{id}/pnsusers', 'ProvinceController@getPnsUsers');

        Route::get('/provinces/{id}/nonpnscount', 'ProvinceController@getNonPnsCount');

        Route::get('/provinces/{id}/nonpnsusers', 'ProvinceController@getNonPnsUsers');

        Route::get('/cities/{cityId}/pnsusers/search/{key}', 'CityController@searchPnsUsers');

        Route::get('/cities/{cityId}/nonpnsusers/search/{key}', 'CityController@searchNonPnsUsers');

        Route::get('/cities/{cityId}/pnscount', 'CityController@getPnsCount');

        Route::get('/cities/{cityId}/getallmembers', 'UserController@getByCity');

        Route::get('/cities/{cityId}/getexpiredmembers', 'CityController@getExpiredMembers');

        Route::get('/cities/{cityId}/getexpiredmembers/count', 'CityController@getExpiredMembersCount');

        Route::get('/cities/{cityId}/getallmembers/count', 'UserController@getByCityCount');

        Route::get('/cities/{cityId}/getexpiredmembers/search/{key}', 'CityController@searchExpiredMembers');

        Route::get('/cities/{cityId}/getallmembers/search/{key}', 'UserController@searchByCity');

        Route::get('/cities/{cityId}/pnsusers', 'CityController@getPnsUsers');

        Route::get('/cities/{cityId}/nonpnscount', 'CityController@getNonPnsCount');

        Route::get('/cities/{cityId}/nonpnsusers', 'CityController@getNonPnsUsers');

        Route::get('/districts/{districtId}/pnsusers/search/{key}', 'DistrictController@searchPnsUsers');

        Route::get('/districts/{districtId}/nonpnsusers/search/{key}', 'DistrictController@searchNonPnsUsers');

        Route::get('/districts/{districtId}/pnscount', 'DistrictController@getPnsCount');

        Route::get('/districts/{districtId}/getallmembers', 'UserController@getByDistrict');

        Route::get('/districts/{districtId}/getexpiredmembers', 'DistrictController@getExpiredMembers');

        Route::get('/districts/{districtId}/getallmembers/count', 'UserController@getByDistrictCount');

        Route::get('/districts/{districtId}/getexpiredmembers/count', 'DistrictController@getExpiredMembersCount');

        Route::get('/districts/{districtId}/getallmembers/search/{key}', 'UserController@searchByDistrict');

        Route::get('/districts/{districtId}/getexpiredmembers/search/{key}', 'DistrictController@searchExpiredMembers');

        Route::get('/districts/{districtId}/pnsusers', 'DistrictController@getPnsUsers');

        Route::get('/districts/{districtId}/nonpnscount', 'DistrictController@getNonPnsCount');

        Route::get('/districts/{districtId}/nonpnsusers', 'DistrictController@getNonPnsUsers');

        Route::get('/lessonplans/getbyeducationallevel/{id}', 'LessonPlanController@getByEducationalLevel'); // GET RPP BY EDUCATIONAL LEVEL

        Route::get('/lessonplans/getbycity/{id}', 'LessonPlanController@getbycity'); // GET RPP BY CITY ID

        Route::get('/lessonplans/getbyguideduser', 'LessonPlanController@getbyguideduser'); // GET GUIDED USER FOR RPP

        Route::get('/educationallevels/getbycity/{id}', 'EducationalLevelController@getbycity');

        Route::get('/assigmentquestionlists/search/{key}', 'AssigmentQuestionListController@search');

        Route::get('/getpostbycommentid/{id}', function ($id) {
            return \App\Models\Comment::with('commentable')->findOrFail($id);
        });

        Route::get('/payments/getstatus/{userId}', 'PaymentController@getStatus');
        // Route::get('/payments/getstatusfrombank/{userId}','PaymentController@getStatus');

        Route::get('/modules/getmodulescount', 'ModuleController@getmodulescount');
        Route::get('/modules/getlikedcount', 'ModuleController@getlikedcount');
        Route::get('/modules/getlikescount', 'ModuleController@getlikescount');
        Route::get('/modules/getpublish', 'ModuleController@getpublish');
        Route::get('/modules/getunpublish', 'ModuleController@getunpublish');
        Route::get('/modules/getalllatest', 'ModuleController@getalllatest');
        Route::get('/modules/getbyeducationallevel/{educationalLevelId}/{search?}', 'ModuleController@getbyeducationallevel');
        Route::get('/modules/read/{id}', 'ModuleController@readModule');

        Route::get('/conversations/get_unread_count', 'ConversationController@getUnreadCount');
        // Route::delete('/conversations/{conversation_id}', 'ConversationController@destroy');
        //Route::get('/modules/s/{educationalLevelId}/{search?}','ModuleController@getbyeducationallevel');
        //Route::get('/modules/')
        //Route::get('/modules/{moduleId}/getcomments','ModuleController@getbyeducationallevel');
        //api untuk semua modul
        //Route::get('/template/owned','TemplateController@owned');

        Route::middleware('isTeacher')->get('/question_item/payable', 'QuestionListController@payableItemList');
        Route::middleware('isTeacher')->post('/question_item/setispaid/{question_list_id}', 'QuestionListController@setIsPaid');
        Route::middleware('isTeacher')->get('/question_item/payable/{question_list_id}', 'QuestionListController@getPayableItem');

        Route::middleware('isTeacher')->get('/question_package/payable', 'AssigmentController@payableItemList');
        Route::middleware('isTeacher')->post('/question_package/setispaid/{assigment_id}', 'AssigmentController@setIsPaid');
        Route::middleware('isTeacher')->get('/question_package/payable/{assigment_id}', 'AssigmentController@getPayableItem');

        Route::middleware('isTeacher')->get('/assignment/payablecount', 'AssigmentController@getPayableCount');

        Route::middleware('isTeacher')->get('/assignment/payable/profit', 'UserController@profit');
        Route::middleware('isTeacher')->get('/assignment/payable/profit/question_items', 'QuestionListController@getPayableLists');
        Route::middleware('isTeacher')->get('/assignment/payable/profit/question_packages', 'AssigmentController@getPayableLists');

        Route::get('balance', function (Request $request) {
            $user = $request->user();
            return $user->balance();
        });

        // Route::get('/question_package/payable');
        Route::middleware('isTeacher')->get('/test', function (Request $request) {
            return $request->user()->role;
        });

        //===BEGIN [menampilkan question_lists.answer_lists tanpa kunci jawabannya]=========///
        Route::get('/assigments/{assigment_id}/show', 'AssigmentController@show2');
        Route::get('/assigments/{assigment_id}/show_shuffle', 'AssigmentController@show2shuffle');
        //==================================END============================================/

        Route::post('/assigmentsessions/store2', 'AssigmentSessionController@store2');
        // menampilkan list jawaban yg disubmit dan jawaban yang benar berdasarkan question_lists yg diacak sebelumnya
        Route::get('/assigmentsessions/{session_id}/review', 'AssigmentSessionController@review');

        Route::get('/assigments/{assigment_id}/history', 'AssigmentSessionController@history');
        Route::post('/assigments/history', 'AssigmentSessionController@history2');

        Route::get('/assigments_tag/history', 'AssigmentSessionController@assigmentsTagHistory');
        Route::post('assigments_tag', 'TaggableController@assigmentsTag');

    });

    // END API WITH SECURITY ---------------------------------------------------------------------------------

    // API WITHOUT SECURITY ----------------------------------------------------------------------------

    Route::post('/getassigmentsinfo', 'AssigmentController@getAssigmentsInfo');

    Route::get('/users/searchbyemail/{key}', 'UserController@searchbyemail'); // SEARCH USER BY Email
    Route::post('/quickpaymentUrl', 'PaymentController@quickPaymentUrl'); //route untuk pembayaran seperti store payment tapi return url untuk webview reactnative
    Route::get('/quickgetstatus/{userId}', 'PaymentController@getStatus');

    Route::apiResources([
        'settings' => 'SettingController',
    ]);

    Route::post('/register', 'UserController@register'); // FOR REGISTER PURPOSE

    Route::post('/payment/notification/handler', 'PaymentController@notificationHandler'); // PAYMENT NOTIFICATION HANDLER

    Route::post('/payment/notification/queuehandler', 'PaymentController@notificationQueueHandler'); // NOT FOR PRODUCTION NOTIFICATION HANDLER WITH QUEUE

    Route::get('/payment/notification/test/{id}', 'PaymentController@test'); // TEST PAYMENT NOTIFICATION

    Route::get('/lessonplans/download/{id}', 'LessonPlanController@download'); // DOWNLOAD RPP

    Route::get('/membercard/{userId}', 'UserController@membercard'); // DOWNLOAD KARTU ANGGOTA AS IMAGE

    Route::get('/post', 'PostController@index');

    Route::post('/post/report', 'PostController@report');

    Route::post('/post/read', 'PostController@readPost');

    Route::get('/ads/getactive', 'AdController@getactive');

    Route::get('/questionnaries/getactive', 'QuestionnaryController@getactive');

    Route::apiResource('/notification', 'NotificationController');

    Route::get('/notification_total', function () {
        $user_id = auth('api')->user() ? auth('api')->user()->id : null;
        if (!$user_id) {
            return abort(403, "User not authenticated");
        }

        return \App\Models\User::withCount('unreadNotifications')->findOrFail($user_id);
    });

    Route::post('/notification_markasread', function (Request $request) {
        return \App\Models\User::findOrFail(auth('api')->user()->id)->unreadNotifications()->update(['read_at' => now()]);
    });

    Route::get('/assigments/statistics', 'AssigmentController@statistics');
    Route::get('/assigments/{id}/{teacher_id}/downloadexcel', 'AssigmentController@downloadexcel');

    Route::get('/testgan', function () {
        return DB::table('users')->paginate();
        $questionnary_id = 1;
        $res = \App\Models\QuestionList::with(['answer_lists' => function ($query) {
            $query->withCount('answers');
        }])->has('answer_lists')->whereHas('questionnaries', function ($query) {
            $query->where('questionnary_id', '=', 1);
        });
        return $res->get();
        return $res->assigment->code;
        $a = \App\Models\Post::find(1);
        return $a->loadCount('user_reports');
        return $a->readers()->syncWithoutDetaching([1]);
    });

    Route::get('/kongres/{eventId}/member/{userId}/payment/status', 'Kongres2022Controller@getPaymentStatus');

    Route::get('/kongres/{eventId}/users/{userId}/surat', 'Kongres2022Controller@getSurat');

    Route::get('/event/{eventId}/report/excel/registered', 'EventController@registeredUserReportExcel');

    Route::get('/event/{eventId}/report/excel/attended', 'EventController@attendedUserReportExcel');

    Route::get('/user/{userId}/expired/status', 'UserController@expiredStatus');

    Route::get('/contact/admin', 'ContactController@admin');

    Route::get('/contact/edit-data', 'ContactController@editData');

    // END API WITHOUT SECURITY ------------------------------------------------------------------------

    // New ------------------------------------------
    // Mengambil data acara dan peserta nya
    Route::get('/get-event-by-id/{id}', 'EventController@getEventById');
});
