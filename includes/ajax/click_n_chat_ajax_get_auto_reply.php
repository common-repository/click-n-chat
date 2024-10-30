<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function click_n_chat_get_auto_reply_action_handler() {  

	if (!isset($_POST['security']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['security'])), 'ajax-call-nounce')) {
        wp_send_json_error('invalid nonce');
        wp_die();
    }
	
	global $wpdb;
	
	$click_n_chat_setting_popup = get_option('click_n_chat_setting_popup');
	$click_n_chat_setting_autoreply = get_option('click_n_chat_setting_autoreply');
	
	$message = sanitize_textarea_field($_POST['message']);
	$lid = sanitize_textarea_field($_POST['lid']);
	
	$table_name = $wpdb->prefix . 'cnc_auto_reply';
	$default = $wpdb->get_results($wpdb->prepare(
				"SELECT * FROM $table_name where keyword= %s limit 1",
				'default'));
	
	$autoreplies = $wpdb->get_results("SELECT * FROM $table_name");
	$response = (object)click_n_chat_calculate_similarities_auto($autoreplies, $message);
	$autoreply = "";
	if($response->query_similarity >= $click_n_chat_setting_autoreply->matching_percenage  || $response->keyword_similarity >= $click_n_chat_setting_autoreply->matching_percenage)
	{
		$autoreply = $response->reply;
	}
	
	$reply_message = $autoreply != "" ? $autoreply  : $default[0]->reply;
	
	wp_send_json([
        'reply' => $reply_message,
    ]);
}  

function click_n_chat_calculate_similarities_auto($array, $user_keyword) {
    $results = [];

    // Compare each query and keyword with the user_keyword
    foreach ($array as $item) {
		 
        $query_similarity = 0;
        $keyword_similarity = 0;

        // Calculate similarity percentages
        similar_text(strtolower($item->query), strtolower($user_keyword), $query_similarity);
        similar_text(strtolower($item->keyword), strtolower($user_keyword), $keyword_similarity);

        // Add the results to the array
        $results[] = [
            'query' => $item->query,
            'keyword' => $item->keyword,
			'reply' => $item->reply,
            'query_similarity' => $query_similarity,
            'keyword_similarity' => $keyword_similarity
        ];
    }

    // Sort the results by query_similarity and keyword_similarity in descending order
    usort($results, function($a, $b) {
        // Compare by query_similarity first
        if ($a['query_similarity'] == $b['query_similarity']) {
            // If query_similarity is the same, compare by keyword_similarity
            return $b['keyword_similarity'] <=> $a['keyword_similarity'];
        }
        return $b['query_similarity'] <=> $a['query_similarity'];
    });
    return $results[0];
}	
add_action('wp_ajax_click_n_chat_get_auto_reply_action', 'click_n_chat_get_auto_reply_action_handler');  
add_action('wp_ajax_nopriv_click_n_chat_get_auto_reply_action', 'click_n_chat_get_auto_reply_action_handler'); // For non-logged in users  
