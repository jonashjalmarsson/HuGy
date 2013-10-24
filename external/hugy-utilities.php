<?php
/*
 * Hultsfreds gymnasium - helper fuctions.
 */
 	/**
	 * hg
	 *
	 * HuGy Utilities Class v.1
	 *
	 * @package 	WordPress
	 * @subpackage 	Starkers (Starkers)
	 * @since 		HuGy 1.0
	 *
	 * We've included a number of helper functions that we use in every theme we produce.
	 * The main one that is used in Starkers is Starkers_Utilities::add_slug_to_body_class(), this will add the page or post slug to the body class
	 *
	 */
	 
	 class HuGy {

	 
		/*
		 *
		 */
		function get_quicklinks() {
			$retValue = "";

			if(get_field('hg_quicklinks', 'option')): 
		 
			$retValue .= "<div class='quicklinks-wrapper'>";
			$retValue .= "<ul class='quicklinks'>";
			while(has_sub_field('hg_quicklinks', 'option')):
				$retValue .= "<li>";
				$retValue .= "<a alt='" . get_sub_field('title') . "' href='" . get_sub_field('url') . "'>";
				$retValue .= "<span class='quick-icon quick-" .get_sub_field("imageplace") . "'></span>";
				$retValue .= "</a></li>";
			endwhile;
			$retValue .= "</ul></div>";
		 
			endif;
			return $retValue;
		}
		
		
		/*
		 *
		 */
		function get_program_icons() {
			$retValue = "";
			$args = array(
				'sort_order' => 'ASC',
				'sort_column' => 'post_title',
				'hierarchical' => 1,
				'exclude' => '',
				'include' => '',
				'authors' => '',
				'child_of' => 0,
				'parent' => -1,
				'exclude_tree' => '',
				'number' => '',
				'offset' => 0,
				'post_type' => 'page',
				'post_status' => 'publish',
				'meta_key' => '_wp_page_template',
				'meta_value' => 'page-hugy-program.php'
			); 
			$pages = get_posts($args);
			
			if (count($pages) > 0):
				$retValue .= "<ul class='program-icons'>";
				foreach($pages as $page) :
					$retValue .= "<li>";
					$retValue .= "<a alt='" . $page->post_title . "' href='" . get_page_link($page->ID) . "'>";
					$retValue .= "<span class='program-icon program-" .get_field("hg_imageplace",$page->ID) . "'></span>";
					$retValue .= "</a></li>";
				endforeach;
				$retValue .= "</ul>";
			endif;
			return $retValue ;
			
		}
		
		
		/*
		 *
		 */
		function get_slideshow($images, $wrapper_class_name = "slideshow", $size = "thumbnail") {
			global $image_sizes;
			$retValue = "";
			if( $images ): 
				$retValue .= "<div class='$wrapper_class_name'>";
				$retValue .= "<div class='slides'>";
				foreach( $images as $image ) :
					if (($image_sizes[$size][0] == "9999" || $image_sizes[$size][0] == $image["sizes"][$size."-width"] )
					 && ($image_sizes[$size][1] == "9999" || $image_sizes[$size][1] == $image["sizes"][$size."-height"])) {
						$url = $image["sizes"][$size];
					
						//$retValue .= "<li>";
						$retValue .= "<img src='" . $url ."' alt='" . $image['alt'] . "' />";
						//$retValue .= "<p>" . $image['caption'] . "</p>";
						//$retValue .= "</li>";
					}
				endforeach;
				$retValue .= "</ul>";
			$retValue .= "</div></div>";
			endif;
			return $retValue;
		}
		
		
		/*
		 *
		 */
		function get_top_parent($page_id = "") {
			$retValue = "";
			if (!isset($page_id) || $page_id == "") {
				$page_id = get_the_ID();
			}
			if (is_page($page_id)) {
				$page = get_post($page_id);
				while($page->post_parent > 0) {
					$page = get_page($page->post_parent);
				}
				$retValue = $page->ID;
			}
			return $retValue;
		}


		/*
		 *
		 */
		function get_breadcrumb($page_id = "") {
			$retValue = "";
			if (!isset($page_id) || $page_id == "") {
				$page_id = get_the_ID();
			}
			if (is_page($page_id)) {
				$page = get_post($page_id);
				$retValue = "";
				while($page->post_parent > 0) {
					$retValue = "<a href='" . get_page_link($page->ID) . "' title='" . $page->post_title . "'> " . $page->post_title . "</a> / " . $retValue;

					$page = get_page($page->post_parent);
				}
				$retValue = "<a href='" . get_home_url() . "' title='Tillbaka hem'><span class='home-icon'></span></a> / <a href='" . get_page_link($page->ID) . "' title='" . $page->post_title . "'>" . $page->post_title . "</a> / " . $retValue;
			}
			return $retValue;
		}
		
		
		/*
		 *
		 */
		function get_page_tree($page_id = "") {
			$retValue = "";
			if (!isset($page_id) || $page_id == "") {
				$page_id = get_the_ID();
			}
			$page = get_post($page_id);
			if ($page->post_type == "page") {
				$args = array(
					'depth'        => 0,
					'show_date'    => '',
					'date_format'  => get_option('date_format'),
					'child_of'     => $page_id,
					'exclude'      => '',
					'include'      => '',
					'title_li'     => "",
					'echo'         => 0,
					'authors'      => '',
					'sort_column'  => 'menu_order, post_title',
					'link_before'  => '',
					'link_after'   => '',
					'walker'       => '',
					'post_type'    => 'page',
					'post_status'  => 'publish' 
				); 
				$retValue .= wp_list_pages( $args );
			}
			return $retValue;
		}
		

		/*
		 *
		 */
		function get_main_navigation() {
			$retValue = "";
			if (has_nav_menu('primary')) {
				$args = array( 
				'theme_location' => 'primary', 
				'echo' => false,
				'container' => '',
				'before' => '',
				'after' => '',
				);
					
				$retValue .= "<nav class='main-menu-wrapper'>";
				//$retValue .= wp_nav_menu($args);
				
				$args = array(
				'order'                  => 'ASC',
				'orderby'                => 'menu_order',
				'post_type'              => 'nav_menu_item',
				'post_status'            => 'publish',
				'output'                 => ARRAY_A,
				'output_key'             => 'menu_order',
				'nopaging'               => true,
				'update_post_term_cache' => false );
				
				$menu_name = 'primary';
				if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
					$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

					$menu_items = wp_get_nav_menu_items($menu->term_id);
					$retValue .= "<ul class='menu cols-".count($menu_items)."'>";
					foreach($menu_items as $menu_item) {
						$currentclass = "";
						if ($menu_item->object_id == get_the_ID())
							$currentclass = " class='current_page_item'";
						$retValue .= "<li$currentclass><a class='menu-head' href='" . get_page_link($menu_item->object_id) . "'>" . get_the_title($menu_item->object_id) . "</a><ul class='children'>";
						$retValue .= HuGy::get_page_tree($menu_item->object_id);
						$retValue .= "</ul></li>";
					}
					$retValue .= "</ul>";
				}
				$retValue .= "</nav>";
			}
			return $retValue;
		}
		
		
		function get_modules($page_id = "") {
			$retValue = "";
			if ($page_id != "") {
				$field = $page_id;
			}
			else {
				$field = 'option';
			}

			while (the_flexible_field("hg_modules",$field)) :
				
				$retValue .= "<div class='" . get_row_layout() . "-module-wrapper module-wrapper'>";
					$retValue .= "<div class='" . get_row_layout() . "-module module'>";
					if (get_row_layout() == "facebook"):
						$retValue .= "<h1>Vad händer mer...</h1><div class='facebook-wall facebook-$field'></div>";
						$retValue .= "<script>(function($) {
								$('.facebook-$field').facebook_wall({
									id: '".get_sub_field("id",$field)."',
									access_token: '".get_sub_field("accesstoken",$field)."',
									limit: 6
								});
						})(jQuery);
						</script>";
					elseif (get_row_layout() == "program"):
						$retValue .= HuGy::get_program_icons();
					elseif (get_row_layout() == "nyheter"):
						$retValue .= HuGy::get_news();
					elseif (get_row_layout() == "text"):
						$retValue .= get_sub_field('text');
					endif;
					$retValue .= "</div>";
					$retValue .= "</div>";
			endwhile;
			return $retValue;
		}
		
		
		function get_news() {
			$retValue = "<h1>Nytt på skolan</h1>";
			// The Query
			$the_query = new WP_Query( array(
											'post_type' => 'post',
											'posts_per_page' => 3 ));

			// The Loop
			if ( $the_query->have_posts() ) {
				$retValue .= "<div class='items'>";
				while ( $the_query->have_posts() ) {
					$retValue .= "<div class='item  ic_container'>";
					$the_query->the_post();
					//$retValue .= "<div class='item-img'>";
					$retValue .=  get_the_post_thumbnail(get_the_ID(), 'news'); 
					//$retValue .= "</div>";
					$retValue .= "<div class='item-content  ic_caption'>";
					$retValue .= "<a href='" . get_permalink() . "'><h2>" . get_the_title() . "</h2>";
					$retValue .= get_the_excerpt();
					$retValue .= "</a></div>";
					$retValue .= "</div>";
				}
				$retValue .= "</div>";
			} else {
				// no posts found
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			return $retValue;
		}
	}
	
 ?>