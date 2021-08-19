<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Ad;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    raw sql: iklan tertarget.sql
    */
    public function index()
    {

        $user = auth()->user();

        $agesAggregates = DB::table('ad_targets')->selectRaw(' count(*) as ages_count,
        min(value) as min_age,
        max(value) as max_age, ad_id,id')
        ->where('type','age')
        ->groupBy('ad_id');
        
        $districtsAggregate = DB::table('ad_targets')->selectRaw('count(*) as districts_count,ad_id,id')
        ->where('type','district')
        ->groupBy('ad_id');

        $gendersAggregate = DB::table('ad_targets')->selectRaw('count(*) as genders_count,ad_id,id')
        ->where('type','gender')
        ->groupBy('ad_id');

        $data = DB::table('ads')->selectRaw('ads.*,
        ages_aggregate.ages_count,districts_aggregate.districts_count,genders_aggregate.genders_count')
        ->leftJoinSub($agesAggregates,'ages_aggregate', function($join){
            $join->on('ages_aggregate.ad_id','=','ads.id');
        })
        ->leftJoinSub($districtsAggregate,'districts_aggregate', function($join){
            $join->on('districts_aggregate.ad_id','=','ads.id');
        })
        ->leftJoinSub($gendersAggregate,'genders_aggregate', function($join){
            $join->on('genders_aggregate.ad_id','=','ads.id');
        });
        
        if($user->profile->birthdate){
            // jika records data ages ada 2, maka lakukan pengecekan
            $data->whereRaw("IF(ages_aggregate.ages_count = 2, (
                SELECT ? BETWEEN ages_aggregate.min_age AND ages_aggregate.max_age
            ) , TRUE)", $user->age());
        }
        
        if($user->profile->district_id){
            // jika records data districts lebih dari 0, maka lakukan pengecekan 
             $data->whereRaw("IF(districts_aggregate.districts_count > 0, (
                SELECT ? IN (SELECT value FROM ad_targets WHERE ad_id=ads.id AND type='district')
            ) , TRUE)", $user->profile->district_id);
        }
        
        if($user->profile->gender){
            // jika records data genders lebih dari 0, maka lakukan pengecekan 
            $data->whereRaw("IF(genders_aggregate.genders_count > 0 , (
                select ? in (select value from ad_targets where ad_id=ads.id and type='gender')
            ) , TRUE)", $user->profile->gender);
        }
        


        return $data->get();
        // $ads = Ad::with('ad_targets');
        
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
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        //
    }

    public function getactive()
    {
        $res = Ad::with(['post' => function ($query) {
            $query->with([
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
            ])->withCount('comments', 'likes', 'liked');
        }])->where('is_active', true)->get();
        return response()->json($res);
    }
}
