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
    private function payableQuery(){
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
}
