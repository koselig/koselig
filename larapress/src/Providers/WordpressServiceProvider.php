<?php

namespace JordanDoyle\Larapress\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

/**
 * Service provider for everything Wordpress, configures
 * everything that needs configuring then boots the backend
 * of Wordpress.
 *
 * @author Jordan Doyle <jordan@doyle.wf>
 */
class WordpressServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function register()
    {
        // get the path wordpress is installed in
        define('WP_PATH',
            json_decode(file_get_contents(base_path('composer.json')), true)['extra']['wordpress-install-dir'] . '/');

        $this->setConfig();
        $this->triggerHooks();

        // Set up the WordPress query.
        wp();
    }

    /**
     * Set up the configuration values that wp-config.php
     * does. Use all the values out of .env instead.
     *
     * @return void
     */
    protected function setConfig()
    {
        $table_prefix = 'wp_';

        $db = DB::getConfig(null);

        define('DB_NAME', $db['database']);
        define('DB_USER', $db['username']);
        define('DB_PASSWORD', $db['password']);
        define('DB_HOST', $db['host']);
        define('DB_CHARSET', $db['charset']);
        define('DB_COLLATE', $db['collation']);

        define('AUTH_KEY', config('app.auth_key'));
        define('SECURE_AUTH_KEY', config('app.secure_auth_key'));
        define('LOGGED_IN_KEY', config('app.logged_in_key'));
        define('NONCE_KEY', config('app.nonce_key'));
        define('AUTH_SALT', config('app.auth_salt'));
        define('SECURE_AUTH_SALT', config('app.secure_auth_salt'));
        define('LOGGED_IN_SALT', config('app.logged_in_salt'));
        define('NONCE_SALT', config('app.nonce_salt'));

        define('WP_DEBUG', config('app.debug'));
        define('SAVEQUERIES', WP_DEBUG);
        define('WP_DEBUG_DISPLAY', WP_DEBUG);
        define('SCRIPT_DEBUG', WP_DEBUG);

        define('DISALLOW_FILE_EDIT', true);

        if (!defined('ABSPATH')) {
            define('ABSPATH', base_path(WP_PATH));
        }

        define('WP_SITEURL', url(str_replace('public/', '', WP_PATH)));
        define('WP_HOME', url('/'));

        define('WP_CONTENT_DIR', base_path('public/content'));
        define('WP_CONTENT_URL', url('content'));

        if (App::runningInConsole()) {
            $_SERVER['SERVER_PROTOCOL'] = 'https';
        }

        require ABSPATH . 'wp-settings.php';
    }

    /**
     * Wordpress core hooks needed for the main functionality of
     * Larapress.
     *
     * @return void
     */
    protected function triggerHooks()
    {
        add_filter('theme_page_templates', function ($page_templates) {
            return array_merge($page_templates, config('templates'));
        });
    }
}
