<?php

// api untuk mendapatkan data user yang sedang login
Route::get('/me', 'AuthController@getUserAccount');
// api untuk daftar guru ke aplikasi agpaii digital
Route::post('/register', 'AuthController@register');
// api resources
Route::resources([
    'posts' => 'PostController',
    'posts.comments' => 'PostCommentController', // comment post
    'users.posts' => 'UserPostController',
    'events' => 'EventController', // untuk acara
    'users.stories' => 'UserStoryController', // untuk user story
    'stories' => 'StoryController', // untuk story
]);
