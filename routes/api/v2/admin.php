<?php

Route::get('/kongres/member/search/{keyword}', 'Kongres2022Controller@searchMember');

Route::post('/kongres/member/{id}/manual-payment/{key}', 'Kongres2022Controller@addMemberPayment');



Route::resources([
     'candidate' => 'CandidateController',
     'candidate.vote' => 'CandidateVoteController',
     'votable' => 'VotableController'
]);
