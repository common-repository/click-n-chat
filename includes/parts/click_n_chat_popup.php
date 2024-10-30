<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!class_exists('click_n_chat_admin')) {
	class click_n_chat_popup {
	   public function __construct() {
		  add_action('wp_footer', array( $this, 'popup' ) );
		  add_action('wp_enqueue_scripts', array($this, 'click_n_chat_enqueue_styles'));
	  }
	   
	  function popup() {
			$chat_icon_wp_url = CLICK_N_CHAT_DIR_URL . 'assets/images/whatsapp.png';
			$click_n_chat_setting_popup = get_option('click_n_chat_setting_popup');
			$click_n_chat_time_zone = get_option('click_n_chat_time_zone');
			$chat_icon_url = $click_n_chat_setting_popup->click_url_type == "whatsapp" ? CLICK_N_CHAT_DIR_URL . 'assets/images/whatsapp.png' :  CLICK_N_CHAT_DIR_URL . 'assets/images/chaticon.png';
			
			$day_of_week = $this->click_n_chat_get_current_day_in_timezone($click_n_chat_time_zone);
			$current_time = $this->click_n_chat_get_current_time_in_timezone($click_n_chat_time_zone);
			$users = $this->click_n_chat_get_available_agents($day_of_week,$current_time);
			
			$userCounts = sizeof($users);
			?>
			
             
            <div style="display:<?php echo esc_attr($userCounts==0 && $click_n_chat_setting_popup->pop_type == "socialwidgets" ? 'none' : 0) ?>" data-header="<?php echo esc_html($click_n_chat_setting_popup->bg_color); ?>" id="cnc-chatbot-icon">
                <img id="cnc-chatbot-icon-img" style="border-radius:50%; background:<?php echo esc_html($click_n_chat_setting_popup->bg_color); ?>" src="<?php echo esc_html($click_n_chat_setting_popup->pop_up_icon); ?>" alt="Chat">
            </div>
            
        
            <div id="cnc-chatbot-popup" style="display:none; max-width:<?php echo esc_html($click_n_chat_setting_popup->popup_width); ?>; width:25%; <?php echo esc_html($click_n_chat_setting_popup->show_header == "0" ? "border-radius:5px 5px 5px 5px" : ""); ?>">
                <input type="hidden" name="lid" id="lid" />
                <div class="cnc-chatbot-popup-header" style="background:<?php echo esc_html($click_n_chat_setting_popup->bg_color); ?>; border-radius:<?php echo esc_html($click_n_chat_setting_popup->border_style); ?>; padding:<?php echo esc_html($click_n_chat_setting_popup->header_padding); ?>px;">
                    <h1 class="cnc-text-header" style="font-size:20px; color:<?php echo esc_html($click_n_chat_setting_popup->txt_color); ?>"><?php echo esc_html($click_n_chat_setting_popup->title); ?></h1>
                    <a href="javascript:void(0)" id="closeImage"><img style="top:3px;right:5px;position: absolute;opacity: 100%;" width="35px" height="35px;" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL . 'assets/images/closeiconw.png'); ?>" /></a>
                </div>
                
                <?php 
                if($click_n_chat_setting_popup->pop_type == "socialwidgets"){
                ?>
                    
                    <div id="<?php echo esc_html($click_n_chat_setting_popup->pop_up_style); ?>-cnc-widget" style="height: auto; overflow-y: auto;">
                        <?php foreach ($users as $user) : 
                            $click_url = $this->click_n_chat_click_url($user);
                        ?>
                        
                        <a class="<?php echo esc_html($click_n_chat_setting_popup->pop_up_style); ?>-cnc-widget-link" href="<?php echo esc_html($click_url); ?>" target="_blank">
                        <div class="<?php echo esc_html($click_n_chat_setting_popup->pop_up_style); ?>-cnc-widget-container">
                            <div class="<?php echo esc_html($click_n_chat_setting_popup->pop_up_style); ?>-cnc-widget-item">
                                <div class="<?php echo esc_html($click_n_chat_setting_popup->pop_up_style); ?>-cnc-widget-icon-div">
                                    <img src="<?php echo esc_html(esc_url($user->user_icon)); ?>" class="<?php echo esc_html($click_n_chat_setting_popup->pop_up_style); ?>-cnc-widget-icon">
                                </div>
                                <div class="<?php echo esc_html($click_n_chat_setting_popup->pop_up_style); ?>-cnc-widget-details">
                                    <p class="<?php echo esc_html($click_n_chat_setting_popup->pop_up_style); ?>-cnc-widget-designation"><?php echo esc_html(($user->designation)); ?></p>
                                    <h3 class="<?php echo esc_html($click_n_chat_setting_popup->pop_up_style); ?>-cnc-widget-name"><?php echo esc_html(($user->name)); ?></h3>
                                    <p class="<?php echo esc_html($click_n_chat_setting_popup->pop_up_style); ?>-cnc-widget-description"><?php echo esc_html($user->description); ?></p>
                                </div>
                            </div>
                        </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                <?php
                }else{
                ?>
                    
                    <div class="cnc-chat-container">   
                        
                        <div class="cnc-chat-body">  
                            <div class="cnc-chat-messages" style="display:none">
                                <div class="cnc-loading-chat" style="display:none">
                                <img src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL . 'assets/images/loading.gif'); ?>" width="40px" sty alt="Chat">
                                </div>
                            </div> 
                        </div>  
                        
                        <div class="cnc-chat-footer" style="">  
                            <textarea type="text" placeholder="Type a message" class="chat-input" style="height:30px"></textarea>  
                            <button class="cnc-chat-send" style="background:<?php echo esc_html($click_n_chat_setting_popup->bg_color); ?>;">
                                <svg fill="#FFFFFF" version="1.1" xmlns="http://www.w3.org/2000/svg" 
                                     width="10" height="10" viewBox="0 0 8 8" enable-background="new 0 0 8 8" xml:space="preserve">
                                <rect x="0.016" y="1.68" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 6.2428 2.2389)" width="5.283" height="1.466"/>
                                <rect x="3.161" y="1.604" width="1.683" height="6.375"/>
                                <rect x="2.709" y="1.674" transform="matrix(0.7073 0.7069 -0.7069 0.7073 3.2674 -3.0786)" width="5.284" height="1.465"/>
                                </svg>
                            </button>  
                            
                        </div>  
                    </div>  
                <?php
                }
                ?>
                <center style="color:#000; font-size:11px;"><a target="_blank" style="text-decoration:none" href="https://www.flag92.com">Powered by Flag92</a></center>
            </div>
            <div id="click_n_chat_greetings_message" style="display:none"><?php print wp_kses_post(stripslashes(html_entity_decode(get_option('click_n_chat_greetings_message')))) ?></div>
			<?php
		}
		
		function click_n_chat_click_url($user)
		{
			switch($user->social_type)
			{
				case 'whatsapp':
					return "https://wa.me/".str_replace("+", "",$user->cnc_social_id)."?text=".urlencode($user->welcome_message);
				break;
				case 'telegram':
					return "https://telegram.me/".$user->cnc_social_id."?text=".urlencode($user->welcome_message);
				break;
				case 'fb_messenger':
					return $user->cnc_social_id;
				break;
				case 'x':
					return "https://twitter.com/".$user->cnc_social_id;
				break;
				case 'skype':
					return "skype:".$user->cnc_social_id."?chat";
				break;
				case 'instagram':
					return "https://www.instagram.com/".$user->cnc_social_id;
				break;
				case 'snapchat':
					return "https://www.snapchat.com/add/".$user->cnc_social_id;
				break;
				case 'viber':
					return "viber://chat?number=".$user->cnc_social_id;
				break;
				case 'line':
					return $user->cnc_social_id;
				break;
				case 'email':
					return "mailto:".$user->cnc_social_id;
				break;
				case 'sms':
					return "sms:".$user->cnc_social_id;
				break;
				case 'gmap':
					return $user->cnc_social_id;
				break;
				case 'tiktok':
					return "https://www.tiktok.com/".$user->cnc_social_id;
				break;
				case 'slack':
					return $user->cnc_social_id;
				break;
				case 'linkedin':
					return "https://www.linkedin.com/in/".$user->cnc_social_id;
				break;
				case 'vk':
					return "https://vk.me/".$user->cnc_social_id;
				break;
			}
		}
		
		function click_n_chat_enqueue_styles() {
			$theme_version = wp_get_theme()->get('Version');
			wp_enqueue_style('cnc-script-style', CLICK_N_CHAT_DIR_URL .'assets/css/style.css', array(), $theme_version);
			wp_enqueue_script('cnc-script-script', CLICK_N_CHAT_DIR_URL . 'assets/js/script.js', array('jquery'), $theme_version, true); 
			wp_enqueue_script('cnc-script-script-slimscroll', CLICK_N_CHAT_DIR_URL . 'assets/js/jquery.slimscroll.min.js', array('jquery'), '1.0', true);  
			$click_n_chat_setting_popup = get_option('click_n_chat_setting_popup');
			$ajax_data = array(  
				'ajax_url' => admin_url('admin-ajax.php'),  
				'nonce'    => wp_create_nonce( 'ajax-call-nounce' ), 
				'plugin_url' => CLICK_N_CHAT_DIR_URL,
				'auto_reply_method' => 'click_n_chat_get_auto_reply_action',
			);  		
			wp_localize_script('cnc-script-script', 'click_n_chat_ajax_object ', $ajax_data);  
		}
		
		function click_n_chat_get_available_agents($day_of_week, $current_time) {
			global $wpdb;
			$query = $wpdb->prepare(
				"SELECT u.* 
				FROM {$wpdb->prefix}cnc_social_users u
				LEFT JOIN {$wpdb->prefix}cnc_social_user_schedule s ON u.id = s.social_user_id
				WHERE s.day_of_week = %s 
				AND s.start_time <= %s 
				AND s.end_time >= %s
				AND u.status = '1'
				GROUP BY u.id
				ORDER BY u.position",
				$day_of_week, $current_time, $current_time, '1'
			);
		
			return $wpdb->get_results($query);
		}
		
		function click_n_chat_get_current_time_in_timezone($timezone) {
			try {
				$datetime = new DateTime('now', new DateTimeZone($timezone));
				return $datetime->format('H:i:s');
			} catch (Exception $e) {
				return gmdate('H:i:s');
			}
		}
		
		function click_n_chat_get_current_day_in_timezone($timezone) {
			try {
				$datetime = new DateTime('now', new DateTimeZone($timezone));
				return $datetime->format('l');
			} catch (Exception $e) {
				return gmdate('l');
			}
		}
	}
	
	new click_n_chat_popup();
}