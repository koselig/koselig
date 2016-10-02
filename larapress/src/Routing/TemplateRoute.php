<?php
namespace JordanDoyle\Larapress\Routing;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

/**
 * Template route, this route is matched then the Wordpress
 * template set in the backend equals the slug of this route.
 *
 * @author Jordan Doyle <jordan@doyle.wf>
 */
class TemplateRoute extends Route
{
    /**
     * Format a nice string for php artisan route:list
     *
     * @return string
     */
    public function uri()
    {
        return 'template/' . parent::uri();
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
        $slug = get_page_template_slug();

        if (!$slug) {
            // the page we are on either isn't in the CMS or doesn't have a template.
            return false;
        }

        return $this->uri === $slug;
    }
}
