<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Comment;
use App\Models\District;
use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Profile;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasRole('admin')) {
            $users = User::with('profile.district', 'role')
                ->where('user_activated_at', '!=', null)
                ->whereIn('role_id',[2,7,9,10,11])
                ->paginate($request->show ?? 10);
        } elseif (Auth::user()->hasRole('DPP')) {
            $users = User::with('profile.district', 'role')->get();
        } elseif (Auth::user()->hasRole('DPW')) {
            $users = User::with('profile', 'role')->whereHas('profile.province', function ($query) {
                $query->where('id', Auth::user()->province_id);
            })->get();
        } elseif (Auth::user()->hasRole('DPD')) {
            $users = User::with('profile', 'role')->whereHas('profile.city', function ($query) {
                $query->where('id', Auth::user()->city_id);
            })->get();
        } elseif (Auth::user()->hasRole('DPC')) {
            $users = User::with('profile', 'role')->whereHas('profile.district', function ($query) {
                $query->where('id', Auth::user()->province_id);
            })->get();
        } else {
            $users = User::with('profile', 'role')->where('user_activated_at', '!=', null)->paginate($request->show ?? 10);
        }

        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        $user->profile()->save(new Profile());

        return response()->json($user->load('profile', 'role'));
    }
    public function changePassword(Request $request){

        $user = User::findOrFail(auth('api')->user()->id);
        if(Hash::check($request->old_password, $user->password)){
            if(strcmp($request->new_password,$request->confirm_password)==0){
                $user->password=bcrypt($request->new_password);
                $user->save();
                return response()->json(['sukses'=>'Berhasil merubah password']);
            }else{
                return response()->json(['error'=>'Konfirmasi password baru salah']);
            }
        }else{
            return response()->json(['error'=>'Password lama salah']);
        }
        
        
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);
        
        $user = new User;
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        $user->profile()->save(new Profile());
        $success['access_token'] = $user->createToken('AGPAII DIGITAL')->accessToken;
        $success['token_type'] = 'Bearer';
        return response()->json($success);
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
        $user = User::findOrFail($id);
        $res = $user->load([
            'bookmark_posts' => function ($query) {
                $query->with([
                    'files',
                    'authorId.profile',
                    'comments',
                    'comments.user',
                    'likes',
                    'bookmarked',
                    'bookmarks',
                ]);
            },
            'posts' => function ($query) {
                $query->with([
                    'likes', 'liked',
                ])->withCount('likes', 'liked')
                    ->orderBy('created_at', 'desc');
            },
            'posts.files',
            'posts.authorId.profile',
            'posts.comments',
            'posts.comments.user',
            'posts.likes',
            'profile.district',
            'profile.province',
            'profile.city',
            'profile.educational_level',
            'payments' => function ($query) {
                $query->where('status', 'success');
            },
            'events' => function ($query) {
                $query->orderBy('created_at', 'desc');
            },
            'events.users',
            'guest_events' => function ($query) {
                $query->orderBy('created_at', 'desc');
            },
            'lesson_plans' => function ($query) {
                $query
                    ->withCount('likes', 'comments')
                    ->orderBy('created_at', 'desc');
            },
            'lesson_plans.user',
            'lesson_plans.contents',
            'lesson_plans.grade',
            'lesson_plans.cover',
            //'lesson_plan_guided_users',
            'follows.lesson_plans'=>function($query){
                $query
                    ->with([
                        'user.profile',
                        'contents',
                        'grade',
                        'likes',
                        'comments' => function ($query) {
                            $query
                                ->with('likes', 'liked')
                                ->withCount('likes', 'liked')
                                ->orderBy('created_at', 'desc');
                        },
                        'reviews' => function ($query) {
                            $query->orderBy('created_at', 'desc');
                        },
                        'reviews.user',
                        'comments.user',
                        'ratings',
                        'cover',
                    ])
                    ->withCount([
                        'likes',
                        'liked',
                        'comments',
                        'reviews',
                        'ratings as ratings_value_count' => function ($query) {
                            $query->select(DB::raw('SUM(value)'));
                        },
                        'rated as rated_value_count' => function ($query) {
                            $query->select(DB::raw('SUM(value)'));
                        }]);
            },
            'follower',
            'lesson_plans' => function ($query) {
                $query
                    ->orderBy('created_at','desc')
                    ->with([
                        'user.profile',
                        'contents',
                        'grade',
                        'likes',
                        'comments' => function ($query) {
                            $query
                                ->with('likes', 'liked')
                                ->withCount('likes', 'liked')
                                ->orderBy('created_at', 'desc');
                        },
                        'reviews' => function ($query) {
                            $query->orderBy('created_at', 'desc');
                        },
                        'reviews.user',
                        'comments.user',
                        'ratings',
                        'cover',
                    ])
                    ->withCount([
                        'likes',
                        'liked',
                        'comments',
                        'reviews',
                        'ratings as ratings_value_count' => function ($query) {
                            $query->select(DB::raw('SUM(value)'));
                        },
                        'rated as rated_value_count' => function ($query) {
                            $query->select(DB::raw('SUM(value)'));
                        }]);
            },
            'books' => function($query){
                $query->with(['user','book_category']);
            },
        ])
            ->loadCount([
                'lesson_plans',
                'lesson_plans_likes_without_auth',
                'lesson_plans_ratings',
                //'lesson_plan_guided_users',
                // 'lesson_plans_comments',
                'books',
                'question_lists'
            ]);
        $res->lesson_plans_likes_count=$res->lesson_plans_likes_without_auth_count;
        $lesson_plans_my_likes_count = Like::where('like_type','=','App\Models\LessonPlan')->where('user_id', $user->id)->count();
        $lesson_plans_my_ratings_count = Rating::where('rating_type','=','App\Models\LessonPlan')->where('user_id', $user->id)->count();
        $lesson_plans_comments_count = Comment::where('comment_type','=','App\Models\LessonPlan')->where('user_id',$user->id)->count();
        $lesson_plans_comments = Comment::where('comment_type','=','App\Models\LessonPlan')->where('user_id',$user->id)->get();
        $res->lesson_plans_my_likes_count = $lesson_plans_my_likes_count;
        $res->lesson_plans_my_ratings_count = $lesson_plans_my_ratings_count;
        $res->lesson_plans_comments_count = $lesson_plans_comments_count;
        $res->lesson_plans_comment = $lesson_plans_comments;

        return response()->json($res);
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
        //return $request->profile;
        //return $request;
        // Validator::make($request->all(), [
        //     'profile.grade_id' => function ($attribute, $value, $fail)use($request){
        //         if($request['profile']['educational_level_id']!=null && $value==null){
        //             $fail('Kelas harus diisi');
        //         }
        //     },
        // ])->validate();
        $user = User::with('profile')->findOrFail($id);
        $oldphoto = $user->avatar;
        $user->fill($request->all());
        $disk = Storage::disk('wasabi');
        if ($request->hasFile('avatar')) {
            $oldfileexists = Storage::disk('wasabi')->exists($oldphoto);
            if ($oldphoto != 'users/default.png' && $oldphoto != '/users/default.png' && $oldfileexists) {
                Storage::disk('wasabi')->delete($oldphoto);
            }
            $path = $request->file('avatar')->store('users', 'wasabi');
            $disk->setVisibility($path, 'public');
            $user->avatar = $path;
        }
        if ($request->has('new_password') && $request->has('old_password')) {
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->new_password);
            } else {
                return abort(403, "password salah");
            }
        }
        $user->update();

        if($request->has('pns')){
            //return $request->pns;
            $pns_status = \App\Models\PnsStatus::firstOrNew(['user_id'=>$request->user()->id]);
            //return $pns_status;
            $pns_status->is_pns = $request->pns['status']['value'];
            if($pns_status->is_pns==1){
                $pns_status->is_certification = $request->pns['certification']['value'];
                $pns_status->is_non_pns_inpassing = null;
            }else{
                $pns_status->is_non_pns_inpassing = $request->pns['non_pns_inpassing']['value'];               
                $pns_status->is_certification = $request->pns['certification']['value'];              

            }
            $request->user()->pns_status()->save($pns_status);

            if($request->user()->pns_status->is_pns===0 && $request->has('bank_account') && $request->bank_account!=null){
                $bankAccount = \App\Models\BankAccount::firstOrNew(['user_id'=>$request->user()->id]);
                $bankAccount->name=$request->bank_account['name'];
                $bankAccount->account_number=$request->bank_account['account_number'];
                $bankAccount->bank_name=$request->bank_account['bank_name'];
                
                $request->user()->bank_account()->save($bankAccount);
            }
        }
        if ($request->has('profile')) {
            //return $request->profile['school_status'];
            $profile = Profile::firstOrNew(['id' => $request->profile['id'] ?? 0]);
            $profile->fill($request->profile);
            $user->profile()->save($profile);
            // generate id kta
            // 1. jika ada id kecamatan yang masuk
            // 2. id user yang mengupdate punya id kecamatan kalau tidak d ganti 0
            // 3. jika kondisi 2 id nya tidak sama dengan yang d update
            // 4. jika user tidak punya profile
            // 5. jika nomor kta nya null
            if (
                isset($request->profile['district_id']) && (($user->profile->district_id ?? 0) != $request->profile['district_id'] || $user->profile == null || $user->kta_id == null)
            ) {

                $district = District::with('profiles')->find($request->profile['district_id']);
                $lastmember = User::whereHas('profile.district', function ($query) use ($request) {
                    $query->where('id', $request->profile['district_id']);
                })
                    ->where('kta_id', '!=', null)
                    ->where('id', '!=', $request->user()->id)
                    ->orderBy('id', 'desc')->first();
                if ($district->profiles->count() == 1) {
                    $user->kta_id = $request->profile['district_id'] . '001';
                } else {
                    $kta_id = $lastmember->kta_id ?? $request->profile['district_id'] . '001';
                    while (User::where('kta_id', $kta_id)->exists()) {
                        $kta_id++;
                    }
                    $user->kta_id = $kta_id;
                }
                $user->update();
            }
        }

        return response()->json($user->load([
            'profile.district',
            'profile.province',
            'profile.city',
            'payments' => function ($query) {
                $query->where('status', 'success');
            },
            'events',
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        Storage::disk('wasabi')->delete($user->avatar);
        $user->delete();
        return response()->json($user);
    }

    public function count()
    {
        $count_user = User::
            where('user_activated_at', '!=', null)
            ->whereIn('role_id',[2,7,9,10,11])
            ->count();
        return response()->json($count_user);
    }

    public function getDetailTotalMember()
    {
        $user = Auth::user()->load('profile');
        $user_provinces = User::whereHas('profile', function ($query) use ($user) {
            $query->where('province_id', $user->profile->province_id);
        })->count();
        $user_cities = User::whereHas('profile', function ($query) use ($user) {
            $query->where('city_id', $user->profile->city_id);
        })->count();
        $user_districts = User::whereHas('profile', function ($query) use ($user) {
            $query->where('district_id', $user->profile->district_id);
        })->count();

        return response()->json([
            'user_provinces' => $user_provinces,
            'user_cities' => $user_cities,
            'user_districts' => $user_districts,
        ]);
    }

    public function setDefaultAvatar($id)
    {
        $user = User::find($id);
        $user->avatar = "users/default.png";
        $user->update();
        return response()->json($user);
    }

    public function getByProvince(Request $request, $provinceId)
    {
        $users = User::with('role','profile')
            ->where('user_activated_at', '!=', null)
            ->whereIn('role_id',[2,7,9,10,11])
            ->whereHas('profile', function ($query) use ($provinceId) {
                $query->where('province_id', $provinceId);
            })->paginate($request->show ?? 10);
        return response()->json($users);
    }

    public function getByCity(Request $request, $cityId)
    {
        $users = User::with('role','profile')
            ->where('user_activated_at', '!=', null)
            ->whereIn('role_id',[2,7,9,10,11])
            ->whereHas('profile', function ($query) use ($cityId) {
                $query->where('city_id', $cityId);
            })->paginate($request->show ?? 10);
        return response()->json($users);
    }

    public function getByDistrict($districtId)
    {
        $users = User::with('role','profile')
            ->where('user_activated_at', '!=', null)
            ->whereIn('role_id',[2,7,9,10,11])
            ->whereHas('profile', function ($query) use ($districtId) {
                $query->where('district_id', $districtId);
            })->get();
        return response()->json($users);
    }

    public function searchbyname($key)
    {
        $users = User::with('profile')
            ->whereIn('role_id',[2,7,9,10,11])
            ->where([
                ['user_activated_at', '!=', null],
                ['name', 'like', '%' . $key . '%'],
            ])->orWhere('email', 'like', '%' . $key . '%')
            ->paginate(10);
        return response()->json($users);
    }

    public function searchByKtaId($key){
        $user = User::with('profile')
            ->where([
                ['user_activated_at', '!=', null],
                ['kta_id','=',$key]
            ])
            ->first();
        return response()->json($user);
    }

    public function membercard($userId)
    {
        $user = User::with('profile')->findOrFail($userId);
        return view('pages.user.membercard', compact('user'));
    }

    public function userslist(Request $request){
        $itemsPerPage = $request->query('itemsPerPage')?$request->query('itemsPerPage'):10;
        //return $itemsPerPage;
       // return $request;
        //$res=DB::table('users')->join('pns_statuses',);

        //filter gender
        $filter_options=$request;
      
        $res=\App\Models\User::with('role','profile','pns_status')->whereHas('profile',function($query)use($filter_options){

            //filter umur
            $begin_date=\Carbon\Carbon::now()->subYears($filter_options->age_range[1])->format('Y-m-d');
            $end_date=\Carbon\Carbon::now()->subYears($filter_options->age_range[0])->format('Y-m-d');

            $query->whereBetween('birthdate',[$begin_date, $end_date]);

            //filter gender
            if($filter_options['gender']=='L' || $filter_options['gender']=='P'){$query->where('gender','=',$filter_options['gender']);
            }

             //filter educational_level
             if($filter_options['educational_level']!='-')$query->where('educational_level_id','=',$filter_options['educational_level']);

             //filter school_status
             if($filter_options['school_status']=='Negeri' || $filter_options['school_status']=='Swasta')$query->where('school_status','=',$filter_options['school_status']);

             //filter province
             if(!in_array(-1,$filter_options['province'])){
                $query->whereIn('province_id',$filter_options['province']);
             }
         
        });
        //filter PNS atau sertifikasi
        if($filter_options['is_pns']!='-' || $filter_options['certified']!='-'){
            $res->whereHas('pns_status', function($query)use($filter_options){
                
                //filter pns
                if($filter_options['is_pns']=='1' || $filter_options['is_pns']=='0')$query->where('is_pns','=',intval($filter_options['is_pns']));

                //filter sertifikasi
                if($filter_options['certified']=='1' || $filter_options['certified']=='0')$query->where('is_certification','=',intval($filter_options['certified']));
            });
        }
        //filter role
        if($filter_options['role']!='-'){
            $res->where('role_id','=',intval($filter_options['role']));
        }
      

        //return $res->paginate(10);
        //filter umur
       
        // $res=\App\Models\User::with('')
        return ['totalUser'=>$res->count(), 'data'=>$res->paginate($itemsPerPage)];
    }

}