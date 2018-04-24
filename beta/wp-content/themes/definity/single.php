<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package Definity
 * @version 1.0
 */

get_header(); 
get_template_part( 'template-parts/page-title' );

if ( defined( 'DEFINITY_ELEMENTS' ) ) {
	global $definity_options;
	$comments_show = $definity_options['comments_single'];
	$single_layout = $definity_options['single_post_layout'];

	if ( $single_layout == 'no-sb' ) {
		$single_col_offet = 'col-md-offset-2 ';
	} elseif ( $single_layout == 'sb-left') {
		$single_col_offet = 'col-md-offset-1 ';
	}
}
?>

<div class="container">
	<div class="row">
		
		<?php if ( isset( $single_layout ) && ( ! ( $single_layout == 'no-sb' ) && $single_layout == 'sb-left' ) ) get_sidebar(); ?>

		<div class="<?php if ( isset( $single_col_offet ) ) echo esc_attr( $single_col_offet ); if ( ! is_active_sidebar( 'sidebar-single-post' ) ) echo 'col-md-offset-2 '; ?>col-md-8 blog-classic">

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );

			// Comments (show them if there is at least 1 comment)
			if ( ! defined( 'DEFINITY_ELEMENTS' ) && ( comments_open() || get_comments_number() ) || ( isset( $comments_show ) && $comments_show == true && ( comments_open() || get_comments_number() ) ) ) {
				comments_template();
			}

			endwhile;
			?>
			
		</div><!-- / .blog-classic -->
		
		<?php if ( ( isset( $single_layout ) && ! ( $single_layout == 'no-sb' ) && $single_layout == 'sb-right' ) || ! defined( 'DEFINITY_ELEMENTS' ) ) get_sidebar( 'sidebar-single-post' ); ?>

	</div><!-- / .row -->
</div><!-- / .container -->

<?php get_footer(); ?>