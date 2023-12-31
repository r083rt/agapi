<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;

class DpdDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::with('profile')->findOrFail(auth()->user()->id);
        $dpd = Department::where('parent_id', null)
            ->where('departmentable_id', $user->profile->city_id)
            ->where('departmentable_type', 'App\Models\City')
            ->whereHas('division', function ($q) {
                $q->where('title', 'DPD');
            })
            ->withCount('department_users')
            ->with('user', 'division')->get();

        return response()->json([
            'status' => 'success',
            'data' => $dpd
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

        $dpd = Department::findOrFail($request->department_id);
        $dpd->update([
            'user_id' => $request->user_id,
        ]);

        return response()->json($dpd);
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
                $q->where('title', 'DPD');
            })->with('user', 'division')->get();

        return response()->json($children);
    }

    public function getByCity($cityId)
    {
        $dpd = Department::where('parent_id', null)
            ->where('departmentable_id', $cityId)
            ->where('departmentable_type', 'App\Models\City')
            ->whereHas('division', function ($q) {
                $q->where('title', 'DPD');
            })
            ->withCount('department_users')
            ->with('user', 'division')->get();

        return response()->json([
            'status' => 'success',
            'data' => $dpd
        ], 200);
    }
}
