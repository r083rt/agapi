<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use App\Models\Member\User;
use Illuminate\Http\Request;
use App\Models\Member\Conversation;
use App\Helper\Firestore;
use App\Models\Member\UserConversation;

class PersonalConversationController extends Controller
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
        $user = User::with(['conversations' => function ($query) {
            $query->whereHas('users', function ($query) {
                $query->where('user_id', auth()->user()->id);
            });
        }])
            ->findOrFail($id);
        return response()->json($user);
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
        $conversation = Conversation::whereHas('users', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->findOrFail($id);

        $userConversation = UserConversation::where('user_id', auth()->user()->id)->where('conversation_id', $conversation->id)->firstOrFail();

        // hapus userConversation dengan soft Delete
        $delete = $userConversation->delete();

        // buat deleted_by isi nya conversation yang mempunyai users yang dihapus di map id nya saja
        $conversation->deleted_by = UserConversation::where('conversation_id', $conversation->id)->onlyTrashed()->get()->map(function ($user) {
            return $user->user_id;
        })
            // unique
            ->unique()
            ->toArray();

        // return response()->json($conversation->deleted_by);

        // tambahkan array deleted_by nya saja
        $dbFirestore = new Firestore();
        $dbFirestore->getDb()->collection('conversations')->document($conversation->id)
            ->update([
                ['path' => 'deleted_by', 'value' => $conversation->deleted_by],
            ]);

        return response()->json([
            "data" => $delete,
            "message" => $delete ? "Conversation deleted" : "Conversation not found",
            "status" => $delete ? 200 : 404,
        ]);
    }

    public function search($keyword)
    {
        $users = User::with(['conversations' => function ($query) {
            $query->whereHas('users', function ($query) {
                $query->where('user_id', auth()->user()->id);
            });
        }])
            ->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('email', 'like', '%' . $keyword . '%')
            ->orWhere('kta_id', 'like', '%' . $keyword . '%')
            // ->whereHas('conversation.users', function ($query) {
            //     $query->where('users.id', auth()->user()->id);
            // })
            ->paginate();
        return response()->json($users);
    }
}
