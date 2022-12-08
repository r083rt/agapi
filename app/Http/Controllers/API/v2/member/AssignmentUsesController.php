<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assigment;
use App\Models\AssigmentSession;

class AssignmentUsesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $assignment = Assigment::where('user_id', auth('api')->user()->id)
            ->withCount(['sessions', 'assigment_sessions' => function ($query) {
                $query->where('total_score', null);
            }])
            ->paginate();
        return response()->json($assignment);
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

    public function assignmentnotyetrated($assigmentId)
    {
        $assignments = AssigmentSession::where('assignment_id', $assigmentId)
            ->where('total_score', null)
            ->with('sessions.user')
            ->paginate();
        return response()->json($assignments);
    }
}
