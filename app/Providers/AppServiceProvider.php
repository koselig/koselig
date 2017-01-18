<?php
namespace App\Providers;

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
