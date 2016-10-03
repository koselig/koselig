<?php

// wp-config file to make the wordpress backend aware of our presence

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels nice to relax.
|
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;

require __DIR__ . '/../bootstrap/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__ . '/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$app->bootstrapWith([
    Illuminate\Foundation\Bootstrap\DetectEnvironment::class,
    Illuminate\Foundation\Bootstrap\LoadConfiguration::class,
    Illuminate\Foundation\Bootstrap\ConfigureLogging::class,
    Illuminate\Foundation\Bootstrap\HandleExceptions::class,
    Illuminate\Foundation\Bootstrap\RegisterFacades::class,
]);

$app->instance('request', Request::capture());
Facade::clearResolvedInstance('request');

// force the root url to whatever is set in the env file, stops wordpress taking over the root url
// when loading from wp-config.php
url()->forceRootUrl(config('app.url'));

$app->bootstrapWith([
    Illuminate\Foundation\Bootstrap\RegisterProviders::class,
    Illuminate\Foundation\Bootstrap\BootProviders::class,
]);
