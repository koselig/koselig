<?php
namespace JordanDoyle\Larapress\Support;

/**
 * Provides various base Wordpress helper functionality in a nice
 * OO way.
 *
 * @author Jordan Doyle <jordan@doyle.wf>
 */
class Wordpress
{
    /**
     * Get the current Wordpress query.
     *
     * @return \WP_Query
     */
    public static function query()
    {
        global $wp_query;
        return $wp_query;
    }

    /**
     * Get the current page id.
     *
     * @return int
     */
    public static function id()
    {
        return get_the_ID();
    }
}
