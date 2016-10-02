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
    return view('welcome');
});

Route::template('home', function () {
    dd(\JordanDoyle\Larapress\Models\Post::find(1)->meta);
});

Route::archive(function () {
    return 'archive';
});

Route::singular('post', function () {
    dd(Meta::get('_edit_lock'));
});
