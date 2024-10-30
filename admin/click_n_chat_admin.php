<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

ob_start();

$directory = CLICK_N_CHAT_DIR_PATH . 'admin/ajax/';
$files = glob($directory . '*.php');
foreach ($files as $file) {
    require_once $file;
}

include_once( CLICK_N_CHAT_DIR_PATH . 'admin/includes/click_n_chat_menu.php');




