<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!class_exists('click_n_chat_setting_analytics')) {
	class click_n_chat_setting_analytics {
		public $analytic_type = 'GA3';
		public $is_active = '0';
		public $label = 'Google Analytics 3';
		public $category = 'Google Analytics';
    	public $gaid = 'UA-0000000-0';
	}
}