<?php
namespace JordanDoyle\Larapress\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JordanDoyle\Larapress\Support\Wordpress;

/**
 * Table containing the metadata about users in the CMS.
 *
 * @author Jordan Doyle <jordan@doyle.wf>
 */
class UserMeta extends Model
{
    public $table = DB_PREFIX . 'usermeta';

    /**
     * Cache for all meta values.
     *
     * @var array
     */
    public static $cache = [];

    /**
     * Get metadata for a user
     *
     * @param int|string|null $user user to get meta for (or name of the meta item to get
     *                              if you want to get the current user's meta)
     * @param string|null $name
     * @return mixed
     */
    public static function get($user = null, $name = null)
    {
        if (!ctype_digit((string) $user) && $name === null) {
            $name = $user;
            $page = null;
        }

        if ($user === null) {
            $user = Wordpress::currentUser()->ID;
        }

        if (!isset(self::$cache[$user])) {
            // get all the meta values for a post, it's more than likely we're going to
            // need this again query, so we'll just grab all the results and cache them.
            self::$cache[$user] = UserMeta::where('user_id', $user)->get();
        }

        if ($name === null) {
            return self::$cache[$user]->mapWithKeys(function ($item) {
                return [$item->meta_key => $item->meta_value];
            })->all();
        }

        return self::$cache[$user]->where('meta_key', $name)->first()->meta_value;
    }

    /**
     * Get the user that this meta value belongs to.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
