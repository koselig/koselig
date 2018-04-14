let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.es6', 'public/js')
    .sourceMaps(!mix.inProduction())
    .extract([
        'axios',
        'bootstrap',
        'jquery',
        'lodash',
        'popper.js',
        'vue'
    ])
    .version();

mix.sass('resources/assets/sass/app.scss', 'public/css')
    .version();
