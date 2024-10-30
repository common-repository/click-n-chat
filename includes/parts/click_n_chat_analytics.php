<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!class_exists('click_n_chat_analytics')) {
	class click_n_chat_analytics {
		public function __construct() {
			add_action('wp_enqueue_scripts', array($this, 'click_n_chat_analytics_scripts'));
		}
		
		function click_n_chat_analytics_scripts() {
			 $click_n_chat_setting_analytics = get_option('click_n_chat_setting_analytics');
			 if($click_n_chat_setting_analytics->is_active == "1")
			 {
				if($click_n_chat_setting_analytics->analytic_type == "GA3")
				{
					wp_enqueue_script('cnc-script-analytics', CLICK_N_CHAT_DIR_URL . 'assets/js/ga.js', array('jquery'), '1.0', true);
					wp_add_inline_script('cnc-script-analytics', "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
					  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
					  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
					  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
					
					  ga('create', '".$click_n_chat_setting_analytics->gaid."', 'auto');
					  ga('send', 'pageview');
					  var cncanalytics = function(){
							ga('send', 'event', {
								eventCategory: '".$click_n_chat_setting_analytics->category."',
								eventAction: 'click',
								eventLabel: '".$click_n_chat_setting_analytics->label."',
								eventValue: 1
							});
						}
					  ");
				}
				else
				{			
					
					wp_enqueue_script('cnc-script-analytics', 'https://www.googletagmanager.com/gtag/js?id=G-FN7L1XZ4TC', '1.0', true);
					wp_add_inline_script('cnc-script-analytics', "window.dataLayer = window.dataLayer || [];
                      function gtag(){dataLayer.push(arguments);}
                      gtag('js', new Date());
                
                      gtag('config', '".$click_n_chat_setting_analytics->gaid."');
					  
					  var cncanalytics = function(){
						gtag('event', 'click', {
							'event_category': '".$click_n_chat_setting_analytics->category."',
							'event_label': '".$click_n_chat_setting_analytics->label."',
							'value': 1
						});
					}");
				}
				
			 }
		}
	}
	
	new click_n_chat_analytics();
}