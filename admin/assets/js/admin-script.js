
 
jQuery('.color-picker').iris({
	// or in the data-default-color attribute on the input
	defaultColor: true,
	// a callback to fire whenever the color changes to a valid color
	change: function(event, ui){},
	// a callback to fire when the input is emptied or an invalid color
	clear: function() {},
	// hide the color picker controls on load
	hide: true,
	// show a group of common colors beneath the square
	palettes: true
});


jQuery(document).ready(function($) {
	
	$("#sortable-user-list tbody").sortable({
        update: function(event, ui) {
            var order = $(this).sortable('toArray', { attribute: 'data-rowid' });

            $.ajax({
                url: click_n_chat_ajax_object.ajax_url,
                type: 'POST',
                data: {
                    action: 'click_n_chat_update_user_position_action',
                    order: order,
					security: click_n_chat_ajax_object.nonce,
                },
                success: function(response) {
                    console.log('Positions updated!');
                }
            });
        }
    });
	
    $('.cnc-header-info').on('change', function() {
		updateHeader();
    });

	$('.cnc-user-status').on('change', function(e) {
        e.preventDefault();
		console.log(click_n_chat_ajax_object);
        var data = {
            action: 'click_n_chat_update_user_status_action',
            status: $(this).is(":checked") ? '1' : '0',
			datacolumn: $(this).data('col'),
			uid: $(this).data('uid'),
			security: click_n_chat_ajax_object.nonce,
        };
        $.post(click_n_chat_ajax_object.ajax_url, data, function(response) {
            console.log(response)
        });
    });
	
	$('#availability').on('change', function(e) {
        if ($(this).is(':checked')) {
            $('#availabilityDetail').fadeOut();  
        } else {
            $('#availabilityDetail').fadeIn();  
        }
    });
	
	$('#rangeValue').text($('#customRange1').val());
	$('.customRange').on('input', function(e) {
		var span = $(this).data('span');
 		$('#'+span).text($(this).val());
		e.preventDefault();
		
		if(span == "matchingPercenageRangeValue")
		{
			var data = {
				action: 'click_n_chat_update_matching_percenage_action',
				matching_percenage: $(this).val(),
				security: click_n_chat_ajax_object.nonce,
			};
			$.post(click_n_chat_ajax_object.ajax_url, data, function(response) {
				console.log(response)
			});
		}
		
		if(span == "headerPaddingRangeValue")
		{
			updateHeader();
		}
	});
	
	function updateHeader() {
			var popup_title = $("#popup_title").val();
			var bg_color = $('input[name="bg_color"]:checked').val();
			var txt_color = $('input[name="txt_color"]:checked').val();
			var border_style = $('input[name="border_style"]:checked').val();
			var border_style = $('input[name="border_style"]:checked').val();
			var header_padding = $("#header_padding").val();
			
			$('.cnc-text-header').html(popup_title);
			$('.cnc-chatbot-popup-header').css('background', bg_color);
			$('.cnc-chatbot-popup-header').css('padding', header_padding);
			$('.cnc-chatbot-popup-header').css('border-radius', border_style);
			$('.cnc-text-header').css('color', txt_color);
			
			$('#cnccalliconw').css('background', bg_color);
	}
	 
	$('input[name=social_type]').click(function() {
		if($(this).data('ftype')=="1")
		{
			showSocialTypePhone();
		}
		else
		{
			showSocialTypeText($(this).data('placeholder'));
		}
	});
	
	var showSocialTypePhone = function()
	{
		$("#country_code").val(iti.getSelectedCountryData().dialCode);
		$('#cnc_social_id_txt').fadeOut();
		$('#cnc_social_id_txt').attr("disabled",true);
		$('#cnc_social_id').attr("disabled",false);
		$('#cnc_social_id_div').fadeIn();
	}
	var showSocialTypeText = function(text)
	{
		$('#cnc_social_id_div').fadeOut();
		$('#cnc_social_id').attr("disabled",true);
		$('#cnc_social_id_txt').attr("disabled",false);
		$('#cnc_social_id_txt').fadeIn();
		$('#cnc_social_id_txt').attr("placeholder",text);
	}
	
	const cnc_social_id = document.querySelector("#cnc_social_id");
	var iti;
	if(cnc_social_id != undefined && cnc_social_id != null)
	{
		iti = window.intlTelInput(cnc_social_id, {
			initialCountry: "auto",
			separateDialCode: true,
			geoIpLookup: function(callback) {
				$.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
					var countryCode = (resp && resp.country) ? resp.country : "us";
					callback(countryCode);
				});
			},
			utilsScript: click_n_chat_ajax_object.plugin_url+"admin/assets/js/intlTelInputWithUtils.min.js",
		});
		
		// Update the hidden field with the country code
		cnc_social_id.addEventListener('countrychange', function() {
			$("#country_code").val(iti.getSelectedCountryData().dialCode);
		});
		
		if($("#submit").val() == 'Update User')
		{
			$("#country_code").val(iti.getSelectedCountryData().dialCode);
		}
	}
	
	$(".pop_type_hover").hover(function (e) {
		var imgSrc = click_n_chat_ajax_object.plugin_url+'assets/images/'+$(this).data("img")+'view.png';
		$("#pop_type_view_img").attr('src',imgSrc);
	});
	
	$(document).on('change', 'input[name=pop_type]', function(e) {
		if($(this).val() == "socialwidgets")
			$("#noAvailabilityOption").slideDown();
		else
			$("#noAvailabilityOption").slideUp();
	});
	
	$(document).on('change', 'input[name=woo_widget_style]', function(e) {
		if($(this).val() == "icn")
			$("#justIconsSize").slideDown();
		else
			$("#justIconsSize").slideUp();
	});
});




 

 
 