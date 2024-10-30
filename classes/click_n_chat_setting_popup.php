<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!class_exists('click_n_chat_setting_popup')) {
	class click_n_chat_setting_popup {
		public $title = 'Need Help? Just Click';
		public $header_padding = '15';
    	public $bg_color = 'linear-gradient(90deg, rgba(84,207,96,1) 0%, rgba(68,197,84,1) 35%, rgba(45,184,66,1) 100%)';
		public $txt_color = '#FFFFFF';
		public $border_style = '0px 0px 20px 0px';
		public $pop_type = 'socialwidgets';
		public $pop_up_icon = CLICK_N_CHAT_DIR_URL . 'assets/images/cnccalliconw.png';
		public $pop_up_style = 'wgs1';
	}
}