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
			array (
				'key' => 'field_52736561eae27',
				'label' => 'Kontakter',
				'name' => 'hg_kontakter',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'hugy_kontakt',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_type',
					2 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_52738166ce668',
				'label' => 'Relaterade',
				'name' => 'hg_relaterade',
				'type' => 'flexible_content',
				'layouts' => array (
					array (
						'label' => 'Dokument',
						'name' => 'dokument',
						'display' => 'row',
						'sub_fields' => array (
							array (
								'key' => 'field_527381ca844b9',
								'label' => 'Dokument',
								'name' => 'dokument',
								'type' => 'file',
								'column_width' => '',
								'save_format' => 'object',
								'library' => 'all',
							),
						),
					),
					array (
						'label' => 'Länk',
						'name' => 'lank',
						'display' => 'row',
						'sub_fields' => array (
							array (
								'key' => 'field_527381fd844bb',
								'label' => 'Namn',
								'name' => 'namn',
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
								'key' => 'field_52738209844bc',
								'label' => 'Url',
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
								'key' => 'field_52738210844bd',
								'label' => 'Beskrivning',
								'name' => 'beskrivning',
								'type' => 'text',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
						),
					),
					array (
						'label' => 'Rubrik',
						'name' => 'rubrik',
						'display' => 'row',
						'sub_fields' => array (
							array (
								'key' => 'field_52778333acef3',
								'label' => 'Rubrik',
								'name' => 'rubrik',
								'type' => 'text',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
						),
					),
				),
				'button_label' => 'Ny rad',
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
			array (
				'key' => 'field_526e5ade9814a',
				'label' => 'Direktlänk på förstasidan',
				'name' => 'hg_firstpage_teaser_link',
				'type' => 'flexible_content',
				'layouts' => array (
					array (
						'label' => 'Länk',
						'name' => 'teaser',
						'display' => 'row',
						'sub_fields' => array (
							array (
								'key' => 'field_526f80bc9ae25',
								'label' => 'Länk',
								'name' => 'link',
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
								'key' => 'field_526f80ca9ae26',
								'label' => 'Bild',
								'name' => 'image',
								'type' => 'image',
								'column_width' => '',
								'save_format' => 'url',
								'preview_size' => 'thumbnail',
								'library' => 'all',
							),
							array (
								'key' => 'field_526f80dd9ae27',
								'label' => 'Hover bild (valfri)',
								'name' => 'hover_image',
								'type' => 'image',
								'column_width' => '',
								'save_format' => 'url',
								'preview_size' => 'thumbnail',
								'library' => 'all',
							),
							array (
								'key' => 'field_526f83ee9e92b',
								'label' => 'Left/Right',
								'name' => 'x_align',
								'type' => 'select',
								'column_width' => '',
								'choices' => array (
									'left' => 'left',
									'right' => 'right',
								),
								'default_value' => '',
								'allow_null' => 0,
								'multiple' => 0,
							),
							array (
								'key' => 'field_526f810538082',
								'label' => 'position',
								'name' => 'x_pos',
								'type' => 'number',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => '',
								'max' => '',
								'step' => '',
							),
							array (
								'key' => 'field_526f83b09e92a',
								'label' => 'Top/Bottom',
								'name' => 'y_align',
								'type' => 'select',
								'column_width' => '',
								'choices' => array (
									'top' => 'top',
									'bottom' => 'bottom',
								),
								'default_value' => '',
								'allow_null' => 0,
								'multiple' => 0,
							),
							array (
								'key' => 'field_526f812038083',
								'label' => 'position',
								'name' => 'y_pos',
								'type' => 'number',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => '',
								'max' => '',
								'step' => '',
							),
						),
					),
				),
				'button_label' => 'Lägg till',
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
		'id' => 'acf_kontakt',
		'title' => 'Kontakt',
		'fields' => array (
			array (
				'key' => 'field_52777a683e5ab',
				'label' => 'Titel',
				'name' => 'titel',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52777a703e5ac',
				'label' => 'Arbetsplats',
				'name' => 'arbetsplats',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_527357aa1397a',
				'label' => 'Ansvar',
				'name' => 'ansvar',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_52777a773e5ad',
				'label' => 'Beskrivning',
				'name' => 'beskrivning',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_5273576313976',
				'label' => 'Telefon',
				'name' => 'telefon',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5273577313977',
				'label' => 'Mobiltelefon',
				'name' => 'mobiltelefon',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5273577b13978',
				'label' => 'E-post',
				'name' => 'e-post',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5273578413979',
				'label' => 'Adress',
				'name' => 'adress',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_5273a3a928622',
				'label' => 'Bild',
				'name' => 'bild',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'hugy_kontakt',
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
		'id' => 'acf_moduler',
		'title' => 'Moduler',
		'fields' => array (
			array (
				'key' => 'field_5265193457019',
				'label' => 'Innehåll',
				'name' => 'hg_modules',
				'type' => 'flexible_content',
				'layouts' => array (
					array (
						'label' => 'Nyheter',
						'name' => 'nyheter',
						'display' => 'row',
						'sub_fields' => array (
						),
					),
					array (
						'label' => 'Facebook',
						'name' => 'facebook',
						'display' => 'row',
						'sub_fields' => array (
							array (
								'key' => 'field_526a2de8db102',
								'label' => 'facebooksidans id',
								'name' => 'id',
								'type' => 'text',
								'instructions' => 'Hitta sidans id på denna länk http://findmyfacebookid.com/',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
						),
					),
					array (
						'label' => 'Program',
						'name' => 'program',
						'display' => 'row',
						'sub_fields' => array (
						),
					),
					array (
						'label' => 'Text',
						'name' => 'text',
						'display' => 'row',
						'sub_fields' => array (
							array (
								'key' => 'field_52651cd97fd68',
								'label' => 'text',
								'name' => 'text',
								'type' => 'wysiwyg',
								'column_width' => '',
								'default_value' => '',
								'toolbar' => 'full',
								'media_upload' => 'yes',
							),
						),
					),
				),
				'button_label' => 'Lägg till modul',
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
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-hugy-main.php',
					'order_no' => 0,
					'group_no' => 1,
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
					'value' => 'page-hugy-program.php',
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