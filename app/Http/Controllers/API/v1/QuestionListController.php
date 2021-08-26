<?php

namespace App\Http\Controllers\API\v1;

use App\Models\QuestionList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

use DB;
class QuestionListController extends Controller
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
     * @param  \App\Models\QuestionList  $questionList
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionList $questionList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuestionList  $questionList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionList $questionList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuestionList  $questionList
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionList $questionList)
    {
        //
    }

    public function buildSearch($assigmentCategoryId,$educationalLevelId){
        $res = QuestionList::with('assigments.grade.educational_level')->whereHas('assigments',function($query)use($assigmentCategoryId,$educationalLevelId){
            if($assigmentCategoryId == 9){
                $query->whereIn('assigment_category_id',[1,7,8]);
            } else {
                $query->where('assigment_category_id',$assigmentCategoryId);
            }

            $query->whereHas('grade',function($query)use($educationalLevelId){
                $query->where('educational_level_id',$educationalLevelId);
            });
        })->paginate();

        return response()->json($res);
    }

    // raw sql: "sub join question_lists.sql"
    public function payableQuery(){
        // question_lists yang sudah dikerjakan/disubmit
        $workedQuestionList = DB::table('questions as q')->selectRaw('count(1) as total, ql2.ref_id as question_list_id')
        ->join('question_lists as ql2', 'q.question_list_id','=','ql2.id')
        ->join('assigment_question_lists as aql2', 'aql2.question_list_id','=','q.question_list_id')
        ->join('assigments as a2', 'a2.id','=','aql2.assigment_id')
        ->whereNotNull('ql2.ref_id')->whereNotNull('a2.teacher_id')
        ->groupBy('ql2.ref_id');

        $topQuestionList = DB::table('top_question_lists')->selectRaw('max(id) as latest_id,question_list_id')->groupBy('question_list_id');

        $query = \App\Models\QuestionList::selectRaw('question_lists.id,question_lists.is_paid, tql.score as latest_score, question_lists.name,worked_question_list.total as scores_count,
        question_lists.created_at,ats.description as assigment_type,ats.name as assigment_type_name,a.topic,a.subject,
        g.description as grade,ac.description as assigment_category')->with('answer_lists')
        ->join('assigment_question_lists as aql','aql.question_list_id','=','question_lists.id')
        ->join('assigment_types as ats', 'ats.id','=','aql.assigment_type_id')
        ->join('assigments as a','a.id','=','aql.assigment_id')
        ->join('grades as g','g.id','=','a.grade_id')
        ->join('assigment_categories as ac','ac.id','=','a.assigment_category_id')
        ->joinSub($workedQuestionList, 'worked_question_list', function($join){
            $join->on('aql.question_list_id', '=', 'worked_question_list.question_list_id');
        })
        // proses join untuk mendapatkan skor terbaru
        ->joinSub($topQuestionList, 'latest_top_question_lists', function($join){
            $join->on('latest_top_question_lists.question_list_id','=','question_lists.id');
        })
        ->join('top_question_lists as tql','tql.id','=','latest_top_question_lists.latest_id')
        ->where('aql.creator_id',auth()->user()->id)->
        whereIn('question_lists.is_paid',[-1])
        // ->where('aql.creator_id',auth()->user()->id)->whereIn('question_lists.is_paid',[-1,0,1])
        ->groupBy('aql.question_list_id');
           // null = soal belum berkualifikasi
        // -1 = belum dikonfirmasi
        // 0 = berkualifikasi tapi terkonfirmasi tidak berbayar
        // 1 = berkualifikasi tapi terkonfirmasi berbayar
        return $query;
    }
    private function getQualityDescription($score){
        $arr = [
            ['score'=>0.96,
            'text'=>'Kualitas Luar Biasa'],
            ['score'=>0.91,
            'text'=>'Kualitas Sangat Baik'],
            ['score'=>0.86,
            'text'=>'Kualitas Sangat Bagus'],
            ['score'=>0.81,
            'text'=>'Kualitas Bagus'],
            ['score'=>0.76,
            'text'=>'Kualitas Berpotensi'],
            ['score'=>0.71,
            'text'=>'Kualitas Memadai'],
            ['score'=>0.66,
            'text'=>'Kualitas Lumayan'],
            ['score'=>0.61,
            'text'=>'Kualitas Berkembang'],
            ['score'=>0.56,
            'text'=>'Kualitas Cukup'],
            ['score'=>0.51,
            'text'=>'Kualitas Biasa'],
        ];
        foreach($arr as $k=>$v){
            if($score>=$v['score'])return $v['text'];
        }
        return 'Kualitas Kurang';

    }
    public function payableItemList(){
        
        $data = $this->payableQuery()->paginate();
        
        foreach($data as $ql){
            $ql->name = strip_tags($ql->name);
            $ql->quality_description = $this->getQualityDescription($ql->latest_score);
        }
        return $data;
        
    }
   
    public function getPayableItem($question_list_id){
        $data = $this->payableQuery()->findOrFail($question_list_id);
        return $data;
    }
    public function setIsPaid($question_list_id, Request $request){
        
        $request->validate([
            'value'=>['required', 
                Rule::in(['1', '0']), 
                function ($attribute, $value, $fail)use($request) {
                    $data = \App\Models\QuestionList::findOrFail($request->question_list_id);
                    if($data->is_paid!=-1)$fail('Soal ini sudah diset oleh pemilik soal menjadi '.($data->is_paid?'berbayar':'tidak berbayar'));

                }
            ],
        ]);
        // return $question_list_id;
        // untuk mengecek kepemilikan soal menggunakan exists
        $data = \App\Models\QuestionList::whereExists(function($query){
            $query->selectRaw('1')->from('assigment_question_lists as aql')->where('aql.creator_id',auth()->user()->id)
            ->whereColumn('aql.question_list_id','=', 'question_lists.id');

        })
        // ->where('question_lists.id',$question_list_id)
        ->find($question_list_id);
        $data->is_paid = $request->value;
        $data->save();
        
        $notificationToDelete = auth()->user()->notifications()->where('type','App\Notifications\PayableQuestionListNotification')->where('data->question_list->id',$question_list_id)->first();
        $deleteNotification = auth()->user()->notifications()->where('type','App\Notifications\PayableQuestionListNotification')->where('id',$notificationToDelete->id)->delete();
        // $deleteNotification = auth()->user()->notification()->where('type','App\Notifications\PayableQuestionListNotification')
        $data->notificationToDelete = $notificationToDelete;
        return $data;


    }

    // menampilkan list butir soal premium yang dibeli oleh siswa,
    // dan jga menampilkan siapa guru yg memakai soal tsb
    // raw sql: menampilkan pembayaran dari user_id mana + siapa yg pakai butir soal.sql
    public function getPayableListsQuery(){
        $purchased_question_lists = DB::table('purchased_items')->where('purchased_item_type', QuestionList::class);

        $payment_sharings_pivot = DB::table('payments')->selectRaw('payments.id,
        payments.type,
        payments.value,
        payments.payment_type,
        payments.payment_id as user_id,
        payments.created_at,
		payment_sharings.payment_from,
		payment_from_table.payment_id as payment_from_user_id')
        ->join('payment_sharings', 'payment_sharings.payment_to', 'payments.id')
        ->join('payments as payment_from_table', 'payment_from_table.id', '=', 'payment_sharings.payment_from')
        ->where('payments.payment_type', \App\Models\User::class);

        $query = DB::table('question_lists as ql')->selectRaw('ql.id,
        aql.assigment_id,
        aql.creator_id,
        aql.user_id,
        master_question_lists.is_paid as master_is_paid,
        purchased_question_lists.payment_id,
        payment_sharings_pivot.payment_from_user_id,
        payment_sharings_pivot.created_at as payment_created_at,
        senders.avatar as payment_sender_avatar,
        senders.name as payment_sender_name,
        receivers.avatar as payment_receiver_avatar,
        receivers.name as payment_receiver_name
        ')
        ->join('assigment_question_lists as aql', 'aql.question_list_id','=', 'ql.id')
        ->join('question_lists as master_question_lists', 'master_question_lists.id','=','ql.ref_id')
        ->joinSub($purchased_question_lists, 'purchased_question_lists', function($join){
            $join->on('purchased_question_lists.purchased_item_id','=', 'aql.question_list_id');
        })
        ->joinSub($payment_sharings_pivot, 'payment_sharings_pivot', function($join){
            $join->on('payment_sharings_pivot.id', '=', 'purchased_question_lists.payment_id');
        })
        ->join('users as senders', 'senders.id', '=', 'payment_sharings_pivot.payment_from_user_id')  #murid yang membeli soal
        ->join('users as receivers', 'receivers.id', '=', 'aql.user_id')  #guru yang memakai soal
        ->where('master_question_lists.is_paid', 1);
        return $query;
    }
    public function getPayableLists(Request $request){
        $year = $request->query('year')??date('Y');
        $month = $request->query('month')??date('m');
        
        $query = $this->getPayableListsQuery()
        ->whereYear('payment_sharings_pivot.created_at', $year)
        ->whereMonth('payment_sharings_pivot.created_at', $month)
        ->where('aql.creator_id', auth()->user()->id)
        ->orderBy('ql.id', 'DESC');

        $previous_month = \Carbon\Carbon::create($year, $month)->subMonths(1);
        $query_previous_month = $this->getPayableListsQuery()
        ->whereYear('payment_sharings_pivot.created_at', $previous_month->format('Y'))
        ->whereMonth('payment_sharings_pivot.created_at', $previous_month->format('m'))
        ->where('aql.creator_id', auth()->user()->id);

        return ['data'=>$query->get(), 'previous_month_count'=>$query_previous_month->count()];


    }
}
