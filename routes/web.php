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

Route::group(['domain' => 2], function () {
    // routes for site id 2 here.
    Route::get('/', function () {
        return 'this overrides the mainsite route when you\'re on site id 2!';
    });

    Route::singular('post', function () {
        // this is a singular page for a post with the post type 'post'
        dd(auth()->check() ? auth()->user()->user_login : 'Not logged in via Wordpress!');
    });

    Route::template('home', function () {
        // this is triggered when the user goes on a page with the template with slug 'home'
        dd(Koselig\Models\Post::postType('page')->published()->get());
    });
});

Route::archive(function () {
    // this is a normal archive page
    return 'archive';
});

Route::archive('suppliers', function () {
    // this is an archive page for suppliers
    return 'suppliers archive';
});

Route::archive(['suppliers-2', 'news'], function () {
    // this is an archive page for suppliers-2 and news
    return 'suppliers and news archive page';
});

Route::singular('post', function () {
    // this is a singular page for a post with the post type 'post'
    dd(Meta::get('_edit_lock'));
});
