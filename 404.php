<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="page-wrapper">
<article class="page">
<?php $posts = get_posts( array('post_type' => 'page',  'name' => 'fel404' ) );
if ($posts) {
	foreach ( $posts as $post ) : setup_postdata( $post );
		?>

		<div class="slideshow-wrapper">
			<?php /* slideshow */ ?>
			<?php echo HuGy::get_slideshow(get_field('hg_slideshow',get_the_ID()),'program slideshow','slideshow'); ?>
		</div>
		<div class="content-wrapper">
			<div class="content">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
				<?php //comments_template( '', true ); ?>
			</div>
			<div class="block-wrapper">
			<?php echo HuGy::get_contacts(get_the_ID()); ?><?php echo HuGy::get_related(get_the_ID()); ?>
			</div>
			<?php echo HuGy::get_modules(get_the_ID()); ?>
		</div>

		<?php

	endforeach;
}
else { ?>
		<div class="content-wrapper">
			<div class="content">
			<h1>Page not found</h1>
			Hittade inte sidan du s&ouml;kte.
		</div></div>
<?php }
?>
</article></div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>