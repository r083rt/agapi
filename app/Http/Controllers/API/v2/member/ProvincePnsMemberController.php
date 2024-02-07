<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;

class ProvincePnsMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $provinces = Province::withCount(['users' => function ($query) {
            $query->whereHas('pns_status', function ($query2) {
                $query2->where('is_pns', '1');
            });
        }])->paginate();
        $total = User::whereHas('pns_status', function ($query) {
            $query->where('is_pns', '1');
        })->count();

        return response()->json(['total'=>$total,'member'=>$provinces]);

        // return response()->json($province);
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

    public function search($keyword)
    {
        $province = Province::where('name', 'like', '%' . $keyword . '%')
            ->withCount(['users' => function ($query) {
                $query->whereHas('pns_status', function ($query2) {
                    $query2->where('is_pns', '1');
                });
            }])
            ->paginate();
        $total = User::whereHas('pns_status', function ($query) {
            $query->where('is_pns', '1');
        })->count();
        return response()->json([
            'total' => $total,
            'member' => $province
        ]);
    }
}
