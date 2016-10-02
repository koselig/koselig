<?php
/**
 * Disable the frontend of the site.
 *
 * PLEASE DO NOT USE WORDPRESS TEMPLATES WHEN USING LARAPRESS.
 *
 * @author Jordan Doyle <jordan@doyle.wf>
 */
wp_redirect(site_url('wp-admin/'));
exit;
