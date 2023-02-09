<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\City;
use Illuminate\Http\Request;

class ProvinceCityPensionMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($provinceId)
    {
        // ambil city beserta user->profile->birthdate lalu ambil yang umum nya sudah lebih dari 60 tahun where province_id = $provinceId lalu tiap city hitung total users nya tanpa whereHas
        $cities = City::withCount(['users' => function ($query) {
            $query->whereHas('profile', function ($query) {
                $query->where('birthdate', '<=', now()->subYears(60));
            })->where('user_activated_at', '!=', 'null');
        }])
            ->where('province_id', $provinceId)
            ->paginate();
        return response()->json($cities);
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

    public function search($provinceId, $keyword)
    {
        $cities = City::withCount(['users' => function ($query) {
            $query->whereHas('profile', function ($query) {
                $query->where('birthdate', '<=', now()->subYears(60));
            })->where('user_activated_at', '!=', 'null');
        }])
            ->where('province_id', $provinceId)
            ->where('name', 'like', '%' . $keyword . '%')
            ->paginate();
        return response()->json($cities);
    }
}
