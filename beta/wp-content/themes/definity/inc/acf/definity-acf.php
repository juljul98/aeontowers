<?php
/**
 * Defintiy Advanced Custom Fields
 *
 * @package Definity
 * @version 2.0
 */


if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/* --------------------------------------------------
	ACF - Portfolio
-------------------------------------------------- */

if ( function_exists( "register_field_group" ) ) {
	register_field_group(array (
		'id' => 'acf_portfolio',
		'title' => 'Portfolio',
		'fields' => array (
			array (
				'key' => 'field_5a41eec18dbaf',
				'label' => 'Subtitle',
				'name' => 'subtitle',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => 'Enter a optional subtitle for the portfolio item',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5a71a87064426',
				'label' => 'Open in Lightbox',
				'name' => 'lightbox_on',
				'type' => 'radio',
				'instructions' => 'Chose between opening the portfolio item as an regular link or opening it as a popup (lightbox).',
				'choices' => array (
					'Regular Link' => 'Regular Link',
					'Lightbox' => 'Lightbox',
					'Lightbox Video' => 'Lightbox Video',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'Regular Link',
				'layout' => 'horizontal',
			),
			array (
				'key' => 'field_5a71b5e5c4390',
				'label' => 'Video URL',
				'name' => 'video_url',
				'type' => 'text',
				'instructions' => 'Open popup(lightbox) with a YouTube video.',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5a71a87064426',
							'operator' => '==',
							'value' => 'Lightbox Video',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'placeholder' => 'Paste link here to a YouTube video',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'portfolio',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
