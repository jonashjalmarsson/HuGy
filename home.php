<?php
/**
 * The template for displaying program page.
 *
 * @package 	WordPress
 * @subpackage 	HuGy (Starkers)
 * @since 		HuGy 1.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php echo HuGy::get_program_icons(); ?>

<div class="posts-whole">
<div class="posts-wrapper">
	<div class="posts">
		<?php query_posts( 'posts_per_page=3' ); ?>
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?><div class="post post-<?php the_ID(); ?>">
			<?php echo get_the_post_thumbnail(get_the_ID(), 'news'); ?>
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
			<?php //comments_template( '', true ); ?>
			</div><?php endwhile; ?>
	</div>
</div>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>