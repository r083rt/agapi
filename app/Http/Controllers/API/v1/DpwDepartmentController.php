<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DpwDepartmentController extends Controller
{
    public function DpwDepartment()
    {
        return Department::with('user.profile')
            ->where('key', 'DPW');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($provinceId)
    {
        //
        $res = $this->DpwDepartment()
            ->where('departmentable_type', 'App\Models\Province')
            ->where('departmentable_id', $provinceId)
            ->orderBy('order', 'asc')
            ->get();
        return response()->json($res);

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
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }

    public function getPeriode($provinceId)
    {
        $res = DB::table('departments')
            ->where('key', 'Dpw')
            ->where('departmentable_type', 'App\Models\Province')
            ->where('departmentable_id', $provinceId)
            ->select(
                DB::raw('year(start_date) as start_year'),
            )
            ->groupBy('start_year')
            ->orderBy('start_year', 'desc')
            ->get();
        return response()->json($res);
    }

    public function getByPeriode($provinceId, $start_year)
    {
        $res = $this->DpwDepartment()
            ->where('departmentable_type', 'App\Models\Province')
            ->where('departmentable_id', $provinceId)
            ->whereYear('start_date', $start_year)
            ->orderBy('order', 'asc')
            ->get();
        return response()->json($res);
    }

    public function getByTitle($provinceId, $title)
    {
        $res = DB::table('users')
            ->join('departments', 'users.id', '=', 'departments.user_id')
            ->where('departments.key', 'DPW')
            ->where('departments.title', $title)
            ->where('departments.departmentable_type', 'App\Models\Province')
            ->where('departments.departmentable_id', $provinceId)
            ->select(
                DB::raw('year(departments.start_date) as start_year'),
                DB::raw('year(departments.end_date) as end_year'),
                DB::raw('users.name as name'),
                DB::raw('users.avatar as avatar')
            )
            ->groupBy('start_year', 'name')
            ->orderBy('start_year', 'desc')
            ->get();
        return response()->json($res);
    }

    public function getDepartmentTreeImage($provinceId)
    {
        $image = File::where('key', 'DPW_DEPARTMENT_TREE')
            ->where('fileable_type', 'App\Models\Province')
            ->where('fileable_id', $provinceId)
            ->first();
        return response()->json($image);
    }
}
