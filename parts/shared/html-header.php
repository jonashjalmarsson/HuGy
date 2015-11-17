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
		<?php 
		
		/*
		print_r(get_field("hg_program_icons_svg","option"));
		echo "<br>[url]";
		echo get_field("hg_program_icons_svg","option")["url"];
		echo "<br>->url";
		echo get_field("hg_program_icons_svg","option")->url;
		*/
		
		$hg_program_icons_svg = "";
		$hg_program_icons_svg_var = get_field("hg_program_icons_svg","option");
		if ( is_array($hg_program_icons_svg_var) && isset($hg_program_icons_svg_var) && isset($hg_program_icons_svg_var["url"]) ){
			$hg_program_icons_svg = $hg_program_icons_svg_var["url"];
		} 
		
		$hg_program_icons_png = "";
		$hg_program_icons_png_var = get_field("hg_program_icons_png","option");
		if ( is_array($hg_program_icons_png_var) && isset($hg_program_icons_png_var) && isset($hg_program_icons_png_var["url"]) ){
			$hg_program_icons_png = $hg_program_icons_png_var["url"];
		} 
		
		$hg_quick_icons_svg = "";
		$hg_quick_icons_svg_var = get_field("hg_quick_icons_svg","option");		
		if ( is_array($hg_quick_icons_svg_var) && isset($hg_quick_icons_svg_var) && isset($hg_quick_icons_svg_var["url"]) ){
			$hg_quick_icons_svg = $hg_quick_icons_svg_var["url"];
		} 
		
		$hg_quick_icons_png = "";
		$hg_quick_icons_png_var = get_field("hg_quick_icons_png","option");
		if ( is_array($hg_quick_icons_png_var) && isset($hg_quick_icons_png_var) && isset($hg_quick_icons_png_var["url"]) ){
			$hg_quick_icons_png = $hg_quick_icons_png_var["url"];
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
	<?php if ( get_field( 'innehall_i_topp_body', 'option' ) ) : ?>
		<!-- START innehall_i_topp_body --><?php echo get_field( 'innehall_i_topp_body', 'option' ) ?><!-- END innehall_i_topp_body -->
	<?php endif; ?>
