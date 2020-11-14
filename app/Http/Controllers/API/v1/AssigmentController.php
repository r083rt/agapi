<?php

namespace App\Http\Controllers\API\v1;

use DB;
use App\Models\AnswerList;
use App\Models\Assigment;
use App\Http\Controllers\Controller;
use App\Models\QuestionList;
use App\Models\User;
use App\Models\AssigmentType;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

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
        $assigments = Assigment::with([
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
        ])
            ->orderBy('created_at','desc')
            ->withCount('comments', 'likes', 'liked')
            ->paginate();
            foreach ($assigments as $a => $assigment) {
                # code...
                foreach ($assigment->question_lists as $ql => $question_list) {
                    # code...
                    $question_list->pivot->assigment_type = AssigmentType::find($question_list->pivot->assigment_type_id);
                }
            }
        return response()->json($assigments);
    }
    //menampilkan assigment dengan session yang telah dikerjakan
    // public function finishedAssigment($type='sharedassigment'){

    //     $userProfile = auth('api')->user()->load('profile');
    //     $educationalLevelId = $userProfile->profile->educational_level_id;
    //     if($educationalLevelId==null)return response()->json(['error_jenjang'=>true]);

    //     //sharedassigment = paket soal hasil salinan dari master paket soal
    //     $res = Assigment::with(['auth_sessions','teacher','user','grade']);
    //     $res->whereHas('grade',function($query)use($educationalLevelId){
    //         $query->where('educational_level_id',$educationalLevelId);
    //     });

    //     if($type=='sharedassigment'){ //menampilkan sharedassigment yang telah dikerjakan
    //         $res->whereNotNull('teacher_id');
    //     }elseif($type=='masterassigment'){ //menampilkan master soal (latihan soal) yang telah dikerjakan
    //         $res->whereNull('teacher_id')->where('is_public','=',true);
    //     }else{
    //         return abort(404);   
    //     }
    //     return $res->orderBy('id','desc')->has('auth_sessions')->paginate();//->has('latest_auth_session')->paginate();
    // }
    public function finishedAssigment($type='sharedassigment'){

        $userProfile = auth('api')->user()->load('profile');
        $educationalLevelId = $userProfile->profile->educational_level_id;
        if($educationalLevelId==null)return response()->json(['error_jenjang'=>true]);

        //sharedassigment = paket soal hasil salinan dari master paket soal
        $sessions = \App\Models\Session::with('assigments.teacher','assigments.grade','assigments.user')->whereHas('assigments', function($query)use($type,$educationalLevelId){
            if($type=='sharedassigment'){ //menampilkan sharedassigment yang telah dikerjakan
                $query->whereNotNull('teacher_id');
            }elseif($type=='masterassigment'){ //menampilkan master soal (latihan soal) yang telah dikerjakan
                $query->whereNull('teacher_id')->where('is_public','=',true);
            }else{
                return abort(404);   
            }

            $query->whereHas('grade',function($query)use($educationalLevelId){
                $query->where('educational_level_id',$educationalLevelId);
            });
        })->where('user_id','=',$userProfile->id)->orderBy('id','desc');
        return $sessions->paginate();
        
    }
    public function publish()
    {
        //
        $assigments = Assigment::with([
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
        ])
            ->where('is_publish',true)
            ->whereNull('teacher_id')
            ->orderBy('created_at','desc')
            ->withCount('comments', 'likes', 'liked')
            ->paginate();
            foreach ($assigments as $a => $assigment) {
                # code...
                foreach ($assigment->question_lists as $ql => $question_list) {
                    # code...
                    $question_list->pivot->assigment_type = AssigmentType::find($question_list->pivot->assigment_type_id);
                }
            }
        return response()->json($assigments);
    }

    public function publish2()
    {
        //
        $assigments = Assigment::with([
            'user',
            'grade',
            'assigment_category',
            'question_lists.answer_lists',
            'question_lists.assigment_types'=>function($query){
                $query->select('assigment_types.id','assigment_types.name','assigment_types.description');
            },
            'likes',
            'comments.user',
            'comments' => function ($query) {
                $query
                    ->with('likes', 'liked')
                    ->withCount('likes', 'liked')
                    ->orderBy('created_at', 'desc');
            },
        ])
            ->where('is_publish',true)
            ->whereNull('teacher_id')
            ->orderBy('created_at','desc')
            ->withCount('comments', 'likes', 'liked')
            ->paginate();

        return response()->json($assigments);
    }

    public function unpublish()
    {
        $assigments = Assigment::with([
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
        ])
            ->where('is_publish',false)
            ->orderBy('created_at','desc')
            ->withCount('comments', 'likes', 'liked')
            ->paginate();
        foreach ($assigments as $a => $assigment) {
            # code...
            foreach ($assigment->question_lists as $ql => $question_list) {
                # code...
                $question_list->pivot->assigment_type = AssigmentType::find($question_list->pivot->assigment_type_id);
            }
        }
        return response()->json($assigments);
    }
    public function unpublish2()
    {
        $assigments = Assigment::with([
            'user',
            'grade',
            'assigment_category',
            'question_lists.answer_lists',
            'question_lists.assigment_types'=>function($query){
                $query->select('assigment_types.id','assigment_types.name','assigment_types.description');
            },
            'likes',
            'comments.user',
            'comments' => function ($query) {
                $query
                    ->with('likes', 'liked')
                    ->withCount('likes', 'liked')
                    ->orderBy('created_at', 'desc');
            },
        ])
            ->where('is_publish',false)
            ->orderBy('created_at','desc')
            ->withCount('comments', 'likes', 'liked')
            ->paginate();

        return response()->json($assigments);
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
        # code...
        $assigment = new Assigment();
        $assigment->fill($request->all());
        if($request->has('password')) $assigment->password = bcrypt($request->password);
        $assigment->code = base_convert($request->user()->id.time(), 10, 36);
        $request->user()->assigments()->save($assigment);
        foreach ($request->question_lists as $ql => $question_list) {
            # code...
            $item_question_list = new QuestionList();
            $item_question_list->fill($question_list);
            $item_question_list->save();
            $assigment->question_lists()->attach([$item_question_list->id => [
                'creator_id' => $question_list['pivot']['creator_id'],
                'user_id' => $question_list['pivot']['user_id'],
                'assigment_type_id' => $question_list['pivot']['assigment_type_id'],
            ]]);

            foreach ($question_list['answer_lists'] as $al => $answer_list) {
                # code...
                $item_answer_list = new AnswerList();
                $item_answer_list->fill($answer_list);
                $item_question_list->answer_lists()->save($item_answer_list);
            }
        }
        return response()->json(
            $assigment
                ->load([
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
                ])
                ->loadCount('comments', 'likes', 'liked')
        );
    }
    public function share(Request $request){

        $masterAssigment = Assigment::findOrFail($request->id);
        $masterUser = User::findOrFail($masterAssigment->user_id);
        //return $request->all();
        $newAssigment = new Assigment;
        $newAssigment->fill($masterAssigment->toArray());
        $newAssigment->fill($request->all());
        //\return $newAssigment;
        //$newAssigment->
        if($request->has('password')) $newAssigment->password = bcrypt($request->password);
        $newAssigment->code = base_convert($request->user()->id.time(), 10, 36);
        $newAssigment->teacher_id = $request->user()->id;

        $masterUser->assigments()->save($newAssigment);
        
        foreach ($masterAssigment->question_lists as $ql => $question_list) {
            # code...
            $item_question_list = new QuestionList();
            $item_question_list->fill($question_list->toArray());
            $item_question_list->save();
            $newAssigment->question_lists()->attach([$item_question_list->id => [
                'creator_id' => $question_list['pivot']['creator_id'],
                'user_id' => $request->user()->id,
                'assigment_type_id' => $question_list['pivot']['assigment_type_id'],
            ]]);

            foreach ($question_list->answer_lists as $al => $answer_list) {
                # code...
                $item_answer_list = new AnswerList();
                $item_answer_list->fill($answer_list->toArray());
                $item_question_list->answer_lists()->save($item_answer_list);
            }
        }
        return $newAssigment;
    }
    public function setAssigmentToPublic(Request $request){
        $assigment = Assigment::where('user_id','=',auth('api')->user()->id)->findOrFail($request->id);
        $assigment->is_public = $request->is_public;
        if($request->note)$assigment->note = $request->note;
        if($request->isTimer)$assigment->timer = $request->timer;
        $assigment->save();
        return $assigment;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assigment  $assigment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // die(auth('api')->user()->role->name);
        //return User::with('profile')->findOrFail(auth('api')->user()->id);
        $assigment = Assigment::
            with([
            'user',
            'grade',
            'assigment_category',
            'question_lists.answer_lists'=>function($query){
                if(auth('api')->user()->role->name=="student"){
                    $query->select('id','question_list_id','name');//pastikan student tidak bisa melihat kunci jawaban
                    //masih bisa melihat jawaban untuk soal text
                }
            },
            'question_lists',
            'likes',
            'comments.user',
            'comments' => function ($query) {
                $query
                    ->with('likes', 'liked')
                    ->withCount('likes', 'liked')
                    ->orderBy('created_at', 'desc');
            },
        ])
            ->withCount('comments', 'likes', 'liked')
            ->findOrFail($id);
        
        foreach ($assigment->question_lists as $ql => $question_list) {
            # code...
            $question_list->pivot->user = User::find($question_list->pivot->user_id);
            $question_list->pivot->creator = User::find($question_list->pivot->creator_id);
            $question_list->pivot->assigment_type = AssigmentType::find($question_list->pivot->assigment_type_id);

            //jika murid, maka hilangkan/kosongkan field `name` dari answer_list karena itu adalah kunci jawaban dari soal tsb
            if(auth('api')->user()->role->name=="student"){
                if($question_list->pivot->assigment_type->description=="textarea" || $question_list->pivot->assigment_type->description=="textfield"){
                    $question_list->answer_lists->transform(function($item, $key){
                        $item->name="";
                        return $item;
                    });
                }
            }

        }

        return response()->json($assigment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assigment  $assigment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $assigment = Assigment::findOrFail($id);
        $assigment->fill($request->all());
        $assigment->password = bcrypt($request->password);
        $assigment->code = base_convert($request->user()->id.time(), 10, 36);
        $request->user()->assigments()->save($assigment);
        foreach ($request->question_lists as $ql => $question_list) {
            # code...
            $item_question_list = QuestionList::findOrFail($question_list['id']);
            $item_question_list->fill($question_list);
            $item_question_list->save();
            $assigment->question_lists()->attach([$item_question_list->id => [
                'creator_id' => $question_list['pivot']['creator_id'],
                'user_id' => $question_list['pivot']['user_id'],
                'assigment_type_id' => $question_list['pivot']['assigment_type_id'],
            ]]);

            foreach ($question_list['answer_lists'] as $al => $answer_list) {
                # code...
                $item_answer_list = AnswerList::findOrFail($answer_list['id']);
                $item_answer_list->fill($answer_list);
                $item_question_list->answer_lists()->save($item_answer_list);
            }
        }
        return response()->json(
            $assigment
                ->load([
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
                ])
                ->loadCount('comments', 'likes', 'liked')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assigment  $assigment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assigment $assigment)
    {
        //
        $assigment->delete();
        return response($assigment);
    }

    public function search($key){
        $userProfile = auth('api')->user()->load('profile');
        $educationalLevelId = $userProfile->profile->educational_level_id;
        if($educationalLevelId==null)return response()->json(['error_jenjang'=>true]);

        $res = Assigment::with('question_lists','teacher','grade')->where('code',$key)->whereNotNull('teacher_id')->whereDoesntHave('sessions',function($query){
            $query->where('sessions.user_id','=',auth('api')->user()->id);
        })->whereHas('grade',function($query)use($educationalLevelId){
            $query->where('educational_level_id',$educationalLevelId);
        })->first(); //->first(); //whereNotNull agar tidak bisa mencari master soal
        return response()->json($res);
    }
    
    public function getSharedAssigment(){
       // return auth('api')->user()->id;
        $res = Assigment::withCount(['sessions'=>function($query){
            $query->has('questions');
        }])->with('sessions','grade')->where('teacher_id',auth('api')->user()->id)->orderBy('id','desc')->paginate();

        return $res;
    }

    public function getMasterAssigment($subject=null){
        //$res = Assigment::with(['grade','assigment_session.latest_session'])->where('is_publish',1)->where('is_lock',0)->orderBy('id','desc');  
        //is_publish = true -> paket soal
        //is_publish = false -> butir soal
        //$test = Assigment::with(['grade','question_lists_select_options_only'])->has('question_lists_select_options_only')->find(2485);
        //return $test;

        $userProfile = auth('api')->user()->load('profile');
        Validator::make($userProfile->toArray(), [
            'profile.educational_level_id' => function ($attribute, $value, $fail)use($userProfile){
                if($userProfile['profile']['educational_level_id']==null){
                    $fail('Harus memilih jenjang terlebih dahulu');
                }
            },
        ])->validate();
       
        $educationalLevelId = $userProfile->profile->educational_level_id;
       // return $educationalLevelId;
        if($educationalLevelId==null)return abort(404);

        $res = Assigment::with(['question_lists_select_options_only','user','grade','auth_sessions'])
        ->whereNull('teacher_id')
        ->where('is_publish',true)
        ->where('is_public',true)
        ->orderBy('id','desc'); //akan mereturn semua sessions, susah jika digabungkan dengan paginate()
        //return $res->get();
         if($subject!=null){
            $res->where("assigments.subject","like", "%$subject%"); 
         }
    
         $res->whereHas('grade',function($query)use($educationalLevelId){
             $query->where('educational_level_id',$educationalLevelId);
         }); //filter beradasarkan jenjang
        $res->has('question_lists_select_options_only'); //hanya mengambil Assigment yang setidaknya memiliki 1 soal pilihan ganda

         
         return $res->paginate();
     }
    public function getAssigmentInfoById($key){
        $res = Assigment::withCount('sessions')->with('grade')->find($key);
        $res->max_score=$res->sessions->max('pivot.total_score');
        $res->avg_score=round($res->sessions->avg('pivot.total_score'), 2);
        //unset($res->sessions);
       // $res->sessions_count = $res->sessions->count();
        return $res;
    }
    public function getStudentAssigmentsById($assigment_id){
        $a=\App\Models\Session::with('user','questions.answer','assigments')->whereHas('assigments',function($query)use($assigment_id){
            $query->where('assigments.id','=',$assigment_id)->where('teacher_id',auth('api')->user()->id); 
        })->has('questions')->paginate();
        return $a;
        //$res = Assigment::withCount('sessions')->with('grade','sessions.user','sessions.questions.answer')->find($key);
        // $res->max_score=$res->sessions->max('pivot.total_score');
        // $res->avg_score=$res->sessions->avg('pivot.total_score');
   
        return $res; 
    }
    public function selectOptionsOnly($assigment_id){
        $res = Assigment::with(['grade','user','question_lists_select_options_only.assigment_types', 'question_lists_select_options_only.answer_lists'=>function($query){
            $query->select('id','question_list_id','name');
        }])->find($assigment_id); //cara 1 (2 query tapi hasil output lebih sedikit)
        //return Assigment::with('question_lists.assigment_question_list.assigment_type_selectoptions_only')->find($assigment_id); cara 2 (1 query tapi hasil outputnya banyak)
        if($res){
            $res["question_lists"] = $res->question_lists_select_options_only;
            //menghapus kunci jawaban, bisa dengan cara lain : protected $hidden = ['value'] pada Model
            foreach($res->question_lists as $key=>$question_list){
                foreach($question_list->answer_lists as $answer_list){
                    unset($answer_list['value']);
                }
            }
            unset($res['question_lists_select_options_only']);
        }
        return $res;

    }
    public function selectOptionsOnlyWithAnswer($session_id){

        $res = \App\Models\Session::with('questions.assigment_question_list.assigment_type','questions.answer','questions.answer_lists')->find($session_id);
        
        return $res;
        
    }
    public function check(Request $request){
        //return $request;
        $assigment = Assigment::find($request->assigment_id);

        $user = User::findOrFail($request->teacher_id);
        if($user->id==$assigment->user_id){
            $newAssigment = $assigment;
        }else{
            $newAssigment = new Assigment;
            $newAssigment->code = base_convert($user->id.time(), 10, 36);
        }
        $newAssigment->fill($assigment->toArray());
        $newAssigment->teacher_id = $user->id;
        $newAssigment->save();

        if($user->id!==$assigment->user_id){ 

            $userQuestionList =  $assigment->question_lists()->get(); //mengambil quesiton_list dari pembuat soal

            foreach($userQuestionList as $userQuestion){
                $newAssigment->question_lists()->attach([$userQuestion->id => [
                    'creator_id' => $assigment->user_id, //si pembuat soal
                    'user_id' => $user->id, // yang pakai soal
                    'assigment_type_id' => $userQuestion->pivot->assigment_type_id
                ]]);
                
                $answerList = $userQuestion->answer_lists()->get();
                foreach($answerList as $answer){
                    $userQuestion->answer_lists()->save($answer);
                }
            }
            //$user = User::where('kta_id',$ktaId)->first(); 
        }
        return response()->json($newAssigment);
    }
    public function start($code, $ktaId){
        //return [$code,$ktaId];
        $assigment = Assigment::where('code',$code)->first();
        $user = User::where('kta_id',$ktaId)->first(); 
        
        if($assigment->user_id == $user->id){
            return response()->json($assigment);
        } else {
            //return $assigment;
            $newAssigment = new Assigment;
            
            $newAssigment->fill($assigment->toArray());
            $newAssigment->teacher_id = $user->id;
            $newAssigment->id=$assigment->id;
            // $newAssigment->code = base_convert($user->id.time(), 10, 36);
            // // $newAssigment;
            // $newAssigment->save();

            // $userQuestionList =  $assigment->question_lists()->get(); //mengambil quesiton_list dari pembuat soal
            // //return $userQuestionList;
            // foreach($userQuestionList as $userQuestion){
            //     $newAssigment->question_lists()->attach([$userQuestion->id => [
            //         'creator_id' => $assigment->user_id, //si pembuat soal
            //         'user_id' => $user->id, // yang pakai soal
            //         'assigment_type_id' => $userQuestion->pivot->assigment_type_id
            //     ]]);
                
            //     $answerList = $userQuestion->answer_lists()->get();
            //     foreach($answerList as $answer){
            //         $userQuestion->answer_lists()->save($answer);
            //     }
            // }
        
            return response()->json($newAssigment);
        }
    }
    public function buildSearch(Request $request, $assigmentCategoryId,$educationalLevelId){
        $res = Assigment::
        with([
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
        ])
        ->orderBy('created_at','desc')
        ->withCount('comments', 'likes', 'liked')
        ->where('is_publish',false)
        ->whereHas('grade',function($query)use($educationalLevelId){
            $query->where('educational_level_id',$educationalLevelId);
        })
        ->whereIn('assigment_category_id',$assigmentCategoryId == 9 ? [1,7,8] : [$assigmentCategoryId]);
        if(!empty($request->q)){
            $res->where('topic','like','%'.$request->q.'%');
        }
        $res = $res->paginate();    
        foreach ($res as $a => $assigment) {
            # code...
            foreach ($assigment->question_lists as $ql => $question_list) {
                # code...
                $question_list->pivot->assigment_type = AssigmentType::find($question_list->pivot->assigment_type_id);
            }
        }

        return response()->json($res);
    }
    public function statistics(){
        
        //$db = DB::table('assigment_sessions')->join('sessions','assigment_sessions.session_id','=','sessions.id')->where('sessions.user_id','=',auth('api')->user()->id)->get();
        $db = DB::select('select a.*,UNIX_TIMESTAMP(a.updated_at)*1000 as timestamp from assigment_sessions a inner join sessions b on a.session_id=b.id where b.user_id=? and  (select teacher_id from assigments where id=a.assigment_id) is not null order by timestamp asc',[auth('api')->user()->id]);
        return $db;
        return \App\Models\Session::where('user_id','=',auth('api')->user()->id)->get();
    }
}
