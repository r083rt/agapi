<?php

namespace App\Http\Controllers\API\v2\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserVotableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        //
        // $user = User::findOrFail($userId);
        // return response()->json([
        //     'data' => !!$user->votable,
        //     'status' => 'success',
        //     'message' => !!$user->votable ? 'User is votable' : 'User is not votable',
        // ]);
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
        // $request->validate([
        //     'user_id' => ['required', 'exists:users,id', function ($attribute, $value, $fail) {
        //         $user = User::findOrFail($value);
        //         if ($user->votes()->count() > 0) {
        //             $fail('User is already vote');
        //         }
        //     }],
        // ]);

        // $user = User::with('votable')->has('votable')->findOrFail($request->user_id);
        // $user->votes()->sync([$request->candidate_id => ['votable_id' => $user->votable->id]], false);

        // return response()->json([
        //     'data' => $user->votes,
        //     'status' => 'success',
        //     'message' => 'User vote added',
        // ]);
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
