
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
		$('.main-menu .menu a').each(function() {
			if ( $(this).parent('li').children('ul').size() > 0 ) {
				if (!$(this).hasClass("menu-head")) {
					if ($(this).next().hasClass("children"))
						$(this).next().hide();
					expand = $("<span />").addClass("expand").html("+").css("cursor","pointer").click( function() {
						if ($(this).next().hasClass("children")) {
							$(this).next().toggle();
						}
					});
					$(this).after(expand);
				}
			}           
		});
		
	});

