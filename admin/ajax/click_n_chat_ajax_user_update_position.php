<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function click_n_chat_update_user_position_action_handler() {  
    
	if (!isset($_POST['security']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['security'])), 'ajax-call-nounce')) {
        wp_send_json_error('invalid nonce');
        wp_die();
    }
	global $wpdb;
	$orders = array_map('absint', $_POST['order']);
	foreach($orders as $position => $id)
	{
		$table_name = $wpdb->prefix . 'cnc_social_users';
		$wpdb->update(
			$table_name,
			['position' => $position+1],
			['id' => $id]
		);
	}
	
	
	$response = 'Updated';
    wp_send_json_success($response);
}  
add_action('wp_ajax_click_n_chat_update_user_position_action', 'click_n_chat_update_user_position_action_handler');  
add_action('wp_ajax_nopriv_click_n_chat_update_user_position_action', 'click_n_chat_update_user_position_action_handler'); // For non-logged in users  
