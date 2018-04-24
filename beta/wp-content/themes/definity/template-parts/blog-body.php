<?php
/**
 * The template part for displaying blog related pages
 *
 * @package Definity
 * @version 1.0
 */


if ( defined( 'DEFINITY_ELEMENTS' ) ) {
	global $definity_options;
	$blog_layout = $definity_options['d_blog_layout'];
	$sb_on = $definity_options['d_show_sb'];

	if ( 
		!empty( $blog_layout ) 	&& 
		$blog_layout == 'no-sb' || 
		$blog_layout == 'masonry-no-sb' ) 
	{
		$blog_col = '';
	} else {
		$blog_col = 'col-md-8 ';
	}

	if ( 
		$blog_layout == 'columns-sb-left' || 
		$blog_layout == 'classic-sb-left' ||
		$blog_layout == 'masonry-sb-left' ) 
	{
		$sb_offset = 'col-md-offset-1 ';
	} else {
		$sb_offset = '';
	}

	if (
	 	$blog_layout == 'columns-sb-left' 	|| 
	 	$blog_layout == 'columns-sb-right' 	|| 
	 	$blog_layout == 'no-sb' 			|| 
	 	$blog_layout == 'masonry-no-sb' 	|| 
		$blog_layout == 'masonry-sb-right' 	|| 
		$blog_layout == 'masonry-sb-left' 	) 
	{
		$is_masonry = ' blog-masonry';
	}

	$sb_left_show = '';
	switch ( $blog_layout ) {
		case 'classic-sb-left' 	:
		case 'columns-sb-left' 	:
		case 'masonry-sb-left' 	:
			$sb_left_show = true;
		break;
		case 'classic-sb-right' :
		case 'columns-sb-right' :
		case 'masonry-sb-right' :
			$sb_right_show = true;
		break;
	}
}
?>

<div class="container">
	<?php 
		// WP Utility
		if ( is_archive() ) get_template_part( 'template-parts/content', 'archive' );
		if ( is_search() ) get_template_part( 'template-parts/content', 'search' );
		?>

	<div class="row">

		<?php if ( isset( $sb_left_show ) && $sb_left_show == true ) get_sidebar(); ?>

		<div class="<?php 
			if ( ! isset( $blog_col ) ) echo 'col-md-8 '; else echo esc_attr( $blog_col ); 
			if ( isset( $sb_offset ) && is_active_sidebar( 'sidebar-blog' ) ) echo esc_attr( $sb_offset );  
			if ( isset( $is_masonry ) ) echo esc_attr( $is_masonry );
			if ( ( 	! is_active_sidebar( 'sidebar-blog' ) && isset( $blog_col ) && $blog_col == 'col-md-8 ' ) || 
					! is_active_sidebar( 'sidebar-blog' ) && ! defined( 'DEFINITY_ELEMENTS' ) ) echo ' col-md-offset-2'; 
		?> blog-columns">

			<?php if ( isset( $is_masonry ) && $is_masonry ) echo '<div class="blog-container">' ?>

			<?php if ( have_posts() ) : ?>

				<?php if ( is_home() && ! is_front_page() ) : ?>
					<div><h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1></div>
				<?php endif; ?>

				<?php
				// The loop.
				while ( have_posts() ) : the_post(); 

					get_template_part( 'template-parts/content' );

				endwhile;

				// If no content, include the "No posts found" template.
				else :
					get_template_part( 'template-parts/content', 'none' );

				endif;

			if ( isset( $is_masonry ) && $is_masonry ) echo '</div><!-- / .blog-container -->';
			// Previous/next page navigation.
			definity_posts_navigation();
		?>
		</div><!-- / .blog-columns -->
		
		<?php if ( ( isset( $sb_right_show ) && ( $sb_right_show == true ) ) || ! defined( 'DEFINITY_ELEMENTS' ) ) {
			get_sidebar(); 
		}
		?>
		
	</div><!-- / .row -->
</div><!-- / .container -->

<?php if ( isset( $sb_on ) && $sb_on == true ) get_sidebar(); ?>