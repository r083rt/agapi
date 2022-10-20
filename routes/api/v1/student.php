<?php

Route::post('createassigmentsession', 'AssigmentSessionController@createAssigmentSession');

Route::get('/assigments/search/{key}', 'AssigmentController@search');
// Route::get('/')
Route::apiResource('/assigmentsession', 'AssigmentSessionController');
Route::post('/premium/storeassigmentsession', 'AssigmentSessionController@storePremium');
// Route::post('/premium/showassigmentsession', [AssigmentSessionController::class, 'storePremium']);

Route::get('unfinishedassigment', 'AssigmentController@unfinishedAssigment');

Route::post('createpayment', 'PaymentController@createPayment');
// Route::get('balance', [PaymentController::class, 'getBalance']);
Route::get('checkpayment/{payment_id}', 'PaymentController@checkPayment');
Route::get('getpayment/{payment_id}', 'PaymentController@getPayment');

Route::post('buyassigment', 'AssigmentController@buyAssigment');

Route::get('/ranking', 'AssigmentController@ranking');

Route::get('purchasedassignment', 'AssigmentController@purchasedAssignments');
Route::get('purchasedassignment/{assignment_id}', 'AssigmentController@showPurchasedAssignment');

Route::get('pendingassignmentpayments', 'AssigmentController@pendingAssigmentPayments');

Route::get('payableassignment', 'AssigmentController@payableAssignments');
// Route::post('/assigmentsessions/storePremium', [AssigmentController::class, 'storePremium']);

Route::get('paidassignmentdetails/{assigment_id}', 'AssigmentController@paidAssignmentDetails');

Route::post('placeassignmentpayment/{assigment_id}', 'AssigmentController@placeAssignmentPayment');
Route::get('getassignmentpaymentdetails/{assigment_id}', 'AssigmentController@getPayment');

Route::put('confirmpayment/{payment_id}', 'PaymentController@confirmPayment');

Route::get('checkassignmentpayment/{assignment_id}', 'AssigmentController@checkAssignmentPayment');
