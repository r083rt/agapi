<?php 
// use App\Http\Controllers\API\v1\Student;
Route::post('createassigmentsession',
[App\Http\Controllers\API\v1\Student\AssigmentSessionController::class, 'createAssigmentSession']);

Route::get('/assigments/search/{key}',
[App\Http\Controllers\API\v1\Student\AssigmentController::class, 'search']);
// Route::get('/')
Route::apiResource('/assigmentsession', Student\AssigmentSessionController::class);
Route::get('unfinishedassigment', [App\Http\Controllers\API\v1\Student\AssigmentController::class, 'unfinishedAssigment']);

Route::post('createpayment',[App\Http\Controllers\API\v1\Student\PaymentController::class, 'createPayment']);
Route::get('balance', [App\Http\Controllers\API\v1\Student\PaymentController::class, 'getBalance']);
Route::get('checkpayment/{payment_id}', [App\Http\Controllers\API\v1\Student\PaymentController::class, 'checkPayment']);

Route::post('buyassigment', [App\Http\Controllers\API\v1\Student\AssigmentController::class, 'buyAssigment']);