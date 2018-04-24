<?php
/**
 * Template Name: Visual Composer
 *
 * @package Definity
 * @since 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	    <?php the_content(); ?>
	</div>

	<?php 
		endwhile;
		else :
	?>

	<div>
	    <h2><?php esc_html_e( 'Sorry, nothing to display.', 'definity' ); ?></h2>
	</div>

<?php endif; ?>

<?php 
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	} 
?>


<?php get_footer(); ?>
