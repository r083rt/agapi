<?php

namespace App\Http\Controllers\API\v1;

use App\Helper\Firestore;
use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\User;
use Illuminate\Http\Request;

class UserVoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        //
        $user = User::withCount('votes')->findOrFail($userId);
        return response()->json([
            'status' => true,
            'message' => $user->votes_count ? "Anggota sudah melakukan vote" : "Anggota belum melakukan vote",
            'data' => $user->votes_count,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $userId)
    {

        //
        $request->validate([
            'candidate_id' => [
                'required',
                function ($attribute, $value, $fail) use ($userId) {
                    $user = User::findOrFail($userId);
                    if ($user->votes()->count() > 0) {
                        $fail('User is already vote');
                    }
                },
            ],
        ]);

        $user = User::with('votable')->has('votable')->findOrFail($userId);
        // return response()->json($user);
        $user->votes()->sync([$request->candidate_id => ['votable_id' => $user->votable->id]]);

        // -- update firestore candidates related votes
        $candidates = Candidate::withCount('votes')->with(['votes', 'user.profile'])->get();
        $dbFirestore = new Firestore();
        foreach ($candidates as $index => $candidate) {
            # code...
            $dbFirestore->getDb()->collection('candidates')->document(strval($candidate->id))->set($candidate->toArray());
        }
        // --------------------------------------------

        return response()->json([
            'data' => $user->votes,
            'status' => 'success',
            'message' => 'User vote added',
        ]);

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
