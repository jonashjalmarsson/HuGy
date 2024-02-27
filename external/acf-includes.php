<?php
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
						'min' => '',
						'max' => '',
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
						'label' => 'L&auml;nk',
						'name' => 'lank',
						'display' => 'row',
						'min' => '',
						'max' => '',
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
						'min' => '',
						'max' => '',
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
				'min' => '',
				'max' => '',
			),
			array (
				'key' => 'field_529c8de8644a5',
				'label' => 'Kolumntext',
				'name' => 'hg_columntext',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'yes',
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
				array (
					'param' => 'page_template',
					'operator' => '!=',
					'value' => 'page-hugy-pagelink.php',
					'order_no' => 1,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 1,
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
		'id' => 'acf_direktlank',
		'title' => 'Direktl&auml;nk',
		'fields' => array (
			array (
				'key' => 'field_52a6f2926c913',
				'label' => 'Direktl&auml;nk',
				'name' => 'redirect_url',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-hugy-pagelink.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'author',
				9 => 'format',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
				13 => 'send-trackbacks',
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
				'key' => 'field_5273a3a928622',
				'label' => 'Bild',
				'name' => 'bild',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
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
				'key' => 'field_5285f0a04d0ec',
				'label' => 'Fax',
				'name' => 'fax',
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
				'key' => 'field_52777a773e5ad',
				'label' => 'Beskrivning',
				'name' => 'beskrivning',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
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
				'key' => 'field_5273578413979',
				'label' => 'Adress',
				'name' => 'adress',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_5285f0d00bb6a',
				'label' => 'Typ av kontakt',
				'name' => 'typ_av_kontakt',
				'type' => 'checkbox',
				'required' => 1,
				'choices' => array (
					'Administration' => 'Administration (Kansli, Studie och yrkesv&auml;gledning, Elevh&auml;lsa o dyl)',
					'Pedagoger' => 'Pedagoger och elevassistenter',
					'Servicefunktion' => 'Servicefunktioner (Cafeteria, Kost, Vaktm&auml;steri, Lokalv&aring;rd o dyl)',
					'Skolledning' => 'Skolledning',
				),
				'default_value' => '',
				'layout' => 'vertical',
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
				'label' => 'Inneh&aring;ll',
				'name' => 'hg_modules',
				'type' => 'flexible_content',
				'layouts' => array (
					array (
						'label' => 'Nyheter',
						'name' => 'nyheter',
						'display' => 'row',
						'min' => '',
						'max' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_52f9fe53136a0',
								'label' => 'Antal nyheter',
								'name' => 'number_news',
								'type' => 'number',
								'column_width' => '',
								'default_value' => 3,
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => 3,
								'max' => 9,
								'step' => 3,
							),
						),
					),
					array (
						'label' => 'Facebook',
						'name' => 'facebook',
						'display' => 'row',
						'min' => '',
						'max' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_526a2de8db102',
								'label' => 'facebooksidans id',
								'name' => 'id',
								'type' => 'text',
								'instructions' => 'Hitta sidans id p&aring; denna l&auml;nk http://findmyfacebookid.com/',
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
						'min' => '',
						'max' => '',
						'sub_fields' => array (
						),
					),
					array (
						'label' => 'Text',
						'name' => 'text',
						'display' => 'row',
						'min' => '',
						'max' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_52651cd97fd68',
								'label' => 'Text',
								'name' => 'text',
								'type' => 'wysiwyg',
								'column_width' => '',
								'default_value' => '',
								'toolbar' => 'full',
								'media_upload' => 'yes',
							),
							array (
								'key' => 'field_527b96d558a3e',
								'label' => 'Bakgrundsf&auml;rg',
								'name' => 'background-color',
								'type' => 'color_picker',
								'column_width' => '',
								'default_value' => '',
							),
							array (
								'key' => 'field_527b97c2837ad',
								'label' => 'Textf&auml;rg',
								'name' => 'color',
								'type' => 'color_picker',
								'column_width' => '',
								'default_value' => '',
							),
						),
					),
					array (
						'label' => 'Bildspel',
						'name' => 'bildspel',
						'display' => 'row',
						'min' => '',
						'max' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_52fa09b40912f',
								'label' => 'Bildspel',
								'name' => 'slideshow',
								'type' => 'gallery',
								'column_width' => '',
								'preview_size' => 'thumbnail',
								'library' => 'all',
							),
						),
					),
				),
				'button_label' => 'L&auml;gg till modul',
				'min' => '',
				'max' => '',
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
		'id' => 'acf_profil',
		'title' => 'Profil',
		'fields' => array (
			array (
				'key' => 'field_527b8e2972545',
				'label' => 'Kontakt',
				'name' => 'kontakt',
				'type' => 'post_object',
				'post_type' => array (
					0 => 'hugy_kontakt',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_user',
					'operator' => '==',
					'value' => 'all',
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
	register_field_group(array (
		'id' => 'acf_schema',
		'title' => 'Schema',
		'fields' => array (
			array (
				'key' => 'field_528b0727c4917',
				'label' => 'Klasser',
				'name' => 'klasser',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_528b06dac4915',
				'label' => 'Salar',
				'name' => 'salar',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_528b06f6c4916',
				'label' => 'L&auml;rare',
				'name' => 'larare',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-hugy-schema.php',
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
		'id' => 'acf_installningar',
		'title' => 'Inst&auml;llningar',
		'fields' => array (
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
				'label' => 'Snabbgenv&auml;gar',
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
						'label' => 'L&auml;nk',
						'name' => 'url',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'text',
						'maxlength' => '',
					),
					array(
						'key' => 'field_525d435285d2',
						'label' => 'Class',
						'name' => 'class',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'text',
						'maxlength' => '',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'L&auml;gg till',
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
				'key' => 'field_528b8119cf59c',
				'label' => 'Direktl&auml;nkar i menyn',
				'name' => 'direktlankar_i_menyn',
				'type' => 'flexible_content',
				'layouts' => array (
					array (
						'label' => 'Intern l&auml;nk',
						'name' => 'intern_lank',
						'display' => 'row',
						'min' => '',
						'max' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_528b818acf59d',
								'label' => 'Intern l&auml;nk',
								'name' => 'intern_lank',
								'type' => 'post_object',
								'column_width' => '',
								'post_type' => array (
									0 => 'post',
									1 => 'page',
									2 => 'hugy_kontakt',
								),
								'taxonomy' => array (
									0 => 'all',
								),
								'allow_null' => 0,
								'multiple' => 0,
							),
						),
					),
					array (
						'label' => 'Extern l&auml;nk',
						'name' => 'extern_lank',
						'display' => 'row',
						'min' => '',
						'max' => '',
						'sub_fields' => array (
							array (
								'key' => 'field_528b81f9cf5a1',
								'label' => 'Titel',
								'name' => 'titel',
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
								'key' => 'field_528b81d2cf5a0',
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
								'key' => 'field_528b8204cf5a2',
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
				),
				'button_label' => 'L&auml;gg till genv&auml;g',
				'min' => '',
				'max' => '',
			),
			array (
				'key' => 'field_528d1ff2ce0b7',
				'label' => 'Visa inte sidor i menyn',
				'name' => 'visa_inte_sidor_i_menyn',
				'type' => 'relationship',
				'return_format' => 'id',
				'post_type' => array (
					0 => 'page',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_528d215b34499',
				'label' => 'Script direkt efter &lt;body&gt; (ska inte inneh&aring;lla script-taggar)',
				'name' => 'innehall_i_topp_body',
				'type' => 'textarea',
				'default_value' => '',
			),
			array (
				'key' => 'field_528d215b3440e',
				'label' => 'Inneh&aring;ll i sidfot',
				'name' => 'innehall_i_sidfot',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
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
		'menu_order' => 1,
	));
}
?>
