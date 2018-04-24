<?php
/**
 * The template part for displaying: Navigation Menu - Full Screen
 *
 * @package Definity
 * @version 2.0
 */


if ( defined( 'DEFINITY_ELEMENTS' ) ) {
	global $definity_options;
	$logo_url = $definity_options['header_nav_logo'];
	$logo_full_screen_url = $definity_options['logo_full_screen'];
	$navbar_grid_on = $definity_options['navbar_grid_on'];
	$nav_extend_show = $definity_options['nav_extend_show'];
	$navbar_search_on = $definity_options['navbar_search_on'];
	$nav_trans_on = $definity_options['nav_trans_on'];
	$nav_trans_options = $definity_options['nav_trans_options'];
	$sticky_nav_on = $definity_options['sticky_nav_on'];

	// Logo nav.
	if ( isset( $logo_url ) && strlen( $logo_url['url'] ) > 0 ) {
		$logo = ( is_ssl() ) ? str_replace( 'http://', 'https://', $logo_url['url'] ) : $logo_url['url'];
	} else {
		$logo = DEFINITY_URI . '/assets/images/logo.png';
	}

	// Logo Lagre (nav full screen - only)
	if ( isset( $logo_full_screen_url ) && strlen( $logo_full_screen_url['url'] ) > 0 ) {
		$logo_large = ( is_ssl() ) ? str_replace( 'http://', 'https://', $logo_full_screen_url['url'] ) : $logo_full_screen_url['url'];
	} else {
		$logo_large = DEFINITY_URI . '/assets/images/logo-2-large.png';
	}
}
?>


<nav class="d-nav-full d-nav-c-style <?php 
	if ( isset( $nav_trans_on ) && $nav_trans_on == true ) echo 'd-nav-trans'; 
	if ( isset( $nav_trans_on ) && $nav_trans_on == true ) echo ' d-nav-trans ';
	if ( isset( $nav_trans_options, $nav_trans_on ) && $nav_trans_options == true && $nav_trans_on == true && is_front_page() ) {
		echo 'd-nav-trans-front ';
	} elseif ( isset( $nav_trans_options, $nav_trans_on ) && $nav_trans_options == false && $nav_trans_on == true ) {
		echo ' d-nav-trans-all ';
	}
	if ( isset( $sticky_nav_on ) && $sticky_nav_on == true ) echo 'd-nav-sticky ';
	if ( isset( $nav_extend_show ) && $nav_extend_show == true ) echo 'd-has-nav-extended ';
?>">

	<?php if ( isset( $navbar_grid_on ) && $navbar_grid_on == true ) echo '<div class="d-nav-grid">'; ?>

		<div class="d-nav-wrapper <?php if ( isset( $navbar_grid_on ) && $navbar_grid_on == false ) echo 'd-nav-strech'; ?>">
			<!-- Logo -->
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="d-nav-logo">
				<img src="<?php if ( ! isset( $logo ) ) echo esc_url( DEFINITY_URI ) . '/assets/images/logo.png'; else echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
			</a>

			<!-- Hamburger Icon -->
			<button type="button" class="d-mobile-nav-open">
				<span class="sr-only"><?php echo esc_html__( 'Open navigation', 'definity') ?></span>
				<span class="linea-arrows-hamburger-2"></span>
			</button>
		</div><!-- / .d-nav-wrapper -->

	<?php if ( isset( $navbar_grid_on ) && $navbar_grid_on == true ) echo '</div>'; ?>

	<div id="navbar" class="full-screen-menu-wrapper">
		<div class="left-panel">
			<div class="centered-img-wrapper">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="d-nav-logo">
					<img src="<?php if ( ! isset( $logo_large ) ) echo esc_url( DEFINITY_URI ) . '/assets/images/logo-2-large.png'; else echo esc_url( $logo_large ); ?>" alt="<?php bloginfo( 'name' ); ?>">
				</a>
			</div>
		</div><!-- / .left-panel -->

		<div class="right-panel">

			<!-- Nav Menu -->
			<div class="d-nav-menu">

				<!-- X Icon -->
				<button type="button" class="d-mobile-nav-close">
					<span class="sr-only"><?php echo esc_html__( 'Close navigation', 'definity') ?></span>
					<span class="linea-arrows-remove"></span>
				</button>
				
				<div class="d-nav-menu-items-wrapper">
					<?php 
						// Navigation menu
						$args = array(
							'theme_location' 	=> 'main-menu',
							'menu'        		=> 'Main Menu',
							'menu_class'  		=> 'd-nav-menu-items-list',
							'container'   		=> false
							);

						wp_nav_menu( $args );

						// Search - Nav
						if ( isset( $navbar_search_on ) && $navbar_search_on == true ) {
							echo '<ul class="d-nav-menu-items-list d-nav-search">';
							get_template_part( 'template-parts/nav/searchform-nav' );
							echo '</ul>';
						}
					?>
				</div><!-- / .d-nav-menu-items-wrapper -->

				<?php get_template_part( 'template-parts/nav/mobile-menu-footer' ); ?>
			</div><!--/.d-nav-menu -->
		</div><!-- / .right-panel -->
	</div><!-- / .full-screen-menu-wrapper -->
</nav><!-- / .navbar -->