<?php
/**
 * The template part for displaying: Navigation Menu - Stacked Right
 *
 * @package Definity
 * @version 2.0
 */


if ( defined( 'DEFINITY_ELEMENTS' ) ) {
	global $definity_options;
	$logo_url = $definity_options['header_nav_logo'];
	$navbar_grid_on = $definity_options['navbar_grid_on'];
	$navbar_search_on = $definity_options['navbar_search_on'];
	$nav_stacked_social = $definity_options['nav_stacked_social'];
	$nav_dropdown_event = $definity_options['nav_dropdown_event'];

	if ( isset( $logo_url ) && strlen( $logo_url['url'] ) > 0 ) {
		$logo = ( is_ssl() ) ? str_replace( 'http://', 'https://', $logo_url['url'] ) : $logo_url['url'];
	} else {
		$logo = DEFINITY_URI . '/assets/images/logo-2.png';
	}
}
?>


<nav class="d-nav-stacked d-nav-stacked-right d-nav-c-style <?php if ( isset( $d_navbar_class ) ) echo esc_attr( $d_navbar_class ); ?>">
			
	<?php if ( isset( $navbar_grid_on ) && $navbar_grid_on == true ) echo '<div class="d-nav-grid">'; ?>
				
		<div class="d-nav-wrapper <?php if ( isset( $navbar_grid_on ) && $navbar_grid_on == false ) echo 'd-nav-strech'; ?>">

			<div class="d-nav-stacked-top">
				<!-- Hamburger Icon -->
				<button type="button" class="d-mobile-nav-open burger-mobile-only">
					<span class="sr-only"><?php echo esc_html__( 'Open navigation', 'definity') ?></span>
					<span class="linea-arrows-hamburger-2"></span>
				</button>

				<!-- Social Links -->
				<?php if ( isset( $nav_stacked_social ) && $nav_stacked_social == true ) echo '<div class="d-nav-social-links">' . definity_get_social_profiles() . '</div>'; ?>

				<!-- Logo -->
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="d-nav-logo">
					<img src="<?php if ( ! isset( $logo ) ) echo esc_url( DEFINITY_URI ) . '/assets/images/logo-2.png'; else echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
				</a>
			</div><!-- / .d-nav-stacked-top -->
			

			<!-- Nav Menu -->
			<div class="mobile-menu-wrapper overlay-bg-off">
				<div id="navbar" class="d-nav-menu <?php if ( isset( $nav_dropdown_event ) && $nav_dropdown_event == true ) echo 'd-nav-sub-on-click'; else echo 'd-nav-sub-on-hover'; ?>">

					<!-- X Icon -->
					<button type="button" class="d-mobile-nav-close">
						<span class="sr-only"><?php echo esc_html__( 'Close navigation', 'definity') ?></span>
						<span class="linea-arrows-remove"></span>
					</button>

					<div class="d-nav-menu-items-wrapper">
						<?php 
							// Search - Nav
							if ( isset( $navbar_search_on ) && $navbar_search_on == true ) {
								echo '<ul class="d-nav-search">';
								get_template_part( 'template-parts/nav/searchform-nav' );
								echo '</ul>';
							}

							// Navigation menu
							$args = array(
								'theme_location' 	=> 'main-menu',
								'menu'        		=> 'Main Menu',
								'menu_class'  		=> 'd-nav-menu-items-list',
								'container'   		=> false
								);

							wp_nav_menu( $args );
						?>
					</div><!-- / .d-nav-menu-items-wrapper -->

					<?php get_template_part( 'template-parts/nav/mobile-menu-footer' ); ?>
					
				</div><!--/.d-nav-menu -->
			</div><!-- / .mobile-menu-wrapper -->
									
		</div><!-- / .d-nav-wrapper -->

	<?php if ( isset( $navbar_grid_on ) && $navbar_grid_on == true ) echo '</div>'; ?>
</nav><!-- / .navbar -->