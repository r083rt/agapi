<?php 
// use App\Http\Controllers\API\v1\Student;
Route::post('createassigmentsession',
[App\Http\Controllers\API\v1\Student\AssigmentSessionController::class, 'createAssigmentSession']);

Route::get('/assigments/search/{key}',
[App\Http\Controllers\API\v1\Student\AssigmentController::class, 'search']);
// Route::get('/')
Route::apiResource('/assigmentsession', Student\AssigmentSessionController::class);
Route::post('/premium/storeassigmentsession', [App\Http\Controllers\API\v1\Student\AssigmentSessionController::class, 'storePremium']);
// Route::post('/premium/showassigmentsession', [App\Http\Controllers\API\v1\Student\AssigmentSessionController::class, 'storePremium']);


Route::get('unfinishedassigment', [App\Http\Controllers\API\v1\Student\AssigmentController::class, 'unfinishedAssigment']);

Route::post('createpayment',[App\Http\Controllers\API\v1\Student\PaymentController::class, 'createPayment']);
// Route::get('balance', [App\Http\Controllers\API\v1\Student\PaymentController::class, 'getBalance']);
Route::get('checkpayment/{payment_id}', [App\Http\Controllers\API\v1\Student\PaymentController::class, 'checkPayment']);

Route::post('buyassigment', [App\Http\Controllers\API\v1\Student\AssigmentController::class, 'buyAssigment']);

Route::get('/ranking', [App\Http\Controllers\API\v1\Student\AssigmentController::class, 'ranking'] );

Route::get('purchasedassignment',[App\Http\Controllers\API\v1\Student\AssigmentController::class, 'purchasedAssignments']);
Route::get('purchasedassignment/{assignment_id}',[App\Http\Controllers\API\v1\Student\AssigmentController::class, 'showPurchasedAssignment']);

Route::get('pendingassignmentpayments',[App\Http\Controllers\API\v1\Student\AssigmentController::class, 'pendingAssigmentPayments']);

Route::get('payableassignment', [App\Http\Controllers\API\v1\Student\AssigmentController::class, 'payableAssignments']);
// Route::post('/assigmentsessions/storePremium', [App\Http\Controllers\API\v1\Student\AssigmentController::class, 'storePremium']);

Route::get('paidassignmentdetails/{assigment_id}', [App\Http\Controllers\API\v1\Student\AssigmentController::class, 'paidAssignmentDetails']);

Route::post('placeassignmentpayment/{assigment_id}', [App\Http\Controllers\API\v1\Student\AssigmentController::class, 'placeAssignmentPayment']);
Route::get('getassignmentpaymentdetails/{assigment_id}', [App\Http\Controllers\API\v1\Student\AssigmentController::class, 'getPayment']);

Route::put('confirmpayment/{payment_id}', [App\Http\Controllers\API\v1\Student\PaymentController::class, 'confirmPayment']);

Route::get('checkassignmentpayment/{assignment_id}', [App\Http\Controllers\API\v1\Student\AssigmentController::class, 'checkAssignmentPayment']);