<div class="the-wrapper">
	<header class="header-wrapper">
		<div class="top-wrapper">
			<div class="top">
				<div class="logo-space">
					<a href="<?php echo home_url(); ?>"><img class="logo" title="Hultsfreds gymnasium" src="<?php echo get_template_directory_uri() . "/images/hultsfreds-gymnasium.png"; ?>" alt='Hultsfreds gymnasium' /></a>
				</div>
				<div class="top-links-wrapper">
					<?php echo HuGy::get_quicklinks(); ?>
					<?php echo HuGy::get_todaysdate_text(); ?>
				</div>
			</div>
			
		</div>
	</header>

	<div class="top-navigation-wrapper">
		<div class="top-navigation">
			<div class="top-navigation-left">
				<a class="top-menu-button" href="#menu" title="&Ouml;ppna meny"><?php echo HuGySVG::get('menu') ?>Meny</a>
				<div class="breadcrumb"><?php echo HuGy::get_breadcrumb(); ?></div>
			</div>
			<div class="top-navigation-right">
				<div class="top-search-form">
					<?php echo get_search_form(); ?>
				</div>
				<div class="top-search-button">
					<a href="#search" title="S&ouml;k efter inneh&aring;ll p&aring; sidan"><span class='search-icon'></span></a>
				</div>
			</div>
		</div>
	</div>


<div class="page-wrapper">
<article class="page">

