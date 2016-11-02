<?php
/**
 * The template for displaying program page.
 * Template Name: HuGy Programsida
 *
 * @package 	WordPress
 * @subpackage 	HuGy (Starkers)
 * @since 		HuGy 1.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="slideshow-wrapper">
	<?php /* pictogram */ ?>
	<?php 
	$bubbla = wp_get_attachment_image_src( get_field('hg_pictogram',get_the_ID()), "program");
	if (isset($bubbla) && is_array($bubbla) && count($bubbla) > 0)
		$bubbla = $bubbla[0];
	$hover = wp_get_attachment_image_src( get_field('hg_bubbla',get_the_ID()), "program");
	if (isset($hover) && is_array($hover) && count($hover) > 0)
		$hover = "data-hover='" . $hover[0] . "'";
	?>
	<?php if (isset($bubbla) && $bubbla != "") : ?>
	<div class="picto">
		<img class="hover-image" alt='<?php the_title(); ?>' src='<?php echo $bubbla; ?>' <?php echo $hover ?> />
	</div>
	<?php endif; ?>
	<?php /* slideshow */ ?>
	<?php echo HuGy::get_slideshow(get_field('hg_slideshow',get_the_ID()),'program slideshow','slideshow'); ?>
</div>
<div class="content-wrapper">
	<div class="content">
		<h1><?php the_title(); ?></h1>
		<?php echo HuGy::get_tags(); ?>
		<?php //echo HuGy::get_date(); ?>
		<?php //echo HuGy::get_author(); ?>
		<?php echo HuGy::get_columntext(); ?>
		<?php the_content(); ?>
		<?php //comments_template( '', true ); ?>
	</div>
	<div class="block-wrapper">
	<?php echo HuGy::get_contacts(get_the_ID()); ?><?php echo HuGy::get_related(get_the_ID()); ?>
	</div>
	<?php echo HuGy::get_modules(get_the_ID()); ?>

</div>
<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>