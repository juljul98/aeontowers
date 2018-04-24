<?php 
/**
 * Template part for displaying the page title.
 *
 * @package Definity
 * @version 1.0
 */


if ( defined( 'DEFINITY_ELEMENTS' ) ) {
	global $definity_options;
	$bpt_size = $definity_options['bpt_size'];
	$bpt_parallax_on = $definity_options['bpt_parallax_on'];
	if ( $bpt_parallax_on == true ) $btp_parallax = 'data-stellar-background-ratio=0.4';

	$bpt_title = $definity_options['bpt_title'];
	$bpt_subtitle = $definity_options['bpt_subtitle'];
	$bpt_subtitle_on = $definity_options['bpt_subtitle_on'];
	$bpt_breadcrumbs_on = $definity_options['bpt_breadcrumbs_on'];

	$is_blog = is_home() || is_single() || is_archive() || is_tax() || is_category() || is_tag() || is_search();
}

if ( isset( $is_blog ) && $is_blog 		|| 
	! defined( 'DEFINITY_ELEMENTS' ) 	|| 
	is_page() && ! is_page_template( 'page-vc.php' ) ) : ?>
<header class="page-title bpt bpt-bg <?php if ( isset( $bpt_size ) ) echo esc_attr( $bpt_size ); elseif ( is_page() && ! is_page_template( 'page-vc.php' ) ) echo 'pt-small'; ?>" <?php if ( isset( $btp_parallax ) ) echo esc_attr( $btp_parallax ); ?>>
	<div class="bg-overlay">
		<div class="container">
			<div class="row">
				<div class="<?php if ( is_page() ) echo 'col-md-12'; else echo 'col-md-6'; ?>">
					<h1 class="bpt-title-color">
						<?php 
						if ( ! is_page() ) {
							if ( ! isset( $bpt_title ) ) {
								bloginfo( 'name' );
							} else {
								echo esc_attr( $bpt_title ); 
							}
						} else {
							wp_title( '' );
						}
							 ?>
					</h1>
					<?php 
						if ( ! isset( $bpt_subtitle_on ) && ! is_page() ) {
							echo '<span class="subheading">' . get_bloginfo( 'description' ) . '</span>';
						} elseif ( isset( $bpt_subtitle_on ) && $bpt_subtitle_on == true && ! is_page() ) {
							echo '<span class="subheading">' . esc_attr( $bpt_subtitle ) . '</span>';
						} ?>
				</div>
				<?php if ( isset( $bpt_breadcrumbs_on ) && $bpt_breadcrumbs_on == true && ! is_page() ) echo definity_breadcrumbs(); ?>
			</div>
		</div>
	</div>
</header>
<?php endif; ?>