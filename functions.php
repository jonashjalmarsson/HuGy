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
	 
	 ### Class: WP-PostViews Widget
	if(true) {
	class HuGy_WP_Widget_PostViews extends WP_Widget {
		// Constructor
		function HuGy_WP_Widget_PostViews() {
			$widget_ops = array('description' => __('HuGy WP-PostViews views statistics, tag-cloudified', 'wp-postviews'));
			$this->WP_Widget('views', __('HuGy Views', 'wp-postviews'), $widget_ops);
		}

		// Display Widget
		function widget($args, $instance) {
			extract($args);
			$title = apply_filters('widget_title', esc_attr($instance['title']));
			$mode = esc_attr($instance['mode']);
			$limit = intval($instance['limit']);
			$chars = intval($instance['chars']);
			echo $before_widget.$before_title.$title.$after_title;
			echo '<ul>'."\n";
		
		
		
			
			global $wpdb;
			$views_options = get_option('views_options');
			$where = '';
			$temp = '';
			$output = '';
			if(!empty($mode) && $mode != 'both') {
				$where = "post_type = '$mode'";
			} else {
				$where = '1=1';
			}
			$most_viewed = $wpdb->get_results("SELECT DISTINCT $wpdb->posts.*, (meta_value+0) AS views FROM $wpdb->posts LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.post_id = $wpdb->posts.ID WHERE post_date < '".current_time('mysql')."' AND $where AND post_status = 'publish' AND meta_key = 'views' AND post_password = '' ORDER BY views DESC LIMIT $limit");
			if($most_viewed) {
				foreach ($most_viewed as $post) {
					$post_views = intval($post->views);
					$post_title = get_the_title($post);
					if($chars > 0) {
						$post_title = snippet_text($post_title, $chars);
					}
					$post_excerpt = views_post_excerpt($post->post_excerpt, $post->post_content, $post->post_password, $chars);
					$temp = stripslashes($views_options['most_viewed_template']);
					$temp = str_replace("%VIEW_COUNT%", number_format_i18n($post_views), $temp);
					$temp = str_replace("%POST_TITLE%", $post_title, $temp);
					$temp = str_replace("%POST_EXCERPT%", $post_excerpt, $temp);
					$temp = str_replace("%POST_CONTENT%", $post->post_content, $temp);
					$temp = str_replace("%POST_URL%", get_permalink($post), $temp);
					$output .= $temp;
				}
			} else {
				$output = '<li>'.__('N/A', 'wp-postviews').'</li>'."\n";
			}

			echo $output;

			
			
			

			
			echo '</ul>'."\n";
			echo $after_widget;
		}

		// When Widget Control Form Is Posted
		function update($new_instance, $old_instance) {
			if (!isset($new_instance['submit'])) {
				return false;
			}
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['mode'] = strip_tags($new_instance['mode']);
			$instance['limit'] = intval($new_instance['limit']);
			$instance['chars'] = intval($new_instance['chars']);
			return $instance;
		}

		// DIsplay Widget Control Form
		function form($instance) {
			global $wpdb;
			$instance = wp_parse_args((array) $instance, array('title' => __('Views', 'wp-postviews'), 'mode' => 'both', 'limit' => 10, 'chars' => 200));
			$title = esc_attr($instance['title']);
			$mode = esc_attr($instance['mode']);
			$limit = intval($instance['limit']);
			$chars = intval($instance['chars']);
	?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'wp-postviews'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('mode'); ?>"><?php _e('Include Views From:', 'wp-postviews'); ?>
					<select name="<?php echo $this->get_field_name('mode'); ?>" id="<?php echo $this->get_field_id('mode'); ?>" class="widefat">
						<option value="both"<?php selected('both', $mode); ?>><?php _e('Posts &amp; Pages', 'wp-postviews'); ?></option>
						<option value="post"<?php selected('post', $mode); ?>><?php _e('Posts Only', 'wp-postviews'); ?></option>
						<option value="page"<?php selected('page', $mode); ?>><?php _e('Pages Only', 'wp-postviews'); ?></option>
					</select>
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('No. Of Records To Show:', 'wp-postviews'); ?> <input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo $limit; ?>" /></label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('chars'); ?>"><?php _e('Maximum Post Title Length (Characters):', 'wp-postviews'); ?> <input class="widefat" id="<?php echo $this->get_field_id('chars'); ?>" name="<?php echo $this->get_field_name('chars'); ?>" type="text" value="<?php echo $chars; ?>" /></label><br />
				<small><?php _e('<strong>0</strong> to disable.', 'wp-postviews'); ?></small>
			</p>
			<p style="color: red;">
				<small><?php _e('* If you are not using any category statistics, you can ignore it.', 'wp-postviews'); ?></small>
			<p>
			<input type="hidden" id="<?php echo $this->get_field_id('submit'); ?>" name="<?php echo $this->get_field_name('submit'); ?>" value="1" />
	<?php
		}
	} // end class
	
	### Function: Init HuGy WP-PostViews Widget
	add_action('widgets_init', 'hugy_widget_views_init');
	function hugy_widget_views_init() {
		register_widget('HuGy_WP_Widget_PostViews');
	}

	} // end if