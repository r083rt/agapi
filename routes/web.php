<?php

use App\Models\Department;
use App\Http\Controllers\API\v2\member\EventParticipantController;
use App\Models\IslamicStudy;
// use DB
use Illuminate\Support\Facades\DB;
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
use App\Helper\Midtrans;

Route::get('/', function () {
    // return abort(403,'Untuk pendaftaran KTA DIGITAL silahkan menggunakan aplikasi yang bisa didownload di playstore');
    return Redirect::to('https://web.agpaiidigital.org');
});

Route::get('/user/{userId}/membercard/front', 'MemberCardController@previewFrontCard')->name('member-card-front');

Route::get('/user/{userId}/membercard/back', 'MemberCardController@previewBackCard')->name('member-card-back');

Route::get('/azwar/year/{year}/month/{month}', function ($year, $month) {
    $perpanjangan = \App\Models\Payment::where('key', 'perpanjangan_anggota')
        ->whereYear('created_at', $year)
        ->whereMonth('created_at', $month)
        ->where('status', 'success');
    $sumPerpanjangan = $perpanjangan->sum('value');
    $countPerpanjangan = $perpanjangan->count();

    $pendaftaran = \App\Models\Payment::where('key', 'pendaftaran')
        ->whereYear('created_at', $year)
        ->whereMonth('created_at', $month)
        ->where('status', 'success');
    $sumPendaftaran = $pendaftaran->sum('value');
    $countPendaftaran = $pendaftaran->count();

    // feePendaftaran = 10 ribu dari each pendaftaran
    $feePendaftaran = $countPendaftaran * 10000;
    $feePerpanjangan = $countPerpanjangan * 30000;

    return response()->json([
        'pendaftaran' => $countPendaftaran,
        'perpanjangan' => $countPerpanjangan,
        'pendaftaran_total' => $sumPendaftaran,
        'perpanjangan_total' => $sumPerpanjangan,
        'total' => $sumPendaftaran + $sumPerpanjangan,
        'ardata' => $feePendaftaran + $feePerpanjangan,
        'azwar' => ($sumPendaftaran + $sumPerpanjangan) * 30 / 100,
    ]);
});

// Route::get('/midtrans',function(){
//     $test = Midtrans::createTransaction([
//         'transaction_details' => [
//             'order_id' => rand(),
//             'gross_amount' => 10000,
//         ],
//         'customer_details' => [
//             'first_name' => 'budi',
//             'last_name' => 'pratama',
//             'email' => 'ardata.indonesia@gmail.com',
//             'phone' => '08111222333',
//         ],
//         'item_details' => [
//             [
//                 'id' => 'a1',
//                 'price' => 10000,
//                 'quantity' => 1,
//                 'name' => 'Adidas f50'
//             ]
//         ]
//     ]);
//     return $test;
// });

// Route::get('ceking',function(){
//     $res = \App\Models\User::where('user_activated_at','!=',null)
//     ->whereDoesntHave('payments',function($q){
//         $q->where('status','success')->where('key','pendaftaran');
//     })
//     ->get();
// });

Route::get('/fix-status-pensiun', function () {

    // $c = \App\Models\User::whereHas('role', function ($q) {
    //     $q->whereIn('name', ['pensiun', 'admin', 'siswwa']);
    // })->count();
    // return $c;
    // user yang umur nya lebih dari 60 tahun di set role nya menjadi pensiun dengan role_id 13

    $users = \App\Models\User::where('user_activated_at', '!=', null)
        ->where('role_id', '!=', 13)
        ->whereHas('profile', function ($q) {
            // yang umur nya lebih dari 60 tahun
            $q->where('birthdate', '<', \Carbon\Carbon::now()->subYears(60)->format('Y-m-d'));
        });

    $res = $users->count();

    $users->update(['role_id' => 13]);


    return response()->json([
        'message' => 'success',
        'data' => "total user yang di set role_id menjadi pensiun adalah $res"
    ]);
});

Route::get('/perpanjangcepat', 'PaymentController@perpanjangcepat');
Route::get('/watzap/user/active/{total}/from/{startDate}/to/{toDate}', 'WatzapController@getActiveUsers');
Route::get('/watzap/perpanjang/{total}', 'UserController@perpanjangv1');
Route::get('/watzap/perpanjang/ambil/{total}/dari/{start_date}/sampai/{end_date}', 'UserController@perpanjangv2');
Route::get('/watzap/guruPns/{total}', 'UserController@guruPns');
Route::get('/watzap/guruNonPns/{total}', 'UserController@guruNonPns');
Route::get('/watzap/province/{provinceId}/users/active/{total}', 'WatzapController@getActiveUserByProvince');
Route::get('/watzap/info', 'WatzapController@info');
Route::get('/watzap/info/dari/{from}/sampai/{to}', 'WatzapController@infoByDate');
Route::get('/watzap/fixExpiredAt', 'WatzapController@fixExpiredAt');

// Route::get('/user/{userId}/generate-membercard', 'API\v2\member\UserMemberCardController@index');
Route::apiResource('user.cetak-member-card', 'API\v2\member\UserMemberCardController')->names('web.user.cetak-member-card');
Route::resource('user.member-card', 'UserMemberCardController')->names('web.user.member-card');
Route::get('event/{eventId}/barcode', 'EventBarcodeController@index')->name('web.event.barcode');
Route::get('event/{eventId}/download', 'EventBarcodeController@download')->name('web.event.download');
Route::get('event/{eventId}/participant/{userId}', 'EventParticipantController@show')->name('web.event.participant');

//generate cover rpp
Route::get('/lesson-plans/{creator_id}/{topic}/{subject}/{grade}/generate/cover/{cover_id}', 'LessonPlanCoverController@coverlessonplan')->name('web.lesson-plan-cover');

//generate cover module
Route::get('/module/{user_id}/{name}/{subject}/{grade}/generate/cover/{cover_id}', 'ModuleCoverController@covermodule')->name('web.module-cover');

Route::get('test', function () {
    $images = App\Models\File::where('type', 'like', 'imagPe%')->limit(10)->orderBy('created_at', 'desc')->count();
    $res = DB::table('users')
        // ->where('user_activated_at', '!=', null)
        // ->join('payments', 'users.id', '=', 'payments.payment_id')
        // ->where('payments.payment_type', '=', 'App\Models\User')
        ->join('payments', 'users.id', '=', 'payments.user_id')
        ->select(
            DB::raw("count(distinct users.id,DATE_FORMAT(payments.created_at,'%Y-%m')) as total"),
            DB::raw('YEAR(payments.created_at) as year'),
            DB::raw('MONTHNAME(payments.created_at) as month')
        )
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->get();
    return [
        "status" => "success",
        "FILE DRIVER" => env('FILESYSTEM_DRIVER'),
        "APP NAME" => env("APP_NAME"),
        "NODE PATH" => env('NODE_BINARY_PATH'),
        "CHROME PATH" => env('CHROME_BINARY_PATH'),
        "TOTAL GAMBAR" => $images,
        "payment" => $res
    ];
});

Route::get('/generate', function () {
    $card = EventParticipantController::generateCard(7, 1);
    return $card;
});

Route::get('/generate2', function () {
    $card = App\Http\Controllers\API\v2\member\UserMemberCardController::index(1);
    return response()->json($card);
});

Route::get('/generate3', function () {
    $card = Spatie\Browsershot\Browsershot::url('https://google.com')
        ->noSandbox()
        ->windowSize(600, 600)
        ->fullPage()
        ->setNodeBinary(env('NODE_BINARY_PATH', '/usr/bin/node'))
        ->setNpmBinary(env('NPM_BINARY_PATH', '/usr/bin/npm'))
        ->setChromePath(env('CHROME_BINARY_PATH', '/usr/lib/node_modules/chromium'))
        ->base64Screenshot();
    return response()->json($card);
});

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
    $islamic_studies = IslamicStudy::with('content')
        ->withCount('upvotes')
        ->orderBy('upvotes_count', 'desc')
        ->get();

    return response()->json($islamic_studies);
});

Route::get('/cek-perpanjangan-kongres', function () {
    // hitung users yang bayar kongres dan expired_at nya sudah lewat
    $users = App\Models\User::where('user_activated_at', '!=', null)
        ->where('expired_at', '<', \Carbon\Carbon::now())
        ->wherehas('payments', function ($query) {
            $query->where('key', 'pendaftaran_kongres_tahun_2022')
                ->where('status', 'success');
        })->count();

    return response()->json([
        'status' => 'success',
        'data' => $users
    ]);
});
