<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );
	require_once( 'external/hugy-utilities.php' );
	require_once( 'external/acf-includes.php' );

	/* ========================================================================================================================
	
	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme
	
	======================================================================================================================== */

	add_theme_support('post-thumbnails');
	if ( function_exists( 'add_image_size' ) ) { 
		$image_sizes = array();
		$image_sizes["news"] = array("375","210",true);
		$image_sizes["program"] = array("200","9999",false);
		$image_sizes["slideshow"] = array("1100","400",true);
		$image_sizes["firstpage"] = array("2000","9999",false);
		
		foreach($image_sizes as $key => $size) {
			add_image_size( $key, $size[0], $size[1], $size[2] );
		}
		//add_image_size( 'program', 300, 9999 ); //300 pixels wide (and unlimited height)
		//add_image_size( 'slideshow', 1100, 400, true ); //(cropped)
		//add_image_size( 'firstpage', 2000, 9999 ); //(cropped)
		
	}
	
	register_nav_menus(array('primary' => 'Primary Navigation'));
	
	$args = array(
		'name'          => 'Footer',
		'id'            => 'footer',
		'description'   => 'Place widgets in footer an all pages.',
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' ); 
	register_sidebar($args);
	$args = array(
		'name'          => 'Footer2',
		'id'            => 'footer-2',
		'description'   => 'Place widgets in footer an all pages.',
		'class'         => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' ); 
	register_sidebar($args);
		
	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */
	
	require_once( 'parts/hugy-contact-post-type.php' );


	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function starkers_script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}	

	/* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}
	
	
	
	/*
	 * HuGy addons
	 */