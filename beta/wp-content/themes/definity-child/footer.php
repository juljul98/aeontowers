<?php
/**
 * The template for displaying the footer
 *
 * @package Definity
 * @version 1.0
 */
if ( defined( 'DEFINITY_ELEMENTS' ) ) {
	global $definity_options;
	$footer_copyright_txt = $definity_options['footer_copyright_txt'];
	$footer_totop_on = $definity_options['footer_totop_on'] == true;
	$footer_totop_txt = $definity_options['footer_totop_txt'];
	$footer_layout = $definity_options['footer_layout'];
	$footer_widgets = $definity_options['footer_layout'] == 'footer-widgets';
	$footer_litle = $definity_options['footer_layout'] == 'footer-litle';
}
?>
<section id="for_footer" class="ss-style-doublediagonal"></section>
<footer class="<?php if ( ! defined( 'DEFINITY_ELEMENTS' ) ) echo '';  if ( is_page() ) echo 'footer-page ';  if ( ! isset( $footer_layout ) ) echo 'footer-widgets'; else echo esc_attr( $footer_layout ); if ( ! is_active_sidebar( 'footer-widgets' ) ) echo ' no-footer'; ?>">
<?php if ( is_active_sidebar( 'footer-widgets' ) && ( ! isset( $footer_layout ) || $footer_widgets ) ) : ?>
	<div class="container">
		<div class="row footer-section">
			<?php dynamic_sidebar( 'footer-widgets' ); ?>
		</div>
	</div>
<?php elseif ( isset( $footer_litle ) && $footer_litle ) : ?>
	<div class="footer-social-links-wrapper">
	  <div class="container footer-social-links">
	    <div class="row">
	      <?php echo definity_get_social_profile_names(); ?>
	    </div>
	  </div>
	</div>
<?php endif; ?>
</footer>
<?php wp_footer(); ?>
</body>
</html>