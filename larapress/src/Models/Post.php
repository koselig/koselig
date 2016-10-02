<?php
namespace JordanDoyle\Larapress\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Table containing all the items within the CMS.
 *
 * @author Jordan Doyle <jordan@doyle.wf>
 */
class Post extends Model
{
    public $table = DB_PREFIX . 'posts';
    public $primaryKey = 'ID';

    /**
     * Get all the meta values that belong to this post.
     *
     * @return HasMany
     */
    public function meta()
    {
        return $this->hasMany(Meta::class);
    }

    /**
     * Get the author that this post belongs to.
     *
     * @return BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'post_author');
    }
}
