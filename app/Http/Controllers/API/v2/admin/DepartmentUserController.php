<?php

namespace App\Http\Controllers\API\v2\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DepartmentUser;

class DepartmentUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $departmentUser = DepartmentUser::with('department', 'user')->orderBy('id', 'desc');

        if ($request->filter) {
            $departmentUser->where('title', 'like', '%' . $request->filter . '%');
        }

        $departmentUser = $departmentUser->paginate();

        return response()->json($departmentUser);
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
        $department_user = new DepartmentUser($request->all());
        $department_user->save();

        return response()->json($department_user);
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
