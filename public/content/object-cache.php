<?php
/**
 * This file is just copied directly from Wordpress' cache.php with a few changes to how globals are used
 * and method naming, etc.
 */
use Koselig\Proxy\WordpressCache;

/**
 * Adds data to the cache, if the cache key doesn't already exist.
 *
 * @since 2.0.0
 *
 * @see WordpressCache::add()
 * @global WordpressCache $wp_object_cache Object cache global instance.
 *
 * @param int|string $key The cache key to use for retrieval later.
 * @param mixed $data The data to add to the cache.
 * @param string $group Optional. The group to add the cache to. Enables the same key
 *                           to be used across groups. Default empty.
 * @param int $expire Optional. When the cache data should expire, in seconds.
 *                           Default 0 (no expiration).
 * @return bool False if cache key and group already exist, true on success.
 */
function wp_cache_add($key, $data, $group = '', $expire = 0)
{
    return $GLOBALS['wp_object_cache']->add($key, $data, $group, (int)$expire);
}

/**
 * Closes the cache.
 *
 * This function has ceased to do anything since WordPress 2.5. The
 * functionality was removed along with the rest of the persistent cache.
 *
 * This does not mean that plugins can't implement this function when they need
 * to make sure that the cache is cleaned up after WordPress no longer needs it.
 *
 * @since 2.0.0
 *
 * @return true Always returns true.
 */
function wp_cache_close()
{
    return true;
}

/**
 * Decrements numeric cache item's value.
 *
 * @since 3.3.0
 *
 * @see WordpressCache::decr()
 * @global WordpressCache $wp_object_cache Object cache global instance.
 *
 * @param int|string $key The cache key to decrement.
 * @param int $offset Optional. The amount by which to decrement the item's value. Default 1.
 * @param string $group Optional. The group the key is in. Default empty.
 * @return false|int False on failure, the item's new value on success.
 */
function wp_cache_decr($key, $offset = 1, $group = '')
{
    return $GLOBALS['wp_object_cache']->decr($key, $offset, $group);
}

/**
 * Removes the cache contents matching key and group.
 *
 * @since 2.0.0
 *
 * @see WordpressCache::delete()
 * @global WordpressCache $wp_object_cache Object cache global instance.
 *
 * @param int|string $key What the contents in the cache are called.
 * @param string $group Optional. Where the cache contents are grouped. Default empty.
 * @return bool True on successful removal, false on failure.
 */
function wp_cache_delete($key, $group = '')
{
    return $GLOBALS['wp_object_cache']->delete($key, $group);
}

/**
 * Removes all cache items.
 *
 * @since 2.0.0
 *
 * @see WordpressCache::flush()
 * @global WordpressCache $wp_object_cache Object cache global instance.
 *
 * @return bool False on failure, true on success
 */
function wp_cache_flush()
{
    return $GLOBALS['wp_object_cache']->flush();
}

/**
 * Retrieves the cache contents from the cache by key and group.
 *
 * @since 2.0.0
 *
 * @see WordpressCache::get()
 * @global WordpressCache $wp_object_cache Object cache global instance.
 *
 * @param int|string $key The key under which the cache contents are stored.
 * @param string $group Optional. Where the cache contents are grouped. Default empty.
 * @param bool $force Optional. Whether to force an update of the local cache from the persistent
 *                            cache. Default false.
 * @param bool $found Optional. Whether the key was found in the cache. Disambiguates a return of false,
 *                            a storable value. Passed by reference. Default null.
 * @return bool|mixed False on failure to retrieve contents or the cache
 *                      contents on success
 */
function wp_cache_get($key, $group = '', $force = false, &$found = null)
{
    return $GLOBALS['wp_object_cache']->get($key, $group, $force, $found);
}

/**
 * Increment numeric cache item's value
 *
 * @since 3.3.0
 *
 * @see WordpressCache::incr()
 * @global WordpressCache $wp_object_cache Object cache global instance.
 *
 * @param int|string $key The key for the cache contents that should be incremented.
 * @param int $offset Optional. The amount by which to increment the item's value. Default 1.
 * @param string $group Optional. The group the key is in. Default empty.
 * @return false|int False on failure, the item's new value on success.
 */
function wp_cache_incr($key, $offset = 1, $group = '')
{
    return $GLOBALS['wp_object_cache']->incr($key, $offset, $group);
}

/**
 * Sets up Object Cache Global and assigns it.
 *
 * @since 2.0.0
 *
 * @global WordpressCache $wp_object_cache
 */
function wp_cache_init()
{
    $GLOBALS['wp_object_cache'] = new WordpressCache();
}

/**
 * Replaces the contents of the cache with new data.
 *
 * @since 2.0.0
 *
 * @see WordpressCache::replace()
 * @global WordpressCache $wp_object_cache Object cache global instance.
 *
 * @param int|string $key The key for the cache data that should be replaced.
 * @param mixed $data The new data to store in the cache.
 * @param string $group Optional. The group for the cache data that should be replaced.
 *                           Default empty.
 * @param int $expire Optional. When to expire the cache contents, in seconds.
 *                           Default 0 (no expiration).
 * @return bool False if original value does not exist, true if contents were replaced
 */
function wp_cache_replace($key, $data, $group = '', $expire = 0)
{
    return $GLOBALS['wp_object_cache']->replace($key, $data, $group, (int)$expire);
}

/**
 * Saves the data to the cache.
 *
 * Differs from wp_cache_add() and wp_cache_replace() in that it will always write data.
 *
 * @since 2.0.0
 *
 * @see WordpressCache::set()
 * @global WordpressCache $wp_object_cache Object cache global instance.
 *
 * @param int|string $key The cache key to use for retrieval later.
 * @param mixed $data The contents to store in the cache.
 * @param string $group Optional. Where to group the cache contents. Enables the same key
 *                           to be used across groups. Default empty.
 * @param int $expire Optional. When to expire the cache contents, in seconds.
 *                           Default 0 (no expiration).
 * @return bool False on failure, true on success
 */
function wp_cache_set($key, $data, $group = '', $expire = 0)
{
    return $GLOBALS['wp_object_cache']->set($key, $data, $group, (int) $expire);
}

/**
 * Switches the internal blog ID.
 *
 * This changes the blog id used to create keys in blog specific groups.
 *
 * @since 3.5.0
 *
 * @see WordpressCache::switch_to_blog()
 * @global WordpressCache $wp_object_cache Object cache global instance.
 *
 * @param int $blog_id Site ID.
 */
function wp_cache_switch_to_blog($blog_id)
{
    $GLOBALS['wp_object_cache']->switchBlog($blog_id);
}

/**
 * Adds a group or set of groups to the list of global groups.
 *
 * @since 2.6.0
 *
 * @see WordpressCache::add_global_groups()
 * @global WordpressCache $wp_object_cache Object cache global instance.
 *
 * @param string|array $groups A group or an array of groups to add.
 */
function wp_cache_add_global_groups($groups)
{
    $GLOBALS['wp_object_cache']->addGlobalGroups($groups);
}

/**
 * Adds a group or set of groups to the list of non-persistent groups.
 *
 * @since 2.6.0
 *
 * @param string|array $groups A group or an array of groups to add.
 */
function wp_cache_add_non_persistent_groups($groups)
{
    $GLOBALS['wp_object_cache']->addNonPersistentGroups($groups);
}
