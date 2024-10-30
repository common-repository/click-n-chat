<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function click_n_chat_update_matching_percenage_action_handler() {  
    
	if (!isset($_POST['security']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['security'])), 'ajax-call-nounce')) {
        wp_send_json_error('invalid nonce');
        wp_die();
    }
	
	$click_n_chat_setting_autoreply = new click_n_chat_setting_autoreply();
	$click_n_chat_setting_autoreply->matching_percenage = sanitize_text_field($_POST['matching_percenage']);
	
	update_option('click_n_chat_setting_autoreply', $click_n_chat_setting_autoreply);
	
	$response = 'Updated';
    wp_send_json_success($response);
}  
add_action('wp_ajax_click_n_chat_update_matching_percenage_action', 'click_n_chat_update_matching_percenage_action_handler');  
add_action('wp_ajax_nopriv_click_n_chat_update_matching_percenage_action', 'click_n_chat_update_matching_percenage_action_handler'); // For non-logged in users  
