<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
use App\Models\User;
use App\Models\Channel;

class MainChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->load('main_chats.main_users');
        return response()->json($user->main_chats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // menambahkan ruang chat dari pengajak
        $chat = new Chat();
        $chat->name = $request->name ?? null;
        $request->user()->main_chats()->save($chat,['isAdmin'=>true]);
        // buat channel
        $channel = new Channel();
        $channel->name = "/topics/chats/".md5(time());
        // kasi channel ke yg buat
        $request->user()->chat_channels()->save($channel);
        // menambah ruang chat untuk target
        foreach ($request->users as $u => $user) {
            # code...
            $user = User::findOrFail($user['id']);
            $user->main_chats()->save($chat);
            // ngasi channel ke yg d ajak
            $user->chat_channels()->save($channel);
        }

        return response()->json($chat->load('main_users'));
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
