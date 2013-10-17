	

	</article></div>
	<?php 
	/* main navigation */
	echo "<div class='pre-footer'>" . HuGy::get_main_navigation() . "</div>";
	echo "<div class='pre-footer-program'>" . HuGy::get_program_icons() . "</div>"; ?>
	<div class="up-icon"><span>Upp</span></div>
	<footer>
		<div class="footer-div">
		<?php if ( is_active_sidebar( 'footer' ) ) : ?>
			<div class="footer-container">
				<?php dynamic_sidebar( 'footer' ); ?>
			</div><!-- .footer-container -->
		<?php endif; ?>
		<span class="copyright">&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</span>
		</div>
	</footer>
