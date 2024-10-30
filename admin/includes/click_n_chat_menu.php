<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$directory = CLICK_N_CHAT_DIR_PATH . 'admin/includes/pages/';
$files = glob($directory . '*.php');
foreach ($files as $file) {
    require_once $file;
}


if (!class_exists('click_n_chat_menu')) {
    class click_n_chat_menu {
		
        public function __construct() {
            add_action('admin_menu', array($this, 'add_admin_menu'));
            add_action('admin_enqueue_scripts', array($this, 'click_n_chat_enqueue_admin_assets'));
        }

        public function add_admin_menu() {
            add_menu_page(
				'Click n Chat',
				'Click n Chat',
				'manage_options',
				'wa-clicknchat',
				array($this, 'click_n_chat_pages'),  
				CLICK_N_CHAT_DIR_URL .'assets/images/cnccalliconsmall20.png', 
				6
			);
			add_submenu_page(
				'wa-clicknchat', 
				'Premium',
				'<span style="color:#00AC57;font-weight:bold;"><span class="dashicons dashicons-yes-alt"></span> Premium</span>',
				'manage_options',
				'chatnclick_premium',
				array($this, 'chatnclick_premium_page'),
			);
        }
		function chatnclick_premium_page() {
			 wp_redirect('https://clicknchat.flag92.com/');
    		 exit;
		}
        function click_n_chat_pages() {
			$this->click_n_chat_plugin_admin_notice();
			$active_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'display_users';
		?>
			<header class="d-flex flex-wrap justify-content-center py-3 cnc-header">
              <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img width="40px" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL .'assets/images/cnccallicon.png'); ?>" />&nbsp;<span class="fs-4"><b>Click n Chat</b></span>
              </a>
        
              <ul class="nav nav-pills me-3">
              	<li class="nav-item">
                	<a href="?page=wa-clicknchat&tab=display_users" class="nav-tab <?php echo esc_html(($active_tab == 'display_users' || $active_tab == 'add_edit_user') ? 'nav-tab-active' : ''); ?>">Social Users</a>
                </li>
                <li class="nav-item">
                	<a href="?page=wa-clicknchat&tab=analytics" class="nav-tab <?php echo esc_html($active_tab == 'analytics' ? 'nav-tab-active' : ''); ?>">Analytics</a>
                </li>
                <li class="nav-item">
                	<a href="?page=wa-clicknchat&tab=woocommerce" class="nav-tab <?php echo esc_html($active_tab == 'woocommerce' ? 'nav-tab-active' : ''); ?>">WooCommerce</a>
                </li>
                <li class="nav-item">
                	<a href="?page=wa-clicknchat&tab=chatgpt" class="nav-tab <?php echo esc_html($active_tab == 'chatgpt' ? 'nav-tab-active' : ''); ?>">ChatGPT</a>
                </li>
                <li class="nav-item">
                	<a href="?page=wa-clicknchat&tab=autoreply" class="nav-tab <?php echo esc_html($active_tab == 'autoreply' ? 'nav-tab-active' : ''); ?>">Auto Reply</a>
                </li>
                <li class="nav-item">
                	<a href="?page=wa-clicknchat&tab=lead_list" class="nav-tab <?php echo esc_html($active_tab == 'lead_list' ? 'nav-tab-active' : ''); ?>">Leads</a>
                </li>
                <li class="nav-item">
                	<a href="?page=wa-clicknchat&tab=cnc_setting" class="nav-tab <?php echo esc_html($active_tab == 'cnc_setting' ? 'nav-tab-active' : ''); ?>">Setting</a>
                </li>
              </ul>
            </header>
 
            
            <div class="tab-content">
				<?php
                if ($active_tab == 'display_users') {
                    click_n_chat_user_list();
                } elseif ($active_tab == 'add_edit_user') {
                    click_n_chat_add_edit_user($this->click_n_chat_limit());
                } elseif ($active_tab == 'woocommerce') {
                    click_n_chat_woocommerce($this->click_n_chat_limit());
                } elseif ($active_tab == 'chatgpt') {
                    click_n_chat_chatgpt($this->click_n_chat_limit());
                } elseif ($active_tab == 'autoreply') {
                    click_n_chat_autoreply($this->click_n_chat_limit());
                } elseif ($active_tab == 'add_edit_autoreply') {
                    click_n_chat_autoreply_add_edit($this->click_n_chat_limit());
                } elseif ($active_tab == 'analytics') {
                    click_n_chat_analytics($this->click_n_chat_limit());
                } elseif ($active_tab == 'lead_list') {
                    click_n_chat_lead_list($this->click_n_chat_limit());
				} elseif ($active_tab == 'cnc_setting') {
                    click_n_chat_setting();
                }
                ?>
            </div>
			
			
		<?php 
		}

        public function click_n_chat_enqueue_admin_assets($hook) {
            // Load only on our custom admin page
            if ($hook != 'toplevel_page_wa-clicknchat') {
                return;
            }
			$theme_version = wp_get_theme()->get('Version');
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style('cnc-admin-bootstrap', CLICK_N_CHAT_DIR_URL . 'admin/assets/css/bootstrap.min.css', array(), $theme_version);
			wp_enqueue_style('cnc-admin-simple-line-icons', CLICK_N_CHAT_DIR_URL . 'admin/assets/css/simple-line-icons.css', array(), $theme_version);
			wp_enqueue_style('custom-admin-style', CLICK_N_CHAT_DIR_URL . 'admin/assets/css/admin-style.css', array(), $theme_version);
			wp_enqueue_style('custom-admin-intlTelInput', CLICK_N_CHAT_DIR_URL . 'admin/assets/css/intlTelInput.min.css', array(), $theme_version );    
			wp_enqueue_script( 'iris', admin_url( 'js/iris.min.js' ), array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), $theme_version, 1 );
			wp_enqueue_script('cnc-admin-script-bootstrap', CLICK_N_CHAT_DIR_URL . 'admin/assets/js/bootstrap.bundle.min.js', array('jquery'), $theme_version, true);
			wp_enqueue_script('cnc-admin-script-intlTelInput', CLICK_N_CHAT_DIR_URL . 'admin/assets/js/intlTelInputWithUtils.min.js', array('jquery'), $theme_version, true);
			wp_enqueue_script('my-admin-script', CLICK_N_CHAT_DIR_URL . 'admin/assets/js/admin-script.js', array('jquery'), $theme_version, true);
			
			wp_enqueue_script('jquery-ui-sortable');
			
			$ajax_data = array(  
				'plugin_url' => CLICK_N_CHAT_DIR_URL,  
				'ajax_url' => admin_url('admin-ajax.php'),  
				'nonce'    => wp_create_nonce( 'ajax-call-nounce' ), 
			);  		
			wp_localize_script('my-admin-script', 'click_n_chat_ajax_object ', $ajax_data);  
        } 
		
		function click_n_chat_is_premium_user() {
			return get_option('click_n_chat_premium', false);
		}
		
		function click_n_chat_limit() {
			if(!$this->click_n_chat_is_premium_user())
			{
				return get_option('click_n_chat_limit');
			}
		}
		
		function click_n_chat_plugin_admin_notice() {
			if (isset($_GET['message'])) {
				$message_type = sanitize_text_field($_GET['message']);
		
				if ($message_type == 'success') {
				?>
					<div class="notice notice-success is-dismissible">
						<p>Record saved successfully.</p>
					</div>
                <?php
				} elseif ($message_type == 'deleted') {
				?>
					<div class="notice notice-success is-dismissible">
						<p>Record deleted successfully.</p>
					</div>
                <?php
				} elseif ($message_type == 'error') {
				?>
					<div class="notice notice-error is-dismissible">
						<p>There was an error processing your request.</p>
					</div>
                <?php 
				}
			}
		}
    }
	
    new click_n_chat_menu();
}

