<?php 
// use App\Http\Controllers\API\v1\Student;
Route::post('createassigmentsession',
[App\Http\Controllers\API\v1\Student\AssigmentSessionController::class, 'createAssigmentSession']);

Route::get('/assigments/search/{key}',
[App\Http\Controllers\API\v1\Student\AssigmentController::class, 'search']);
// Route::get('/')