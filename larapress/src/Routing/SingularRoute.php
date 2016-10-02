<?php
namespace JordanDoyle\Larapress\Routing;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use JordanDoyle\Larapress\Support\Wordpress;

/**
 * Singular route, this route is matched when the user
 * hits a page that is owned by a certain Wordpress post type.
 *
 * @author Jordan Doyle <jordan@doyle.wf>
 */
class SingularRoute extends Route
{
    /**
     * Entry types this route should hook onto.
     *
     * @var array
     */
    private $types;

    /**
     * Create a new Route instance.
     *
     * @param  array|string $methods
     * @param  array $types
     * @param  \Closure|array $action
     * @return void
     */
    public function __construct($methods, $types, $action)
    {
        parent::__construct($methods, $types, $action);

        $this->types = $this->uri;
        $this->uri = '';
    }

    /**
     * Format a nice string for php artisan route:list
     *
     * @return string
     */
    public function uri()
    {
        return 'singular/' . implode('/', $this->types);
    }

    /**
     * Determine if the route matches given request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  bool $includingMethod
     * @return bool
     */
    public function matches(Request $request, $includingMethod = true)
    {
        if (!Wordpress::id()) {
            // this isn't a wordpress-controlled page
            return false;
        }

        return Wordpress::singular($this->types);
    }
}
