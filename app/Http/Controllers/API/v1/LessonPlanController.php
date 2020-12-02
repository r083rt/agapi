<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LessonPlan;
use App\Models\LessonPlanContent;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Rating;

class LessonPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $lessonplans = LessonPlan::
            with([
                'user.profile',
                'contents',
                'grade',
                'likes',
                'template',
                'comments' => function($query){
                    $query
                    ->with('likes', 'liked')
                    ->withCount('likes', 'liked')
                    ->orderBy('created_at', 'desc');
                },
                'reviews' => function($query){
                    $query->orderBy('created_at','desc');
                },
                'reviews.user',
                'comments.user',
                'ratings',
                'cover'
            ])
            ->orderBy('created_at', 'desc')
            ->withCount([
                'likes',
                'liked',
                'comments',
                'reviews',
                'ratings as ratings_value_count'=>function($query){
                    $query->select(DB::raw('SUM(value)'));
            },
                'rated as rated_value_count'=>function($query){
                    $query->select(DB::raw('SUM(value)'));
            }])
            ->paginate($request->show ?? 10);
        return response()->json($lessonplans);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        // return response()->json($request->user()->load('profile')->profile);
        $lessonplan = new LessonPlan;
        $lessonplan->fill($request->all());
        $lessonplan->canvas_data = json_encode($request->canvas_data);
        $lessonplan->creator_id = $request->user()->id;
        $lessonplan->school = $request->user()->profile->school_place ?? 'Kosong';
        $lessonplan->effort = 100;
        $request->user()->lesson_plans()->save($lessonplan);

        if ($request->has('contents')) {
            foreach ($request->contents as $c => $content) {
                # code...
                $content = new LessonPlanContent($content);
                $lessonplan->contents()->save($content);
            }
        }
        \App\Jobs\ProcessTemplateLessonPlan::dispatchSync($lessonplan, $request->canvas_image);

        return response()->json(
            $lessonplan
                ->load([
                    'user',
                    'contents',
                    'grade',
                    'likes',
                    'template', 
                    'comments' => function($query){
                        $query
                        ->with('likes', 'liked')
                        ->withCount('likes', 'liked')
                        ->orderBy('created_at', 'desc');
                    },
                    'comments.likes',
                    'comments.user',
                    'ratings',
                    'cover'])
                ->loadCount([
                    'likes',
                    'liked',
                    'comments',
                    'ratings as ratings_value_count'=>function($query){
                        $query->select(DB::raw('SUM(value)'));
                },
                    'rated as rated_value_count'=>function($query){
                        $query->select(DB::raw('SUM(value)'));
                }])
            );
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
        $lessonplan = LessonPlan::
            with([
                'user.profile',
                'contents',
                'grade',
                'likes.user',
                'comments' => function($query){
                    $query
                    ->with('likes', 'liked')
                    ->withCount('likes', 'liked')
                    ->orderBy('created_at', 'desc');
                },
                'reviews' => function($query){
                    $query->orderBy('created_at','desc');
                },
                'reviews.user',
                'comments.user',
                'ratings.user',
                'cover',
                'template',
                'lesson_plan_cover'
            ])
            ->orderBy('created_at', 'desc')
            ->withCount([
                'likes',
                'liked',
                'comments',
                'reviews',
                'ratings as ratings_value_count'=>function($query){
                    $query->select(DB::raw('SUM(value)'));
            },
                'rated as rated_value_count'=>function($query){
                    $query->select(DB::raw('SUM(value)'));
            }])
            ->findOrFail($id);
        if($lessonplan->canvas_data==null){
            $lessonplan->canvas_data = ['items'=>[],'image'=>null];
        }else{
            $lessonplan->canvas_data = json_decode($lessonplan->canvas_data);
        }
        return response()->json($lessonplan);
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
        // return $request;
        $lessonplan = LessonPlan::findOrFail($id);
        $lessonplan->fill($request->all());
        $lessonplan->canvas_data = json_encode($request->canvas_data);
        $lessonplan->save();

        foreach ($request->contents as $c => $content) {
            # code...
            $contents[$c] = LessonPlanContent::findOrFail($content['id']);
            $contents[$c]->fill($content);
            $contents[$c]->save();
        }
        if(isset($request->canvas_image)){
            \App\Jobs\ProcessTemplateLessonPlan::dispatchSync($lessonplan, $request->canvas_image);   
        }

        return response()->json(
            $lessonplan
                ->load([
                    'user.profile',
                    'contents',
                    'grade',
                    'template',
                    'likes',
                    'comments' => function($query){
                        $query
                        ->with('likes', 'liked')
                        ->withCount('likes', 'liked')
                        ->orderBy('created_at', 'desc');
                    },
                    'comments.likes',
                    'comments.user',
                    'ratings',
                    'cover'])
                ->loadCount('likes','liked','comments','ratings')
            );
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
        $lessonplan = LessonPlan::findOrFail($id)->delete();
        return response()->json($lessonplan);
    }

    public function searchbykey($key)
    {
        $lessonplans = LessonPlan::
        with([
            'user.profile',
            'contents',
            'grade',
            'likes',
            'template',
            'comments' => function($query){
                $query
                ->with('likes', 'liked')
                ->withCount('likes', 'liked')
                ->orderBy('created_at', 'desc');
            },
            'comments.user',
            'ratings',
            'cover'
        ])
        ->withCount('likes','liked','comments','ratings')
        ->orWhere('topic','like','%'.$key.'%')
        ->orWhereHas('grade',function($query)use($key){
            $query->where('description','like','%'.$key.'%');
        })
        ->orWhereHas('user', function($query)use($key){
            $query->where('name','like','%'.$key.'%');
        })
        ->orderBy('id','desc')
        ->paginate(10);
        return response()->json($lessonplans);
    }

    public function download($id){
        //
        $data['lessonplan'] = LessonPlan::
            with([
                'user.profile.province',
                'contents',
                'grade',
                'cover'
            ])
            ->findOrFail($id);
        // dd($lessonplan);
        // return view('pages.lessonplan.preview',$data);
        $pdf = PDF::loadView('pages.lessonplan.preview', $data);
        // return $pdf->download('invoice.pdf');
        $download = $pdf->stream($data['lessonplan']->user->name."_".$data['lessonplan']->school."_".$data['lessonplan']->topic);
        return $download;
    }

    public function information(){
        $data['lesson_plans_count'] = LessonPlan::count();
        $data['users_count'] = User::where('role_id',2)->where('user_activated_at', '!=', null)
        ->whereHas('lesson_plans')
        ->count();
        $data['observers_count'] = User::where('role_id',7)->whereHas('ratings')->count();
        return response()->json($data);
    }

    public function getByEducationalLevel($educationallevelid){
        $results = LessonPlan::whereHas('grade.educational_level',function($query)use($educationallevelid){
            $query->where('id',$educationallevelid);
        })
        ->with([
            'user.profile',
            'contents',
            'grade',
            'likes',
            'comments' => function($query){
                $query
                ->with('likes', 'liked')
                ->withCount('likes', 'liked')
                ->orderBy('created_at', 'desc');
            },
            'comments.user',
            'ratings',
            'cover'
        ])
        ->withCount('likes','liked','comments','ratings')
        ->paginate(10);
        return response()->json($results);
    }

    public function getbycity($cityid){
        $lessonplans = LessonPlan::
        whereHas('user.profile',function($query)use($cityid){
            $query->where('city_id',$cityid);
        })
        ->with([
            'user.profile',
            'contents',
            'grade',
            'likes',
            'comments' => function($query){
                $query
                ->with('likes', 'liked')
                ->withCount('likes', 'liked')
                ->orderBy('created_at', 'desc');
            },
            'comments.user',
            'ratings.user',
            'cover'
        ])
        ->orderBy('created_at', 'desc')
        ->withCount([
            'likes',
            'liked',
            'comments',
            'ratings as ratings_value_count'=>function($query){
                $query->select(DB::raw('SUM(value)'));
        },
            'rated as rated_value_count'=>function($query){
                $query->select(DB::raw('SUM(value)'));
        }])
        ->get();
        return response()->json($lessonplans);
    }

    public function getbyguideduser(Request $request){
        $lessonplans = LessonPlan::whereHas('user.lesson_plan_guided_child.parent',function($query)use($request){
            $query->where('id',$request->user()->id);
        })
        ->with([
            'user.lesson_plan_guided_child.parent',
            'user.lesson_plan_guided_child.child',
            'user.profile',
            'contents',
            'grade',
            'likes',
            'comments' => function($query){
                $query
                ->with('likes', 'liked')
                ->withCount('likes', 'liked')
                ->orderBy('created_at', 'desc');
            },
            'comments.user',
            'ratings.user',
            'cover'
        ])
        ->orderBy('created_at', 'desc')
        ->withCount([
            'likes',
            'liked',
            'comments',
            'ratings as ratings_value_count'=>function($query){
                $query->select(DB::raw('SUM(value)'));
        },
            'rated as rated_value_count'=>function($query){
                $query->select(DB::raw('SUM(value)'));
        }])
        ->get();
        return response()->json($lessonplans);
    }
}
