<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $conversations = Conversation::with(['users'=>function($query){
            $query->where('users.id','!=',auth()->user()->id);
        }])->whereHas('users',function($query){
            $query->where('users.id',auth()->user()->id);
        })->where('type','personal')->orderBy('id','desc')->paginate();
        
        return $conversations;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $request->validate([
            'invited_user_id'=>'required'
        ]);
        // $conversation = Conversation::where('creator_id',auth()->user()->id)
        // ->where('type','personal')
        // ->whereHas('users',function($query)use($request){
        //    $query->where('users.id',$request->invited_user_id);
        // });
        $conversation = Conversation::where('type','personal')
        ->whereExists(function($query)use($request){
            $query->select(DB::raw(1))
                     ->from('user_conversations')
                     ->where('user_conversations.user_id',$request->invited_user_id)
                     ->whereColumn('user_conversations.conversation_id', 'conversations.id');
        })
        ->whereExists(function($query){
            $query->select(DB::raw(1))
                     ->from('user_conversations')
                     ->where('user_conversations.user_id',auth()->user()->id)
                     ->whereColumn('user_conversations.conversation_id', 'conversations.id');
        });
        // return $conversation->exists();
        if($conversation->exists()){
            $conversation->with(['users'=>function($query){
                $query->where('users.id','!=',auth()->user()->id);
            }]);
            return $conversation->first();
        }

        $conversation = new Conversation;
        $conversation->creator_id =  auth()->user()->id;
        $conversation->type = 'personal';
        $conversation->save();
        $invited_user = \App\Models\User::findOrFail($request->invited_user_id);
       
        auth()->user()->conversations()->attach($conversation->id,['is_admin'=>true,'is_archived'=>false,'is_muted'=>false,'is_accepted'=>true]);
        $invited_user->conversations()->attach($conversation->id,['is_admin'=>true,'is_archived'=>false,'is_muted'=>false,'is_accepted'=>true]);
        // auth()->user()->conversations()->save($conversation);
        $conversation->load(['users'=>function($query){
            $query->where('users.id','!=',auth()->user()->id);
        }]);
        return $conversation;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function show($conversation_id)
    {
        $conversation = Conversation::with(['users'=>function($query){
            $query->where('users.id','!=',auth()->user()->id);
        }])
        //check apakah masuk dalam user_conversations sbg penerima/pengirim
        ->whereHas('users',function($query){
            $query->where('users.id',auth()->user()->id);
        })
        ->findOrFail($conversation_id);
        return $conversation;


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conversation $conversation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conversation $conversation)
    {
        //
    }
}
