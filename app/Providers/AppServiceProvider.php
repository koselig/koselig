<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Koselig\Support\Action;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Action::hook('the_title', function ($title) {
            return 'Koselig - ' . $title;
        });
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
