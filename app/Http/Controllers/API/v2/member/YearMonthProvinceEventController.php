<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class YearMonthProvinceEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($year, $month, $provinceId)
    {
        //
        $events = DB::table('events')
            ->join('users', 'events.user_id', '=', 'users.id')
            ->join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('profiles.province_id', $provinceId)
            ->whereYear('events.start_at', $year)
        // ->whereMonth('events.start_at', $month)
            ->select(
                'events.id as event_id',
                'events.name as event_name',
                'events.description as event_description',
                'events.start_at as event_start_at',
                'events.end_at as event_end_at',
                'events.address as event_address',
                'users.id as author_id',
                'users.name as author_name',
                'users.email as author_email',
                'users.avatar as author_avatar',
                'users.kta_id as author_kta_id',
            )
            ->orderBy('events.start_at', 'desc')
            ->get();

        return response()->json($events);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }
}
