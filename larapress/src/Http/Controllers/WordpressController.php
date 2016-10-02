<?php
namespace JordanDoyle\Larapress\Http\Controllers;

use Illuminate\Routing\Controller;

/**
 * Handles incoming requests to a page which we didn't handle with our
 * default routes and send the request to the correct template controller
 * method.
 *
 * @author Jordan Doyle <jordan@doyle.wf>
 */
class WordpressController extends Controller
{
    public function handleRequest()
    {
        dd(get_page_template_slug());
        return response('this');
    }
}
