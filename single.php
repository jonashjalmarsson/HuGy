<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div class="slideshow-wrapper">
		<?php /* slideshow */ ?>
		<?php echo HuGy::get_slideshow(get_field('hg_slideshow',get_the_ID()),'program slideshow','slideshow'); ?>
	</div>
	<div class='content-wrapper'>
		<div class="content">
			<h1><?php the_title(); ?></h1>
			<?php echo HuGy::get_tags(); ?>
			<?php echo HuGy::get_date(); ?>
			<?php echo HuGy::get_author(); ?>
			<?php the_content(); ?>			
		</div>
		<div class="block-wrapper">
			<?php echo HuGy::get_contacts(get_the_ID()); ?><?php echo HuGy::get_related(get_the_ID()); ?>
		</div>
	</div>

<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>