<?php 
/**
 * Definity functions and definitions.
 *
 * @package Definity
 * @version 2.0
 */


 /* --------------------------------------------------
 	Constants & Globals
 -------------------------------------------------- */

 define( 'DEFINITY_THEME_DIR', get_template_directory() );
 define( 'DEFINITY_INC_DIR', get_template_directory() . '/inc' );
 define( 'DEFINITY_URI', get_template_directory_uri() );


 /* --------------------------------------------------
 	Theme Setup
 -------------------------------------------------- */

 if ( ! function_exists( 'definity_setup' ) ) :

 	function definity_setup() {

	 	// Make theme available for translation.
 		load_theme_textdomain( 'definity', DEFINITY_THEME_DIR . '/languages' );

 		// Add default posts and comments RSS feed links to head.
 		add_theme_support( 'automatic-feed-links' );

 		// Let WordPress manage the document title.
 		add_theme_support( 'title-tag' );

 		// Enable support for Post Thumbnails on posts and pages.
 		add_theme_support( 'post-thumbnails' );

 		// HTML5 gallery & caption (v3.9+)
 		add_theme_support( 'html5', array( 'gallery', 'caption' ) );

 		// Content Width
 		if ( ! isset( $content_width ) ) $content_width = 1170;

 		// Navigation Menus
 		register_nav_menus( array(
 			// main menu
			'main-menu' 	=> esc_html__( 'Main Menu', 'definity' ),
			// menu extended
			'extended-menu-left' 		=> esc_html__( 'Extended Menu - Left', 'definity' ),
			'extended-menu-right' 		=> esc_html__( 'Extended Menu - Right', 'definity' ),
			
		) );

		// Starter content to showcase the theme on new sites (customizer only)
		$starter_content = array(
			'nav_menus' => array(
				// Assign a menu to the "main-menu" location.
				'main-menu' => array(
					'name' => esc_html__( 'Main Menu', 'definity' ),
					'items' => array(
						'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
						'page_about',
						'page_blog',
						'page_contact',
					),
				)
			)
		);

		$starter_content = apply_filters( 'definity_starter_content', $starter_content );
		add_theme_support( 'starter-content', $starter_content );
 	}

 endif;
add_action( 'after_setup_theme', 'definity_setup' );


/* --------------------------------------------------
	Requires/Includes
-------------------------------------------------- */

// Templte Tags
require_once DEFINITY_INC_DIR . '/template-tags.php';

// Widgets
require_once DEFINITY_INC_DIR . '/functions-widgets.php';

// Enqueue scripts and styles
require_once DEFINITY_INC_DIR . '/functions-enqueued.php';

// Nav Walker
include DEFINITY_INC_DIR . '/definity_bootstrap_nav_menu.php';

// TGM plugin activation
if ( is_admin() ) {
	require_once( DEFINITY_INC_DIR . '/plugins/tgm/init.php' );
}

// Visual composer
if ( defined( 'WPB_VC_VERSION' ) && file_exists( DEFINITY_INC_DIR . '/plugins/js_composer.zip' ) ) {
    require_once( DEFINITY_INC_DIR . '/visual-composer/definity_vc.php' );
}

// ACF
if ( class_exists( 'acf' ) && defined( 'DEFINITY_PORTFOLIO' )  ) {
	include_once( DEFINITY_INC_DIR . '/acf/definity-acf.php' );
}

// Filters 
include_once DEFINITY_INC_DIR . '/functions-filters.php';