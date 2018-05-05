<?php
namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
