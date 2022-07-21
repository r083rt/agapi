<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\District;
use App\Models\File;
use App\Models\Like;
use App\Models\Profile;
use App\Models\Rating;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = User::with('profile', 'role')
            ->where('user_activated_at', '!=', null)
            ->whereIn('role_id', [2, 7, 9, 10, 11])
            ->paginate();

        return response()->json($res);
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
    public function changePassword(Request $request)
    {

        $user = User::findOrFail(auth('api')->user()->id);
        if (Hash::check($request->old_password, $user->password)) {
            if (strcmp($request->new_password, $request->confirm_password) == 0) {
                $user->password = bcrypt($request->new_password);
                $user->save();
                return response()->json(['sukses' => 'Berhasil merubah password']);
            } else {
                return response()->json(['error' => 'Konfirmasi password baru salah']);
            }
        } else {
            return response()->json(['error' => 'Password lama salah']);
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
            'posts.meeting_rooms',
            'posts.events',
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
            'lesson_plans.template',
            //'lesson_plan_guided_users',
            'follows.lesson_plans' => function ($query) {
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
                    ->orderBy('created_at', 'desc')
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
            'books' => function ($query) {
                $query->with(['user', 'book_category']);
            },
            'appreciations',
        ])
            ->loadCount([
                'lesson_plans',
                'lesson_plans_likes_without_auth',
                'lesson_plans_ratings',
                //'lesson_plan_guided_users',
                // 'lesson_plans_comments',
                'books',
                'question_lists',
            ]);
        $res->lesson_plans_likes_count = $res->lesson_plans_likes_without_auth_count;
        $lesson_plans_my_likes_count = Like::where('like_type', '=', 'App\Models\LessonPlan')->where('user_id', $user->id)->count();
        $lesson_plans_my_ratings_count = Rating::where('rating_type', '=', 'App\Models\LessonPlan')->where('user_id', $user->id)->count();
        $lesson_plans_comments_count = Comment::where('comment_type', '=', 'App\Models\LessonPlan')->where('user_id', $user->id)->count();
        $lesson_plans_comments = Comment::where('comment_type', '=', 'App\Models\LessonPlan')->where('user_id', $user->id)->get();
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

        if ($request->has('pns')) {
            //return $request->pns;
            $pns_status = \App\Models\PnsStatus::firstOrNew(['user_id' => $request->user()->id]);
            //return $pns_status;
            $pns_status->is_pns = $request->pns['status']['value'];
            if ($pns_status->is_pns == 1) {
                $pns_status->is_certification = $request->pns['certification']['value'];
                $pns_status->is_non_pns_inpassing = null;
            } else {
                $pns_status->is_non_pns_inpassing = $request->pns['non_pns_inpassing']['value'];
                $pns_status->is_certification = $request->pns['certification']['value'];

            }
            $request->user()->pns_status()->save($pns_status);

            if ($request->user()->pns_status->is_pns === 0 && $request->has('bank_account') && $request->bank_account != null) {
                $bankAccount = \App\Models\BankAccount::firstOrNew(['user_id' => $request->user()->id]);
                $bankAccount->name = $request->bank_account['name'];
                $bankAccount->account_number = $request->bank_account['account_number'];
                $bankAccount->bank_name = $request->bank_account['bank_name'];

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
            ->whereIn('role_id', [2, 7, 9, 10, 11])
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

    public function getByProvince($provinceId)
    {
        $users = User::with('role', 'profile')
            ->where('user_activated_at', '!=', null)
            ->whereIn('role_id', [2, 7, 9, 10, 11])
            ->whereHas('profile', function ($query) use ($provinceId) {
                $query->where('province_id', $provinceId);
            })->paginate();
        return response()->json($users);
    }

    public function searchByProvince($provinceId, $key)
    {
        $users = User::with('role', 'profile')
            ->where('user_activated_at', '!=', null)
            ->whereIn('role_id', [2, 7, 9, 10, 11])
            ->whereHas('profile', function ($query) use ($provinceId) {
                $query->where('province_id', $provinceId);
            })
            ->where('name', 'like', '%' . $key . '%')
            ->paginate();
        return response()->json($users);
    }

    public function getByProvinceCount($provinceId)
    {
        $users = User::with('role', 'profile')
            ->where('user_activated_at', '!=', null)
            ->whereIn('role_id', [2, 7, 9, 10, 11])
            ->whereHas('profile', function ($query) use ($provinceId) {
                $query->where('province_id', $provinceId);
            })->count();
        return response()->json($users);
    }

    public function getByCity($cityId)
    {
        $res = User::with('role', 'profile')
            ->where('user_activated_at', '!=', null)
            ->whereIn('role_id', [2, 7, 9, 10, 11])
            ->whereHas('profile', function ($query) use ($cityId) {
                $query->where('city_id', $cityId);
            })->paginate();
        return response()->json($res);
    }

    public function searchByCity($cityId, $key)
    {
        $res = User::with('role', 'profile')
            ->where('user_activated_at', '!=', null)
            ->whereIn('role_id', [2, 7, 9, 10, 11])
            ->whereHas('profile', function ($query) use ($cityId) {
                $query->where('city_id', $cityId);
            })
            ->where('name', 'like', '%' . $key . '%')
            ->paginate();
        return response()->json($res);
    }

    public function getByCityCount($cityId)
    {
        $res = User::with('role', 'profile')
            ->where('user_activated_at', '!=', null)
            ->whereIn('role_id', [2, 7, 9, 10, 11])
            ->whereHas('profile', function ($query) use ($cityId) {
                $query->where('city_id', $cityId);
            })->count();
        return response()->json($res);
    }

    public function getByDistrict($districtId)
    {
        $res = User::with('role', 'profile')
            ->where('user_activated_at', '!=', null)
            ->whereIn('role_id', [2, 7, 9, 10, 11])
            ->whereHas('profile', function ($query) use ($districtId) {
                $query->where('district_id', $districtId);
            })->get();
        return response()->json($res);
    }

    public function searchByDistrict($districtId, $key)
    {
        $res = User::with('role', 'profile')
            ->where('user_activated_at', '!=', null)
            ->whereIn('role_id', [2, 7, 9, 10, 11])
            ->whereHas('profile', function ($query) use ($districtId) {
                $query->where('district_id', $districtId);
            })
            ->where('name', 'like', '%' . $key . '%')
            ->get();
        return response()->json($res);
    }

    public function getByDistrictCount($districtId)
    {
        $res = User::with('role', 'profile')
            ->where('user_activated_at', '!=', null)
            ->whereIn('role_id', [2, 7, 9, 10, 11])
            ->whereHas('profile', function ($query) use ($districtId) {
                $query->where('district_id', $districtId);
            })->count();
        return response()->json($res);
    }

    public function searchbyname($key)
    {
        $users = User::with('profile')
            ->whereIn('role_id', [2, 7, 9, 10, 11])
            ->where([
                ['user_activated_at', '!=', null],
                ['name', 'like', '%' . $key . '%'],
            ])->orWhere('email', 'like', '%' . $key . '%')
            ->paginate(10);
        return response()->json($users);
    }

    public function searchByKtaId($key)
    {
        $user = User::with('profile')
            ->where([
                ['user_activated_at', '!=', null],
                ['kta_id', '=', $key],
            ])
            ->first();
        return response()->json($user);
    }

    public function searchByEmail($key)
    {
        $user = User::with('profile')
            ->where([
                ['user_activated_at', '!=', null],
                ['email', '=', $key],
            ])
            ->firstOrFail();
        $user->late_paid = Carbon::parse(Carbon::now())->diffInMonths(Carbon::parse($user->user_activated_at));
        return response()->json($user);
    }

    public function membercard($userId)
    {
        $user = User::with('profile')->findOrFail($userId);
        return view('pages.user.membercard', compact('user'));
    }

    public function userslist(Request $request)
    {
        $itemsPerPage = $request->query('itemsPerPage') ? $request->query('itemsPerPage') : 10;
        //return $itemsPerPage;
        // return $request;
        //$res=DB::table('users')->join('pns_statuses',);

        //filter gender
        $filter_options = $request;

        $res = \App\Models\User::with('role', 'profile', 'pns_status')->whereHas('profile', function ($query) use ($filter_options) {

            //filter umur
            $begin_date = \Carbon\Carbon::now()->subYears($filter_options->age_range[1])->format('Y-m-d');
            $end_date = \Carbon\Carbon::now()->subYears($filter_options->age_range[0])->format('Y-m-d');

            $query->whereBetween('birthdate', [$begin_date, $end_date]);

            //filter gender
            if ($filter_options['gender'] == 'L' || $filter_options['gender'] == 'P') {$query->where('gender', '=', $filter_options['gender']);
            }

            //filter educational_level
            if ($filter_options['educational_level'] != '-') {
                $query->where('educational_level_id', '=', $filter_options['educational_level']);
            }

            //filter school_status
            if ($filter_options['school_status'] == 'Negeri' || $filter_options['school_status'] == 'Swasta') {
                $query->where('school_status', '=', $filter_options['school_status']);
            }

            //filter province
            if (!in_array(-1, $filter_options['province'])) {
                $query->whereIn('province_id', $filter_options['province']);
            }

        });
        //filter PNS atau sertifikasi
        if ($filter_options['is_pns'] != '-' || $filter_options['certified'] != '-') {
            $res->whereHas('pns_status', function ($query) use ($filter_options) {

                //filter pns
                if ($filter_options['is_pns'] == '1' || $filter_options['is_pns'] == '0') {
                    $query->where('is_pns', '=', intval($filter_options['is_pns']));
                }

                //filter sertifikasi
                if ($filter_options['certified'] == '1' || $filter_options['certified'] == '0') {
                    $query->where('is_certification', '=', intval($filter_options['certified']));
                }

            });
        }
        //filter role
        if ($filter_options['role'] != '-') {
            $res->where('role_id', '=', intval($filter_options['role']));
        }

        //return $res->paginate(10);
        //filter umur

        // $res=\App\Models\User::with('')
        return ['totalUser' => $res->count(), 'data' => $res->paginate($itemsPerPage)];
    }

    public function profit()
    {
        $user = auth()->user();
        $necessaries = DB::table('necessaries')->get();
        $necessaries_key_based = [];
        foreach ($necessaries as $necessary) {
            $necessaries_key_based[$necessary->name] = $necessary;
        }
        $necessary_ids = [
            $necessaries_key_based['bagi_guru_butir_soal']->id,
            $necessaries_key_based['bagi_guru_paket_soal']->id,
            $necessaries_key_based['beli_soal']->id,
        ];
        $payments_in = $user->payments()->where('status', 'success')->where('type', 'IN')->whereIn('necessary_id', $necessary_ids);
        return $payments_in->sum('value');
    }

    public function getPnsCount()
    {
        $res = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 1);
        })
            ->count();
        return response()->json($res);
    }

    public function getPnsUsers()
    {
        $res = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 1);
        })
            ->paginate();
        return response()->json($res);
    }

    public function getNonPnsCount()
    {
        $res = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 0);
        })
            ->count();
        return response()->json($res);
    }

    public function getNonPnsUsers()
    {
        $res = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 0);
        })
            ->paginate();
        return response()->json($res);
    }

    public function searchPnsUsers($key)
    {
        $search = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 1);
        })
            ->where('name', 'like', '%' . $key . '%')
            ->paginate();

        return response()->json($search);
    }

    public function searchNonPnsUsers($key)
    {
        $search = User::
            whereHas('pns_status', function ($query) {
            $query->where('is_pns', 0);
        })
            ->where('name', 'like', '%' . $key . '%')
            ->paginate();

        return response()->json($search);
    }

    public function getExpiredMembersCount()
    {
        // menghitung jumlah member yang sudah expired, tanggal expired adalah user_activated_at + 6 bulan
        $res = User::
            where('user_activated_at', '!=', null)
            ->whereDate('user_activated_at', '<', \Carbon\Carbon::now()->subMonths(6)->format('Y-m-d'))
            ->whereIn('role_id', [2, 7, 9, 10, 11])
            ->count();
        return response()->json($res);
    }

    public function getExpiredMembers()
    {
        $res = User::where('user_activated_at', '!=', null)
            ->where('user_activated_at', '<', (new \Carbon\Carbon)->submonths(6))
            ->paginate();
        return response()->json($res);
    }

    public function searchExpiredMembers($key)
    {
        $search = User::where('user_activated_at', '!=', null)
            ->where('user_activated_at', '<', (new \Carbon\Carbon)->submonth(6))
            ->where('name', 'like', '%' . $key . '%')
            ->paginate();
        return response()->json($search);
    }

    public function getActiveUsers()
    {
        $res = User::where('user_activated_at', '!=', null)
            ->whereIn('role_id', [2, 7, 9, 10, 11])
            ->count();
        return response()->json($res);
    }

    public function getMemberGrown()
    {
        $res = DB::table('users')
            ->where('user_activated_at', '!=', null)
            ->where('created_at', '!=', null)
            ->select(
                DB::raw('count(*) as total'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTHNAME(created_at) as month')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->get();
        return response()->json($res);
    }

    public function getMemberGrownYears()
    {
        $res = DB::table('users')
            ->where('user_activated_at', '!=', null)
            ->where('created_at', '!=', null)
            ->select(
                DB::raw('YEAR(created_at) as year'),
            )
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();
        return response()->json($res);

    }

    public function getMemberGrownByYear($year)
    {
        $res = DB::table('users')
            ->where('user_activated_at', '!=', null)
            ->where('created_at', '!=', null)
            ->whereYear('created_at', $year)
            ->select(
                DB::raw('count(*) as total'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTHNAME(created_at) as month')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->get();
        return response()->json($res);
    }

    // mengambil data member yang melakukan perpanjangan tiap bulan dan tahun nya
    public function getExtendedMember()
    {
        // ini versi code mysql nya untuk di test di phpmyadmin
        // $res = DB::select("select count(distinct users.id,DATE_FORMAT(payments.created_at,'%Y-%m')) as total, YEAR(payments.created_at) as year, MONTHNAME(payments.created_at) as month from `users` inner join `payments` on `users`.`id` = `payments`.`payment_id` where `user_activated_at` is not null and `payments`.`payment_type` = 'App\\\Models\\\User' group by `year`, `month` order by `year` asc");
        $res = DB::table('users')
            ->where('user_activated_at', '!=', null)
            ->join('payments', 'users.id', '=', 'payments.payment_id')
            ->where('payments.payment_type', '=', 'App\Models\User')
            ->select(
                DB::raw("count(distinct users.id,DATE_FORMAT(payments.created_at,'%Y-%m')) as total"),
                DB::raw('YEAR(payments.created_at) as year'),
                DB::raw('MONTHNAME(payments.created_at) as month')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->get();
        return response()->json($res);
    }

    public function getExtendedMemberByYear($year)
    {
        // ini versi code mysql nya untuk di test di phpmyadmin
        // $res = DB::select("select count(distinct users.id,DATE_FORMAT(payments.created_at,'%Y-%m')) as total, YEAR(payments.created_at) as year, MONTHNAME(payments.created_at) as month from `users` inner join `payments` on `users`.`id` = `payments`.`payment_id` where `user_activated_at` is not null and `payments`.`payment_type` = 'App\\\Models\\\User' group by `year`, `month` order by `year` asc");
        $res = DB::table('users')
            ->where('user_activated_at', '!=', null)
            ->join('payments', 'users.id', '=', 'payments.payment_id')
            ->where('payments.payment_type', '=', 'App\Models\User')
            ->whereYear('users.created_at', $year)
            ->select(
                DB::raw("count(distinct users.id,DATE_FORMAT(payments.created_at,'%Y-%m')) as total"),
                DB::raw('YEAR(payments.created_at) as year'),
                DB::raw('MONTHNAME(payments.created_at) as month')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->get();
        return response()->json($res);
    }

    public function getPnsMember()
    {
        $res = User::whereHas('pns_status', function ($query) {
            $query->where('is_pns', 1);
        })
            ->select(
                DB::raw('count(*) as total'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTHNAME(created_at) as month')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->get();
        return response()->json($res);
    }

    public function getPnsMemberByYear($year)
    {
        $res = User::whereHas('pns_status', function ($query) {
            $query->where('is_pns', 1);
        })
            ->whereYear('created_at', '=', $year)
            ->select(
                DB::raw('count(*) as total'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTHNAME(created_at) as month')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->get();
        return response()->json($res);
    }

    public function getNonPnsMember()
    {
        $res = User::whereHas('pns_status', function ($query) {
            $query->where('is_pns', 0);
        })
            ->select(
                DB::raw('count(*) as total'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTHNAME(created_at) as month')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->get();
        return response()->json($res);
    }

    public function getNonPnsMemberByYear($year)
    {
        $res = User::whereYear('created_at', '=', $year)
            ->whereHas('pns_status', function ($query) use ($year) {
                $query->where('is_pns', 0)->whereYear('created_at', '=', $year);
            })
            ->select(
                DB::raw('count(*) as total'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTHNAME(created_at) as month')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->get();
        return response()->json($res);
    }

    public function expiredStatus($userId)
    {
        $user = User::findOrFail($userId);
        $expired_at = $user->expired_at;
        $now = Carbon::now();
        // expired jika sudah $now melewati tanggal $expired_at
        $isExpired = $now->gt($expired_at);
        return response()->json([
            'status' => $isExpired,
            'message' => $isExpired ? 'user expired' : 'user not expired',
            'data' => [
                'isExpired' => $isExpired,
                'expired_at' => $expired_at,
                'now' => $now,
            ],
        ]);
    }

}
