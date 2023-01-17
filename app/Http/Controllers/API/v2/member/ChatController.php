<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\Member\Chat;
use Illuminate\Http\Request;
use App\Helper\Firestore;

class ChatController extends Controller
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
     * @param  \App\Models\Member\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $term)
    {
        // update collection chats dengan id $id di firestore
        $firestore = new Firestore();
        $chat = $firestore->getDb()->collection('chats')->document($id);

        $sender_id = $chat->snapshot()->get('sender_id');

        if ($sender_id != auth()->user()->id) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda tidak memiliki akses untuk menghapus chat ini',
            ], 403);
        }

        $member_ids = $chat->snapshot()->get('member_ids');

        if ($term == 'all') {
            $chat->update([
                ['path' => 'member_ids', 'value' => []]
            ]);
        } else {
            // hapus diri sendiri dari member_ids
            $member_ids = array_diff($member_ids, [auth()->user()->id]);
            $chat->update([
                ['path' => 'member_ids', 'value' => $member_ids]
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Chat berhasil dihapus',
        ]);
    }
}
