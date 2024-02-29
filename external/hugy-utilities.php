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
	$contact_vars = array(
		'imagesize' => 'thumbnail',
		'title' => 'Kontakter',
		'class' => 'contacts',
		'excerpt' => true);

	class HuGy {

	 
		/*
		 * Get quick links with image place. Placed on top of page.
		 */
		static public function get_quicklinks() {
			$retValue = "";

			if(get_field('hg_quicklinks', 'option')): 
		 
			$retValue .= "<div class='quicklinks-wrapper'>";
		
			while(has_sub_field('hg_quicklinks', 'option')):
				$retValue .= "<a title='" . get_sub_field('type') . "' href='" . get_sub_field('url') . "'>";
				$retValue .= HuGySVG::get(get_sub_field('type'));
				$retValue .= "</a>";
			endwhile;
			$retValue .= "</div>";
		 
			endif;
			return $retValue;
		}




		/*
		 * Get quick menu. Placed in menu.
		 */
		static public function get_quickmenu() {
			$retValue = "";

			if(get_field('direktlankar_i_menyn', 'option')): 
		 
				while ( has_sub_field('direktlankar_i_menyn', 'option') ):
					if (get_row_layout() == 'intern_lank') {
						$link = get_sub_field('intern_lank');
						$retValue .= "<li>";
						$retValue .= "<a title='" . $link->excerpt . "' href='" . get_permalink($link->ID) . "'>";
						$retValue .= $link->post_title;
						$retValue .= "</a></li>";
					}
					else if ( get_row_layout() == 'extern_lank' ) {
						$retValue .= "<li>";
						$retValue .= "<a title='" . get_sub_field('beskrivning') . "' href='" . get_sub_field('url') . "'>";
						$retValue .= get_sub_field('titel');
						$retValue .= "</a></li>";
					}
				endwhile;
		 
			endif;
			return $retValue;
		}
		
		
		/*
		 *
		 */
		static public function get_program_links( $wrapping_ul = true, $page_template = "page-hugy-program.php" ) {
			$retValue = "";
			$args = array(
				'order' => 'ASC',
				'orderby' => 'title',
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
				'posts_per_page' => -1,
				'meta_key' => '_wp_page_template',
				'meta_value' => $page_template,
			); 
			$pages = get_posts($args);
			
			
			if ( count( $pages ) > 0 ):
				if ($wrapping_ul)
					$retValue .= "<ul class='program-icons'>";
				foreach ( $pages as $page ) :
					$current_class = '';
					if (get_the_ID() == $page->ID)
						$current_class = ' current_page_item';
					$retValue .= "<li class='page_item$current_class'>";
					$retValue .= "<a title='" . $page->post_title . "' href='" . get_page_link($page->ID) . "'>";			
					$retValue .= "<span class='program'>" . $page->post_title . "</span>";
					$retValue .= "</a></li>";
				endforeach;
				if ($wrapping_ul)
					$retValue .= "</ul>";
			endif;
			return $retValue ;
			
		}
		
		
		/*
		 * Get slideshow images
		 */
		static public function get_slideshow($images, $size = "thumbnail", $show_progress = true) {
			global $image_sizes;
			$retValue = "";
			if( $images ): 
				$only_one_class = count($images) == 1 ? " only-one-slide" : "";
				$retValue .= "<div class='slideshow-wrapper" . $only_one_class . "'>";
				$retValue .= "<div class='slideshow'>";
				$addedimages = 0;

				foreach( $images as $image ) :
					$img = self::get_image($image, $size);
					$url = $image["sizes"][$size];
					$retValue .= "<div class='slide-item' data-size='{$size}'>"; //<img src='" . $url ."' alt='" . $image['alt'] . "' />";
					$retValue .= $img;
					if (trim($image['caption']) != '')
						$retValue .= "<div class='caption'>". $image['caption'] . "</div>";
					$retValue .= "</div>";
					$addedimages++;
				endforeach;
				// add right left arrows
				$retValue .= "<div class='arrows'><a class='left-arrow arrow' href='#'></a><a class='right-arrow arrow' href='#'></a></div>";
				if ($show_progress) {
					$retValue .= "<div class='progress-bar'><div class='progress'></div></div>";
				}
				$retValue .= "</div>";
				$retValue .= "</div>";
			endif;
			return $retValue;
		}

		static public function get_image($image, $size) {
			$large_size = $size . "-large";
			$small_size = $size;
			$large_url = $small_url = '';
			$large_width = $small_width = $large_height = $small_height = $large_ratio = $small_ratio = 0;
			
			if (isset($image["sizes"][$large_size])) {
				$large_url = $image["sizes"][$large_size];
				$large_width = $image["sizes"][$large_size."-width"];
				$large_height = $image["sizes"][$large_size."-height"];
				$large_ratio = $large_width / $large_height;
			}
			if (isset($image["sizes"][$small_size])) {
				$small_url = $image["sizes"][$small_size];
				$small_width = $image["sizes"][$small_size."-width"];
				$small_height = $image["sizes"][$small_size."-height"];
				$small_ratio = $small_width / $small_height;
			}
			// add responsive image srcset
			if ($large_url && $small_url && $large_width > $small_width && $large_ratio == $small_ratio) {
				return "<img src='" . $small_url ."' srcset='" . $small_url . " 1100w, " . $large_url . " 2200w' alt='" . $image['alt'] . "' />";
			}
			else if ($small_url) {
				return "<img src='" . $small_url ."' alt='" . $image['alt'] . "' />";
			}
		

		}


		/*
		 * Get first image of slideshow images
		 */
		static public function get_first_image($images, $wrapper_class_name = "wp-post-image", $size = "thumbnail", $fill_if_empty = false) {
			global $image_sizes;
			$retValue = "";
			$found = false;
			$img = $large_url = $small_url = '';
			if( $images ): 
				foreach( $images as $image ) :
					if (($image_sizes[$size][0] == "9999" || $image_sizes[$size][0] == $image["sizes"][$size."-width"] ) && ($image_sizes[$size][1] == "9999" || $image_sizes[$size][1] == $image["sizes"][$size."-height"])) {
						$large_url = $image["sizes"][$size];
					}
					$size = str_replace("-large","",$size);
					if (($image_sizes[$size][0] == "9999" || $image_sizes[$size][0] == $image["sizes"][$size."-width"] ) && ($image_sizes[$size][1] == "9999" || $image_sizes[$size][1] == $image["sizes"][$size."-height"])) {
						$small_url = $image["sizes"][$size];
					}
					// add responsive image srcset
					if ($large_url && $small_url) {
						$img = "<img src='" . $small_url ."' srcset='" . $small_url . " 1x, " . $large_url . " 2x' alt='" . $image['alt'] . "' />";
						break;
					}
					else if ($small_url) {
						$img = "<img src='" . $small_url ."' alt='" . $image['alt'] . "' />";
						break;
					}
				endforeach;
			endif;
			if (!empty($img)) {
				$retValue .= "<div class='$wrapper_class_name'>$img</div>";
			}
			else if ($fill_if_empty) {
				$retValue .= "<div class='$wrapper_class_name'><img src='" . get_stylesheet_directory_uri() ."/images/empty.png' alt='Ingen bild' /></div>";
			}
			return $retValue;
		}
		
		
		/*
		 *
		 */
		static public function get_top_parent($page_id = "") {
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
		 * return the breadbrumb
		 */
		static public function get_breadcrumb($page_id = "") {
			$retValue = "";
			if (!isset($page_id) || $page_id == "") {
				$page_id = get_the_ID();
			}
			// if page
			if (is_page($page_id)) {
				$page = get_post($page_id);
				$retValue = "";
				while($page->post_parent > 0) {
					$retValue = "<a href='" . get_page_link($page->ID) . "' title='" . $page->post_title . "'> " . $page->post_title . "</a> / " . $retValue;

					$page = get_page($page->post_parent);
				}
				$retValue = "<a href='" . get_home_url() . "' title='Tillbaka hem'><span class='home-icon'></span></a> / <a href='" . get_page_link($page->ID) . "' title='" . $page->post_title . "'>" . $page->post_title . "</a> / " . $retValue;
			}
			// if single post
			if (is_single($page_id)) {
				$page = get_post($page_id);
				$retValue = "<a href='" . get_home_url() . "' title='Tillbaka hem'><span class='home-icon'></span></a> / ";
				if ($page->post_type == 'post') {
					$archive = HuGy::get_hugy_nyheter_page();
					if ($archive != '')
						$retValue .= "<a href='" . get_page_link($archive->ID) . "' title='" . $archive->post_title . "'>" . $archive->post_title . "</a> / ";
				}
				if ($page->post_type == 'hugy_kontakt') {
					$archive = HuGy::get_hugy_kontakter_page();
					if ($archive != '')
						$retValue .= "<a href='" . get_page_link($archive->ID) . "' title='" . $archive->post_title . "'>" . $archive->post_title . "</a> / ";
				}
				$retValue .= "<a href='" . get_page_link($page->ID) . "' title='" . $page->post_title . "'>" . $page->post_title . "</a>";
			}
			return $retValue;
		}
		
		
		/*
		 * return pages below parent
		 */
		static public function get_page_tree($parent_id = "") {
			$retValue = "";
			//if (!isset($parent_id) || $parent_id == "") {
				//$parent_id = get_the_ID();
			//}
			$page = get_post($parent_id);
			$exclude = get_field('visa_inte_sidor_i_menyn', 'option');
			if ( ! empty( $exclude ) ) {
				$exclude = implode( ",", $exclude );
			}
			if ($page->post_type == "page" || $parent_id == "") {
				$args = array(
					'depth'        => 0,
					'show_date'    => '',
					'date_format'  => get_option('date_format'),
					'child_of'     => $parent_id,
					'exclude'      => $exclude,
					'include'      => '',
					'title_li'     => "",
					'echo'         => 0,
					'authors'      => '',
					'sort_column'  => 'post_title',
					'link_before'  => '',
					'link_after'   => '',
					'post_type'    => 'page',
					'post_status'  => 'publish',
					'walker'		=> new HuGy_Walker_Page()
				); 
				$retValue .= wp_list_pages( $args );
			}
			return $retValue;
		}
		

		/*
		 *
		 */
		static public function get_main_navigation() {
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
					$menu_items_count = count($menu_items) + 1;
					$retValue .= "<a class='menu-margin' id='menu'>" . HuGySVG::get("menu") . "</a>";
					$retValue .= "<ul class='menu cols-".$menu_items_count."'>";
					foreach($menu_items as $menu_item) {
						$currentclass = "";
						if ($menu_item->object_id == get_the_ID())
							$currentclass = " class='current_page_item'";
						$retValue .= "<li$currentclass><a class='menu-head " . implode(' ', $menu_item->classes) . "' href='" . get_page_link($menu_item->object_id) . "'>" . $menu_item->title /*get_the_title($menu_item->object_id)*/ . "</a><ul class='children'>";
						$retValue .= HuGy::get_page_tree($menu_item->object_id);
						$retValue .= "</ul></li>";
					}
					// quickmenu
					$retValue .= "<li><a class='menu-head quick-menu-icon'>" . HuGySVG::get("exclamation") . "</a><ul class='children'>";
					$retValue .= HuGy::get_quickmenu();
					$retValue .= "</ul></li>";

					$retValue .= "</ul>";
				}
				$retValue .= "</nav>";
			}
			else {
				$retValue .= "<nav class='main-menu-wrapper'>";
				//$retValue .= wp_nav_menu($args);
				
				
				
					$menu_items_count = 3;
					$retValue .= "<a class='menu-margin' id='menu'></a>";
					$retValue .= "<ul class='menu cols-".$menu_items_count."'>";


					$retValue .= "<li><a class='menu-head menu-icon'>" . HuGySVG::get('menu') . "</a><ul class='children'>";
					$retValue .= HuGy::get_page_tree();
					$retValue .= "</ul></li>";

					$retValue .= "<li><span class='menu-title-wrapper'><a class='menu-head picto-icon'>" . HuGySVG::get('picto') . "</a><span class='menu-title'>V&aring;ra program</span></span><ul class='children'>";
					$retValue .= HuGy::get_program_links(false);
					$retValue .= "</ul>";
					$retValue .= "</li>";

					// quickmenu
					$retValue .= "<li><a class='menu-head quick-menu-icon'>" . HuGySVG::get('exclamation') . "</a><ul class='children'>";
					$retValue .= HuGy::get_quickmenu();
					$retValue .= "</ul></li>";

					$retValue .= "</ul>";
				
				$retValue .= "</nav>";
			}
			return $retValue;
		}
		
		
		/*
		 * Return module built part of page
		 */
		static public function get_modules($page_id = "") {
			$retValue = "";
			if ($page_id != "") {
				$field = $page_id;
			}
			else {
				$field = 'option';
			}

			while (the_flexible_field("hg_modules",$field)) :
				$background = get_sub_field('background-color');
				$color = get_sub_field('color');
				$style = '';
				if ($background != '' || $color != '')
					$style = " style='background-color:$background;color:$color;'";
				
				$retValue .= "<div class='" . get_row_layout() . "-module-wrapper module-wrapper'$style>";
				$fb_data_url = (get_row_layout() == "facebook")?" data-fb-url='http://www.facebook.com/" . get_sub_field("id",$field) . "' ":"";
				$retValue .= "<div class='" . get_row_layout() . "-module module' $fb_data_url>";
				if (get_row_layout() == "facebook"):
					$retValue .= "<a class='menu-margin' id='facebook'></a><h1>Vad händer mer...<a class='fb-logo' href='http://www.facebook.com/" . get_sub_field("id",$field) . "'><img src='".get_stylesheet_directory_uri()."/images/facebook.png' alt='Facebook logga' /></a></h1>";
					if (function_exists("fb_feed")) :
						$retValue .= fb_feed(get_sub_field("id",$field),array('container' => 'div',
												'container_class' => 'items',
												'container_id' => 'fb-feed',
												'echo' => false));
						$retValue .= "<div class='fb-loader'></div>";
					else :
						$retValue .= "<div class='hidden'>Du beh&ouml;ver installera <i>Facebook Feed Grabber</i> f&ouml;r att detta ska fungera.</div>";
					endif;
				elseif (get_row_layout() == "program"):
					$retValue .= HuGy::get_program_links();
				elseif (get_row_layout() == "nyheter"):
					$retValue .= HuGy::get_news(get_sub_field("number_news",$field));
				elseif (get_row_layout() == "text"):
					$retValue .= get_sub_field('text');
				elseif (get_row_layout() == "bildspel"):
					$retValue .= HuGy::get_slideshow(get_sub_field('slideshow','option'), 'slideshow', true);
				endif;
				$retValue .= "</div>";
				$retValue .= "</div>";
			endwhile;
			return $retValue;
		}
		
		
		/*
		 * Return news, used in get_modules()
		 */
		static public function get_news($number_news = 3) {
			$retValue = "<a class='menu-margin' id='nyheter'></a>";
			 
			// The Query
			$the_query = new WP_Query( array(
											'post_type' => 'post',
											'posts_per_page' => $number_news ));
			$num_news = 0;
			// The Loop
			if ( $the_query->have_posts() ) {
				$retValue .= "<div class='items'>";
				while ( $the_query->have_posts() ) {
					if  ($num_news >= $number_news) break;

					$retValue .= "<div class='item'>";
					$the_query->the_post();
					$retValue .=  HuGy::get_tags();
					//$retValue .= "<div class='item-img'>";
					//$retValue .=  get_the_post_thumbnail(get_the_ID(), 'news'); 
					$retValue .= "<a href='" . get_permalink() . "'>";
					$retValue .=  HuGy::get_first_image(get_field('hg_slideshow',get_the_ID()), 'wp-post-image', 'news-large', true);
					//$retValue .= "</div>";
					$retValue .= "</a><div class='item-content'>";
					$retValue .= "<a href='" . get_permalink() . "'><h2>" . get_the_title() . "</h2>";
					//$retValue .= get_the_excerpt();
					$retValue .= "</a></div>";
					$retValue .= "</div>";
					$num_news++;
				}
				$retValue .= "</div>";
			} else {
				// no posts found
			}
			$archive = HuGy::get_hugy_nyheter_page();
			if ($archive != '') {
				$retValue .= "<div class='text--center news-navigation'><a href='" . get_page_link($archive->ID) . "' title='" . $archive->post_title . "'>Fler nyheter</a></div>";
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			return $retValue;
		}
		
		static public function get_text_news($news_per_page = 3, $paged = 1) {

			$args = array(
				'paged'			   => $paged,
				'posts_per_page'   => $news_per_page,
				'category'         => '',
				'orderby'          => 'post_date',
				'order'            => 'DESC',
				'include'          => '',
				'exclude'          => '',
				'meta_key'         => '',
				'meta_value'       => '',
				'post_type'        => 'post',
				'post_mime_type'   => '',
				'post_parent'      => '',
				'post_status'      => 'publish',
				// 'suppress_filters' => true,
			);
	
			query_posts( $args ); 
			$retValue = "";
			if ( have_posts() ) while ( have_posts() ) : the_post();
				$retValue .= "<div class='news' data-id='" . get_the_ID() . "'>"
				. "<h2><a class='nolink' href='" . get_post_permalink(get_the_ID()) . "'>" . get_the_title() . "</a></h2>"
				. "<div class='news-meta'>" . HuGy::get_tags() . HuGy::get_date() . "</div>"
				. "<div class='news-content'>"
				. get_the_excerpt() . "</div></div>";
			endwhile; 
			return $retValue;
		}
		
		
		/*
		 * Return teasers, used on home right now
		 */
		/*function get_teasers($page_id = "") {
			$retValue = "";
			if ($page_id != "") {
				$field = $page_id;
			}
			else {
				$field = 'option';
			}
			$i = 2;
			$retValue .= "<div class='teaser-wrapper'><div class='teaser-content'>";
			while (the_flexible_field("hg_firstpage_teaser_link",$field)) :
				$retValue .= "<div class='" . get_row_layout() . "-" . $i++ . " teaser' style='" . get_sub_field("x_align",$field) . ":" . get_sub_field("x_pos",$field) . "px; " . get_sub_field("y_align",$field) . ":" . get_sub_field("y_pos",$field) . "px;'>";
				if (get_row_layout() == "teaser"):
					$retValue .= "<a href='" . get_sub_field("link",$field) . "'>";
					$retValue .= "<img src='" . get_sub_field("image",$field) . "' data-hover='" . get_sub_field("hover_image",$field) . "' />";
					$retValue .= "</a>";
				endif;
				$retValue .= "</div>";
			endwhile;
			$retValue .= "</div></div>";
			return $retValue;
		}*/
		
		
		
		/*
		 * Return related
		 */
		static public function get_related($page_id = "") {
			$retValue = "";
			if ($page_id != "") {
				$field = $page_id;
			}
			else {
				$field = 'option';
			}
			$i = 0;
			if ( get_field( "hg_relaterade", $field ) ) :
			$retValue .= "<div class='related-wrapper'><h2>Relaterat</h2><div class='related'>";
			while ( the_flexible_field( "hg_relaterade", $field ) ) :
				//$retValue .= "<div class='" . get_row_layout() . "-" . $i++ . " relaterad'>";
				if ( get_row_layout() == "dokument"):
					$doc = get_sub_field("dokument",$field);
					$retValue .= "<a href='" . str_replace( "https://", "http://", $doc["url"] ) . "' title='" . $doc["description"] . "' >";
					$doctype = "";
					if (strpos($doc["url"], '.doc') !== false)
						$doctype = "doc-";
					if (strpos($doc["url"], '.pdf') !== false)
						$doctype = "pdf-";
					if (strpos($doc["url"], '.xls') !== false)
						$doctype = "xls-";

					$retValue .= "<span class='icon ".$doctype."doc-icon'></span>";
					$retValue .= $doc["title"];
					$retValue .= "</a>";
				elseif ( get_row_layout() == "lank" ) :
					$url = get_sub_field("url",$field);
					$external = "";
					$target = "";
					if ( ( strpos( $url, 'http' ) !== false ) && ( strpos( $url, 'hultsfredsgymnasium.se' ) == false ) ) {
						$external = "external-";
						$target = " target='_blank'";
					}
					$retValue .= "<a href='$url' title='" . get_sub_field("beskrivning",$field) . "'>";
					$retValue .= "<span class='icon " . $external . "link-icon'$target></span>";
					$retValue .= get_sub_field("namn",$field);
					$retValue .= "</a>";
				elseif ( get_row_layout() == "rubrik" ) :
					$retValue .= "<h2 class='title'>";
					$retValue .= get_sub_field("rubrik", $field);
					$retValue .= "</h2>";
				endif;
				//$retValue .= "</div>";
			endwhile;
			$retValue .= "</div></div>";
			endif;
			return $retValue;
		}
		
		
		
		/*
		 * Return contacts on page
		 */
		static public function get_contacts($page_id = "", $args = array()) {
			global $contact_vars;

			$vars = array_merge( $contact_vars, $args );
			
			$retValue = "";
			if ($page_id != "") {
				$field = $page_id;
			}
			else {
				$field = 'option';
			}
			$contacts = get_field('hg_kontakter', $page_id);
			if (!empty($contacts) && $contacts != "") :
				$retValue .= "<div class='contacts-wrapper'>";
				if ($vars['title'] != '') {
					$retValue .= "<h2>" . $vars['title'] . "</h2>";				
				}
				$retValue .= HuGy::get_tags();
				$retValue .= "<div class='" . $vars['class'] . "'>";
				foreach ($contacts as $contact) :
					$retValue .= HuGy::get_contact( $contact->ID, $args );
				endforeach;
				$retValue .= "</div></div>";
			endif;
			return $retValue;
		}
		
		/*
		 * Return one contact
		 */
		static public function get_contact( $contact_id = "", $args = array() ) {
			global $contact_vars;
			if ($contact_id == '') return;
			
			$vars = array_merge( $contact_vars, $args );
			$excerpt = $vars['excerpt'];
			$retValue = "<div class='media contact contact-".$contact_id."'>";

			if (!$excerpt) {
				$bild = get_field("bild",$contact_id);	
				if ($bild) {
					$bild = $bild['sizes'][$vars['imagesize']];
					$retValue .= "<div class='media__img  bild'><img src='$bild' alt='$title' /></div>";
				}
			}
			$retValue .= "<div class='media__body'>";
			
			$retValue .= "<a class='nolink' href='" . get_post_permalink($contact_id) . "'>";
			$title = get_the_title($contact_id);
			$retValue .= "<h2 class='title'>$title</h2>";
			$retValue .= "</a>";
			$retValue .=  HuGy::get_tags($contact_id);

			$titel = get_field("titel",$contact_id);	
			if ($titel)
				$retValue .= "<span class='titel'>$titel</span>";
			
			$telefon = get_field( "telefon", $contact_id );
			$mobiltelefon = get_field( "mobiltelefon", $contact_id );
			if ($telefon && $mobiltelefon)
				$telefon = "<a href='tel:" . preg_replace( "/[^0-9]/", "", $telefon ) . "'>$telefon</a>, <a href='tel:" . preg_replace( "/[^0-9]/", "", $mobiltelefon ) . "'>$mobiltelefon</a>";
			else if ($telefon)
				$telefon = "<a href='tel:" . preg_replace( "/[^0-9]/", "", $telefon ) . "'>$telefon</a>";
			else if ($mobiltelefon)
				$telefon = "<a href='tel:" . preg_replace( "/[^0-9]/", "", $mobiltelefon ) . "'>$mobiltelefon</a>";
				
			if ($telefon)
				$retValue .= "<span class='telefon'>TELEFON: $telefon</span>";
			
			
			$fax = get_field("fax",$contact_id);	
			if ($fax)
				$retValue .= "<span class='fax'>FAX: $fax</span>";
			
			$epost = get_field("e-post",$contact_id);	
			if ($epost)
				$retValue .= "<span class='epost'>E-POST: <a href='mailto:$epost'>$epost</a></span>";

			$typ_av_kontakt = get_field("typ_av_kontakt",$contact_id);	
			if ($typ_av_kontakt)
				$typ_av_kontakt = implode(',',$typ_av_kontakt);
			$retValue .= "<span class='typ_av_kontakt force-hidden'>$typ_av_kontakt</span>";

			if (!$excerpt) {
				$retValue .= "<div class='contact-data'>";

				$beskrivning = get_field("beskrivning",$contact_id);	
				if ($beskrivning)
					$retValue .= "<div class='beskrivning'>BESKRIVNING:<br /> $beskrivning</div>";
				
				$arbetsplats = get_field("arbetsplats",$contact_id);	
				if ($arbetsplats)
					$retValue .= "<p class='arbetsplats'>ARBETSPLATS:<br /> $arbetsplats</p>";

				$adress = get_field("adress",$contact_id);	
				
				if ($adress)
					$retValue .= "<div class='adress'>ADRESS:<br /> $adress</div>";

				$retValue .= "</div>";
			}
			$retValue .= "</div>";
			$retValue .= "</div>";
			return $retValue;
		}
		
		/*
		 * Return the date
		 */
		static public function get_date() {
			$retValue = " <time class='time' datetime='";
			$retValue .= get_the_time( 'Y-m-d' );
			$retValue .= "' pubdate>";
			$retValue .= get_the_date();
			$retValue .= " " . get_the_time();
			$retValue .= "</time>";
			return $retValue;
		}

		/*
		 * Return the author
		 */
		static public function get_author() {
			$retValue = '<div class="author">';

			if (get_the_author_meta('kontakt') != '') {
				$prelink = "<a href='".get_permalink(get_the_author_meta('kontakt'))."'>";
				$postlink = "</a>";
			}
			$name = get_the_author();
			if (get_the_author_meta('first_name') != '' || get_the_author_meta('last_name') != '') {
				$name = get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');
			}
			
			$retValue .= "$prelink$name$postlink";
			$retValue .= '</div>';
			return $retValue;
		}
		
		
		/*
		 * Return the first hugy_nyheter page
		 */
		static public function get_hugy_nyheter_page() {
			$pages = get_posts(array(
				'post_type' => 'page',
				'meta_key' => '_wp_page_template',
				'meta_value' => 'page-hugy-nyheter.php'
			));
			foreach($pages as $page){
				// retur first page found
				return $page;
			}
			return;
		}


		/*
		 * Return the first hugy_kontakter page
		 */
		static public function get_hugy_kontakter_page() {
			$pages = get_posts(array(
				'post_type' => 'page',
				'meta_key' => '_wp_page_template',
				'meta_value' => 'page-hugy-kontakter.php'
			));
			foreach($pages as $page){
				// retur first page found
				return $page;
			}
			return;
		}
		
		
		/*
		 * Return text with todays date and week
		 */
		static public function get_todaysdate_text() {
			$retValue = '<div class="weektext"></div>';
			// $retValue .= '<div class="todaysfood"></div>';
			return $retValue;
		}
		
		
		
		/*
		 * Return text with todays date and week
		 */
		static public function get_columntext() {
			if (get_field('hg_columntext',get_the_ID())) :
				return "<div class='columntext'>" . get_field('hg_columntext',get_the_ID()) . "</div>";
			endif;
		}

		static public function get_tags($contact_id = "") {
			if ($contact_id == "") {
				$tags_array = get_the_tags();
			}
			else {
				$tags_array = get_the_tags($contact_id);
			}
			$retValue = "";
			if (!empty($tags_array)) {
				$retValue .=  "<div class='tags'>";
				foreach ($tags_array as $tag){
					$retValue .=  "<span class='tag " . $tag->name . "'>".$tag->name."</span>\n";
				}
				$retValue .=  "</div>";
			}
			return $retValue;
		}

	}
	/**
	 * Create HTML list of pages.
	 *
	 * @since 2.1.0
	 * @uses Walker
	 */
	class HuGy_Walker_Page extends Walker {
	    
	        public $db_fields = array ('parent' => 'post_parent', 'id' => 'ID');
	
	      
	        public function start_lvl( &$output, $depth = 0, $args = array() ) {
	                $indent = str_repeat("\t", $depth);
	                $output .= "\n$indent<ul class='children'>\n";
	        }
	

	        public function end_lvl( &$output, $depth = 0, $args = array() ) {
	                $indent = str_repeat("\t", $depth);
	                $output .= "$indent</ul>\n";
	        }

	        public function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {
	                if ( $depth ) {
	                        $indent = str_repeat( "\t", $depth );
	                } else {
	                        $indent = '';
	                }
	
	                $css_class = array( 'page_item', 'page-item-' . $page->ID );
	
	                if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
	                        $css_class[] = 'page_item_has_children';
	                }
	
	                if ( ! empty( $current_page ) ) {
	                        $_current_page = get_post( $current_page );
	                        if ( $_current_page && in_array( $page->ID, $_current_page->ancestors ) ) {
	                                $css_class[] = 'current_page_ancestor';
	                        }
	                        if ( $page->ID == $current_page ) {
	                                $css_class[] = 'current_page_item';
	                        } elseif ( $_current_page && $page->ID == $_current_page->post_parent ) {
	                                $css_class[] = 'current_page_parent';
	                        }
	                } elseif ( $page->ID == get_option('page_for_posts') ) {
	                        $css_class[] = 'current_page_parent';
	                }

					
	                $css_classes = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );
	
	                if ( '' === $page->post_title ) {
	                        $page->post_title = sprintf( __( '#%d (no title)' ), $page->ID );
	                }
	
	                $args['link_before'] = empty( $args['link_before'] ) ? '' : $args['link_before'];
	                $args['link_after'] = empty( $args['link_after'] ) ? '' : $args['link_after'];
	
	                /** This filter is documented in wp-includes/post-template.php */
	                $output .= $indent . sprintf(
	                        '<li class="%s"><a href="%s">%s%s%s%s</a>',
	                        $css_classes,
	                        get_permalink( $page->ID ),
	                        $args['link_before'],
	                        apply_filters( 'the_title', $page->post_title, $page->ID ),
	                        $args['link_after'],
							HuGy::get_tags( $page->ID )
							);
	
	                if ( ! empty( $args['show_date'] ) ) {
	                        if ( 'modified' == $args['show_date'] ) {
	                                $time = $page->post_modified;
	                        } else {
	                                $time = $page->post_date;
	                        }
	
	                        $date_format = empty( $args['date_format'] ) ? '' : $args['date_format'];
	                        $output .= " " . mysql2date( $date_format, $time );
	                }
	        }

	        public function end_el( &$output, $page, $depth = 0, $args = array() ) {
	                $output .= "</li>\n";
	        }
	
	}
 ?>