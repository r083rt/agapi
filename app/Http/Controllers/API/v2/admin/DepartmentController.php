<?php

namespace App\Http\Controllers\API\v2\admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $res = Department::with('children', 'user')
            ->where('parent_id', null)
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
        $request->validate([
            'start_date' => [
                function ($attribute, $value, $fail) use ($request) {
                    if ($value > $request->end_date) {
                        return $fail("Tanggal tidak valid");
                    }
                },
            ],
        ]);

        $department = new Department($request->all());

        $department->save();

        return response()->json($department);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $department = Department::with('department', 'division', 'user')->findOrFail($id);
        return response()->json($department);
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
        $department = Department::findOrFail($request->id);
        $department->update($request->all());

        return response()->json($department);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $department = Department::findOrFail($id);
        $department->delete();

        return response()->json($department);
    }

    public function search($keyword)
    {
        $departments = Department::where('title', 'like', '%' . $keyword . '%')
            ->orWhereDate('start_date', 'like', '%' . $keyword . '%')
            ->paginate();

        return response()->json($departments);
    }
}
