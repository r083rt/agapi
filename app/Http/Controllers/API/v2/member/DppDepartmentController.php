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
        $dpp = Department::where('parent_id', null)
            ->whereHas('division', function ($q) {
                $q->where('title', 'DPP');
            })
            ->with('user', 'division')
            ->withCount('children')
            ->get();

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
    public function update(Request $request)
    {
        //
        $request->validate([
            'user_id' => 'required|unique:departments,user_id',
        ]);

        $dpp = Department::findOrFail($request->department_id);
        $dpp->user_id = $request->user_id;
        $dpp->save();

        return response()->json($dpp);
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

    public function childrens($parentId)
    {
        $children = Department::where('parent_id', $parentId)
            ->whereHas('division', function ($q) {
                $q->where('title', 'DPP');
            })->with('user', 'division')->get();

        return response()->json($children);
    }
}
