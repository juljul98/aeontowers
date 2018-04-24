<?php 
/**
 * Template part for displaying the portfolio page title.
 *
 * @package Definity
 * @version 2.0
 */


if ( defined( 'DEFINITY_ELEMENTS' ) && defined( 'DEFINITY_PORTFOLIO' ) ) {
	global $definity_options;
	$pfolio_pt_size = $definity_options['pfolio_pt_size'];
	$pfolio_pt_parallax_on = $definity_options['pfolio_pt_parallax_on'];
	if ( $pfolio_pt_parallax_on == true ) $pfolio_pt_parallax = 'data-stellar-background-ratio=0.4';

	$pfolio_pt_title = $definity_options['pfolio_pt_title'];
	$pfolio_pt_subtitle = $definity_options['pfolio_pt_subtitle'];
	$pfolio_pt_subtitle_on = $definity_options['pfolio_pt_subtitle_on'];
	$pfolio_pt_breadcrumbs_on = $definity_options['pfolio_pt_breadcrumbs_on'];
}
?>


<header class="page-title pfolio-pt pfolio-pt-bg <?php if ( isset( $pfolio_pt_size ) ) echo esc_attr( $pfolio_pt_size ); elseif ( is_page() && ! is_page_template( 'page-vc.php' ) ) echo 'pt-small'; ?>" <?php if ( isset( $pfolio_pt_parallax ) ) echo esc_attr( $pfolio_pt_parallax ); ?>>
	<div class="bg-overlay">
		<div class="container">
			<div class="row">

				<div class="<?php if ( isset( $pfolio_pt_breadcrumbs_on ) && $pfolio_pt_breadcrumbs_on == false ) echo 'col-md-12'; else echo 'col-md-6'; ?>">
					<h1 class="pfolio-pt-title-color">
						<?php 
							if ( ! isset( $pfolio_pt_title ) ) {
								$pt = get_post_type( get_the_ID() );
								echo $pt;
							} else {
								echo esc_attr( $pfolio_pt_title );
							}
						?>
					</h1>
					<?php 
						if ( ( isset( $pfolio_pt_subtitle_on ) && $pfolio_pt_subtitle_on == true ) && ( isset( $pfolio_pt_size ) && $pfolio_pt_size !== 'pt-small' ) ) {
							echo '<h3 class="pfolio-pt-subtitle">' . esc_attr( $pfolio_pt_subtitle ) . '</h3>';
						} 
					?>
				</div>
				
				<?php if ( isset( $pfolio_pt_breadcrumbs_on ) && $pfolio_pt_breadcrumbs_on == true ) : ?>
				<ol class="col-md-6 text-right breadcrumb">
					<li class="item-home"><a class="bread-link bread-home" href="//localhost:3000" title="Home">Home</a></li>
					<li class="item-home item-current">
					<?php 
						if ( ! isset( $pfolio_pt_title ) ) {
							$pt = get_post_type( get_the_ID() );
							echo $pt;
						} else {
							echo esc_attr( $pfolio_pt_title );
						} 
					?>
					</li>
				</ol>
				<?php endif; ?>

			</div>
		</div>
	</div>
</header>