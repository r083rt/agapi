<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssigmentSession;

class AssignmentSessionController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $assigment_session = AssigmentSession::with(
            'assigment.question_lists.answer_lists',
            'assigment.question_lists.assigment_question_list.assigment_type',
            'session.user',
            'session.questions.answer'
        )->findOrfail($id);

        return response()->json($assigment_session);
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
        $assignment_session = AssigmentSession::findOrfail($request->id);
        $assignment_session->update($request->all());

        return response()->json($assignment_session);
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

    public function getsessionbyassignment($assignmentId)
    {
        $assignment_sessions = AssigmentSession::where('assigment_id', $assignmentId)
            ->with('session.user')
            ->paginate();

        return response()->json($assignment_sessions);
    }
}
