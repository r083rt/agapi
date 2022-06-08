<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DppDepartmentController extends Controller
{
    public function DppDepartment()
    {
        return Department::with('user.profile')
            ->where('key', 'DPP');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $res = $this->DppDepartment()
            ->orderBy('order', 'asc')
            ->whereYear('start_at', date('Y'))
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

    // untuk mengambil data tahun periode berdasarkan data yang ada di database

    public function getPeriode()
    {
        $res = DB::table('departments')
            ->where('key', 'DPP')
            ->select(
                DB::raw('year(start_date) as start_year'),
            )
            ->groupBy('start_year')
            ->orderBy('start_year', 'desc')
            ->get();
        return response()->json($res);
    }

    // mengambil data semua jabatan dpp berdasarkan tahun periode yang dipilih
    public function getByPeriode($start_year)
    {
        $res = $this->DppDepartment()
            ->whereYear('start_date', $start_year)
            ->orderBy('order', 'asc')
            ->get();
        return response()->json($res);
    }

    // mengambil data jabatan tertentu ex. ketua umum semua tahun periode
    public function getByTitle($title)
    {
        $res = DB::table('users')
            ->join('departments', 'users.id', '=', 'departments.user_id')
            ->where('departments.key', 'DPP')
            ->where('departments.title', $title)
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

    public function getDepartmentTreeImage()
    {
        $image = File::where('key', 'DPP_DEPARTMENT_TREE')->first();
        return response()->json($image);
    }
}
