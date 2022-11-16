<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;

class DpcDepartmentController extends Controller
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
        $dpc = Department::where('parent_id', null)
            ->where('departmentable_id', $user->profile->district_id)
            ->where('departmentable_type', 'App\Models\District')
            ->whereHas('division', function ($q) {
                $q->where('title', 'DPC');
            })->with('user', 'division')->get();

        return response()->json([
            'status' => 'success',
            'data' => $dpc
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
        //validasi jika user id sudah ada di table department maka tidak bisa di tambahkan lagi
        $request->validate([
            'user_id' => 'required|unique:departments,user_id',
        ]);

        $dpc = Department::findOrFail($request->department_id);
        $dpc->update([
            'user_id' => $request->user_id,
        ]);

        return response()->json($dpc);
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
                $q->where('title', 'DPC');
            })->with('user', 'division')->get();

        return response()->json($children);
    }

    public function getByDistrict($districtId)
    {
        $dpc = Department::where('parent_id', null)
            ->where('departmentable_id', $districtId)
            ->where('departmentable_type', 'App\Models\District')
            ->whereHas('division', function ($q) {
                $q->where('title', 'DPC');
            })->with('user', 'division')->get();

        return response()->json([
            'status' => 'success',
            'data' => $dpc
        ], 200);
    }
}
