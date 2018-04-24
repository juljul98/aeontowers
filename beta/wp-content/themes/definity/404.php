<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Definity
 * @since 1.0
 */

get_header(); ?>


	<!-- ========== 404 Page - (Not Found) ========== -->

	<div class="wrapper-404">
		<div class="content-wrapper container">

			<div class="row col-md-offset-2 col-md-8">
				<h1 class="lead-404"><?php esc_html_e( '404', 'definity' ); ?></h1>
				<span class="sep-404"></span>
				<p class="info-404"><?php esc_html_e( 'Oops... The page that you are looking for does not exist! Luckily enough we, have some pages that do exist', 'definity' ); ?></p>

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-light"><?php esc_html_e( 'Go Back Home', 'definity' ); ?></a>
			</div>

		</div>
	</div><!-- / .wrapper-404 -->