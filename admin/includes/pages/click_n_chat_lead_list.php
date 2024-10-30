<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function click_n_chat_lead_list($limit) {
	?>
        <table style="width:100%">
            <tr>
                <td>
                    <button disabled="disabled" id="export-csv" class="btn btn-outline-primary right">CSV</button><br />
                </td>
            </tr>
        </table>
        
        <div class="table-container"> 
            <table id="leadsTable" class="table">
                <thead>
                    <tr>
                        <th><a href="#" class="sort" data-sort="name">Name</a></th>
                        <th><a href="#" class="sort" data-sort="email">Email</a></th>
                        <th><a href="#" class="sort" data-sort="phone">Phone</a></th>
                        <th><a href="#" class="sort" data-sort="phone">Date</a></th>
                    </tr>
                    <tr>
                        <th><input type="text" id="search-name" placeholder="Search Name"></th>
                        <th><input type="text" id="search-email" placeholder="Search Email"></th>
                        <th><input type="text" id="search-phone" placeholder="Search Phone"></th>
                        <th><input type="date" id="search-date" placeholder="Search Date"></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            
            <div id="pagination">
            </div>
        </div>
    	
<?php 
} 