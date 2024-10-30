<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!class_exists('click_n_chat_activate')) {
	class click_n_chat_activate {
	   function click_n_chat_install() {
			global $wpdb; 
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php'); 
			
			$table_name = $wpdb->prefix . 'cnc_social_users';
			$charset_collate = $wpdb->get_charset_collate();
		
			$sql = "CREATE TABLE $table_name (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				position mediumint(9) DEFAULT '1',
				name tinytext NOT NULL,
				cnc_social_id varchar(255),
				social_type varchar(50),
				user_icon varchar(255),
				designation varchar(50),
				description varchar(250),
				welcome_message varchar(250),
				status char(1) DEFAULT '1',
				PRIMARY KEY  (id)
			) $charset_collate;";
			dbDelta($sql);
			
			$table_name = $wpdb->prefix . 'cnc_social_user_schedule';
			$charset_collate = $wpdb->get_charset_collate();
		
			$sql = "CREATE TABLE $table_name (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				social_user_id mediumint(9) NOT NULL,
				day_of_week ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday') NOT NULL,
				start_time TIME NOT NULL,
				end_time TIME NOT NULL,
				FOREIGN KEY (social_user_id) REFERENCES wp_cnc_social_users(id) ON DELETE CASCADE,
				PRIMARY KEY  (id)
			) $charset_collate;";
			dbDelta($sql);
			
			$table_name = $wpdb->prefix . 'cnc_auto_reply';
			$charset_collate = $wpdb->get_charset_collate();
		
			$sql = "CREATE TABLE $table_name (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				query tinytext NOT NULL,
				keyword tinytext NOT NULL,
				reply text NOT NULL,
				PRIMARY KEY  (id)
			) $charset_collate;";
		
			dbDelta($sql);
			
			$wpdb->insert(
				$table_name,
				[
				 	'query' => 'Hi, how are you?',
					'keyword' => 'Hi',
					'reply' => 'Welcome to Click n Chat'
				]
			);
			$wpdb->insert(
				$table_name,
				[
				 	'query' => 'default',
					'keyword' => 'default',
					'reply' => 'This message will be sent by default when no match is found in the autoreply.'
				]
			);
			
			$click_n_chat_setting_popup = new click_n_chat_setting_popup();
			update_option('click_n_chat_setting_popup', $click_n_chat_setting_popup);
			$click_n_chat_setting_analytics = new click_n_chat_setting_analytics();
			update_option('click_n_chat_setting_analytics', $click_n_chat_setting_analytics);
			update_option('click_n_chat_premium', false);
			update_option('click_n_chat_greetings_message', 'Welcome to <a href="https://flag92.com/">Click n Chat</a>');
			update_option('click_n_chat_time_zone', 'UTC');
			update_option('click_n_chat_is_enable', '1');
			update_option('click_n_chat_limit', '3');
	   }
	   
	   function click_n_chat_uninstall() {
			global $wpdb;
			$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}cnc_social_user_schedule");
        	$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}cnc_social_users");
			$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}cnc_auto_reply");
			delete_option('click_n_chat_setting_popup');
			delete_option('click_n_chat_greetings_message');
			delete_option('click_n_chat_setting_analytics');
			delete_option('click_n_chat_is_enable');
			delete_option('click_n_chat_premium');
	   }

	}
	
	new click_n_chat_activate();
}