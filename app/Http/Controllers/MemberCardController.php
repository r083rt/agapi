<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MemberCardController extends Controller
{
    //
    public function previewFrontCard($userId)
    {
        $user = User::with(['profile','role'])->findOrFail($userId);
        $storageUrl = env('STORAGE_URL');

        return view('template/MemberCardFront', ['user' => $user, 'storageUrl' => $storageUrl]);
    }

    public function previewBackCard($userId)
    {
        $user = User::with('profile')->findOrFail($userId);
        $storageUrl = env('STORAGE_URL');

        return view('template/MemberCardBack', ['user' => $user, 'storageUrl' => $storageUrl]);
    }
}
