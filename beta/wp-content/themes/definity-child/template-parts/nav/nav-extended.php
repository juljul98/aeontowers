<?php
/**
 * The template part for displaying an Extended Navbar Menu
 *
 * @package Definity
 * @version 2.0
 */


if ( defined( 'DEFINITY_ELEMENTS' ) ) {
	global $definity_options;
	$navbar_grid_on = $definity_options['navbar_grid_on'];
	$nav_layout = $definity_options['nav_layout'];
}
?>


<!-- Extended Navbar Menu -->
<div class="d-nav-extend d-nav-extend-c-style <?php if ( isset( $nav_layout ) && ( $nav_layout == 'nav-stacked-left' || $nav_layout == 'nav-stacked-right' ) ) echo 'd-nav-stacked-mod' ?>">
	
	<?php if ( isset( $navbar_grid_on ) && $navbar_grid_on == true ) echo '<div class="d-nav-grid">'; ?>
				
				<div class="d-nav-extend-wrapper <?php if ( isset( $navbar_grid_on ) && $navbar_grid_on == false ) echo 'd-nav-extend-strech'; ?>">
					<?php 
						wp_nav_menu( array(
							'theme_location'  => 'extended-menu-left',
							'menu'            => 'Extended Menu - Left',
							'menu_class'      => 'd-nav-extend-menu d-nav-extend-left',
							'container'   	  => false,
						) );

						wp_nav_menu( array(
							'theme_location'  => 'extended-menu-right',
							'menu'            => 'Extended Menu - Right',
							'menu_class'      => 'd-nav-extend-menu d-nav-extend-right',
							'container'   	  => false,
						) );
					 ?>
				</div><!-- / .d-nav-extend-wrapper -->
				
	<?php if ( isset( $navbar_grid_on ) && $navbar_grid_on == true ) echo '</div>'; ?>

</div><!-- / .d-nav-extend -->