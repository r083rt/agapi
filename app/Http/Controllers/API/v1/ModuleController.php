<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Module;
use App\Jobs\ProcessTemplateModule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //return \App\Models\User::paginate();
        
        //return $educationalLevel;
        $res = Module::with('user','grade','template')->where('is_publish',true);
        //cek apakah parameter search kosong, jika tidak lakukan pencarian berdasarkan subject
        $search=trim($request->query('q'));
        if($search!='')$res->where('name','like','%'.$search.'%');
        $res->orderBy('id','desc');
        return $res->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$input = $request->input();
        //return $request;
        $request->validate([
            'selected_template'=>['required'],
            'name'=>['required'],
            'grade'=>['required']
        ]);
        
        //$image_path=Hash::make(Carbon::now()->toDateTimeString().auth('api')->user()->id);      
        //$p = Storage::disk('s3')->put('filepath/' . $imageName, $image, 'public');
        //$isImageSaved = Storage::disk('wasabi')->put('files/'.$image_path.'.png', base64_decode($request->canvas_image));
        //if(!$isImageSaved)return abort(500,'Gambar gagal diupload');
        $module = new Module;
        $module->user_id=auth('api')->user()->id;
        $module->name = $request->name;
        $module->grade_id = $request->grade['id'];
        $module->description = $request->description;
        $module->is_publish=  $request->is_publish;
        $module->subject = $request->subject;
        $module->year = date('Y');
        //$module->master_template=$request->selected_template['id'];
        $module->canvas_data = json_encode($request->canvas_data);
        $module->save();
        ProcessTemplateModule::dispatchSync($module, $request->canvas_image);

        // $template = new \App\Models\Template;
        // $template->creator_id=$module->user_id;
        // $template->image = 'files/'.$image_path.'.png';
        // $template->name = 'custom template';
        // $module->template()->save($template);
        foreach($request->contents as $content){
            $content_db = new \App\Models\ModuleContent;
            $content_db->fill($content);
            $module->module_contents()->save($content_db);
        }
       
        return $module;
    }
    public function getmodulescount(){
        return Module::where('user_id','=',auth('api')->user()->id)->count();
    }
    //jika module disukai orang lain (liked)
    public function getlikedcount(){
        //return Module::where('user_id','=',auth('api')->user()->id)->where
        $user_id=auth('api')->user()->id;
        return \App\Models\Like::whereHasMorph('likeable','App\Models\Module',function($query)use($user_id){
            $query->where('modules.user_id','=',$user_id);
        })->count();
    }
    //jika menyukai module orang lain (likes)
    public function getlikescount(){
        //return Module::where('user_id','=',auth('api')->user()->id)->where
        $user_id=auth('api')->user()->id;
        return \App\Models\Like::where('like_type','=','App\Models\Module')->where('user_id','=',$user_id)->count();
    }

    public function getpublish(){
        return Module::withCount('likes','comments')->with('template','module_contents','grade')->where('modules.user_id','=',auth('api')->user()->id)->where('is_publish',true)->orderBy('modules.id','desc')->paginate();
    }
    public function getunpublish(){
        return Module::withCount('likes','comments')->with('template','module_contents','grade')->where('modules.user_id','=',auth('api')->user()->id)->where('is_publish',false)->orderBy('modules.id','desc')->paginate();
    }
    public function getalllatest(){
        return Module::with('grade','user')->withCount('likes','comments')->with('template','module_contents','grade')->where('is_publish',true)->orderBy('modules.id','desc')->limit(10)->get();
    }
    public function getbyeducationallevel($educationalLevelId, $search=null){
        //return response()->json(empty($search));
        $educationalLevel=\App\Models\EducationalLevel::with('grades')->find($educationalLevelId);
        if(!$educationalLevel)$educationalLevel=\App\Models\EducationalLevel::with('grades')->where('name','=',$educationalLevelId)->first();
        
        //return $educationalLevel;

        $res = Module::with('user','grade','template')->where('is_publish',true)->whereHas('grade.educational_level', function($query)use($educationalLevel){
            $query->where('educational_levels.id','=',$educationalLevel->id);
        });
        //cek apakah parameter search kosong, jika tidak lakukan pencarian berdasarkan subject
        $search=trim($search);
        if($search!='')$res->where('subject','like','%'.$search.'%');
        $res->orderBy('id','desc');
        return ['educationalLevel'=>$educationalLevel, 'pagination'=>$res->paginate()];
        //$educationalLevelId;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show($moduleId)
    {
        $module = Module::where('user_id',auth('api')->user()->id)->findOrFail($moduleId);
        return $module->loadCount('liked','likes','comments')->load('comments','user','template','module_contents','grade');
    }
    public function readModule($moduleId){
        $module = Module::where('is_publish',true)->findOrFail($moduleId);
        return $module->loadCount('liked','likes','comments')->load('comments','user','template','module_contents','grade');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $module_id)
    {
        //return $request;
        // $request->validate([
        //     'template'=>['required'],
        //     'name'=>['required'],
        //     'grade'=>['required']
        // ]);
    
        $module =  Module::where('user_id','=',auth('api')->user()->id)->findOrFail($module_id);
        //return $module;
        //return $request;
        //$module->user_id=auth('api')->user()->id;
        $module->name = $request->name;
        if(isset($request->grade['id']))$module->grade_id = $request->grade['id'];
        if(isset($request->description))$module->description = $request->description;
        if(isset($request->is_publish))$module->is_publish = $request->is_publish;
        if(isset($request->subject))$module->subject = $request->subject;
        //$module->year = date('Y');
        //$module->template_id=$request->template['id'];
        if(isset($request->canvas_data)) $module->canvas_data = json_encode($request->canvas_data);
        $module->save();
        $modulecontent_ids=[];
        if(isset($request->module_contents)){
            foreach($request->module_contents as $module_content){
                if(isset($module_content['id'])){
                    $content_db = \App\Models\ModuleContent::where('module_id','=',$module->id)->findOrFail($module_content['id']);
                }else{
                    $content_db = new \App\Models\ModuleContent;
                }
                //$content_db = \App\Models\ModuleContent::firstOrNew(['id'=>$module_content['id']]);
                $content_db->fill($module_content);
                $module->module_contents()->save($content_db);
                array_push($modulecontent_ids, $content_db->id);
            
            }
            $deletedRows = \App\Models\ModuleContent::where('module_id','=',$module->id)->whereNotIn('id',$modulecontent_ids)->delete();
        }

        if(isset($request->canvas_image))ProcessTemplateModule::dispatch($module, $request->canvas_image)->onConnection('sync');
        //return $deletedRows;
        //return $module_ids;

        return $module;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy($moduleId)
    {
        $module=Module::with('template')->where('user_id',auth('api')->user()->id)->findOrFail($moduleId);
        $template=$module->template;
        if($module->delete()){        
            if(Storage::disk('wasabi')->delete($template->image)){
               $template->delete();
            }

        }
        return $module;
    }

    // public function getcomments($moduleId){
    //     Module
    // }
}
