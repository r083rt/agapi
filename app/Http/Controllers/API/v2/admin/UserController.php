<?php

namespace App\Http\Controllers\API\v2\admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    //

    public function index()
    {
        $users = User::where('user_activated_at', '!=', null)
            ->whereHas('role', function ($query) {
                $query->whereIn('name', ['user']);
            })
            ->with('role')
            ->paginate(request()->query('per_page'));

        return response()->json($users);
    }

    public function search($keyword)
    {
        $users = User::where('name', 'like', '%' . $keyword . '%')
            ->orWhere('email', 'like', '%' . $keyword . '%')
            ->orWhere('kta_id', 'like', '%' . $keyword . '%')
            ->with('role')
            ->paginate();

        return response()->json($users);
    }
}
