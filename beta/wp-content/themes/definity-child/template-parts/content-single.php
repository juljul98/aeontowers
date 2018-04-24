<?php
/**
 * Template part for single post.
 *
 * @package Definity
 * @version 1.0
 */


if ( defined( 'DEFINITY_ELEMENTS' ) ) {
	global $definity_options;
	$cat_show = $definity_options['cat_option'];
	$tags_show = $definity_options['tags_option'];
	$show_bio = $definity_options['author_bio'];
	$post_nav_show = $definity_options['single_posts_nav'];
	$social_links_show = $definity_options['social_links_single_post_check'];
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-12 blog-post-single' ); ?>>
	
	<?php 
	// Post Thumbnial
	definity_post_thumbnail(); 
	
	// Post Title
	the_title( '<h1 class="post-title">', '</h1>' );

	// Post Meta
	definity_post_meta(); ?>
		
	<div class="bp-content">
		<?php 
		// Post Content
		the_content();

		// Post pagination
		wp_link_pages( array(
		    'before' 		=> '<div class="post-pagination"><span class="post-pagination-title">' . esc_html__( 'Pages:', 'definity' ) . '</span>',
		    'after' 		=> '</div>',
		    'link_before'	=> '<span>',
		    'link_after'	=> '</span>'
		) );

		echo '<div class="post-meta-footer">';
		// Categories
		if ( ! defined( 'DEFINITY_ELEMENTS' ) || isset( $cat_show ) && $cat_show == true ) {
			$categories_list = get_the_category_list( ' / ' );
			if ( $categories_list ) {
				printf( '<div class="blog-post-categories"><span>' . esc_html__( 'Categories: ', 'definity' ) . '</span>' . $categories_list . '</div>');
			}
		}
		
		// Tags
		if ( ! defined( 'DEFINITY_ELEMENTS' ) || isset( $tags_show ) && $tags_show == true ) {
			if ( has_tag() ) {
				the_tags( '<div class="blog-post-tags"><span>' . esc_html__( 'Tags: ', 'definity' ) . '</span>', ' ', '</div>' );
			}
		}

		// Social Links
		if ( isset( $social_links_show ) && $social_links_show == true ) {
			echo '<div class="share-links-wrapper"><span>' . esc_html__( 'Follow Us: ', 'definity' ) . '</span>' . definity_get_social_profiles( 'blog-single-social-links' ) . '</div>';
		}
		echo '</div><!-- / .post-meta-footer -->';

		// Author Biography
		if ( ! defined( 'DEFINITY_ELEMENTS' ) && get_the_author_meta( 'description' ) || ( ( isset( $show_bio ) && $show_bio == true ) && '' !== get_the_author_meta( 'description' ) ) ) {
			get_template_part( 'template-parts/biography' );
		}

		// Post Nav.
		if ( ! defined( 'DEFINITY_ELEMENTS' ) || isset( $post_nav_show ) && $post_nav_show == true ) {
			the_post_navigation( array(
	            'prev_text'			 => '<span class="linea-arrows-slim-left"></span>' . esc_html__( ' previous post', 'definity' ),
	            'next_text'			 => esc_html__( 'next post ', 'definity' ) . '<span class="linea-arrows-slim-right"></span>',
	            'in_same_term'       => true,
	            'screen_reader_text' => esc_html__( 'Continue Reading', 'definity' ),
	        ) );
		}
		?>
	</div><!-- / .bp-content -->

</article><!-- / .blog-post -->