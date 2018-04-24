<?php 
/**
 * The template for the sidebar containing the main widget area
 *
 * @package Definity
 * @version 1.0
 */


if ( defined( 'DEFINITY_ELEMENTS' ) ) {
	global $definity_options;
	$blog_layout = $definity_options['d_blog_layout'];
	$single_layout = $definity_options['single_post_layout'];
	$vertical_sidebar = ! ( $blog_layout == 'no-sb' ) && ! ( $blog_layout == 'masonry-no-sb' );
	$horizontal_sidebar = $blog_layout == 'no-sb' || $blog_layout == 'masonry-no-sb';
	$single_sidebar = $single_layout == 'sb-right' || $single_layout == 'sb-left';

	$is_blog_posts = ( !is_single() || is_home()  || is_archive() || is_tax() || is_category() || is_tag() || is_search() );


	if ( 
		$blog_layout == 'columns-sb-left' ||
		$blog_layout == 'classic-sb-left' ||
		$blog_layout == 'masonry-sb-left' ||
		$single_layout == 'sb-left' 	  ) 
	{
		$sb_offset = '';
	} else {
		$sb_offset = 'col-md-offset-1 ';
	}
}

?>

<?php 
// Vertial Sidebar - 1/1 & 1/2 col. blog layouts
if ( is_active_sidebar( 'sidebar-blog' ) && ( isset( $is_blog_posts ) && isset( $vertical_sidebar ) && ( $is_blog_posts && $vertical_sidebar ) || ! defined( 'DEFINITY_ELEMENTS' ) && ! is_single() ) ) : ?>
	<aside id="secondary" class="<?php if ( ! isset( $sb_offset ) ) echo 'col-md-offset-1 '; else echo esc_attr( $sb_offset ); ?>col-md-3 sidebar">
		<?php dynamic_sidebar( 'sidebar-blog' ); ?>
	</aside>
<?php endif; ?>

<?php 
// Horizontal Sidebar - 1/3 col. blog layouts
if ( is_active_sidebar( 'sidebar-horizontal' ) && ( isset( $is_blog_posts ) && $is_blog_posts && $horizontal_sidebar ) ) : ?>
	<hr class="sb-x-sep">
	<aside id="secondary" class="container section sidebar sb-x">
		 <div class="row">
			<?php dynamic_sidebar( 'sidebar-horizontal' ); ?>
		</div>
	</aside>
<?php endif; ?>

<?php 
// Single Post Sidebar
if ( is_active_sidebar( 'sidebar-single-post' ) && ( ( is_single() && isset( $single_sidebar ) && $single_sidebar ) || ! defined( 'DEFINITY_ELEMENTS' ) && is_single() ) ) : ?>
	<aside id="secondary" class="<?php if ( ! isset( $sb_offset ) ) echo 'col-md-offset-1 '; elseif ( isset( $single_layout ) && $single_layout == 'sb-right' ) echo 'col-md-offset-1 '; else echo esc_attr( $sb_offset ); ?>col-md-3 sidebar">
		<?php dynamic_sidebar( 'sidebar-single-post' ); ?>
	</aside>
<?php endif; ?>