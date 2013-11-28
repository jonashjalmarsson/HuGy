	

	</article></div>
	<?php 
	/* main navigation */
	echo "<div class='pre-footer'>" . HuGy::get_main_navigation() . "</div>";
	echo "<a name='search' id='search'></a><div class='pre-footer-search'>";
	echo "<span class='search-icon'></span>";
	echo get_search_form();
	echo "</div>";
	echo "<div class='pre-footer-program'>" . HuGy::get_program_links() . "</div>"; ?>
	<div class="up-icon"></div>
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
		<span class="copyright">&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved. <a class='login' href="<?php echo wp_login_url( get_permalink() ); ?>" title="Login">Logga in</a></span>
		
	</footer>
