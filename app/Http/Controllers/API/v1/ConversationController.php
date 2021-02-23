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
        },'participants'])->whereHas('users',function($query){
            $query->where('users.id',auth()->user()->id);
        })->where('type','personal')->orderBy('updated_at','desc')->paginate();
        
        
        return $conversations;

    }
    private function getPersonalConversation($participant_id_1, $participant_id_2){
        $conversation = Conversation::where('type','personal')
        ->whereExists(function($query)use($participant_id_1){
            $query->select(DB::raw(1))
                     ->from('user_conversations')
                     ->where('user_conversations.user_id',$participant_id_1)
                     ->whereColumn('user_conversations.conversation_id', 'conversations.id');
        })
        ->whereExists(function($query)use($participant_id_2){
            $query->select(DB::raw(1))
                     ->from('user_conversations')
                     ->where('user_conversations.user_id',$participant_id_2)
                     ->whereColumn('user_conversations.conversation_id', 'conversations.id');
        });
        if($conversation->exists()){
            $conversation->with(['users'=>function($query){
                $query->where('users.id','!=',auth()->user()->id);
            }]);
            return $conversation->first();
        }
        return null;
    }
    private function verifyConversation($conversation_id,$participant_id){
        // mengecek apakah user benar2 bagian dari participant conversation {conversation_id}
        $conversation = Conversation::where('type','personal')
        ->whereExists(function($query)use($participant_id){
            $query->select(DB::raw(1))
                     ->from('user_conversations')
                     ->where('user_conversations.user_id',$participant_id)
                     ->whereColumn('user_conversations.conversation_id', 'conversations.id');
        })->where('id',$conversation_id);
        if($conversation->exists()){
            return $conversation->first();
        }
        return null;
        

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
        
        // cek apakah ada personal conversation antara 2 participant (sender dan receiver)
        $conversation = $this->getPersonalConversation(auth()->user()->id, $request->invited_user_id);
        if($conversation){
            return $conversation;
        }

        // jika tidak ada personal conversation antara 2 participant (sender dan receiver), maka buat baru
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
        },'participants'])
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
    public function update(Request $request, $conversation_id)
    {
        
        $request->validate([
            'latest_message_at'=>'digits:13' //13 karena panjang dari hasil `new Date().getTime()` adalah 13
        ]);
        // mengecek apakah user benar2 bagian dari participant conversation {conversation_id}
        $conversation = $this->verifyConversation($conversation_id,auth()->user()->id);
        if($conversation){
            // return $request->latest_message_at;
            $latest_message_at = date("Y-m-d h:i:s",$request->latest_message_at/1000);
            $conversation->updated_at = $latest_message_at;
            $conversation->save();
            return $conversation;
        }
        return null;
        
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
    public function getUnreadCount(){
        $conversations = Conversation::whereNull('read_at')->whereHas('users',function($query){
            $query->where('users.id',auth()->user()->id);
        })->count();
        return ['unread_count'=>$conversations];
        
    }
}
