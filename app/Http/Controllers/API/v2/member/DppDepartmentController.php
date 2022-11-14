<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\DB;

class DppDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dpp = DB::table('departments')
            ->join('department_divisions', 'departments.division_id', '=', 'department_divisions.id')
            ->join('users', 'departments.user_id', '=', 'users.id')
            ->where('department_divisions.title', 'DPP')
            ->where('departments.parent_id', null)
            ->select(
                DB::raw('departments.id as id'),
                DB::raw('departments.title as title'),
                DB::raw('users.name as user_name'),
                DB::raw('users.avatar as user_avatar'),

            )->get();

        return response()->json([
            'status' => 'success',
            'data' => $dpp
        ], 200);
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
}
