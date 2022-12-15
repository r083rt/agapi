<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\User;
use Illuminate\Http\Request;

class ModuleCoverController extends Controller
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

    public function covermodule($user_id, $name, $subject, $grade, $cover_id)
    {
        // return response()->json('asd');
        $cover = Template::findOrFail($cover_id);
        $creator = User::findOrFail($user_id);

        $data = [
            'image' => 'https://cdn-agpaiidigital.online' . "/$cover->image",
            'creator' => $creator->name,
            'name' => $name,
            'grade' => $grade,
            'subject' => $subject
        ];

        return view('modul.generatecover', compact('data'));
    }
}
