<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        register_nav_menu('primary_navigation', 'Primary Navigation');

        View::share('menu', (function () {
            try {
                return menu('primary_navigation', 0);
            } catch (Exception $e) {
                return [];
            }
        })());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
