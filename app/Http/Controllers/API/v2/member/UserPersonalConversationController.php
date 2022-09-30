<?php

namespace App\Http\Controllers\APi\v2\member;

use App\Helper\Firestore;
use App\Http\Controllers\Controller;
use App\Models\Member\Chat;
use App\Models\Member\Conversation;
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

        $conversation = Conversation::
            whereHas('users', function ($query) use ($request) {
            return $query->where('user_id', $request->user()->id);
        })
            ->whereHas('users', function ($query) use ($receiverId) {
                return $query->where('user_id', $receiverId);
            });
        if ($conversation->doesntExist()) {
            $conversation = new Conversation();
            $conversation->creator_id = $request->user()->id;
            $conversation->save();
            $conversation->users()->sync([$request->user()->id, $receiverId]);
        }

        $conversation = $conversation->first();

        $chat = new Chat([
            'sender_id' => $request->user()->id,
            'value' => $request->message,
        ]);

        $conversation->chats()->save($chat);
        // set ke firebase collection conversations
        $conversation = $conversation->load(['last_chat']);
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

        // set ke firebase collection chats
        $chat->sender = [
            'id' => $chat->sender->id,
            'name' => $chat->sender->name,
            'avatar' => $chat->sender->avatar,
        ];

        $dbFirestore->getDb()->collection('chats')->document($chat->id)->set($chat->toArray());

        return response()->json($chat->load('sender'));
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
