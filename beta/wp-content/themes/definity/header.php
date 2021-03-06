<?php
/**
 * The header
 *
 * @package Definity
 * @version 2.0
 */


if ( defined( 'DEFINITY_ELEMENTS' ) ) {
	global $definity_options;
	$favicon_url = $definity_options['header_favicon'];
	$perloader = $definity_options['d_perloader'];

	$nav_layout = $definity_options['nav_layout'];
	$sticky_nav_on = $definity_options['sticky_nav_on'];
	$nav_trans_on = $definity_options['nav_trans_on'];
	$navbar_search_on = $definity_options['navbar_search_on']; // <<< added separatly on every nav part
	$onepage_nav_on = $definity_options['onepage_nav_on'];

	// new
	$nav_extend_show = $definity_options['nav_extend_show'];
	$navbar_grid_on = $definity_options['navbar_grid_on'];


	$d_navbar_class = '';

	$d_html_class = '';
	if ( ! is_front_page() && ( $sticky_nav_on == true ) ) {
		$d_html_class .= ' navbar-sticky-page-offset';
	}

	// $op_navbar = '';
	// if ( $nav_layout == 'op-nav' ) {
	// 	$op_navbar = 'data-spy=scroll data-target=.navbar';
	// }

	$op_navbar = '';
	if ( isset( $onepage_nav_on ) && $onepage_nav_on == true ) {
		$op_navbar = 'data-spy=scroll data-target=.d-nav-c-style';
	}

	if ( isset( $favicon_url ) && strlen( $favicon_url['url'] ) > 0 ) {
		$favicon = ( is_ssl() ) ? str_replace( 'http://', 'https://', $favicon_url['url'] ) : $favicon_url['url'];
	} else {
		$favicon = DEFINITY_URI . '/favicon.ico';
	}
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		
		<?php if ( ! function_exists( 'wp_site_icon' ) ) : ?>
		<link rel="shortcut icon" href="<?php if ( ! isset( $favicon ) ) echo esc_url( DEFINITY_URI . '/favicon.ico' ); else echo esc_url( $favicon ); ?>">
		<?php endif; ?>
		

	<?php wp_head(); ?>
	</head>

	<body id="page-top" <?php body_class(); if ( isset( $op_navbar ) ) echo esc_attr( $op_navbar ); ?>>

	<?php if ( isset( $perloader ) && ( $perloader == true ) && ! is_404() ) : ?>
		<div class="preloader">
			<img src="<?php echo esc_url( DEFINITY_URI ); ?>/assets/images/loader.svg" alt="Loading...">
		</div>
	<?php endif; ?>
		

		<!-- ========== Navigation ========== -->

		<?php 
		// Extended Navbar Menu
		if ( isset( $nav_extend_show ) && $nav_extend_show == true ) get_template_part( 'template-parts/nav/nav-extended' );

		if ( isset( $nav_layout ) ) {

			switch ( $nav_layout ) {
				case 'nav-inline-right':
					get_template_part( 'template-parts/nav/nav-inline-right' );
					break;

				case 'nav-stacked-left':
					get_template_part( 'template-parts/nav/nav-stacked-left' );
					break;

				case 'nav-stacked-center':
					get_template_part( 'template-parts/nav/nav-stacked-center' );
					break;

				case 'nav-stacked-right':
					get_template_part( 'template-parts/nav/nav-stacked-right' );
					break;

				case 'nav-neue':
					get_template_part( 'template-parts/nav/nav-neue' );
					break;

				case 'nav-full-screen':
					get_template_part( 'template-parts/nav/nav-full-screen' );
					break;

				default:
					get_template_part( 'template-parts/nav/nav-inline-left' );
					break;

			}
		} else {
			get_template_part( 'template-parts/nav/nav-inline-left' );
		}
		
		?>