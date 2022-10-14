<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\Member\PushToken;
use App\Models\Member\User;
use Illuminate\Http\Request;

class UserPushTokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($userId, Request $request)
    {
        //
        $request->validate([
            "token" => "required",
        ]);

        $user = User::findOrFail($userId);
        $push_token = PushToken::firstOrNew([
            "token" => $request->token,
        ]);
        $push_token->fill($request->all());
        $push_token->type = "expo";
        $push_token->last_used_at = now();
        $push_token->save();

        $push_token->users()->sync($user->id);

        return response()->json([
            "message" => "Push token berhasil disimpan",
            "data" => $push_token,
        ]);
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
