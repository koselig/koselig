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

    /**
     * Get the slug of the template of a page.
     *
     * @param string $page
     * @return false|string
     */
    public static function templateSlug($page = null)
    {
        return get_page_template_slug($page);
    }

    /**
     * Check if the current page is a singular item (eg. a news post)
     *
     * @param array|string $types
     * @return bool
     */
    public static function singular($types = '')
    {
        return is_singular($types);
    }

    /**
     * Check if the current page is an archive page
     *
     * @param string|array|null $types check if the archive page is for this type
     * @return bool
     */
    public static function archive($types = null)
    {
        return $types === null || empty($types) ? is_archive() : is_post_type_archive($types);
    }

    /**
     * Get the current logged in user.
     *
     * @return \WP_User
     */
    public static function currentUser()
    {
        return wp_get_current_user();
    }
}
