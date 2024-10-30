<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function click_n_chat_setting() {
	global $wpdb;
	$nonce = 'setting-user';
	$gradient_colors = array(
		'linear-gradient(90deg, rgba(255,87,51,1) 0%, rgba(255,102,77,1) 35%, rgba(255,87,51,1) 100%)', // #FF5733
		'linear-gradient(90deg, rgba(51,255,87,1) 0%, rgba(77,255,102,1) 35%, rgba(51,255,87,1) 100%)', // #33FF57
		'linear-gradient(90deg, rgba(51,87,255,1) 0%, rgba(77,102,255,1) 35%, rgba(51,87,255,1) 100%)', // #3357FF
		'linear-gradient(90deg, rgba(255,51,161,1) 0%, rgba(255,102,204,1) 35%, rgba(255,51,161,1) 100%)', // #FF33A1
		'linear-gradient(90deg, rgba(51,255,161,1) 0%, rgba(77,255,204,1) 35%, rgba(51,255,161,1) 100%)', // #33FFA1
		'linear-gradient(90deg, rgba(161,51,255,1) 0%, rgba(204,77,255,1) 35%, rgba(161,51,255,1) 100%)', // #A133FF
		'linear-gradient(90deg, rgba(255,161,51,1) 0%, rgba(255,204,77,1) 35%, rgba(255,161,51,1) 100%)', // #FFA133
		'linear-gradient(90deg, rgba(51,161,255,1) 0%, rgba(77,204,255,1) 35%, rgba(51,161,255,1) 100%)', // #33A1FF
		'linear-gradient(90deg, rgba(255,87,51,1) 0%, rgba(255,102,77,1) 35%, rgba(255,87,51,1) 100%)', // #FF5733
		'linear-gradient(90deg, rgba(87,255,51,1) 0%, rgba(102,255,77,1) 35%, rgba(87,255,51,1) 100%)', // #57FF33
		'linear-gradient(90deg, rgba(87,51,255,1) 0%, rgba(102,77,255,1) 35%, rgba(87,51,255,1) 100%)', // #5733FF
		'linear-gradient(90deg, rgba(161,255,51,1) 0%, rgba(204,255,77,1) 35%, rgba(161,255,51,1) 100%)', // #A1FF33
		'linear-gradient(90deg, rgba(255,51,255,1) 0%, rgba(255,102,255,1) 35%, rgba(255,51,255,1) 100%)', // #FF33FF
		'linear-gradient(90deg, rgba(51,255,181,1) 0%, rgba(77,255,204,1) 35%, rgba(51,255,181,1) 100%)', // #33FFB5
		'linear-gradient(90deg, rgba(255,181,51,1) 0%, rgba(255,204,77,1) 35%, rgba(255,181,51,1) 100%)', // #FFB533
		'linear-gradient(90deg, rgba(255,51,55,1) 0%, rgba(255,102,77,1) 35%, rgba(255,51,55,1) 100%)', // #FF3357
		'linear-gradient(90deg, rgba(87,51,255,1) 0%, rgba(102,77,255,1) 35%, rgba(87,51,255,1) 100%)', // #5733FF
		'linear-gradient(90deg, rgba(84,207,96,1) 0%, rgba(68,197,84,1) 35%, rgba(45,184,66,1) 100%)', // #6699ff
		'linear-gradient(90deg, rgba(255,131,51,1) 0%, rgba(255,165,77,1) 35%, rgba(255,131,51,1) 100%)', // #FF8333
		'linear-gradient(90deg, rgba(51,131,255,1) 0%, rgba(77,165,255,1) 35%, rgba(51,131,255,1) 100%)', // #3383FF
		'linear-gradient(90deg, rgba(199,0,57,1) 0%, rgba(255,51,102,1) 35%, rgba(199,0,57,1) 100%)', // #C70039
		'linear-gradient(90deg, rgba(255,195,0,1) 0%, rgba(255,215,77,1) 35%, rgba(255,195,0,1) 100%)', // #FFC300
		'linear-gradient(90deg, rgba(144,12,63,1) 0%, rgba(183,51,102,1) 35%, rgba(144,12,63,1) 100%)', // #900C3F
		'linear-gradient(90deg, rgba(218,247,166,1) 0%, rgba(238,255,188,1) 35%, rgba(218,247,166,1) 100%)', // #DAF7A6
		'linear-gradient(90deg, rgba(88,24,69,1) 0%, rgba(118,34,84,1) 35%, rgba(88,24,69,1) 100%)', // #581845
		'linear-gradient(90deg, rgba(46,134,193,1) 0%, rgba(77,164,208,1) 35%, rgba(46,134,193,1) 100%)', // #2E86C1
		'linear-gradient(90deg, rgba(40,180,99,1) 0%, rgba(60,200,120,1) 35%, rgba(40,180,99,1) 100%)', // #28B463
	);
	$background_colors = array(
		'#FF5733', '#33FF57', '#6699ff', '#FF33A1', '#33FFA1',
		'#A133FF', '#FFA133', '#33A1FF', '#DD5733', '#57FF33',
		'#5733FF', '#A1FF33', '#FF33FF', '#33FFB5', '#FFB533',
		'#FF3357', '#5733FF', '#33FF83', '#FF8333', '#3383FF',
		'#C70039', '#FFC300', '#900C3F', '#DAF7A6', '#581845',
		'#2E86C1', '#1e1e1e'
	);
	$text_colors = array(
		'#FFFFFF', '#000000'
	);
    if (isset($_POST['action'])) {
		if (  ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), $nonce) ) {
			 die( 'Security check' ); 
		} 
		
		$click_n_chat_setting_popup_old = get_option('click_n_chat_setting_popup');
		
		$click_n_chat_setting_popup = new click_n_chat_setting_popup();
		
		$click_n_chat_setting_popup->title = sanitize_text_field($_POST['popup_title']);
		$click_n_chat_setting_popup->header_padding = sanitize_text_field($_POST['header_padding']);
		$click_n_chat_setting_popup->bg_color = sanitize_text_field($_POST['bg_color']);
		$click_n_chat_setting_popup->txt_color = sanitize_text_field($_POST['txt_color']);
		$click_n_chat_setting_popup->border_style = sanitize_text_field($_POST['border_style']);
		$click_n_chat_setting_popup->pop_type = sanitize_text_field($_POST['pop_type']);
		$click_n_chat_setting_popup->pop_up_style = sanitize_text_field($_POST['pop_up_style']);
		$click_n_chat_setting_popup->pop_up_icon = sanitize_text_field($_POST['pop_up_icon']);
		
		$click_n_chat_time_zone = sanitize_text_field($_POST['click_n_chat_time_zone']);
		update_option('click_n_chat_time_zone', $click_n_chat_time_zone);
		
		update_option('click_n_chat_setting_popup', $click_n_chat_setting_popup);
		
		update_option('click_n_chat_greetings_message', sanitize_text_field(htmlentities($_POST['click_n_chat_greetings_message'])));
		
		update_option('click_n_chat_is_enable', sanitize_text_field($_POST['click_n_chat_is_enable']) == "on" ? 1 : 0);
			
	}
    $table_name = $wpdb->prefix . 'cnc_social_users';
	
	$click_n_chat_setting_popup = get_option('click_n_chat_setting_popup');
	$click_n_chat_greetings_message = get_option('click_n_chat_greetings_message');
	$click_n_chat_time_zone = get_option('click_n_chat_time_zone');
	$click_n_chat_is_enable = get_option('click_n_chat_is_enable');
 
	
	$pop_up_style = $click_n_chat_setting_popup->pop_up_style;
?>

<form id="userForm" method="post" enctype="multipart/form-data">
	<?php wp_nonce_field($nonce, '_wpnonce'); ?>
    <input type="hidden" name="action" value="setting">
    <table>
        <tr>
            <td><label for="name">Enable Click n Chat Plugin? </label></td>
            <td>
                <label class="cnc-switch">
                    <input name="click_n_chat_is_enable" id="click_n_chat_is_enable" class="click_n_chat_is_enable" type="checkbox" <?php echo esc_html(($click_n_chat_is_enable == "1" ? "checked" : ""));  ?> >
                    <span class="cns-switch-slider"></span>
                </label>
            </td>
        </tr>
    </table>
    <br />
    <div class="cont">
        <!-- Horizontal Navigation Tabs -->
        <ul class="nav nav-tabs" id="sTab" role="tablist">
            <li class="nav-item nav-item-setting" role="presentation">
                <button class="nav-link nav-link-setting active" id="popup-tab" data-bs-toggle="tab" data-bs-target="#popup" type="button" role="tab" aria-controls="popup" aria-selected="true">Popup</button>
            </li>
            <li class="nav-item nav-item-setting" role="presentation">
                <button class="nav-link nav-link-setting" id="widget-tab" data-bs-toggle="tab" data-bs-target="#widget" type="button" role="tab" aria-controls="widget" aria-selected="false">Widget</button>
            </li>
            <li class="nav-item  nav-item-setting" role="presentation">
                <button class="nav-link nav-link-setting" id="chat-tab" data-bs-toggle="tab" data-bs-target="#chat" type="button" role="tab" aria-controls="chat" aria-selected="false">Chat</button>
            </li>
             
        </ul>
    
        <!-- Tab Content -->
        <div class="tab-content" id="sContent" style="border:0px; padding-top:0px">
            <div class="tab-pane fade show active" id="popup" role="tabpanel" aria-labelledby="popup-tab">
                <table class="form-table">
                    <tr>
                        <th colspan="3" align="center">Popup Header <hr /></th>
                    </tr>
                    <tr>
                        <th><label for="name">Show Popup Header:</label></th>
                        <td>
                        	<label class="cnc-switch cnc-pro-label">
                                <input name="show_header" id="show_header" class="cnc-user-status" type="checkbox" checked disabled="disabled">
                                <span class="cns-switch-slider"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="name">Title:</label></th>
                        <td><input name="popup_title" type="text" id="popup_title" class="regular-text cnc-header-info" value="<?php echo esc_html($click_n_chat_setting_popup->title);  ?>" placeholder="Flag92" ></td>
                        <td rowspan="5" valign="top">                    
                            <div id="cnc-chatbot-popup">
                                <div>
                                    <div class="cnc-chatbot-popup-header" style="background:<?php echo esc_html($click_n_chat_setting_popup->bg_color);  ?>; border-radius:<?php echo esc_html($click_n_chat_setting_popup->border_style);  ?>;padding:<?php echo esc_html($click_n_chat_setting_popup->header_padding);  ?>px">
                                        <h1 class="cnc-text-header" style="font-size:20px; color:<?php echo esc_html($click_n_chat_setting_popup->txt_color);  ?>;"><?php echo esc_html($click_n_chat_setting_popup->title);  ?></h1>
                                    </div>
                                </div>
                                <div id="<?php echo esc_html($pop_up_style);  ?>-cnc-widget" style="height: auto; overflow-y: auto;">
                                   <!-- <a class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-link" href="#">
                                    <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-container">
                                        <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-item">
                                            <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-icon-div">
                                                <img src="<?php echo esc_html((CLICK_N_CHAT_DIR_URL . 'assets/images/call-icon1.png'));  ?>" class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-icon">
                                            </div>
                                            <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-details">
                                                <p class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-designation">Support</p>
                                                <h3 class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-name">John Doe</h3>
                                                <p class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-description">Available</p>
                                            </div>
                                        </div>
                                    </div>
                                    </a>-->
                                </div>
                                <br />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="keyword">Header Padding</label> </th>
                        <td>
                            <input type="range" class="form-rangs customRange" value="<?php echo esc_html($click_n_chat_setting_popup->header_padding);  ?>" min="1" max="20" step="1" name="header_padding" id="header_padding" data-span="headerPaddingRangeValue">
                            <b><span id="headerPaddingRangeValue"><?php echo esc_html($click_n_chat_setting_popup->header_padding);  ?></span>%</b>
                       </td>     
                    </tr>
                    <tr>
                        <th><label for="name">Background Color:</label></th>
                        <td>
                            <div class="cnc-color-options cnc-radio-group">
                                <?php
                                foreach ($background_colors as $color) {
								?>
                                    <label class="cnc-color-options-label">
                                    <input type="radio" <?php echo  ($click_n_chat_setting_popup->bg_color == esc_attr($color) ? "checked" : ""); ?> class="cnc-header-info" name="bg_color" value="<?php echo esc_attr($color) ?>">
                                    <span class="cnc-color-box cnc-checkpoint" style="background:<?php echo esc_attr($color) ?>;"></span><span class="cnc-checkmark">&#10003;</span>
                                    </label>
                                <?php
                                }
                                foreach ($gradient_colors as $color) {
								?>
                                    <label class="cnc-color-options-label">
                                    <input type="radio" <?php echo esc_attr($click_n_chat_setting_popup->bg_color == esc_attr($color) ? "checked" : ""); ?> class="cnc-header-info" name="bg_color" value="<?php echo esc_attr($color) ?>">
                                    <span class="cnc-color-box cnc-checkpoint" style="background:<?php echo esc_attr($color) ?>;"></span><span class="cnc-checkmark">&#10003;</span>
                                    </label>
                                <?php
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="name">Text Color:</label></th>
                        <td>
                            <div class="cnc-color-options cnc-radio-group" style="max-height:500px; overflow:hidden">
                                <?php
                                foreach ($text_colors as $color) {
								?>
                               
                                    <label>
                                    <input type="radio" <?php echo esc_attr($click_n_chat_setting_popup->txt_color == esc_attr($color) ? "checked" : ""); ?> class="cnc-header-info" name="txt_color" value="<?php echo esc_attr($color) ?>">
                                    <span class="cnc-color-box color-box-txt cnc-checkpoint" style="background:<?php echo esc_attr($color) ?>;"></span><span class="cnc-checkmark">&#10003;</span>
                                    </label>
                                <?php
                                }
                               ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="name">Border Style:</label></th>
                        <td>
                            <div class="cnc-border-options cnc-radio-group">
                                <label>
                                    <input type="radio" class="cnc-header-info" id="no-border" name="border_style" <?php echo esc_html($click_n_chat_setting_popup->border_style == "0px 0px 0px 0px" ? "checked" : "");  ?> value="0px 0px 0px 0px">
                                    <span class="cnc-border-view no-border cnc-checkpoint"></span>
                                    <span class="cnc-checkmark">&#10003;</span>
                                </label>
                                
                                <label>
                                    <input type="radio" class="cnc-header-info" id="border-left-top" name="border_style" <?php echo esc_html($click_n_chat_setting_popup->border_style == "20px 0px 0px 0px" ? "checked" : "");  ?> value="20px 0px 0px 0px">
                                    <span class="cnc-border-view border-left-top cnc-checkpoint"></span>
                                    <span class="cnc-checkmark">&#10003;</span>
                                </label>
                                
                                <label>
                                    <input type="radio" class="cnc-header-info" id="border-left-top" name="border_style" <?php echo esc_html($click_n_chat_setting_popup->border_style == "0px 0px 0px 20px" ? "checked" : "");  ?> value="0px 0px 0px 20px">
                                    <span class="cnc-border-view border-left-bottom cnc-checkpoint"></span>
                                    <span class="cnc-checkmark">&#10003;</span>
                                </label>
                                <label>
                                    <input type="radio" class="cnc-header-info" id="border-left-top" name="border_style" <?php echo esc_html($click_n_chat_setting_popup->border_style == "0px 20px 0px 0px" ? "checked" : "");  ?> value="0px 20px 0px 0px">
                                    <span class="cnc-border-view border-right-top cnc-checkpoint"></span>
                                    <span class="cnc-checkmark">&#10003;</span>
                                </label>
                                <label>
                                    <input type="radio" class="cnc-header-info" id="border-left-top" name="border_style" <?php echo esc_html($click_n_chat_setting_popup->border_style == "0px 0px 20px 0px" ? "checked" : "");  ?> value="0px 0px 20px 0px">
                                    <span class="cnc-border-view border-right-bottom cnc-checkpoint"></span>
                                    <span class="cnc-checkmark">&#10003;</span>
                                </label>
                                <label>
                                    <input type="radio" class="cnc-header-info" id="border-left-right-top" name="border_style" <?php echo esc_html($click_n_chat_setting_popup->border_style == "20px 20px 0px 0px" ? "checked" : "");  ?> value="20px 20px 0px 0px">
                                    <span class="cnc-border-view border-left-right-top cnc-checkpoint"></span>
                                    <span class="cnc-checkmark">&#10003;</span>
                                </label>
                                <label>
                                    <input type="radio" class="cnc-header-info" id="border-all" name="border_style" <?php echo esc_html($click_n_chat_setting_popup->border_style == "20px 20px 20px 20px" ? "checked" : "");  ?> value="20px 20px 20px 20px">
                                    <span class="cnc-border-view border-all cnc-checkpoint"></span>
                                    <span class="cnc-checkmark">&#10003;</span>
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3" align="center">Popup Width <hr /></th>
                    </tr>
                    <tr>
                        <th><label for="name">Width:</label></th>
                        <td>
                            <div class="cnc-radio-group cnc-link-option">
                                <label class="cnc-pro-label">
                                    <input disabled="disabled" type="radio" value="30%">
                                    <span class="cnc-border-view no-border cnc-checkpoint" style="height:40px; width:20px"></span>
                                    <span class="cnc-checkmark">&#10003;</span>
                                    <br />Small
                                </label>
                                <label class="cnc-pro-label">
                                    <input disabled="disabled" type="radio" value="55%">
                                    <span class="cnc-border-view no-border cnc-checkpoint" style="height:40px; width:40px"></span>
                                    <span class="cnc-checkmark">&#10003;</span>
                                    <br />Medium 
                                </label>
                                <label class="cnc-pro-label">
                                    <input disabled="disabled" type="radio" value="95%">
                                    <span class="cnc-border-view no-border cnc-checkpoint" style="height:40px; width:60px"></span>
                                    <span class="cnc-checkmark">&#10003;</span>
                                    <br />Large
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3" align="center">Popup Type <hr /></th>
                    </tr>
                    <tr>
                        <th>
                            <label for="name">Type:</label>
                        </th>
                        <td colspan="2">
                        	<div class="cnc-pro-label" id="noAvailabilityOption" style="display:<?php echo esc_html($click_n_chat_setting_popup->pop_type == "socialwidgets" ? 'block' : 'none');  ?>">
                            	If no social user is available, automatically move to<br /><br />
                                <input name="noAvailabilityOption" type="radio" value="1" disabled="disabled" /> ChatGPT
                                <input name="noAvailabilityOption" type="radio" value="2" disabled="disabled" /> Auto Reply
                            </div>
                            <div class="cnc-radio-group cnc-link-option pb-2">
                                <label class="pop_type_hover" data-img="socialwidgets">
                                    <input type="radio" name="pop_type" value="socialwidgets" <?php echo esc_html($click_n_chat_setting_popup->pop_type == "socialwidgets" ? 'checked="checked"' : '');  ?>>
                                    <span class="cnc-checkpoint"></span>
                                    <span class="cnc-checkmark">&#10003;</span>
                                    <span class="cnc-social-type-txt btn btn-light">
                                    	Social Widgets
                                    </span>
                                </label>
                                
                                <label class="cnc-pro-label pop_type_hover" data-img="socialicon">
                                    <input  type="radio" name="" disabled="disabled" value="">
                                    <span class="cnc-checkpoint"></span>
                                    <span class="cnc-checkmark">&#10003;</span>
                                    <span class="cnc-social-type-txt btn btn-light">
                                    	Social Icon
                                    </span>
                                </label>
                                
                                <label class="cnc-pro-label pop_type_hover" data-img="chatgpt">
                                    <input type="radio" name="" disabled="disabled" value="">
                                    <span class="cnc-checkpoint"></span>
                                    <span class="cnc-checkmark">&#10003;</span>
                                    <span class="cnc-social-type-txt btn btn-light">
                                    	ChatGPT	
                                    </span>
                                </label>
                                
                                <label class="pop_type_hover" data-img="autoreply">
                                    <input type="radio" name="pop_type" value="autoreply" <?php echo esc_html($click_n_chat_setting_popup->pop_type == "autoreply" ? 'checked="checked"' : '');  ?>>
                                    <span class="cnc-checkpoint"></span>
                                    <span class="cnc-checkmark">&#10003;</span>
                                    <span class="cnc-social-type-txt btn btn-light">
                                    	 Auto Reply 
                                    </span>
                                </label>
                            </div>
                            <div style="width:200px; border:10px solid #f1f1f1; border-radius:10px">
                            <img style="width:100%" id="pop_type_view_img" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL .'assets/images/'.$click_n_chat_setting_popup->pop_type.'view.png');  ?>" />
                            </div>
                            <br />
                            <p>
                            	<b>Social Widgets: </b> Onclick chat popup opens social users widgets
                            </p>
                            <p>
                            	<b>Social Icon: </b> Onclick chat popup opens social users social icons 
                            </p>
                            <p>
                            	<b>ChatGPT: </b> Onclick chat popup opens chat using <a href="?page=wa-clicknchat&tab=chatgpt">ChatGPT</a>
                            </p>
                            <p>
                            	<b>Auto Reply: </b> Onclick chat popup opens chat using <a href="?page=wa-clicknchat&tab=autoreply">Auto Reply</a>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3" align="center">Popup Icon <hr /></th>
                    </tr>
                    <tr>
                        <th>
                            <label for="name">Icon:</label>
                        </th>
                        <td colspan="3">
                            <div class="cnc-radio-group cnc-link-option">
                                <label>
                                    <input type="radio" name="pop_up_icon" value="<?php echo esc_html(CLICK_N_CHAT_DIR_URL . 'assets/images/cnccalliconw.png');  ?>" <?php echo esc_html($click_n_chat_setting_popup->pop_up_icon == CLICK_N_CHAT_DIR_URL . 'assets/images/cnccalliconw.png' ? 'checked="checked"' : '');  ?>>
                                        <img id="cnccalliconw" style="background:<?php echo esc_html($click_n_chat_setting_popup->bg_color);?>; border-radius:50%" class="cnc-checkpoint" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL .'assets/images/cnccalliconw.png');  ?>" alt="">
                                    <span class="cnc-checkmark">&#10003;</span>
                                    <br />Chat n Click
                                </label>
                                
                                <label>
                                    <input type="radio" name="pop_up_icon" value="<?php echo esc_html(CLICK_N_CHAT_DIR_URL . 'assets/images/whatsapp.png');  ?>" <?php echo esc_html($click_n_chat_setting_popup->pop_up_icon == CLICK_N_CHAT_DIR_URL . 'assets/images/whatsapp.png' ? 'checked="checked"' : '');  ?>>
                                    <img class="cnc-checkpoint" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL .'assets/images/whatsapp.png');  ?>" alt="WhatsApp">
                                    <span class="cnc-checkmark">&#10003;</span>
                                    <br />WhatsApp
                                </label>
                            
                                <label>
                                    <input type="radio" name="pop_up_icon" value="<?php echo esc_html(CLICK_N_CHAT_DIR_URL . 'assets/images/telegram.png');  ?>" <?php echo esc_html($click_n_chat_setting_popup->pop_up_icon == CLICK_N_CHAT_DIR_URL . 'assets/images/telegram.png' ? 'checked="checked"' : '');  ?>>
                                    <img class="cnc-checkpoint" width="20px" height="20px" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL .'assets/images/telegram.png');  ?>" alt="Telegram">
                                    <span class="cnc-checkmark">&#10003;</span>
                                    <br />Telegram
                                </label>
                                <?php if($click_n_chat_setting_popup->mypopup_icon != "") { ?>
                                <label>
                                    <input type="radio" name="pop_up_icon" value="<?php echo esc_html($click_n_chat_setting_popup->mypopup_icon);  ?>" <?php echo esc_html($click_n_chat_setting_popup->pop_up_icon == $click_n_chat_setting_popup->mypopup_icon ? 'checked="checked"' : '');  ?>>
                                    <img class="cnc-checkpoint" width="20px" height="20px" src="<?php echo esc_html(esc_url($click_n_chat_setting_popup->mypopup_icon));  ?>" alt="mypopup icon">
                                    <span class="cnc-checkmark">&#10003;</span>
                                    <br />My Icon
                                </label>
                                <?php } ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <label for="name">My Icon:</label>
                        </th>
                        <td colspan="2">
                            <input disabled="disabled" type="file" class="form-control cnc-pro-label" style="width:100%">
							<p>Upload "My Icon"</p>	
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3" align="center">Timezone <hr /></th>
                    </tr>
                    <tr>
                        <th><label for="description">Timezone:</label></th>
                        <td colspan="2">
                            <?php
                                $time_zones = DateTimeZone::listIdentifiers();
							?> 	
							<select name="click_n_chat_time_zone" class="form-select">
							<?php
                            	foreach ($time_zones as $zone) {
									echo '<option '.esc_attr($zone == $click_n_chat_time_zone ? 'selected' : '').' value="' . esc_attr($zone) . '">' . esc_html($zone) . '</option>';
								}
							?>
                            </select>
                            <p>
                            	<b>Timezone: </b> Which timezone social users will be available?
                            </p>
                        </td>
                    </tr>
                 </table>   
            </div>
            <div class="tab-pane fade" id="widget" role="tabpanel" aria-labelledby="widget-tab">
                
                <table class="form-table">
                	<tr>
                        <th>
                                <p class="cnc-pro-label">* Add the <b>[cnc_chatbot_widget]</b> shortcode to any page or post where you want the chatbot widget to appear. </p>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <label for="name">Popup Widget Style</label>
                            <hr />	
                        </th>
                    </tr>
                    <tr>
                        <td>
                        	<div class="cnc-group-view">
                                <div class="cnc-radio-group">
    
                                   <?php
                                    $items = ['1', '2', '3', '4', '5', '6'];
                                    $rows = 2;
                                    $columns = ceil(count($items) / $rows);
                                    
                                    $table = array_fill(0, $rows, array());
                                    
                                    for ($i = 0; $i < count($items); $i++) {
                                        $rowIndex = $i % $rows;
                                        $table[$rowIndex][] = $items[$i];
                                    }
                                    ?>
                                    <table>
                                    <?php
                                    foreach ($table as $row) {
                                        ?><tr><?php
                                        foreach ($row as $item) {
                                            $pop_up_style = "wgs".$item;
                                        ?>
                                        <td>
                                            <label>
                                                <input type="radio" class="cnc-header-info" name="pop_up_style" value="<?php echo esc_html($pop_up_style);  ?>" <?php echo esc_html($click_n_chat_setting_popup->pop_up_style == $pop_up_style ? 'checked="checked"' : '');  ?>>
                                                <span class="cnc-checkpoint">
                                                    <div id="cnc-chatbot-popup" style="box-shadow:none; border-radius:0px;height: 100px;padding: 0px; width:300px">
                                                        <div id="<?php echo esc_html($pop_up_style);  ?>-cnc-widget" style="height: auto; overflow-y: auto; margin:0px">
                                                            
                                                            <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-container">
                                                                <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-item">
                                                                    
                                                                    <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-icon-div">
                                                                        <img src="<?php echo esc_html((CLICK_N_CHAT_DIR_URL . 'assets/images/call-icon11.png'));  ?>" class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-icon">
                                                                    </div>
                                                                    <div class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-details">
                                                                        <p class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-designation">Support</p>
                                                                        <h3 class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-name">John Doe</h3>
                                                                        <p class="<?php echo esc_html($pop_up_style);  ?>-cnc-widget-description">Need Help? Just Click</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                         
                                                        </div>
                                                    </div>
                                                </span>
                                                <span class="cnc-checkmark">&#10003;</span>
                                            </label>
                                        </td>
                                        <?php
                                        }
                                        ?>
                                        </tr>
                                        <?php
                                    } 
                                    ?>
                                    </table>
                                </div>
                           	</div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="chat-tab">
                <table class="form-table">
                	<tr>
                        <th colspan="2">
                            <label for="name">Chat Setting</label>
                            <hr />	
                        </th>
                    </tr>
                    <tr>
                        <th><label for="name">Greetings Message:</label></th>
                        <td>
                            <?php 
								$content = stripslashes(html_entity_decode($click_n_chat_greetings_message));
								$editor_id = 'click_n_chat_greetings_message';  
								$settings = array(
									'textarea_name' => 'click_n_chat_greetings_message',  
									'media_buttons' => true,  
									'textarea_rows' => 5,  
									'teeny'         => false,  
									'quicktags'     => true  
								);
								
								wp_editor($content, $editor_id, $settings);
							?>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="name">Ask for Lead Name, Email, and Phone on Chat Start?:</label></th>
                        <td>
                            <label class="cnc-switch cnc-pro-label">
                                <input class="cnc-user-status" type="checkbox" disabled="disabled"/>
                                <span class="cns-switch-slider"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="name">Enable Lead Logs:</label></th>
                        <td>
                            <label class="cnc-switch cnc-pro-label">
                                <input class="cnc-user-status" type="checkbox" disabled="disabled"/>
                                <span class="cns-switch-slider"></span>
                            </label>
                        </td>
                    </tr>
                </table>
            </div>
            
        </div>
    </div>
	<input type="submit" name="submit" id="submit" class="w-100 btn btn-outline-primary" value="Update">        
</form>
<?php
}