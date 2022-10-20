<?php

namespace App\Http\Controllers\API\v1\Student;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'educational_level_id' => 'required',
        ]);
        $educational_level_id = $request->query('educational_level_id');
        $is_joined = false;
        if(!empty($request->is_joined)){
            $is_joined = true;
        }
        $user = auth()->user();
        // mereturn rooms di mana admin/pembuat ruangan mempunyai educational_level_id yang sama degan auth()
        $query = Room::withCount('users')->with(['admin_users'])->whereHas('admin_users',function($query2)use($educational_level_id){
            // jika educatioanl_level_id tidak kosong, filter berdasarkan guru yang mempunyai jenjang tertentu
            if(!empty($educational_level_id)){
                $query2->whereHas('profile', function($query3)use($educational_level_id){
                    $query3->where('educational_level_id',$educational_level_id);
                });
            }
        })->where('type','class');

        // jika is_joined true, maka hanya mengambil rooms yang sudah terjoin
        if($is_joined){
            $query->whereHas('users',function($query2)use($user){
                $query2->where('user_id', $user->id);
            });
        }

        $data = $query->orderBy('id','desc')
        ->selectRaw("(exists (select * from user_rooms where room_id=rooms.id and user_id=?)) as is_joined", [$user->id])
        ->get();
        return response()->json($data);
    }
    public function getJoinedRooms(){
        $user = auth()->user();
        $education_level_id = $user->profile->educational_level_id;
        if(empty($education_level_id)){
            return response(["error"=>["message"=>"Isi jenjang pendidikan terlebih dahulu"]], 403);
        }
        $res = Room::withCount('users')->whereHas('users',function($query)use($user){
            $query->where('user_id',$user->id);
        })->where('type','class')->orderBy('id','desc')->get();
        return $res;
    }
    public function join(Request $request){
        $request->validate([
            'code'=>"required|exists:App\Models\Room,code"
        ]);
        $room = Room::where('code',$request->code)->first();
        $res = $request->user()->rooms()->syncWithoutDetaching($room->id);
        $room->loadCount('users');
        return $room;
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
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
