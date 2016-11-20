<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Koselig\Support\Action;

/**
 * Make ACF load and save from JSON files rather than from the database to allow
 * fields to go into version control.
 *
 * @author Jordan Doyle <jordan@doyle.wf>
 */
class ACFServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function boot()
    {
        $location = resource_path('fields');

        Action::hook('acf/settings/save_json', function () use ($location) {
            return $location;
        });

        Action::hook('acf/settings/load_json', function ($paths) use ($location) {
            // this hook is ran twice for whatever reason so we have to conditionally add our location
            return !in_array($location, $paths) ? array_merge($paths, [$location]) : $paths;
        });
    }
}
