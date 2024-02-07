<?php

namespace App\Http\Controllers\API\v2\member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceMemberDetailController extends Controller
{
    public function index(){
        $members = Province::with(['users' => function($query){
            $query->where('user_activated_at', '!=', null)
            ->whereIn('role_id', [2, 7, 9, 10, 11]);
        }])->paginate();

       
        return response()->json($members);
    }
}
