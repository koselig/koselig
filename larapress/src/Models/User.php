<?php
namespace JordanDoyle\Larapress\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Table containing all the users within the CMS.
 *
 * @author Jordan Doyle <jordan@doyle.wf>
 */
class User extends Model
{
    public $table = DB_PREFIX . 'users';
    public $primaryKey = 'ID';

    /**
     * Get all the posts that belong to this user.
     *
     * @return HasMany
     */
    public function posts()
    {
        return $this->hasMany(User::class, 'post_author');
    }
}
