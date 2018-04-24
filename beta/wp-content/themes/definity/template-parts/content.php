<?php
/**
 * Template part for displaying posts.
 *
 * @package Definity
 * @version 2.0
 */


if ( defined( 'DEFINITY_ELEMENTS' ) ) {
	global $definity_options;
	$blog_grid = $definity_options['d_blog_layout'];

	switch ( $blog_grid ) {
		case 'classic-sb-right' :
		case 'classic-sb-left' 	:
			$blog_col = 'col-md-12';
		break;
		case $blog_grid == 'columns-sb-right' :
		case $blog_grid == 'columns-sb-left'  :
		case $blog_grid == 'masonry-sb-right' :
		case $blog_grid == 'masonry-sb-left'  :
			$blog_col = 'col-lg-6';
		break;
		case $blog_grid == 'no-sb' 		   : 
		case $blog_grid == 'masonry-no-sb' :
			$blog_col = 'col-lg-4 col-md-6';
		break;
	}

	if ( 
		$blog_grid == 'no-sb' 				||
		$blog_grid == 'columns-sb-right' 	||
		$blog_grid == 'columns-sb-left'		||
		$blog_grid == 'masonry-no-sb' 		||
		$blog_grid == 'masonry-sb-right' 	||
		$blog_grid == 'masonry-sb-left' 	) 
	{
		$selector = ' blog-selector';
	}
}
?>

<div class="<?php if ( ! isset( $blog_col ) ) echo 'col-md-12'; else echo esc_attr( $blog_col ); if ( isset( $selector ) ) echo esc_attr( $selector ); if ( isset( $gird_col ) ) echo esc_attr( $gird_col ); ?>">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
		<?php 
		definity_post_thumbnail(); ?>
		<div class="bp-content">
			<?php
			definity_post_meta();
			the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

			if ( ! is_search() ) the_excerpt();
			?>
		</div>
	</article>
</div>