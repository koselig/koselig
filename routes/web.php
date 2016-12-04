<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // this is a normal laravel route that isn't covered by wordpress, these should
    // normally be avoided and only used for things like api calls and form submissions.
    return view('welcome');
});

Route::author(function (Koselig\Models\User $user) {
    return view('user', ['user' => $user]);
});

Route::singular('post', function (Koselig\Models\Post $post) {
    return view('post', [
        'post' => $post,
        'comments' => $post->getCommentIterator()
    ]);
});

Route::singular('page', function (Koselig\Models\Post $page) {
    dd($page);
});
