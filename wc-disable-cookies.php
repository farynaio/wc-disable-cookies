<?php
/**
 * Plugin Name: WC Disable Cookies
 * Plugin URI: https://github.com/adamfaryna/wc-disable-cookies
 * Description: Wordpress Woocommerce Disable Cookies
 * License: Proprietary
 * Author: Appdy LTD
 * Author URI: https://github.com/adamfaryna
 */

defined( 'ABSPATH' ) or die('No script kiddies please!');

add_action('admin_init', function() {
  if (has_action('admin_init', ['WC_Tracks_Client', 'maybe_set_identity_cookie']) !== false) {
    remove_action('admin_init', ['WC_Tracks_Client', 'maybe_set_identity_cookie']);

  } else {
    error_log(__('WC_Tracks_Client::maybe_set_identity_cookie action is not loaded. I deactivate this plugin.', 'wc-disable-cookies'));
    deactivate_plugins(__FILE__);
  }
}, 1);

?>
