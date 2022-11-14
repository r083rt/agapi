<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function getUserAccount(Request $request)
    {
        $user = $request->user();
        return response()->json(
            $user->load(
                    'profile.province',
                    'role',
                    'profile.city',
                    'profile.district',
                    'banner'
                )
                ->loadCount(
                    'posts',
                    'events',
                    'book'
                )
        );
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
        $profile = new Profile();
        if ($request->has('profile')) {
            $profile->fill($request->profile);
        }
        $user->profile()->save($profile);
        $success['access_token'] = $user->createToken('AGPAII DIGITAL')->accessToken;
        $success['token_type'] = 'Bearer';
        return response()->json($success);
    }
}
