<?php

// api untuk mendapatkan data user yang sedang login
Route::get('/me', 'AuthController@getUserAccount');
// api untuk daftar guru ke aplikasi agpaii digital
Route::post('/register','AuthController@register');

Route::resources([
    'posts' => 'PostController',
    'posts.comments' => 'PostCommentController', // comment post
    'users.posts' => 'UserPostController'
]);
