<?php
/* 
 * REGISTER post_type hugy_kontakt 
 */
add_action('init', hugy_contacts_init);
function hugy_contacts_init() {
	// only if in admin and is administrator
    //if (is_admin() && current_user_can("administrator")) {

		register_post_type( 'hugy_kontakt',
			array(
				'labels' => array(
					'name' => __( 'Kontakter' ),
					'singular_name' => __( 'Kontakt' ),
					'description' => 'L&auml;gg till en kontakt i kontaktbanken.'
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'kontakt'),
				'show_ui' => true,
				'show_in_menu' => true,
				'capability_type' => 'page',
				'hierarchical' => false,
				'publicly_queryable' => true,
				'query_var' => true,
				'supports' => array('title','revisions','author'),
			));

	//}
}
?>