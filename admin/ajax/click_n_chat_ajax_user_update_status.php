<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function click_n_chat_update_user_status_action_handler() {  
    
	if (!isset($_POST['security']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['security'])), 'ajax-call-nounce')) {
        wp_send_json_error('invalid nonce');
        wp_die();
    }
	global $wpdb;
	$status = sanitize_text_field($_POST['status']);
	$datacolumn = sanitize_text_field($_POST['datacolumn']);
	$table_name = $wpdb->prefix . 'cnc_social_users';
	$uid = intval($_POST['uid']);
	$wpdb->update(
		$table_name,
		[$datacolumn => $status],
		['id' => $uid]
	);
	
	$response = 'Updated';
    wp_send_json_success($response);
}  
add_action('wp_ajax_click_n_chat_update_user_status_action', 'click_n_chat_update_user_status_action_handler');  
add_action('wp_ajax_nopriv_click_n_chat_update_user_status_action', 'click_n_chat_update_user_status_action_handler'); // For non-logged in users  
