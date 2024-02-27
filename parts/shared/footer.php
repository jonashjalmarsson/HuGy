	

	</article></div>
	<?php 
	/* main navigation */
	echo "<div class='pre-footer'>" . HuGy::get_main_navigation() . "</div>";
	echo "<a id='search'></a><div class='pre-footer-search'>";
	echo get_search_form();
	echo "</div>";
	?>
	<!-- <div class="up-icon"></div> -->
	<footer class="footer">
		<div class="footer-div">
		<?php if ( is_active_sidebar( 'footer' ) ) : ?>
			<div class="footer-container footer-1-container"><?php dynamic_sidebar( 'footer' ); ?></div><!-- .footer-1-container -->
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
			<div class="footer-container footer-2-container"><?php dynamic_sidebar( 'footer-2' ); ?></div><!-- .footer-2-container -->
		<?php endif; ?>
		<?php if ( get_field( 'innehall_i_sidfot', 'option' ) ) : ?>
			<div class="footer-container footer-3-container"><?php echo get_field( 'innehall_i_sidfot', 'option' ) ?></div><!-- .footer-3-container -->
		<?php endif; ?>
		</div>
		
		<div class="tech-logos hidden">
			<a class='wordpress-logo logo' target="_blank" href="http://www.wordpress.org"><img alt="WordPress logo" src="<?php echo  get_stylesheet_directory_uri(); ?>/images/wordpress-logo-32-blue.png" /></a>
			<a class='html5-logo logo' target="_blank" href="http://validator.w3.org/check?uri=<?php echo home_url(add_query_arg(array(),$wp->request)); ?>"><img alt="HTML5 logo" src="<?php echo  get_stylesheet_directory_uri(); ?>/images/HTML5_Logo_32.png" /></a>
			<a class='github-logo logo' target="_blank" href="https://github.com/hultsfredskommun/HuGy"><img alt="GitHub logo" src="<?php echo  get_stylesheet_directory_uri(); ?>/images/GitHub-Mark-32px.png" /></a>
		</div>
		<div class="copyright">
			&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved. 
			
			<a class='login' href="<?php echo wp_login_url( get_permalink() ); ?>" title="Login">Logga in</a>
		</div>
		
	</footer>
