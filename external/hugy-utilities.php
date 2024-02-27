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
				$retValue .= "<a title='" . get_sub_field('title') . "' href='" . get_sub_field('url') . "'>";
				$retValue .= self::get_quicksvg(get_sub_field('class'));
				$retValue .= "</a>";
			endwhile;
			$retValue .= "</div>";
		 
			endif;
			return $retValue;
		}

		static private function get_quicksvg($class) {
			$svg = '';
			switch($class) {
				case 'facebook':
					$svg = '<path d="M17.4,14.8c0,0.5,0,2.7,0,2.7h-2v3.3h2v9.1h4.1v-9.1h2.7c0,0,0.3-1.6,0.4-3.3 c-0.4,0-3.1,0-3.1,0s0-1.9,0-2.3c0-0.3,0.4-0.8,0.9-0.8s1.4,0,2.2,0c0-0.5,0-2,0-3.5c-1.1,0-2.5,0-3,0C17.3,11,17.4,14.3,17.4,14.8 z"/>';
					break;
				case 'dexter':
					$svg = '<path d="M6.6,17.1C7.2,17,7.8,17,8.5,17c1.1,0,1.9,0.2,2.4,0.7c0.5,0.5,0.9,1.1,0.9,2.1c0,1.3-0.5,2.4-1.4,3.1 c-0.8,0.6-1.8,0.9-3.2,0.9c-0.8,0-1.5-0.1-1.8-0.1L6.6,17.1z M7,22.6c0.2,0,0.4,0,0.6,0c0.8,0,1.5-0.3,1.9-0.8 c0.5-0.5,0.7-1.2,0.7-2c0-1.1-0.6-1.7-1.8-1.7c-0.2,0-0.5,0-0.6,0L7,22.6z"/>
							<path d="M16.3,23.5c-0.6,0.3-1.3,0.4-1.8,0.4c-1.4,0-2.1-0.8-2.1-2.1c0-1.5,1.1-3,2.9-3c1,0,1.7,0.6,1.7,1.5 c0,1.2-1.2,1.7-3.2,1.6c0,0.1,0.1,0.4,0.2,0.5c0.2,0.2,0.5,0.4,0.9,0.4c0.5,0,1-0.1,1.4-0.3L16.3,23.5z M15,19.8 c-0.7,0-1.1,0.6-1.2,1c1.1,0,1.7-0.1,1.7-0.6C15.6,20,15.4,19.8,15,19.8z"/>
							<path d="M19.1,18.9l0.3,0.7c0.1,0.4,0.2,0.6,0.3,0.8h0c0.2-0.3,0.3-0.5,0.5-0.8l0.5-0.8h1.6l-2.1,2.4l1.1,2.5H20 L19.7,23c-0.1-0.4-0.2-0.6-0.3-0.9h0c-0.1,0.2-0.3,0.5-0.5,0.8l-0.6,0.9h-1.7l2.1-2.5l-1.1-2.4C17.5,18.9,19.1,18.9,19.1,18.9z"/>
							<path d="M25.1,17.6l-0.2,1.3h1L25.7,20h-1l-0.3,1.7c0,0.2-0.1,0.4-0.1,0.6c0,0.2,0.1,0.4,0.4,0.4c0.1,0,0.3,0,0.4,0 l-0.2,1.1c-0.2,0.1-0.5,0.1-0.9,0.1c-0.9,0-1.3-0.4-1.3-1.1c0-0.3,0-0.5,0.1-0.9l0.4-1.9h-0.6l0.2-1.1h0.6l0.2-0.9L25.1,17.6z"/>
							<path d="M29.9,23.5c-0.6,0.3-1.3,0.4-1.8,0.4c-1.4,0-2.1-0.8-2.1-2.1c0-1.5,1.1-3,2.8-3c1,0,1.7,0.6,1.7,1.5 c0,1.2-1.2,1.7-3.2,1.6c0,0.1,0.1,0.4,0.2,0.5c0.2,0.2,0.5,0.4,0.9,0.4c0.5,0,1-0.1,1.4-0.3L29.9,23.5z M28.6,19.8 c-0.7,0-1.1,0.6-1.2,1c1.1,0,1.7-0.1,1.7-0.6C29.1,20,28.9,19.8,28.6,19.8z"/>
							<path d="M30.8,23.8l0.5-2.9c0.1-0.7,0.2-1.6,0.2-2h1.2c0,0.3,0,0.7-0.1,1h0c0.4-0.6,0.9-1.1,1.6-1.1 c0.1,0,0.2,0,0.3,0l-0.3,1.4c-0.1,0-0.1,0-0.2,0c-0.9,0-1.3,0.8-1.5,1.8l-0.3,1.8H30.8z"/>';
					break;
				case 'schema':
					$svg = '<circle class="st0" cx="20" cy="20.4" r="11.5"/>
							<line class="st0" x1="20" y1="12.3" x2="20" y2="22.4"/>
							<line class="st0" x1="21" y1="20.9" x2="27.7" y2="20.9"/>';
					break;
				case 'infomentor':
					$svg = '<path d="M5.1,12.8c0,0.3-0.2,0.5-0.6,0.5c-0.3,0-0.5-0.2-0.5-0.5s0.2-0.5,0.6-0.5C4.9,12.2,5.1,12.5,5.1,12.8z M4.1,19v-4.8H5V19H4.1z"/>
							<path d="M6.5,15.5c0-0.5,0-0.9,0-1.3h0.8L7.2,15h0c0.2-0.4,0.8-0.9,1.6-0.9c0.7,0,1.7,0.4,1.7,2.1V19H9.7v-2.8 c0-0.8-0.3-1.4-1.1-1.4c-0.6,0-1,0.4-1.2,0.9c0,0.1-0.1,0.3-0.1,0.4V19H6.5L6.5,15.5L6.5,15.5z"/>
							<path d="M12.1,19v-4.2h-0.7v-0.7h0.7v-0.2c0-0.7,0.2-1.3,0.6-1.7c0.3-0.3,0.8-0.4,1.2-0.4c0.3,0,0.6,0.1,0.8,0.1 l-0.1,0.7c-0.1-0.1-0.3-0.1-0.6-0.1c-0.8,0-0.9,0.6-0.9,1.4v0.3h1.2v0.7H13V19L12.1,19L12.1,19z"/>
							<path d="M19.2,16.5c0,1.8-1.2,2.6-2.4,2.6c-1.3,0-2.3-1-2.3-2.5c0-1.6,1.1-2.6,2.4-2.6C18.2,14.1,19.2,15.1,19.2,16.5 z M15.3,16.6c0,1.1,0.6,1.9,1.5,1.9c0.8,0,1.5-0.8,1.5-1.9c0-0.8-0.4-1.8-1.4-1.8C15.8,14.7,15.3,15.7,15.3,16.6z"/>
							<path d="M4,25.7c0-0.6,0-1.1,0-1.6h1.3l0.1,0.7h0C5.5,24.4,6,24,6.8,24c0.6,0,1.1,0.3,1.3,0.8h0 c0.2-0.3,0.4-0.5,0.6-0.6C9.1,24.1,9.4,24,9.7,24c0.9,0,1.6,0.7,1.6,2.1V29H9.9v-2.7c0-0.7-0.2-1.1-0.7-1.1 c-0.4,0-0.6,0.2-0.7,0.5c0,0.1-0.1,0.3-0.1,0.4V29H6.9v-2.7c0-0.6-0.2-1-0.7-1c-0.4,0-0.6,0.3-0.7,0.5c-0.1,0.1-0.1,0.3-0.1,0.4 V29H4L4,25.7L4,25.7z"/>
							<path d="M13.8,27c0,0.6,0.7,0.9,1.4,0.9c0.5,0,0.9-0.1,1.3-0.2l0.2,1c-0.5,0.2-1.1,0.3-1.8,0.3c-1.7,0-2.6-1-2.6-2.5 c0-1.2,0.8-2.6,2.5-2.6c1.6,0,2.2,1.2,2.2,2.4c0,0.3,0,0.5-0.1,0.6H13.8z M15.5,26c0-0.4-0.2-1-0.9-1c-0.6,0-0.9,0.6-0.9,1H15.5z" />
							<path d="M17.9,25.7c0-0.6,0-1.1,0-1.6h1.3l0.1,0.7h0c0.2-0.3,0.7-0.8,1.5-0.8c1,0,1.7,0.7,1.7,2.1V29H21v-2.7 c0-0.6-0.2-1.1-0.8-1.1c-0.4,0-0.7,0.3-0.8,0.6c0,0.1-0.1,0.2-0.1,0.4V29h-1.5L17.9,25.7L17.9,25.7z"/>
							<path d="M25.4,22.8v1.3h1.1v1.1h-1.1V27c0,0.6,0.1,0.9,0.6,0.9c0.2,0,0.3,0,0.4,0l0,1.1c-0.2,0.1-0.6,0.1-1,0.1 c-0.5,0-0.9-0.2-1.1-0.4c-0.3-0.3-0.4-0.8-0.4-1.4v-2h-0.6v-1.1h0.6v-0.9L25.4,22.8z"/>
							<path d="M32.1,26.5c0,1.8-1.3,2.6-2.6,2.6c-1.4,0-2.5-0.9-2.5-2.5c0-1.6,1-2.6,2.6-2.6C31.1,24,32.1,25,32.1,26.5z M28.6,26.5c0,0.8,0.4,1.5,1,1.5c0.6,0,1-0.6,1-1.5c0-0.7-0.3-1.5-1-1.5C28.9,25.1,28.6,25.8,28.6,26.5z"/>
							<path d="M33.1,25.7c0-0.7,0-1.2,0-1.6h1.3l0.1,0.9h0c0.2-0.7,0.8-1,1.3-1c0.1,0,0.2,0,0.3,0v1.4c-0.1,0-0.2,0-0.4,0 c-0.6,0-0.9,0.3-1,0.8c0,0.1,0,0.2,0,0.3V29h-1.5L33.1,25.7L33.1,25.7z"/>';
					break;
				case 'matsedel':
					$svg = '<path d="M17.5,18.1v2L18,30.3v0.1c0,0.8-0.6,1.3-1.3,1.3c-0.8,0-1.3-0.6-1.3-1.3v-0.1l0.5-10.2v-2 c-1.1-0.5-1.9-1.9-1.9-3.6v-4.4c0-0.3,0.2-0.5,0.5-0.5c0.3,0,0.5,0.2,0.5,0.5v3.6c0,0.3,0.2,0.5,0.5,0.5c0.3,0,0.5-0.2,0.5-0.5v-4 c0-0.3,0.3-0.5,0.5-0.5c0.3,0,0.5,0.2,0.5,0.5v4c0,0.3,0.2,0.5,0.5,0.5c0.3,0,0.5-0.2,0.5-0.5v-3.6c0-0.3,0.3-0.5,0.5-0.5 c0.3,0,0.5,0.2,0.5,0.5v4.4C19.4,16.2,18.6,17.7,17.5,18.1L17.5,18.1z"/>
							<path d="M24.6,31.7c-0.8,0-1.3-0.6-1.3-1.3v-0.1l0.5-9.3c-0.7,0-1.3-0.6-1.3-1.3v-3.2c0-4,0.9-7.2,1.9-7.2 c0.6,0,1.1,0.5,1.1,1.1v9.8L26,30.3v0.1C26,31.1,25.4,31.7,24.6,31.7L24.6,31.7z"/>
							<path d="M17.5,18.1v2L18,30.3v0.1c0,0.8-0.6,1.3-1.3,1.3c-0.8,0-1.3-0.6-1.3-1.3v-0.1l0.5-10.2v-2 c-1.1-0.5-1.9-1.9-1.9-3.6v-4.4c0-0.3,0.2-0.5,0.5-0.5c0.3,0,0.5,0.2,0.5,0.5v3.6c0,0.3,0.2,0.5,0.5,0.5c0.3,0,0.5-0.2,0.5-0.5v-4 c0-0.3,0.3-0.5,0.5-0.5c0.3,0,0.5,0.2,0.5,0.5v4c0,0.3,0.2,0.5,0.5,0.5c0.3,0,0.5-0.2,0.5-0.5v-3.6c0-0.3,0.3-0.5,0.5-0.5 c0.3,0,0.5,0.2,0.5,0.5v4.4C19.4,16.2,18.6,17.7,17.5,18.1L17.5,18.1z"/>
							<path d="M24.6,31.7c-0.8,0-1.3-0.6-1.3-1.3v-0.1l0.5-9.3c-0.7,0-1.3-0.6-1.3-1.3v-3.2c0-4,0.9-7.2,1.9-7.2 c0.6,0,1.1,0.5,1.1,1.1v9.8L26,30.3v0.1C26,31.1,25.4,31.7,24.6,31.7L24.6,31.7z"/>';
					break;
				case 'instagram':
					$svg = '<path d="M19.9,6c-3.8,0-4.3,0-5.7,0.1c-1.5,0.1-2.5,0.3-3.4,0.7S9.1,7.6,8.4,8.4s-1.3,1.5-1.6,2.4s-0.6,1.9-0.7,3.4S6,16.2,6,20
							s0,4.3,0.1,5.7c0.1,1.5,0.3,2.5,0.7,3.4s0.8,1.7,1.6,2.5c0.8,0.8,1.6,1.3,2.5,1.6c0.9,0.4,1.9,0.6,3.4,0.7c1.5,0.1,2,0.1,5.7,0.1
							s4.3,0,5.7-0.1c1.5-0.1,2.5-0.3,3.4-0.7c0.9-0.4,1.7-0.8,2.5-1.6c0.8-0.8,1.3-1.6,1.6-2.5c0.4-0.9,0.6-1.9,0.7-3.4
							c0.1-1.5,0.1-2,0.1-5.7s0-4.3-0.1-5.7c-0.1-1.5-0.3-2.5-0.7-3.4c-0.4-0.9-0.8-1.7-1.6-2.5c-0.8-0.8-1.6-1.3-2.5-1.6
							c-0.9-0.4-1.9-0.6-3.4-0.7C24.3,6.1,23.8,6,19.9,6z M25.6,8.6C27,8.7,27.7,9,28.2,9.2c0.7,0.2,1.1,0.5,1.6,1c0.5,0.5,0.8,1,1.1,1.6
							c0.2,0.5,0.4,1.2,0.5,2.6c0.1,1.5,0.1,1.9,0.1,5.6s0,4.2-0.1,5.6c-0.1,1.4-0.3,2.1-0.5,2.6c-0.3,0.7-0.6,1.1-1.1,1.6
							c-0.5,0.5-1,0.8-1.6,1.1c-0.5,0.2-1.2,0.4-2.6,0.5c-1.5,0.1-1.9,0.1-5.6,0.1c-3.8,0-4.2,0-5.6-0.1c-1.4-0.1-2.1-0.3-2.6-0.5
							c-0.7-0.3-1.1-0.6-1.6-1.1s-0.8-1-1.1-1.6c-0.2-0.5-0.4-1.2-0.5-2.6c-0.1-1.5-0.1-1.9-0.1-5.6s0-4.2,0.1-5.6C8.6,13,8.8,12.2,9,11.7
							c0.3-0.7,0.6-1.1,1.1-1.6s1-0.8,1.6-1.1c0.5-0.2,1.2-0.4,2.6-0.5c1.5-0.1,1.9-0.1,5.6-0.1 M19.9,12.8c-4,0-7.2,3.2-7.2,7.2
							s3.2,7.2,7.2,7.2s7.2-3.2,7.2-7.2C27.2,16,23.9,12.8,19.9,12.8z M19.9,24.6c-2.6,0-4.7-2.1-4.7-4.7s2.1-4.7,4.7-4.7s4.7,2.1,4.7,4.7
							S22.5,24.6,19.9,24.6z M29.1,12.6c0,0.9-0.8,1.7-1.7,1.7c-0.9,0-1.7-0.8-1.7-1.7s0.8-1.7,1.7-1.7C28.3,10.9,29.1,11.6,29.1,12.6z"/>';
					break;
			}
			if ($svg != '') {
				$svg = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40" style="enable-background:new 0 0 40 40;" xml:space="preserve"><g>'.$svg.'</g></svg>';
			}
			return "<span class='quick-svg quick-{$class}'>{$svg}</span>";
		}


		/*
		 * Get quick menu. Placed in menu.
		 */
		function get_quickmenu() {
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
		function get_program_links( $icon = true, $wrapping_ul = true, $page_template = "page-hugy-program.php" ) {
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
		function get_slideshow( $images, $wrapper_class_name = "slideshow", $size = "thumbnail" ) {
			global $image_sizes;
			$retValue = "";
			if ( $images ): 
				$retValue .= "<div class='$wrapper_class_name'>";
				$retValue .= "<div class='slides'>";
				foreach ( $images as $image ) :
					if ( ( $image_sizes[$size][0] == "9999" || $image_sizes[$size][0] == $image["sizes"][$size."-width"] )
					 && ($image_sizes[$size][1] == "9999" || $image_sizes[$size][1] == $image["sizes"][$size."-height"] ) ) {
						$url = $image["sizes"][$size];
						$retValue .= "<div class='slide-item slide-wrapper'><img src='" . $url ."' alt='" . $image['alt'] . "' />";
						if ($image['alt'] != '')
							$retValue .= "<div class='caption'>". $image['alt'] . "</div>";
						$retValue .= "</div>";
					}
				endforeach;
				$retValue .= "</div></div>";
			endif;
			return $retValue;
		}
		/*
		 * Get slideshow images
		 */
		function get_filmroll_slideshow($images, $wrapper_class_name = "slideshow", $size = "thumbnail") {
			global $image_sizes;
			$retValue = "";
			if( $images ): 
				$retValue .= "<div class='$wrapper_class_name'>";
				$addedimages = 0;
				foreach( $images as $image ) :
					if (($image_sizes[$size][0] == "9999" || $image_sizes[$size][0] == $image["sizes"][$size."-width"] )
					 && ($image_sizes[$size][1] == "9999" || $image_sizes[$size][1] == $image["sizes"][$size."-height"])) {
						$url = $image["sizes"][$size];
						$retValue .= "<div class='slide-item'><img src='" . $url ."' alt='" . $image['alt'] . "' />";
						if ($image['alt'] != '')
							$retValue .= "<div class='caption'>". $image['alt'] . "</div>";
						$retValue .= "</div>";
						$addedimages++;
					}
				endforeach;
				// add images one more time if less than 5 to make filmroll
				if ( $addedimages > 1 && $addedimages < 5 )
					foreach( $images as $image ) :
						if (($image_sizes[$size][0] == "9999" || $image_sizes[$size][0] == $image["sizes"][$size."-width"] )
						 && ($image_sizes[$size][1] == "9999" || $image_sizes[$size][1] == $image["sizes"][$size."-height"])) {
							$url = $image["sizes"][$size];
							$retValue .= "<div class='slide-item'><img src='" . $url ."' alt='" . $image['alt'] . "' />";
							if ($image['alt'] != '')
								$retValue .= "<div class='caption'>". $image['alt'] . "</div>";
							$retValue .= "</div>";
						}
					endforeach;
				$retValue .= "</div>";
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
				$retValue .= "<div class='$wrapper_class_name'><img src='" . get_stylesheet_directory_uri() ."/images/empty.png' alt='Ingen bild' /></div>";
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
					$retValue .= "<a class='menu-margin' id='menu'></a>";
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


					$retValue .= "<li><a class='menu-head menu-icon'></a><ul class='children'>";
					$retValue .= HuGy::get_page_tree();
					$retValue .= "</ul></li>";

					$retValue .= "<li><span class='menu-title-wrapper'><a class='menu-head picto-icon'></a><span class='menu-title'>Gymnasium</span></span><ul class='children'>";
					$retValue .= HuGy::get_program_links(false,false);
					$retValue .= "</ul>";
					$komvuxlinks = HuGy::get_program_links(false,false,"page-hugy-komvux.php");
					if ($komvuxlinks != "") :
						$retValue .= "<span class='menu-title-wrapper'><a class='menu-head picto-icon'></a><span class='menu-title'>Komvux</span></span><ul class='children'>";
						$retValue .= $komvuxlinks;
						$retValue .= "</ul>";
					endif;
					$retValue .= "</li>";

					// quickmenu
					$retValue .= "<li><a class='menu-head quick-menu-icon'></a><ul class='children'>";
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
					$retValue .= HuGy::get_filmroll_slideshow(get_sub_field('slideshow','option'),'firstpage  filmroll','firstpage');
				endif;
				$retValue .= "</div>";
				$retValue .= "</div>";
			endwhile;
			return $retValue;
		}
		
		
		/*
		 * Return news, used in get_modules()
		 */
		function get_news($number_news = 3) {
			$retValue = "<a class='menu-margin' id='nyheter'></a>";
			 
			// The Query
			$the_query = new WP_Query( array(
											'post_type' => 'post',
											'posts_per_page' => $number_news ));

			// The Loop
			if ( $the_query->have_posts() ) {
				$retValue .= "<div class='items'>";
				while ( $the_query->have_posts() ) {
					$retValue .= "<div class='item'>";
					$the_query->the_post();
					$retValue .=  HuGy::get_tags();
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
			$archive = HuGy::get_hugy_nyheter_page();
			if ($archive != '') {
				$retValue .= "<div class='text--center'><a href='" . get_page_link($archive->ID) . "' title='" . $archive->post_title . "'>Gå till arkivet</a></div>";
			}
			/* Restore original Post Data */
			wp_reset_postdata();
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
		function get_related($page_id = "") {
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
		function get_contact( $contact_id = "", $args = array() ) {
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
		function get_date() {
			$retValue .= " <time class='time' datetime='";
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
			
			$retValue .= "$prelink$name$postlink";
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
			setlocale(LC_ALL, 'sv_SE');
			$retValue = '<div class="weektext">';
			$date = date_i18n('j F\, \v\e\c\k\a W');
			$retValue .= $date;
			$retValue .= '</div>';
			$retValue .= '<div class="todaysfood"></div>';
			return $retValue;
		}
		
		
		
		/*
		 * Return text with todays date and week
		 */
		function get_columntext() {
			if (get_field('hg_columntext',get_the_ID())) :
				return "<div class='columntext'>" . get_field('hg_columntext',get_the_ID()) . "</div>";
			endif;
		}

		function get_tags($contact_id = "") {
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