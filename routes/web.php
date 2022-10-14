<?php
use App\Helper\Firestore;
// use Thumbnail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return abort(403,'Untuk pendaftaran KTA DIGITAL silahkan menggunakan aplikasi yang bisa didownload di playstore');
    return Redirect::to('https://web.agpaiidigital.org');
});

Route::get('/perpanjangcepat', 'PaymentController@perpanjangcepat');
Route::get('/watzap/user/active/{total}/from/{startDate}/to/{toDate}', 'WatzapController@getActiveUsers');
Route::get('/watzap/perpanjang/{total}', 'UserController@perpanjangv1');
Route::get('/watzap/perpanjang/ambil/{total}/dari/{start_date}/sampai/{end_date}', 'UserController@perpanjangv2');
Route::get('/watzap/guruPns/{total}', 'UserController@guruPns');
Route::get('/watzap/guruNonPns/{total}', 'UserController@guruNonPns');
Route::get('/watzap/province/{provinceId}/users/active/{total}', 'WatzapController@getActiveUserByProvince');

// Route::get('/user/{userId}/generate-membercard', 'API\v2\member\UserMemberCardController@index');
Route::apiResource('user.cetak-member-card', 'API\v2\member\UserMemberCardController')->names('web.user.cetak-member-card');
Route::resource('user.member-card', 'UserMemberCardController')->names('user.member-card');
Route::get('duplicate-daily-prayer', function () {
    $files = \App\Models\File::where('file_type', 'App\Models\DailyPrayer')->get();
    // return $file_murottals;
    $audios = [];
    foreach ($files as $index => $file) {
        $res = \App\Models\Member\File::firstOrNew([
            'name' => $file->name,
            'file_type' => 'App\Models\Member\DailyPrayer',
        ]);
        $res->fill($file->toArray());
        $res->file_type = 'App\Models\Member\DailyPrayer';
        $audios[$index] = $res;
        $res->save();
    }
    return response()->json($audios);
});

Route::get('/replace-murottal-src', function () {
    $files = \App\Models\File::where('file_type', 'App\Models\Member\Murottal')->get();

    $files = $files->map(function ($file) {
        $json = json_decode($file->src);
        // $file->src = $json;
        if (isset($json[0])) {
            $file->src = $json[0]->download_link;
        } else {
            $file->src = $json;
        }
        $file->save();
        return $file;
    });

    $files = \App\Models\File::where('file_type', 'App\Models\Member\DailyPrayer')->get();

    $files = $files->map(function ($file) {
        $json = json_decode($file->src);
        // $file->src = $json;
        if (isset($json[0])) {
            $file->src = $json[0]->download_link;
        } else {
            $file->src = $json;
        }
        $file->save();
        return $file;
    });

    return response()->json($files);
});

Auth::routes();
//logout khusus questionnary page
Route::post('/logout2', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout2');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::group(['middleware' => ['admin.user']], function () {
        Route::get('attendance', 'AttendanceController@index')->name('voyager.attendance');
        Route::get('accountarea', 'UserController@accountarea')->name('voyager.accountarea');
        Route::get('secure', 'SecureController@index');
        Route::get('reset/password/{email}', 'SecureController@resetPassword');
        Route::get('makeThumbnails/{id}', 'SecureController@makeThumbnails');
        Route::get('userreport', 'Admin\\UserReportAdminController@index')->name('voyager.userreport.index');
        Route::get('userreport2', 'UserController@userreport2');

        Route::get('textfield_question_analytic', function () {
            return view('textfield_question_analytic.index');
        })->name('voyager.textfield.questionanalytic');

        Route::get('selectoptions_question_analytic', function () {
            return view('selectoptions_question_analytic.index');
        })->name('voyager.selectoptions.questionanalytic');

        Route::get('question_package_analytic', function () {
            return view('question_package_analytic.index');
        })->name('voyager.questionpackageanalytic');

        Route::prefix('topsis')->group(function () {
            Route::get('question_package_analytic', function () {
                return view('question_package_analytic.topsis.index');
            })->name('voyager.topsis.questionpackageanalytic');

            Route::get('textfield_question_analytic', function () {
                return view('textfield_question_analytic.topsis.index');
            })->name('voyager.topsis.textfield.questionanalytic');

            Route::get('selectoptions_question_analytic', function () {
                return view('selectoptions_question_analytic.topsis.index');
            })->name('voyager.topsis.selectoptions.questionanalytic');
        });

        Route::prefix('api')->group(function () {
            Route::get('textfield_question_analytic', 'API\\Admin\\TextfieldQuestionAnalyticController@index');
            Route::get('selectoptions_question_analytic', 'API\\Admin\\SelectoptionsQuestionAnalyticController@index');
            Route::get('question_package_analytic', 'API\\Admin\\QuestionPackageAnalyticController@index');

            Route::prefix('topsis')->group(function () {
                Route::get('textfield_question_analytic', 'API\\Admin\\TextfieldQuestionAnalyticController@topsis');
                Route::get('question_package_analytic', 'API\\Admin\\QuestionPackageAnalyticController@topsis');
                Route::get('selectoptions_question_analytic', 'API\\Admin\\SelectoptionsQuestionAnalyticController@topsis');
            });
        });
    });
});

// Route::group(['middleware' => ['auth', 'checkSubAdmin']], function () {
//     Route::get('/users_report', "UserController@index2");
// });

// Route::group(['middleware' => ['admin.user']], function () {

//     Route::get('/userreport', 'UserController@index');
//     Route::get('/paymentreport', 'PaymentController@report');
//     Route::get('/secure/makeFilePublic', 'SecureController@makeFilePublic');

// });

Route::get('/terms-conditions', 'TermConditionController@index');
// Route::get('/rekap', function () {
//     return Redirect::to('https://docs.google.com/spreadsheets/d/1ZXmrGnNJZ9-kjq2rDeNcNdIdeb6v8J34HeRd1WYJ1K8/edit?usp=sharing');
// });

Route::group(['middleware' => [
    'expired',
    'auth',
]], function () {
    // Route::get('/resetsuccess', function () {
    //     return view('auth.passwords.success');
    // });
    // // -----------------------
    // Route::get('/home', function () {
    //     return abort(403, 'Untuk pendaftaran KTA DIGITAL silahkan menggunakan aplikasi yang bisa didownload di playstore');
    // });
    // Route::get('/test/{paymentId}', 'PaymentController@test');
});

Route::get('/getcontactnumber', function () {
    // $numbers = [
    //     '6285641161238', //nomer mas rendy
    // ];
    // return $numbers[rand(0, count($numbers) - 1)];
});

// Route::get('/best', 'ExcelController@best');

// Route::get('/pns-statuses', [App\Http\Controllers\Voyager\PnsStatusController::class, 'index']);

// Route::get('/total_pns_semua_jenjang', function () {
//     $data = DB::select("select
//     el.name,count(*) as total_guru_pns
// from users u
//     inner join profiles p on p.user_id=u.id
//     inner join educational_levels el on el.id=p.educational_level_id
//     inner join pns_statuses ps on ps.user_id=u.id
//     where
//         p.educational_level_id is not null and
//         ps.is_pns=1
//     group by p.educational_level_id");
//     echo "<table border=1><tr><th>Jenjang</th><th>Jumlah guru pns</th></tr>";
//     $t = 0;
//     foreach ($data as $d) {
//         echo "<tr><td>{$d->name}</td><td>{$d->total_guru_pns}</td></tr>";
//         $t += $d->total_guru_pns;
//     }
//     echo "</table>";
//     echo "<br>Total: {$t}";
// });

// Route::get('/total_non_pns_semua_jenjang', function () {
//     $data = DB::select("select
//     el.name,count(*) as total_guru_non_pns
// from users u
//     inner join profiles p on p.user_id=u.id
//     inner join educational_levels el on el.id=p.educational_level_id
//     inner join pns_statuses ps on ps.user_id=u.id
//     where
//         p.educational_level_id is not null and
//         ps.is_pns=0
//     group by p.educational_level_id");
//     echo "<table border=1><tr><th>Jenjang</th><th>Jumlah guru NON pns</th></tr>";
//     $t = 0;
//     foreach ($data as $d) {
//         echo "<tr><td>{$d->name}</td><td>{$d->total_guru_non_pns}</td></tr>";
//         $t += $d->total_guru_non_pns;
//     }
//     echo "</table>";
//     echo "<br>Total: {$t}";
// });

// Route::get('/pemetaan_provinsi', function () {
//     $data = DB::select("select
//     ps.is_pns,p.educational_level_id,el.name as jenjang, p.province_id, pr.name as provinsi,count(*) as total
// from users u
//     inner join profiles p on p.user_id=u.id
//     inner join educational_levels el on el.id=p.educational_level_id
//     inner join provinces pr on pr.id=p.province_id
//     inner join pns_statuses ps on ps.user_id=u.id
//     where
//         ps.is_pns in (0,1) and
//         p.educational_level_id is not null and
//         p.province_id is not null
//     group by p.educational_level_id,p.province_id,ps.is_pns");

//     $anjay = [];
//     foreach ($data as $key => $val) {
//         $jenjang = ['SD' => 0, 'SMP' => 0, 'SMA' => 0, 'SMK' => 0, 'TK' => 0, 'SLB' => 0];
//         $anjay[$val->provinsi]['pns'] = $jenjang;
//         $anjay[$val->provinsi]['nonpns'] = $jenjang;
//     }
//     foreach ($data as $key => $val) {
//         $status_pns = $val->is_pns ? 'pns' : 'nonpns';
//         $anjay[$val->provinsi][$status_pns][$val->jenjang] = $val->total;
//     }
//     return view('statistic.pns_statuses_provinsi', ['data' => $anjay]);

// });

// Route::get('/pemetaan_jenjang', function () {
//     $data = DB::select("select
//     el.name as jenjang,ps.is_pns,count(*) as total
// from users u
//     inner join profiles p on p.user_id=u.id
//     inner join educational_levels el on el.id=p.educational_level_id
//     inner join pns_statuses ps on ps.user_id=u.id
//     where
//         p.educational_level_id is not null and
//         ps.is_pns in (0,1)
//     group by p.educational_level_id, ps.is_pns");

//     $anjay = [];
//     foreach ($data as $key => $val) {
//         $status_pns = $val->is_pns ? 'pns' : 'nonpns';
//         $anjay[$val->jenjang][$status_pns] = $val->total;
//     }
//     return view('statistic.pns_statuses_jenjang', ['data' => $anjay]);

// });

// Route::get('/pemetaan_provinsi/sertifikasi', function () {
//     $data = DB::select("select
//     ps.is_certification,p.educational_level_id,el.name as jenjang, p.province_id, pr.name as provinsi,count(*) as total
// from users u
//     inner join profiles p on p.user_id=u.id
//     inner join educational_levels el on el.id=p.educational_level_id
//     inner join provinces pr on pr.id=p.province_id
//     inner join pns_statuses ps on ps.user_id=u.id
//     where
//         ps.is_certification in (0,1) and
//         p.educational_level_id is not null and
//         p.province_id is not null
//     group by p.educational_level_id,p.province_id,ps.is_certification");

//     $anjay = [];
//     foreach ($data as $key => $val) {
//         $jenjang = ['SD' => 0, 'SMP' => 0, 'SMA' => 0, 'SMK' => 0, 'TK' => 0, 'SLB' => 0];
//         $anjay[$val->provinsi]['certificated'] = $jenjang;
//         $anjay[$val->provinsi]['noncertificated'] = $jenjang;
//     }
//     foreach ($data as $key => $val) {
//         $status_sertfifikasi = $val->is_certification ? 'certificated' : 'noncertificated';
//         $anjay[$val->provinsi][$status_sertfifikasi][$val->jenjang] = $val->total;
//     }
//     return view('statistic.is_sertifikasi_provinsi', ['data' => $anjay]);
// });

// Route::get('/pemetaan_jenjang/sertifikasi', function () {
//     $data = DB::select("select
//     el.name as jenjang,ps.is_certification,count(*) as total
// from users u
//     inner join profiles p on p.user_id=u.id
//     inner join educational_levels el on el.id=p.educational_level_id
//     inner join pns_statuses ps on ps.user_id=u.id
//     where
//         p.educational_level_id is not null and
//         ps.is_certification in (0,1)
//     group by p.educational_level_id, ps.is_certification");

//     $anjay = [];
//     foreach ($data as $key => $val) {
//         $status_sertfifikasi = $val->is_certification ? 'certificated' : 'noncertificated';
//         $anjay[$val->jenjang][$status_sertfifikasi] = $val->total;
//     }
//     return view('statistic.is_sertifikasi_jenjang', ['data' => $anjay]);
// });

// Route::get('/pemetaan_jumlah_guru', function (Request $request) {

//     $category1 = $request->query('category1') == 'sertifikasi' ? 'sertifikasi' : 'pns';
//     $category2 = $request->query('category2') == 'jenjang' ? 'jenjang' : 'provinsi';

//     $column1 = $category1 == 'pns' ? 'is_pns' : 'is_certification';

//     if ($category2 == "provinsi") {
//         $data = DB::select("select
//     ps.{$column1},p.educational_level_id,el.name as jenjang, p.province_id, pr.name as provinsi,count(*) as total
// from users u
//     inner join profiles p on p.user_id=u.id
//     inner join educational_levels el on el.id=p.educational_level_id
//     inner join provinces pr on pr.id=p.province_id
//     inner join pns_statuses ps on ps.user_id=u.id
//     where
//         ps.{$column1} in (0,1) and
//         p.educational_level_id is not null and
//         p.province_id is not null
//     group by p.educational_level_id,p.province_id,ps.{$column1}");

//         $anjay = [];

//         $status = $category1 == 'pns' ? 'pns' : 'certificated';
//         $status_non = $category1 == 'pns' ? 'nonpns' : 'noncertificated';
//         foreach ($data as $key => $val) {
//             $jenjang = ['SD' => 0, 'SMP' => 0, 'SMA' => 0, 'SMK' => 0, 'TK' => 0, 'SLB' => 0];
//             // $index = array_search($val->jenjang,array_keys($jenjang));

//             $anjay[$val->provinsi][$status] = $jenjang;
//             $anjay[$val->provinsi][$status_non] = $jenjang;

//         }

//         $arr_check = ['pns', 'nonpns'];
//         if ($category1 == 'sertifikasi') {
//             $arr_check = ['certificated', 'noncertificated'];
//         }

//         foreach ($data as $key => $val) {
//             $status_ = $val->{$column1} ? $arr_check[0] : $arr_check[1];
//             $anjay[$val->provinsi][$status_][$val->jenjang] = $val->total;
//         }

//         return view('statistic.pemetaan_provinsi', ['data' => $anjay, 'category1' => $category1]);

//     } else {
//         $data = DB::select("select
//         el.name as jenjang,ps.{$column1},count(*) as total
//     from users u
//         inner join profiles p on p.user_id=u.id
//         inner join educational_levels el on el.id=p.educational_level_id
//         inner join pns_statuses ps on ps.user_id=u.id
//         where
//             p.educational_level_id is not null and
//             ps.{$column1} in (0,1)
//         group by p.educational_level_id, ps.{$column1}");

//         if ($column1 == 'is_pns') {
//             //#total user yang aktif dan sudah isi profile tapi belum mengisi status PNS
//             $data2 = DB::select("select
//                     count(*) as total
//                 from users u
//                 where u.user_activated_at is not null and
//                 exists (
//                     select 1 from profiles p where p.user_id=u.id
//                 ) and
//                 not exists (
//                     select 1 from pns_statuses ps where ps.user_id=u.id
//                 )
//                 ");

//         } else {
//             //#total user yang aktif dan sudah isi profile, atau sudah isi status PNS, tapi belum mengisi status sertifikasi
//             $data2 = DB::select("
//                 select
//                     count(*) as total
//                 from users u
//                 where u.user_activated_at is not null and
//                 exists (
//                     select 1 from profiles p where p.user_id=u.id
//                 ) and
//                 (not exists (
//                         select 1 from pns_statuses ps where ps.user_id=u.id
//                     ) or
//                     exists (
//                         select 1 from pns_statuses ps where ps.user_id=u.id and ps.is_certification is null
//                     )
//                 )
//                 ");
//         }

//         $anjay = [];

//         $arr_check = ['pns', 'nonpns'];
//         if ($category1 == 'sertifikasi') {
//             $arr_check = ['certificated', 'noncertificated'];
//         }

//         foreach ($data as $key => $val) {
//             $status = $val->{$column1} ? $arr_check[0] : $arr_check[1];
//             $anjay[$val->jenjang][$status] = $val->total;
//         }

//         return view('statistic.pemetaan_jenjang', ['data' => $anjay, 'category1' => $category1, 'data2' => $data2]);
//     }

// });

Route::get('/tes', function () {
    $firestore = new Firestore;

    $data = [
        'user_id' => 1,
        'candidate_id' => 2,
    ];

    $store = $firestore->storeVote($data);

    $firestore = $firestore->getDb()->collection('candidates');
    // return response()->json($firestore);
    $documents = $firestore->documents();
    $data = [];
    foreach ($documents as $document) {
        $data[] = $document->data();
    }
    return response()->json($data);
});
