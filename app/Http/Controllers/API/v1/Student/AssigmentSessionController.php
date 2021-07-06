<?php

namespace App\Http\Controllers\API\v1\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assigment;
use App\Models\AssigmentSession;
use App\Models\Session;
use DB;

class AssigmentSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 111;
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
    public function createAssigmentSession(Request $request){
        $request->validate([
            'assigment_id'=>'required'
        ]);
        $user = $request->user();

        $check = Session::with('assigments')->whereHas('assigments', function($query)use($request){
            $query->where('assigments.id',$request->assigment_id);
        })->where('user_id',$user->id);

        if($check->exists()){
            return $check->first();
        }else{
            // return 'abb';
            $assigment = Assigment::findOrFail($request->assigment_id);
            try{
                DB::beginTransaction();
                $session = new Session;
                $session->user_id = $user->id;
                $assigment->sessions()->save($session);
                DB::commit();
                return $session->load('assigments');
            
            }catch (\PDOException $e) {
                // Woopsy
                
                DB::rollBack();
                dd($e);
            }
        }
       
        // $request->validate([

        // ]);
    }
}
