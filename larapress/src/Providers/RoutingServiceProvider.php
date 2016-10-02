<?php
namespace JordanDoyle\Larapress\Providers;

use Illuminate\Container\Container;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use JordanDoyle\Larapress\Routing\ArchiveRoute;
use JordanDoyle\Larapress\Routing\PageRoute;
use JordanDoyle\Larapress\Routing\SingularRoute;
use JordanDoyle\Larapress\Routing\TemplateRoute;
use Route;

/**
 * Provides routing methods for Wordpress-related routes.
 *
 * @author Jordan Doyle <jordan@doyle.wf>
 */
class RoutingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function register()
    {
        // Router methods
        Router::macro('template', function ($slug, $action) {
            $action = $this->formatAction($action);

            $route = (new TemplateRoute($action['method'], $slug, $action))
                ->setRouter(app('router'))
                ->setContainer(app(Container::class));

            return Route::getRoutes()->add($route);
        });

        Router::macro('page', function ($slug, $action) {
            $action = $this->formatAction($action);

            $route = (new PageRoute($action['method'], $slug, $action))
                ->setRouter(app('router'))
                ->setContainer(app(Container::class));

            return Route::getRoutes()->add($route);
        });

        Router::macro('archive', function ($postTypes = [], $action = []) {
            if (empty($action)) {
                $action = $postTypes;
                $postTypes = [];
            }

            if (!is_array($postTypes)) {
                $postTypes = [$postTypes];
            }

            $action = $this->formatAction($action);

            $route = (new ArchiveRoute($action['method'], $postTypes, $action))
                ->setRouter(app('router'))
                ->setContainer(app(Container::class));

            return Route::getRoutes()->add($route);
        });

        Router::macro('singular', function ($types, $action) {
            if (!is_array($types)) {
                $types = [$types];
            }

            $action = $this->formatAction($action);

            $route = (new SingularRoute($action['method'], $types, $action))
                ->setRouter(app('router'))
                ->setContainer(app(Container::class));

            return Route::getRoutes()->add($route);
        });

        // Router helpers
        Router::macro('formatAction', function ($action) {
            if (!($action instanceof $action) && (is_string($action) || (isset($action['uses'])
                    && is_string($action['uses'])))) {
                if (is_string($action)) {
                    $action = ['uses' => $action];
                }

                if (!empty($this->groupStack)) {
                    $group = end($this->groupStack);

                    $action['uses'] = isset($group['namespace']) && strpos($action['uses'], '\\') !== 0 ?
                        $group['namespace'] . '\\' . $action['uses'] : $action['uses'];
                }

                $action['controller'] = $action['uses'];
            }

            if (!is_array($action)) {
                $action = ['uses' => $action];
            }

            if (!isset($action['method'])) {
                $action['method'] = ['GET'];
            }

            return $action;
        });
    }
}
