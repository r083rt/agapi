<?php

namespace App\Http\Controllers\API\v2\admin;

use App\Http\Controllers\Controller;
use App\Models\Votable;
use Illuminate\Http\Request;

class VotableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $votables = Votable::with('user')->get();
        return response()->json($votables);
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
            'user_id' => [
                'required',
                function ($attribute, $value, $fail) {
                    $exists = Votable::where('user_id', $value)->first();
                    if ($exists) {
                        return $fail("User ini sudah di masukan");
                    }
                },
            ],
        ]);

        $votable = new Votable($request->all());
        $votable->save();

        return response()->json([
            'status' => true,
            'message' => "Berhasil",
            'data' => $votable->load('user'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Votable  $votable
     * @return \Illuminate\Http\Response
     */
    public function show(Votable $votable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Votable  $votable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Votable $votable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Votable  $votable
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $votable = Votable::findOrFail($id);
        $votable->delete();

        return response()->json($votable);
    }
}
