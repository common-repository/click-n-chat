jQuery(document).ready(function($) {
  
	$('.cnc-chat-messages').slimScroll({
		height: '100hv',
		start: 'bottom'
	});
	var first = true;
	var chatsvg = '<svg version="1.1" viewBox="0 0 1576 1576" width="25" height="25" xmlns="http://www.w3.org/2000/svg"><path transform="translate(773,65)" d="m0 0h48l34 2 48 5 39 6 40 8 36 9 30 9 33 11 24 9 14 6 13 5 58 29 13 8 22 13 12 8 13 9 23 16 10 8 14 11 13 11 10 8 4 3v2l4 2 48 48 9 11 11 13 13 17 16 21 19 29 8 13 14 26 5 8 7 16 6 10 10 26 11 30 12 43 10 50 4 30 2 35v42l-2 35-7 44-7 35-13 45-10 28-9 22-11 22-4 10-10 18-8 14-11 17-9 15-10 14-15 20-7 8-9 12-10 11-8 10-42 42h-2v2l-11 9-14 12-8 7-8 6-11 9-11 8-17 12-19 12-24 15-16 9-33 17-14 7-25 11-24 10-26 9-33 11-60 15-47 9-28 4-53 5-19 1-36 1-24 9-29 15-13 8-12 7-18 11-17 11-15 9-15 10-17 11-32 20-11 7-15 9-17 10-10 6-33 17-17 7-21 7-21 5-7 1h-8l-21-5-14-8-11-10-7-11-4-9-4-22v-31l3-25 8-43 9-43 6-40 2-19v-11l-17-10-18-11-36-24-12-9-26-20-16-13-24-22-8-7-22-22-9-11-10-10-9-11-13-16-8-11-20-28-9-14-11-18-13-25-6-10-7-16-12-28-6-15-10-32-7-24-6-27-7-40-5-46-1-13v-29l4-43 4-28 7-38 6-24 11-37 10-27 15-36 15-29 4-8 8-13 11-18 7-10 11-16 20-26 13-16 5-6 5-5 12-14 11-12 17-17 11-9 12-11 8-7 27-21 24-18 10-7 19-12 13-8 22-13 22-12 24-12 20-9 15-6 19-8 50-17 43-12 21-5 40-8 34-5 38-4 25-2zm-3 50-40 3-44 5-42 7-36 8-26 7-27 8-31 11-29 12-21 9-25 12-22 12-21 12-19 12-24 16-13 10-16 12-13 11-17 14-9 9-2 1v2l-4 2-24 24-7 8-7 7-8 10-11 13-9 12v2h-2l-13 19-9 13-10 16-10 17-8 14-11 23-9 20-11 29-9 28-9 36-5 28-3 21-3 38-1 8v23l4 49 4 29 5 26 8 31 12 36 10 25 8 18 11 23 14 24 11 18 11 16 12 17 20 25 12 14 12 13 7 8 20 20 8 7 14 12 10 9 14 11 13 10 18 13 29 19 17 10 16 9 14 9 6 7 5 11 2 11v30l-5 35-8 42-9 44-5 34-1 13v17l2 10 3 5 5 4h13l19-6 17-7 17-8 22-12 18-10 13-8 41-26 16-10 20-13 21-13 17-11 22-13 19-11 28-15 21-9 15-5 9-2 20-1 36-1 35-3 32-4 41-7 40-9 32-9 36-12 19-7 34-14 29-14 27-14 15-9 23-14 25-17 16-12 13-10 14-12 11-9 12-11 5-4 24-24 7-8 9-9 9-11 11-13 18-24 12-17 8-13 11-18 11-19 8-16 11-25 12-31 9-28 10-40 6-36 4-39v-62l-4-40-7-39-8-32-12-37-11-28-10-22-10-19-10-18-12-20-13-19-10-14-10-13-13-16-12-14-15-16-28-28-8-7-11-10-25-20-19-14-16-11-17-11-19-12-29-16-38-19-23-10-34-13-40-13-30-8-34-8-41-7-41-5-49-4z" fill="#7CACFB"/><path transform="translate(1031,570)" d="m0 0h31l15 4 12 5 11 6 10 8 12 12 9 14 6 14 4 16 1 8v10l-3 18-6 16-8 14-9 11-11 10-11 7-16 7-16 4-19 1-14-1-15-4-17-8-10-7-10-9-9-10-9-16-5-15-3-13v-19l4-17 6-15 9-15 12-13 12-9 16-8 11-4zm8 50-10 3-10 6-8 7-6 10-2 6v20l4 10 6 8 7 7 12 6 6 1h16l9-2 11-6 6-5 8-12 3-10v-12l-4-13-7-10-9-8-11-5-5-1z" fill="#7BACFB"/><path transform="translate(791,570)" d="m0 0h30l16 4 16 7 11 7 12 11 8 9 9 16 5 15 3 14v18l-4 19-5 12-8 14-11 12-7 7-15 9-16 7-14 3-18 1-14-1-12-3-17-7-11-7-13-11-11-14-8-16-6-21v-25l5-19 8-17 9-12 13-13 13-8 13-6 13-4zm6 50-10 3-9 6-8 8-6 11-3 11 1 11 4 10 6 10 11 9 9 4 5 1h16l10-2 10-6 7-6 6-10 4-11v-15l-5-12-7-9-8-7-8-4-8-2z" fill="#7CACFB"/><path transform="translate(529,570)" d="m0 0h30l19 5 16 8 11 8 10 9 10 13 8 16 4 13 2 13v13l-2 14-6 18-8 14-7 9-7 8-16 11-15 7-19 5-19 1-18-2-18-6-13-7-13-10-7-7-11-16-7-17-4-16v-22l3-15 6-15 8-14 11-13 13-10 12-7 13-5zm7 50-10 3-11 6-8 9-6 12-2 7v11l4 13 7 9 8 7 9 5 9 2h15l13-4 11-7 7-9 5-10 1-4v-16l-4-10-7-11-11-8-10-4-4-1z" fill="#7CACFB"/></svg>';
	var cnc_chatbot_icon = 	$('#cnc-chatbot-icon-img').attr('src');					
	$('#cnc-chatbot-icon').on('click', function() {
		
        var popup = $("#cnc-chatbot-popup");
		if(popup.is(':visible'))
		{
			$('#cnc-chatbot-icon-img').attr('src',cnc_chatbot_icon+'?rand=' + Math.random());
			$('#cnc-chatbot-icon-img').addClass('animate-popout');
			setTimeout(function() {
				$('#cnc-chatbot-icon-img').removeClass('animate-popout');
			}, 300);
			popup.fadeOut();
			
		}
		else
		{
			$('#cnc-chatbot-icon-img').attr('src',click_n_chat_ajax_object.plugin_url+'assets/images/closeiconw.png?rand=' + Math.random());
			$('#cnc-chatbot-icon-img').addClass('animate-popup');
			setTimeout(function() {
				$('#cnc-chatbot-icon-img').removeClass('animate-popup');
			}, 300);
			popup.fadeIn();
		}
		
		if (typeof cncanalytics === 'function') {
			cncanalytics();
		}
		
		if(first == true)
		{
			$('.cnc-chat-messages').show();
			first = false;
			setTimeout(function() {
				var recMessage = '<div class="cnc-message received tri-right left-top"><span class="rcnc-message-icon">'+chatsvg+'</span><div class="received-content">'+$('#click_n_chat_greetings_message').html()+'</div></div>';
				$('.cnc-chat-messages').append(recMessage);
			}, 500);
		}
		
    });
	
	$('.cnc-icon-popup-icon').on('click', function() {
        var popupContainer = $(this).parent('.cnc-icon-popup-container');
        popupContainer.toggleClass('active');
 		if(!popupContainer.hasClass("active"))
		{
			$('#cnc-chatbot-icon-img').attr('src',cnc_chatbot_icon+'?rand=' + Math.random());
			$('#cnc-chatbot-icon-img').attr('style','background:'+$(this).data("header")+';border-radius:50%');
			$('#cnc-chatbot-icon-img').addClass('animate-popout');
			setTimeout(function() {
				$('#cnc-chatbot-icon-img').removeClass('animate-popout');
			}, 300);
			popup.fadeOut();
			
		}
		else
		{
			$('#cnc-chatbot-icon-img').attr('src',click_n_chat_ajax_object.plugin_url+'assets/images/closeiconw.png?rand=' + Math.random());
			
			$('#cnc-chatbot-icon-img').attr('style','background:'+$(this).data("header")+';border-radius:50%');
			 
			$('#cnc-chatbot-icon-img').addClass('animate-popup');
			setTimeout(function() {
				$('#cnc-chatbot-icon-img').removeClass('animate-popup');
			}, 300);
			popup.fadeIn();
		}
    });
	
	$('#closeImage').on('click', function() {
		$('#cnc-chatbot-icon').trigger('click');
	}); 
	// Close chat functionality  
	$('.chat-close').on('click', function() {  
		$('.cnc-chat-container').hide();  
	});  

	 
	// Send message functionality  
	$('.cnc-chat-send').on('click', function() {  
		const messageText = $('.chat-input').val().trim();  

		if (messageText) {  
			// Create a new message element  
			var sendMessage = '<div class="cnc-message sent"><p>'+messageText+'</p></div>';
			const messageElement = $('<div class="chat-cnc-message sent animate-chat"></div>').html(sendMessage);  
			$('.cnc-chat-messages').append(messageElement); // Append to chat messages  

			// Clear the input field  
			$('.chat-input').val('');  
			
			$('.cnc-loading-chat').show(); 
			$.ajax({
				type: 'POST',
				url: click_n_chat_ajax_object.ajax_url,
				data: {
					action: click_n_chat_ajax_object.auto_reply_method,
					message: messageText,
					security: click_n_chat_ajax_object.nonce,
					lid: $('#lid').val()
				},
				success: function(response) {
					$('.cnc-loading-chat').hide(); 
					var recMessage = '<div class="cnc-message received tri-right left-top"><span class="rcnc-message-icon">'+chatsvg+'</span><div class="received-content">'+response.reply+'</div></div>';
					
					$('.cnc-chat-messages').append('<div class="chat-message received animate-chat">'+recMessage+'</div>');
					$('.cnc-chat-messages').slimScroll({ scrollBy: $('.animate-chat').height() * 20 + 'px' });  
					$('.cnc-chat-messages').removeclass("animate-chat");
				}
			});
			$('.cnc-chat-messages').slimScroll({ scrollBy: $('.animate-chat').height() * 20 + 'px' });  
		}  
	});  

	// Send message on Enter key  
	$('.chat-input').on('keypress', function(e) {  
		if (e.which === 13) { // Enter key  
			$('.cnc-chat-send').click(); // Trigger send button click  
		}  
	}); 
	
	
});