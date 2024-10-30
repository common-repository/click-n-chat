<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function click_n_chat_user_list() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'cnc_social_users';	
	// Fetch users
	$users = $wpdb->get_results("SELECT * FROM {$table_name} order by position");
	// Fetch Setting
	$cnc_setting_popup = get_option('cnc_setting_popup');
?>
	<p><b>Social Users</b><hr /></p>
	<p class="cnc-pro-label"><b>* Woocommerce</b> Active social users will be displayed in Woocommerce.</p>
    <p class="cnc-pro-label"><b>* Page Widget</b> Active social users will be displayed in page widget (Widget shortcode <b>[cnc_chatbot_widget]</b>).</p>
    <p><b>* Popup Widget</b> Active social users will be displayed in Popup.</p>
    <table style="width:100%">
    	<tr>
            <td>
                <a class="btn btn-outline-primary right" href="?page=wa-clicknchat&tab=add_edit_user&mode=add">New</a><br />
            </td>
        </tr>
    </table>
    <div class="table-container">  
    <table id="sortable-user-list" class="table">
        <thead>
            <tr>
                <th>Position</th>
                <th width="15%">User</th>
                <th width="15%">Social Channel</th>
                <th>Designation</th>
                <th width="15%">Description</th>
                <th width="15%">Welcome Message</th>
                <th>Woo-<br />commerce</th>
                <th>Page Widget</th>
                <th>Popup Widget</th>
                <th style="width:15%">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
            <tr data-rowid='<?php echo esc_attr($user->id); ?>'>
            	<td valign="middle"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="30" height="30" viewBox="0 0 256 256" xml:space="preserve">
                    <defs>
                    </defs>
                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                        <path d="M 45 90 c -0.282 0 -0.551 -0.119 -0.741 -0.328 l -20 -22.044 c -0.266 -0.293 -0.334 -0.715 -0.174 -1.077 c 0.161 -0.361 0.519 -0.595 0.915 -0.595 l 9.08 0 l 0 -20.525 c 0 -0.349 0.182 -0.672 0.479 -0.854 c 0.296 -0.183 0.667 -0.196 0.979 -0.035 l 19.841 10.219 c 0.333 0.171 0.542 0.515 0.542 0.889 l 0 10.307 l 9.079 0 c 0.396 0 0.754 0.233 0.914 0.595 c 0.16 0.362 0.093 0.784 -0.174 1.077 l -20 22.044 C 45.551 89.881 45.282 90 45 90 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(92,158,198); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        <path d="M 54.921 45.569 c -0.157 0 -0.313 -0.037 -0.458 -0.111 L 34.622 35.239 c -0.333 -0.171 -0.542 -0.515 -0.542 -0.889 l 0 -10.306 l -9.08 0 c -0.396 0 -0.754 -0.233 -0.915 -0.595 c -0.16 -0.361 -0.092 -0.784 0.174 -1.077 l 20 -22.044 c 0.379 -0.418 1.103 -0.418 1.481 0 l 20 22.044 c 0.267 0.293 0.334 0.715 0.174 1.077 c -0.16 0.362 -0.519 0.595 -0.914 0.595 l -9.079 0 l 0 20.525 c 0 0.349 -0.182 0.672 -0.479 0.854 C 55.282 45.521 55.102 45.569 54.921 45.569 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(146,206,94); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                    </g>
                    </svg>
				</td>
                <td>
                    <center><?php if ($user->user_icon) : ?><img style="border-radius: 50%;width:50px;height: 50px;" src="<?php echo esc_url($user->user_icon); ?>" style="max-width: 100px;"><?php endif; ?><br />
                    <?php echo esc_html($user->name); ?></center>
                </td>
                <td>
					<center>
                    	<?php require CLICK_N_CHAT_DIR_PATH . 'assets/images/svgs/'.$user->social_type.'.svg'; ?><br />
                        <?php echo esc_html($user->cnc_social_id); ?>
                    </center>
                </td>
                <td><?php echo esc_html($user->designation); ?></td>
                <td><?php echo esc_html($user->description); ?></td>
                <td><?php echo esc_html($user->welcome_message); ?></td>
                <td>
                	<label class="cnc-switch cnc-pro-label">
                        <input class="cnc-user-status" type="checkbox" disabled="disabled">
                        <span class="cns-switch-slider"></span>
                    </label>
                </td>
                <td>
                	<label class="cnc-switch cnc-pro-label">
                        <input class="cnc-user-status" type="checkbox" disabled="disabled">
                        <span class="cns-switch-slider"></span>
                    </label>
                </td>
                <td>
                	<label class="cnc-switch">
                        <input data-uid="<?php echo esc_html($user->id)  ?>" data-col="status" class="cnc-user-status" type="checkbox" <?php echo esc_html(($user->status == "1" ? "checked" : ""));  ?> >
                        <span class="cns-switch-slider"></span>
                    </label>
                </td>
                <td>
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                       
                      	<a class="btn btn-sm btn-outline-primary" href="<?php echo esc_html(admin_url('admin.php?page=wa-clicknchat&tab=add_edit_user&mode=edit&id=' . $user->id)); ?>"><i class="icon-pencil icons"></i></a>
                    	<a class="btn btn-sm btn-outline-primary removebutton" href="<?php echo esc_html(admin_url('admin.php?page=wa-clicknchat&tab=add_edit_user&mode=delete&action=delete&id=' . $user->id)); ?>" onclick="return confirm('Are you sure?');"><i class="icon-trash icons"></i></a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
<?php
}