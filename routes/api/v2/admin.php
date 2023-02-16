<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/me', function (Request $request) {
    return response()->json($request->user());
});

Route::get('/kongres/member/search/{keyword}', 'Kongres2022Controller@searchMember');

Route::post('/kongres/member/{id}/manual-payment/{key}', 'Kongres2022Controller@addMemberPayment');

Route::group(['as' => 'api.v2.admin.'], function () {
    Route::apiResources([
        'candidate' => 'CandidateController',
        'candidate.vote' => 'CandidateVoteController',
        'votable' => 'VotableController',
        'user.votable' => 'UserVotableController',
        'department-division' => 'DepartmentDivisionController',
        'department' => 'DepartmentController',
        // 'department.user' => 'DepartmentUserController',
        'department-user' => 'DepartmentUserController',
        'excel/province.user' => 'Excel\ProvinceUserController',
        'ads' => 'AdsController',
        'post' => 'PostController',
        'province' => 'ProvinceController',
        'province.city' => 'ProvinceCityController',
        'city.district' => 'CityDistrictController',
        'islamic-study' => 'IslamicStudyController',
        'user' => 'UserController',
        'user.file' => 'UserFileController',
    ]);
});

Route::get('/user/growth', 'UserController@memberGrowth');

Route::get('/islamic-study/{id}/approval', 'IslamicStudyController@approval');
Route::get('/islamic-study/{id}/rejected', 'IslamicStudyController@rejected');

Route::get('/user/search/{keyword}', 'UserController@search');
Route::get('/departments/search/{keyword}', 'DepartmentController@search');
