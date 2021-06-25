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
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use Illuminate\Support\Facades\Storage;

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
    public function store2($request){
        
        $assigment = new Assigment();
        // return $request;
        $assigment->fill($request->all());
        if($request->has('password')) $assigment->password = bcrypt($request->password);
        $assigment->code = base_convert($request->user()->id.time(), 10, 36);
        $request->user()->assigments()->save($assigment);
        foreach ($request->question_lists as $ql => $question_list) {
            # code...
            
            $item_question_list = new QuestionList();
            $item_question_list->fill($question_list);
            $item_question_list->ref_id = $question_list['pivot']['question_list_id']; // ref_id merujuk ke referensi master soal
            $item_question_list->save();

            //mendapatkan parent question_lists untuk mengecek audio'nya
            $parent_item_question_list = QuestionList::findOrFail($question_list['id']);
            if($parent_item_question_list->audio)
            {
                $file = new \App\Models\File;
                $file->type = 'audio/m4a';
                $file->src = $parent_item_question_list->audio->src;
                $item_question_list->audio()->save($file);
            }

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
    public function store(Request $request)
    {
        //jika pakai apk yg lama atau REQUEST dari rakit kumpulan soal, maka memakai API store2()
        if(!$request->audio){
            return $this->store2($request);
        }

        $request->validate([
            'audio.*'=>'nullable|mimes:mp4,mp3',
            'images.*'=>'array',
            'images.*.*'=>'image',
            'question_lists.*.answer_lists.*.images'=>'array',
            'question_lists.*.answer_lists.*.images.*'=>'image'
            // 'images.*'=>'nullable|array',
        ]);
      
        $data = (array)json_decode($request->data);

        // menyimpan answer_list_types ke array based key dgn key'nya dalah name
        $answer_list_types = DB::table('answer_list_types')->get();
        $db_answer_list_types = [];
        foreach($answer_list_types as $answer_list_type){
            $db_answer_list_types[$answer_list_type->name] = $answer_list_type;
        }
     
        // return $data;

        try{
            DB::beginTransaction();

            $assigment = new Assigment();
            // $assigment->fill($request->all());
            $assigment->fill($data);
            if($request->has('password')) $assigment->password = bcrypt($data->password);
            $assigment->code = base_convert($request->user()->id.time(), 10, 36);
            $request->user()->assigments()->save($assigment);
            foreach ($data['question_lists'] as $ql => $question_list) {
    
                # code...
                $item_question_list = new QuestionList();
                $item_question_list->fill((array)$question_list);
                // TIDAK usah dikasih ref_id
                // $item_question_list->ref_id = $question_list->pivot->question_list_id; // ref_id merujuk ke referensi master soal 
                $item_question_list->save();
    
                             
                // UPLOAD AUDIO //
                if($request->hasFile("audio.{$ql}")){
                    $file = new \App\Models\File;
                    $file->type = 'audio/m4a';
                    $path = $request->file("audio.{$ql}")->store('files', 'wasabi');
                    // return $path;
                    if($path){
                        $file->src = $path;
                        $item_question_list->audio()->save($file);
                    }   
                }           
                ////////////////////
                
                // UPLOAD IMAGES question_lists //
                if(isset($request->images) && isset($request->images[$ql])){
                    
                    foreach($request->images[$ql] as $image){
                        $file = new \App\Models\File;
                        $file->type='image/jpeg';
                        $path = $image->store('files', 'wasabi');
                        if($path){
                            $file->src = $path;
                            $item_question_list->images()->save($file);
                        }   
                    }
                }
                ///////////////////

                // UPLOAD IMAGES answer_lists //
                // cek apakah requests formdata question_lists[ql] ada
                if(isset($request->question_lists) && isset($request->question_lists[$ql])){
                   
                    foreach($request->question_lists[$ql]['answer_lists'] as $al=>$answer_list){

                        $question_list->answer_lists[$al]->image_models = [];

                        // $paths = [];
                        // upload tiap gambar yg ada tiap butir answer_list
                        foreach($answer_list['images'] as $image){
                            $upload = $image->store('files', 'wasabi');
                            if($upload){
                                // array_push($paths, $upload);
                                $file = new \App\Models\File;
                                $file->type = 'image/jpeg';
                                $file->src = $upload;
                                $question_list->answer_lists[$al]->image_models[] = $file;
                            }
                        }
                        // return $question_list->answer_lists[$al]->file_models;
                        // $paths_json = json_encode($paths); // string json akan disimpan di column name answer_lists
                        // $question_list->answer_lists[$al]->name = $paths_json; // memberi value name dgn string json
                        
                        
                        
                    }
                }
                ////////////////////
    
                $assigment->question_lists()->attach([$item_question_list->id => [
                    'creator_id' => $question_list->pivot->creator_id,
                    'user_id' => $question_list->pivot->user_id,
                    'assigment_type_id' => $question_list->pivot->assigment_type_id,
                ]]);
              
    
                foreach ($question_list->answer_lists as $al => $answer_list) {
                    # code...
                    $item_answer_list = new AnswerList();
                    $item_answer_list->name  = $answer_list->name;
                    $item_answer_list->value = $answer_list->value;

                    $type=empty($answer_list->type)?'text':$answer_list->type;
                    $answer_list_type_id = !empty($db_answer_list_types[$type]) ? $db_answer_list_types[$type]->id :null;
                    $item_answer_list->answer_list_type_id = $answer_list_type_id;
                    $item_question_list->answer_lists()->save($item_answer_list);

                    // jika ada gambar, maka save ke relasi
                    if(isset($answer_list->image_models)){
                        $item_answer_list->images()->saveMany($answer_list->image_models);
                    }

                }
              
            }
            
            DB::commit();

            return response()->json(
                $assigment
                    ->load([
                        'user',
                        'grade',
                        'assigment_category',
                        'question_lists.answer_lists',
                        'question_lists.audio',
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


        }catch (\PDOException $e) {
            // Woopsy
            
            DB::rollBack();
            dd($e);
        }
       
    }
    public function share(Request $request){

        $request->validate([
            'grade_code'=>'required'
        ]);

        // return $request;
        // return 'cok';
        $masterAssigment = Assigment::whereNull('teacher_id')->findOrFail($request->id);
        // $masterAssigment->load('question_lists');
        $masterUser = User::findOrFail($masterAssigment->user_id);
        // return $request->all();
        $newAssigment = new Assigment;
        $newAssigment->fill($masterAssigment->toArray());
        $newAssigment->code = base_convert($request->user()->id.time(), 10, 36);

        // mereferensikan ke master assigment (soal asli)
        $newAssigment->ref_id = $masterAssigment->id;
      
        //merubah value berdasarkan request
        if($request->has('password') && !empty($request->password)) $newAssigment->password = bcrypt($request->password);
        if($request->has('note') && !empty($request->note) ) $newAssigment->note = $request->note;
        if($request->has('start_at') && $request->has('end_at') && !empty($request->start_at) && !empty($request->end_at)) {
            $newAssigment->start_at = $request->start_at;
            $newAssigment->end_at = $request->end_at;
        }
        if($request->has('timer') && !empty($request->timer) ) $newAssigment->timer = $request->timer;

        $newAssigment->grade_code = $request->grade_code;
        $newAssigment->teacher_id = $request->user()->id;

        $masterUser->assigments()->save($newAssigment);
        
        foreach ($masterAssigment->question_lists as $ql => $question_list) {
            # code...
            $item_question_list = new QuestionList();
            $item_question_list->fill($question_list->toArray());
            $item_question_list->ref_id = $question_list->ref_id;
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
        else $assigment->timer=null;
        $assigment->save();
        return $assigment;
    }
    public function show2($id){
        //menampilkan assigment dengan question list tanpa jawaban
        $assigment = Assigment::with(['question_lists'=>function($query){
            $query->selectRaw('question_lists.*,ats.description as assigment_type')->join('assigment_question_lists as aql','aql.question_list_id','=','question_lists.id')
            ->join('assigment_types as ats','ats.id','=','aql.assigment_type_id')
            ->where('ats.description','selectoptions')
            ->groupBy('aql.question_list_id');
        },'question_lists.answer_lists'=>function($query){
            $query->selectRaw('answer_lists.id,answer_lists.question_list_id,answer_lists.name');
        }])->findOrFail($id);
        foreach($assigment->question_lists as $ql){
            $ql->answer = null;
        }
        // $question_list = \App\Models\QuestionList::where
        return $assigment;
    }
    public function show2shuffle($id){
        //menampilkan assigment dengan question list tanpa jawaban
        $assigment = Assigment::with(['question_lists'=>function($query){
            $query->selectRaw('question_lists.*,ats.description as assigment_type')->join('assigment_question_lists as aql','aql.question_list_id','=','question_lists.id')
            ->join('assigment_types as ats','ats.id','=','aql.assigment_type_id')
            ->where('ats.description','selectoptions')
            ->groupBy('aql.question_list_id');
        },'question_lists.answer_lists'=>function($query){
            $query->selectRaw('answer_lists.id,answer_lists.question_list_id,answer_lists.name');
        }])->findOrFail($id);
        foreach($assigment->question_lists as $ql){
            $ql->answer = null;
        }
        $shuffled_question_lists = $assigment->question_lists->shuffle();
        unset($assigment->question_lists);
        $assigment->question_lists = $shuffled_question_lists;
        // $question_list = \App\Models\QuestionList::where
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
            'question_lists.images',
            'question_lists.answer_lists'=>function($query){
                if(auth('api')->user()->role->name=="student"){
                    $query->select('id','question_list_id','name');//pastikan student tidak bisa melihat kunci jawaban
                    //masih bisa melihat jawaban untuk soal text
                }
                $query->selectRaw('answer_lists.*,alt.name as type')->leftJoin('answer_list_types as alt','alt.id','=','answer_lists.answer_list_type_id')->orderBy('answer_lists.id','asc');
            },
            'question_lists.answer_lists.images',
            'question_lists.audio',
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
            ->selectRaw('assigments.*,if(timer is null,FALSE,TRUE) as isTimer,if(start_at is null or end_at is null,FALSE, TRUE) as isExpire, if(password is null,FALSE,TRUE) isPassword')->findOrFail($id);
        
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

   
    private function handleQuestionListImagesUpload(Request $request, $question_list_index, $question_list, $db_question_list){
        $db_question_list_images = $db_question_list->images;
         
        // jika tidak ada attribut images di question_lists, maka images = [];
        if(!isset($question_list['images']))$question_list['images'] = [];

        // pisakan images yg mempunyai file dan yg tidak
         // taruh image yg mempunyai file ke $images_upload dan image yg bertipe object ke $existed_images
        $images_upload = [];       
        $existed_images = collect();
        foreach($question_list['images'] as $key=>$image){
            if($request->hasFile("question_lists.{$question_list_index}.images.{$key}")){
                array_push($images_upload, $image);
             }else{
                $existed_images->push($image);
            }
                       
        }
 
        $deleted_image_ids = [];
        $deleted_image_paths = [];
        foreach($db_question_list_images as $db_question_list_image){
            $check = $existed_images->contains(function($value, $key)use($db_question_list_image){
                return $value['id']==$db_question_list_image->id;
            });
             // jika tidak ada di target images, letakkan di $deleted_image_ids dan $deleted_image_urls 
            if(!$check){
                array_push($deleted_image_ids, $db_question_list_image->id);
                array_push($deleted_image_paths, $db_question_list_image->src);
            }
        }

        //proses upload file
        $db_files = [];
        foreach($images_upload as $image_to_upload){
            $upload_path = $image_to_upload->store('files', 'wasabi');
            if($upload_path){
                $file = new \App\Models\File;
                $file->type='image/jpeg';
                $file->src = $upload_path;
                array_push($db_files, $file);
                }
            }
            // simpan files yg sudah diupload ke wasabi
            $db_question_list->images()->saveMany($db_files);

            // hapus gambar yg tidak masuk dalam array question_lists.*.images dri request users
            Storage::disk('wasabi')->delete($deleted_image_paths);
                    
            // hapus gambar yg dipilih untuk dihapus
            $db_question_list->images()->whereIn('id',$deleted_image_ids)->delete();

    }
    private function handleImagesUpload(Request $request, $request_key, $data, $db_data){
        $db_data_images = $db_data->images;
         
        // jika tidak ada attribut images di question_lists, maka images = [];
        if(!isset($data['images']))$data['images'] = [];

        // pisakan images yg mempunyai file dan yg tidak
         // taruh image yg mempunyai file ke $images_upload dan image yg bertipe object ke $existed_images
        $images_upload = [];       
        $existed_images = collect();
        foreach($data['images'] as $key=>$image){
            if($request->hasFile("{$request_key}.{$key}")){
                array_push($images_upload, $image);
             }else{
                $existed_images->push($image);
            }
                       
        }
 
        $deleted_image_ids = [];
        $deleted_image_paths = [];
        foreach($db_data_images as $db_data_image){
            $check = $existed_images->contains(function($value, $key)use($db_data_image){
                return $value['id']==$db_data_image->id;
            });
             // jika tidak ada di target images, letakkan di $deleted_image_ids dan $deleted_image_urls 
            if(!$check){
                array_push($deleted_image_ids, $db_data_image->id);
                array_push($deleted_image_paths, $db_data_image->src);
            }
        }

        //proses upload file
        $db_files = [];
        foreach($images_upload as $image_to_upload){
            $upload_path = $image_to_upload->store('files', 'wasabi');
            if($upload_path){
                $file = new \App\Models\File;
                $file->type='image/jpeg';
                $file->src = $upload_path;
                array_push($db_files, $file);
                }
            }
            // simpan files yg sudah diupload ke wasabi
            $db_data->images()->saveMany($db_files);

            // hapus gambar yg tidak masuk dalam array question_lists.*.images dri request users
            Storage::disk('wasabi')->delete($deleted_image_paths);
           
                    
            // hapus gambar yg dipilih untuk dihapus
            $db_data->images()->whereIn('id',$deleted_image_ids)->delete();

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
        $request->validate([
            'question_lists.*'=>'array',
            'question_lists.*.answer_lists.*'=>'array',
            'question_lists.*.answer_lists.*.name'=>'nullable',
            'question_lists.*.answer_lists.*.value'=>'nullable',
            'isTimer'=>'required',
            'isExpire'=>'required',
            'password'=>[
                Rule::requiredIf(function () use ($request,$id) {
                    // required
                    $assigment = Assigment::findOrFail($id);
                    return $request->isPassword=="true" && empty($assigment->password);
                })
            ],
            'timer'=>[
                Rule::requiredIf(function () use ($request) {
                    return $request->isTimer=="true";
                })
            ],
            'start_at'=>[
                Rule::requiredIf(function () use ($request) {
                    return $request->isExpire=="true";
                })
            ],
            'end_at'=>[
                Rule::requiredIf(function () use ($request) {
                    return $request->isExpire=="true";
                })
            ]
        ]);
      
        // return $request->question_lists;
         // menyimpan answer_list_types ke array based key dgn key'nya dalah name
        $answer_list_types = DB::table('answer_list_types')->get();
        $db_answer_list_types = [];
        foreach($answer_list_types as $answer_list_type){
            $db_answer_list_types[$answer_list_type->name] = $answer_list_type;
        }

        try{
            DB::beginTransaction();

            $assigment = Assigment::where('user_id',$request->user()->id)->findOrFail($id);

            $input_assigment = $request->all();
          
            // JIKA request->isPassword=true, request->password TIDAK kosong, MAKA update db password 
            if(!empty($input_assigment['password']))$input_assigment['password'] =  bcrypt($input_assigment['password']);
            // JIKA request->isPassword=true, request->password kosong, MAKA JANGAN update db password 
            if(empty($input_assigment['password']))unset($input_assigment['password']);

            $assigment->fill($input_assigment);
            // $assigment->password = bcrypt($request->password);
            // $assigment->code = base_convert($request->user()->id.time(), 10, 36);
            $request->user()->assigments()->save($assigment);

            foreach ($request->question_lists as $ql => $question_list) {
                # code...
                $db_question_list = QuestionList::with('answer_lists','images')->findOrFail($question_list['id']);
                $db_question_list->fill((array)$question_list);
                $db_question_list->save();

                // memasukkan answer_lists ke array based key dgn key answer_lists.id
                $db_answer_lists_key_based = [];
                foreach($db_question_list->answer_lists as $answer_list){
                    $db_answer_lists_key_based[$answer_list->id] = $answer_list;
                }
                
                // handle upload gambar di question_lists
                $this->handleQuestionListImagesUpload($request, $ql, $question_list, $db_question_list);

                //////// BEGIN [ANSWER_LISTS]  ///////////
                $existed_answer_list_ids = [];
                $finished_answer_lists = [];
                foreach($question_list['answer_lists'] as $al=>$answer_list){
                    $type = empty($answer_list['type'])?'text':$answer_list['type'];

                    $answer_list_type_id  = $db_answer_list_types[$type]->id;
                    // jika ada di db_answer_lists, maka
                    $db_answer_list = null;
                    if(isset($answer_list['id']) && isset($db_answer_lists_key_based[$answer_list['id']])){

                        $db_answer_list = AnswerList::findOrFail($answer_list['id']);
                        $db_answer_list->name = $answer_list['name'];
                        $db_answer_list->value = $answer_list['value'];
                        $db_answer_list->answer_list_type_id = $answer_list_type_id;

                        $db_answer_list->save(); 

                        $existed_answer_list_ids[] = $answer_list['id'];

                    }
                    // jika tidak, berarti answer_list itu adalah data baru
                    else{
                        $db_answer_list = new AnswerList;
                        $db_answer_list->name = $answer_list['name'];
                        $db_answer_list->value = $answer_list['value'];
                        $db_answer_list->answer_list_type_id = $answer_list_type_id;
                        $db_question_list->answer_lists()->save($db_answer_list);
                        // masukkan answer_lists yg baru
                    }

                    $finished_answer_lists[$al] = $db_answer_list;

                 
                }
         
                
                // hapus answer_lists yg tidak ada dalam request answer_lists.*.id
                $deleted_answer_list_ids = [];
                foreach($db_question_list->answer_lists as $db_answer_list){
                    if(!in_array($db_answer_list->id, $existed_answer_list_ids))$deleted_answer_list_ids[] = $db_answer_list->id;
                }
                // kumpulkan images dri $deleted_answer_list_ids kemudian hapus
                $deleted_answer_list_images = \App\Models\File::whereHasMorph('fileable', [AnswerList::class], function($query)use($deleted_answer_list_ids){
                    $query->whereIn('answer_lists.id',$deleted_answer_list_ids);
                })->get();
                foreach($deleted_answer_list_images as $deleted_answer_list_image){
                    Storage::disk('wasabi')->delete($deleted_answer_list_image->src);
                }

                $db_question_list->answer_lists()->whereIn('id',$deleted_answer_list_ids)->delete();

                // looping answer_lists lgi untuk handle upload images
                foreach($question_list['answer_lists'] as $al=>$answer_list){
                    $type = empty($answer_list['type'])?'text':$answer_list['type'];
                    $db_answer_list  = $finished_answer_lists[$al];
                    if($type=="image"){
                        // fungsi handleImagesUpload akan menghanlde semua array images di $answer_list
                        $this->handleImagesUpload($request,"question_lists.{$ql}.answer_lists.{$al}.images", $answer_list, $db_answer_list);
    
                    }

                }

                /////// END [ANSWER_LISTS] //////////////
                

            }
           
            DB::commit();
            return $assigment;
        }catch (\PDOException $e) {
            // Woopsy
            
            DB::rollBack();
            dd($e);
        }

        // $assigment = Assigment::where('user_id',$request->user()->id)->findOrFail($id);
        // $assigment->fill($request->all());
        // $assigment->password = bcrypt($request->password);
        // $assigment->code = base_convert($request->user()->id.time(), 10, 36);
        // $request->user()->assigments()->save($assigment);
        // foreach ($request->question_lists as $ql => $question_list) {
        //     # code...
        //     $item_question_list = QuestionList::findOrFail($question_list['id']);
        //     $item_question_list->fill($question_list);
        //     $item_question_list->save();
        //     // $assigment->question_lists()->attach([$item_question_list->id => [
        //     //     'creator_id' => $question_list['pivot']['creator_id'],
        //     //     'user_id' => $question_list['pivot']['user_id'],
        //     //     'assigment_type_id' => $question_list['pivot']['assigment_type_id'],
        //     // ]]);

        //     foreach ($question_list['answer_lists'] as $al => $answer_list) {
        //         # code...
        //         $item_answer_list = AnswerList::findOrFail($answer_list['id']);
        //         $item_answer_list->name = $answer_list['name'];
        //         $item_answer_list->save();
        //         // $item_question_list->answer_lists()->save($item_answer_list);
        //     }
        // }
        // return response()->json(
        //     $assigment
        //         ->load([
        //             'user',
        //             'grade',
        //             'assigment_category',
        //             'question_lists.answer_lists',
        //             'likes',
        //             'comments.user',
        //             'comments' => function ($query) {
        //                 $query
        //                     ->with('likes', 'liked')
        //                     ->withCount('likes', 'liked')
        //                     ->orderBy('created_at', 'desc');
        //             },
        //         ])
        //         ->loadCount('comments', 'likes', 'liked')
        // );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assigment  $assigment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assigment $assigment)
    {
        $user = auth()->user();
        $assigment->where('user_id',$user->id)->delete();
        return response($assigment);
    }
    public function softDelete($id){
        $assigment = Assigment::withCount(['sessions'=>function($query){
            $query->has('questions');
        }])
        ->withCount(['sessions as daily_sessions_count'=>function($query){
            $query->whereDate('sessions.created_at',\Carbon\Carbon::now()->toDateString());
        }])
        ->with('sessions','grade')->where(function($query){
            $query->where('teacher_id',auth('api')->user()->id)->orWhere('teacher_id',auth('api')->user()->id);
        })->findOrFail($id);
        $assigment->delete();
        return $assigment;
    }
    public function restore($id){
        $assigment = Assigment::onlyTrashed()->withCount(['sessions'=>function($query){
            $query->has('questions');
        }])
        ->withCount(['sessions as daily_sessions_count'=>function($query){
            $query->whereDate('sessions.created_at',\Carbon\Carbon::now()->toDateString());
        }])
        ->with('sessions','grade')->where(function($query){
            $query->where('teacher_id',auth('api')->user()->id)->orWhere('teacher_id',auth('api')->user()->id);
        })->findOrFail($id);
        $assigment->restore();
        return $assigment;
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
        }])
        ->withCount(['sessions as daily_sessions_count'=>function($query){
            $query->whereDate('sessions.created_at',\Carbon\Carbon::now()->toDateString());
        }])
        ->with('sessions','grade')->where('teacher_id',auth('api')->user()->id)->orderBy('id','desc')->paginate();

        return $res;
    }
    public function getDeletedItems(){
        $res = Assigment::onlyTrashed()->withCount(['sessions'=>function($query){
            $query->has('questions');
        }])
        ->withCount(['sessions as daily_sessions_count'=>function($query){
            $query->whereDate('sessions.created_at',\Carbon\Carbon::now()->toDateString());
        }])
        ->with('sessions','grade')->where('teacher_id',auth('api')->user()->id)->orderBy('id','desc')->paginate();

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
            // 'question_lists'=>function($query){
            //     // $query->selectRaw('question_lists.*,ats.description as question_list_type')
            //     // ->join('')
            // },
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
    public function payableBuildSearch(Request $request, $assigmentCategoryId,$educationalLevelId){
        $res = Assigment::
        whereHas('question_lists', function($query){
            $query->where('question_lists.is_paid',1);
        })
        ->with([
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
    public function downloadexcel($id, $teacher_id){
        $assigment = Assigment::withCount(['sessions'=>function($query){
            $query->has('questions');
        }])->with('grade','teacher')->findOrFail($id);
        $info = $this->getAssigmentInfoById($id);
        $sessions = \App\Models\Session::with('user','questions.answer','assigments')->whereHas('assigments',function($query)use($id,$teacher_id){
            $query->where('assigments.id','=',$id)->where('teacher_id',$teacher_id); 
        })->has('questions')->get();
        // return $sessions;
        // return $assigment;
        $spreadsheet = new Spreadsheet();
        //Specify the properties for this document
        $spreadsheet->getProperties()
        ->setTitle('testgan')
        ->setSubject('A PHPExcel example')
        ->setDescription('AGPAII Digital')
        ->setCreator('CV Ardata Media')
        ->setLastModifiedBy('CV Ardata Media');

         //Adding data to the excel sheet
        $tgl = "* Data Per ".\Carbon\Carbon::now()->toDateTimeString();
        $spreadsheet->setActiveSheetIndex(0);
        $spreadsheet->getActiveSheet()
        ->setCellValue('A1', $tgl)
        ->setCellValue('A2', $assigment->name)->mergeCells('A2:B2')
        ->setCellValue('A3','Oleh')->setCellValue('B3',$assigment->teacher->name)
        ->setCellValue('A4','Tgl paket soal dibuat')->setCellValue('B4',$assigment->created_at)
        ->setCellValue('A5','Untuk kelas')->setCellValue('B5',$assigment->grade->description)
        ->setCellValue('A6','Semester')->setCellValue('B6',$assigment->semester)
        ->setCellValue('A7','Tahun ajaran')->setCellValue('B7',$assigment->education_year)
        ->setCellValue('A8','Kode')->setCellValue('B8',$assigment->code)
        ->setCellValue('A9','Dikerjakan sebanyak')->setCellValue('B9',$assigment->sessions_count)
        ->setCellValue('A10','Nilai tertinggi')->setCellValue('B10',$info->max_score)
        ->setCellValue('A11','Nilai rata-rata')->setCellValue('B11',$info->avg_score)
        ->setCellValue('A13','Nama')->setCellValue('B13','Nilai');

        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);

        $spreadsheet->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal('center');
        $index=14;
        foreach($sessions as $key=>$session){
            $spreadsheet->getActiveSheet()->
            setCellValue("A{$index}",$session->user->name)
            ->setCellValue("B{$index}",$session->assigments[0]->pivot->total_score);
            $index++;
        }
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '00000000'],
                ],
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle("A13:B".($index-1))->applyFromArray($styleArray);

        $title = 'Data tgl '.date('Y-m-d').' '.time();
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"$title.xlsx\"");
        header('Cache-Control: max-age=0');
    
        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');

        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header('Content-Disposition: attachment; filename="'.$title.'.xlsx"');
        $writer->save('php://output');
        exit();

    }

    private function payableQuery(){
         // query untuk assigments yang telah dikerjakan
         $workedAssigment = DB::table('assigment_sessions as ass')->selectRaw('a2.ref_id as assigment_id,count(1) as scores_count')
         ->join('assigments as a2','a2.id','=','ass.assigment_id')
         ->where('a2.is_publish',1)->whereNotNull('a2.teacher_id')->whereNotNull('a2.ref_id')
         ->groupBy('a2.ref_id');
         
         // return $workedAssigment->get();
 
         $query = \App\Models\Assigment::selectRaw('assigments.*,g.description,worked_assigment.scores_count')->with('grade','user','question_lists.answer_lists')//->selectRaw('assigments.id,assigments.user_id,assigments.topic,assigments.name,assigments.created_at')
         ->join('grades as g','g.id','=','assigments.grade_id')
         ->joinSub($workedAssigment,'worked_assigment', function($join){
             $join->on('worked_assigment.assigment_id', '=','assigments.id');
         })
         // return $data->toSql();  
         // null = soal belum berkualifikasi
         // -1 = belum dikonfirmasi
         // 0 = berkualifikasi tapi terkonfirmasi tidak berbayar
         // 1 = berkualifikasi tapi terkonfirmasi berbayar
         ->where('assigments.user_id', auth()->user()->id)
         // ->whereIn('assigments.is_paid',[-1,0,1])
         ->whereIn('assigments.is_paid',[-1]);

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
        return $data;
        
    }
    public function getPayableItem($assigment_id){
        // return $assigment_id;
        $data = $this->payableQuery()->findOrFail($assigment_id);
        return $data;
    }
    public function setIsPaid($assigment_id, Request $request){
        
        $request->validate([
            'value'=>['required', 
                Rule::in(['1', '0']), 
                function ($attribute, $value, $fail)use($request) {
                    $data = \App\Models\Assigment::findOrFail($request->assigment_id);
                    if($data->is_paid!=-1)$fail('Paket Soal ini sudah diset oleh pemilik soal menjadi '.($data->is_paid?'berbayar':'tidak berbayar'));

                }
            ],
        ]);
        // return $question_list_id;
        $data = \App\Models\Assigment::where('user_id', auth()->user()->id  )
        ->find($assigment_id);
        $data->is_paid = $request->value;
        $data->save();
        
        $notificationToDelete = auth()->user()->notifications()->where('type','App\Notifications\PayableAssigmentNotification')->where('data->assigment->id',$assigment_id)->first();
        $deleteNotification = auth()->user()->notifications()->where('type','App\Notifications\PayableAssigmentNotification')->where('id',$notificationToDelete->id)->delete();
        // $deleteNotification = auth()->user()->notification()->where('type','App\Notifications\PayableQuestionListNotification')
        $data->notificationToDelete = $notificationToDelete;
        return $data;


    }
    public function getAssigmentsInfo(Request $request){
        $request->validate([
            'assigment_ids'=>'required|array'
        ]);
        $assigments = Assigment::withCount('question_lists')->whereIn('id',$request->assigment_ids)->orderBy('id','asc')->get();
        return $assigments;

    }
}
