<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function click_n_chat_autoreply() {
	global $wpdb;
    $table_name = $wpdb->prefix . 'cnc_auto_reply';
	$mode = sanitize_text_field($_GET['mode']);
	$nonce = wp_create_nonce( 'addedit-user' );
	
	if (isset($_POST['action'])) {
		if (  ! wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), $nonce) ) {
			 die( 'Security check' ); 
		}
		$action = sanitize_text_field($_POST['action']);
		$keyword = sanitize_text_field($_POST['keyword']);
		$matching_percenage = sanitize_text_field($_POST['matching_percenage']);
		$message = wp_kses_post($_POST['message']);
        exit;
	}

    
	$click_n_chat_setting_autoreply = get_option('click_n_chat_setting_autoreply');
    $rows = $wpdb->get_results("SELECT * FROM $table_name");
    ?>
    <div class="wrap">
		<p><b>Auto Reply</b><hr /></p>
        <table class="form-table">
            <tr>
                <th scope="row"><label for="keyword">Matching Percentage</label> </th>
                <td>
                    <input type="range" class="form-rangs customRange" value="<?php echo esc_html($click_n_chat_setting_autoreply->matching_percenage);  ?>" min="50" max="100" step="1" name="matching_percenage" data-span="matchingPercenageRangeValue">
                    <b><span id="matchingPercenageRangeValue"><?php echo esc_html($click_n_chat_setting_autoreply->matching_percenage);  ?></span>%</b>
                    <p>Higher value means more exact matching of <b>Query</b> & <b>Keywords</b> with user message.</p>
               </td>     
            </tr>
        </table>
  
        <hr>

        
        <table class="table">
            <thead>
            	<tr>
                	<td>
                    	<p><b>Auto Reply List</b></p>
                    </td>
                    <td colspan="3">
                        <a class="btn btn-primary right" href="?page=wa-clicknchat&tab=add_edit_autoreply&mode=add">New</a>
                    </td>
                </tr>
                <tr>
                    <th>Query</th>
                    <th>Keyword</th>
                    <th>Reply</th>
                    <th width="15%">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row) { ?>
                    <tr>
                        <td><?php echo esc_html($row->query); ?></td>
                        <td><?php echo wp_kses_post($row->keyword); ?></td>
                        <td><?php echo wp_kses_post($row->reply); ?></td>
                        <td>
                            <a class="btn btn-primary" href="?page=wa-clicknchat&tab=add_edit_autoreply&mode=edit&id=<?php echo esc_attr($row->id);  ?>"><i class="icon-pencil icons"></i></a>
                             | <form id="deleteForm" method="post" action="?page=wa-clicknchat&tab=add_edit_autoreply&mode=delete" style="display: inline;">
                                <?php wp_nonce_field($nonce, '_wpnonce'); ?>
                                <input type="hidden" name="id" value="<?php echo esc_attr($row->id); ?>">
                                <input type="hidden" name="action" value="delete">
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this item?');"><i class="icon-trash icons"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php 
}