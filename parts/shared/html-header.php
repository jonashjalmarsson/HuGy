<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Remove if you're not building a responsive site. (But then why would you do such a thing?) -->
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico"/>
		<?php wp_head(); ?>
		<style><?php
		if (get_field("hg_program_icons_svg","option") != "") { ?>
			.program-icon {
				background-image: <?php echo get_field("hg_program_icons_svg","option"); ?>
			}
		<?php }
		if (get_field("hg_program_icons_png","option") != "") { ?>
			#ie7 .program-icon,
			#ie8 .program-icon {
				background-image: <?php echo get_field("hg_program_icons_svg","option"); ?>
			}
		<?php }
		if (get_field("hg_quick_icons_svg","option") != "") { ?>
			.quick-icon {
				background-image: <?php echo get_field("hg_quick_icons_svg","option"); ?>
			}
		<?php }
		if (get_field("hg_quick_icons_png","option") != "") { ?>
			#ie7 .quick-icon,
			#ie8 .quick-icon {
				background-image: <?php echo get_field("hg_quick_icons_svg","option"); ?>
			}
		<?php } ?>
		</style>
	</head>
	<body <?php body_class((is_home()) ? 'home' : ''); ?>>
