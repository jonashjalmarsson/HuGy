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
	<?php /* slideshow */ ?>
	<?php echo HuGy::get_slideshow(get_field('hg_slideshow',get_the_ID()), 'slideshow'); ?>
	<!-- <div class='module-wrapper nyheter-module-wrapper'> -->
	<div class='content-wrapper'>
		<h1><?php the_title(); ?></h1>
		<?php //echo HuGy::get_news(12); ?>



		<?php //if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php //echo HuGy::get_columntext(); ?>
		<?php the_content(); ?>
		<?php //endwhile; ?>
		<?php $news_per_page = 12; ?>
		<div class="news-wrapper">
			<?php echo HuGy::get_text_news($news_per_page); ?>
		</div>

		<?php // load more button ?>
		<div class="navigation news-navigation"><a href="#" class="load-more-news" data-news_per_page='<?php echo $news_per_page; ?>'>Visa fler nyheter</a></div>
		<?php //endif; ?>
	</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
