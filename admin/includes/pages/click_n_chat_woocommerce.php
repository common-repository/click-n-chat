<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function click_n_chat_woocommerce() {
	 
?>
 	<p><b>WooCommerce Setting</b><hr /></p>
        <input type="hidden" name="action" value="setting">
        <table class="form-table">	
            <tr>
                <th><label for="name">WooCommerce Position:</label></th>
                <td>
                	<select class="form-select">
                       <option value="">None</option>
                       <option value="">After "Add To Cart" button</option>
                       <option value="">After "Add To Cart" form</option>
                       <option value="">Before "Add To Cart" form</option>
                       <option value="">Before "Add To Cart" button</option>
                       <option value="">After "Additional information"</option>
                    </select>
                    <p>* Position <b>none</b> will deactivate the WooCommerce Widget</p>
                </td>
            </tr>
            <tr>
            	<th colspan="">
                    <hr />	
                    <label for="name">WooCommerce Style</label>
                    <hr />	
                </th>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="cnc-radio-group ">
						<div class="col-md-12" style="padding:0px">
                            <div class="col-md-12" style="padding:0px">
                            <div id="justIconsSize" style="display:none">
                                <b>Icons Size:</b><br />
                                <input type="range" class="form-rangs customRange" value="55" min="20" max="80" step="1" name="woo_widget_icon_size" id="woo_widget_icon_size" data-span="widgetIconSizeRangeValue">
                                <b><span id="widgetIconSizeRangeValue">55</span>px</b>
                            </div>
                            <label class="" style="border:1px solid #ccc; border-radius:5px; margin-left:5px">
                                <input name="woo_widget_style"  type="radio" name="woo_widget_style" value="icn">
                                <span class="cnc-checkpoint">
                                    <img style="width:280px;border-radius:5px" class="cnc-checkpoint hoverDisabled" src="<?php echo esc_html(CLICK_N_CHAT_DIR_URL .'assets/images/sociallist.png');  ?>" alt="">
                                </span>
                                <span class="cnc-checkmark">&#10003;</span>
                                <center><p>Dislpay only active social users icon</p></center>
                            </label>
                        </div>
                        <div class="col-md-12" style="padding:0px">
                            <b>Widgets</b>
                        </div>
                        <div class="col-md-12 cnc-group-view" style="padding:0px">
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
                                        <label class="" style="text-align:left">
                                            <input name="woo_widget_style" type="radio" name="woo_widget_style" value="1">
                                            <span class="cnc-checkpoint">
                                                <div id="cnc-chatbot-popup" style="box-shadow:none; border-radius:0px;height: 100px; width:310px">
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
                    </div>
				</td>
            </tr>
        </table>
        <div style="width:100%"  class="cnc-pro-label">
            <input type="button" disabled="disabled" class="w-100 btn btn-outline-primary cnc-pro-label" value="Update">
        </div>
<?php
}