<?php header('X-UA-Compatible: IE=edge,chrome=1'); ?>
<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	
		<meta name="viewport" content="width=device-width, initial-scale=1.0" /><!-- Remove if you're not building a responsive site. (But then why would you do such a thing?) -->
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png" />
		<link rel="icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" />
		<link rel="apple-touch-icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon_144x144.png" />
		<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon_144x144.png"/>
		<?php 
		$hg_program_icons_svg = "";
		if ( is_array(get_field("hg_program_icons_svg","option")) ){
			$hg_program_icons_svg = get_field("hg_program_icons_svg","option")["url"];
		} 
		$hg_program_icons_png = "";
		if ( is_array(get_field("hg_program_icons_png","option")) ){
			$hg_program_icons_png = get_field("hg_program_icons_png","option")["url"];
		} 
		$hg_quick_icons_svg = "";
		if ( is_array(get_field("hg_quick_icons_svg","option")) ){
			$hg_quick_icons_svg = get_field("hg_quick_icons_svg","option")["url"];
		} 
		$hg_quick_icons_png = "";
		if ( is_array(get_field("hg_quick_icons_png","option")) ){
			$hg_quick_icons_png = get_field("hg_quick_icons_png","option")["url"];
		} 
		?>
		<?php wp_head(); ?>
		<style><?php
		if ($hg_program_icons_svg != "") { ?>
			.program-icon {
				background-image: url(<?php echo $hg_program_icons_svg; ?>);
			}
		<?php }
		if ($hg_program_icons_png != "") { ?>
			#ie7 .program-icon,
			#ie8 .program-icon {
				background-image: url(<?php echo $hg_program_icons_png; ?>);
			}
		<?php }
		if ($hg_quick_icons_svg != "") { ?>
			.quick-icon {
				background-image: url(<?php echo $hg_quick_icons_svg; ?>);
			}
		<?php }
		if ($hg_quick_icons_png != "") { ?>
			#ie7 .quick-icon,
			#ie8 .quick-icon {
				background-image: url(<?php echo $hg_quick_icons_png; ?>);
			}
		<?php } ?>
		</style>
	</head>
	<body <?php body_class((is_home()) ? 'home' : ''); ?>>
