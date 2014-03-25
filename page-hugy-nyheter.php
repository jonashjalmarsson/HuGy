<?php
/**
 * The template for displaying news.
 * Template Name: HuGy Nyhetslista
 *
 * @package 	WordPress
 * @subpackage 	HuGy (Starkers)
 * @since 		HuGy 1.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
	<div class="slideshow-wrapper">
		<?php /* slideshow */ ?>
		<?php echo HuGy::get_slideshow(get_field('hg_slideshow',get_the_ID()),'program slideshow','slideshow'); ?>
	</div>
	<div class='content-wrapper'>
		<h1><?php the_title(); ?></h1>
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php echo HuGy::get_columntext(); ?>
		<?php the_content(); ?>
		<?php endwhile; ?>

		<?php $args = array(
			'paged'			   => $paged,
			'offset'           => 0,
			'category'         => '',
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'post',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'post_status'      => 'publish',
			'suppress_filters' => true ); 
			
		query_posts( $args ); ?>
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<h2><a class='nolink' href='<?php echo get_post_permalink(get_the_ID()); ?>'><?php the_title(); ?></a></h2>
		<time class='time' datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate>DATUM: <?php echo get_the_date(); ?> <?php the_time(); ?></time>
		<?php echo HuGy::get_author(); ?>
		<div class="slideshow-wrapper">
			<?php /* slideshow */ ?>
			<?php //echo HuGy::get_slideshow(get_field('hg_slideshow',get_the_ID()),'program slideshow','slideshow'); ?>
		</div>
		<?php (get_option('rss_use_excerpt'))?the_excerpt():the_content(); ?>
		<?php endwhile; ?>
		
		<div class="navigation"><p><?php posts_nav_link('|',' F&ouml;reg&aring;ende ',' N&auml;sta '); ?></p></div>
	</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>