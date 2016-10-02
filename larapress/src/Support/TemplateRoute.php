<?php
namespace JordanDoyle\Larapress\Support;

use Illuminate\Http\Request;
use Illuminate\Routing\Matching\MethodValidator;
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
            return false;
        }

        return $this->uri() === $slug;
    }
}
