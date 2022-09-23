<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/me', function (Request $request) {
    return response()->json($request->user());
});

Route::get('/kongres/member/search/{keyword}', 'Kongres2022Controller@searchMember');

Route::post('/kongres/member/{id}/manual-payment/{key}', 'Kongres2022Controller@addMemberPayment');

Route::resources([
    'candidate' => 'CandidateController',
    'candidate.vote' => 'CandidateVoteController',
    'votable' => 'VotableController',
    'user.votable' => 'UserVotableController',
]);

Route::get('/user/search/{keyword}', 'UserController@search');
