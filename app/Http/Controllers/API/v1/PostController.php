<?php

namespace App\Http\Controllers\API\v1;

use App\Models\File;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Thumbnail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // dd(Auth::check());
        $posts = Post::with([
            'events',
            'meeting_rooms.users',
            'files',
            'bookmarks',
            'bookmarked',
            'authorId.profile',
            'authorId.role',
            'comments' => function ($query) {
                $query
                    ->with('likes.user', 'liked')
                    ->withCount('likes', 'liked')
                    ->orderBy('created_at', 'asc');
            },
            'comments.user',
            'likes.user',
        ])->withCount('comments', 'likes', 'liked')
            ->whereHas('authorId', function ($query) {
                $role_ids = [1,2,7,11];
                $query
                    ->whereIn('role_id', $role_ids);
            })->orderBy('id', 'desc')
            ->paginate($request->show ?? 10);
        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->allFiles()['files'][0]->getClientMimeType());
        //return $request;
        // return response()->json($request->all());
        $post = new Post($request->all());
        $post->slug = Str::random(8);
        $request->user()->posts()->save($post);
        if ($request->hasFile('files')) {
            if($request->has('is_file') && $request->is_file==true){
                    //dd($request->file('files')->getClientOriginalName());
                    $file = new File();
                    $path = $request->file('files')->store('files', 'wasabi');
                    $file->src = $path;
                    $file->name = $request->file('files')->getClientOriginalName();
                    $file->value='document';
                    $file->type = $request->allFiles()['files']->getClientMimeType();
                    $post->files()->save($file);
            }
            foreach ($request->allFiles()['files'] as $f => $file) {
                if (strpos($request->allFiles()['files'][$f]->getClientMimeType(), 'image') !== false) {

                    $file = new File();
                    $path = $request->allFiles()['files'][$f]->store('files', 'wasabi');
                    $file->src = $path;
                    $file->type = $request->allFiles()['files'][$f]->getClientMimeType();
                    $post->files()->save($file);
                }
                if (strpos($request->allFiles()['files'][$f]->getClientMimeType(), 'video') !== false) {

                    $file = new File();
                    $path = $request->allFiles()['files'][$f]->store('files', 'wasabi');
                    // file type is video
                    // set storage path to store the file (image generated for a given video)
                    $thumbnail_path = public_path() . '/storage/thumbnails';
                    // set thumbnail image name
                    $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
                    $thumbnail_image = $request->user()->id . "." . $timestamp . ".jpg";
                    // get video length and process it
                    // assign the value to time_to_image (which will get screenshot of video at that specified seconds)
                    // $time_to_image    = floor(($data['video_length'])/2);
                    $time_to_image = 0.1;
                    $thumbnail_status = Thumbnail::getThumbnail($request->allFiles()['files'][$f], $thumbnail_path, $thumbnail_image, $time_to_image);
                    $storagePublic = Storage::disk('wasabi')->put('thumbnails/' . $thumbnail_image, Storage::disk('public')->get('thumbnails/' . $thumbnail_image));
                    // dd($storagePublic);
                    if ($storagePublic) {
                        Storage::disk('public')->delete('thumbnails/' . $thumbnail_image);
                    }
                    $file->src = $path;
                    $file->type = $request->allFiles()['files'][$f]->getClientMimeType();
                    $file->value = 'thumbnails/' . $thumbnail_image;
                    $post->files()->save($file);
                    // dd($thumbnail_status,$thumbnail_path,$thumbnail_image);
                }
            }
        }

        if(isset($request->rooms)){
            $post->rooms()->attach($request->rooms);
        }
        
        if(isset($request->event)){
            $post->events()->attach($request->event);
        }
        return response()->json($post->load([
            'events',
            'meeting_rooms',
            'files',
            'bookmarks',
            'bookmarked',
            'authorId.profile',
            'comments' => function ($query) {
                $query
                    ->with('likes', 'liked')
                    ->withCount('likes', 'liked')->orderBy('created_at', 'desc');
            },
            'comments.user',
            'likes',
        ])->loadCount('comments', 'likes', 'liked'));
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
        $post = Post::with([
            'files',
            'bookmarks',
            'bookmarked',
            'authorId.role',
            'authorId.profile',
            'comments' => function ($query) {
                $query
                    ->with('likes.user', 'liked')
                    ->withCount('likes', 'liked')
                    ->orderBy('created_at', 'asc');
            },
            'comments.user',
            'likes.user',
        ])->withCount('comments', 'likes', 'liked')->find($id);

        return response()->json($post);
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
        $res = Post::where('author_id', '=', auth('api')->user()->id)->findOrFail($id);
        $res->fill($request->all());
        $res->save();
        return response()->json($res);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::where('author_id','=', auth('api')->user()->id)->findOrFail($id);
        $post->delete();
        return response()->json($post);
    }
    public function report(Request $request){
        $post = Post::findOrFail($request->id);
        $sync = $post->user_reports()->syncWithoutDetaching(auth('api')->user()->id);
        $sync['is_removed']=false;
        if($post->loadCount('user_reports')->user_reports_count>=10){
            $post->delete();
            $sync['is_removed']=true;
        }
        return $sync;
        // $post = Post::with('reports')->whereHas('reports',function($query){
        //     $query->where('user_id','=', auth('api')->user()->id);
        // })->find($request->id);
        // if($post==null){
        //     $post = Post::findOrFail($request->id);
        //     $report = new \App\Models\Report();
        //     $report->user_id = auth('api')->user()->id;
        //     $post->reports()->save($report);
        //     if($post->reports()->count()>=10){
        //         $post->delete();
        //         return response()->json(['is_removed'=>true]);
        //     }else{
        //         return response()->json(['is_removed'=>false]);
        //     }
        // }else{
        //     return response()->json(['error'=>'Anda sudah melaporkan postingan ini','description'=>$post->reports[0]->description]);
        // }
    
        
    }
    public function readPost(Request $request){
        $post = Post::findOrFail($request->id);
        return $post->readers()->syncWithoutDetaching(auth('api')->user()->id);
    }
    public function studentpost(Request $request)
    {
   
        $posts = Post::with([
            'files',
            'bookmarks',
            'bookmarked',
            'authorId.profile',
            'comments' => function ($query) {
                $query
                    ->with('likes.user', 'liked')
                    ->withCount('likes', 'liked')
                    ->orderBy('created_at', 'asc');
            },
            'comments.user',
            'likes.user',
        ])->withCount(['comments', 'likes', 'liked','auth_read'])
            ->whereHas('authorId.role', function ($query) {
                //->whereHas('authorId', function ($query) {
                //$query->where('role_id',\App\Models\Role::where('name','=','student')->first()->id);
                $query->where('name','=','student');
            })->whereHas('authorId.profile', function($query){
                $query->where('educational_level_id','=',auth('api')->user()->profile->educational_level_id);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($request->show ?? 10); //$request->show ?? 10
        return response()->json($posts);
    }
    public function ownstudentpost(){
        //return auth('api')->user()-id;
        $posts = Post::with([
            'files',
            'bookmarks',
            'bookmarked',
            'authorId.profile',
            'comments' => function ($query) {
                $query
                    ->with('likes.user', 'liked')
                    ->withCount('likes', 'liked')
                    ->orderBy('created_at', 'asc');
            },
            'comments.user',
            'likes.user',
        ])->withCount('comments', 'likes', 'liked','auth_read')
            ->whereHas('authorId.role', function ($query) {
                //->whereHas('authorId', function ($query) {
                //$query->where('role_id',\App\Models\Role::where('name','=','student')->first()->id);
                $query->where('name','=','student');
            })->where('author_id', '=', auth('api')->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate($request->show ?? 10); //$request->show ?? 10
        return response()->json($posts);
    }
    public function mediapost(Request $request)
    {
        $userProfile = auth()->user()->load('profile');
        Validator::make($userProfile->toArray(), [
            'profile.educational_level_id' => function ($attribute, $value, $fail)use($userProfile){
                if($userProfile['profile']['educational_level_id']==null){
                    $fail('Harus memilih jenjang terlebih dahulu');
                }
            },
        ])->validate();
        $educationalLevelId  = $userProfile->profile->educational_level_id;
        
        if($educationalLevelId==null)return abort(404);
        $posts = Post::with([
            'files',
            'bookmarks',
            'bookmarked',
            'authorId.profile',
            'comments' => function ($query) {
                $query
                    ->with('likes.user', 'liked')
                    ->withCount('likes', 'liked')
                    ->orderBy('created_at', 'asc');
            },
            'comments.user',
            'likes.user',
        ])->where('is_public',true)->withCount('comments', 'likes', 'liked')
            ->whereHas('user.role', function ($query) {
                $query->where('roles.name','!=','student');
            })->orderBy('created_at', 'desc');

            //cari post yang dengan jenjang yg sama
            $posts->whereHas('authorId.profile', function($query)use($educationalLevelId){
                $query->where('educational_level_id',$educationalLevelId);
            })->get();


            $posts = $posts->paginate($request->show ?? 10);
            return response()->json($posts);
    }
    public function setPublicPost(Request $request, $post_id){
        $res = Post::whereHas('user',function($query){
            $query->where('id',auth('api')->user()->id);
        })->find($post_id);
        $res->is_public=$request->is_public;
        $res->save();
        return $res;
    }
}
