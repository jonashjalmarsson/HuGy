<header class="white header-wrapper">
	<div class="top-wrapper">
		<div class="top">
			<div class="top-links-wrapper">
				<?php echo HuGy::get_quicklinks(); ?>
			</div><div class="logo-space">
				<div id="betaicon"><a href='<?php echo get_site_url() ?>/betapage'><img src='<?php echo get_stylesheet_directory_uri() ?>/images/beta.png' /></a></div>
				<a href="<?php echo home_url(); ?>"><img class="logo" title="Hultsfreds gymnasium" src="<?php echo get_template_directory_uri() . "/images/hultsfreds-gymnasium.png"; ?>" /></a>
				<h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			</div>
		</div>
		
	</div>
	
	<div class="top-navigation-wrapper">
		<div class="top-navigation">
				<div class="top-menu-button">
					<a href="#menu" title="Öppna meny"><span class='menu-icon'></span><span class='text'>Meny</span></a>
				</div>
				<div class="breadcrumb"><?php echo HuGy::get_breadcrumb(); ?></div>
		</div>
	</div>
</header>
	<!-- div class='main-menu'><?php //echo HuGy::get_main_navigation(); ?></div //-->
	<?php get_search_form(); ?>
	<?php 
	if (is_home()) :
		/* slideshow */
		echo HuGy::get_slideshow(get_field('hg_firstpage_slideshow','option'),'firstpage slideshow','firstpage');
		echo "<div class='teaser-1 teaser-icon teaser'></div>";
		echo HuGy::get_teasers();
		echo "<div class='firstpage-menu'>";
		echo "<a class='menu' href='#menu'></a>";
		echo "<a class='nyheter' href='#nyheter'></a>";
		echo "<a class='facebook' href='#facebook'></a>";
		echo "</div>";

	endif; ?>

<div class="page-wrapper">
<article class="page">

