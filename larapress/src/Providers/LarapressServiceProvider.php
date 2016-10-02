<?php
namespace JordanDoyle\Larapress\Providers;

use Illuminate\Container\Container;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use JordanDoyle\Larapress\Support\TemplateRoute;
use Route;

/**
 * Registers all the other service providers used by this package.
 *
 * @author Jordan Doyle <jordan@doyle.wf>
 */
class LarapressServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(WordpressServiceProvider::class);

        Router::macro('template', function ($slug, $action) {
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

            $route = (new TemplateRoute(['GET', 'HEAD', 'POST', 'PUT', 'PATCH', 'DELETE'], $slug, $action))
                ->setRouter(app('router'))
                ->setContainer(app(Container::class));

            return Route::getRoutes()->add($route);
        });
    }
}
