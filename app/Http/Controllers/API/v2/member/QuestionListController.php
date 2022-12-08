<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuestionList;
use App\Models\AssigmentQuestionList;
use App\Models\Assigment;

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
        $questionlists = Assigment::where('is_publish', 0)
            ->whereNotNull('user_id')
            ->with('assigment_category', 'grade', 'question_lists.images', 'user', 'question_lists.assigment_types', 'question_lists.answer_lists')
            ->orderBy('id', 'desc')
            ->paginate();
        return response()->json($questionlists);
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

    public function search($keyword)
    {
        $questionlists = Assigment::where('is_publish', 0)
            ->whereNotNull('user_id')
            ->with('assigment_category', 'grade', 'question_lists.images', 'user', 'question_lists.assigment_types', 'question_lists.answer_lists')
            ->where(function ($query) use ($keyword) {
                $query->where('topic', 'like', "%$keyword%")
                    ->orWhereHas('assigment_category', function ($query) use ($keyword) {
                        $query->where('name', 'like', "%$keyword%");
                    })
                    ->orWhereHas('user', function ($query) use ($keyword) {
                        $query->where('name', 'like', "%$keyword%");
                    });
            })
            ->orderBy('id', 'desc')
            ->paginate();
        return response()->json($questionlists);
    }

    public function filterbygrade($gradeId)
    {
        $questionlists = Assigment::where('is_publish', 0)
            ->whereNotNull('user_id')
            ->with('assigment_category', 'grade', 'question_lists.images', 'user', 'question_lists.assigment_types', 'question_lists.answer_lists')
            ->whereHas('grade', function ($query) use ($gradeId) {
                $query->where('id', $gradeId);
            })
            ->orderBy('id', 'desc')
            ->paginate();

        return response()->json($questionlists);
    }
}
