<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function click_n_chat_analytics() {
	global $wpdb;
	$nonce = 'setting-user';
    if (isset($_POST['action'])) {
		if (  ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), $nonce) ) {
			 die( 'Security check' ); 
		} 
		$click_n_chat_setting_analytics = new click_n_chat_setting_analytics();
		$click_n_chat_setting_analytics->analytic_type = sanitize_text_field($_POST['analytic_type']);
		$click_n_chat_setting_analytics->is_active = $_POST['is_active'] == "on" ? 1 : 0;
		$click_n_chat_setting_analytics->label = sanitize_text_field($_POST['label']);
		$click_n_chat_setting_analytics->category = sanitize_text_field($_POST['category']);
		$click_n_chat_setting_analytics->gaid = sanitize_text_field($_POST['gaid']);
		
		update_option('click_n_chat_setting_analytics', $click_n_chat_setting_analytics);
			
	}
	
	$click_n_chat_setting_analytics = get_option('click_n_chat_setting_analytics');

?>
 	<p><b>Google Analytics</b> <a class="right" href="#help">Help</a><hr /></p>
    <form id="userForm" method="post" enctype="multipart/form-data">
        <?php wp_nonce_field($nonce, '_wpnonce'); ?>
        <input type="hidden" name="action" value="setting">
        
        <table class="form-table">
            <tr>
                <th><label for="name">Google Analytics Type: </label></th>
                <td>
                    <select name="analytic_type" class="form-select">

                    	<option value="GA3" <?php echo esc_html($click_n_chat_setting_analytics->analytic_type == "GA3" ? "selected" : "") ?>>Google Analytics 3</option>
                        <option value="GA4" <?php echo esc_html($click_n_chat_setting_analytics->analytic_type == "GA4" ? "selected" : "")?>>Google Analytics 4</option>
                    </select>
                </td>
            </tr>
            
            <tr>
                <th><label for="name">Active: </label></th>
                <td>
                    <label class="cnc-switch">
                        <input name="is_active" id="is_active" class="cnc-user-status" type="checkbox" <?php echo esc_html(($click_n_chat_setting_analytics->is_active == "1" ? "checked" : ""));  ?> >
                        <span class="cns-switch-slider"></span>
                    </label>
                    <p><b>Active: </b> Activate or Deactivate Google Analytics Script</p>
                </td>
            </tr>
            
            <tr>
                <th><label for="name">Label: </label></th>
                <td>
                	<input name="label" type="text" id="label" value="<?php echo esc_html($click_n_chat_setting_analytics->label); ?>" class="form-control" placeholder="AI Chat">
                </td>
            </tr>
            
            <tr>
                <th><label for="name">Category: </label></th>
                <td>
                	<input name="category" type="text" id="category" value="<?php echo esc_html($click_n_chat_setting_analytics->category); ?>" class="form-control" placeholder="AI Auto Chat">
                </td>
            </tr>
            
            <tr>
                <th><label for="name">Google Analytics ID: </label></th>
                <td>
                	<input name="gaid" type="text" id="gaid" value="<?php echo esc_html($click_n_chat_setting_analytics->gaid); ?>" class="form-control" placeholder="UA-0000000-0">
                </td>
            </tr>             
        </table>
        <input type="submit" name="submit" id="submit" class="w-100 btn btn-outline-primary" value="Update">
        <hr />
        <h5 id="help">How to Find Your Google Analytics v3 (Universal Analytics) Property Tracking ID</h5>
        <ol>
            <li><strong>Sign In to Google Analytics</strong>
                <ol>
                    <li>Go to <a href="https://analytics.google.com/" target="_blank">Google Analytics</a>.</li>
                    <li>Log in using your Google account.</li>

                </ol>
            </li>
            <li><strong>Access the Admin Section</strong>
                <ol>
                    <li>Select your account and property.</li>
                    <li>Click on the <strong>Admin</strong> gear icon in the bottom-left corner.</li>
                </ol>
            </li>
            <li><strong>Find Your Tracking ID</strong>
                <ol>
                    <li>Under the "Property" column, click on <strong>Tracking Info</strong>, then click on <strong>Tracking Code</strong>.</li>
                    <li>Your Tracking ID (e.g., <code>UA-XXXXXXXXX-X</code>) will be displayed at the top.</li>
                </ol>
            </li>
            <li><strong>Use the Tracking ID</strong>
                <ol>
                    <li>Copy the Tracking ID and paste it into <b>Google Analytics ID</b>.</li>
                </ol>
            </li>
        </ol>
        <hr />
        <h5>How to Find Your Google Analytics 4 (GA4) Data Stream Measurement ID</h5>
        <ol>
            <li><strong>Sign In to Google Analytics</strong>
                <ol>
                    <li>Visit <a href="https://analytics.google.com/" target="_blank">Google Analytics</a>.</li>
                    <li>Log in with your Google account.</li>
                </ol>
            </li>
            <li><strong>Select the Correct Property</strong>
                <ol>
                    <li>Ensure you are in the correct account.</li>
                    <li>In the property selector, choose the GA4 property you want to find the Measurement ID for.</li>
                </ol>
            </li>
            <li><strong>Go to Data Streams</strong>
                <ol>
                    <li>Click on the <strong>Admin</strong> gear icon in the bottom-left corner of the screen.</li>
                    <li>Under the <strong>Property</strong> column, select <strong>Data Streams</strong>.</li>
                </ol>
            </li>
            <li><strong>Find Your Measurement ID</strong>
                <ol>
                    <li>Click on the relevant data stream (e.g., Web, iOS, Android) you are using for tracking.</li>
                    <li>Your Measurement ID will be displayed at the top right corner. It will look something like <code>G-XXXXXXXXXX</code>.</li>
                </ol>
            </li>
            <li><strong>Use the Measurement ID</strong>
                <ol>
                    <li>Copy the Measurement ID and paste it into <b>Google Analytics ID</b>.</li>
                </ol>
            </li>
        </ol>
        
    </form>
<?php
}