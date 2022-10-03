<?php

namespace App\Http\Controllers\APi\v2\member;

use App\Helper\Firestore;
use App\Helper\PushNotif;
use App\Http\Controllers\Controller;
use App\Models\Member\Conversation;
use App\Models\Member\User;
use Illuminate\Http\Request;

class UserPersonalConversationController extends Controller
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
    public function store(Request $request, $receiverId)
    {
        //
        $request->validate([
            'message' => 'required',
            // nanti ada validasi apakah yang ngechat di blok oleh penerima
        ]);

        $conversation = Conversation::where('type', 'personal')
            ->whereHas('users', function ($query) use ($request, $receiverId) {
                return $query->where('user_id', $request->user()->id);
            })->whereHas('users', function ($query) use ($request, $receiverId) {
            return $query->where('user_id', $receiverId);
        });

        // $exist = User::findOrFail($request->user()->id)->conversations()->where('user_id', $receiverId)->exists();

        if ($conversation->doesntExist()) {
            $conversation = new Conversation();
            $conversation->creator_id = $request->user()->id;
            $conversation->save();
            $conversation->users()->sync([$request->user()->id, $receiverId], false);
        } else {
            $conversation = $conversation->first();
        }

        $conversation->touch();

        $chat = [
            'id' => time(),
            'conversation_id' => $conversation->id,
            'sender_id' => $request->user()->id,
            'value' => $request->message,
            'sent_at' => null,
            'read_at' => null,
            'sender' => [
                'id' => $request->user()->id,
                'name' => $request->user()->name,
                'avatar' => $request->user()->avatar,
            ],
            'created_at' => \Carbon\Carbon::now()->toString(),
        ];

        // $conversation->chats()->save($chat);

        // set ke firebase collection conversations
        // $conversation = $conversation->load(['last_chat']);
        $conversation->last_chat = $chat;
        // map users object to array of id
        $conversation->member_ids = $conversation->users->map(function ($user) {
            return $user->id;
        })->toArray();
        $conversation->members = $conversation->users->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'avatar' => $user->avatar,
            ];
        })->toArray();
        // delete attribute users on conversation
        unset($conversation->users);
        $dbFirestore = new Firestore();
        $dbFirestore->getDb()->collection('conversations')->document($conversation->id)->set($conversation->toArray());

        $dbFirestore->getDb()->collection('chats')->document($chat['id'])->set($chat);

        // send notif to receiver
        $receiver = User::findOrFail($receiverId);
        foreach ($receiver->push_tokens as $push_token) {
            $pushNotif = new PushNotif($push_token->token, $request->user()->name, $request->message, [
                'type' => 'chat',
                'conversation_id' => $conversation->id,
            ]);
            $pushNotif->send();
        }

        return response()->json($conversation->load('users'));
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
