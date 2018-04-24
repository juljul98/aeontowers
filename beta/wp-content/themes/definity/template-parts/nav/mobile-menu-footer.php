<?php 
/**
 * Footer for the mobile menu.
 *
 * @package Definity
 * @version 2.0
 */


if ( defined( 'DEFINITY_ELEMENTS' ) ) {
	global $definity_options;
	$navbar_search_on = $definity_options['navbar_search_on'];
	$mobile_menu_footer_heading = $definity_options['mobile_menu_footer_heading'];
	$mobile_menu_footer_subheading = $definity_options['mobile_menu_footer_subheading'];
}
 ?>


 <div class="mobile-menu-footer">
 	<?php if ( defined( 'DEFINITY_ELEMENTS' ) ) echo definity_get_social_profiles( 'mm-social-icons' ); ?>
 	<span class="mm-footer-sep"></span>
 	 <?php 
 	 	if ( isset( $mobile_menu_footer_heading ) ) echo '<h6>' . esc_attr( $mobile_menu_footer_heading ) . '</h6>'; else echo '<h6>' . esc_html__( 'Definity', 'definity' ) . '</h6>';

 	 	if ( isset( $mobile_menu_footer_subheading ) ) echo '<p>' . esc_attr( $mobile_menu_footer_subheading ) . '</p>'; else echo '<p>' . esc_html__( 'Multi-Purpose WordPress Theme', 'definity' ) . '</p>';

 	 	if ( isset( $navbar_search_on ) && $navbar_search_on == true ) {
 	 		get_template_part( 'template-parts/nav/searchform-mobile-menu' );
 	 	} elseif ( ! isset( $navbar_search_on )  ) {
 	 		get_template_part( 'template-parts/nav/searchform-mobile-menu' );
 	 	}
 	 ?>
 </div><!-- / .mobile-menu-footer -->