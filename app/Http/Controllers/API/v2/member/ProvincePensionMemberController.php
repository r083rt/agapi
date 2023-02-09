<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvincePensionMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ambil province beserta user->profile->birthdate lalu ambil yang umum nya sudah lebih dari 60 tahun lalu tiap province hitung total users nya
        $provinces = Province::withCount(['users' => function ($query) {
            $query->whereHas('profile', function ($query) {
                $query->where('birthdate', '<=', now()->subYears(60));
            });
        }])
            ->paginate();
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

    public function search($keyword)
    {
        $provinces = Province::withCount(['users' => function ($query) {
            $query->whereHas('profile', function ($query) {
                $query->where('birthdate', '<=', now()->subYears(60));
            });
        }])
            ->where('name', 'like', '%' . $keyword . '%')
            ->paginate();
        return response()->json($provinces);
    }
}
