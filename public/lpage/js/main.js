$(document).ready(function(){
	
	"use strict";
	
	// jQuery nivo slider
	$('#top .slider .nivoSlider').nivoSlider({
		directionNav: false,
		controlNav: false,
		pauseTime: 5000
	});
	
	// jQuery flexslider carousel
	$('#main .projects').flexslider({
		animation: 'slide',
		directionNav: false,
		animationLoop: false,
		slideshow: false
	});
	
	// jQuery placeholder for IE
	$("input, textarea").placeholder();
	
	// prettyPhoto for image gallery modal popup
	$("a[data-rel^='prettyPhoto']").prettyPhoto({
		social_tools: false,
		hook: 'data-rel'
	});
	
	// jQuery tooltips
	$('#header .social li a, #footer .social li a').tooltip({placement: 'bottom'});
	
	// Fullscreen top section background
	$("#top").backstretch("images/base-top.jpg"); // change with your image url
	
	// jQuery figure hover effect
	$('figure.figure-hover').hover(
		function() { $(this).children("a").children("div").fadeIn(200); },
		function() { $(this).children("a").children("div").fadeOut(200); }
	);
	
	// Register form process function
	$("#register-form").submit(function() {
		var submitData	= $(this).serialize();
		var $email		= $(this).find("input[name='email']");
		var $name		= $(this).find("input[name='name']");
		var $phone		= $(this).find("input[name='phone']");
		var $submit		= $(this).find("input[name='submit']");
		var output		= '';
		
		$email.attr('disabled','disabled');
		$name.attr('disabled','disabled');
		$phone.attr('disabled','disabled');
		$submit.attr('disabled','disabled');
		
		$.ajax({ // Send an offer process with AJAX
			type: "POST",
			url: "register.php",
			data: submitData + "&action=add",
			dataType: "html",
			success: function(msg){
				if(parseInt(msg, 0) !== 0) {
					var msg_split = msg.split("|");
					if(msg_split[0] === "success") {
						$email.val('').removeAttr('disabled');
						$name.val('').removeAttr('disabled');
						$phone.val('').removeAttr('disabled');
						$submit.removeAttr('disabled');
						output	+= '<div class="submit-status submit-status-success">' + msg_split[1] + '</div>';
						$("body").prepend(output).find(".submit-status").hide().slideDown().delay(4000).slideUp(function() { $(this).remove(); });
					} else {
						$email.removeAttr('disabled');
						$name.removeAttr('disabled');
						$phone.removeAttr('disabled');
						$submit.removeAttr('disabled');
						output	+= '<div class="submit-status submit-status-error">' + msg_split[1] + '</div>';
						$("body").prepend(output).find(".submit-status").hide().slideDown().delay(4000).slideUp(function() { $(this).remove(); });
					}
				}
			}
		});
		return false;
	});
	
	// Email subcribe process function
	$("#form-subscribe input[type='text']").live('focus keypress', function(){ // Checking subcribe form when focus event
		var $email = $(this);
		if ($email.val() === "Please enter your email address" || $email.val() === "Please enter a valid email address" || $email.val() === "Subscribe process completed" || $email.val() === "Email is already registered") {
			$(this).val('').css({'backgroundColor':'#FFF'});
		}
	});
	
	$("#form-subscribe").submit(function(){ // Checking subcribe form when submit to database
		var $email	= $(this).find("input[type='text']");
		var $submit	= $(this).find("input[type='submit']");
		
		var email_pattern = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i;
		if(email_pattern.test($email.val()) === false) {
			$email.val('Please enter a valid email address').css({'backgroundColor': '#ffb2b2'});
		} else {
			var submitData = $(this).serialize();
			$email.attr('disabled','disabled');
			$submit.attr('disabled','disabled');
			$.ajax({ // Subcribe process with AJAX
				type: "POST",
				url: "subcribe.php",
				data: submitData + "&action=add",
				dataType: "html",
				success: function(msg){
					if(parseInt(msg, 0) !== 0)
						{
						var msg_split = msg.split("|");
						
						if(msg_split[0] === 'success') {
							$submit.removeAttr('disabled');
							$email.removeAttr('disabled').val(msg_split[1]).css({'backgroundColor': '#a5ffa5'}); 
							} else {
							$submit.removeAttr('disabled');
							$email.removeAttr('disabled').val(msg_split[1]).css({'backgroundColor': '#ffb2b2'});
							}
						}
					}
				});
			}
		return false;
	});
	
	/* Back to top scroll */
	$(window).scroll(function(){
		var $scrollup = $('.scrollup');
		if ($(this).scrollTop() > 100) { $scrollup.slideDown(); }
		else { $scrollup.slideUp(); }
	}); 
	
	$('.scrollup').click(function(){
		$("html, body").stop().animate({ scrollTop: 0 }, 2000, 'easeInOutExpo');
		return false;
	});
	/* End Back to top scroll */
	
	
	/* Customizer */
	$("#customize h5").click(function() {
		$("#customize .wrapper").slideToggle();
	});
	
	$("#customize .colors a").click(function(e) {
		var $color = $(this).attr('class');
		$('head').append('<link rel="stylesheet" type="text/css" href="css/customizer/'+ $color +'/color.css">');
		e.preventDefault();
	});
	/* End customizer */

});