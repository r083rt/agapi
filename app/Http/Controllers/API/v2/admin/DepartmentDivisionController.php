<?php

namespace App\Http\Controllers\API\v2\admin;

use App\Http\Controllers\Controller;
use App\Models\DepartmentDivision;
use Illuminate\Http\Request;

class DepartmentDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $res = DepartmentDivision::get();
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
        $request->validate([
            'start_at' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    if ($value > $request->end_at) {
                        return $fail("Tanggal tidak valid");
                    }
                },
            ],
        ]);

        $departmentDivision = new DepartmentDivision($request->all());
        $departmentDivision->save();

        return response()->json($departmentDivision);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DepartmentDivision  $departmentDivision
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $departmentDivision = DepartmentDivision::findOrFail($id);

        return response()->json($departmentDivision);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DepartmentDivision  $departmentDivision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DepartmentDivision $departmentDivision)
    {
        //
        $departmentDivision = DepartmentDivision::findOrFail($request->id);
        $departmentDivision->update($request->all());

        return response()->json($departmentDivision);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DepartmentDivision  $departmentDivision
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $departmentDivision = DepartmentDivision::findOrFail($id);
        $departmentDivision->delete();

        return response()->json($departmentDivision);
    }
}
