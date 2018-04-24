<?php
/**
 * Definity enqueued scrips & styles.
 *
 * @package Definity
 * @version 2.0
 */


/* --------------------------------------------------
	Enqueue CSS
-------------------------------------------------- */

function definity_styles() {
	// Bootstrap CSS
	wp_enqueue_style( 'bootstrap', DEFINITY_URI . '/assets/css/vendor/bootstrap.min.css' );
	// Google Fonts
	wp_enqueue_style( 'definity-google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700|Open+Sans:300,400,600,700,800' );
	// Fontawesome CSS (v4.6.3 from VC)
	wp_enqueue_style( 'font-awesome', DEFINITY_URI . '/assets/fonts/fontawesome/css/font-awesome.min.css' );
	// Linea Font CSS
	wp_enqueue_style( 'linea-font', DEFINITY_URI . '/assets/fonts/linea-font/css/linea-font.css' );
	// ET Line Icons CSS
	wp_enqueue_style( 'et-lineicons', DEFINITY_URI . '/assets/fonts/et-lineicons/css/style.css' );
	// Crypto Icons CSS
	wp_enqueue_style( 'cryptocoins', DEFINITY_URI . '/assets/fonts/cryptocoins/cryptocoins.css' );
	// Slick Slider CSS
	wp_enqueue_style( 'slick', DEFINITY_URI . '/assets/css/vendor/slick.css' );
	// Animate CSS
	wp_enqueue_style( 'animate', DEFINITY_URI . '/assets/css/vendor/animate.css' );
	// Magnific Popup CSS
	wp_enqueue_style( 'magnific-popup', DEFINITY_URI . '/assets/css/vendor/magnific-popup.css' );
	// Main CSS
	wp_enqueue_style( 'definity_main', DEFINITY_URI . '/style.css' );
	// Responsive CSS
	wp_enqueue_style( 'definity_responsive', DEFINITY_URI . '/assets/css/responsive.css' );
}
add_action( 'wp_enqueue_scripts', 'definity_styles' );


/* --------------------------------------------------
	Enqueue JS
-------------------------------------------------- */

function definity_scripts() {
	// WP comment-reply js (popup reply cf)
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	// Jquery effects (easing)
	wp_enqueue_script( 'jquery-effects-core', array( 'jquery' ), '', true );
	// Bootstrap JS
	wp_enqueue_script( 'bootstrap', DEFINITY_URI . '/assets/js/vendor/bootstrap.min.js', array( 'jquery' ), 'v3.3.5', true );
	// Bootstrap Hover Dropdown JS
	wp_enqueue_script( 'bootstrap-hover-dropdown', DEFINITY_URI . '/assets/js/vendor/bootstrap-hover-dropdown.min.js', array( 'jquery', 'bootstrap_js' ), '', true );
	// Easing JS
	wp_enqueue_script( 'easing', DEFINITY_URI . '/assets/js/vendor/jquery.easing.js', array( 'jquery','jquery-effects-core' ), true );
	// Stellar JS
	wp_enqueue_script( 'stellar', DEFINITY_URI . '/assets/js/vendor/jquery.stellar.min.js', array( 'jquery' ), '', true );
	// Slick Slider JS
	wp_enqueue_script( 'slick', DEFINITY_URI . '/assets/js/vendor/slick.min.js', array( 'jquery' ), '', true );
	// Easy Pie Chart JS
	wp_enqueue_script( 'easypiechart', DEFINITY_URI . '/assets/js/vendor/jquery.easypiechart.min.js', array( 'jquery', 'jquery-effects-core', 'easing' ), '', true );
	// CountUp JS
	wp_enqueue_script( 'countup', DEFINITY_URI . '/assets/js/vendor/countup.min.js', array( 'jquery' ), '', true );
	// Isotope JS
	wp_enqueue_script( 'isotope', DEFINITY_URI . '/assets/js/vendor/isotope.min.js', array( 'jquery' ), '', true );
	// Magnific Popup JS
	wp_enqueue_script( 'magnific-popup', DEFINITY_URI . '/assets/js/vendor/jquery.magnific-popup.min.js', array( 'jquery' ), '', true );
	// Wow JS
	wp_enqueue_script( 'wow', DEFINITY_URI . '/assets/js/vendor/wow.min.js', array( 'jquery' ), '', true );
	// Packery JS
	wp_enqueue_script( 'packery', DEFINITY_URI . '/assets/js/vendor/packery-mode.pkgd.min.js', array( 'jquery' ), '', true );
	// Anim Dots JS
	wp_enqueue_script( 'anim-dots', DEFINITY_URI . '/assets/js/vendor/anim-dots.js', array( 'jquery' ), '', true );
	
	// MAIN JS
	wp_enqueue_script( 'definity_main', DEFINITY_URI . '/assets/js/main.js', array( 'jquery' ), 'v1.0', true );
}
add_action( 'wp_enqueue_scripts', 'definity_scripts' );


/* --------------------------------------------------
	Enqueue Admin CSS/JS
-------------------------------------------------- */

function definity_custom_admin() {
	wp_enqueue_style( 'definity_admin', DEFINITY_URI . '/assets/css/admin.css' );
}
add_action( 'admin_enqueue_scripts', 'definity_custom_admin' );

