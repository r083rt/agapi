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
    public function buyAssigment(Request $request){
        $request->validate([
            'id'=>[
                'required'
            ]
        ]);
        $assigment = Assigment::where('is_paid','>=',1)->findOrFail($request->id);
        $user = $request->user();
        // cek apakah user sudah membeli assigment ini
        $purchased = \App\Models\PurchasedItem::whereHas('payment', function(Builder $query)use($user){
            $query->whereHasMorph('paymentable', \App\Models\User::class, function(Builder $query2)use($user){
                $query2->where('users.id', $user->id);
            });
        })->whereHasMorph('purchased_item',
         \App\Models\Assigment::class, function (Builder $query, $type)use($assigment){
             $query->where('assigments.id', $assigment->id);
         });
        if($purchased->exists()){
            return response(['message'=>'Kamu sudah membeli item ini.'], 403);
        }
        
        // jika saldo kurang maka return 403 dgn json
        $user_balance = $user->balance();
        if($user_balance<$assigment->is_paid){
            return response(['message'=>'Saldo kurang'], 403);
        }

        try{
            DB::beginTransaction();

            $necessary = \App\Models\Necessary::where('name','beli_soal')->first();
            if(!$necessary){
                return response('Necessary beli_soal not found',404);
            }

            $payment = new \App\Models\Payment;
            $payment->type = 'OUT';
            $payment->necessary_id = $necessary->id;
            $payment->status = 'success';
            $payment->value = $assigment->is_paid;
            $user->payments()->save($payment);

            $purchased_item = new \App\Models\PurchasedItem;
            $purchased_item->payment_id = $payment->id;

            $assigment->purchased_items()->save($purchased_item);

            // sekarang bagi keuntungan ke pemilik paket soal berbayar dan pemilik butir soal berbayar
            $assigment->load(['question_lists'=>function($query){
                // hanya mengambil queston_lists yg berbayar (is_paid=1)
                $query->where('question_lists.is_paid', true);
            }]);

           
            
    
            // jika butir soal berprofit ada di dalam paket soal tsb maka
            if(count($assigment->question_lists)){
                $profit = 0.5*$payment->value; // keuntungan 50% (dibagi 50% ke pembuat soal dan 50% ke pembuat butir soal berbayar sama-rata
                $necessary = \App\Models\Necessary::where('name','bagi_keuntungan')->first();
                if(!$necessary)return response('Necessary bagi_keuntungan not found',404);
                
                
                $payment2 = new \App\Models\Payment;
                $payment2->type = 'IN';
                $payment2->value = $profit; 
                $payment2->status = 'success'; 
                $payment2->necessary_id = $necessary->id;
                $assigment->user->payments()->save($payment2);


                // profit untuk pembuat butir soal
                $profit2 = $payment->value - $profit;
                $profit2 = $profit2 / count($assigment->question_lists);
                $payments2 = [];
                foreach($assigment->question_lists as $question_list){

                   array_push($payments2, [
                    'necessary_id' => $necessary->id,
                    'type' => 'IN',
                    'status'=>'success',
                    'value' => $profit2,
                    'payment_id'=> $question_list->pivot->creator_id,
                    'payment_type'=> \App\Models\User::class,
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now(),
                   ]);

                }
                $totalInserted = DB::table('payments')->insert($payments2);
               
            }else{
                // jika tidak ada soal yg berbayar maka 100% keuntungan dimiliki pembuat paket soal
                $necessary = \App\Models\Necessary::where('name','bagi_keuntungan')->first();
                if(!$necessary)return response('Necessary bagi_keuntungan not found',404);
                
                $payment2 = new \App\Models\Payment;
                $payment2->type = 'IN';
                $payment2->status = 'success';
                $payment2->value = $payment->value; // keuntungan 100% (tidak dibagi karena butir2 soalnya tidak ada 1 pun yg is_paid TRUE)
                $payment2->necessary_id = $necessary->id;
                
                $assigment->user->payments()->save($payment2);

            }

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
        $topsis->enableEntropyWeightMethod(); //aktifkan pembobotan tak
        // $topsis->addPreferenceAttribute();
        $ranking = $topsis->calculate();
        return $ranking;
    }

    public function purchasedAssignments(){
        $user = auth()->user();
        $payment = \App\Models\Payment::class;
        $query =  Assigment::whereHas('payments', function($query)use($user){
            $query->whereHasMorph('paymentable', \App\Models\User::class,  function (Builder $query2)use($user) {
                $query2->where('users.id', $user->id);
            });
        });
        $res = Assigment::with('user')->join('purchased_items','purchased_items.purchased_item_id','=','assigments.id')
        ->where('purchased_items.purchased_item_type',Assigment::class)
        ->whereExists(function($query)use($user){
            $query->select(DB::raw(1))
                     ->from('payments')
                     ->whereColumn('payments.id','purchased_items.payment_id')
                     ->where('payments.payment_id', $user->id)
                     ->where('payments.payment_type',\App\Models\User::class);
        })
        ->orderBy('purchased_items.id','desc');
        
        return $res->paginate();
    }
    
}
