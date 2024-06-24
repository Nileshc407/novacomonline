

$(document).ready(function(){

	jQuery('.form-control').on('focus', function() {
		jQuery(this).closest('.form-group').addClass('has-focus');
	});

	jQuery('.form-control').on('focusout', function() {
		if(jQuery(this).val() == '') {
			jQuery(this).closest('.form-group').removeClass('has-focus');
		}
	}); 
	jQuery('.s_box .field input').on('focus', function() {
		jQuery(this).closest('.s_box .field').addClass('has-focus');
	});

	jQuery('.s_box .field input').on('focusout', function() {
		if(jQuery(this).val() == '') {
			jQuery(this).closest('.s_box .field').removeClass('has-focus');
		}
	}); 
	
	$('.toggle-menu').click(function() {
		$("html").toggleClass("menu-show");
	});
	$('.toggle-back').click(function() {
		$("html").removeClass("menu-show");
	});

});
