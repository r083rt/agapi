<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\PnsStatus;
use Illuminate\Http\Request;

class UserPnsStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        //
        $pns_status = PnsStatus::where('user_id', $userId);

        if ($pns_status->exists()) {
            $newData = new PnsStatus();
            $newData->user_id = $userId;
            // $newData->is_pns = 0;
            $newData->save();
            $pns_status = $pns_status->first();
        } else {
            $pns_status = $pns_status->first();
        }
        return response()->json($pns_status);
        // return PnsStatus::where('user_id', $userId)->firstOrFail();
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
    public function update(Request $request, $userId)
    {
        //
        // return response()->json($request->is_pns == false);
        $pns_status = PnsStatus::where('user_id', $userId)->first();
        $pns_status->is_pns = $request->is_pns;
        $pns_status->save();

        return response()->json($pns_status);
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
