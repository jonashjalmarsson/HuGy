<header>
	<div class="top-wrapper">
		<div class="top">
			<div class="logo-space">
				<a href="<?php echo home_url(); ?>"><img class="logo" title="Hultsfreds gymnasium" src="<?php echo get_template_directory_uri() . "/images/hultsfreds-gymnasium.png"; ?>" /></a>
				<h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			</div><div class="top-links-wrapper">
				<?php echo HuGy::get_quicklinks(); ?>
				
			</div>
		</div>
		
		<div class="top-navigation-wrapper">
			<div class="top-navigation">
					<div class="top-menu-button">
						<a href="#menu" title="Öppna meny"><span class='menu-icon'></span>Meny</a>
					</div>
					<div class="breadcrumb"><?php echo HuGy::get_breadcrumb(); ?></div>
			</div>
		</div>
	</div>
	<div class='main-menu'><?php echo HuGy::get_main_navigation(); ?></div>
	<?php get_search_form(); ?>
	<?php 
	if (is_home()) :
		/* slideshow */
		echo HuGy::get_slideshow(get_field('hg_firstpage_slideshow','option'),'firstpage slideshow','firstpage');
		echo "<div class='teaser-1 teaser-icon'><span>Nyfiken på mer</span></div>";

	endif; ?>
</header>
<div class="page-wrapper">
<article class="page">

