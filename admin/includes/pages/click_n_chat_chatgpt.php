<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function click_n_chat_chatgpt() {
	 //
?>
 
    <div class="cont">
        <!-- Horizontal Navigation Tabs -->
        <ul class="nav nav-tabs" id="sTab" role="tablist">
            <li class="nav-item nav-item-setting" role="presentation">
                <button class="nav-link nav-link-setting active" id="chatgpt-tab" data-bs-toggle="tab" data-bs-target="#chatgpt" type="button" role="tab" aria-controls="chatgpt" aria-selected="true">ChatGPT</button>
            </li>
            <li class="nav-item nav-item-setting" role="presentation">
                <button class="nav-link nav-link-setting" id="instructions-tab" data-bs-toggle="tab" data-bs-target="#instructions" type="button" role="tab" aria-controls="instructions" aria-selected="false"><b>AI</b> Instructions</button>
            </li>
             
        </ul>
    
        <!-- Tab Content -->
        <div class="tab-content" id="sContent" style="border:0px; padding-top:0px">
            <div class="tab-pane fade show active" id="chatgpt" role="tabpanel" aria-labelledby="chatgpt-tab">
                 <table class="form-table">
                    <tr>
                        <th><label for="name">API Key:</label></th>
                        <td>
                            <input type="password" value="" class="regular-text">
                        </td>
                    </tr>
                    <tr>
                        <th><label for="name">Max Tokens (0 - 4000):</label></th>
                        <td>
                            <input type="number"  min="0" max="4000" value="" class="regular-text">
                            <p><b>Max Tokens:</b> Limits the length of the generated response.</p>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="name">Temperature:</label></th>
                        <td>
                            <input type="range" class="form-rangs customRange" value=".5" min="0" max="1" step="0.01" data-span="temperatureRangeValue">
                            <b><span id="temperatureRangeValue">.5</span>%</b>
                            <p><b>Temperature:</b> Controls the creativity of the response (0.0 is more deterministic, 1.0 is more creative).</p>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="name">Presence Penalty:</label></th>
                        <td>
                            <input type="range" class="form-rangs customRange" value="1" min="-2" max="2" step="0.01" data-span="presencePenaltyRangeValue">
                            <b><span id="presencePenaltyRangeValue">1</span>%</b>
                            <p><b>Presence Penalty:</b> Adjusts how much the model avoids using new topics or repeating previously mentioned ones. A value between -2.0 and 2.0 is typical, where positive values discourage repetition.</p>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="name">Frequency Penalty:</label></th>
                        <td>
                            <input type="range" class="form-rangs customRange" value="1" min="-2" max="2" step="0.01" name="frequency_penalty" data-span="frequencyPenaltyRangeValue">
                            <b><span id="frequencyPenaltyRangeValue">1</span>%</b>
                            <p><b>Frequency Penalty:</b> Adjusts how much the model avoids using the same words or phrases repeatedly. A value between -2.0 and 2.0 is typical, where positive values discourage frequent repetition.</p>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="name">ChatGPT AI Models:</label></th>
                        <td>
                            <select name="ai_models" class="form-select">                
                                <option>GPT-3 turbo</option>
                                <option>GPT-4</option>
                            </select>
                        </td>
                    </tr>	
                    <tr>
                        <th><label for="name">Include Auto Reply:</label></th>
                        <td>
                            <label class="cnc-switch">
                                <input type="checkbox">
                                <span class="cns-switch-slider"></span>
                            </label>
                            <p><b>Include Auto Reply:</b>It doesn't connect to ChatGPT AI if it detects an <a href="?page=wa-clicknchat&tab=autoreply"><b>Auto Reply</b></a> </p>
                        </td>
                    </tr>
                </table>  
            </div>
            <div class="tab-pane fade" id="instructions" role="tabpanel" aria-labelledby="instructions-tab">
                 <table class="form-table">	
                    <tr>
                        <th><label class="cnc-pro-label">Open AI Instructions:</label></th>
                        <td>
                            <textarea disabled="disabled" rows="10" style="width:100%"><?php echo esc_html($click_n_chat_setting_chatgpt->ai_instructions);  ?></textarea>
                            <p>
                            
                                <b>Open AI Instructions:</b> is a message you give to an AI assistant to tell it how to behave or what role it should play. Think of it like setting instructions for a helper who's about to assist you. For instance, if you want the AI to act like a friendly shopping assistant who helps with online orders, you would include that information in the system content.
                                <br />
                                <b>Example:</b>
                                <br />
                                If you want the AI to help customers check out at an online clothing store, you would tell it:
                                <br />
                                <li><b>What to Do:</b></li> Help with checking out, including handling cart items, applying discounts, and guiding through payment.
                                <li><b>How to Act:</b></li> Be clear, friendly, and make sure the checkout process is easy for the customer.
                                This system content guides the AI's responses and behavior, making sure it provides the right kind of help according to your needs.
                                <br /><br />
                                <b>Instructions Exmaple:</b> You are a virtual assistant for a clothing store, specifically designed to help customers with the checkout process. Assist customers by guiding them through each step of the checkout process, including reviewing their cart, applying discount codes, selecting shipping options, and completing payment. Provide clear and accurate information, and ensure a smooth and user-friendly checkout experience. Address any questions or issues they may have related to the checkout process. </p>
                        </td>
                    </tr>
                </table>  
            </div>
        </div>
    </div>
    <div style="width:100%"  class="cnc-pro-label">
		<input type="button" disabled="disabled" class="w-100 btn btn-outline-primary cnc-pro-label" value="Update">
    </div>
 

<?php 
}