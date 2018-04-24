<?php
/**
 * The template part for displaying an Author biography
 *
 * @package Definity
 * @version 1.0
 */
?>

<div class="author-description">

	<div class="ad-avatar">
		<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
	</div>

	<div class="ad-description">
		<?php echo the_author_meta( 'description' ); ?>
	</div>

	<div class="ad-name">
		<?php printf( esc_html__( 'Post By %s', 'definity' ), get_the_author_meta( 'display_name' ) ); ?>
	</div>

	<div class="ad-nickname">
		<?php echo get_the_author_meta( 'nickname' ); ?>
	</div>

</div><!-- / .author-description -->
