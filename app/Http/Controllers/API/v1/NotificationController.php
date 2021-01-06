<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $types=[];
        if(!empty($request->query('type'))){
            $exp = explode(',',$request->query('type'));
            foreach($exp as $v){
                if(!empty($v))array_push($types, $v);
            }
        }
        $user = auth('api')->user();
        if($user){
            $notifications = Notification::whereHasMorph('notifiable', 'App\Models\User',function($query)use($user){
                $query->where('id','=',$user->id);  
            });
            if(count($types)>0){
                $notifications->where(function($query)use($types){
                    foreach($types as $k=>$type){
                        if($k==0)$query->where('type','LIKE','%'.$type);
                        else $query->orWhere('type','LIKE','%'.$type);
                    }
                });
              
            }
           
            $notifications->latest();
            return $notifications->paginate();
        }
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
}
