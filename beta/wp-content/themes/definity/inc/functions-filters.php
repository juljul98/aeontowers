<?php 
/**
 * Filters
 *
 * @package Definity
 * @version 1.2.1
 */


/* ----------------------------------------------------
	Replaces "[...]" with ... and a 'Read More' link
----------------------------------------------------- */

if ( ! function_exists( 'definity_excerpt_more' ) && ! is_admin() ) :

	function definity_excerpt_more() {
		if ( defined( 'DEFINITY_ELEMENTS' ) ) {
			global $definity_options;
			$read_more_btn = $definity_options['d_post_read_more_btn'];
		}
		if ( ! isset( $read_more_btn ) ) {
			$link = sprintf( '<p><a href="%1$s" class="read-more-btn btn btn-small">%2$s</a></p>',
				esc_url( get_permalink( get_the_ID() ) ),
				sprintf( esc_html__( 'Read More', 'definity' ) . '<span class="screen-reader-text">%s</span>', get_the_title( get_the_ID() ) )
				
			);
		} else {
			$link = sprintf( '<p><a href="%1$s" class="read-more-btn btn btn-small">%2$s</a></p>',
				esc_url( get_permalink( get_the_ID() ) ),
				sprintf( esc_html__( '%2$s', 'definity' ) . '<span class="screen-reader-text">%1$s</span>', get_the_title( get_the_ID() ), $read_more_btn )
				
			);
		}
		return ' &hellip; ' . $link;
	}
	add_filter( 'excerpt_more', 'definity_excerpt_more' );

endif;


/* --------------------------------------------------
	Change the excerpt lenght
-------------------------------------------------- */

function definity_excerpt_length( $length ) {
	return 22;
}
add_filter( 'excerpt_length', 'definity_excerpt_length', 999 );


/* --------------------------------------------------
	Allow shortcodes in excerpts
-------------------------------------------------- */

add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode');


/* --------------------------------------------------
	Visual Composer
-------------------------------------------------- */
// Filter to replace default css class names for vc_column shortcode
function definity_css_classes_for_vc_row_and_vc_column( $class_string, $tag ) {
  if ( $tag == 'vc_column' || $tag == 'vc_column_inner' ) {
    $class_string = preg_replace( '/vc_col-sm-(\d{1,2})/', 'vc_col-md-$1', $class_string ); // This will replace "vc_col-sm-%" with "vc_col-md-%"
  }
  return $class_string; // Important: you should always return modified or original $class_string
}
add_filter( 'vc_shortcodes_css_class', 'definity_css_classes_for_vc_row_and_vc_column', 10, 2 );