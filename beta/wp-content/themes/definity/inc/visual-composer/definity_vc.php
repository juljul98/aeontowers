<?php
/**
 * Defintiy Visual Composer
 *
 * @package Definity
 * @version 1.2
 */


if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/* --------------------------------------------------
	VC Config
-------------------------------------------------- */

vc_disable_frontend();

function vc_before_init_actions() {
	// Setup VC to be part of a theme
	if( function_exists('vc_set_as_theme') ) {
	    vc_set_as_theme( true ); 
	}

	// VC elements's folder
	if( function_exists('vc_set_shortcodes_templates_dir') ) { 
	    vc_set_shortcodes_templates_dir( DEFINITY_INC_DIR . '/visual-composer/vc-elements' );
	}

	// Enable VC by default on a list of Post Types
	if( function_exists('vc_set_default_editor_post_types') ) {
	    $list = array(
	        'page',
	        'post',
	        'portfolio',
	        // 'your-custom-posttype-slug'
	    );	         
	    vc_set_default_editor_post_types( $list );
	}

	

	// Custom icons
	include_once DEFINITY_INC_DIR . '/visual-composer/params/iconpicker.php';
	include_once DEFINITY_INC_DIR . '/visual-composer/page-templates.php';
}
add_action( 'vc_before_init', 'vc_before_init_actions' );

function vc_after_init_actiions() {
	// Remove & deregister VC animate.css file
	if ( ! function_exists( 'remove_vc_stylesheet' ) ) {
		function remove_vc_stylesheet() {
			if ( ! is_admin() ) {
			      wp_dequeue_style( 'animate-css' );
			      wp_deregister_style( 'animate-css' );
			}
		}
		add_action( 'wp_enqueue_scripts', 'remove_vc_stylesheet', 20 );
	}
}
add_action( 'vc_after_init', 'vc_after_init_actiions' );



/* --------------------------------------------------
	Default VC elements
-------------------------------------------------- */

if( function_exists('vc_remove_element') ) {
	vc_remove_element( 'vc_section' );
	// vc_remove_element( 'vc_column_text' );
	// vc_remove_element( 'vc_separator' );
	// vc_remove_element( 'vc_text_separator' );
	// vc_remove_element( 'vc_message' );
	vc_remove_element( 'vc_facebook' );
	vc_remove_element( 'vc_tweetmeme' );
	vc_remove_element( 'vc_googleplus' );
	vc_remove_element( 'vc_pinterest' );
	vc_remove_element( 'vc_toggle' );
	// vc_remove_element( 'vc_single_image' );
	vc_remove_element( 'vc_gallery' );
	vc_remove_element( 'vc_images_carousel' );
	// vc_remove_element( 'vc_tabs' );
	// vc_remove_element( 'vc_tour' );
	// vc_remove_element( 'vc_accordion' );
	// vc_remove_element( 'vc_teaser_grid' );
	// vc_remove_element( 'vc_posts_grid' );
	// vc_remove_element( 'vc_carousel' );
	vc_remove_element( 'vc_posts_slider' );
	// vc_remove_element( 'vc_widget_sidebar' );
	// vc_remove_element( 'vc_button' );
	// vc_remove_element( 'vc_button2' );
	// vc_remove_element( 'vc_cta_button' );
	// vc_remove_element( 'vc_cta_button2' );
	// vc_remove_element( 'vc_video' );
	// vc_remove_element( 'vc_gmaps' );
	// vc_remove_element( 'vc_raw_html' );
	// vc_remove_element( 'vc_raw_js' );
	vc_remove_element( 'vc_flickr' );
	// vc_remove_element( 'vc_progress_bar' );
	vc_remove_element( 'vc_pie' );
	// vc_remove_element( 'vc_empty_space' );
	// vc_remove_element( 'vc_custom_heading' );
	vc_remove_element( 'vc_basic_grid' );
	// vc_remove_element( 'vc_media_grid' );
	vc_remove_element( 'vc_masonry_grid' );
	// vc_remove_element( 'vc_masonry_media_grid' );
	// vc_remove_element( 'vc_icon' );
	vc_remove_element( 'vc_btn' );
	// vc_remove_element( 'vc_cta' );
	// vc_remove_element( 'vc_round_chart' );
	vc_remove_element( 'vc_line_chart' );
	// vc_remove_element( 'vc_tta_tabs' );
	vc_remove_element( 'vc_tta_tour' );
	// vc_remove_element( 'vc_tta_accordion' );
	// vc_remove_element( 'vc_tta_section' );
	vc_remove_element( 'vc_tta_pageable' );
	vc_remove_element( 'vc_hoverbox' ); // add in v5.3
	vc_remove_element( 'vc_zigzag' ); // add in v5.3


	/* ---- WordPress Default Widgets ---- */
	vc_remove_element( 'vc_wp_search' );
	vc_remove_element( 'vc_wp_meta' );
	vc_remove_element( 'vc_wp_recentcomments' );
	vc_remove_element( 'vc_wp_calendar' );
	vc_remove_element( 'vc_wp_pages' );
	vc_remove_element( 'vc_wp_tagcloud' );
	vc_remove_element( 'vc_wp_custommenu' );
	vc_remove_element( 'vc_wp_text' );
	vc_remove_element( 'vc_wp_posts' );
	vc_remove_element( 'vc_wp_categories' );
	vc_remove_element( 'vc_wp_archives' );
	vc_remove_element( 'vc_wp_rss' );

	/* ---- Remove third-party plugin elements ---- */
	// vc_remove_element( 'contact-form-7' );
}


/* ---- VC Row - vc_row ---- */
vc_remove_param( 'vc_row', 'css' ); // Design option tab
vc_remove_param( 'vc_row', 'gap' );
vc_remove_param( 'vc_row', 'full_width' );
vc_add_param('vc_row', array(
	'param_name' => 'row_type',
	'type'       => 'dropdown',
	'heading'    => 'Row Type',
	'weight'	 => '10',
	'value'      => array(
		"Normal (boxed)"  	=> '',
		"Full Width"   		=> 'full-width',
	)
));
vc_add_param('vc_row', array(
	'param_name' => 'background',
	'type'       => 'colorpicker',
	'heading'    => 'Background Color',
	'weight'	 => '9',
));
vc_add_param('vc_row', array(
	'param_name' => 'video_bg_fallback',
	'type'       => 'attach_image',
	'heading'    => 'Fallback Video Background',
	'description'=> 'Add image that will server as a fallback when the video bg loads or don\'t play',
	'weight'	 => '1',
	'dependency' => array(
		'element' => 'video_bg',
		'not_empty' => true,
	)
));


/* ---- VC Row Inner - vc_row_inner ---- */
vc_remove_param( 'vc_row_inner', 'css' );
vc_remove_param( 'vc_row_inner', 'gap' );


/* ---- VC Column - vc_column ---- */
vc_add_param( 'vc_column', array(
		'param_name'    => 'no_gap_check',
        'type'          => 'checkbox',
        'heading'       => esc_html__( 'No column gaps', 'definity' ),
        'value'         => esc_html__( '0', 'definity' ),
        'weight'		=> '1',
        'description'   => esc_html__( 'Check this if you don`t want spacing between the columns', 'definity' ),
        'value'         => array(
            esc_html__( 'Enable', 'definity' ) => 'no-gap'
        )
    ) 
);


/* ---- VC Column - vc_column_inner ---- */
vc_add_param( 'vc_column_inner', array(
		'param_name'    => 'no_gap_check',
        'type'          => 'checkbox',
        'heading'       => esc_html__( 'No column gaps', 'definity' ),
        'value'         => esc_html__( '0', 'definity' ),
        'weight'		=> '1',
        'description'   => esc_html__( 'Check this if you don`t want spacing between the columns', 'definity' ),
        'value'         => array(
            esc_html__( 'Enable', 'definity' ) => 'no-gap'
        )
    ) 
);


/* ---- VC Text Block - vc_column_text ---- */
vc_remove_param( 'vc_column_text', 'css' );
vc_remove_param( 'vc_column_text', 'css_animation' );


/* ---- VC Single Image ---- */
vc_remove_param( 'vc_single_image', 'title' );


/* --------------------------------------------------
	Shortcodes VC mapping
-------------------------------------------------- */

if ( defined( 'DEFINITY_ELEMENTS' ) && file_exists( DEFINITY_INC_DIR . '/plugins/definity-elements.zip' ) ) {

	add_action( 'init', 'definity_integrateVC');
    function definity_integrateVC() {

    	/* ---- Button (vc map) ---- */
    	vc_map( array(
    		'base' 			=> 'd_button',
            'name' 			=> esc_html('Button', 'definity'),
            'description' 	=> esc_html('Eye catching button', 'definity'), 
            'category' 		=> esc_html('Definity Elements', 'definity'),
            'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/button.png',
            'params' 		=> array(
                array(
                    'type'          => 'textfield',
                    'holder'        => 'span',
                    'param_name'    => 'title',
                    'heading'       => esc_html( 'Title', 'definity' ),
                    'description'   => esc_html( 'Enter a button title', 'definity' ),
                    'value'         => esc_html( 'Button Title', 'definity' )
                ),
                array(
                    'type'          => 'vc_link',
                    'param_name'    => 'link',
                    'heading'       => esc_html( 'URL (Link)', 'definity' ),
                    'description'   => esc_html( 'Set a button link', 'definity' )
                ),
                array(
                    'type'          => 'dropdown',
                    'param_name'    => 'type',
                    'heading'       => esc_html( 'Type', 'definity' ),
                    'description'   => esc_html( '(optional) Select button type.', 'definity' ),
                    'value'         => array(
                        'Normal Button'    		=> 'btn',
                        'Ghost Button'     		=> 'btn-ghost',
                        'Rounded Ghost Button'	=> 'btn-ghost btn-round',
                        'Text Button'    		=> 'btn-text',
                    ),
                ),
                array(
                    'type'          => 'dropdown',
                    'param_name'    => 'size',
                    'heading'       => esc_html( 'Size', 'definity' ),
                    'description'   => esc_html( '(optional) Select button size', 'definity' ),
                    'value'         => array(
                        'Normal'        => '',
                        'Large'         => 'btn-large',
                        'Small'         => 'btn-small',
                    ),
                ),
                array(
                    'type'          => 'dropdown',
                    'param_name'    => 'align',
                    'heading'       => esc_html( 'Align', 'definity' ),
                    'description'   => esc_html( '(optional) Select button alignment.', 'definity' ),
                    'value'         => array(
                        'Left'      => 'left',
                        'Center'    => 'center',
                        'Right'     => 'right'
                    ),
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'css_class',
                    'heading'       => esc_html( 'Custom CSS class', 'definity' ),
                    'description'   => esc_html( '(optional) Style particular content element differently - add a class name and refer to it in custom CSS', 'definity' ),
                ),
                // normal btn
                array(
                    'type'          => 'colorpicker',
                    'param_name'    => 'bg',
                    'heading'       => esc_html( 'Button Background', 'definity' ),
                    'description'   => esc_html( 'Custom background for the button.', 'definity' ),
                    'group'			=> 'Style',
                    'dependency'    => array(
                        'element'   => 'type',
                        'value'     => array( 'btn' )
                    )
                ),
                array(
                    'type'          => 'colorpicker',
                    'param_name'    => 'bg_hover',
                    'heading'       => esc_html( 'Button Hover Background', 'definity' ),
                    'description'   => esc_html( 'Custom hover background for the button.', 'definity' ),
                    'group'			=> 'Style',
                    'dependency'    => array(
                        'element'   => 'type',
                        'value'     => array( 'btn' )
                    )
                ),
                // ghost/rounded btn
                array(
                    'type'          => 'colorpicker',
                    'param_name'    => 'border_color',
                    'heading'       => esc_html( 'Button Border Color', 'definity' ),
                    'description'   => esc_html( 'Custom border color for the button.', 'definity' ),
                    'group'			=> 'Style',
                    'dependency'    => array(
                        'element'   => 'type',
                        'value'     => array( 'btn-ghost', 'btn-ghost btn-round' )
                    )
                ),
                array(
                    'type'          => 'colorpicker',
                    'param_name'    => 'border_bg_hover',
                    'heading'       => esc_html( 'Button Hover Background', 'definity' ),
                    'description'   => esc_html( 'Custom hover background for the button.', 'definity' ),
                    'group'			=> 'Style',
                    'dependency'    => array(
                        'element'   => 'type',
                        'value'     => array( 'btn-ghost', 'btn-ghost btn-round' )
                    )
                ),
                // text btn
                array(
                    'type'          => 'colorpicker',
                    'param_name'    => 'text_btn_border_color',
                    'heading'       => esc_html( 'Button Border Color', 'definity' ),
                    'description'   => esc_html( 'Custom border (hover) color for the button.', 'definity' ),
                    'group'			=> 'Style',
                    'dependency'    => array(
                        'element'   => 'type',
                        'value'     => array( 'btn-text' )
                    )
                ),
                // all
                array(
                    'type'          => 'colorpicker',
                    'param_name'    => 'text_color',
                    'heading'       => esc_html( 'Button Text Color', 'definity' ),
                    'description'   => esc_html( 'Custom text color for the button.', 'definity' ),
                    'group'			=> 'Style',
                ),
                array(
                    'type'          => 'colorpicker',
                    'param_name'    => 'text_hover_color',
                    'heading'       => esc_html( 'Button Hover Text Color', 'definity' ),
                    'description'   => esc_html( 'Custom hover text color for the button.', 'definity' ),
                    'group'			=> 'Style',
                ),
            )
        ));


		/* ---- Blockquote (vc map) ---- */
		vc_map( array(
	        'base' 			=> 'd_blockquote',
	        'name' 			=> esc_html__('Blockquote', 'definity'),
	        'description' 	=> esc_html__('Display stylish blockquote', 'definity'), 
	        'category' 		=> esc_html__('Definity Elements', 'definity'),
	        'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/testimonial_slide.png',
	        'params' 		=> array(
	            array(
	                'type'          => 'textarea',
	                'param_name'    => 'quote',
	                'holder'        => 'p',
	                'heading'       => esc_html__( 'Blockquote', 'definity' ),
	                'value'         => esc_html__( 'Enter quote here', 'definity' ),
	            ),  
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'author',
	                'holder'        => 'p',
	                'class'         => 'text-center',
	                'heading'       => esc_html__( 'Author', 'definity' ),
	                'value'         => esc_html__( 'by Henry Ford', 'definity' ),
	            ),
	            array(
	                'type'          => 'dropdown',
	                'param_name'    => 'style',
	                'heading'       => esc_html__('Blockquote Style', 'definity' ),
	                'description'   => esc_html__( 'Change the style of the blockquote', 'definity' ),
	                'value'         => array(
	                    'Basic'        => '',
	                    'Alternative'  => 'alt-blockquote'
	                ),
	                'std'			=> ''
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'bg_color',
	                'heading'       => esc_html__( 'Background', 'definity' ),
	                'description'   => esc_html__( 'Select background color', 'definity' ),
	                'group'			=> 'Options',
	                'dependency'    => array(
	                    'element'   => 'style',
	                    'value'     => 'alt-blockquote'
	                ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'css_class',
	                'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
	                'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'definity' ),
	                'group'			=> 'Options'
	            )                         
	        )
	    ));


		/* ---- Page Title (vc map) ---- */
    	vc_map( array(
	        'base' 			=> 'd_page_title',
	        'name' 			=> esc_html__('Page Title', 'definity'),
	        'description' 	=> esc_html__('Page title, subtitle and breadcrumbs', 'definity'), 
	        'category' 		=> esc_html__('Definity Elements', 'definity'),
	        'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/page_title.png',
	        'params' 		=> array(
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'pt_title',
	                'holder'        => 'h4',
	                'class'         => 'text-center',
	                'heading'       => esc_html__( 'Title', 'definity' ),
	                'value'         => esc_html__( 'Enter title here', 'definity' ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'pt_subtitle',
	                'holder'        => 'p',
	                'class'         => 'text-center',
	                'heading'       => esc_html__( 'Subtitle', 'definity' ),
	                'value'         => esc_html__( 'Enter subtitle here', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'pt_size',
	                    'value'     => array( 'pt-medium', 'pt-large' )
	                )
	            ),
	            array(
                    'type'          => 'dropdown',
                    'param_name'    => 'pt_size',
                    'heading'       => esc_html( 'Layout', 'definity' ),
                    'description'   => esc_html( 'Select page title layout.', 'definity' ),
                    'value'         => array(
                        'Large'    	=> 'pt-large',
                        'Medium'    => 'pt-medium',
                        'Small'		=> 'pt-small',
                    ),
                    'std'			=> 'pt-medium'
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'pt_height',
                    'heading'       => esc_html__( 'Custom Height', 'definity' ),
                    'description'   => esc_html__( 'Enter custom height (in px) for the page title.', 'definity' ),
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'pt_padding_top',
                    'heading'       => esc_html__( 'Padding Top', 'definity' ),
                    'description'   => esc_html__( 'Push the content inside the page title from top to bottom.', 'definity' ),
                    'group'			=> 'Options'
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'pt_padding_bottom',
                    'heading'       => esc_html__( 'Padding Bottom', 'definity' ),
                    'description'   => esc_html__( 'Push the content inside the page title from bottom to top.', 'definity' ),
                    'group'			=> 'Options'
                ),
                array(
	                'type'          => 'checkbox',
	                'param_name'    => 'pt_breadcrumbs',
	                'value'         => array(
	                    esc_html__( 'Show breadcrumbs', 'definity' ) => '1'
	                ),
	                'std'			=> '1',
	            ),
	            array(
	                'type'          => 'checkbox',
	                'param_name'    => 'pt_parallax',
	                'value'         => array(
	                    esc_html__( 'Enable Paralalx effect', 'definity' ) => '1'
	                ),
	                'dependency'    => array(
	                    'element'   => 'pt_size',
	                    'value'     => array( 'pt-medium', 'pt-large' )
	                )
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'pt_title_color',
	                'heading'       => esc_html__( 'Title color', 'definity' ),
	                'group'			=> 'Options'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'pt_subtitle_color',
	                'heading'       => esc_html__( 'Subtitle color', 'definity' ),
	                'group'			=> 'Options'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'pt_bg_color',
	                'heading'       => esc_html__( 'Background color', 'definity' ),
	                'group'			=> 'Options'
	            ),
	            array(
                    'type'          => 'attach_image',
                    'param_name'    => 'pt_bg_img',
                    'heading'       => esc_html__( 'Background Image', 'definity' ),
                    'dependency'    => array(
                        'element'   => 'pt_size',
                        'value'     => array( 'pt-large', 'pt-medium' )
                    ),
                ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'pt_overlay_bg',
	                'heading'       => esc_html__( 'Overlay background color', 'definity' ),
	                'description'   => esc_html__( 'Optional transparent layer over background image.', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'pt_size',
	                    'value'     => array( 'pt-large', 'pt-medium' )
	                ),
	                'group'			=> 'Options',
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'pt_bc_color',
	                'heading'       => esc_html__( 'Breadcrumb Links Color', 'definity' ),
	                'group'			=> 'Options'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'pt_bc_hover_color',
	                'heading'       => esc_html__( 'Breadcrumb Links Hover Color', 'definity' ),
	                'group'			=> 'Options'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'pt_bc_active_color',
	                'heading'       => esc_html__( 'Breadcrumbs Current Color', 'definity' ),
	                'group'			=> 'Options'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'pt_bc_sep',
	                'heading'       => esc_html__( 'Breadcrumbs Separator Color', 'definity' ),
	                'group'			=> 'Options'
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'css_class',
	                'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
	                'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'definity' ),
	            )                         
	        )
	    ));

    	/* ---- Section Heading (vc map) ---- */
    	vc_map( array(
	        'base' 			=> 'd_sec_heading',
	        'name' 			=> esc_html__('Section Heading', 'definity'),
	        'description' 	=> esc_html__('Styled heading with subheading option', 'definity'), 
	        'category' 		=> esc_html__('Definity Elements', 'definity'),
	        'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/section_heading.png',
	        'params' 		=> array(

	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'heading',
	                'holder'        => 'h4',
	                'class'         => 'text-center',
	                'heading'       => esc_html__( 'Heading', 'definity' ),
	                'value'         => esc_html__( 'Enter heading here', 'definity' ),
	                'description'   => esc_html__( 'Title for the feature card', 'definity' ),
	            ),  
	              
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'subheading',
	                'holder'        => 'p',
	                'class'         => 'text-center',
	                'heading'       => esc_html__( 'Sub-heading', 'definity' ),
	                'value'         => esc_html__( 'Enter subheading here', 'definity' ),
	                'description'   => esc_html__( 'Subheading for more description', 'definity' ),
	            ),

	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'heading_color',
	                'heading'       => esc_html__( 'Heading color', 'definity' ),
	                'description'   => esc_html__( 'Select heading color', 'definity' ),
	                'group'			=> 'Options'
	            ),

	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'subheading_color',
	                'heading'       => esc_html__( 'Sub-heading color', 'definity' ),
	                'description'   => esc_html__( 'Select heading color', 'definity' ),
	                'group'			=> 'Options'
	            ),

	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'bot_margin',
	                'heading'       => esc_html__( 'Bottom spacing', 'definity' ),
	                'description'   => esc_html__( 'Bottom Spacing in px between the heading section and other elements on the page (numbers only)', 'definity' ),
	                'group'			=> 'Options'
	            ),

	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'heading_gap',
	                'heading'       => esc_html__( 'Headings and subheading spacing', 'definity' ),
	                'description'   => esc_html__( 'Spacing in px between the heading and the subheading (numbers only)', 'definity' ),
	                'group'			=> 'Options'
	            ),

	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'css_class',
	                'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
	                'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'definity' ),
	                'group'			=> 'Options'
	            )                         
	        )
	    ));


    	/* ---- Feature Box (vc map) ---- */
    	vc_map( array(
    		'base' 			=> 'd_ft_box',
	        'name' 			=> esc_html__('Feature Box', 'definity'),
	        'description' 	=> esc_html__('Icon with title and short description', 'definity'), 
	        'category' 		=> esc_html__('Definity Elements', 'definity'),
	        'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/feature_box.png',
	        'params' 		=> array(
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'title',
	                'holder'        => 'h4',
	                'class'         => 'title-class',
	                'heading'       => esc_html__( 'Title', 'definity' ),
	                'value'         => esc_html__( 'Enter heading', 'definity' ),
	                'description'   => esc_html__( 'Title for the feature box', 'definity' )
	            ),  
	            array(
	                'type'          => 'textarea',
	                'param_name'    => 'text',
	                'holder'        => 'div',
	                'class'         => 'text-class',
	                'heading'       => esc_html__( 'Short Description', 'definity' ),
	                'value'         => esc_html__( 'Write short description', 'definity' ),
	                'description'   => esc_html__( 'Description for the feature box', 'definity' )
	            ),
	            array(
	                'type'          => 'dropdown',
	                'param_name'    => 'layout',
	                'heading'       => esc_html__('Feature Box Layout', 'definity' ),
	                'description'   => esc_html__( 'Select layout for the feature box', 'definity' ),
	                'value'         => array(
	                    'Centered'      => 'ft-centered',
	                    'Left Aligned'  => 'ft-left',
	                    'Right Aligned'  => 'ft-right',
	                    'Inline Icon - Left Aligned' => 'ft-x',
	                    'Inline Icon - Right Aligned' => 'ft-x right-align'
	                ),
	            ),
	            array(
	                'type'          => 'dropdown',
	                'param_name'    => 'style',
	                'heading'       => esc_html__('Icon Style', 'definity' ),
	                'description'   => esc_html__( 'Select style of the icon for the feature box', 'definity' ),
	                'value'         => array(
	                    'Material'              => 'ft-material',
	                    'Basic'                 => 'ft-basic',
	                    'Diagonal Pattern'      => 'ft-diagonal',
	                    'Light Circle Frame'    => 'ft-circle-frame',
	                    'Light Square Frame'    => 'ft-square-frame',
	                    'Dark Circle Frame'     => 'ft-circle-frame-dark',
	                    'Dark Square Frame'     => 'ft-square-frame-dark',
	                    'Dark Animated'         => 'ft-dark-spin',
	                    'Light Circle Overlay'  => 'ft-circle-overlay',
	                    'Light Square Overlay'  => 'ft-square-overlay',
	                    'Small Card'            => 'ft-small-card',
	                ),
	                'std'           => 'ft-material'
	            ),
	            array(
	                'type'          => 'iconpicker',
	                'param_name'    => 'icon',
	                'heading'       => esc_html__( 'Icon Type', 'definity' ),
	                'description'   => esc_html__( 'Select icon from library.', 'definity' ),
	                'settings'      => array(
	                    'type'          => 'lineicons', // Custom iconsets
	                    'emptyIcon'     => false, // Default true, display an "EMPTY" icon?
	                    'iconsPerPage'  => 150 // Icons shown at once in VC picker
	                ),
	                'group'			=> 'Icon'
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'top_offset',
	                'heading'       => esc_html__( 'Top Offset', 'definity' ),
	                'description'   => esc_html__( 'Distance between text and icon in px', 'definity' ),
	                'group'			=> 'Icon'
	            ),
	            array(
                    'type'          => 'attach_image',
                    'param_name'    => 'image',
                    'heading'       => esc_html__( 'Image', 'definity' ),
                    'description'   => esc_html__( 'Add image instead of icon (transparent .png).', 'definity' ),
                    'group'			=> 'Icon'
                ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'left_offset',
	                'heading'       => esc_html__( 'Left Offset', 'definity' ),
	                'description'   => esc_html__( 'Distance between text and icon in px (numbers only) ', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'layout',
	                    'value'     => array( 'ft-x' )
	                ),
	                'group'			=> 'Icon'
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'right_offset',
	                'heading'       => esc_html__( 'Right Offset', 'definity' ),
	                'description'   => esc_html__( 'Distance between text and icon in px (numbers only)', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'layout',
	                    'value'     => array( 'ft-x right-align' )
	                ),
	                'group'			=> 'Icon'
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'css_class',
	                'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
	                'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'definity' ),
	            ),
	            // Style
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'icon_color',
	                'heading'       => esc_html__( 'Icon Color', 'definity' ),
	                'description'   => esc_html__( '(optional) Select icon color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'txt_color',
	                'heading'       => esc_html__( 'Text Color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'bg_color',
	                'heading'       => esc_html__( 'Background Color', 'definity' ),
	                'group'			=> 'Style',
	                'dependency'    => array(
                        'element'   => 'style',
                        'value'     => array( 'ft-circle-frame', 'ft-square-frame', 'ft-circle-frame-dark', 'ft-square-frame-dark', 'ft-dark-spin', 'ft-circle-overlay', 'ft-square-overlay', 'ft-small-card' )
                    ),
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'border_color',
	                'heading'       => esc_html__( 'Border Color', 'definity' ),
	                'group'			=> 'Style',
	                'dependency'    => array(
                        'element'   => 'style',
                        'value'     => array( 'ft-circle-frame', 'ft-square-frame', 'ft-circle-frame-dark', 'ft-square-frame-dark', 'ft-dark-spin', 'ft-circle-overlay', 'ft-square-overlay', )
                    ),
	            ),
	        )
    	));

		
		/* ---- Feature Box Hover (vc map) ---- */
		vc_map( array(
			'base' 			=> 'd_ft_box_hover',
            'name' 			=> esc_html__('Feature Hover Box', 'definity'),
            'description' 	=> esc_html__('Hover box that change the text on hover', 'definity'), 
            'category' 		=> esc_html__('Definity Elements', 'definity'),
            'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/feature_hover_box.png',
            'params' 		=> array(
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'heading',
                    'holder'        => 'p',
                    'heading'       => esc_html__( 'Heading', 'definity' ),
                    'value'         => esc_html__( 'Enter heading', 'definity' ),
                    'description'   => esc_html__( 'Heading for the element', 'definity' ),
                ),  
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'subheading',
                    'holder'        => 'p',
                    'heading'       => esc_html__( 'Sub-heading', 'definity' ),
                    'value'         => esc_html__( 'Enter subheading', 'definity' ),
                    'description'   => esc_html__( 'Sub-heading for the element', 'definity' ),
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'hover_heading',
                    'heading'       => esc_html__( 'Hover Heading', 'definity' ),
                    'value'         => esc_html__( 'Enter hover heading', 'definity' ),
                    'description'   => esc_html__( 'Heading for the element', 'definity' ),
                ), 
                array(
                    'type'          => 'textarea',
                    'param_name'    => 'text',
                    'heading'       => esc_html__( 'Short Description', 'definity' ),
                    'value'         => esc_html__( 'Write short description', 'definity' ),
                    'description'   => esc_html__( 'Short description shown on hover. TIP: keep the description text the same size for multiple elements for best look.', 'definity' ),
                ),
                array(
                    'type'          => 'vc_link',
                    'param_name'    => 'link',
                    'heading'       => esc_html__( 'Link', 'definity' ),
                    'description'   => esc_html__( '(optional) Add a link after the description', 'definity' )
                ),
                array(
                    'type'          => 'iconpicker',
                    'param_name'    => 'icon',
                    'heading'       => esc_html__( 'Chose main icon', 'definity' ),
                    'description'   => esc_html__( 'Select icon from library.', 'definity' ),
                    'settings'      => array(
                        'type'          => 'lineicons',
                        'emptyIcon'     => false,
                        'iconsPerPage'  => 150
                    ),
                    'group'			=> 'Icon'
                ),
                array(
                    'type'          => 'iconpicker',
                    'param_name'    => 'icon_hover',
                    'heading'       => esc_html__( 'Chose icon shown on hover', 'definity' ),
                    'description'   => esc_html__( 'Select icon from library. This icon will be visible on mouse hover, it can be the same as the main one.', 'definity' ),
                    'value'         => '',
                    'settings'      => array(
                        'type'          => 'lineicons',
                        'emptyIcon'     => false,
                        'iconsPerPage'  => 150
                    ),
                    'group'			=> 'Icon'
                ),
                array(
                    'type'          => 'colorpicker',
                    'param_name'    => 'icon_color',
                    'heading'       => esc_html__( 'Icon Color', 'definity' ),
                    'description'   => esc_html__( 'Select icon color', 'definity' ),
                    'group'			=> 'Icon'
                ),
                array(
                    'type'          => 'colorpicker',
                    'param_name'    => 'icon_hover_color',
                    'heading'       => esc_html__( 'Icon Hover Color', 'definity' ),
                    'description'   => esc_html__( 'Select icon color for the hover icon', 'definity' ),
                    'group'			=> 'Icon'
                ),
                array(
                    'type'          => 'colorpicker',
                    'param_name'    => 'bg',
                    'heading'       => esc_html__( 'Background', 'definity' ),
                    'description'   => esc_html__( 'Select background color', 'definity' ),
                    'group'			=> 'Options'
                ),
                array(
                    'type'          => 'colorpicker',
                    'param_name'    => 'bg_hover',
                    'heading'       => esc_html__( 'Hover Background', 'definity' ),
                    'description'   => esc_html__( 'Select background color for the hover', 'definity' ),
                    'group'			=> 'Options'
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'css_class',
                    'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
                    'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'definity' ),
                    'group'			=> 'Options'
                ),
                     
            )
        ));

		
		/* ---- Feature Image Hover (vc map) ---- */
		vc_map( array(
			'base' 			=> 'd_ft_image_hover',
		    'name' 			=> esc_html__('Feature Image Hover', 'definity'),
		    'description' 	=> esc_html__('Image that shows content on hover', 'definity'), 
		    'category' 		=> esc_html__('Definity Elements', 'definity'),
		    'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/feature_image_hover.png',
		    'params' 		=> array(
		        array(
		            'type'          => 'textfield',
		            'param_name'    => 'heading',
		            'holder'        => 'p',
		            'heading'       => esc_html__( 'Heading', 'definity' ),
		            'value'         => esc_html__( 'Enter heading', 'definity' ),
		            'description'   => esc_html__( 'Heading for the element', 'definity' ),
		        ),
		        array(
		            'type'          => 'textarea',
		            'param_name'    => 'text',
		            'heading'       => esc_html__( 'Short Description', 'definity' ),
		            'value'         => esc_html__( 'Write short description', 'definity' ),
		            'description'   => esc_html__( 'Short description shown on hover. TIP: keep the description text the same size for multiple elements for best look.', 'definity' ),
		        ),
		        array(
		            'type'          => 'vc_link',
		            'param_name'    => 'link',
		            'heading'       => esc_html__( 'Link', 'definity' ),
		            'description'   => esc_html__( '(optional) Add a link after the description', 'definity' )
		        ),
		        array(
		            'type'          => 'attach_image',
		            'param_name'    => 'bg',
		            'heading'       => esc_html__( 'Background Image', 'definity' ),
		            'description'   => esc_html__( 'Add larger image as a background,', 'definity' ),
		        ),
		        array(
		            'type'          => 'textfield',
		            'param_name'    => 'p_left',
		            'value'         => '100',
		            'heading'       => esc_html__( 'Text content left spacing', 'definity' ),
		            'description'   => esc_html__( 'Adjust the text content spacing (numbers only)', 'definity' ),
		        ),
		        array(
		            'type'          => 'textfield',
		            'param_name'    => 'p_right',
		            'value'         => '100',
		            'heading'       => esc_html__( 'Text content right spacing', 'definity' ),
		            'description'   => esc_html__( 'Adjust the text content spacing (numbers only)', 'definity' ),
		        ),
		        array(
		            'type'          => 'textfield',
		            'param_name'    => 'css_class',
		            'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
		            'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'definity' ),
		        ),
		        // Style
		        array(
		            'type'          => 'colorpicker',
		            'param_name'    => 'bg_overlay',
		            'heading'       => esc_html__( 'Background Color', 'definity' ),
		            'description'   => esc_html__( 'Set background color. Tip: add transparent layer over the image', 'definity' ),
		            'group'			=> 'Style'
		        ),
		        array(
		            'type'          => 'colorpicker',
		            'param_name'    => 'bg_hover_overlay',
		            'heading'       => esc_html__( 'Background Hover Color', 'definity' ),
		            'description'   => esc_html__( 'Change the background on hover. Tip: use the same color as above but with darker transparency.', 'definity' ),
		            'group'			=> 'Style'
		        ),
		        array(
		            'type'          => 'colorpicker',
		            'param_name'    => 'title_color',
		            'heading'       => esc_html__( 'Title Color', 'definity' ),
		            'group'			=> 'Style'
		        ),
		        array(
		            'type'          => 'colorpicker',
		            'param_name'    => 'btn_txt_color',
		            'heading'       => esc_html__( 'Button Text Color', 'definity' ),
		            'group'			=> 'Style'
		        ),
		        array(
		            'type'          => 'colorpicker',
		            'param_name'    => 'btn_txt_hover_color',
		            'heading'       => esc_html__( 'Button Text Hover Color', 'definity' ),
		            'group'			=> 'Style'
		        ),
		        array(
		            'type'          => 'colorpicker',
		            'param_name'    => 'btn_border_color',
		            'heading'       => esc_html__( 'Button Border Color', 'definity' ),
		            'group'			=> 'Style'
		        ),
		    )
		));


		/* ---- Feature Card (vc map) ---- */
		vc_map( array(
	        'base' 			=> 'd_ft_card',
	        'name' 			=> esc_html__('Feature Card', 'definity'),
	        'description' 	=> esc_html__('Card like element with icon, title and short description', 'definity'), 
	        'category' 		=> esc_html__('Definity Elements', 'definity'),
	        'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/feature_card.png',
	        'params' 		=> array(
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'title',
	                'holder'        => 'p',
	                'class'         => 'title-class',
	                'heading'       => esc_html__( 'Title', 'definity' ),
	                'value'         => esc_html__( 'Enter heading here', 'definity' ),
	                'description'   => esc_html__( 'Title for the feature card', 'definity' ),
	            ),
	            array(
	                'type'          => 'iconpicker',
	                'param_name'    => 'icon',
	                'heading'       => esc_html__( 'Icon Type', 'definity' ),
	                'description'   => esc_html__( 'Select icon from library.', 'definity' ),
	                'value'         => '',  // VC bug - you canot pick that icon if you add icon here
	                'settings'      => array(
	                    'type'          => 'lineicons', // Custom iconsets
	                    'emptyIcon'     => false, // Default true, display an "EMPTY" icon?
	                    'iconsPerPage'  => 150 // Icons shown at once in VC picker
	                ),
	            ),
	            array(
	                'type'          => 'textarea_html',
	                'param_name'    => 'content',
	                'holder'		=> 'p',
	                'heading'       => esc_html__( 'Short Description', 'definity' ),
	                'value'         => esc_html__( 'Enter short description here', 'definity' ),
	                'description'   => esc_html__( 'Description for the feature card', 'definity' ),
	            ),
	            array(
	                'type'          => 'vc_link',
	                'param_name'    => 'link',
	                'heading'       => esc_html__( 'Link', 'definity' ),
	                'description'   => esc_html__( 'Add a link after the description', 'definity' )
	            ),
	            array(
                    'type'          => 'attach_image',
                    'param_name'    => 'image',
                    'heading'       => esc_html__( 'Image', 'definity' ),
                    'description'   => esc_html__( 'Add image instead of icon (e.g. transparent .png).', 'definity' ),
                    'group'			=> 'Style'
                ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'icon_color',
	                'heading'       => esc_html__( 'Icon Color', 'definity' ),
	                'description'   => esc_html__( 'Select icon color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'bg_color',
	                'heading'       => esc_html__( 'Background Color', 'definity' ),
	                'description'   => esc_html__( 'Change the background color of the card.', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'broder_color',
	                'heading'       => esc_html__( 'Border Color', 'definity' ),
	                'description'   => esc_html__( 'Change the color of the border around the card.', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'title_color',
	                'heading'       => esc_html__( 'Title Color', 'definity' ),
	                'description'   => esc_html__( 'Change the title color.', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'link_color',
	                'heading'       => esc_html__( 'Link Color', 'definity' ),
	                'description'   => esc_html__( 'Change the link color.', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'checkbox',
	                'param_name'    => 'link_arrow_off',
	                'heading'       => esc_html__( 'Link Arrow', 'definity' ),
	                'description'   => esc_html__( 'Hide the arrow from the link.', 'definity' ),
	                'value'         => array(
	                    esc_html__( 'Hide', 'definity' )    => '1'
	                ),
	                // 'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'top_offset',
	                'heading'       => esc_html__( 'Top Offset', 'definity' ),
	                'description'   => esc_html__( 'Distance between text and icon in px.', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'css_class',
	                'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
	                'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'definity' ),
	            ),
	        )
	    ));


	    /* ---- Feature Card Image (vc map) ---- */
	    vc_map( array(
	    	'base' 			=> 'd_ft_card_img',
            'name' 			=> esc_html__('Feature Cards Image', 'definity'),
            'description' 	=> esc_html__('Card like element with image, title, and text', 'definity'), 
            'category' 		=> esc_html__('Definity Elements', 'definity'),
            'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/feature_cards_image.png',
            'params' 		=> array(
            	array(
                    'type'          => 'attach_image',
                    'param_name'    => 'image',
                    'heading'       => esc_html__( 'Image', 'definity' ),
                    'description'   => esc_html__( 'Select image from the media library. (optimal size: 350 x 370 px)', 'definity' ),
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'title',
                    'holder'        => 'h3',
                    'heading'       => esc_html__( 'Title', 'definity' ),
                    'value'         => esc_html__( 'Enter heading here', 'definity' ),
                    'description'   => esc_html__( 'Title for the feature card', 'definity' ),
                ),  
                array(
                    'type'          => 'textarea_html',
                    'param_name'    => 'content',
                    'holder'        => 'div',
                    'heading'       => esc_html__( 'Short Description', 'definity' ),
                    'value'         => esc_html__( 'Enter short description here', 'definity' ),
                    'description'   => esc_html__( 'Description for the feature card', 'definity' ),
                ),
                array(
                    'type'          => 'vc_link',
                    'param_name'    => 'link',
                    'heading'       => esc_html__( 'Link', 'definity' ),
                    'description'   => esc_html__( 'Add a link after the description', 'definity' )
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'css_class',
                    'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
                    'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'definity' ),
                ),
                // Style
                array(
                    'type'          => 'colorpicker',
                    'param_name'    => 'bg_color',
                    'heading'       => esc_html__( 'Card Background Color', 'definity' ),
                    'group'			=> 'Style'
                ),
                array(
                    'type'          => 'colorpicker',
                    'param_name'    => 'title_color',
                    'heading'       => esc_html__( 'Title Color', 'definity' ),
                    'group'			=> 'Style'
                ),
                array(
                    'type'          => 'colorpicker',
                    'param_name'    => 'link_color',
                    'heading'       => esc_html__( 'Link Color', 'definity' ),
                    'group'			=> 'Style'
                ),
            )
        ));


        /* ---- Link Card (vc map) ---- */
		vc_map( array(
	        'base' 			=> 'd_ft_link_card',
	        'name' 			=> esc_html__('Link Card', 'definity'),
	        'description' 	=> esc_html__('Card like element with image, title, description & link', 'definity'), 
	        'category' 		=> esc_html__('Definity Elements', 'definity'),
	        'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/link_card.png',
	        'params' 		=> array(
	        	array(
                    'type'          => 'attach_image',
                    'param_name'    => 'image',
                    'heading'       => esc_html__( 'Image', 'definity' ),
                    'description'   => esc_html__( 'Select image from the media library. (optimal size: 680 x 490 px)', 'definity' ),
                ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'title',
	                'holder'        => 'p',
	                'class'         => 'title-class',
	                'heading'       => esc_html__( 'Title', 'definity' ),
	                'value'         => esc_html__( 'Enter heading here', 'definity' ),
	                'description'   => esc_html__( 'Title for the link Card', 'definity' ),
	            ),
	            array(
	                'type'          => 'textarea',
	                'param_name'    => 'desc',
	                'holder'		=> 'p',
	                'heading'       => esc_html__( 'Short Description', 'definity' ),
	                'value'         => esc_html__( 'Enter short description here', 'definity' ),
	                'description'   => esc_html__( 'Description for the feature card', 'definity' ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'button_title',
	                'holder'        => 'p',
	                'class'         => 'title-class',
	                'heading'       => esc_html__( 'Button Title', 'definity' ),
	                'value'         => esc_html__( 'Enter button text here', 'definity' ),
	            ),
	            array(
	                'type'          => 'vc_link',
	                'param_name'    => 'link',
	                'heading'       => esc_html__( 'Link', 'definity' ),
	                'description'   => esc_html__( 'Add a link after the description', 'definity' )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'top_offset',
	                'heading'       => esc_html__( 'Top Offset', 'definity' ),
	                'description'   => esc_html__( 'Distance between text and icon in px (numbers only)', 'definity' ),
	                'group'			=> 'Options'
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'css_class',
	                'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
	                'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'definity' ),
	                'group'			=> 'Options'
	            )                         
	        )
	    ));


		if ( is_plugin_active( 'wp-ultimate-crypto/wp-ultimate-crypto.php' ) ) {
        /* ---- Crypto Card (vc map) ---- */
		vc_map( array(
	        'base' 			=> 'd_ft_crypto_card',
	        'name' 			=> esc_html__('Crypto Card', 'definity'),
	        'description' 	=> esc_html__('Display the price of a selected cryptocurrency', 'definity'), 
	        'category' 		=> esc_html__('Definity Elements', 'definity'),
	        'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/crypto_card.png',
	        'params' 		=> array(
	        	array(
	        	    'type'          => 'iconpicker',
	        	    'param_name'    => 'icon',
	        	    'heading'       => esc_html__( 'Icon', 'definity' ),
	        	    'description'   => esc_html__( 'Select icon from library.', 'definity' ),
	        	    'value'         => '',  // VC bug - you canot pick that icon if you add icon here
	        	    'settings'      => array(
	        	        'type'          => 'lineicons', // Custom iconsets
	        	        'emptyIcon'     => false, // Default true, display an "EMPTY" icon?
	        	        'iconsPerPage'  => 150 // Icons shown at once in VC picker
	        	    ),
	        	),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'title',
	                'holder'        => 'p',
	                'class'         => 'title-class',
	                'heading'       => esc_html__( 'Title', 'definity' ),
	                'value'         => esc_html__( 'Bitcoin', 'definity' ),
	                'description'   => esc_html__( 'Crypto currency name', 'definity' ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'crypto',
	                'heading'       => esc_html__( 'Cryptocurrency', 'definity' ),
	                'value'         => esc_html__( 'BTC', 'definity' ),
	                'description'   => esc_html__( 'Pick cryptocurrency. Enter the full name of the crypto in lowercase, e.g. bitcoin, ethereum', 'definity' ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'fiat',
	                'heading'       => esc_html__( 'Fiat', 'definity' ),
	                'value'         => esc_html__( 'EUR', 'definity' ),
	                'description'   => esc_html__( 'Pick fiat currency for price conversion. Only enter the code for the fiat currency, e.g. EUR, USD, GBP, KRW', 'definity' ),
	            ),
	            array(
	                'type'          => 'checkbox',
	                'param_name'    => 'show_marketcap',
	                'value'         => array(
	                    esc_html__( 'Show the marketcap of the cryptocurrency', 'definity' ) => true
	                ),
	                'std'			=> true,
	            ),
	            array(
	                'type'          => 'checkbox',
	                'param_name'    => 'show_price_change',
	                'value'         => array(
	                    esc_html__( 'Show the price change in the last 24h', 'definity' ) => true
	                ),
	                'std'			=> true,
	            ),
	            array(
	                'type'          => 'checkbox',
	                'param_name'    => 'show_alt_fiat',
	                'value'         => array(
	                    esc_html__( 'Show additional fiat conversions', 'definity' ) => true
	                ),
	                'std'			=> true,
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'fiat_alt_1',
	                'heading'       => esc_html__( 'Alternative Fiat Conversion - 1', 'definity' ),
	                'value'         => esc_html__( 'EUR', 'definity' ),
	                'description'   => esc_html__( 'Display additional fiat conversion. Enter the code for the fiat only (can use only fiat that is selected in the plugin - check help file).', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_alt_fiat',
	                    'value'     => array( '1' )
	                ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'fiat_alt_2',
	                'heading'       => esc_html__( 'Alternative Fiat Conversion - 2', 'definity' ),
	                'value'         => esc_html__( 'GBP', 'definity' ),
	                'description'   => esc_html__( 'Display additional fiat conversion. Enter the code for the fiat only (can use only fiat that is selected in the plugin - check help file).', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_alt_fiat',
	                    'value'     => array( '1' )
	                ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'fiat_alt_3',
	                'heading'       => esc_html__( 'Alternative Fiat Conversion - 3', 'definity' ),
	                'value'         => esc_html__( 'JPY', 'definity' ),
	                'description'   => esc_html__( 'Display additional fiat conversion. Enter the code for the fiat only (can use only fiat that is selected in the plugin - check help file).', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_alt_fiat',
	                    'value'     => array( '1' )
	                ),
	            ),
	        	array(
                    'type'          => 'attach_image',
                    'param_name'    => 'image',
                    'heading'       => esc_html__( 'Image', 'definity' ),
                    'description'   => esc_html__( 'Add image (transparent .png) instead of icon.', 'definity' ),
                ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'css_class',
	                'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
	                'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'definity' ),
	            ),
	            // Style
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'bg_color',
	                'heading'       => esc_html__( 'Card Background Color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'shadow_color',
	                'heading'       => esc_html__( 'Card Shadow Color', 'definity' ),
	                'description'   => esc_html__( 'Tip: Use transparency.', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'icon_color',
	                'heading'       => esc_html__( 'Icon Color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'icon_hover_color',
	                'heading'       => esc_html__( 'Icon Color - Hover', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'icon_border_color',
	                'heading'       => esc_html__( 'Border Color (icon)', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'border_details_color',
	                'heading'       => esc_html__( 'Border (Details) Color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'icon_hover_bg_color',
	                'heading'       => esc_html__( 'Icon Background Color - Hover', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'icon_anim_border_color',
	                'heading'       => esc_html__( 'Icon Animation Wave Color - Hover', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'title_color',
	                'heading'       => esc_html__( 'Title Color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'price_color',
	                'heading'       => esc_html__( 'Price Color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'marketcap_color',
	                'heading'       => esc_html__( 'Marketcap Color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'alt_title_color',
	                'heading'       => esc_html__( 'Alt. Fiat Title Color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'alt_fiat_color',
	                'heading'       => esc_html__( 'Alt. Fiat Currency Color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	        )
	    ));
		} // endif is_plugin_active


        /* ---- Feature Step Numbers (vc map) ---- */
        vc_map( array(
        	'base' 			=> 'd_ft_numbers',
            'name' 			=> esc_html__('Feature Steps', 'definity'),
            'description' 	=> esc_html__('Steps element, with number, title and short description', 'definity'), 
            'category' 		=> esc_html__('Definity Elements', 'definity'),
            'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/feature_steps.png',            
            'params' 		=> array(
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'number',
                    'holder'        => 'h3',
                    'heading'       => esc_html__( 'Step Number', 'definity' ),
                    'value'         => esc_html__( '01', 'definity' ),
                    'description'   => esc_html__( 'Number for the step', 'definity' ),
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'title',
                    'holder'        => 'p',
                    'heading'       => esc_html__( 'Title', 'definity' ),
                    'value'         => esc_html__( 'Enter heading here', 'definity' ),
                    'description'   => esc_html__( 'Title for the feature element', 'definity' ),
                ),  
                array(
                    'type'          => 'textarea',
                    'param_name'    => 'text',
                    'holder'        => 'div',
                    'heading'       => esc_html__( 'Short Description', 'definity' ),
                    'value'         => esc_html__( 'Enter short description here', 'definity' ),
                    'description'   => esc_html__( 'Description for the feature element', 'definity' ),
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'top_offset',
                    'heading'       => esc_html__( 'Step Number Vertical Offset', 'definity' ),
                    'description'   => esc_html__( 'Offset the position of the step number vertically, enter negative number for UP e.g: -15, and positive number for DOWN e.g: 15 (numbers only)', 'definity' ),
                    'group'			=> 'Options'
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'left_offset',
                    'heading'       => esc_html__( 'Step Number Horizontal Offset', 'definity' ),
                    'description'   => esc_html__( 'Offset the position of the step number horizontally, enter negative number for LEFT e.g: -5, and positive number for RIGHT e.g: 5 (numbers only)', 'definity' ),
                    'group'			=> 'Options'
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'css_class',
                    'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
                    'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'definity' ),
                    'group'			=> 'Options'
                ),
            )
        ));


        /* ---- Number Counters (vc map) ---- */
        vc_map( array(
        	'base' 			=> 'd_number_counter',
            'name' 			=> esc_html__('Number Counter', 'definity'),
            'description' 	=> esc_html__('Number counter that counts from 0 to desired number', 'definity'), 
            'category' 		=> esc_html__('Definity Elements', 'definity'),
            'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/number_counters.png',            
            'params' 		=> array(
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'title',
                    'holder'        => 'p',
                    'heading'       => esc_html__( 'Title', 'definity' ),
                    'value'         => esc_html__( 'Enter title here', 'definity' ),
                    'description'   => esc_html__( 'Enter title for this element, that will show up bellow the number counter', 'definity' ),
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'number',
                    'value'         => '475',
                    'heading'       => esc_html__( 'Number', 'definity' ),
                    'description'   => esc_html__( 'Enter number that will be counted towards (number only) ', 'definity' ),
                ),
                array(
                    'type'          => 'colorpicker',
                    'param_name'    => 'number_color',
                    'heading'       => esc_html__( 'Number Color', 'definity' ),
                    'description'   => esc_html__( 'Select number color', 'definity' ),
                    'group'			=> 'Options'
                ),
                array(
                    'type'          => 'colorpicker',
                    'param_name'    => 'title_color',
                    'heading'       => esc_html__( 'Title Color', 'definity' ),
                    'description'   => esc_html__( 'Select title color', 'definity' ),
                    'group'			=> 'Options'
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'css_class',
                    'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
                    'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'definity' ),
                    'group'			=> 'Options'
                ),
            )
        ));


        /* ---- Progress Circle (vc map) ---- */
        vc_map( array(
        	'base' 			=> 'd_progress_circle',
            'name' 			=> esc_html__('Progress Circle', 'definity'),
            'description' 	=> esc_html__('Progress circle with icon', 'definity'), 
            'category' 		=> esc_html__('Definity Elements', 'definity'),
            'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/progress_circle.png',
            'params' 		=> array(
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'title',
                    'holder'        => 'p',
                    'heading'       => esc_html__( 'Element Title', 'definity' ),
                    'value'         => esc_html__( 'Enter title here', 'definity' ),
                    'description'   => esc_html__( 'Enter title for this element, that will show up bellow the progress circle', 'definity' ),
                ),  
                array( 
                    'type'          => 'textfield',
                    'param_name'    => 'progress',
                    'value'         => '75',
                    'heading'       => esc_html__( 'Progress', 'definity' ),
                    'description'   => esc_html__( '(numbers only) Enter number from 0 to 100 that represent the circle progress bar', 'definity' )
                ),
                array(
                    'type'          => 'iconpicker',
                    'param_name'    => 'icon',
                    'heading'       => esc_html__( 'Select Icon', 'definity' ),
                    'description'   => esc_html__( 'Select icon from library.', 'definity' ),
                    'value'         => '',  
                    'settings'      => array(
                        'type'          => 'lineicons',
                        'emptyIcon'     => false,
                        'iconsPerPage'  => 150
                    ),
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'line_width',
                    'value'         => '2',
                    'heading'       => esc_html__( 'Progress Line Tickness', 'definity' ),
                    'description'   => esc_html__( '(numbers only) Enter number to change the progress line thickness ', 'definity' ),
                    'group'			=> 'Options'
                ),
                array(
                    'type'          => 'colorpicker',
                    'param_name'    => 'line_color',
                    'heading'       => esc_html__( 'Progress Line Color', 'definity' ),
                    'description'   => esc_html__( '(optional) Select progress line color', 'definity' ),
                    'group'			=> 'Options'
                ),
                array(
                    'type'          => 'colorpicker',
                    'param_name'    => 'icon_color',
                    'heading'       => esc_html__( 'Icon Color', 'definity' ),
                    'description'   => esc_html__( '(optional) Select icon color', 'definity' ),
                    'group'			=> 'Options'
                ),
                array(
                    'type'          => 'colorpicker',
                    'param_name'    => 'title_color',
                    'heading'       => esc_html__( 'Title Color', 'definity' ),
                    'description'   => esc_html__( '(optional) Select title color', 'definity' ),
                    'group'			=> 'Options'
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'css_class',
                    'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
                    'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS (optional)', 'definity' ),
                    'group'			=> 'Options'
                ),
            )
        ));


    	/* ---- Pricing Table (vc map) ---- */
    	vc_map( array(
    		'base' 			=> 'd_pricing_table',
	        'name' 			=> esc_html__('Pricing Table', 'definity'),
	        'description' 	=> esc_html__('Pricing table with title, features and link', 'definity'), 
	        'category' 		=> esc_html__('Definity Elements', 'definity'),
	        'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/pricing_table.png',
	        'params' 		=> array(
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'title',
	                'holder'        => 'h4',
	                'class'			=> 'text-center',
	                'heading'       => esc_html__( 'Title', 'definity' ),
	                'value'         => esc_html__( 'Enter title here', 'definity' ),
	                'description'   => esc_html__( 'Title for the pricing table', 'definity' ),
	            ),  
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'price',
	                'holder'        => 'h3',
	                'class'			=> 'text-center',
	                'heading'       => esc_html__( 'Price', 'definity' ),
	                'description'   => esc_html__( 'The price', 'definity' ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'currency',
	                'heading'       => esc_html__( 'Currency', 'definity' ),
	                'description'   => esc_html__( 'The currency, e.g: $,£,€ ', 'definity' ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'interval',
	                'heading'       => esc_html__( 'Interval', 'definity' ),
	                'description'   => esc_html__( 'Monthly or yearly, e.g: /mo for month ', 'definity' ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'subtitle',
	                'heading'       => esc_html__( 'Subtitle', 'definity' ),
	                'value'         => esc_html__( 'E.g: get the job done', 'definity' ),
	                'description'   => esc_html__( 'Enter subtitle bellow the price', 'definity' ),
	            ), 
	            array(
	                'type'          => 'textarea_html',
	                'param_name'    => 'content',
	                'heading'       => esc_html__( 'Feature List', 'definity' ),
	                'value'         => esc_html__( 'Delete this text and create bulleted list of features here', 'definity' ),
	                'description'   => esc_html__( 'Feature List that describes what the buyer gets with this price option', 'definity' ),
	            ),
	            array(
	                'type'          => 'checkbox',
	                'param_name'    => 'featured',
	                'heading'       => esc_html__( 'Featured Option', 'definity' ),
	                'value'         => array(
	                    esc_html__( 'Make this pricing option featured', 'definity' )    => 'pt-featured'
	                )
	            ),
	            array(
	                'type'          => 'vc_link',
	                'param_name'    => 'link',
	                'heading'       => esc_html__( 'CTA Button', 'definity' ),
	                'description'   => esc_html__( 'Call to action link', 'definity' )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'css_class',
	                'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
	                'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'definity' ),
	            ),
	            // Style
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'bg_color',
	                'heading'       => esc_html__( 'Background Color', 'definity' ),
	                'description'   => esc_html__( 'Change the background color of the pricing card.', 'definity' ),
	                'group'			=> 'Style'
	            ),
	           	array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'title_color',
	                'heading'       => esc_html__( 'Title Color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'subtitle_color',
	                'heading'       => esc_html__( 'Subtitle Color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'sep_color',
	                'heading'       => esc_html__( 'Separators Color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'price_color',
	                'heading'       => esc_html__( 'Price Color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'price_info_color',
	                'heading'       => esc_html__( 'Price Info Color', 'definity' ),
	                'description'   => esc_html__( 'Change the color of the currency sign, and the interval.', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'ft_banner_color',
	                'heading'       => esc_html__( 'Featured Banner Background', 'definity' ),
	                'group'			=> 'Style',
	                'dependency'    => array(
	                    'element'   => 'featured',
	                    'value'     => array( 'pt-featured' )
	                )
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'ft_banner_content_color',
	                'heading'       => esc_html__( 'Featured Banner Star Color', 'definity' ),
	                'group'			=> 'Style',
	                'dependency'    => array(
	                    'element'   => 'featured',
	                    'value'     => array( 'pt-featured' )
	                )
	            ),
	            // array(
	            //     'type'          => 'colorpicker',
	            //     'param_name'    => 'accent_color',
	            //     'heading'       => esc_html__( 'Accent Color', 'definity' ),
	            //     'description'   => esc_html__( 'Change the accent color of the pricing table - title, price and featured banner', 'definity' ),
	            //     'group'			=> 'Style'
	            // ),
	            // Button Styles
	            array(
	                'type'          => 'dropdown',
	                'param_name'    => 'btn_style',
	                'heading'       => esc_html__( 'Button style', 'definity' ),
	                'value'         => array(
	                    'Normal Button'    		=> 'btn',
	                    'Ghost Button'   		=> 'btn-ghost',
	                    'Rounded Ghost Button'	=> 'btn-ghost btn-round',
	                    'Text Button'    		=> 'btn-text',
	                ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'dropdown',
	                'param_name'    => 'btn_size',
	                'heading'       => esc_html__( 'Button size', 'definity' ),
	                'value'         => array(
	                    'Normal'        => '',
	                    'Large'         => 'btn-large',
	                    'Small'         => 'btn-small',
	                ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'pt_btn_text_color',
	                'heading'       => esc_html__( 'Button Text Color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'pt_btn_text_hover_color',
	                'heading'       => esc_html__( 'Button Text Hover Color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'pt_btn_bg',
	                'heading'       => esc_html__( 'Button Background Color', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'btn_style',
	                    'value'     => array( 'btn' )
	                ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'pt_btn_bg_hover',
	                'heading'       => esc_html__( 'Button Background Hover Color', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'btn_style',
	                    'value'     => array( 'btn' )
	                ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'pt_btn_border_color',
	                'heading'       => esc_html__( 'Button Border Color', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'btn_style',
	                    'value'     => array( 'btn-ghost', 'btn-ghost btn-round' )
	                ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'pt_btn_border_bg_hover',
	                'heading'       => esc_html__( 'Button Border Hover Color', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'btn_style',
	                    'value'     => array( 'btn-ghost', 'btn-ghost btn-round' )
	                ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'pt_btn_text_border_color',
	                'heading'       => esc_html__( 'Button Text Border Color', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'btn_style',
	                    'value'     => array( 'btn-text' )
	                ),
	                'group'			=> 'Style'
	            ),
	        )
    	));


		/* ---- Team Member (vc map) ---- */
		vc_map( array(
        	'base' 			=> 'd_team_member',
            'name' 			=> esc_html__('Team Member', 'definity'),
            'description' 	=> esc_html__('Add team member with image, description and links', 'definity'), 
            'category' 		=> esc_html__('Definity Elements', 'definity'),
            'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/team_member.png',
            'params' 		=> array(
            	array(
    			    'type'          => 'dropdown',
    			    'param_name'    => 'layout',
    			    'heading'       => esc_html__( 'Select Layout', 'definity' ),
    			    'description'   => esc_html__( 'Select form 3 different team layouts.', 'definity' ),
    			    'value'         => array(
    			        'Image + Description'  	=> 'tm_1',
    			        'Image' 				=> 'tm_2',
    			        'Flip Card'  			=> 'tm_4',
    			        'CTA Join'				=> 'tm_3',
    			    ),
    			    'std'           => 'tm_1'
    			),
    			// Flip Card layout
            	array(
    			    'type'          => 'dropdown',
    			    'param_name'    => 'fc_layout_type',
    			    'heading'       => esc_html__( 'Flip Card Layout', 'definity' ),
    			    'description'   => esc_html__( 'Chose compact layout for 4+ columns', 'definity' ),
    			    'value'         => array(
    			        'Normal'  	=> '',
    			        'Compact' 	=> 'tfc-compact ',
    			    ),
    			    'std'           => 'tm_1',
	                'dependency'    => array(
                        'element'   => 'layout',
                        'value'     => array( 'tm_4' )
                    ),
    			),
    			array(
                    'type'          => 'attach_image',
                    'param_name'    => 'image',
                    'value'         => '',
                    'heading'       => esc_html__( 'Image of the team member', 'definity' ),
                    'description'   => esc_html__( 'Select image from the media library. (optimal size: 360 x 440 px)', 'definity' ),
                    'dependency'    => array(
                        'element'   => 'layout',
                        'value'     => array( 'tm_1', 'tm_2', 'tm_4' )
                    ),
                ),
                array(
                    'type'          => 'textarea_html',
                    'param_name'    => 'content',
                    'heading'       => esc_html__( 'Description', 'definity' ),
                    'value'         => esc_html__( 'Enter short description about the team member', 'definity' ),
                    'description'   => esc_html__( 'Few words from the team member', 'definity' ),
                    'dependency'    => array(
                        'element'   => 'layout',
                        'value'     => array( 'tm_1', 'tm_3', 'tm_4' )
                    ),
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'name',
                    'holder'        => 'p',
                    'heading'       => esc_html__( 'Name', 'definity' ),
                    'value'         => esc_html__( 'Enter heading here', 'definity' ),
                    'description'   => esc_html__( 'Title for the feature card', 'definity' ),
                    'dependency'    => array(
                        'element'   => 'layout',
                        'value'     => array( 'tm_1', 'tm_2', 'tm_4' )
                    ),
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'cta_title',
                    'heading'       => esc_html__( 'CTA Title', 'definity' ),
                    'value'         => esc_html__( 'Enter title here', 'definity' ),
                    'dependency'    => array(
                        'element'   => 'layout',
                        'value'     => array( 'tm_3' )
                    ),
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'position',
                    'holder'        => 'p',
                    'heading'       => esc_html__( 'Position', 'definity' ),
                    'value'         => esc_html__( 'Web Developer', 'definity' ),
                    'description'   => esc_html__( 'Position in your team', 'definity' ),
                ),
                array(
	                'type'          => 'vc_link',
	                'param_name'    => 'name_link',
	                'heading'       => esc_html__( 'Link', 'definity' ),
	                'description'   => esc_html__( 'Add link to the name.', 'definity' ),
	                'dependency'    => array(
                        'element'   => 'layout',
                        'value'     => array( 'tm_4' )
                    ),
	            ),
                // Social Links show/hide
                array(
                    'type'          => 'checkbox',
                    'param_name'    => 'no_social',
                    'value'         => array(
                        esc_html__( 'Disable social links reveal animation', 'definity' )    => 'no_social_links'
                    ),
                    'dependency'    => array(
                        'element'   => 'layout',
                        'value'     => array( 'tm_2' )
                    ),
                ),
                // CTA Join
                array(
	                'type'          => 'vc_link',
	                'param_name'    => 'link',
	                'heading'       => esc_html__( 'Link', 'definity' ),
	                'description'   => esc_html__( 'Add link to your contact page', 'definity' ),
	                'dependency'    => array(
                        'element'   => 'layout',
                        'value'     => array( 'tm_3' )
                    ),
	            ),
	            array(
	                'type'          => 'iconpicker',
	                'param_name'    => 'bg_icon',
	                'heading'       => esc_html__( 'Background Icon', 'definity' ),
	                'description'   => esc_html__( 'Change the background icon', 'definity' ),
	                'value'         => 'fa fa-user',
	                'settings'      => array(
	                    'type'          => 'lineicons', // Custom iconsets
	                    'emptyIcon'     => false, // Default true, display an "EMPTY" icon?
	                    'iconsPerPage'  => 150 // Icons shown at once in VC picker
	                ),
	                'group'			=> 'Options',
	                'dependency'    => array(
                        'element'   => 'layout',
                        'value'     => array( 'tm_3' )
                    ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'height',
	                'value'         => '320px',
	                'heading'       => esc_html__( 'Height', 'definity' ),
	                'description'   => esc_html__( 'Adjust the height of the CTA to match the images of ,your team members', 'definity' ),
	                'group'			=> 'Options',
	                'dependency'    => array(
                        'element'   => 'layout',
                        'value'     => array( 'tm_3' )
                    ),
	            ),

                array(
                    'type'          => 'checkbox',
                    'param_name'    => 'social_links',
                    'value'         => array(
                        esc_html__( 'Show social links for the team member', 'definity' )    => '1'
                    ),
                    'dependency'    => array(
                        'element'   => 'layout',
                        'value'     => array( 'tm_1', 'tm_2' )
                    ),
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'sp_facebook',
                    'heading'       => 'Facebook',
                    'description'   => esc_html__( 'Enter your Facebook profile URL.', 'definity' ),
                    'dependency'    => array(
                        'element'   => 'social_links',
                        'value'     => array( '1' )
                    ),
                    'group'			=> 'Social Media Links'
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'sp_twitter',
                    'heading'       => 'Twitter',
                    'description'   => esc_html__( 'Enter your Twitter profile URL.', 'definity' ),
                    'dependency'    => array(
                        'element'   => 'social_links',
                        'value'     => array( '1' )
                    ),
                    'group'			=> 'Social Media Links'
                ),
                array(
                    'type'          => 'textfield',
                    'heading'       => 'Instagram',
                    'param_name'    => 'sp_instagram',
                    'description'   => esc_html__( 'Enter your Instagram profile URL.', 'definity' ),
                    'dependency'    => array(
                        'element'   => 'social_links',
                        'value'     => array( '1' )
                    ),
                    'group'			=> 'Social Media Links'
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'sp_linkedin',
                    'heading'       => 'LinedIn',
                    'description'   => esc_html__( 'Enter your LinedIn profile URL.', 'definity' ),
                    'dependency'    => array(
                        'element'   => 'social_links',
                        'value'     => array( '1' )
                    ),
                    'group'			=> 'Social Media Links'
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'sp_dribbble',
                    'heading'       => 'Dribbble',
                    'description'   => esc_html__( 'Enter your Google+ profile URL.', 'definity' ),
                    'dependency'    => array(
                        'element'   => 'social_links',
                        'value'     => array( '1' )
                    ),
                    'group'			=> 'Social Media Links'
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'sp_behance',
                    'heading'       => 'Behance',
                    'description'   => esc_html__( 'Enter your Behance profile URL.', 'definity' ),
                    'dependency'    => array(
                        'element'   => 'social_links',
                        'value'     => array( '1' )
                    ),
                    'group'			=> 'Social Media Links'
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'sp_youtube',
                    'heading'       => 'YouTube',
                    'description'   => esc_html__( 'Enter your YouTube profile URL.', 'definity' ),
                    'dependency'    => array(
                        'element'   => 'social_links',
                        'value'     => array( '1' )
                    ),
                    'group'			=> 'Social Media Links'
                ),
                array(
                    'type'          => 'textfield',
                    'heading'       => 'Google+',
                    'param_name'    => 'sp_googleplus',
                    'description'   => esc_html__( 'Enter your Google+ profile URL.', 'definity' ),
                    'dependency'    => array(
                        'element'   => 'social_links',
                        'value'     => array( '1' )
                    ),
                    'group'			=> 'Social Media Links'
                ),
                array(
                    'type'          => 'textfield',
                    'heading'       => 'RSS',
                    'param_name'    => 'sp_rss',
                    'description'   => esc_html__( 'Enter your RSS URL.', 'definity' ),
                    'dependency'    => array(
                        'element'   => 'social_links',
                        'value'     => array( '1' )
                    ),
                    'group'			=> 'Social Media Links'
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'css_class',
                    'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
                    'description'   => esc_html__( '(optional) Style particular content element differently - add a class name and refer to it in custom CSS', 'definity' ),
                ),
                // Style
                array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'bg_color',
	                'heading'       => esc_html__( 'Background Color', 'definity' ),
	                'group'			=> 'Style',
	                'dependency'    => array(
                        'element'   => 'layout',
                        'value'     => array( 'tm_3' )
                    ),
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'card_bg_color',
	                'heading'       => esc_html__( 'Card Background Color', 'definity' ),
	                'group'			=> 'Style',
	                'dependency'    => array(
                        'element'   => 'layout',
                        'value'     => array( 'tm_2' )
                    ),
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'icon_color',
	                'heading'       => esc_html__( 'Icon Color', 'definity' ),
	                'description'   => esc_html__( 'Select icon color', 'definity' ),
	                'group'			=> 'Style',
	                'dependency'    => array(
                        'element'   => 'layout',
                        'value'     => array( 'tm_3' )
                    ),
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'title_color',
	                'heading'       => esc_html__( 'Title Color', 'definity' ),
	                'group'			=> 'Style',
	                'dependency'    => array(
                        'element'   => 'layout',
                        'value'     => array( 'tm_2' )
                    ),
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'subtitle_color',
	                'heading'       => esc_html__( 'Sub-Title Color', 'definity' ),
	                'group'			=> 'Style',
	                'dependency'    => array(
                        'element'   => 'layout',
                        'value'     => array( 'tm_2' )
                    ),
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 's_icons_color',
	                'heading'       => esc_html__( 'Social Icons Color', 'definity' ),
	                'group'			=> 'Style',
	                'dependency'    => array(
                        'element'   => 'layout',
                        'value'     => array( 'tm_2' )
                    ),
	            ),
            )
        ));


		/* ---- Testimonial Card (vc map) ---- */
		vc_map( array(
			'base' 			=> 'd_testimonial_cards',
	        'name' 			=> esc_html__('Testimonial Cards', 'definity'),
	        'description' 	=> esc_html__('Card like element for testimonials', 'definity'), 
	        'category' 		=> esc_html__('Definity Elements', 'definity'),
	        'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/testimonials.png',
	        'params' 		=> array(
	            array(
	                'type'          => 'attach_image',
	                'param_name'    => 'image',
	                'heading'       => esc_html__( 'Image', 'definity' ),
	                'description'   => esc_html__( 'Add image of the author. (optimal size: 75 x 75 px, circle, transparent png)', 'definity' ),
	            ),
	            array(
	                'type'          => 'textarea',
	                'param_name'    => 'testimonial',
	                'holder'        => 'p',
	                'class'			=> 'text-center',
	                'heading'       => esc_html__( 'Testimonial', 'definity' ),
	                'value'         => esc_html__( 'Short testimonial here...', 'definity' ),
	                'description'   => esc_html__( 'Enter testimonial', 'definity' ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'author',
	                'holder'        => 'p',
	                'class'			=> 'text-center',
	                'heading'       => esc_html__( 'Author', 'definity' ),
	                'value'         => esc_html__( 'By Author Name', 'definity' ),
	                'description'   => esc_html__( 'Enter the author name', 'definity' ),
	            ),  
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'company',
	                'holder'        => 'p',
	                'class'			=> 'text-center',
	                'heading'       => esc_html__( 'Company', 'definity' ),
	                'value'         => esc_html__( 'author`s company', 'definity' ),
	                'description'   => esc_html__( 'Enter the author`s company', 'definity' ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'css_class',
	                'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
	                'description'   => esc_html__( '(optional) Style particular content element differently - add a class name and refer to it in custom CSS', 'definity' ),
	            ),
	            // Style
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'border_color',
	                'heading'       => esc_html__( 'Separators Color', 'definity' ),
	                'description'   => esc_html__( 'Change the separators/borders color.', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'txt_color',
	                'heading'       => esc_html__( 'Text Color', 'definity' ),
	                'description'   => esc_html__( 'Change the text/testimonial color.', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'author_color',
	                'heading'       => esc_html__( 'Author Color', 'definity' ),
	                'description'   => esc_html__( 'Change the author color.', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'company_color',
	                'heading'       => esc_html__( 'Company Color', 'definity' ),
	                'description'   => esc_html__( 'Change the company color.', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'icon_color',
	                'heading'       => esc_html__( 'Icon Color', 'definity' ),
	                'description'   => esc_html__( 'Change the icon (quote) color.', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'img_border_color',
	                'heading'       => esc_html__( 'Image Border Color', 'definity' ),
	                'description'   => esc_html__( 'Change the color of the border around the image.', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'bg_color',
	                'heading'       => esc_html__( 'Card Background Color', 'definity' ),
	                'description'   => esc_html__( 'Change the testimonial card background color.', 'definity' ),
	                'group'			=> 'Style'
	            ),
	        )
	    ));

		
		/* ---- Testimonials Slider (vc map)  ---- */		
		vc_map( array(
			'name'                    => 'Testimonials Slider',
    		'base'                    => 'd_testimonials_slider',
    		'as_parent'               => array('only' => 'd_testimonial_slide'),
    		'content_element'         => true,
    		'show_settings_on_create' => true,
    		'js_view'                 => 'VcColumnView',
    		'category'                => esc_html__('Definity Elements','definity'),
    		'is_container'            => true,
    		'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/testimonials_slider.png',
    		'description'             => esc_html__('Testimonials carousel','definity'),
    		'params'				  => array(
    			array(
    			    'type'          => 'dropdown',
    			    'param_name'    => 'arrows',
    			    'heading'       => esc_html__( 'Arrows', 'definity' ),
    			    'description'   => esc_html__( 'Display "prev" and "next" arrows.', 'definity' ),
    			    'value'         => array(
    			        'Display Arrows'  => 'true',
    			        'Hide Arrows'  	  => 'false'
    			    ),
    			    'std'           => 'true'
    			),
    			array(
    			    'type'          => 'checkbox',
    			    'param_name'    => 'arrows_hover',
    			    'heading'       => esc_html__( 'Show the arrows on hover', 'definity' ),
    			    'description'   => esc_html__( 'Only show the arrows when you hover over the slider', 'definity' ),
    			    'value'         => array(
    			        esc_html__( 'Enable', 'definity' )    => '1'
    			    ),
    			    'dependency'    => array(
    			        'element'   => 'arrows',
    			        'value'     => array( 'Enable', 'true' )
    			    )
    			),
    			array(
    			    'type'          => 'checkbox',
    			    'param_name'    => 'autoplay',
    			    'heading'       => esc_html__( 'Autoplay', 'definity' ),
    			    'description'   => esc_html__( 'Slider change slides automatically.', 'definity' ),
    			    'value'         => array(
    			        esc_html__( 'Enable', 'definity' )    => 'true'
    			    )
    			),
    			array(
    			    'type'          => 'textfield',
    			    'param_name'    => 'autoplay_speed',
    			    'heading'       => esc_html__( 'Autoplay Speed', 'definity' ),
    			    'description'   => esc_html__( 'Enter autoplay interval in milliseconds (1 second = 1000 milliseconds).', 'definity' ),
    			    'dependency'    => array(
    			        'element'   => 'autoplay',
    			        'value'     => array( 'Enable', 'true' )
    			    )
    			),
    			array(
    			    'type'          => 'textfield',
    			    'param_name'    => 'speed',
    			    'heading'       => esc_html__( 'Animation Speed', 'definity' ),
    			    'description'   => esc_html__( 'Enter animation speed in milliseconds (1 second = 1000 milliseconds).', 'definity' )
    			),
    			array(
    			    'type'          => 'dropdown',
    			    'param_name'    => 'animation',
    			    'heading'       => esc_html__( 'Animation Type', 'definity' ),
    			    'description'   => esc_html__( 'Select animation type.', 'definity' ),
    			    'value'         => array(
    			        'Fade'  => 'true',
    			        'Slide' => 'false'
    			    ),
    			    'std'           => 'false'
    			),
    			array(
    			    'type'          => 'checkbox',
    			    'param_name'    => 'adaptive_height',
    			    'heading'       => esc_html__( 'Adaptive Height', 'definity' ),
    			    'description'   => esc_html__( 'Change the height of the slide depending on the content height.', 'definity' ),
    			    'value'         => array(
    			        esc_html__( 'Enable', 'definity' )    => 'true'
    			    )
    			),
    			array(
    			    'type'          => 'textfield',
    			    'param_name'    => 'css_class',
    			    'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
    			    'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'definity' ),
    			),
    			// Style
    			array(
    			    'type'          => 'colorpicker',
    			    'param_name'    => 't_bg',
    			    'heading'       => esc_html__( 'Background Color', 'definity' ),
    			    'group'			=> 'Style'
    			),
    			array(
    			    'type'          => 'colorpicker',
    			    'param_name'    => 'nav_border_color',
    			    'heading'       => esc_html__( 'Arrows Border Color', 'definity' ),
    			    'group'			=> 'Style'
    			),
    			array(
    			    'type'          => 'colorpicker',
    			    'param_name'    => 'nav_hover_border_color',
    			    'heading'       => esc_html__( 'Arrows Border Color - Hover', 'definity' ),
    			    'group'			=> 'Style'
    			),
    			array(
    			    'type'          => 'colorpicker',
    			    'param_name'    => 'nav_hover_bg_color',
    			    'heading'       => esc_html__( 'Arrows Background Color - Hover', 'definity' ),
    			    'group'			=> 'Style'
    			),
    			array(
    			    'type'          => 'colorpicker',
    			    'param_name'    => 'arrow_color',
    			    'heading'       => esc_html__( 'Arrows Icon Color', 'definity' ),
    			    'group'			=> 'Style'
    			),
    			array(
    			    'type'          => 'colorpicker',
    			    'param_name'    => 'arrow_hover_color',
    			    'heading'       => esc_html__( 'Arrows Icon Color - Hover', 'definity' ),
    			    'group'			=> 'Style'
    			),
    		)
		));


		/* ---- Testimonial Slide (vc map) ---- */
		vc_map( array(
			'name'                    => 'Testimonial Slide',
			'base'                    => 'd_testimonial_slide',
			'as_child'                => array( 'only' => 'd_testimonials_slider' ),
			'content_element'         => true,
			'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/testimonial_slide.png',
    		'params'				  => array(
    			array(
    			    'type'          => 'textarea_html',
    			    'param_name'    => 'content',
    			    'holder'		=> 'p',
    			    'class'			=> 'text-center',
    			    'heading'       => esc_html__( 'Testimonial', 'definity' ),
    			    'value'         => esc_html__( 'Enter the testimonial here', 'definity' ),
    			    'description'   => esc_html__( 'Enter testimonial', 'definity' ),
    			),
    			array(
    			    'type'          => 'textfield',
    			    'param_name'    => 'author',
    			    'holder'		=> 'p',
    			    'class'			=> 'text-center',
    			    'heading'       => esc_html__( 'Author', 'definity' ),
    			    'description'   => esc_html__( 'Enter the author name', 'definity' ),
    			),
    			array(
    			    'type'          => 'textfield',
    			    'param_name'    => 'company',
    			    'holder'		=> 'p',
    			    'class'			=> 'text-center',
    			    'heading'       => esc_html__( 'Company', 'definity' ),
    			    'description'   => esc_html__( 'Enter the author company and role', 'definity' ),
    			),
    			// Style
    			array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'name_color',
	                'heading'       => esc_html__( 'Name Color', 'definity' ),
	                'description'   => esc_html__( 'Change the color of the name.', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'company_color',
	                'heading'       => esc_html__( 'Company Color', 'definity' ),
	                'description'   => esc_html__( 'Change the color of the company.', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'icon_color',
	                'heading'       => esc_html__( 'Icon Color', 'definity' ),
	                'description'   => esc_html__( 'Change the color of the icon.', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'checkbox',
	                'param_name'    => 'icon_off',
	                'heading'       => esc_html__( 'Quote Icon', 'definity' ),
	                'description'   => esc_html__( 'Hide the quote icon.', 'definity' ),
	                'value'         => array(
	                    esc_html__( 'Hide', 'definity' )    => '1'
	                ),
	            ),
	            array(
    			    'type'          => 'textfield',
    			    'param_name'    => 'css_class',
    			    'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
    			    'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'definity' ),
    			)
    		)
		));


		/* ---- Logos Slider (vc map) ---- */
		vc_map( array(
			'name'                    => 'Logos Slider',
    		'base'                    => 'd_logos_slider',
    		'as_parent'               => array('only' => 'd_logo_slide'),
    		'content_element'         => true,
    		'show_settings_on_create' => true,
    		'js_view'                 => 'VcColumnView',
    		'category'                => esc_html__('Definity Elements','definity'),
    		'is_container'            => true,
    		'icon' 					  => get_template_directory_uri() . '/assets/images/visual-composer/logos_slider.png',
    		'description'             => 'Add logos carousel with this element',
    		'params'				  => array(
    			array(
    			    'type'          => 'checkbox',
    			    'param_name'    => 'autoplay',
    			    'heading'       => esc_html__( 'Autoplay', 'definity' ),
    			    'description'   => esc_html__( 'Slider change slides automatically.', 'definity' ),
    			    'value'         => array(
    			        esc_html__( 'Enable', 'definity' )    => 'true'
    			    )
    			),
    			array(
    			    'type'          => 'textfield',
    			    'param_name'    => 'autoplay_speed',
    			    'heading'       => esc_html__( 'Autoplay Speed', 'definity' ),
    			    'description'   => esc_html__( 'Enter autoplay interval in milliseconds (1 second = 1000 milliseconds).', 'definity' ),
    			    'dependency'    => array(
    			        'element'   => 'autoplay',
    			        'value'     => array( 'Enable', 'true' )
    			    )
    			),
    			array(
    			    'type'          => 'textfield',
    			    'param_name'    => 'speed',
    			    'heading'       => esc_html__( 'Animation Speed', 'definity' ),
    			    'description'   => esc_html__( 'Enter animation speed in milliseconds (1 second = 1000 milliseconds).', 'definity' )
    			),
    			array(
    			    'type'          => 'textfield',
    			    'param_name'    => 'slides_to_show',
    			    'heading'       => esc_html__( 'Slides to show', 'definity' ),
    			    'description'   => esc_html__( 'Enter number of slides to show at once (default set on 5).', 'definity' )
    			),
    			array(
    			    'type'          => 'textfield',
    			    'param_name'    => 'slides_to_scroll',
    			    'heading'       => esc_html__( 'Slides to scroll', 'definity' ),
    			    'description'   => esc_html__( 'Number of slides that will scroll at once on the next slide (default set on 1).', 'definity' )
    			),
    			array(
    			    'type'          => 'checkbox',
    			    'param_name'    => 'adaptive_height',
    			    'heading'       => esc_html__( 'Adaptive Height', 'definity' ),
    			    'description'   => esc_html__( 'Change the height of the slide depending on the content height.', 'definity' ),
    			    'value'         => array(
    			        esc_html__( 'Enable', 'definity' )    => 'true'
    			    )
    			),
    			array(
    			    'type'          => 'textfield',
    			    'param_name'    => 'css_class',
    			    'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
    			    'description'   => esc_html__( '(optional) Style particular content element differently - add a class name and refer to it in custom CSS', 'definity' ),
    			),
    			// Style
    			array(
    			    'type'          => 'colorpicker',
    			    'param_name'    => 'ls_bg',
    			    'heading'       => esc_html__( 'Background Color', 'definity' ),
    			    'group'			=> 'Style'
    			),
    			array(
    			    'type'          => 'textfield',
    			    'param_name'    => 'ls_padding_top',
    			    'heading'       => esc_html__( 'Padding Top', 'definity' ),
    			    'description'   => esc_html__( 'Top spacing between the slider logos and the wraping container.', 'definity' ),
    			    'group'			=> 'Style'
    			),
    			array(
    			    'type'          => 'textfield',
    			    'param_name'    => 'ls_padding_bottom',
    			    'heading'       => esc_html__( 'Padding Bottom', 'definity' ),
    			    'description'   => esc_html__( 'Bottom spacing between the slider logos and the wraping container.', 'definity' ),
    			    'group'			=> 'Style'
    			),
    		)
		));


		/* ---- Logo Slide (vc map) ---- */
		vc_map( array(
			'name'                    => 'Logo Slide',
			'base'                    => 'd_logo_slide',
			'as_child'                => array( 'only' => 'd_logos_slider' ),
			'content_element'         => true,
			'icon' 					  => get_template_directory_uri() . '/assets/images/visual-composer/logo_slide.png',
    		'params'				  => array(
    			array(
	                'type'          => 'attach_image',
	                'param_name'    => 'image',
	                'heading'       => esc_html__( 'Image', 'definity' ),
	                'description'   => esc_html__( 'Add logo image.', 'definity' ),
	            ),
	            array(
	                'type'          => 'vc_link',
	                'param_name'    => 'link',
	                'heading'       => esc_html__( 'Link', 'definity' ),
	                'description'   => esc_html__( '(optional) Add link to the logo', 'definity' )
	            ),
    		)
		));


		/* ---- Single Image Slider (vc map) ---- */
		vc_map( array(
			'name'                    => 'Single Image Slider',
    		'base'                    => 'd_single_img_slider',
    		'as_parent'               => array('only' => 'd_single_img_slide'),
    		'content_element'         => true,
    		'show_settings_on_create' => true,
    		'js_view'                 => 'VcColumnView',
    		'category'                => esc_html__('Definity Elements','definity'),
    		'is_container'            => true,
    		'icon' 					  => get_template_directory_uri() . '/assets/images/visual-composer/image_slider.png',
    		'description'             => 'Add images carousel with this element',
    		'params'				  => array(
    			array(
    			    'type'          => 'dropdown',
    			    'param_name'    => 'arrows',
    			    'heading'       => esc_html__( 'Arrows', 'definity' ),
    			    'description'   => esc_html__( 'Display "prev" and "next" arrows.', 'definity' ),
    			    'value'         => array(
    			        'Display Arrows'  => 'true',
    			        'Hide Arrows'  	  => 'false'
    			    ),
    			    'std'           => 'true'
    			),
    			array(
    			    'type'          => 'checkbox',
    			    'param_name'    => 'arrows_hover',
    			    'heading'       => esc_html__( 'Show the arrows on hover', 'definity' ),
    			    'description'   => esc_html__( 'Only show the arrows when you hover over the slider', 'definity' ),
    			    'value'         => array(
    			        esc_html__( 'Enable', 'definity' )    => '1'
    			    ),
    			    'dependency'    => array(
    			        'element'   => 'arrows',
    			        'value'     => array( 'Enable', 'true' )
    			    )
    			),
    			array(
    			    'type'          => 'dropdown',
    			    'param_name'    => 'dots',
    			    'heading'       => esc_html__( 'Dots', 'definity' ),
    			    'description'   => esc_html__( 'Display navigation dots that show the current slide.', 'definity' ),
    			    'value'         => array(
    			        'Display Dots'  => 'true',
    			        'Hide Dots'  	=> 'false'
    			    ),
    			    'std'           => 'false'
    			),
    			array(
    			    'type'          => 'checkbox',
    			    'param_name'    => 'autoplay',
    			    'heading'       => esc_html__( 'Autoplay', 'definity' ),
    			    'description'   => esc_html__( 'Slider change slides automatically.', 'definity' ),
    			    'value'         => array(
    			        esc_html__( 'Enable', 'definity' )    => 'true'
    			    )
    			),
    			array(
    			    'type'          => 'textfield',
    			    'param_name'    => 'autoplay_speed',
    			    'heading'       => esc_html__( 'Autoplay Speed', 'definity' ),
    			    'description'   => esc_html__( 'Enter autoplay interval in milliseconds (1 second = 1000 milliseconds).', 'definity' ),
    			    'dependency'    => array(
    			        'element'   => 'autoplay',
    			        'value'     => array( 'Enable', 'true' )
    			    )
    			),
    			array(
    			    'type'          => 'textfield',
    			    'param_name'    => 'speed',
    			    'heading'       => esc_html__( 'Animation Speed', 'definity' ),
    			    'description'   => esc_html__( 'Enter animation speed in milliseconds (1 second = 1000 milliseconds).', 'definity' )
    			),
    			array(
    			    'type'          => 'textfield',
    			    'param_name'    => 'slides_to_show',
    			    'heading'       => esc_html__( 'Slides to show', 'definity' ),
    			    'description'   => esc_html__( 'Enter number of slides to show at once (default set on 5).', 'definity' )
    			),
    			array(
    			    'type'          => 'textfield',
    			    'param_name'    => 'slides_to_scroll',
    			    'heading'       => esc_html__( 'Slides to scroll', 'definity' ),
    			    'description'   => esc_html__( 'Number of slides that will scroll at once on the next slide (default set on 1).', 'definity' )
    			),
    			array(
    			    'type'          => 'dropdown',
    			    'param_name'    => 'animation',
    			    'heading'       => esc_html__( 'Animation Type', 'definity' ),
    			    'description'   => esc_html__( 'Select animation type.', 'definity' ),
    			    'value'         => array(
    			        'Fade'  => 'true',
    			        'Slide' => 'false'
    			    ),
    			    'std'           => 'false'
    			),
    			array(
    			    'type'          => 'checkbox',
    			    'param_name'    => 'adaptive_height',
    			    'heading'       => esc_html__( 'Adaptive Height', 'definity' ),
    			    'description'   => esc_html__( 'Change the height of the slide depending on the content height.', 'definity' ),
    			    'value'         => array(
    			        esc_html__( 'Enable', 'definity' )    => 'true'
    			    ),
    			    'std'			=> 'true'
    			),
    			array(
    			    'type'          => 'textfield',
    			    'param_name'    => 'css_class',
    			    'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
    			    'description'   => esc_html__( '(optional) Style particular content element differently - add a class name and refer to it in custom CSS', 'definity' ),
    			)
    		)
		));


		/* ---- Single Image Slide (vc map) ---- */
		vc_map( array(
			'name'                    => 'Single Image Slide',
			'base'                    => 'd_single_img_slide',
			'as_child'                => array( 'only' => 'd_single_img_slider' ),
			'content_element'         => true,
			'icon' 					  => get_template_directory_uri() . '/assets/images/visual-composer/single_image.png',
    		'params'				  => array(
    			array(
	                'type'          => 'attach_image',
	                'param_name'    => 'image',
	                'heading'       => esc_html__( 'Image', 'definity' ),
	                'description'   => esc_html__( 'Add image for the slide here, TIP: try to keep the all images the same size.', 'definity' ),
	            ),
	            array(
	                'type'          => 'checkbox',
	                'param_name'    => 'lightbox',
	                'heading'       => esc_html__( 'Lightbox', 'definity' ),
	                'description'   => esc_html__( 'Open the full size images from the slider in Lightbox (Popup), you must select this option on every slide that you want to be in the lightbox.', 'definity' ),
	                'value'         => array(
	                    esc_html__( 'Enable', 'definity' )    => '1'
	                ),
	            ),
	            array(
	                'type'          => 'vc_link',
	                'param_name'    => 'link',
	                'heading'       => esc_html__( 'Link', 'definity' ),
	                'description'   => esc_html__( '(optional) Add link to the logo', 'definity' )
	            ),
    		)
		));


		function definity_get_cf7_forms() {
			$cf7_forms = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
			
			$forms = array();
			
			if ( $cf7_forms ) {
				foreach ( $cf7_forms as $form )
					$forms[$form->post_title] = $form->ID;
			} else {
				$forms[esc_html__( 'No contact forms found', 'definity' )] = 0;
			}
			
			return $forms;
		}
		/* ---- CTA ---- */
		vc_map( array(
			'base' 			=> 'd_cta',
            'name' 			=> esc_html__('CTA', 'definity'),
            'description' 	=> esc_html__('Call to action, select from multiple types', 'definity'), 
            'category' 		=> esc_html__('Definity Elements', 'definity'),
            'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/cta.png',
            'params' 		=> array(
            	array(
                    'type'          => 'dropdown',
                    'param_name'    => 'cta_type',
                    'heading'       => esc_html__( 'CTA Type', 'definity' ),
                    'description'   => esc_html__( 'Select CTA type', 'definity' ),
                    'value'         => array(
                    	'Link' 				=> 'cta_link',
                    	'Newsletter'    	=> 'cta_join',
                        'Link with popup'  	=> 'cta_popup',
                        'Floating Form'  	=> 'cta_float',
                        'Link Compact'  	=> 'cta_link_compact',
                    ),
                    'std'			=> 'cta_link'
                ),
                array(
            		'type' 			=> 'dropdown',
            		'param_name' 	=> 'id',
            		'heading' 		=> esc_html__( 'Select form', 'definity' ),
            		'description'	=> esc_html__( 'Select a previously created contact-form from the list.', 'definity' ),
            		'value' 		=> definity_get_cf7_forms(),
            		'dependency'    => array(
	                    'element'   => 'cta_type',
	                    'value'     => array( 'cta_join', 'cta_float' )
	                )
            	),
                array(
	                'type'          => 'textarea',
	                'param_name'    => 'heading',
	                'holder'        => 'p',
	                'heading'       => esc_html__( 'Title', 'definity' ),
	                'value'         => esc_html__( 'Enter heading', 'definity' ),
	                'description'   => esc_html__( 'Enter call to action text here', 'definity' ),
	            ),
	            array(
	                'type'          => 'vc_link',
	                'param_name'    => 'link',
	                'heading'       => esc_html__( 'Button', 'definity' ),
	                'description'   => esc_html__( 'Add button/link for the CTA', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'cta_type',
	                    'value'     => array( 'cta_link', 'cta_link_compact' )
	                )
	            ),
	            array(
	                'type'          => 'vc_link',
	                'param_name'    => 'popup_link',
	                'heading'       => esc_html__( 'Button', 'definity' ),
	                'description'   => esc_html__( 'Enter the url for the popup, e.g. YouTube video', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'cta_type',
	                    'value'     => array( 'cta_popup' )
	                )
	            ),
	            array(
                    'type'          => 'dropdown',
                    'param_name'    => 'popup_btn',
                    'heading'       => esc_html__( 'Button type', 'definity' ),
                    'description'   => esc_html__( 'Chose button type', 'definity' ),
                    'value'         => array(
                        'Animated Icon Button' 	=> 'play-btn',
                        'Normal Button'	 		=> 'btn',
                        'Ghost Button'	 		=> 'btn-ghost',
                        'Rounded Ghost Button'	=> 'btn-ghost btn-round',
                        'Text Button'			=> 'btn-text',
                    ),
                    'std'			=> 'play-btn',
                    // 'group'			=> 'Options',
                    'dependency'    => array(
	                    'element'   => 'cta_type',
	                    'value'     => array( 'cta_popup' )
	                )
                ),
	            array(
	                'type'          => 'iconpicker',
	                'param_name'    => 'icon',
	                'heading'       => esc_html__( 'Icon Type', 'definity' ),
	                'description'   => esc_html__( 'Select icon from library.', 'definity' ),
	                // 'group'			=> 'Options',
	                'settings'      => array(
	                    'type'          => 'lineicons',
	                    'emptyIcon'     => true,
	                    'iconsPerPage'  => 150
	                ),
	                'dependency'    => array(
	                    'element'   => 'popup_btn',
	                    'value'     => array( 'play-btn' )
	                ),
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'icon_color',
	                'heading'       => esc_html__( 'Icon Color', 'definity' ),
	                'description'   => esc_html__( 'Select icon color', 'definity' ),
	                'group'			=> 'Style',
	                'dependency'    => array(
	                    'element'   => 'popup_btn',
	                    'value'     => array( 'play-btn' )
	                ),
	            ),
	            array(
                    'type'          => 'textfield',
                    'param_name'    => 'cta_height',
                    'heading'       => esc_html__( 'Height', 'definity' ),
                    'description'   => esc_html__( 'Change the height of the container for the CTA element.', 'definity' ),
                    'group'			=> 'Style',
                    'dependency'    => array(
	                    'element'   => 'cta_type',
	                    'value'     => array( 'cta_link_compact' )
	                )
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'cta_p_left',
                    'heading'       => esc_html__( 'Padding Left', 'definity' ),
                    'description'   => esc_html__( 'Spacing on the left side between the container and the inside content.', 'definity' ),
                    'group'			=> 'Style',
                    'dependency'    => array(
	                    'element'   => 'cta_type',
	                    'value'     => array( 'cta_link_compact' )
	                )
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'cta_p_right',
                    'heading'       => esc_html__( 'Padding Right', 'definity' ),
                    'description'   => esc_html__( 'Spacing on the right side between the container and the inside content.', 'definity' ),
                    'group'			=> 'Style',
                    'dependency'    => array(
	                    'element'   => 'cta_type',
	                    'value'     => array( 'cta_link_compact' )
	                )
                ),
	            array(
                    'type'          => 'dropdown',
                    'param_name'    => 'heading_style',
                    'heading'       => esc_html__( 'Heading style', 'definity' ),
                    'description'   => esc_html__( 'Change the heading style', 'definity' ),
                    'group'			=> 'Style',
                    'value'         => array(
                    	'Normal Style'  	 => '',
                    	'Thin Style'    	 => 'h-alt',
                    ),
                    'std'			=> ''
                ),
                array(
                    'type'          => 'colorpicker',
                    'param_name'    => 'heading_color',
                    'heading'       => esc_html__( 'Title Color', 'definity' ),
                    'description'   => esc_html__( 'Change the color of the title.', 'definity' ),
                    'group'			=> 'Style',
                ),
	            array(
                    'type'          => 'attach_image',
                    'param_name'    => 'image',
                    'value'         => '',
                    'heading'       => esc_html__( 'Image', 'definity' ),
                    'description'   => esc_html__( 'Add image with the contact form', 'definity' ),
                    // 'group'			=> 'Options',
                    'dependency'    => array(
	                    'element'   => 'cta_type',
	                    'value'     => array( 'cta_float' )
	                )
                ),
                array(
                    'type'          => 'dropdown',
                    'param_name'    => 'img_position',
                    'heading'       => esc_html__( 'Image Position', 'definity' ),
                    'value'         => array(
                        'Left' 		=> '',
                        'Right'	 	=> 'img-right ',
                        'Top'	 	=> 'img-top ',
                        'Bottom'	=> 'img-bottom ',
                    ),
                    'std'			=> '',
                    // 'group'			=> 'Options',
                    'dependency'    => array(
	                    'element'   => 'cta_type',
	                    'value'     => array( 'cta_float' )
	                )
                ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'top_offset',
                    'heading'       => esc_html__( 'Top Offset', 'definity' ),
                    'description'   => esc_html__( 'Push (or pull) the CTA form from the top. Use - for negative offset.', 'definity' ),
                    'group'			=> 'Style',
                    'dependency'    => array(
	                    'element'   => 'cta_type',
	                    'value'     => array( 'cta_float' )
	                )
                ),
	            array(
                    'type'          => 'attach_image',
                    'param_name'    => 'bg',
                    'value'         => '',
                    'heading'       => esc_html__( 'Background image', 'definity' ),
                    'description'   => esc_html__( 'Add background image from the media library.', 'definity' ),
                    // 'group'			=> 'Options',
                    'dependency'    => array(
	                    'element'   => 'cta_type',
	                    'value'     => array( 'cta_link','cta_join' )
	                )
                ),
                array(
                    'type'          => 'colorpicker',
                    'param_name'    => 'bg_color',
                    'heading'       => esc_html__( 'Background Color', 'definity' ),
                    'description'   => esc_html__( 'Change the background color. 
                    	Tip: to achieve parallax effect, add bg image to the wrapping row and use this to apply dark transparent overlay on the image, so the text is more visible.', 'definity' ),
                    'group'			=> 'Style',
                ),
                // Button Styles
                array(
                    'type'          => 'dropdown',
                    'param_name'    => 'btn_size',
                    'heading'       => esc_html__( 'Button Size', 'definity' ),
                    'description'   => esc_html__( 'Chose button size', 'definity' ),
                    'value'         => array(
                        'Normal'	=> '',
                        'Large'	 	=> ' btn-large',
                        'Small'		=> ' btn-small',
                    ),
                    'std'			=> '',
                    'group'			=> 'Style',
                    'dependency'    => array(
	                    'element'   => 'cta_type',
	                    'value'     => array( 'cta_popup', 'cta_link', 'cta_link_compact' )
	                )
                ),
                array(
                    'type'          => 'dropdown',
                    'param_name'    => 'btn_type',
                    'heading'       => esc_html__( 'Button type', 'definity' ),
                    'description'   => esc_html__( 'Chose button type', 'definity' ),
                    'value'         => array(
                        'Normal Button'	 		=> 'btn',
                        'Ghost Button'	 		=> 'btn-ghost',
                        'Rounded Ghost Button'	=> 'btn-ghost btn-round',
                        'Text Button'			=> 'btn-text',
                    ),
                    'std'			=> 'btn',
                    'group'			=> 'Style',
                    'dependency'    => array(
	                    'element'   => 'cta_type',
	                    'value'     => array( 'cta_link', 'cta_link_compact' )
	                )
                ),
                // Button Styles - Colors
                array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'cta_btn_bg',
	                'heading'       => esc_html__( 'Button Background Color', 'definity' ),
	                'group'			=> 'Style',
	                'dependency'    => array(
	                    'element'   => 'cta_type',
	                    'value'     => array( 'cta_link','cta_join','cta_float', 'cta_link_compact' )
	                )
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'cta_btn_bg_hover',
	                'heading'       => esc_html__( 'Button Background Hover Color', 'definity' ),
	                'group'			=> 'Style',
	                'dependency'    => array(
	                    'element'   => 'cta_type',
	                    'value'     => array( 'cta_link','cta_join','cta_float', 'cta_link_compact' )
	                )
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'cta_btn_border_color',
	                'heading'       => esc_html__( 'Ghost Button Border Color', 'definity' ),
	                'group'			=> 'Style',
	                'dependency'    => array(
	                    'element'   => 'btn_type',
	                    'value'     => array( 'btn-ghost', 'btn-ghost btn-round' )
	                )
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'cta_btn_border_bg_hover',
	                'heading'       => esc_html__( 'Ghost Button Hover Background', 'definity' ),
	                'group'			=> 'Style',
	                'dependency'    => array(
	                    'element'   => 'btn_type',
	                    'value'     => array( 'btn-ghost', 'btn-ghost btn-round' )
	                )
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'cta_btn_text_btn_border_color',
	                'heading'       => esc_html__( 'Text Button Border Color', 'definity' ),
	                'group'			=> 'Style',
	                'dependency'    => array(
	                    'element'   => 'btn_type',
	                    'value'     => array( 'btn-text' )
	                )
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'cta_btn_text_color',
	                'heading'       => esc_html__( 'Button Text Color', 'definity' ),
	                'group'			=> 'Style',
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'cta_btn_text_hover_color',
	                'heading'       => esc_html__( 'Button Text Hover Color', 'definity' ),
	                'group'			=> 'Style',
	            ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'css_class',
                    'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
                    'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'definity' ),
                )
            )
        ));


		/* ---- Portfolio Wrapper (vc map) ---- */
		vc_map( array(
			'deprecated'	=> '5.4.4',
			'base' 			=> 'd_portfolio_wrapper',
            'name' 			=> esc_html__( 'Portfolio Grid', 'definity' ),
            'description' 	=> esc_html__( 'Display meida items in a grid', 'definity' ), 
            'category' 		=> esc_html__( 'Definity Elements', 'definity' ),
            'as_parent'               => array( 'only' => 'd_portfolio_item' ),
            'content_element'         => true,
            'show_settings_on_create' => true,
            'is_container'            => true,
            'js_view'                 => 'VcColumnView',
            'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/pw_3.png',
            'params' 		=> array(
            	array(
	                'type'          => 'checkbox',
	                'heading'       => esc_html__( 'Show filters', 'definity' ),
	                'param_name'    => 'show_filters',
	                'description'   => esc_html__( 'Use filters to show and hide type of projects/portfolio items', 'definity' ),
	                'value'         => array(
	                    esc_html__( 'Filters', 'definity' )    => '1'
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_1',
	                'heading'       => 'Filter Name',
	                'description'   => esc_html__( 'One filter per input field, e.g: webdesign', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_filters',
	                    'value'     => array( '1' )
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_2',
	                'heading'       => 'Filter Name',
	                'description'   => esc_html__( '(optional) One filter per input field, e.g: print', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_filters',
	                    'value'     => array( '1' )
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_3',
	                'heading'       => 'Filter Name',
	                'description'   => esc_html__( '(optional) One filter per input field, e.g: photography', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_filters',
	                    'value'     => array( '1' )
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_4',
	                'heading'       => 'Filter Name',
	                'description'   => esc_html__( '(optional) One filter per input field', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_filters',
	                    'value'     => array( '1' )
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_5',
	                'heading'       => 'Filter Name',
	                'description'   => esc_html__( '(optional) One filter per input field', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_filters',
	                    'value'     => array( '1' )
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_6',
	                'heading'       => 'Filter Name',
	                'description'   => esc_html__( '(optional) One filter per input field', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_filters',
	                    'value'     => array( '1' )
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_7',
	                'heading'       => 'Filter Name',
	                'description'   => esc_html__( '(optional) One filter per input field', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_filters',
	                    'value'     => array( '1' )
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_8',
	                'heading'       => 'Filter Name',
	                'description'   => esc_html__( '(optional) One filter per input field', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_filters',
	                    'value'     => array( '1' )
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_9',
	                'heading'       => 'Filter Name',
	                'description'   => esc_html__( '(optional) One filter per input field', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_filters',
	                    'value'     => array( '1' )
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_10',
	                'heading'       => 'Filter Name',
	                'description'   => esc_html__( '(optional) One filter per input field', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_filters',
	                    'value'     => array( '1' )
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'all_filter_text',
	                'heading'       => esc_html__( 'All filter - name', 'definity' ),
	                'description'   => esc_html__( '(optional) Change the name of "All" filter', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_filters',
	                    'value'     => array( '1' )
	                )
	            ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'css_class',
                    'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
                    'description'   => esc_html__( '(optional) Style particular content element differently - add a class name and refer to it in custom CSS', 'definity' ),
                )
            )
        ));
		

        /* ---- Portfolio Item (vc map) ---- */
		vc_map( array(
			'deprecated'			=> '5.4.4',
			'base'                  => 'd_portfolio_item',
			'name' 					=> esc_html__( 'Portfolio Item', 'definity' ),
			'as_child'              => array( 'only' => 'd_portfolio_wrapper' ),
			'content_element'       => true,
			'icon' 					=> get_template_directory_uri() . '/assets/images/visual-composer/portfolio_item.png',
    		'params'				=> array(
    			array(
    			    'type'          => 'dropdown',
    			    'param_name'    => 'media_type',
    			    'heading'       => esc_html__( 'Media Type', 'definity' ),
    			    'description'   => esc_html__( 'Chose between image or video', 'definity' ),
    			    'value'         => array(
    			        'Image'  	=> 'img',
    			        'Video' 	=> 'video',
    			    ),
    			),
    			array(
	                'type'          => 'attach_image',
	                'param_name'    => 'image',
	                'value'         => '',
	                'heading'       => esc_html__( 'Image', 'definity' ),
	                'description'   => esc_html__( 'Add image. Images for all the portfolio items should have the same size for best effect. ', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'media_type',
	                    'value'     => array( 'img' )
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'video_url',
	                'heading'       => esc_html__( 'Video URL', 'definity' ),
	                'description'   => esc_html__( 'Paste the link to the video.', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'media_type',
	                    'value'     => array( 'video' )
	                )
	            ),
    			array(
	                'type'          => 'attach_image',
	                'param_name'    => 'video_image',
	                'value'         => '',
	                'heading'       => esc_html__( 'Video Image', 'definity' ),
	                'description'   => esc_html__( 'Chose image that will present the video in the portfolio.', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'media_type',
	                    'value'     => array( 'video' )
	                )
	            ),
    			array(
    			    'type'          => 'dropdown',
    			    'param_name'    => 'grid_layout',
    			    'heading'       => esc_html__( 'Grid Layout', 'definity' ),
    			    'description'   => esc_html__( 'Select how many portfolio items you want in a row. All items should have the same layout.', 'definity' ),
    			    'value'         => array(
    			        '3 Items in a row'	=> 'col-md-4',
    			        '4 Items in a row' 	=> 'col-md-3',
    			        '2 Items in a row'  => 'col-md-6',
    			    ),
    			),
    			array(
    			    'type'          => 'dropdown',
    			    'param_name'    => 'hover_effect',
    			    'heading'       => esc_html__( 'Portfolio Style', 'definity' ),
    			    'description'   => esc_html__( 'Chose a style for the portfolio item. ', 'definity' ),
    			    'value'         => array(
    			        'Default Dark'  			 => '',
    			        'Default Light' 			 => 'hover-light',
    			        'Bottom Slide in, Dark'      => 'hover-bottom',
    			        'Bottom Slide in, Light'     => 'hover-bottom hover-light',
    			        'Slide in Side Panel, Dark'  => 'hover-side',
    			        'Slide in Side Panel, Light' => 'hover-side hover-light',
    			        'Classic - text outside'	 => 'hover-simple'
    			    ),
    			),
    			array(
    			    'type'          => 'dropdown',
    			    'param_name'    => 'p_content_align',
    			    'heading'       => esc_html__( 'Text align', 'definity' ),
    			    'description'   => esc_html__( 'Align the heading and subheading.', 'definity' ),
    			    'value'         => array(
    			        'Center'  	=> '',
    			        'Left' 		=> 'p-txt-left',
    			        'Right' 	=> 'p-txt-right',
    			    ),
    			    'dependency'    => array(
    			        'element'   => 'hover_effect',
    			        'value'     => array( 'hover-simple' )
    			    ),
    			),
    			array(
    			    'type'          => 'checkbox',
    			    'param_name'    => 'open_lightbox',
    			    'heading'       => esc_html__( 'Open in Popup (lightbox)', 'definity' ),
    			    'value'         => array(
    			        esc_html__( 'Enable', 'definity' )    => '1'
    			    ),
    			    'description'   => esc_html__( 'Delete the link, for the popup to work.', 'definity' ),
    			    'dependency'    => array(
    			        'element'   => 'media_type',
    			        'value'     => array( 'img' )
    			    ),
    			),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'title',
	                'heading'       => esc_html__( 'Title', 'definity' ),
	                'description'   => esc_html__( 'Enter title for this portfolio item', 'definity' )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'subtitle',
	                'heading'       => esc_html__( 'Subtitle', 'definity' ),
	                'description'   => esc_html__( 'Enter subtitle for this portfolio item', 'definity' )
	            ),
	            array(
	                'type'          => 'checkbox',
	                'param_name'    => 'filters_option',
	                'heading'       => esc_html__( 'Show filters', 'definity' ),
	                'value'         => array(
	                    esc_html__( 'This element has filter/s', 'definity' )    => '1'
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter',
	                'heading'       => esc_html__( 'Filter name', 'definity' ),
	                'description'   => esc_html__( 'Enter filter name/s so you can show and hide portfolio items. You can enter multiple filters, separated just by whitespace.', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'filters_option',
	                    'value'     => array( '1' )
	                )
	            ),
	            array(
	                'type'          => 'vc_link',
	                'param_name'    => 'link',
	                'heading'       => esc_html__( 'Link', 'definity' ),
	                'description'   => esc_html__( '(optional) Add link to the logo', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'media_type',
	                    'value'     => array( 'img' )
	                )
	            ),
    		)
		));

		
		/* ---- Portfolio Masonry Wrapper (vc map) ---- */
		vc_map( array(
			'deprecated'	=> '5.4.4',
			'base' 			=> 'd_portfolio_masonry_wrapper',
            'name' 			=> esc_html__( 'Portfolio Masonry Grid', 'definity' ),
            'description' 	=> esc_html__( 'Display meida items in a masonry grid', 'definity' ), 
            'category' 		=> esc_html__( 'Definity Elements', 'definity' ),
            'as_parent'               => array( 'only' => 'd_portfolio_masonry_item' ),
            'content_element'         => true,
            'show_settings_on_create' => true,
            'is_container'            => true,
            'js_view'                 => 'VcColumnView',
            // 'weight'		=> 10,
            'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/pw_masonry.png',
            'params' 		=> array(
            	array(
            	    'type'          => 'dropdown',
            	    'param_name'    => 'masonry_layout',
            	    'heading'       => esc_html__( 'Masonry Layout', 'definity' ),
            	    'description'   => esc_html__( 'Select masonry layout style', 'definity' ),
            	    'value'         => array(
            	        'Masonry Layout 1'	=> 'portfolio-masonry',
            	        'Masonry Layout 2' 	=> 'portfolio-masonry-2',
            	        'Masonry Layout 3'  => 'portfolio-masonry-3',
            	    ),
            	),
            	array(
	                'type'          => 'checkbox',
	                'heading'       => esc_html__( 'Show filters', 'definity' ),
	                'param_name'    => 'show_filters',
	                'description'   => esc_html__( 'Use filters to show and hide type of projects/portfolio items', 'definity' ),
	                'value'         => array(
	                    esc_html__( 'Filters', 'definity' )    => '1'
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_1',
	                'heading'       => 'Filter Name',
	                'description'   => esc_html__( 'One filter per input field, e.g: webdesign', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_filters',
	                    'value'     => array( '1' )
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_2',
	                'heading'       => 'Filter Name',
	                'description'   => esc_html__( '(optional) One filter per input field, e.g: print', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_filters',
	                    'value'     => array( '1' )
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_3',
	                'heading'       => 'Filter Name',
	                'description'   => esc_html__( '(optional) One filter per input field, e.g: photography', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_filters',
	                    'value'     => array( '1' )
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_4',
	                'heading'       => 'Filter Name',
	                'description'   => esc_html__( '(optional) One filter per input field', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_filters',
	                    'value'     => array( '1' )
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_5',
	                'heading'       => 'Filter Name',
	                'description'   => esc_html__( '(optional) One filter per input field', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_filters',
	                    'value'     => array( '1' )
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_6',
	                'heading'       => 'Filter Name',
	                'description'   => esc_html__( '(optional) One filter per input field', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_filters',
	                    'value'     => array( '1' )
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_7',
	                'heading'       => 'Filter Name',
	                'description'   => esc_html__( '(optional) One filter per input field', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_filters',
	                    'value'     => array( '1' )
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_8',
	                'heading'       => 'Filter Name',
	                'description'   => esc_html__( '(optional) One filter per input field', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_filters',
	                    'value'     => array( '1' )
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_9',
	                'heading'       => 'Filter Name',
	                'description'   => esc_html__( '(optional) One filter per input field', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_filters',
	                    'value'     => array( '1' )
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_10',
	                'heading'       => 'Filter Name',
	                'description'   => esc_html__( '(optional) One filter per input field', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_filters',
	                    'value'     => array( '1' )
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'all_filter_text',
	                'heading'       => esc_html__( 'All filter - name', 'definity' ),
	                'description'   => esc_html__( '(optional) Change the name of "All" filter', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'show_filters',
	                    'value'     => array( '1' )
	                )
	            ),
                array(
                    'type'          => 'textfield',
                    'param_name'    => 'css_class',
                    'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
                    'description'   => esc_html__( '(optional) Style particular content element differently - add a class name and refer to it in custom CSS', 'definity' ),
                )
            )
        ));


        /* ---- Portfolio Masonry Item (vc map) ---- */
		vc_map( array(
			'deprecated'			=> '5.4.4',
			'base'                  => 'd_portfolio_masonry_item',
			'name' 					=> esc_html__( 'Portfolio Item', 'definity' ),
			'as_child'              => array( 'only' => 'd_portfolio_masonry_wrapper' ),
			'content_element'       => true,
			'icon' 					=> get_template_directory_uri() . '/assets/images/visual-composer/portfolio_item.png',
    		'params'				=> array(
    			array(
    			    'type'          => 'dropdown',
    			    'param_name'    => 'media_type',
    			    'heading'       => esc_html__( 'Media Type', 'definity' ),
    			    'description'   => esc_html__( 'Chose between image or video', 'definity' ),
    			    'value'         => array(
    			        'Image'  	=> 'img',
    			        'Video' 	=> 'video',
    			    ),
    			),
    			array(
	                'type'          => 'attach_image',
	                'param_name'    => 'image',
	                'value'         => '',
	                'heading'       => esc_html__( 'Chose image', 'definity' ),
	                'description'   => esc_html__( 'Add image. Images for all the portfolio items should have the same size for best effect. ', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'media_type',
	                    'value'     => array( 'img' )
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'video_url',
	                'heading'       => esc_html__( 'Video URL', 'definity' ),
	                'description'   => esc_html__( 'Paste the link to the video.', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'media_type',
	                    'value'     => array( 'video' )
	                )
	            ),
    			array(
	                'type'          => 'attach_image',
	                'param_name'    => 'video_image',
	                'value'         => '',
	                'heading'       => esc_html__( 'Video Image', 'definity' ),
	                'description'   => esc_html__( 'Chose image that will present the video in the portfolio.', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'media_type',
	                    'value'     => array( 'video' )
	                )
	            ),
    			array(
    			    'type'          => 'dropdown',
    			    'param_name'    => 'hover_effect',
    			    'heading'       => esc_html__( 'Hover Effect', 'definity' ),
    			    'description'   => esc_html__( '(optional) Change the hover effect', 'definity' ),
    			    'value'         => array(
    			        'Dark'  	=> 'hover-default',
    			        'Light' 	=> 'hover-light',
    			    ),
    			),
    			array(
    			    'type'          => 'checkbox',
    			    'param_name'    => 'open_lightbox',
    			    'heading'       => esc_html__( 'Open in Popup (lightbox)', 'definity' ),
    			    'value'         => array(
    			        esc_html__( 'Enable', 'definity' )    => '1'
    			    ),
    			    'description'   => esc_html__( 'Delete the link, for the popup to work.', 'definity' ),
    			    'dependency'    => array(
    			        'element'   => 'media_type',
    			        'value'     => array( 'img' )
    			    )
    			),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'title',
	                'heading'       => esc_html__( 'Title', 'definity' ),
	                'description'   => esc_html__( 'Enter title for this portfolio item', 'definity' )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'subtitle',
	                'heading'       => esc_html__( 'Subtitle', 'definity' ),
	                'description'   => esc_html__( 'Enter subtitle for this portfolio item', 'definity' )
	            ),
	            array(
	                'type'          => 'checkbox',
	                'param_name'    => 'filters_option',
	                'heading'       => esc_html__( 'Show filters', 'definity' ),
	                'value'         => array(
	                    esc_html__( 'This element has filter/s', 'definity' )    => '1'
	                )
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter',
	                'heading'       => esc_html__( 'Filter name', 'definity' ),
	                'description'   => esc_html__( 'Enter filter name/s so you can show and hide portfolio items. You can enter multiple filters, separated just by whitespace.', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'filters_option',
	                    'value'     => array( '1' )
	                )
	            ),
	            array(
	                'type'          => 'vc_link',
	                'param_name'    => 'link',
	                'heading'       => esc_html__( 'Link', 'definity' ),
	                'description'   => esc_html__( '(optional) Add link to the logo', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'media_type',
	                    'value'     => array( 'img' )
	                )
	            ),
    		)
		));

		
		/* ---- Recent Posts (vc map) ---- */
		vc_map( array(
			'base' 			=> 'd_posts',
            'name' 			=> esc_html__( 'Recent Posts', 'definity' ),
            'description' 	=> esc_html__( 'Display recent blog posts', 'definity' ), 
            'category' 		=> esc_html__( 'Definity Elements', 'definity' ),
            'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/blog_posts.png',
            'params' 		=> array(
                array(
	                'type'          => 'textfield',
	                'param_name'    => 'posts_number',
	                'value'			=> '3',
	                'heading'       => esc_html__( 'Number of Posts', 'definity' ),
	                'description'   => esc_html__( 'Number of posts that you want to display', 'definity' ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'posts_cat',
	                'heading'       => esc_html__( 'By Categories', 'definity' ),
	                'description'   => esc_html__( '(optional) Enter the slug of the categories that you want to display, comma separated.', 'definity' ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'post_tag',
	                'heading'       => esc_html__( 'By Tags', 'definity' ),
	                'description'   => esc_html__( '(optional) Enter the slug of the tag/s that you want to display, comma separated.', 'definity' ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'post_name',
	                'heading'       => esc_html__( 'By Name', 'definity' ),
	                'description'   => esc_html__( '(optional) Enter the slug of the post that you want to display, only one post can be displayed this way.', 'definity' ),
	            ),
	            array(
            		'type' 			=> 'checkbox',
            		'param_name' 	=> 'comments_off',
            		'heading' 		=> esc_html__( 'Hide Comments', 'definity' ),
            		'value'			=> array(
            			esc_html__( 'Hide', 'definity' )	=> 'comments_off'
            		),
            	),
	            // Style
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'bg_color',
	                'heading'       => esc_html__( 'Card Background Color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'title_color',
	                'heading'       => esc_html__( 'Title Color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'txt_color',
	                'heading'       => esc_html__( 'Excerpt Color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'meta_color',
	                'heading'       => esc_html__( 'Meta Info Color', 'definity' ),
	                'description'   => esc_html__( 'Change the color of the meta info (date, comments, author etc.).', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'btn_bg_color',
	                'heading'       => esc_html__( 'Button Background Color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'btn_bg_hover_color',
	                'heading'       => esc_html__( 'Button Hover Background Color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'btn_txt_color',
	                'heading'       => esc_html__( 'Button Text Color', 'definity' ),
	                'group'			=> 'Style'
	            ),
	             array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'btn_txt_hover_color',
	                'heading'       => esc_html__( 'Button Hover Text Color', 'definity' ),
	                'group'			=> 'Style'
	            ),
            )
        ));


        /* ---- Contact Layout (vc map) ---- */
		vc_map( array(
			'base' 			=> 'd_contact',
            'name' 			=> esc_html__( 'Contact Layout', 'definity' ),
            'description' 	=> esc_html__( 'Display contact info and google map', 'definity' ), 
            'category' 		=> esc_html__( 'Definity Elements', 'definity' ),
            'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/contact_layout.png',
            'params' 		=> array(
            	array(
            		'type' 			=> 'dropdown',
            		'param_name' 	=> 'contact_layout',
            		'heading' 		=> esc_html__( 'Contact Layout', 'definity' ),
            		'description'	=> esc_html__( 'Select contact layout that you want to display.', 'definity' ),
            		'value' 		=> array(
            			'Contact Layout 1'	=> 'contact_1',
            			'Contact Layout 2'	=> 'contact_2', // new
            			'Contact Layout 3'	=> 'contact_3',
            			'Contact Layout 4'	=> 'contact_4', // 50|50 (old 2)
            		)
            	),
            	// Contact Form
            	array(
            		'type' 			=> 'dropdown',
            		'param_name' 	=> 'cf_id',
            		'heading' 		=> esc_html__( 'Select form', 'definity' ),
            		'description'	=> esc_html__( 'Select a previously created contact-form from the list.', 'definity' ),
            		'value' 		=> definity_get_cf7_forms(),
            		'group' 		=> esc_html__( 'Contact Form', 'definity' ),
            		'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_3', 
            		    	'contact_4'
            		    )
            		)
            	),
            	array(
            		'type' 			=> 'textfield',
            		'param_name' 	=> 'cf_heading',
            		'heading' 		=> esc_html__( 'Heading', 'definity' ),
            		'description'	=> esc_html__( 'Heading for the contact form section.', 'definity' ),
            		'group' 		=> esc_html__( 'Contact Form', 'definity' ),
            		'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_3', 
            		    	'contact_4'
            		    )
            		)
            	),
            	array(
            		'type' 			=> 'textfield',
            		'param_name' 	=> 'cf_subheading',
            		'heading' 		=> esc_html__( 'Subheading', 'definity' ),
            		'description'	=> esc_html__( 'Subheading for the contact form section.', 'definity' ),
            		'group' 		=> esc_html__( 'Contact Form', 'definity' ),
            		'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_4', 
            		    )
            		)
            	),
            	array(
            		'type' 			=> 'textarea',
            		'param_name' 	=> 'cf_info',
            		'heading' 		=> esc_html__( 'Description', 'definity' ),
            		'description'	=> esc_html__( 'Enter description for the contact form section.', 'definity' ),
            		'group' 		=> esc_html__( 'Contact Form', 'definity' ),
            		'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_3', 
            		    )
            		)
            	),
            	array(
            		'type' 			=> 'textfield',
            		'param_name' 	=> 'cfh_top_gap',
            		'heading' 		=> esc_html__( 'Heading top spacing.', 'definity' ),
            		'description'	=> esc_html__( 'Change the top spacing of the heading.', 'definity' ),
            		'group' 		=> esc_html__( 'Contact Form', 'definity' ),
            		'value'			=> '100px',
            		'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_4', 
            		    )
            		)
            	),
            	array(
            		'type' 			=> 'textfield',
            		'param_name' 	=> 'cfh_bot_gap',
            		'heading' 		=> esc_html__( 'Bottom spacing', 'definity' ),
            		'description'	=> esc_html__( 'Change the bottom spacing of the contact form.', 'definity' ),
            		'group' 		=> esc_html__( 'Contact Form', 'definity' ),
            		'value'			=> '50px',
            		'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_4', 
            		    )
            		)
            	),
            	array(
            		'type' 			=> 'dropdown',
            		'param_name' 	=> 'cf_style',
            		'heading' 		=> esc_html__( 'Form Style', 'definity' ),
            		'description'	=> esc_html__( 'Change the style of the form.', 'definity' ),
            		'value' 		=> array(
            			'Minimal'		=> 'form-minimal',
            			'Normal'		=> ''
            		),
            		'group' 		=> esc_html__( 'Contact Form', 'definity' ),
            		'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_3', 
            		    )
            		)
            	),
            	// Map Options
            	array(
            		'type' 			=> 'textfield',
            		'param_name' 	=> 'api_key',
            		'heading' 		=> esc_html__( 'API Key (required)', 'definity' ),
            		'description'	=> sprintf( esc_html__( 'Enter your %sGoogle Maps API key%s.', 'definity' ), '<a href="https://developers.google.com/maps/documentation/javascript/get-api-key">', '</a>' ),
            		'group' 		=> esc_html__( 'Map Options', 'definity' ),
            		'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_2',
            		    	'contact_4'
            		    )
            		)
            	),
            	array(
            		'type' 			=> 'textfield',
            		'param_name' 	=> 'address',
            		'heading' 		=> esc_html__( 'Address', 'definity' ),
            		'description'	=> esc_html__( 'Address for the map marker (you can type it in any language).', 'definity' ),
            		// 'value' 		=> 'New York, USA',
            		'holder'		=> 'h4',
            		'class'			=> 'text-center',
            		'group' 		=> esc_html__( 'Map Options', 'definity' ),
            		'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_2',
            		    	'contact_4'
            		    )
            		)
            	),
            	array(
            		'type' 			=> 'dropdown',
            		'param_name' 	=> 'map_type',
            		'heading' 		=> esc_html__( 'Map Type', 'definity' ),
            		'description'	=> esc_html__( 'Select a map type.', 'definity' ),
            		'value' 		=> array(
            			'Custom Roadmap'						=> 'roadmap_custom',
            			'Default Roadmap (no custom styles)'	=> 'roadmap',
            			'Satellite'								=> 'satellite',
            			'Terrain'								=> 'terrain',
            		),
            		'std' 			=> 'roadmap_custom',
            		'group' 		=> esc_html__( 'Map Options', 'definity' ),
            		'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_2',
            		    	'contact_4'
            		    )
            		)
            	),
            	array(
            		'type' 			=> 'dropdown',
            		'param_name' 	=> 'map_style',
            		'heading' 		=> esc_html__( 'Map Style', 'definity' ),
            		'description'	=> esc_html__( 'Select a map style.', 'definity' ),
            		'value' 		=> array(
            			'Clean Flat'			=> 'clean_flat',
            			'Grayscale'				=> 'grayscale',
            			'Cooltone Grayscale'	=> 'cooltone_grayscale',
            			'Light Monochrome'		=> 'light_monochrome',
            			'Dark Monochrome'		=> 'dark_monochrome',
            			'Light Color'			=> 'paper',
            			'Countries'				=> 'countries',
            			'Definity Original'		=> 'styles'
            		),
            		'std' 			=> 'styles',
            		'group' 		=> esc_html__( 'Map Options', 'definity' ),
            		'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_2',
            		    	'contact_4'
            		    )
            		)
            	),
            	array(
					'type' 			=> 'textfield',
					'param_name' 	=> 'height',
					'value'			=> '750px',
					'heading' 		=> esc_html__( 'Map Height', 'definity' ),
					'description'	=> esc_html__( 'Enter a map height.', 'definity' ),
					'group' 		=> esc_html__( 'Map Options', 'definity' ),
					'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_2',
            		    	'contact_4',
            		    	'contact_4'
            		    )
            		)
				),
            	array(
            		'type' 			=> 'textfield',
            		'param_name' 	=> 'zoom',
            		'heading' 		=> esc_html__( 'Zoom Level', 'definity' ),
            		'description' 	=> esc_html__( 'Default map zoom level (1 - 20).', 'definity' ),
            		'value' 		=> '13',
            		'group' 		=> esc_html__( 'Map Options', 'definity' ),
            		'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_2',
            		    	'contact_4'
            		    )
            		)
            	),
            	array(
            		'type' 			=> 'textfield',
            		'param_name' 	=> 'min_zoom',
            		'heading' 		=> esc_html__( 'Minimum Zoom Level', 'definity' ),
            		'description' 	=> esc_html__( 'Minimum map zoom level (1 - 20).', 'definity' ),
            		'value' 		=> '1',
            		'group' 		=> esc_html__( 'Map Options', 'definity' ),
            		'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_2',
            		    	'contact_4'
            		    )
            		)
            	),
            	array(
            		'type' 			=> 'checkbox',
            		'param_name' 	=> 'zoom_controls',
            		'heading' 		=> esc_html__( 'Zoom Controls', 'definity' ),
            		'description' 	=> esc_html__( 'Display map zoom controls.', 'definity' ),
            		'value'			=> array(
            			esc_html__( 'Enable', 'definity' )	=> 'no-gap'
            		),
            		'group' 		=> esc_html__( 'Map Options', 'definity' ),
            		'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_2',
            		    	'contact_4'
            		    )
            		)
            	),
            	array(
            		'type' 			=> 'checkbox',
            		'param_name' 	=> 'scroll_zoom',
            		'heading' 		=> esc_html__( 'Scroll Zoom', 'definity' ),
            		'description' 	=> esc_html__( 'Enable mouse-wheel zoom.', 'definity' ),
            		'value'			=> array(
            			esc_html__( 'Enable', 'definity' )	=> '1'
            		),
            		'group' 		=> esc_html__( 'Map Options', 'definity' ),
            		'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_2',
            		    	'contact_4'
            		    )
            		)
            	),
            	array(
            		'type' 			=> 'checkbox',
            		'param_name' 	=> 'touch_drag',
            		'heading' 		=> esc_html__( 'Touch Drag', 'definity' ),
            		'description' 	=> esc_html__( 'Enable touch-drag on mobile devices.', 'definity' ),
            		'value'			=> array(
            			esc_html__( 'Enable', 'definity' )	=> '1'
            		),
            		'group' 		=> esc_html__( 'Map Options', 'definity' ),
            		'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_2',
            		    	'contact_4'
            		    )
            		)
            	),
            	array(
            		'type' 			=> 'attach_image',
            		'param_name' 	=> 'marker_icon',
            		'heading' 		=> esc_html__( 'Marker Icon', 'definity' ),
            		'description' 	=> esc_html__( 'Custom marker icon.', 'definity' ),
            		'group' 		=> esc_html__( 'Map Options', 'definity' ),
            		'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_2',
            		    	'contact_4'
            		    )
            		)
            	),
            	array(
            		'type' 			=> 'textfield',
            		'param_name' 	=> 'show_map_btn',
            		'heading' 		=> esc_html__( 'Show map button', 'definity' ),
            		'description'	=> esc_html__( 'Change the text of the show map button.', 'definity' ),
            		'group' 		=> esc_html__( 'Map Options', 'definity' ),
            		'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_4'
            		    )
            		)
            	),
            	array(
            		'type' 			=> 'textfield',
            		'param_name' 	=> 'show_info_btn',
            		'heading' 		=> esc_html__( 'Hide map button', 'definity' ),
            		'description'	=> esc_html__( 'Change the text of the show info button.', 'definity' ),
            		'group' 		=> esc_html__( 'Map Options', 'definity' ),
            		'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_4'
            		    )
            		)
            	),
            	// CF 2 address style
            	array(
            		'type' 			=> 'checkbox',
            		'param_name' 	=> 'cf2_show_map',
            		'heading' 		=> esc_html__( 'Show Map', 'definity' ),
            		'value'			=> array(
            			esc_html__( 'Google Map', 'definity' )	=> '1'
            		),
            		'std'			=> '1',
            		'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_2',
            		    )
            		)
            	),
            	array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'adr_c2_bg',
	                'heading'       => esc_html__( 'Custom background for address section', 'definity' ),
	                'description'   => esc_html__( 'Change the background color.', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_2'
            		    )
	                )
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'adr_c2_txt',
	                'heading'       => esc_html__( 'Custom color for address title and icon', 'definity' ),
	                'description'   => esc_html__( 'Change the title and icon color.', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_2'
            		    )
	                )
	            ),

	            // Style
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'cl4_cf_heading_color',
	                'heading'       => esc_html__( 'Contact Form Heading Color', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_4'
            		    )
	                ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'cl4_cf_subheading_color',
	                'heading'       => esc_html__( 'Contact Form Sub Heading Color', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_4'
            		    )
	                ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'cl4_bg_color',
	                'heading'       => esc_html__( 'Map Section Background Color', 'definity' ),
	                'description'   => esc_html__( 'Change the background color of the element that overlays the map.', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_4',
            		    	'contact_1',
            		    )
	                ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'cl4_map_btn_color',
	                'heading'       => esc_html__( 'Show Map Button Color', 'definity' ),
	                'description'   => esc_html__( 'Change the color of the map button.', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_4',
            		    	'contact_1'
            		    )
	                ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'cl4_ag_title_color',
	                'heading'       => esc_html__( 'Info Title Color', 'definity' ),
	                'description'   => esc_html__( 'Change the color of the info title (address group).', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_4',
            		    	'contact_1'
            		    )
	                ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'cl4_ag_txt_color',
	                'heading'       => esc_html__( 'Info Text Color', 'definity' ),
	                'description'   => esc_html__( 'Change the color of the info text (address group).', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_4',
            		    	'contact_1'
            		    )
	                ),
	                'group'			=> 'Style'
	            ),
	            array(
	                'type'          => 'colorpicker',
	                'param_name'    => 'cl4_ag_border_color',
	                'heading'       => esc_html__( 'Info Border Color', 'definity' ),
	                'description'   => esc_html__( 'Change the color of the info border (address group).', 'definity' ),
	                'dependency'    => array(
	                    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_4'
            		    )
	                ),
	                'group'			=> 'Style'
	            ),

            	// Address group 1
            	array(
	                'type'          => 'iconpicker',
	                'param_name'    => 'ag_1_icon',
	                'heading'       => esc_html__( 'Icon Type', 'definity' ),
	                'description'   => esc_html__( 'Select icon from library.', 'definity' ),
	                'group' 		=> esc_html__( 'Address Group 1', 'definity' ),
	                'settings'      => array(
	                    'type'          => 'lineicons',
	                    'emptyIcon'     => false,
	                    'iconsPerPage'  => 150
	                ),
	                'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_2'
            		    )
            		)
	            ),
            	array(
	                'type'          => 'textfield',
	                'param_name'    => 'ag_1_title',
	                'heading'       => 'Title',
	                'description'	=> esc_html__( 'e.g. Phone', 'definity' ),
	                'group' 		=> esc_html__( 'Address Group 1', 'definity' ),
	                'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_2',
            		    	'contact_4'
            		    )
            		)
	            ),
            	array(
	                'type'          => 'textfield',
	                'param_name'    => 'ag_11_field',
	                'heading'       => 'Field 1',
	                'holder'		=> 'p',
	                'class'			=> 'text-center',
	                'description'	=> esc_html__( 'e.g. + 123 4567 890', 'definity' ),
	                'group' 		=> esc_html__( 'Address Group 1', 'definity' ),
	                'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_2',
            		    	'contact_4'
            		    )
            		)
	            ),
            	array(
	                'type'          => 'textfield',
	                'param_name'    => 'ag_12_field',
	                'heading'       => 'Field 2',
	                'description'	=> esc_html__( 'e.g. + 123 7654 098', 'definity' ),
	                'group' 		=> esc_html__( 'Address Group 1', 'definity' ),
	                'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_4'
            		    )
            		)
	            ),
	        	array(
	                'type'          => 'textfield',
	                'param_name'    => 'ag_13_field',
	                'heading'       => 'Field 3',
	                'group' 		=> esc_html__( 'Address Group 1', 'definity' ),
	                'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_4'
            		    )
            		)
	            ),
	        	array(
	                'type'          => 'textfield',
	                'param_name'    => 'ag_14_field',
	                'heading'       => 'Field 4',
	                'group' 		=> esc_html__( 'Address Group 1', 'definity' ),
	                'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_4'
            		    )
            		)
	            ),
            	// Address group 2
            	array(
	                'type'          => 'iconpicker',
	                'param_name'    => 'ag_2_icon',
	                'heading'       => esc_html__( 'Icon Type', 'definity' ),
	                'description'   => esc_html__( 'Select icon from library.', 'definity' ),
	                'group' 		=> esc_html__( 'Address Group 2', 'definity' ),
	                'settings'      => array(
	                    'type'          => 'lineicons',
	                    'emptyIcon'     => false,
	                    'iconsPerPage'  => 150
	                ),
	                'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_2'
            		    )
            		)
	            ),
            	array(
	                'type'          => 'textfield',
	                'param_name'    => 'ag_2_title',
	                'heading'       => 'Title',
	                'description'	=> esc_html__( 'e.g. Address', 'definity' ),
	                'group' 		=> esc_html__( 'Address Group 2', 'definity' ),
	                'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_2',
            		    	'contact_4'
            		    )
            		)
	            ),
            	array(
	                'type'          => 'textfield',
	                'param_name'    => 'ag_21_field',
	                'heading'       => 'Field 1',
	                'holder'		=> 'p',
	                'class'			=> 'text-center',
	                'description'	=> esc_html__( 'e.g. 1200 SOME STREET, IL, US', 'definity' ),
	                'group' 		=> esc_html__( 'Address Group 2', 'definity' ),
	                'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_2',
            		    	'contact_4'
            		    )
            		)
	            ),
            	array(
	                'type'          => 'textfield',
	                'param_name'    => 'ag_22_field',
	                'heading'       => 'Field 2',
	                'group' 		=> esc_html__( 'Address Group 2', 'definity' ),
	                'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_4'
            		    )
            		)
	            ),
	        	array(
	                'type'          => 'textfield',
	                'param_name'    => 'ag_23_field',
	                'heading'       => 'Field 3',
	                'group' 		=> esc_html__( 'Address Group 2', 'definity' ),
	                'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_4'
            		    )
            		)
	            ),
	        	array(
	                'type'          => 'textfield',
	                'param_name'    => 'ag_24_field',
	                'heading'       => 'Field 4',
	                'group' 		=> esc_html__( 'Address Group 2', 'definity' ),
	                'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_4'
            		    )
            		)
	            ),
            	// Address group 3
            	array(
	                'type'          => 'iconpicker',
	                'param_name'    => 'ag_3_icon',
	                'heading'       => esc_html__( 'Icon Type', 'definity' ),
	                'description'   => esc_html__( 'Select icon from library.', 'definity' ),
	                'group' 		=> esc_html__( 'Address Group 3', 'definity' ),
	                'settings'      => array(
	                    'type'          => 'lineicons',
	                    'emptyIcon'     => false,
	                    'iconsPerPage'  => 150
	                ),
	                'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_2'
            		    )
            		)
	            ),
            	array(
	                'type'          => 'textfield',
	                'param_name'    => 'ag_3_title',
	                'heading'       => 'Title',
	                'description'	=> esc_html__( 'e.g. Email', 'definity' ),
	               	'group' 		=> esc_html__( 'Address Group 3', 'definity' ),
	               	'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_2',
            		    	'contact_4'
            		    )
            		)
	            ),
            	array(
	                'type'          => 'textfield',
	                'param_name'    => 'ag_31_field',
	                'heading'       => 'Field 1',
	                'holder'		=> 'p',
	                'class'			=> 'text-center',
	                'description'	=> esc_html__( 'e.g. sayhello@email.com', 'definity' ),
	                'group' 		=> esc_html__( 'Address Group 3', 'definity' ),
	                'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_2',
            		    	'contact_4'
            		    )
            		)
	            ),
            	array(
	                'type'          => 'textfield',
	                'param_name'    => 'ag_32_field',
	                'heading'       => 'Field 3',
	                'group' 		=> esc_html__( 'Address Group 3', 'definity' ),
	                'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_4'
            		    )
            		)
	            ),
	        	array(
	                'type'          => 'textfield',
	                'param_name'    => 'ag_33_field',
	                'heading'       => 'Field 3',
	                'group' 		=> esc_html__( 'Address Group 3', 'definity' ),
	                'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_4'
            		    )
            		)
	            ),
	        	array(
	                'type'          => 'textfield',
	                'param_name'    => 'ag_34_field',
	                'heading'       => 'Field 4',
	                'group' 		=> esc_html__( 'Address Group 3', 'definity' ),
	                'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_4'
            		    )
            		)
	            ),
            	// Address group 4
            	array(
	                'type'          => 'textfield',
	                'param_name'    => 'ag_4_title',
	                'heading'       => 'Title',
	                'description'	=> esc_html__( 'e.g. Open Hours', 'definity' ),
	                'group' 		=> esc_html__( 'Address Group 4', 'definity' ),
	                'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_4'
            		    )
            		)
	            ),
            	array(
	                'type'          => 'textfield',
	                'param_name'    => 'ag_41_field',
	                'heading'       => 'Field 1',
	                'description'	=> esc_html__( 'e.g. MON-FRI: 9AM-5PM', 'definity' ),
	                'group' 		=> esc_html__( 'Address Group 4', 'definity' ),
	                'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_4'
            		    )
            		)
	            ),
            	array(
	                'type'          => 'textfield',
	                'param_name'    => 'ag_42_field',
	                'heading'       => 'Field 2',
	                'description'	=> esc_html__( 'e.g. SAT: 10AM-1PM', 'definity' ),
	                'group' 		=> esc_html__( 'Address Group 4', 'definity' ),
	                'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_4'
            		    )
            		)
	            ),
	        	array(
	                'type'          => 'textfield',
	                'param_name'    => 'ag_43_field',
	                'heading'       => 'Field 3',
	                'group' 		=> esc_html__( 'Address Group 4', 'definity' ),
	                'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_4'
            		    )
            		)
	            ),
	        	array(
	                'type'          => 'textfield',
	                'param_name'    => 'ag_44_field',
	                'heading'       => 'Field 4',
	                'group' 		=> esc_html__( 'Address Group 4', 'definity' ),
	                'dependency'    => array(
            		    'element'   => 'contact_layout',
            		    'value'     => array( 
            		    	'contact_1', 
            		    	'contact_4'
            		    )
            		)
	            )
            )
        ));


		/* ---- Animation Wrapper (vc map) ---- */
		vc_map( array(
			'base' 			=> 'd_animation_wrapper',
            'name' 			=> esc_html__( 'Animation', 'definity' ),
            'description' 	=> esc_html__( 'Add element/s inside to animate it.', 'definity' ), 
            'category' 		=> esc_html__( 'Definity Elements', 'definity' ),
            // 'as_parent'               => array( 'only' => 'd_portfolio_item' ),
            'content_element'         => true,
            'show_settings_on_create' => true,
            'is_container'            => true,
            'js_view'                 => 'VcColumnView',
            'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/animation.png',
            'params' 		=> array(
            	array(
            	    'type'          => 'checkbox',
            	    'param_name'    => 'enable_anim',
            	    'value'         => array(
            	        esc_html__( 'Enable Animations', 'definity' ) => 'enable'
            	    ),
            	    'std'			=> 'disable',
            	    'group'			=> 'Animation'
            	),
            	array(
            	    'type'          => 'dropdown',
            	    'param_name'    => 'anim_type',
            	    'heading'       => esc_html__( 'Animation Type', 'definity' ),
            	    'description'   => esc_html__( 'Pick animation type', 'definity' ),
            	    'value'         => array(
            	        'None'    			=> '',
            	        'Fade In'    		=> 'fadeIn',
            	        'Fade In Up'    	=> 'fadeInUp',
            	        'Fade In Down' 		=> 'fadeInDown',
            	        'Fade In Left'     	=> 'fadeInLeft',
            	        'Fade In Right'    	=> 'fadeInRight',
            	        'Slide In Up'    	=> 'slideInUp',
            	        'Slide In Down' 	=> 'slideInDown',
            	        'Slide In Left'     => 'slideInLeft',
            	        'Slide In Right'    => 'slideInRight',
            	        'Bounce In'    		=> 'bounceIn',
            	        'Bounce In Down'    => 'bounceInDown',
            	        'Bounce In Left'    => 'bounceInLeft',
            	        'Bounce In Right'   => 'bounceInRight',
            	        'Bounce In Up'    	=> 'bounceInUp',
            	        'Bounce In Up'    	=> 'bounceInUp',
            	        'ZoomIn'    		=> 'zoomIn',
            	        'Flip In Y'    		=> 'flipInY',
            	        'Flip In X'    		=> 'flipInX',
            	        'Roll In'    		=> 'rollIn',
            	        'Pulse'    			=> 'pulse',
            	        'Flash'    			=> 'flash',
            	        'Swing'    			=> 'swing',
            	        'Bounce'    		=> 'bounce',
            	        'Tada'    			=> 'tada',
            	        'Rubber Band'    	=> 'rubberBand',
            	        'Hinge'    			=> 'hinge',
            	        'Jack In The Box'   => 'jackInTheBox',
            	    ),
            	    'group'			=> 'Animation',
            	    'dependency'    => array(
            	        'element'   => 'enable_anim',
            	        'value'     => 'enable'
            	    ),
            	),
            	array(
            	    'type'          => 'checkbox',
            	    'param_name'    => 'anim_infinite',
            	    'value'         => array(
            	        esc_html__( 'Infinite', 'definity' ) => 'enable'
            	    ),
            	    'std'			=> 'disable',
            	    'group'			=> 'Animation',
            	    'dependency'    => array(
            	        'element'   => 'anim_type',
            	        'value'     => array( 
            	        	'pulse',
            	        	'flash',
            	        	'bounce',
            	        )
            	    ),
            	),
            	array(
            	    'type'          => 'dropdown',
            	    'param_name'    => 'anim_distance',
            	    'heading'       => esc_html__( 'Animation Distance', 'definity' ),
            	    'description'   => esc_html__( 'The distance in which the animation will perform.', 'definity' ),
            	    'value'         => array(
            	        'Small'    	=> 'Small',
            	        'Medium'    => '',
            	        'Big' 		=> 'Big',
            	    ),
            	    'std'			=> '/',
            	    'group'			=> 'Animation',
            	    'dependency'    => array(
            	        'element'   => 'anim_type',
            	        'value'     => array( 
            	        	'fadeInUp',
            	        	'fadeInDown',
            	        	'fadeInLeft',
            	        	'fadeInRight',
            	        )
            	    ),
            	),
            	array(
            	    'type'          => 'textfield',
            	    'param_name'    => 'anim_duration',
            	    'heading'       => esc_html__( 'Animation Duration', 'definity' ),
            	    'value'         => esc_html__( '0.5', 'definity' ),
            	    'description'   => esc_html__( 'Enter the duration of animation in seconds e.g. 0.5 (half second), 1 (one second)', 'definity' ),
            	    'group'			=> 'Animation',
            	    'dependency'    => array(
            	        'element'   => 'enable_anim',
            	        'value'     => 'enable'
            	    ),
            	),
            	array(
            	    'type'          => 'textfield',
            	    'param_name'    => 'anim_delay',
            	    'heading'       => esc_html__( 'Animation Delay', 'definity' ),
            	    'value'         => esc_html__( '0', 'definity' ),
            	    'description'   => esc_html__( 'Delay the animation before it executes by seconds. 1s - the animation will wait 1 second before it executes. *optional', 'definity' ),
            	    'group'			=> 'Animation',
            	    'dependency'    => array(
            	        'element'   => 'enable_anim',
            	        'value'     => 'enable'
            	    ),
            	),
            	array(
            	    'type'          => 'textfield',
            	    'param_name'    => 'anim_offset',
            	    'heading'       => esc_html__( 'Animation Offset', 'definity' ),
            	    'value'         => esc_html__( '0', 'definity' ),
            	    'description'   => esc_html__( 'Distance to start the animation (related to the browser bottom). *optional', 'definity' ),
            	    'group'			=> 'Animation',
            	    'dependency'    => array(
            	        'element'   => 'enable_anim',
            	        'value'     => 'enable'
            	    ),
            	),
            	array(
            	    'type'          => 'textfield',
            	    'param_name'    => 'anim_iteration',
            	    'heading'       => esc_html__( 'Animation Iteration', 'definity' ),
            	    'value'         => esc_html__( '0', 'definity' ),
            	    'description'   => esc_html__( 'Number of times the animation is repeated. *optional', 'definity' ),
            	    'group'			=> 'Animation',
            	    'dependency'    => array(
            	        'element'   => 'enable_anim',
            	        'value'     => 'enable'
            	    ),
            	)
            )
        ));


		if ( is_plugin_active( 'definity-portfolio/definity-portfolio.php' ) ) {
		/* ---- Portfolio CPT (vc map) ---- */
		vc_map( array(
			'base' 			=> 'd_pfolio_cpt',
            'name' 			=> esc_html__( 'Portfolio', 'definity' ),
            'description' 	=> esc_html__( 'Display the portfolio items', 'definity' ), 
            'category' 		=> esc_html__( 'Definity Elements', 'definity' ),
            'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/pw_3.png',
            'params' 		=> array(
                array(
	                'type'          => 'textfield',
	                'param_name'    => 'posts_number',
	                'value'			=> '3',
	                'heading'       => esc_html__( 'Number of Posts', 'definity' ),
	                'description'   => esc_html__( 'Number of posts that you want to display', 'definity' ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'post_name',
	                'heading'       => esc_html__( 'By Name', 'definity' ),
	                'description'   => esc_html__( '(optional) Enter the slug of the portfolio item that you want to display, only one portfolio item can be displayed this way.', 'definity' ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'post_filters',
	                'heading'       => esc_html__( 'By Filter', 'definity' ),
	                'description'   => esc_html__( '(optional) Enter the slug of the filter/s that you want to display, comma separated.', 'definity' ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'post_category',
	                'heading'       => esc_html__( 'By Category', 'definity' ),
	                'description'   => esc_html__( '(optional) Display portfolio items by a cateogry. Enter the slug of the category.', 'definity' ),
	            ),
	            array(
	                'type'          => 'checkbox',
	                'param_name'    => 'filters_on',
	                'heading'       => esc_html__( 'Show portfolio filters', 'definity' ),
	                'value'         => array(
	                    esc_html__( 'Enable', 'definity' )    => '1'
	                ),
	                'description'   => esc_html__( 'Show way to filter the portfolio items. To create filters go to: Portfolio > Filters', 'definity' ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_all_txt',
	                'heading'       => esc_html__( 'Change the "All" filter text.', 'definity' ),
	                'value'			=> 'All',
	                'dependency'    => array(
	                    'element'   => 'filters_on',
	                    'value'     => array( '1' )
	                ),
	                'group'			=> 'Options',
	            ),
               array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_spacing',
	                // 'value'			=> '',
	                'heading'       => esc_html__( 'Filters Spacing', 'definity' ),
	                'description'   => esc_html__( 'Change the spacing between the filters and the portfolio items.', 'definity' ),
	                'group'			=> 'Options',
	                'dependency'    => array(
	                    'element'   => 'filters_on',
	                    'value'     => array( '1' )
	                ),
	            ),
	            array(
	                'type'          => 'dropdown',
	                'param_name'    => 'portfolio_style',
	                'heading'       => esc_html__( 'Portfolio Style', 'definity' ),
	                'description'   => esc_html__( 'Chose a style for the portfolio item. ', 'definity' ),
	                'value'         => array(
	                    'Overlay Dark'  			 => '',
	                    'Overlay Light' 			 => 'pfolio-light',
	                    'Bottom Slide in, Dark'      => 'pfolio-bottom',
	                    'Bottom Slide in, Light'     => 'pfolio-bottom pfolio-light',
	                    'Slide in Side Panel, Dark'  => 'pfolio-side',
	                    'Slide in Side Panel, Light' => 'pfolio-side pfolio-light',
	                    'Classic (text outside)'	 => 'pfolio-simple'
	                ),
	            ),
	            array(
	                'type'          => 'dropdown',
	                'param_name'    => 'grid',
	                'heading'       => esc_html__( 'Grid Layout', 'definity' ),
	                'description'   => esc_html__( 'Chose a grid layout - how you want to display the portfolio items.', 'definity' ),
	                'value'         => array(
	                    '3 Column Grid'  	=> 'col-md-4',
	                    '4 Column Grid' 	=> 'col-md-3',
	                    '2 Column Grid'     => 'col-md-6',
	                    '1 Column Grid'     => 'col-md-12',
	                ),
	                'std'	=> 'col-md-4'
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'css_class',
	                'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
	                'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'definity' ),
	                'group'			=> 'Options',
	            )
            )
        ));


		/* ---- Masonry Portfolio CPT (vc map) ---- */
		vc_map( array(
			'base' 			=> 'd_pfolio_masonry_cpt',
            'name' 			=> esc_html__( 'Portfolio Masonry', 'definity' ),
            'description' 	=> esc_html__( 'Display the portfolio items in masonry layout.', 'definity' ), 
            'category' 		=> esc_html__( 'Definity Elements', 'definity' ),
            'icon' 			=> get_template_directory_uri() . '/assets/images/visual-composer/pw_masonry.png',
            'params' 		=> array(
                array(
	                'type'          => 'textfield',
	                'param_name'    => 'posts_number',
	                'value'			=> '6',
	                'heading'       => esc_html__( 'Number of Posts', 'definity' ),
	                'description'   => esc_html__( 'Number of posts that you want to display', 'definity' ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'post_name',
	                'heading'       => esc_html__( 'By Name', 'definity' ),
	                'description'   => esc_html__( '(optional) Enter the slug of the portfolio item that you want to display, only one portfolio item can be displayed this way.', 'definity' ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'post_filters',
	                'heading'       => esc_html__( 'By Filter', 'definity' ),
	                'description'   => esc_html__( '(optional) Enter the slug of the filter/s that you want to display, comma separated.', 'definity' ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'post_category',
	                'heading'       => esc_html__( 'By Category', 'definity' ),
	                'description'   => esc_html__( '(optional) Display portfolio items by a cateogry. Enter the slug of the category.', 'definity' ),
	            ),
	            array(
	                'type'          => 'checkbox',
	                'param_name'    => 'filters_on',
	                'heading'       => esc_html__( 'Show portfolio filters', 'definity' ),
	                'value'         => array(
	                    esc_html__( 'Enable', 'definity' )    => '1'
	                ),
	                'description'   => esc_html__( 'Show way to filter the portfolio items. To create filters go to: Portfolio > Filters', 'definity' ),
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_all_txt',
	                'heading'       => esc_html__( 'Change the "All" filter text.', 'definity' ),
	                'value'			=> 'All',
	                'dependency'    => array(
	                    'element'   => 'filters_on',
	                    'value'     => array( '1' )
	                ),
	                'group'			=> 'Options',
	            ),
               array(
	                'type'          => 'textfield',
	                'param_name'    => 'filter_spacing',
	                'heading'       => esc_html__( 'Filters Spacing', 'definity' ),
	                'description'   => esc_html__( 'Change the spacing between the filters and the portfolio items.', 'definity' ),
	                'group'			=> 'Options',
	                'dependency'    => array(
	                    'element'   => 'filters_on',
	                    'value'     => array( '1' )
	                ),
	            ),
               array(
	               	'type'          => 'dropdown',
	               	'param_name'    => 'hover_effect',
	               	'heading'       => esc_html__( 'Hover Effect', 'definity' ),
	               	'description'   => esc_html__( '(optional) Change the hover effect', 'definity' ),
	               	'value'         => array(
	               		'Dark'  	=> 'hover-default',
	               		'Light' 	=> 'hover-light',
	               	),
	               	'std'			=> 'hover-default'
               ),
	            array(
	                'type'          => 'dropdown',
	                'param_name'    => 'masonry_layout',
	                'heading'       => esc_html__( 'Portfolio Layout', 'definity' ),
	                'description'   => esc_html__( 'Chose a masonry layout to display the portfolio items.', 'definity' ),
	                'value'         => array(
	                	'Masonry Layout 1' 	=> 'portfolio-masonry-3',
	                    'Masonry Layout 2'	=> 'portfolio-masonry-2',
            	        'Masonry Layout 3' 	=> 'portfolio-masonry',
	                ),
	                'std'					=> 'portfolio-masonry-3'
	            ),
	            array(
	                'type'          => 'textfield',
	                'param_name'    => 'css_class',
	                'heading'       => esc_html__( 'Custom CSS class', 'definity' ),
	                'description'   => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'definity' ),
	                'group'			=> 'Options',
	            )
            )
        ));
		} // endif (definity-portfolio)
    } // definity_integrateVC()


    if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    	class WPBakeryShortCode_d_testimonials_slider extends WPBakeryShortCodesContainer {}
    	class WPBakeryShortCode_d_logos_slider extends WPBakeryShortCodesContainer {}
    	class WPBakeryShortCode_d_single_img_slider extends WPBakeryShortCodesContainer {}
    	class WPBakeryShortCode_d_portfolio_wrapper extends WPBakeryShortCodesContainer {}
    	class WPBakeryShortCode_d_portfolio_masonry_wrapper extends WPBakeryShortCodesContainer {}
    	class WPBakeryShortCode_d_animation_wrapper extends WPBakeryShortCodesContainer {}
    }

    if ( class_exists( 'WPBakeryShortCode' ) ) {
    	class WPBakeryShortCode_d_button extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_blockquote extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_page_title extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_sec_heading extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_ft_box extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_ft_box_hover extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_ft_image_hover extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_ft_card extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_ft_card_img extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_ft_link_card extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_ft_crypto_card extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_ft_numbers extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_number_counter extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_progress_circle extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_pricing_table extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_team_member extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_testimonial_slide extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_testimonial_cards extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_logo_slide extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_single_img_slide extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_cta extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_portfolio_item extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_portfolio_masonry_item extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_posts extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_contact extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_pfolio_cpt extends WPBakeryShortCode {}
    	class WPBakeryShortCode_d_pfolio_masonry_cpt extends WPBakeryShortCode {}
    }

} // endif.