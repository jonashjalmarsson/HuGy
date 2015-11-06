<?php
/**
 * Search results page
 * 
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); 
wp_reset_query();
?>


<div class="search-wrapper">
<?php echo get_search_form(); ?>
</div>
<div class="content-wrapper">
<?php if ( have_posts() ): ?>
<h1>Visar resultat f&ouml;r '<?php echo get_search_query(); ?>'</h1>
<ol>
<?php while ( have_posts() ) : the_post(); ?>
	<li>
		<article class="search-<?php echo get_post_type(); ?>">
			<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php if (get_post_type() == "post") :
				echo HuGy::get_date(); 
			endif;
			if (get_post_type() == "hugy_kontakt") :
				echo HuGy::get_author(); 
			endif; ?>
			<?php the_excerpt(); ?>
		</article>
	</li>
<?php endwhile; ?>
</ol>
<div class="navigation"><p><?php posts_nav_link('|',' F&ouml;reg&aring;ende ',' N&auml;sta '); ?></p></div>
<?php else: ?>
<h1>Inga resultat hittades f&ouml;r '<?php echo get_search_query(); ?>'</h1>
<?php endif; ?>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>