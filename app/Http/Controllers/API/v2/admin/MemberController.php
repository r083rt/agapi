<?php

namespace App\Http\Controllers\API\v2\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $member;

    public function __construct()
    {
        $this->member = User::whereHas('role', function ($query) {
            $query->whereIn('id', [2, 7, 9, 10, 11]);
        });

    }

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
        $res = User::where('name', 'like', '%' . $keyword . '%')
            ->orWhere('kta_id', 'like', '%' . $keyword . '%')
            ->orWhere('email', 'like', '%' . $keyword . '%')->paginate();
        return response()->json($res);
    }

}
