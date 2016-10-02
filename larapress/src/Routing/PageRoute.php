<?php
namespace JordanDoyle\Larapress\Routing;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

/**
 * Single page route, this route is matched when the
 * Wordpress page id is equal to the slug of this route.
 *
 * @author Jordan Doyle <jordan@doyle.wf>
 */
class PageRoute extends Route
{
    /**
     * Format a nice string for php artisan route:list
     *
     * @return string
     */
    public function uri()
    {
        return 'page/' . parent::uri();
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
        $id = get_the_ID();

        if (!$id) {
            // we're not on a Wordpress page
            return false;
        }

        return $this->uri === $id;
    }
}
