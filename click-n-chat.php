<?php
/*
Plugin Name: Click n Chat
Plugin URI: http://www.flag92.com/
Description: Chat n Click allows you to connect with website visitors through their favorite social channels by displaying a floating chat icon at the bottom of your site. With features like auto-reply, widget customization, and social user availability, you can ensure seamless communication and enhance visitor engagement across multiple platforms.
Version: 1.0.3
Author: Flag92
Domain Path: /languages
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
 
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
 
define('CLICK_N_CHAT_DIR_PATH', plugin_dir_path(__FILE__));
define('CLICK_N_CHAT_PLUGIN_BASENAME', plugin_basename(__FILE__));
define('CLICK_N_CHAT_DIR_URL', plugin_dir_url(__FILE__));


$directory = CLICK_N_CHAT_DIR_PATH . 'classes/';
$files = glob($directory . '*.php');
foreach ($files as $file) {
    require_once $file;
}

include_once( CLICK_N_CHAT_DIR_PATH . 'admin/click_n_chat_admin.php');

include_once( CLICK_N_CHAT_DIR_PATH . 'includes/click_n_chat_home.php');

include_once( CLICK_N_CHAT_DIR_PATH . 'includes/click_n_chat_activate.php');
register_activation_hook(__FILE__, array(new click_n_chat_activate,'click_n_chat_install'));
register_deactivation_hook(__FILE__, array(new click_n_chat_activate,'click_n_chat_uninstall')); 


