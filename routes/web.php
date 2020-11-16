<?php

use Illuminate\Support\Facades\Route;

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
use \Illuminate\Support\Facades;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use Illuminate\Http\Request;


Route::get('/', function () {
    // return abort(403,'Untuk pendaftaran KTA DIGITAL silahkan menggunakan aplikasi yang bisa didownload di playstore');
    return Redirect::to('https://web.agpaiidigital.org');
});

Auth::routes();
//logout khusus questionnary page
Route::post('/logout2',function(){
    Auth::logout();
    return redirect('/login');
})->name('logout2');
// Route::get('login_questionnary',function(){
//     return view('pages.questionnary.login');
// });
// Route::get('login', function(){
//     return abort(403,'Untuk pendaftaran KTA DIGITAL silahkan menggunakan aplikasi yang bisa didownload di playstore');
// })->name('login');
// Route::get('register', function(){
//     return abort(403,'Untuk pendaftaran KTA DIGITAL silahkan menggunakan aplikasi yang bisa didownload di playstore');
// })->name('register');
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::group(['middleware' => ['admin.user']], function () {
        Route::get('attendance', 'AttendanceController@index')->name('voyager.attendance');
        Route::get('accountarea', 'UserController@accountarea')->name('voyager.accountarea');
        Route::get('secure','SecureController@index');
        Route::get('reset/password/{email}','SecureController@resetPassword');
        Route::get('makeThumbnails/{id}','SecureController@makeThumbnails');
        Route::get('userreport','Admin\\UserReportAdminController@index')->name('voyager.userreport.index');
    });
});

Route::group(['middleware'=>['auth','checkSubAdmin']], function(){
    Route::get('/users_report', "UserController@index2");
    //Route::post()
});

Route::group(['middleware'=>['auth','checkSurveyor']],function(){
    Route::post('/questionnary','QuestionnaryController@store');
    
    Route::post('/questionnary/data/{questionnary_id}',function($questionnary_id){
        
        //return \Carbon\Carbon::today();
        return \App\Models\QuestionList::with(['answer_lists'=>function($query){
            $query->withCount('answers');
        }])->has('answer_lists')->whereHas('questionnaries',function($query)use($questionnary_id){
         $query->where('questionnary_id','=',$questionnary_id);
        })->get();  
    });
    Route::get('getquestionnaries', function(Request $request){
        return \App\Models\Questionnary::where('user_id',$request->user()->id)->withCount('sessions')->get();
    });

    Route::get('/questionnaries_report','QuestionnaryController@index');
    Route::post('/questionnary/filter_data/{questionnary_id}', function($questionnary_id, Request $request){
        //return $request;
    $filter_options=$request;
    // return \App\Models\Answer::with('question.session.user.profile')->whereHas('question.session.user.profile',function($query)use($filter_options){
    //     $query->whereBetween('profiles.birthdate',[$filter_options['begin_date'],$filter_options['end_date']]);
    // })->limit(10)->orderBy('id','desc')->get();

    //return $filter_options;
    return \App\Models\QuestionList::with(['answer_lists'=>function($query)use($filter_options){
        $query->withCount(['answers'=>function($query2)use($filter_options){
            $query2->whereHas('question.session.user.profile',function($query3)use($filter_options){

                //filter umur
                
                $begin_date=\Carbon\Carbon::now()->subYears($filter_options->age_range[1])->format('Y-m-d');
                $end_date=\Carbon\Carbon::now()->subYears($filter_options->age_range[0])->format('Y-m-d');
                $query3->whereBetween('birthdate',[$begin_date, $end_date]);

                //filter gender
                if($filter_options['gender']=='L' || $filter_options['gender']=='P'){$query3->where('gender','=',$filter_options['gender']);
                }

                //filter educational_level
                if($filter_options['educational_level']['id']!='-1')$query3->where('educational_level_id','=',$filter_options['educational_level']['id']);

                //filter school_status
                if($filter_options['school_status']=='Negeri' || $filter_options['school_status']=='Swasta')$query3->where('school_status','=',$filter_options['school_status']);
            
            });
            //filter pns
            if($filter_options['is_pns']==='1' || $filter_options['is_pns']==='0'){
                $query2->whereHas('question.session.user.pns_status',function($query3)use($filter_options){
                    $query3->where('is_pns',intval($filter_options['is_pns']));
                });
            }
        }]);
    }])->has('answer_lists')->whereHas('questionnaries',function($query)use($questionnary_id){
     $query->where('questionnary_id','=',$questionnary_id);
    })->get();  
       
        
    });
    Route::get('/questionnary/download1/{questionnary_id}',function($questionnary_id){
        $data = \App\Models\QuestionList::with(['answer_lists'=>function($query){
            $query->withCount('answers');
        }])->has('answer_lists')->whereHas('questionnaries',function($query)use($questionnary_id){
         $query->where('questionnary_id','=',$questionnary_id);
        })->get();  

        $spreadsheet = new Spreadsheet();


    //Specify the properties for this document
        $spreadsheet->getProperties()
        ->setTitle('Laporan Kuesioner')
        ->setSubject('A PHPExcel example')
        ->setDescription('AGPAII Digital')
        ->setCreator('CV Ardata Media')
        ->setLastModifiedBy('CV Ardata Media');

        //style
        $colors=['e9f7e9','d4c4ae'];
        $styleArray =  ['fill' => [
            'fillType' => Fill::FILL_SOLID,
            'color' => ['rgb' => 'aed4ae'],
        ],
        
        ];
        //Adding data to the excel sheet
        $spreadsheet->setActiveSheetIndex(0);

        $spreadsheet->getActiveSheet()
            ->setCellValue('A1', 'Kuesioner')
            ->setCellValue('B1', 'Jawaban')
            ->setCellValue('C1', 'Jumlah partisipan')
            ->setCellValue('D1', 'Persentase (%)')
            ;

        $spreadsheet->getActiveSheet()->getStyle('A1:D1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A1:D1')->getFont()->setBold(true);

        $row=2;
        foreach($data as $key=>$question_list){
            $first_row=$row;
            $spreadsheet->getActiveSheet()->setCellValue('A'.($row), $question_list->name);
            $answers_count_sum = $question_list->answer_lists->sum('answers_count');
            foreach ($question_list->answer_lists as $answer_list) {
                $spreadsheet->getActiveSheet()->setCellValue('B'.($row), $answer_list->name);
                $spreadsheet->getActiveSheet()->setCellValue('C'.($row), $answer_list->answers_count);

                $percentage = round($answer_list->answers_count/$answers_count_sum*100, 2);
                $spreadsheet->getActiveSheet()->setCellValue('D'.($row++), $percentage.'%');
            }
            if($key%2==0)$styleArray['fill']['color']['rgb']='e9f7e9';
            else $styleArray['fill']['color']['rgb']='d4c4ae';

            $spreadsheet->getActiveSheet()->getStyle('A'.$first_row.':D'.($row-1))->applyFromArray($styleArray);

        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="quesioner agpaii.xlsx"');
        $writer->save("php://output");
        exit();
        

    });
    Route::get('/questionnary/download2/{questionnary_id}',function($questionnary_id){
        //query ini lama
        // $data =  \App\Models\User::select('users.id','users.name')->whereHas('questionnary_sessions',function($query)use($questionnary_id){
        //     $query->where('questionnary_id','=',$questionnary_id);
        // })->with(['sessions'=>function($query){
        //     $query->has('questionnaries')->with('questions.answer');
        // }])->get();
        $spreadsheet = new Spreadsheet();
         //Specify the properties for this document
        $spreadsheet->getProperties()
         ->setTitle('Laporan Kuesioner')
         ->setSubject('A PHPExcel example')
         ->setDescription('AGPAII Digital')
         ->setCreator('CV Ardata Media')
         ->setLastModifiedBy('CV Ardata Media');
     
         //style
         $colors=['e9f7e9','d4c4ae'];
         $styleArray =  ['fill' => [
             'fillType' => Fill::FILL_SOLID,
             'color' => ['rgb' => 'aed4ae'],
         ],
           
         ];

        //Adding data to the excel sheet
        $spreadsheet->setActiveSheetIndex(0);
    
        $spreadsheet->getActiveSheet()
        ->setCellValue('A1', 'Nama')
        ->setCellValue('B1', 'Kuesioner')
        ->setCellValue('C1', 'Jawaban');
    
        $spreadsheet->getActiveSheet()->getStyle('A1:C1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A1:C1')->getFont()->setBold(true);
        $row=2;

        $data=DB::select("select a.id as user_id,a.name,b.id as session_id,c.questionnary_id,GROUP_CONCAT(e.name SEPARATOR '|') as questions,GROUP_CONCAT(f.name SEPARATOR '|') as answers,b.created_at from users a inner join sessions b on a.id=b.user_id inner join questionnary_sessions c on b.id=c.session_id inner join questions d on d.session_id=c.session_id inner join question_lists e on e.id=d.question_list_id inner join answers f on f.question_id=d.id where c.questionnary_id=? group by user_id order by b.created_at asc",[$questionnary_id]);
        $separator = '|';
        foreach($data as $key=>$user){
            $first_row=$row;
            $spreadsheet->getActiveSheet()->setCellValue('A'.($row), $user->name);
            
            $questions = explode($separator,$user->questions);
            $answers = explode($separator, $user->answers);
            foreach($questions as $key2=>$question){
                $spreadsheet->getActiveSheet()->setCellValue('B'.($row), $question);
                $spreadsheet->getActiveSheet()->setCellValue('C'.($row++), $answers[$key2]);

               
            }
            if($key%2==0)$styleArray['fill']['color']['rgb']='e9f7e9';
            else $styleArray['fill']['color']['rgb']='d4c4ae';

            $spreadsheet->getActiveSheet()->getStyle('A'.$first_row.':C'.($row-1))->applyFromArray($styleArray);

        }
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="quesioner agpaii 2.xlsx"');
        $writer->save("php://output");
        exit;
      

    });
});

Route::group(['middleware'=>['admin.user']],function(){
    
   
    Route::get('/userreport','UserController@index');
    Route::get('/paymentreport','PaymentController@report');
    Route::get('/secure/makeFilePublic','SecureController@makeFilePublic');

    
});

Route::get('/terms-conditions', 'TermConditionController@index');
Route::get('/rekap',function(){
    return Redirect::to('https://docs.google.com/spreadsheets/d/1ZXmrGnNJZ9-kjq2rDeNcNdIdeb6v8J34HeRd1WYJ1K8/edit?usp=sharing');
});

// Route::get('/info','API\\v1\\LessonPlanController@information');

Route::get('/command', function () {
    // $data = ['Bookmark', 'Follow','Murottal','DailyPrayer','File','AssigmentReview','AssigmentGuidedUser','AssigmentCategory','AssigmentType','Assigment','AssigmentComment','AssigmentLike','AssigmentRating','AssigmentChat','QuestionListCategory','QuestionList','AssigmentQuestionList','AnswerList','Session','AssigmentSession','Question','Answer'];
    $data = ['Questionnary','Ad'];
    foreach ($data as $val) {
        Artisan::call("make:seeder", ['name' => $val . "TableSeeder"]);
        Artisan::call("make:model", ['name' => $val]);
        Artisan::call("make:controller", ['name' => $val . "Controller", '--resource' => true, '--model'=>$val]);
        Artisan::call("make:controller", ['name' => "API\\v1\\" . $val . "Controller", '--api' => true, '--model'=>$val]);
    }
});

Route::group(['middleware' => [
    // 'verified',
    'expired',
    'auth'
    ]], function () {
    Route::get('/resetsuccess',function(){
        return view('auth.passwords.success');
    });
    // -----------------------
    // Route::get('/home','HomeController@index')->name('home');
    Route::get('/home',function(){
        return abort(403,'Untuk pendaftaran KTA DIGITAL silahkan menggunakan aplikasi yang bisa didownload di playstore');
    });
    //get random avatar
    // Route::get('/users/getrandomavatar','UserController@getrandomavatar');
    //test pembayaran
    Route::get('/test/{paymentId}','PaymentController@test');
});

Route::get('/getcontactnumber',function(){
    $numbers = [
        '6285641161238', //nomer mas rendy
        // '6285334178835',
        // '6285875020757'
    ];
    return $numbers[rand(0,count($numbers)-1)];
});


Route::get('/testgan',function(){
    $db=DB::select("SELECT count(DISTINCT payment_id) as users_count,year(created_at) as `year`, month(created_at) as `month`,UNIX_TIMESTAMP(concat(year(created_at),'-',month(created_at),'-1')) as `timestamp`, concat(year(created_at),'-',month(created_at),'-1') as monthyear FROM `payments` where status='success' and payment_type='App\\\User' and value=35000 group by monthyear order by timestamp desc");
    return $db;
});

Route::get('/migrate_to_laravel8', function(){
    //menambahkan Models pada table yang mempunyai morph
    echo "[+]menambahkan Models pada table yang mempunyai morph\n<br>";
    $db=DB::select("select a.TABLE_NAME,a.COLUMN_NAME from `information_schema`.`COLUMNS` a where a.TABLE_SCHEMA='kta_web2' and a.COLUMN_NAME like '%_type' group by a.TABLE_NAME");
    foreach($db as $table){
        $update_sql="update `".$table->TABLE_NAME."` set ".$table->COLUMN_NAME."=regexp_replace(".$table->COLUMN_NAME.", '\\\\\\\\([a-zA-Z]+)',concat('\\\\\\\\Models\\\\',regexp_substr(".$table->COLUMN_NAME.", '\\\\\\\\([a-zA-Z]+)')))  where ".$table->COLUMN_NAME." is not null and ".$table->COLUMN_NAME." not like '%Models%'";    
        echo $update_sql." > ";
        $update = DB::statement($update_sql);
        echo $update."<br>\n";
    }

    //menambahkan Models pada data json di table data_rows voyager
    echo "[+]menambahkan Models pada data json di table data_rows voyager\n<br>";
    $sql="update data_rows set details= 
    regexp_replace(details, '\"App\\\\\\\\\\\\\\\\([a-zA-Z]+)\"',concat('\"App\\\\\\\\\\\\\\\\Models\\\\\\\\\\\\\\\\',replace(substr(regexp_substr(details, '\"App\\\\\\\\\\\\\\\\([a-zA-Z]+)\"'),7),'\"',''),'\"'))
    where type='relationship' and details not like '%\\Models\\%';";
    echo $sql. " > ";
    $update = DB::statement($sql);
    echo $update."<br>\n";
    
    //menambahkan Models pada data json di table notifications
    echo "[+]menambahkan Models pada data json di table notifications\n<br>";
    $sql="update notifications set data=regexp_replace(data, '\"App\\\\\\\\\\\\\\\\([a-zA-Z]+)\"', concat('\"App\\\\\\\\\\\\\\\\Models\\\\\\\\\\\\\\\\',regexp_replace(regexp_substr(data,'\"App\\\\\\\\\\\\\\\\([a-zA-Z]+)\"'),'\"App\\\\\\\\\\\\\\\\|\"',''),'\"'));";
    echo $sql. " > ";
    $update = DB::statement($sql);
    echo $update."<br>\n";
    

     //mengedit data pada table Voyager di table voyager
     echo "[+]mengupdate data di table data_types voyager\n<br>";
     $db=DB::table('data_types')->where('name','users')->update(['model_name'=>'TCG\\Voyager\\Models\\User',
     'policy_name'=>'TCG\\Voyager\\Policies\\UserPolicy',
     'controller'=>'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController']);
     echo $db."\n<br>";

}); 