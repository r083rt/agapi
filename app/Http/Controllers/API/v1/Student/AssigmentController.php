<?php

namespace App\Http\Controllers\API\v1\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assigment;
use App\Models\Session;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;
use DB;
class AssigmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // session yang belum selesai:
    // session yang jumlah questions tidak sama dengan jumlah assigments.question_lists
    public function unfinishedAssigment($type='sharedassigment'){
        $userProfile = auth('api')->user()->load('profile');
        $educationalLevelId = $userProfile->profile->educational_level_id;
        if($educationalLevelId==null)return response()->json(['error_jenjang'=>true]);

        $totalQuestionLists = DB::table('assigment_question_lists as aql')
        ->selectRaw('aql.assigment_id,count(1) question_lists_total')
        ->groupBy('aql.assigment_id');

        $totalQuestions = DB::table('questions as q')
        ->selectRaw('q.session_id,count(1) as questions_total')
        ->groupBy('q.session_id');

        $query = DB::table('sessions')
        ->selectRaw('sessions.id,
        sessions.user_id,
        sessions.created_at,
        ass.assigment_id,
        a.name,
        a.code,
        a.timer,
        a.end_at,
        a.start_at,
        users.name as teacher,
        grades.educational_level_id,
        grades.description,
        a.is_public,
        a.teacher_id,
        assigment_question_lists_pivot.question_lists_total,
        questions_pivot.questions_total')
        ->join('assigment_sessions as ass', 'ass.session_id','=','sessions.id')
        ->join('assigments as a', 'a.id','=','ass.assigment_id')
        ->join('grades', 'grades.id','=','a.grade_id')
        ->join('users','users.id','=','a.teacher_id')
        ->joinSub($totalQuestionLists, 'assigment_question_lists_pivot', function($join){
            $join->on('assigment_question_lists_pivot.assigment_id','=','ass.assigment_id');
        })
        ->leftJoinSub($totalQuestions, 'questions_pivot', function($join){
            $join->on('questions_pivot.session_id','=','sessions.id');
        })
        ->where('grades.educational_level_id',$educationalLevelId)
        ->where(function($query2){
            $query2->whereColumn('questions_pivot.questions_total','!=','assigment_question_lists_pivot.question_lists_total')
            ->orWhereNull('questions_pivot.questions_total');
        })
        ->where('sessions.user_id',$userProfile->id)
        ->orderBy('sessions.id','desc');

        if($type=='sharedassigment'){ //menampilkan sharedassigment yang telah dikerjakan
            $query->whereNotNull('teacher_id');
        }elseif($type=='masterassigment'){ //menampilkan master soal (latihan soal) yang telah dikerjakan
            $query->whereNull('teacher_id')->where('is_public','=',true);
        }else{
            return abort(404);   
        }
        // return $query->get();
        $data = $query->paginate();
        foreach($data as $session){
            if($session->timer){
                // $session->end_time_unixtimestamp = Carbon::now()

                $timer = intval($session->timer);
                $carbon = new Carbon($session->created_at);
                $seconds_diff = Carbon::now()->diffInSeconds($carbon);
                $session->seconds_diff = $seconds_diff;
                $minutes_diff = round($seconds_diff/60);
                $is_timer_ended = $minutes_diff>=$timer?true:false;
                $session->is_timer_ended = $is_timer_ended;

                $session->actualEndTime = $carbon->add($timer, 'minutes')->getTimeStamp();
                $session->actualStartTime = Carbon::parse($session->created_at)->getTimeStamp();

            }
            
            if(!empty($session->end_at)){
                $end_at = new Carbon($session->end_at);
                $is_expired = Carbon::now()->greaterThanOrEqualTo($end_at);
                $session->is_expired = $is_expired;
            }
            
            
        }
        return $data;
        //sharedassigment = paket soal hasil salinan dari master paket soal
       
    }
    function checkIsSame($a, $b){
        if(count($a)!==count($b))return false;
        sort($a);
        sort($b);
        foreach($a as $k=>$v){
            if($v!==$b[$k])return false;
        }
        return true;
    }
    public function search($key){
      
        // return 'cok';
        $userProfile = auth('api')->user()->load('profile');
        $educationalLevelId = $userProfile->profile->educational_level_id;
        if($educationalLevelId==null)return response()->json(['error_jenjang'=>true]);

        // cari apakah ada session dgn assigment code $key 
        $assigment = Assigment::with('teacher','grade')
        ->withCount('question_lists')
        ->whereHas('grade',function($query)use($educationalLevelId){
            $query->where('educational_level_id',$educationalLevelId);
        })
        ->whereNotNull('teacher_id')
        ->where('code',$key)->first();
        if(!$assigment)return response('Assigment tidak ada',404);


        $session = Session::where('user_id',$userProfile->id)->whereHas('assigments',function($query)use($assigment){
            $query->where('assigments.id',$assigment->id);
        });

        
        //jika ada maka proses session tersebut
        if($session->exists()){
            $session = $session->with('assigments')->withCount('questions')->first();
            $is_submitted = false;
            $is_timer_ended = false;

            // jika jumlah questions sama dengan jumlah question_lists, maka berarti pengerjaannya sudah disubmit
            if($session->questions_count===$assigment->question_lists_count){
                $is_submitted = true;
            }
            // jika selisih menit waktu sekarang dan waktu di session.created_at melebihi assigment.timer+1, maka timer habis
            if(!empty($assigment->timer)){
                $timer = intval($assigment->timer);
                $diff_minutes = Carbon::now()->diffInMinutes($session->created_at);
                // toleransi 1 menit (+1)
                if($diff_minutes>$timer+1){
                    $is_timer_ended = true;
                }
            }

            
            $session->is_timer_ended = $is_timer_ended;
            $session->is_submitted = $is_submitted;
            $assigment->session = $session;
        }

        $is_expired = false; //jika melewati waktu assigments.end_at
        $is_workable = true; //jika belum maksuk waktu assigments.start_at 
        // jika end_at kosong dan jika tgl sekarang belum masuk dalam start_at, maka belum dimulai
        if(!empty($assigment->start_at) && empty($assigment->end_at)){
            $start_at = new Carbon($assigment->start_at);
            $is_workable = Carbon::now()->greaterThanOrEqualTo($start_at);
        
        }
        // jika start_at kosong dan jika tgl sekarang sudah melewati end_at, maka expired
        elseif(empty($assigment->start_at) && !empty($assigment->end_at)){
            $end_at = new Carbon($assigment->end_at);
            $is_expired = Carbon::now()->greaterThanOrEqualTo($end_at);
            $is_workable = !$is_expired;
        }
        // jika start_at dan end_at tidak kosong semua,
        elseif(!empty($assigment->start_at) && !empty($assigment->end_at)){
            $start_at = new Carbon($assigment->start_at);
            $end_at = new Carbon($assigment->end_at);
            $is_workable = Carbon::now()->isBetween($start_at, $end_at);
            $is_expired = !$is_workable;
            // return $is_workable;
        }
        
        $assigment->is_workable = $is_workable;
        $assigment->is_expired = $is_expired;

        return $assigment;

    }
    /*
    hanya untuk pembelian menggunakan saldo, bukan tf
    */
    public function buyAssigment(Request $request){
        $request->validate([
            'id'=>[
                'required'
            ]
        ]);
        
        $premium_assigment_repo = new \App\Repositories\PremiumAssigmentRepository;
        $assigment = $premium_assigment_repo->findOrFail($request->id);
        

        $user = $request->user();
        // cek apakah user sudah membeli assigment ini
        $purchased_assigment = new \App\Helper\PurchasedAssigmentItemHelper;
        $purchased_assigment->user_id = $user->id;
        $purchased_assigment->assigment_id = $assigment->id;
        if($purchased_assigment->isExists()){
            throw new \Exception("Kamu sudah membeli item ini");
        }
        
        // jika saldo kurang maka return Error
        $user_balance = $user->balance();
        if($user_balance<$assigment->is_paid){
            throw new \Exception("Saldo kurang");
        }

        try{
            DB::beginTransaction();

            $necessary = \App\Models\Necessary::where('name','beli_soal')->first();
            if(!$necessary){
                throw new \Exception("Necessary beli_soal not found");
            }

            $payment_out = new \App\Models\Payment;
            $payment_out->type = 'OUT';
            $payment_out->necessary_id = $necessary->id;
            $payment_out->status = 'success';
            $payment_out->value = $assigment->is_paid;
            $user->payments()->save($payment_out);

           

            //bagi keuntungan
            $assigment_question_list_payment_sharing = new \App\Helper\AssigmentQuestionListPaymentSharingHelper($assigment);
            $assigment_question_list_payment_sharing->sharingFrom($payment_out);
            

            DB::commit();
            return $assigment;

        }catch (\PDOException $e) {
            DB::rollBack();
            return response($e->getMessage(), 500);
        }
      
    }
    public function ranking(Request $request){
        $request->validate([
            'year'=>'nullable|integer',
            'month'=>'nullable|integer',
            'range_in'=>'nullable|integer',
            'grade_id'=>'nullable|integer',
            
        ]);
        // jika range_in tidak kosong, maka akan ignore year dan month
        $grade_id  = $request->query('grade_id')??null;
        $year  = $request->query('year')??null;
        $month  = $request->query('month')??null;
        $range_in = $request->query('range_in')??null;

        $user_assigment_sessions = DB::table('sessions as s')->selectRaw('
        s.user_id, 
        u.name,
        u.avatar,
		count(1) as session_count,   
        sum(ass.total_score) as scores_sum,
		s.created_at
        ')
        ->join('assigment_sessions as ass', 'ass.session_id','=','s.id')
        ->join('users as u', 'u.id','=','s.user_id')
        ->join('profiles as p','p.user_id','=','u.id')
        ->whereNotNull('ass.total_score')
        ->groupBy('s.user_id')
        ->limit(100);

        if($grade_id){
            $user_assigment_sessions->where('p.grade_id', $grade_id);
        }

        // jika range_in tidak null, maka filter year dan month akan diignore
        if($range_in){
            $start_at = Carbon::now()->subMonths($range_in)->toDateString();
            $end_at = Carbon::now()->toDateString();
            $user_assigment_sessions->whereBetween('s.created_at', [$start_at, $end_at]);
        }else{
            if($year){
                $user_assigment_sessions->whereYear('s.created_at',$year);
            }
            if($month){
                $user_assigment_sessions->whereMonth('s.created_at',$month);
            }
        }
  
        $query = DB::table($user_assigment_sessions,'t')->selectRaw('t.user_id,
        t.name,
        t.avatar,
        t.session_count,
        t.scores_sum/(t.session_count*100) as score')->orderBy('t.session_count','desc');
        $dataset = $query->get();
        if(!count($dataset))return [];
        // return $dataset;
        // $min_sessions_count = $max_sessions_count = $dataset[0]->session_count;
        // $min_score = $max_score = $dataset[0]->score;
        // foreach($dataset as $data){
        //     if($data->session_count<$min_sessions_count)$min_sessions_count = $data->session_count;
        //     elseif($data->session_count>$max_sessions_count)$max_sessions_count = $data->session_count;;

        //     if($data->score < $min_score)$min_score = $data->score;
        //     elseif($data->score > $max_score)$max_score = $data->score;
        // }
        // foreach($dataset as $data){
        //     if($min_sessions_count===$max_sessions_count){
        //         $data->normalized_session_count = $data->session_count/count($dataset);
        //     }else{
        //         $data->normalized_session_count = ($data->session_count - $min_sessions_count)/($max_sessions_count - $min_sessions_count);
        //     }
            
        //     if($min_score===$max_score){
        //         $data->normalized_score = $data->score/count($dataset);
        //     }else{
        //         $data->normalized_score = ($data->score - $min_score)/($max_score - $min_score);
        //     }
            
        // }
        // // return $dataset;

        // $attributes = ['normalized_session_count'=>['weight'=>5, 'type'=>'benefit'],
        // 'normalized_score'=>['weight'=>3, 'type'=>'benefit']
        // ];
        // tidak jadi pakai min max scaler karena hasil plot'nya sama saja, dan tidak mempengaruhi korelasi (https://stackoverflow.com/questions/47025485/does-scaling-time-series-using-min-max-scaling-affect-cross-correlation)
        $attributes = ['session_count'=>['weight'=>5, 'type'=>'benefit'],
        'score'=>['weight'=>3, 'type'=>'benefit']
        ];
        $topsis = new \App\Helper\Topsis($attributes, $dataset);
        $topsis->enableEntropyWeightMethod(); //aktifkan pembobotan otomatis
        // $topsis->addPreferenceAttribute();
        $ranking = $topsis->calculate();
        return $ranking;
    }
    public function isExpired($created_at, $in_hours=24, &$remaining_time){
        $created_at = new Carbon($created_at);
        $expired_at = $created_at->addHours($in_hours);
        $now = Carbon::now();

        $is_expired = $now->greaterThanOrEqualTo($expired_at);
        $remaining_time = $now->diffInMilliseconds($expired_at);
        return $is_expired;
    }

    // mendapatkan lists assigments yang pending
    public function pendingAssigmentPayments(){
        $user = auth()->user();
        if(!$user->profile->grade_id)throw new \Exception("Harus isi jenjang terlebih dahulu");

        $now = \Carbon\Carbon::now();
        $purchasedAssigments = DB::table('purchased_items')->selectRaw('purchased_items.purchased_item_id,
		purchased_items.purchased_item_type,
		purchased_items.payment_id,
		payments.status,
        payments.created_at,
        date_add(payments.created_at,interval 24 hour) as expired_at')
        ->join('payments', 'payments.id','=','purchased_items.payment_id')
        ->where('purchased_item_type', Assigment::class)
        ->where('payments.status', 'pending');

        $res = Assigment::with('user')
        ->withCount('question_lists')
        ->selectRaw('assigments.*,
        purchased_assigments.payment_id,
        purchased_assigments.status,
        purchased_assigments.created_at as payment_created_at,
        purchased_assigments.expired_at')
        ->joinSub($purchasedAssigments, 'purchased_assigments', function($join){
            $join->on('purchased_assigments.purchased_item_id', '=', 'assigments.id');
        })
        ->whereNull('teacher_id') //teacher_id NULL berarti master paket soal
        ->where('is_paid','>',0) //hanya mengambi soal yg berbayar 
        ->where('expired_at','>', $now); //hanya mengambil data yang belum expired

        $res->orderBy('id','desc');
        // $query = Assignment::
        $data = $res->paginate();
        foreach($data as $payment_data){
          
            $is_payment_expired = false;

            if($payment_data->status=="pending"){
                $remaining_time=null;
                $is_expired = $this->isExpired($payment_data->payment_created_at, 24, $remaining_time);
                $payment_data->payment_pending = ['is_expired'=>$is_expired, 'remaining_time'=>$remaining_time];
            }
        }
        return $data;
    }
        // menampilkan question_lists
        public function showPurchasedAssignment($assignment_id){
            $user = auth()->user();
            // cek apakah user berhak mengakses payable assigment tsb
            $assignment = Assigment::with(
            ['question_lists.answer_lists'=>function($query){
                $query->select('answer_lists.id','answer_lists.question_list_id','answer_lists.name','answer_lists.answer_list_type_id');//pastikan student tidak bisa melihat kunci jawaban
                $query->selectRaw("if(answer_list_types.name is null,'text',answer_list_types.name) as type")
                ->leftJoin('answer_list_types','answer_list_types.id','=','answer_lists.answer_list_type_id')->orderBy('answer_lists.id','asc');
            },
            'question_lists.assigment_types',
            'question_lists.answer_lists.images',
            'question_lists.audio',
            'grade'
            ])
            ->whereHas('payments', function(Builder $query)use($user){
                $query->whereHasMorph('paymentable', \App\Models\User::class, function($query2)use($user){
                    $query2->where('users.id',$user->id);
                });
            })
            ->selectRaw('assigments.*,if(timer is null,FALSE,TRUE) as isTimer,if(start_at is null or end_at is null,FALSE, TRUE) as isExpire, if(password is null,FALSE,TRUE) isPassword')
            ->findOrFail($assignment_id);

            $assigment_types_db = \App\Models\AssigmentType::all();
            $assigment_types_db_key_based = [];
            foreach($assigment_types_db as $assigment_type){
                $assigment_types_db_key_based[$assigment_type->id] = $assigment_type;
            }

            foreach ($assignment->question_lists as $ql => $question_list) {
           
                # code...
                // $question_list->pivot->user = \App\Models\User::find($question_list->pivot->user_id);
                // $question_list->pivot->creator = User::find($question_list->pivot->creator_id);
                $question_list->pivot->assigment_type = $assigment_types_db_key_based[$question_list->pivot->assigment_type_id];
    
                //jika murid, maka hilangkan/kosongkan field `name` dari answer_list karena itu adalah kunci jawaban dari soal tsb
                if($user->role->name=="student"){
                    if($question_list->pivot->assigment_type->description=="textarea" || $question_list->pivot->assigment_type->description=="textfield"){
                        $question_list->answer_lists->transform(function($item, $key){
                            $item->name="";
                            return $item;
                        });
                    }
                }
    
            }

            return $assignment;

        }
    public function purchasedAssignments(){
        $user = auth()->user();
        // $payment = \App\Models\Payment::class;
        // $query =  Assigment::whereHas('payments', function($query)use($user){
        //     $query->whereHasMorph('paymentable', \App\Models\User::class,  function (Builder $query2)use($user) {
        //         $query2->where('users.id', $user->id);
        //     });
        // });
        $res = Assigment::with('grade','user','grade.educational_level')->withCount('question_lists')
        ->selectRaw('assigments.*,payments.created_at as payment_created_at')
        ->join('purchased_items','purchased_items.purchased_item_id','=','assigments.id')
        ->join('payments', 'payments.id','=','purchased_items.payment_id')
        ->where('purchased_items.purchased_item_type',Assigment::class)
        ->where(function($query)use($user){
            $query->where('payments.payment_id', $user->id) //user sat ini
            ->where('payments.payment_type',\App\Models\User::class)
            ->where('status','success'); //hanya mengambil payment yang success
        })
        ->orderBy('purchased_items.id','desc');
        
        return $res->paginate();
    }
    /*
    menampilkan paket soal yg dijual dalam jenjang kelas yg sama,
    soal yang sudah dibeli juga ditampilkan.
    raw sql: "payable assigments left join.sql"
    */
    public function payableAssignments(Request $request){
        $user = auth()->user();
        if(!$user->profile->grade_id)throw new \Exception("Harus isi jenjang terlebih dahulu");

        $purchasedAssigments = DB::table('purchased_items')->selectRaw('purchased_items.purchased_item_id,
		purchased_items.purchased_item_type,
		purchased_items.payment_id,
		payments.status,
        payments.created_at')
        ->join('payments', 'payments.id','=','purchased_items.payment_id')
        ->where('purchased_item_type', Assigment::class)
        ->whereIn('payments.status', ['success','pending']);

        $res = Assigment::with('user')
        ->withCount('question_lists')
        ->selectRaw('assigments.*,
        purchased_assigments.payment_id,
        purchased_assigments.status,
        purchased_assigments.created_at as payment_created_at')
        ->leftJoinSub($purchasedAssigments, 'purchased_assigments', function($join){
            $join->on('purchased_assigments.purchased_item_id', '=', 'assigments.id');
        })
        ->whereNull('teacher_id') //teacher_id NULL berarti master paket soal
        ->where('is_paid','>',0) //hanya mengambi soal yg berbayar 
        ->where('grade_id', $user->profile->grade_id); // mengambil berdasarkan jenjang siswa
       
        // ->where(function($query)use($user){
        //     //belum dibeli
        //     $query->whereDoesntHave('payments', function($query2)use($user){
        //         $query2->where('payments.payment_id', $user->id)
        //         ->where('payments.payment_type',\App\Models\User::class);
        //     })
        //     // pending (sudah terkonfirmas)
        //     ->orWhereHas('payments', function($query2)use($user){
        //         $query2->where('payments.payment_id', $user->id)
        //         ->where('payments.payment_type',\App\Models\User::class)
        //         ->whereNull('payments.status');
        //     });
        // });
        

        $res->orderBy('id','desc');

        $data =  $res->paginate();
        foreach($data as $payment_data){
          
            $is_payment_expired = false;

            if($payment_data->status=="pending"){
                $remaining_time=null;
                $is_expired = $this->isExpired($payment_data->payment_created_at, 24, $remaining_time);
                $payment_data->payment_pending = ['is_expired'=>$is_expired, 'remaining_time'=>$remaining_time];
            }
        }
        return $data;
    }
    public function getPayment($assigment_id){
        $assigment = Assigment::with('user.profile')->findOrFail($assigment_id);
        if(!$assigment->is_paid)throw new \Exception('Paket soal harus premium');
        
        $user = auth()->user();
        $payment = $assigment->payments()->whereHasMorph('paymentable', \App\Models\User::class, function(Builder $query)use($user){
            $query->where('users.id', $user->id);
        });
        if($payment->exists()){
            $payment = $payment->first();
            $created_at = new Carbon($payment->created_at);
            $expired_at = $created_at->addHours(24);
            $now = Carbon::now();
            $remaining_time = $now->diffInMilliseconds($expired_at);
            $payment->remaining_time = $remaining_time;
            return $payment;
        }
        else throw new \Exception('Anda belum membeli paket soal dengan ID '.$assigment->id);
    }
    public function paidAssignmentDetails($assigment_id){
        
        $assigment = Assigment::with('user.profile')->findOrFail($assigment_id);
        if(!$assigment->is_paid)throw new \Exception('Paket soal harus premium');

        $assigment->is_text = Assigment::where('id',$assigment->id)->has('question_lists_text_only')->exists();
        $assigment->is_selectoption = Assigment::where('id',$assigment->id)->has('question_lists_select_options_only')->exists();
        $notes = [];
        if($assigment->is_text && !$assigment->is_selectoption){
            $notes[] = 'Memiliki jenis soal uraian';
            $assigment->is_image =  $assigment->question_lists_text_only()
            ->where('question_lists.name','like','%<img%')->exists();
            $assigment->is_audio = $assigment->question_lists_text_only()->has('audio')->exists();
        }
        elseif(!$assigment->is_text && $assigment->is_selectoption){
            $notes[] = 'Memiliki jenis soal pilihan ganda';
            $assigment->is_image = $assigment->question_lists_select_options_only()->has('images')->exists();
            $assigment->is_audio = $assigment->question_lists_select_options_only()->has('audio')->exists();
        }
        elseif($assigment->is_text && $assigment->is_selectoption){
            $notes[] = 'Memiliki jenis soal pilihan ganda dan uraian';
            $is_image1 = $assigment->question_lists_text_only()
            ->where('question_lists.name','like','%<img%')->exists();
            $is_image2 = $assigment->question_lists_select_options_only()->has('images')->exists();
            $assigment->is_image = $is_image1 || $is_image2;

            $is_audio1 =  $assigment->question_lists_text_only()->has('audio')->exists();
            $is_audio2 =  $assigment->question_lists_select_options_only()->has('audio')->exists();
            $assigment->is_audio = $is_audio1 || $is_image2;
        }
        
        if($assigment->is_image && !$assigment->is_audio)$notes[] = 'Terdapat gambar untuk memudahkan memahami soal';
        elseif(!$assigment->is_image && $assigment->is_audio)$notes[] = 'Terdapat suara untuk memudahkan memahami soal';
        elseif($assigment->is_image && $assigment->is_audio)$notes[] = 'Terdapat gambar dan suara untuk memudahkan memahami soal';

        if($assigment->timer)$notes[] = 'Terdapat timer selama '.$assigment->timer.' Menit';

     
     
        $assigment->rank = $assigment->paidRank();

        if($assigment->rank){
            $assigment->quality = \App\Helper\AssigmentProcess::getQualityDescription($assigment->rank->score);
            $notes[] = 'Memiliki indeks kualitas soal sebesar '.round($assigment->rank->score,3).' ('.$assigment->quality.')';
        }
        // $is_audio =  $assigment->question_lists_text_only()
        $notes_text = "";
        foreach($notes as $key=>$note){
            $notes_text.=($key+1).". $note\n";
        }

        $assigment->notes = $notes_text;

        return $assigment;
        // $user = auth()->user();
    }

    public function createPayment(){

    }
    /*
    pembelian paket soal menggunakan transfer
    */
    public function placeAssignmentPayment($assigment_id, Request $request){
        $request->validate([
            'payment_vendor_id'=>'required'
        ]);

        $assigment = Assigment::where('is_paid','>=',1)->findOrFail($assigment_id);
        $payment_vendor = \App\Models\PaymentVendor::findOrFail($request->payment_vendor_id);
        $necessary = \App\Models\Necessary::where('name','beli_soal')->first();
        if(!$necessary){
            throw new \Exception("Necessary beli_soal not found");
        }


        $user = $request->user();
        // cek apakah assignment tsb mempunyai payment dengan status `pending`
        $purchased_pending = \App\Models\PurchasedItem::whereHas('payment', function(Builder $query)use($user){
            $query->where('payments.status','pending')->whereHasMorph('paymentable', \App\Models\User::class, function(Builder $query2)use($user){
                $query2->where('users.id', $user->id);
            });
        })->whereHasMorph('purchased_item',
         \App\Models\Assigment::class, function (Builder $query, $type)use($assigment){
             $query->where('assigments.id', $assigment->id);
         });

        try{
            DB::beginTransaction();

            //jika ada, cek apakah payment tsb sudah expired (24 jam)
            if($purchased_pending->exists()){
                $purchased_pending_item = $purchased_pending->first();

                $payment = $purchased_pending_item->payment;
                $created_at = new Carbon($payment->created_at);
                $expired_at = $created_at->addHours(24);
                $now = Carbon::now();

                $is_expired = $now->greaterThanOrEqualTo($expired_at);

                //jika expired Hapus payment tsb. dan buat payment baru
                if($is_expired){
                    $payment->delete();

                }else{
                    // jika belum expired, return payment tsb
                    $remaining_time = $now->diffInMilliseconds($expired_at);
                    $payment->remaining_time = $remaining_time;
                    return $payment;
                }
                
            }

            //Buat payment baru dengan `status` NULL (belum dikonfirmasi)
            $client = new \GuzzleHttp\Client();
            $json_data = ['service_code'=>$payment_vendor->service_code,'value'=>$assigment->is_paid,'account_number'=>$payment_vendor->account_number];
    
            $res = $client->post(env('MASTER_PAYMENT_URL').'/createpaymenttoaccountnumber',[
                'json'=> $json_data
            ]);
            $master_payment = json_decode($res->getBody());

            $res = $client->post(env('MASTER_PAYMENT_URL').'/todaytotalpaymentsbyaccountnumber',[
                'json'=> ['account_number'=>$payment_vendor->account_number,'service_code'=>$payment_vendor->service_code]
            ]);
            $today_total_payments = json_decode($res->getBody());
            
            // Hapus semua payments dengan `status` NULL
            $assigment->payments()->whereNull('payments.status')->delete();

            $payment = new \App\Models\Payment;
            $payment->master_payment_id = $master_payment->id;
            $payment->payment_vendor_id = $payment_vendor->id;
            $payment->necessary_id = $necessary->id;
            $payment->type = 'OUT';
            $payment->status = null; //jika NULL, maka hanya membuat $payment place order, dan $payment belum terkonfirmasi
            $payment->value = $master_payment->value;
            $payment->note = json_encode(['today_total_payments'=>$today_total_payments]);
            $user->payments()->save($payment);

            $purchased_item = new \App\Models\PurchasedItem;
            $purchased_item->payment_id = $payment->id;
            $assigment->purchased_items()->save($purchased_item);
            
            $payment->today_total_payments = $today_total_payments;
            
            DB::commit();   
            return $payment;

          

        }catch (\PDOException $e) {
            DB::rollBack();
            return response($e->getMessage(), 500);
        }
    }
    /*
    konfirmasi pembayaran assigment
    */
    public function checkAssignmentPayment($assignment_id){
        $user = auth()->user();
        $assignment = Assigment::with(['payments','question_lists'=>function($query){
            // hanya mengambil queston_lists yang master'nya (ref_id) berbayar (is_paid=1)
            $query->whereExists(function($query2){
                $query2->select(DB::raw(1))
                ->from('question_lists as master_question_list')
                ->whereColumn('master_question_list.id','=','question_lists.ref_id')
                ->where('master_question_list.is_paid',1);
            });
        }])->whereHas('payments', function(Builder $query)use($user){
            $query->whereHasMorph('paymentable', \App\Models\User::class, function(Builder $query2)use($user){
                $query2->where('users.id', $user->id);
            });
        })->findOrFail($assignment_id);
        $payment = $assignment->payments[0];

        $client = new \GuzzleHttp\Client();
        $res = $client->get(env('MASTER_PAYMENT_URL')."/checkstatus/{$payment->master_payment_id}");
        $master_payment = json_decode($res->getBody());

        try{
            
            DB::beginTransaction();

           if($master_payment->status==="success"){
               \App\Models\Payment::where('id',$payment->id)->update(['status'=>'success']);

                 //bagi keuntungan
                $assigment_question_list_payment_sharing = new \App\Helper\AssigmentQuestionListPaymentSharingHelper($assignment);
                $assigment_question_list_payment_sharing->sharingFrom($payment);

           }

            DB::commit();
            $assignment->load('payments.paymentable','payments.payment_vendor');
            return $assignment;
        }catch (\PDOException $e) {
            DB::rollBack();
            return response($e->getMessage(), 500);
        }
      

    }
}
