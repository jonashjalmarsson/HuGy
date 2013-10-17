<?php
/**
 *  Install Add-ons
 *  
 *  The following code will include all 4 premium Add-Ons in your theme.
 *  Please do not attempt to include a file which does not exist. This will produce an error.
 *  
 *  The following code assumes you have a folder 'add-ons' inside your theme.
 *
 *  IMPORTANT
 *  Add-ons may be included in a premium theme/plugin as outlined in the terms and conditions.
 *  For more information, please read:
 *  - http://www.advancedcustomfields.com/terms-conditions/
 *  - http://www.advancedcustomfields.com/resources/getting-started/including-lite-mode-in-a-plugin-theme/
 */ 

// Tillägg 
// include_once('add-ons/acf-repeater/acf-repeater.php');
// include_once('add-ons/acf-gallery/acf-gallery.php');
// include_once('add-ons/acf-flexible-content/acf-flexible-content.php');
// include_once( 'add-ons/acf-options-page/acf-options-page.php' );


/**
 *  Registrera fältgrupper
 *
 *  Funktionen register_field_group tar emot en array som innehåller inställningarna för samtliga fältgrupper.
 *  Du kan redigera denna array fritt. Detta kan dock leda till fel om ändringarna inte är kompatibla med ACF.
 */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_alla-sidor',
		'title' => 'Alla sidor',
		'fields' => array (
			array (
				'key' => 'field_525261cffddc5',
				'label' => 'Bildspel',
				'name' => 'hg_slideshow',
				'type' => 'gallery',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'featured_image',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_inst%c3%a4llningar',
		'title' => 'Inställningar',
		'fields' => array (
			array (
				'key' => 'field_52526201085f3',
				'label' => 'Bildspel förstasida',
				'name' => 'hg_firstpage_slideshow',
				'type' => 'gallery',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5252624b7bfbd',
				'label' => 'Facebook eller annan info',
				'name' => 'hg_firstpage_extra_information',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_525d45e01120a',
				'label' => 'Programikoner (svg)',
				'name' => 'hg_program_icons_svg',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_525d47871120b',
				'label' => 'Programikoner (png)',
				'name' => 'hg_program_icons_png',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_52526290e9423',
				'label' => 'Snabbgenvägar',
				'name' => 'hg_quicklinks',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_525262b1e9424',
						'label' => 'Titel',
						'name' => 'title',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_525262d0e9426',
						'label' => 'Länk',
						'name' => 'url',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_525d435285d1a',
						'label' => 'Vilken plats i bilden',
						'name' => 'imageplace',
						'type' => 'number',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'min' => 1,
						'max' => 20,
						'step' => 1,
					),
				),
				'row_min' => 0,
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Lägg till',
			),
			array (
				'key' => 'field_525d479e1120c',
				'label' => 'Snabbikoner (svg)',
				'name' => 'hg_quick_icons_svg',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_525d47bb1120d',
				'label' => 'Snabbikoner (png)',
				'name' => 'hg_quick_icons_svg',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_programsida',
		'title' => 'Programsida',
		'fields' => array (
			array (
				'key' => 'field_524aa14691e27',
				'label' => 'Bubbla',
				'name' => 'hg_bubbla',
				'type' => 'image',
				'save_format' => 'id',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_524aa18f91e28',
				'label' => 'Pictogram',
				'name' => 'hg_pictogram',
				'type' => 'image',
				'save_format' => 'id',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_525d448c3f07b',
				'label' => 'Vilken plats i Programbild',
				'name' => 'hg_imageplace',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 1,
				'max' => 20,
				'step' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-program.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

?>