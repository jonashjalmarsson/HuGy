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
		function get_quicklinks() {
			$retValue = "";

			if(get_field('hg_quicklinks', 'option')): 
		 
			$retValue .= "<div class='quicklinks-wrapper'>";
			$retValue .= "<ul class='quicklinks'>";
			$retValue .= "<li class='quick-expand'>";
			$retValue .= "<a title='Visa l&auml;nkar' href='#'>";
			$retValue .= "<span class='quick-icon quick-expand-icon'></span>";
			$retValue .= "</a></li>";
		
			while(has_sub_field('hg_quicklinks', 'option')):
				$retValue .= "<li>";
				$retValue .= "<a title='" . get_sub_field('title') . "' href='" . get_sub_field('url') . "'>";
				$retValue .= "<span class='quick-icon quick-" .get_sub_field("imageplace") . "'></span>";
				$retValue .= "</a></li>";
			endwhile;
			$retValue .= "</ul></div>";
		 
			endif;
			return $retValue;
		}


		/*
		 * Get quick menu. Placed in menu.
		 */
		function get_quickmenu() {
			$retValue = "";

			if(get_field('direktlankar_i_menyn', 'option')): 
		 
			while(has_sub_field('direktlankar_i_menyn', 'option')):
				if (get_row_layout() == 'intern_lank') {
					$link = get_sub_field('intern_lank');
					$retValue .= "<li>";
					$retValue .= "<a title='" . $link->excerpt . "' href='" . get_permalink($link->ID) . "'>";
					$retValue .= $link->post_title;
					$retValue .= "</a></li>";
				}
				else if (get_row_layout() == 'extern_lank') {
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
		function get_program_links($icon = true, $wrapping_ul = true) {
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
				'meta_value' => 'page-hugy-program.php'
			); 
			$pages = get_posts($args);
			
			
			if (count($pages) > 0):
				if ($wrapping_ul)
					$retValue .= "<ul class='program-icons'>";
				foreach($pages as $page) :
					$current_class = '';
					if (get_the_ID() == $page->ID)
						$current_class = ' current_page_item';
					$retValue .= "<li class='page_item$current_class'>";
					$retValue .= "<a title='" . $page->post_title . "' href='" . get_page_link($page->ID) . "'>";
			
					if ($icon) 
						$retValue .= "<span class='program-icon program-" . get_field("hg_imageplace",$page->ID) . "'></span>";
					else
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
						$retValue .= "<img src='" . $url ."' alt='" . $image['alt'] . "' />";
					}
				endforeach;
				$retValue .= "</div></div>";
			endif;
			return $retValue;
		}

		/*
		 * Get special firstpage slideshow
		 */
		function get_firstpage_slideshow($images, $wrapper_class_name = "slideshow", $size = "thumbnail") {
			global $image_sizes;
			$imagearray = array();
			if( $images ): 
				foreach( $images as $image ) :
					if (($image_sizes[$size][0] == "9999" || $image_sizes[$size][0] == $image["sizes"][$size."-width"] )
					 && ($image_sizes[$size][1] == "9999" || $image_sizes[$size][1] == $image["sizes"][$size."-height"])) {
						$url = $image["sizes"][$size];
						$imagearray[] = array("url" => $url, 'alt' => $image['alt'], 'description' => $image['description']);
					}
				endforeach;
			endif;
			
			$retValue = "";
			// right now only echo first image
			if (count($imagearray) > 0) {
				$retValue .= "<div class='$wrapper_class_name' style='background-image: url(" . $imagearray[0]["url"] . ")'>&nbsp;</div>";
			}
			return $retValue;
		}


		/*
		 * Get first image of slideshow images
		 */
		function get_first_image($images, $wrapper_class_name = "wp-post-image", $size = "thumbnail", $fill_if_empty = false) {
			global $image_sizes;
			$retValue = "";
			$found = false;
			if( $images ): 
				$retValue .= "<div class='$wrapper_class_name'>";
				foreach( $images as $image ) :
					if (($image_sizes[$size][0] == "9999" || $image_sizes[$size][0] == $image["sizes"][$size."-width"] )
					 && ($image_sizes[$size][1] == "9999" || $image_sizes[$size][1] == $image["sizes"][$size."-height"])) {
						$url = $image["sizes"][$size];
						$retValue .= "<img src='" . $url ."' alt='" . $image['alt'] . "' />";
						$found = true;
						break;
					}
				endforeach;
				$retValue .= "</div>";
			endif;
			if (!$found && $fill_if_empty) {
				$retValue .= "<div class='$wrapper_class_name'><img src='" . get_stylesheet_directory_uri() ."/images/empty.png' /></div>";
			}
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
		 * return the breadbrumb
		 */
		function get_breadcrumb($page_id = "") {
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
		function get_page_tree($parent_id = "") {
			$retValue = "";
			//if (!isset($parent_id) || $parent_id == "") {
				//$parent_id = get_the_ID();
			//}
			$page = get_post($parent_id);
			$exclude = get_field('visa_inte_sidor_i_menyn', 'option');
			if ($page->post_type == "page" || $parent_id == "") {
				$args = array(
					'depth'        => 0,
					'show_date'    => '',
					'date_format'  => get_option('date_format'),
					'child_of'     => $parent_id,
					'exclude'      => implode(",",$exclude),
					'include'      => '',
					'title_li'     => "",
					'echo'         => 0,
					'authors'      => '',
					'sort_column'  => 'post_title',
					'link_before'  => '',
					'link_after'   => '',
					'walker'       => '',
					'post_type'    => 'page',
					'post_status'  => 'publish',
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
					$menu_items_count = count($menu_items) + 1;
					$retValue .= "<a class='menu-margin' name='menu' id='menu'></a>";
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
					$retValue .= "<li><a class='menu-head quick-menu-icon'></a><ul class='children'>";
					$retValue .= "<li>" . HuGy::get_quickmenu() . "</li>";
					$retValue .= "</ul></li>";

					$retValue .= "</ul>";
				}
				$retValue .= "</nav>";
			}
			else {
				$retValue .= "<nav class='main-menu-wrapper'>";
				//$retValue .= wp_nav_menu($args);
				
				
				
					$menu_items_count = 3;
					$retValue .= "<a class='menu-margin' name='menu' id='menu'></a>";
					$retValue .= "<ul class='menu cols-".$menu_items_count."'>";


					$retValue .= "<li><a class='menu-head menu-icon'></a><ul class='children'>";
					$retValue .= HuGy::get_page_tree();
					$retValue .= "</ul></li>";

					$retValue .= "<li><a class='menu-head picto-icon'></a><ul class='children'>";
					$retValue .= HuGy::get_program_links(false,false);
					$retValue .= "</ul></li>";

					// quickmenu
					$retValue .= "<li><a class='menu-head quick-menu-icon'></a><ul class='children'>";
					$retValue .= "<li>" . HuGy::get_quickmenu() . "</li>";
					$retValue .= "</ul></li>";

					$retValue .= "</ul>";
				
				$retValue .= "</nav>";
			}
			return $retValue;
		}
		
		
		/*
		 * Return module built part of page
		 */
		function get_modules($page_id = "") {
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
					$retValue .= "<div class='" . get_row_layout() . "-module module' data-fb-url='http://www.facebook.com/" . get_sub_field("id",$field) . "'>";
					if (get_row_layout() == "facebook"):
						$retValue .= "<a class='menu-margin' name='facebook' id='facebook'></a><h1>Vad händer mer...<a class='fb-logo' href='http://www.facebook.com/" . get_sub_field("id",$field) . "'><img src='".get_stylesheet_directory_uri()."/images/facebook.png'/></a></h1>";
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
						$retValue .= HuGy::get_news();
					elseif (get_row_layout() == "text"):
						$retValue .= get_sub_field('text');
					endif;
					$retValue .= "</div>";
					$retValue .= "</div>";
			endwhile;
			return $retValue;
		}
		
		
		/*
		 * Return news, used in get_modules()
		 */
		function get_news() {
			$retValue = "<a class='menu-margin' name='nyheter' id='nyheter'></a><h1>Nytt på skolan</h1>";
			// The Query
			$the_query = new WP_Query( array(
											'post_type' => 'post',
											'posts_per_page' => 3 ));

			// The Loop
			if ( $the_query->have_posts() ) {
				$retValue .= "<div class='items'>";
				while ( $the_query->have_posts() ) {
					$retValue .= "<div class='item'>";
					$the_query->the_post();
					//$retValue .= "<div class='item-img'>";
					//$retValue .=  get_the_post_thumbnail(get_the_ID(), 'news'); 
					$retValue .= "<a href='" . get_permalink() . "'>";
					$retValue .=  HuGy::get_first_image(get_field('hg_slideshow',get_the_ID()), 'wp-post-image', 'news', true);
					//$retValue .= "</div>";
					$retValue .= "</a><div class='item-content'>";
					$retValue .= "<a href='" . get_permalink() . "'><h2>" . get_the_title() . "</h2>";
					//$retValue .= get_the_excerpt();
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
		
		
		
		/*
		 * Return teasers, used on home right now
		 */
		function get_teasers($page_id = "") {
			$retValue = "";
			if ($page_id != "") {
				$field = $page_id;
			}
			else {
				$field = 'option';
			}
			$i = 2;
			while (the_flexible_field("hg_firstpage_teaser_link",$field)) :
				$retValue .= "<div class='" . get_row_layout() . "-" . $i++ . " teaser' style='" . get_sub_field("x_align",$field) . ":" . get_sub_field("x_pos",$field) . "px; " . get_sub_field("y_align",$field) . ":" . get_sub_field("y_pos",$field) . "px;'>";
				if (get_row_layout() == "teaser"):
					$retValue .= "<a href='" . get_sub_field("link",$field) . "'>";
					$retValue .= "<img src='" . get_sub_field("image",$field) . "' data-hover='" . get_sub_field("hover_image",$field) . "' />";
					$retValue .= "</a>";
				endif;
				$retValue .= "</div>";
			endwhile;
			return $retValue;
		}
		
		
		
		/*
		 * Return related
		 */
		function get_related($page_id = "") {
			$retValue = "";
			if ($page_id != "") {
				$field = $page_id;
			}
			else {
				$field = 'option';
			}
			$i = 0;
			if (get_field("hg_relaterade",$field)) :
			$retValue .= "<div class='related-wrapper'><h2>Relaterat</h2><div class='related'>";
			while (the_flexible_field("hg_relaterade",$field)) :
				//$retValue .= "<div class='" . get_row_layout() . "-" . $i++ . " relaterad'>";
				if (get_row_layout() == "dokument"):
					$doc = get_sub_field("dokument",$field);
					$retValue .= "<a href='" . $doc["url"]. "' title='" . $doc["description"] . "' >";
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
				elseif (get_row_layout() == "lank"):
					$url = get_sub_field("url",$field);
					$retValue .= "<a href='$url' title='" . get_sub_field("beskrivning",$field) . "'>";
					$retValue .= "<span class='icon ".((strpos($url, 'http') !== false)?"external-":"")."link-icon'></span>";
					$retValue .= get_sub_field("namn",$field);
					$retValue .= "</a>";
				elseif (get_row_layout() == "rubrik"):
					$retValue .= "<h2 class='title'>";
					$retValue .= get_sub_field("rubrik",$field);
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
		function get_contacts($page_id = "", $args = array()) {
			global $contact_vars;

			$vars = array_merge( $contact_vars, $args );
			
			$retValue = "";
			if ($page_id != "") {
				$field = $page_id;
			}
			else {
				$field = 'option';
			}
			$contacts = get_field('hg_kontakter',$page_id);
			if (!empty($contacts) && $contacts != "") :
				$retValue .= "<div class='contacts-wrapper'>";
				if ($vars['title'] != '')
					$retValue .= "<h2>" . $vars['title'] . "</h2>";
				$retValue .= "<div class='" . $vars['class'] . "'>";
				foreach ($contacts as $contact) :
					$retValue .= HuGy::get_contact($contact->ID,$args);
				endforeach;
				$retValue .= "</div></div>";
			endif;
			return $retValue;
		}
		
		/*
		 * Return one contact
		 */
		function get_contact($contact_id = "", $args = array()) {
			global $contact_vars;
			if ($contact_id == '') return;
			
			$vars = array_merge( $contact_vars, $args );
			$excerpt = $vars['excerpt'];
			$retValue .= "<div class='media contact contact-".$contact_id."'>";

			
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
			
			$titel = get_field("titel",$contact_id);	
			if ($titel)
				$retValue .= "<span class='titel'>$titel</span>";
			
			$telefon = get_field("telefon",$contact_id);
			if ($telefon)
				$retValue .= "<span class='telefon'>TELEFON: <a href='tel:$telefon'>$telefon</a></span>";
			
			$fax = get_field("fax",$contact_id);	
			if ($fax)
				$retValue .= "<span class='fax'>FAX: $fax</span>";
			
			$mobiltelefon = get_field("mobiltelefon",$contact_id);	
			if ($mobiltelefon)
				$retValue .= "<span class='mobiltelefon'>MOBIL: <a href='tel:$mobiltelefon'>$mobiltelefon</a></span>";
			
			$epost = get_field("e-post",$contact_id);	
			if ($epost)
				$retValue .= "<span class='epost'>E-POST: <a href='mailto:$epost'>$epost</a></span>";

			$typ_av_kontakt = get_field("typ_av_kontakt",$contact_id);	
			if ($typ_av_kontakt)
				$retValue .= "<span class='typ_av_kontakt force-hidden'>".implode(',',$typ_av_kontakt)."</span>";

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
		 * Return the author
		 */
		function get_author() {
			$retValue .= '<div class="author">';

			if (get_the_author_meta('kontakt') != '') {
				$prelink = "<a href='".get_permalink(get_the_author_meta('kontakt'))."'>";
				$postlink = "</a>";
			}
			$name = get_the_author();
			if (get_the_author_meta('first_name') != '' || get_the_author_meta('last_name') != '') {
				$name = get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name');
			}
			
			$retValue .= "UPPDATERAD AV: $prelink$name$postlink";
			$retValue .= '</div>';
			return $retValue;
		}
		
		
		/*
		 * Return the first hugy_nyheter page
		 */
		function get_hugy_nyheter_page() {
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
		function get_hugy_kontakter_page() {
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
		function get_todaysdate_text() {
			$retValue = '<div class="weektext">';
			$retValue .= date('\v\. W\, j F');
			$retValue .= '</div>';
			return $retValue;
		}
	}
 ?>