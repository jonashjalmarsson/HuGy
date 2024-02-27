<?php header('X-UA-Compatible: IE=edge,chrome=1'); ?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	
		<meta name="viewport" content="width=device-width, initial-scale=1.0" /><!-- Remove if you're not building a responsive site. (But then why would you do such a thing?) -->
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php 
		
		?>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class((is_home()) ? 'home' : ''); ?>>
	<?php if ( get_field( 'innehall_i_topp_body', 'option' ) ) : ?>
		<!-- START innehall_i_topp_body --><script><?php echo get_field( 'innehall_i_topp_body', 'option' ) ?></script><!-- END innehall_i_topp_body -->
	<?php endif; ?>
