<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
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
    return view('post', ['post' => $post]);
});

Route::singular('page', function (Koselig\Models\Post $page) {
    dd($page);
});
