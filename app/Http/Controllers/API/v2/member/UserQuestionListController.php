<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assigment;

class UserQuestionListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        //
        $questionList = Assigment::where('is_publish', 0)
            ->where('user_id', $userId)
            ->with('assigment_category', 'grade', 'question_lists', 'user')
            ->withCount('question_lists')
            ->orderBy('id', 'desc')
            ->paginate();
        return response()->json($questionList);
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

    public function search($keyword){
        $questionList = Assigment::where('is_publish', 0)
            ->where('user_id', auth('api')->user()->id)
            ->where('topic', 'like', "%$keyword%")
            ->with('assigment_category', 'grade', 'question_lists', 'user')
            ->orderBy('id', 'desc')
            ->paginate();
        return response()->json($questionList);
    }
}
