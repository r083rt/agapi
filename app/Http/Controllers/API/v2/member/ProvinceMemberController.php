<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\User;
use App\Models\Payment;

class ProvinceMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $provinces = Province::withCount(['users' => function($query){
            $query->where('user_activated_at', '!=', null)
            ->whereIn('role_id', [2, 7, 9, 10, 11]);
        }])->paginate();

        // $total = User::where('user_activated_at', '!=', null)
        //     ->whereIn('role_id', [2, 7, 9, 10, 11])
        //     ->count();
        $total = Payment::where('value',35000)->where('status','success')->count();
        return response()->json([
            'total' => $total,
            'member' => $provinces
        ]);
        
        // return response()->json(['provinces'=>$provinces]);
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

    public function search($keyword){
        $provinces = Province::where('name', 'like', '%'.$keyword.'%')
       ->withCount(['users' => function($query){
            $query->where('user_activated_at', '!=', null)
            ->whereIn('role_id', [2, 7, 9, 10, 11]);
        }])->paginate();
        return response()->json($provinces);
    }
}
