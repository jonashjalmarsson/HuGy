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
	add_theme_support('html5', array('search-form'));
	if ( function_exists( 'add_image_size' ) ) { 
		$image_sizes = array();
		$image_sizes["news"] = array("375","210",true);
		$image_sizes["program"] = array("150","9999",false);
		$image_sizes["slideshow"] = array("1100","400",true);
		$image_sizes["firstpage"] = array("9999","518",false);
		
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
	

	// add mime extensions 
	function custom_upload_mimes ( $existing_mimes=array() ) {
		// add your extension to the array
		$existing_mimes['eps'] = 'image/eps';
		$existing_mimes['svg'] = 'image/svg';
		
		if (current_user_can('manage_options')) {
			$existing_mimes['exe'] = 'application/exe';
		}
		else {
			unset($existing_mimes['exe']);
		}
		return $existing_mimes;
	}
	add_filter('upload_mimes', 'custom_upload_mimes');

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
		wp_register_style( 'print', get_stylesheet_directory_uri().'/style-print.css', '', '', 'print' );
        wp_enqueue_style( 'print' );
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
	if(class_exists('WP_Widget_Most_Viewed_Posts')) { // check if plugin is enabled
		class HuGy_WP_Widget_Most_Viewed_Posts extends WP_Widget {

			function __construct() {
				$widget_ops = array('classname' => 'widget_most_viewed_entries', 'description' => __( 'The most viewed posts on your site', 'bawpvc' ) );
				parent::__construct('most-viewed-posts', __( 'HuGy Most Viewed Posts', 'bawpvc' ), $widget_ops);
				$this->alt_option_name = 'widget_most_viewed_entries';

				add_action( 'save_post', array(&$this, 'flush_widget_cache') );
				add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
				add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
			}

			function widget($args, $instance) {
				$cache = wp_cache_get('widget_most_viewed_entries', 'widget');
				if ( !is_array($cache) )
					$cache = array();

				if ( ! isset( $args['widget_id'] ) )
					$args['widget_id'] = $this->id;

				if ( isset( $cache[ $args['widget_id'] ] ) ) {
					echo $cache[ $args['widget_id'] ];
					return;
				}

				ob_start();
				extract($args);

				$title = apply_filters('widget_title', empty($instance['title']) ? __('Most Viewed Posts') : $instance['title'], $instance, $this->id_base);
				if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
					$number = 10;
				global $timings;
				$date = $instance['date'] != '' ? $instance['date'] : date( $timings[$instance['time']] );
				$date = $instance['time'] == 'all' ? '' : '-' . $date;
				$time = $instance['time'];
				$exclude_cat = $instance['exclude_cat'];
				$order = $instance['order'] == 'ASC' ? 'ASC' : 'DESC';
				$author_id = $instance['author'];
				$meta_key = apply_filters( 'baw_count_views_meta_key', '_count-views_' . $time . $date, $time, $date );
				
				global $bawpvc_options;
				$r = new WP_Query( array(	
											'posts_per_page' => $number, 
											'no_found_rows' => true, 
											'post_status' => 'publish', 
											'ignore_sticky_posts' => true, 
											'meta_key' => $meta_key, 'meta_value_num' => '0', 
											'meta_compare' => '>', 
											'orderby'=>'meta_value_num', 
											'order'=>$order,
											'author'=>$author_id,
											'category__not_in'=>$exclude_cat,
											'post_type'=> apply_filters( 'baw_count_views_widget_post_types', $bawpvc_options['post_types'] )
										) 
								);
				if ($r->have_posts()) :
					$largest_count = -1;
				?>
				<?php echo $before_widget; ?>
				<?php if ( $title ) echo $before_title . $title . $after_title; ?>
				<div class="wp-views-cloud">
				<?php  while ($r->have_posts()) : $r->the_post(); ?>
				<?php
					$count = '';
					$post_views = (int)get_post_meta( get_the_ID(), $meta_key, true );
					if( $instance['show'] ):
						$count = $post_views;
						do_action( 'baw_count_views_count_action', $count, $meta_key, $time, $date, get_the_ID() );
						$count = apply_filters( 'baw_count_views_count', $count, $meta_key, $time, $date );
					endif;
					
						
						if ($largest_count == -1)
							$largest_count = $post_views;
							
						//case 
						switch(intval($post_views*4/$largest_count)) {
							case 4:
								$class = 'large';
								break;
							case 3:
								$class = 'medium';
								break;
							case 2:
								$class = 'small';
								break;
							case 1:
								$class = 'mini';
								break;
							default:
								$class = 'tiny';
								break;
						}
						/*
						$post_title = get_the_title($post);
						if($chars > 0) {
							$post_title = snippet_text($post_title, $chars);
						}
						$post_excerpt = views_post_excerpt($post->post_excerpt, $post->post_content, $post->post_password, $chars);
						$output .= "<a class='$class views-cloud-item' href='" . get_permalink($post) . "' title='$post_excerpt'>";
						$output .= $post_title;
						$output .= "</a>";*/
				?>
				
				<a class="<?php echo $class; ?> views-cloud-item" href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); echo $count; ?></a>
				
				
				<?php endwhile; ?>
				</div>
				<?php echo $after_widget; ?>
				<?php
				// Reset the global $the_post as this query will have stomped on it
				wp_reset_postdata();

				endif;

				$cache[$args['widget_id']] = ob_get_flush();
				wp_cache_set('widget_most_viewed_entries', $cache, 'widget');
			}

			function update( $new_instance, $old_instance ) {
				$instance = $old_instance;
				$instance['exclude_cat'] = $new_instance['exclude_cat'];
				$instance['title'] = strip_tags($new_instance['title']);
				$instance['author'] = $new_instance['author'];
				$instance['time'] = $new_instance['time'];
				$instance['date'] = $new_instance['date'];
				$instance['number'] = (int) $new_instance['number'];
				$instance['show'] = (bool)$new_instance['show'];
				$instance['order'] = $new_instance['order'] == 'ASC' ? 'ASC' : 'DESC';

				$this->flush_widget_cache();

				$alloptions = wp_cache_get( 'alloptions', 'options' );
				if ( isset($alloptions['widget_most_viewed_entries']) )
					delete_option('widget_most_viewed_entries');

				return $instance;
			}

			function flush_widget_cache() {
				wp_cache_delete('widget_most_viewed_entries', 'widget');
			}

			function form( $instance ) {
				$exclude_cat = isset($instance['exclude_cat']) ? $instance['exclude_cat'] : '';
				$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
				$number = isset($instance['number']) ? absint($instance['number']) : 5;
				$time = isset($instance['time']) ? ($instance['time']) : 'all';
				$author_id = isset($instance['author']) ? ($instance['author']) : '';
				$date = isset($instance['date']) ? ($instance['date']) : '';
				$show = isset($instance['show']) ? $instance['show'] == 'on' : true;
				if( isset( $instance['order'] ) )
					$order = $new_instance['order'] == 'ASC' ? 'ASC' : 'DESC';
				else
					$order = 'DESC';
		?>
				<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'bawpvc' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

				<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e( 'How many posts:', 'bawpvc' ); ?></label>
				<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

				<p><label for="<?php echo $this->get_field_id('time'); ?>"><?php _e( 'Which top do you want:', 'bawpvc' ); ?></label>
				<select id="<?php echo $this->get_field_id('time'); ?>" name="<?php echo $this->get_field_name('time'); ?>">
				<?php global $timings;
					foreach( $timings as $timing=>$dummy ) { ?>
					<option value="<?php echo esc_attr( $timing ); ?>" <?php selected( $timing, $time ); ?>><?php echo ucwords( esc_html( $timing ) ); ?></option>
					<?php } ?>
				</select>
				
				<p><label for="<?php echo $this->get_field_id('author'); ?>"><?php _e( 'Top for this author only:', 'bawpvc' ); ?></label>
				<select id="<?php echo $this->get_field_id('author'); ?>" name="<?php echo $this->get_field_name('author'); ?>">
					<option value=""><?php _e( 'All authors', 'bawpvc' ); ?></option>
				<?php foreach( get_users() as $u ) { ?>
					<option value="<?php echo $u->ID; ?>" <?php selected( $author_id, $u->ID ); ?>><?php echo ucwords( esc_html( $u->display_name ) ); ?></option>
					<?php } ?>
				</select>
				<?php /* /// soon
				<p><label for="<?php echo $this->get_field_id('author'); ?>"><?php _e( 'Exclude categories: (Multiple choise possible)', 'bawpvc' ); ?></label>
				<?php add_filter( 'wp_dropdown_cats', 'bawmrp_wp_dropdown_cats' ); ?>
				<?php wp_dropdown_categories( array( 'name'=>$this->get_field_name('exclude_cat').'[]' ) ); //// ?>
				<?php remove_filter( 'wp_dropdown_cats', 'bawmrp_wp_dropdown_cats' ); ?>
				<?php print_r( $exclude_cat ); ?>
				*/ ?>
				<p><label for="<?php echo $this->get_field_id('date'); ?>"><?php _e( 'Date format', 'bawpvc' ); ?> <code>YYYYMMAA</code></label>
				<input id="<?php echo $this->get_field_id('date'); ?>" name="<?php echo $this->get_field_name('date'); ?>" type="text" value="<?php echo esc_attr( $date ); ?>" size="6" maxlength="8" /><br />
				<code><?php _e( 'If you leave blank the actual time will be used.', 'bawpvc' ); ?></code></p>

				<p><label for="<?php echo $this->get_field_id('show'); ?>"><?php _e( 'Show posts count:', 'bawpvc' ); ?></label>
				<input id="<?php echo $this->get_field_id('show'); ?>" name="<?php echo $this->get_field_name('show'); ?>" type="checkbox" <?php checked( $show == true, true ); ?> /></p>

				<p><label for="<?php echo $this->get_field_id('order'); ?>"><?php _e( 'Order', 'bawpvc' ); ?></label>
				<select id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>">
					<option value="DESC" <?php selected( $order, 'DESC' ); ?>><?php _e( 'From most viewed to less viewed', 'bawpvc' ); ?></option>
					<option value="ASC" <?php selected( $order, 'ASC' ); ?>><?php _e( 'From less viewed to most viewed', 'bawpvc' ); ?></option>
				</select>
				</p>

		<?php
			}
		} // end class
		
		### Function: Init HuGy Most Viewed Widget
		add_action('widgets_init', 'hugy_widget_most_viewed_init');
		function hugy_widget_most_viewed_init() {
			register_widget('HuGy_WP_Widget_Most_Viewed_Posts');
		}

	} // end if
	
	
	
	
	
	
	
	 ### Class: WP-PostViews Widget
	if(class_exists('WP_Widget_PostViews')) { // check if plugin is enabled
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
				echo '<div class="wp-views-cloud">'."\n";
			
			
			
				
				global $wpdb;
				$views_options = get_option('views_options');
				$where = '';
				$output = '';
				if(!empty($mode) && $mode != 'both') {
					$where = "post_type = '$mode'";
				} else {
					$where = '1=1';
				}
				$largest_count = -1;
				$most_viewed = $wpdb->get_results("SELECT DISTINCT $wpdb->posts.*, (meta_value+0) AS views FROM $wpdb->posts LEFT JOIN $wpdb->postmeta ON $wpdb->postmeta.post_id = $wpdb->posts.ID WHERE post_date < '".current_time('mysql')."' AND $where AND post_status = 'publish' AND meta_key = 'views' AND post_password = '' ORDER BY views DESC LIMIT $limit");
				if($most_viewed) {
					foreach ($most_viewed as $post) {
						$post_views = intval($post->views);
						if ($largest_count == -1)
							$largest_count = $post_views;
							
						//case 
						switch(intval($post_views*4/$largest_count)) {
							case 4:
								$class = 'large';
								break;
							case 3:
								$class = 'medium';
								break;
							case 2:
								$class = 'small';
								break;
							case 1:
								$class = 'mini';
								break;
							default:
								$class = 'tiny';
								break;
						}
						
						$post_title = get_the_title($post);
						if($chars > 0) {
							$post_title = snippet_text($post_title, $chars);
						}
						$post_excerpt = views_post_excerpt($post->post_excerpt, $post->post_content, $post->post_password, $chars);
						$output .= "<a class='$class views-cloud-item' href='" . get_permalink($post) . "' title='$post_excerpt'>";
						$output .= $post_title;
						$output .= "</a>";
					}
				} else {
					$output = 'Nothing here..';
				}

				echo $output;

				
				
				

				
				echo '</div>'."\n";
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