<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Votable;
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
        $user = User::findOrFail($userId);
        return response()->json([
            'data' => !!$user->votable,
            'status' => 'success',
            'message' => !!$user->votable ? 'User is votable' : 'User is not votable',
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $userId)
    {
        //
        $user = User::findOrFail($userId);
        if ($user->votable) {
            return response()->json([
                'data' => $user->votable,
                'status' => 'error',
                'message' => 'User is already votable',
            ], 422);
        }
        $user->votable()->save(new Votable());
        return response()->json([
            'data' => $user->votable,
            'status' => 'success',
            'message' => 'User votable added',
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
