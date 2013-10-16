<?php
/**
 * The template for displaying program page.
 * Template Name: Programsida
 *
 * @package 	WordPress
 * @subpackage 	HuGy (Starkers)
 * @since 		HuGy 1.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php /* pictogram */ ?>
<img title='<?php the_title(); ?>' src='<?php the_field("hg_bubbla",get_the_ID()); ?>' data-hover-src='<?php the_field("hg_pictogram",get_the_ID()); ?>' />
<?php /* slideshow */ ?>
<?php echo HuGy::get_slideshow(get_field('hg_slideshow',get_the_ID()),'slideshow'); ?>

<h1><?php the_title(); ?></h1>
<?php the_content(); ?>
<?php //comments_template( '', true ); ?>
<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>