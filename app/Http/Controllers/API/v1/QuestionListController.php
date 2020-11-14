<?php

namespace App\Http\Controllers\API\v1;

use App\Models\QuestionList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\QuestionList  $questionList
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionList $questionList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuestionList  $questionList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionList $questionList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuestionList  $questionList
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionList $questionList)
    {
        //
    }

    public function buildSearch($assigmentCategoryId,$educationalLevelId){
        $res = QuestionList::with('assigments.grade.educational_level')->whereHas('assigments',function($query)use($assigmentCategoryId,$educationalLevelId){
            if($assigmentCategoryId == 9){
                $query->whereIn('assigment_category_id',[1,7,8]);
            } else {
                $query->where('assigment_category_id',$assigmentCategoryId);
            }

            $query->whereHas('grade',function($query)use($educationalLevelId){
                $query->where('educational_level_id',$educationalLevelId);
            });
        })->paginate();

        return response()->json($res);
    }
}
