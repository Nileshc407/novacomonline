

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
	
	jQuery(function () {
		
		/* jQuery(".toggle-menu").on("click", function (e) {
			jQuery("html").addClass("menu-show");
			e.stopPropagation()
		}); */
		
		jQuery(".toggle-menu").on("click", function (e) {
			jQuery("html").toggleClass("menu-show");
			e.stopPropagation()
		});
		
		
		jQuery(document).on("click", function (e) {
			if (jQuery(e.target).is(".toggle-menu") === false) {
				jQuery(".toggle-back").removeClass("menu-show");
			}
		});
		jQuery(document).on("click", function (e) {
			if (jQuery(e.target).is(".toggle-menu") === false) {
				jQuery("html").removeClass("menu-show");
			}
		});
	});

});


