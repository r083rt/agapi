<?php
use App\Http\Controllers\API\v1\Student\AssigmentController;
use App\Http\Controllers\API\v1\Student\AssigmentSessionController;
use App\Http\Controllers\API\v1\Student\PaymentController;

Route::post('createassigmentsession', [AssigmentSessionController::class, 'createAssigmentSession']);

Route::get('/assigments/search/{key}', [AssigmentController::class, 'search']);
// Route::get('/')
Route::apiResource('/assigmentsession', AssigmentSessionController::class);
Route::post('/premium/storeassigmentsession', [AssigmentSessionController::class, 'storePremium']);
// Route::post('/premium/showassigmentsession', [AssigmentSessionController::class, 'storePremium']);

Route::get('unfinishedassigment', [AssigmentController::class, 'unfinishedAssigment']);

Route::post('createpayment', [PaymentController::class, 'createPayment']);
// Route::get('balance', [PaymentController::class, 'getBalance']);
Route::get('checkpayment/{payment_id}', [PaymentController::class, 'checkPayment']);
Route::get('getpayment/{payment_id}', [PaymentController::class, 'getPayment']);

Route::post('buyassigment', [AssigmentController::class, 'buyAssigment']);

Route::get('/ranking', [AssigmentController::class, 'ranking']);

Route::get('purchasedassignment', [AssigmentController::class, 'purchasedAssignments']);
Route::get('purchasedassignment/{assignment_id}', [AssigmentController::class, 'showPurchasedAssignment']);

Route::get('pendingassignmentpayments', [AssigmentController::class, 'pendingAssigmentPayments']);

Route::get('payableassignment', [AssigmentController::class, 'payableAssignments']);
// Route::post('/assigmentsessions/storePremium', [AssigmentController::class, 'storePremium']);

Route::get('paidassignmentdetails/{assigment_id}', [AssigmentController::class, 'paidAssignmentDetails']);

Route::post('placeassignmentpayment/{assigment_id}', [AssigmentController::class, 'placeAssignmentPayment']);
Route::get('getassignmentpaymentdetails/{assigment_id}', [AssigmentController::class, 'getPayment']);

Route::put('confirmpayment/{payment_id}', [PaymentController::class, 'confirmPayment']);

Route::get('checkassignmentpayment/{assignment_id}', [AssigmentController::class, 'checkAssignmentPayment']);
