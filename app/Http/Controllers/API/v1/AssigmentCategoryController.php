<?php

namespace App\Http\Controllers\API\v1;

use App\Models\AssigmentCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssigmentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $res = AssigmentCategory::with('assigment_types')->orderBy('order','asc')->get();
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
     * @param  \App\Models\AssigmentCategory  $assigmentCategory
     * @return \Illuminate\Http\Response
     */
    public function show(AssigmentCategory $assigmentCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssigmentCategory  $assigmentCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssigmentCategory $assigmentCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssigmentCategory  $assigmentCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssigmentCategory $assigmentCategory)
    {
        //
    }
}
