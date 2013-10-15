
	jQuery(document).ready(function($) {
		$("html").removeClass("no-js");

		$(".top-menu-button").toggle(function(ev) {
			// open hover menu
			$(".main-menu-wrapper").slideDown("fast");
			$(this).find(".menu-icon").addClass("selected");
		},
		function(ev) {
			// close hover menu
			$(".main-menu-wrapper").slideUp("fast");
			$(this).find(".menu-icon").removeClass("selected");
		});

		// add + and expanding submenu in hovermenu
		$('.sub-menu a').each(function() {
			if ( $(this).parent('li').children('ul').size() > 0 ) {
				$(this).append('<span>+</span>');
			}           
		});
		
	});

