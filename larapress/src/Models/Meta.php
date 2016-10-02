<?php
namespace JordanDoyle\Larapress\Models;

use Illuminate\Database\Eloquent\Model;
use JordanDoyle\Larapress\Support\Wordpress;

/**
 * Model for post meta lookup.
 *
 * @author Jordan Doyle <jordan@doyle.wf>
 */
class Meta extends Model
{
    public $table = DB_PREFIX . 'postmeta';

    /**
     * Cache for all meta values.
     *
     * @var array
     */
    public static $cache = [];

    /**
     * Get metadata for a page (or the current page)
     *
     * <code>Meta::get('my_meta_key');</code>
     * or
     * <code>Meta::get(7, 'my_meta_key');</code>
     *
     * @param int|string|null $page page to get meta for (or name of the meta item to get
     *                              if you want to get the current page's meta)
     * @param string|null $name
     * @return mixed
     */
    public static function get($page = null, $name = null)
    {
        if (!ctype_digit((string) $page) && $name === null) {
            $name = $page;
            $page = null;
        }

        if ($page === null) {
            $page = Wordpress::id();
        }

        if (!isset(self::$cache[$page])) {
            // get all the meta values for a post, it's more than likely we're going to
            // need this again query, so we'll just grab all the results and cache them.
            self::$cache[$page] = Meta::where('post_id', $page)->get();
        }

        if ($name === null) {
            return self::$cache[$page]->mapWithKeys(function ($item) {
                return [$item->meta_key => $item->meta_value];
            })->all();
        }

        return self::$cache[$page]->where('meta_key', $name)->first()->meta_value;
    }
}
