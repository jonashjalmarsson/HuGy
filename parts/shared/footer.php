	

	</article></div>
	<?php 
	/* main navigation */
	echo "<div class='pre-footer'>" . HuGy::get_main_navigation() . "</div>";
	echo "<div class='pre-footer-program'>" . HuGy::get_program_icons() . "</div>"; ?>
	<div class="up-icon"></div>
	<footer>
		<div class="footer-div">
		<?php if ( is_active_sidebar( 'footer' ) ) : ?>
			<div class="footer-container footer-1-container"><?php dynamic_sidebar( 'footer' ); ?></div><!-- .footer-container -->
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
			<div class="footer-container footer-2-container"><?php dynamic_sidebar( 'footer-2' ); ?></div><!-- .footer-container -->
		<?php endif; ?>
		</div>
		<span class="copyright">&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</span>
	</footer>
