<?php
/*
 * REGISTER post_type hugy_kontakt
 */
add_action('init', 'hugy_contacts_init');
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
		register_taxonomy_for_object_type('post_tag', 'hugy_kontakt');

	//}
}

add_filter( 'manage_edit-hugy_kontakt_columns', 'my_edit_hugy_kontakt_columns' ) ;
function my_edit_hugy_kontakt_columns($columns) {

	$new_columns = array(
		'titel' => 'Titel',
		'arbetsplats' => 'Arbetsplats'
	);
    return array_merge($columns, $new_columns);
}

add_action( 'manage_hugy_kontakt_posts_custom_column' , 'custom_hugy_kontakt_column', 10, 2 );
function custom_hugy_kontakt_column( $column, $post_id ) {
    switch ( $column ) {
        case 'arbetsplats' :
            echo get_field( 'arbetsplats', $post_id);
            break;
        case 'titel' :
            echo get_field( 'titel', $post_id);
            break;
    }
}


?>
