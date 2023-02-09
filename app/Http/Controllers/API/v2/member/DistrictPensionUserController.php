<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictPensionUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cityId)
    {
        //
        $districts = District::withCount(['users' => function ($query) {
            $query->whereHas('profile', function ($query) {
                $query->where('birthdate', '<=', now()->subYears(60));
            });
        }])
            ->where('city_id', $cityId)
            ->paginate();
        return response()->json($districts);
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

    public function search($cityId, $keyword)
    {
        $districts = District::withCount(['users' => function ($query) {
            $query->whereHas('profile', function ($query) {
                $query->where('birthdate', '<=', now()->subYears(60));
            });
        }])
            ->where('city_id', $cityId)
            ->where('name', 'like', '%' . $keyword . '%')
            ->paginate();
    }
}
