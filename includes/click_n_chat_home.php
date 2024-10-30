<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

ob_start();

$click_n_chat_is_enable = get_option('click_n_chat_is_enable');

if($click_n_chat_is_enable == "1"){
	$directory = CLICK_N_CHAT_DIR_PATH . 'includes/ajax/';
	$files = glob($directory . '*.php');
	foreach ($files as $file) {
		require_once $file;
	}
	include_once( CLICK_N_CHAT_DIR_PATH . 'includes/parts/click_n_chat_popup.php');
	include_once( CLICK_N_CHAT_DIR_PATH . 'includes/parts/click_n_chat_analytics.php');
}

