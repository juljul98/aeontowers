<?php 
/**
 * Custom Definity template tags
 *
 * @package Definity
 * @version 1.0
 */


/* --------------------------------------------------
	Displays an (optional) post thumbnail
-------------------------------------------------- */

if ( ! function_exists( 'definity_post_thumbnail' ) ) :

	function definity_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
		?>

		<div class="post-img">
			<?php the_post_thumbnail(); ?>
		</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-img" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
		</a>

		<?php endif; // End is_singular()
	}

endif;


/* --------------------------------------------------
	Displays the meta information for a post
-------------------------------------------------- */

if ( ! function_exists( 'definity_post_meta' ) ) :

	function definity_post_meta() { 
		// NOTE: function scope!
		if ( defined( 'DEFINITY_ELEMENTS' ) ) {
			global $definity_options;
			$post_author = $definity_options['d_post_author'];
			$post_comments = $definity_options['d_post_comments'];
			$post_date = $definity_options['d_post_date'];
			$post_sticky = $definity_options['d_post_sticky'];
			$blog_layout = $definity_options['d_blog_layout'];
		}

		if ( ! defined( 'DEFINITY_ELEMENTS' ) || ( ( isset( $post_date ) && $post_date == true ) || ( isset( $post_author ) && $post_author == true ) || ( isset( $post_comments ) && $post_comments == true ) ) ) : ?>
			<div class="post-meta">

				<?php if ( ! defined( 'DEFINITY_ELEMENTS' ) && is_sticky() || ( is_sticky() && isset( $post_sticky ) && $post_sticky == true ) ) : ?>
					<div class="post-sticky"><i class="fa fa-star-o"></i></div>
				<?php endif; 

				if ( ! defined( 'DEFINITY_ELEMENTS' ) || ( isset( $post_date ) && $post_date == true ) ) : ?>
					<div class="post-date">
						<i class="fa fa-calendar-o"></i>
						<span><?php the_time( get_option( 'date_format' ) ); ?></span>
					</div>
				<?php endif;

				if ( ! defined( 'DEFINITY_ELEMENTS' ) || is_single() || ( ( isset( $blog_layout ) && $blog_layout == 'classic-sb-right' || $blog_layout == 'classic-sb-left' ) && isset( $post_author ) && $post_author == true ) ) : ?>
				<div class="bypostauthor">
					<?php esc_html_e( 'By', 'definity' ); ?> <?php the_author_posts_link(); ?>		
				</div>
				<?php endif; 

					if ( ! defined( 'DEFINITY_ELEMENTS' ) && comments_open() || ( comments_open() && isset( $post_comments ) && $post_comments == true ) ) :
						comments_popup_link(
						    '', 
						    '<div class="post-comments"><i class="fa fa-comments-o"></i><span>1</span></div>', 
						    '<div class="post-comments"><i class="fa fa-comments-o"></i><span>%</span></div>'
						);
					endif;
				?>
			</div><!-- / .post-meta -->
		<?php endif;
	}
endif;


/* --------------------------------------------------
	Pagination
-------------------------------------------------- */

if ( ! function_exists( 'definity_posts_navigation' ) ) {
	function definity_posts_navigation() { 

		if ( is_archive() || is_search() ) {
			the_posts_navigation( array(
	            'prev_text'          => '<span class="linea-arrows-slim-left"></span>' . esc_html__( ' Previous Page', 'definity' ),
	            'next_text'          => esc_html__( 'Next Page ', 'definity' ) . '<span class="linea-arrows-slim-right"></span>',
	            'screen_reader_text' => esc_html__( 'Page navigation', 'definity' )
	        ) );
		} else {
			the_posts_navigation( array(
	            'prev_text'          => '<span class="linea-arrows-slim-left"></span>' . esc_html__( ' Older posts', 'definity' ),
	            'next_text'          => esc_html__( 'Newer posts ', 'definity' ) . '<span class="linea-arrows-slim-right"></span>',
	            'screen_reader_text' => esc_html__( 'Posts navigation', 'definity' )
	        ) );
		}
	}
}


/* --------------------------------------------------
	Social Media Profiles List (icons)
-------------------------------------------------- */

if ( ! function_exists( 'definity_get_social_profiles' ) ) {
	function definity_get_social_profiles( $wrapper_class = 'd-social-profiles-list' ) {
		global $definity_options;
		$footer_litle = $definity_options['footer_layout'] == 'footer-litle';
		
        $social_profiles_meta = array(
			'Facebook'		=> array( 'title' => 'Facebook', 'icon' => 'fa fa-facebook' ),
			'Twitter'		=> array( 'title' => 'Twitter', 'icon' => 'fa fa-twitter' ),
			'Linkedin'		=> array( 'title' => 'LinkedIn', 'icon' => 'fa fa-linkedin' ),
			'Pinterest'		=> array( 'title' => 'Pinterest', 'icon' => 'fa fa-pinterest' ),
			'Instagram'		=> array( 'title' => 'Instagram', 'icon' => 'fa fa-instagram' ),
			'Google-plus'   => array( 'title' => 'Google-plus', 'icon' => 'fa fa-google-plus' ),
            'Flickr'		=> array( 'title' => 'Flickr', 'icon' => 'fa fa-flickr' ),
            'YouTube'		=> array( 'title' => 'YouTube', 'icon' => 'fa fa-youtube' ),
            'Vimeo'	        => array( 'title' => 'Vimeo', 'icon' => 'fa fa-vimeo-square' ),
            'SoundCloud'    => array( 'title' => 'SoundCloud', 'icon' => 'fa fa-soundcloud' ),
            'Dribbble'		=> array( 'title' => 'Dribbble', 'icon' => 'fa fa-dribbble' ),
            'Behance'		=> array( 'title' => 'Behance', 'icon' => 'fa fa-behance' ),
            'Tumblr'	    => array( 'title' => 'Tumblr', 'icon' => 'fa fa-tumblr' ),
            'Snapchat'      => array( 'title' => 'Snapchat', 'icon' => 'fa fa-snapchat-ghost' ),
			'VK'			=> array( 'title' => 'VK', 'icon' => 'fa fa-vk' ),
			'Weibo'			=> array( 'title' => 'Weibo', 'icon' => 'fa fa-weibo' ),
			'RSS'	        => array( 'title' => 'RSS', 'icon' => 'fa fa-rss-square' )
		);
        
        $social_profiles = array();
        foreach( $definity_options['social_profiles'] as $slug => $url ) {
            if ( $url !== '' ) {
                $social_profiles[$slug] = array( 'title' => $social_profiles_meta[$slug]['title'], 'url' => $url, 'icon' => $social_profiles_meta[$slug]['icon'] );
            }
        }
        
        $output_icons = '';
    	foreach ( $social_profiles as $slug => $data ) {
    		$output_icons .= '<li><a href="' . esc_url( $data['url'] ) . '" class="' . esc_attr( strtolower( $data['title'] ) ) . '-social-link" target="_blank" title="' . esc_attr( $data['title'] ) . '"><i class="' . esc_attr( $data['icon'] ) . '"></i></a></li>';
        }
        return '<ul class="' . $wrapper_class . '">' . $output_icons . '</ul>';		
	}
}


/* --------------------------------------------------
	Social Media Profiles List (text/names)
-------------------------------------------------- */

if ( ! function_exists( 'definity_get_social_profile_names' ) ) {
	function definity_get_social_profile_names( $wrapper_class = 'd-social-profiles-list' ) {
		global $definity_options;
		$footer_litle = $definity_options['footer_layout'] == 'footer-litle';
		
        $social_profiles_meta = array(
			'Facebook'		=> array( 'title' => 'Facebook' ),
			'Twitter'		=> array( 'title' => 'Twitter' ),
			'Linkedin'		=> array( 'title' => 'LinkedIn' ),
			'Pinterest'		=> array( 'title' => 'Pinterest' ),
			'Instagram'		=> array( 'title' => 'Instagram' ),
			'Google-plus'   => array( 'title' => 'Google-plus' ),
            'Flickr'		=> array( 'title' => 'Flickr' ),
            'YouTube'		=> array( 'title' => 'YouTube' ),
            'Vimeo'	        => array( 'title' => 'Vimeo' ),
            'SoundCloud'    => array( 'title' => 'SoundCloud' ),
            'Dribbble'		=> array( 'title' => 'Dribbble' ),
            'Behance'		=> array( 'title' => 'Behance' ),
            'Tumblr'	    => array( 'title' => 'Tumblr' ),
            'Snapchat'      => array( 'title' => 'Snapchat' ),
			'VK'			=> array( 'title' => 'VK' ),
			'Weibo'			=> array( 'title' => 'Weibo' ),
			'RSS'	        => array( 'title' => 'RSS' )
		);
        
        $social_profiles = array();
        foreach( $definity_options['social_profiles'] as $slug => $url ) {
            if ( $url !== '' ) {
                $social_profiles[$slug] = array( 'title' => $social_profiles_meta[$slug]['title'], 'url' => $url );
            }
        }
        
        $output_names = '';
    	foreach ( $social_profiles as $slug => $data ) {
    		$output_names .= '<li><a href="' . esc_url( $data['url'] ) . '" class="' . esc_attr( strtolower( $data['title'] ) ) . '-social-link" target="_blank" title="' . esc_attr( $data['title'] ) . '">' . esc_attr( $data['title'] ) . '</a></li>';
        }
        return '<ul class="' . $wrapper_class . '">' . $output_names . '</ul>';
	}
}


/* --------------------------------------------------
	Breadcrumbs
-------------------------------------------------- */

if ( ! function_exists( 'definity_breadcrumbs' ) ) {
	function definity_breadcrumbs() {
	       
	    // Settings
	    $breadcrums_class   = 'col-md-6 text-right breadcrumb';
	    $home_title         = esc_html__( 'Home', 'definity' );
	    $breadcrums = '';
	      
	    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
	    $custom_taxonomy    = 'product_cat';
	       
	    // Get the query & post information
	    global $post,$wp_query;
	       
	    // Do not display on the homepage
	    if ( ! is_front_page() ) {
	       
	        // Build the breadcrums
	        $breadcrums .= '<ol class="' . esc_attr( $breadcrums_class ) . '">';
	           
	        // Home page
	        $breadcrums .= '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . esc_attr( $home_title ) . '">' . esc_attr( $home_title ) . '</a></li>';
	           
	        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
	              
	            $breadcrums .= '<li class="item-current item-archive">' . esc_html__( 'Archives', 'definity' ) . '</li>';
	              
	        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
	              
	            // If post is a custom post type
	            $post_type = get_post_type();
	              
	            // If it is a custom post type display name and link
	            if($post_type != 'post') {
	                  
	                $post_type_object = get_post_type_object($post_type);
	                $post_type_archive = get_post_type_archive_link($post_type);
	              
	                $breadcrums .= '<li class="item-cat item-custom-post-type-' . esc_attr( $post_type ) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr( $post_type ) . '" href="' . esc_url( $post_type_archive ) . '" title="' . esc_attr( $post_type_object->labels->name ) . '">' . esc_attr( $post_type_object->labels->name ) .  esc_html__( 'Archives', 'definity' ) . '</a></li>';
	            }
	              
	            $custom_tax_name = get_queried_object()->name;
	            $breadcrums .= '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
	              
	        } else if ( is_single() ) {
	              
	            // If post is a custom post type
	            $post_type = get_post_type();
	              
	            // If it is a custom post type display name and link
	            if($post_type != 'post') {
	                  
	                $post_type_object = get_post_type_object($post_type);
	                $post_type_archive = get_post_type_archive_link($post_type);
	              
	                $breadcrums .= '<li class="item-cat item-custom-post-type-' . esc_attr( $post_type ) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr( $post_type ) . '" href="' . esc_url( $post_type_archive ) . '" title="' . esc_attr( $post_type_object->labels->name ) . '">' . esc_attr( $post_type_object->labels->name ) . '</a></li>';
	                // echo '<li class="separator"> ' . $separator . ' </li>';
	              
	            }
	              
	            // Get post category info
	            $category = get_the_category();

	            if( !empty( $category ) ) {
	              
	                // Get last category post is in
	                $last_cat_array = array_values($category);
	                $last_category = end($last_cat_array);
	                  
	                // Get parent any categories and create array
	                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
	                $cat_parents = explode(',',$get_cat_parents);
	                  
	                // Loop through parent categories and store in variable $cat_display
	                $cat_display = '';
	                foreach($cat_parents as $parents) {
	                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
	                }
	             
	            }
	              
	            // If it's a custom post type within a custom taxonomy
	            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
	            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
	                   
	                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
	                $cat_id         = $taxonomy_terms[0]->term_id;
	                $cat_nicename   = $taxonomy_terms[0]->slug;
	                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
	                $cat_name       = $taxonomy_terms[0]->name;
	               
	            }
	              
	            // Check if the post is in a category
	            if(!empty($last_category)) {
	                $breadcrums .= $cat_display;
	                $breadcrums .= '<li class="item-current item-' . $post->ID . '">' . get_the_title() . '</li>';
	                  
	            // Else if post is in a custom taxonomy
	            } else if(!empty($cat_id)) {
	                  
	                $breadcrums .= '<li class="item-cat item-cat-' . esc_attr( $cat_id ) . ' item-cat-' . esc_attr( $cat_nicename ) . '"><a class="bread-cat bread-cat-' . esc_attr( $cat_id ) . ' bread-cat-' . esc_attr( $cat_nicename ) . '" href="' . esc_url( $cat_link ) . '" title="' . esc_attr( $cat_name ) . '">' . esc_attr( $cat_name ) . '</a></li>';

	                $breadcrums .= '<li class="item-current item-' . esc_attr( $post->ID ) . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
	              
	            } else {
	                  
	                $breadcrums .= '<li class="item-current item-' . esc_attr( $post->ID ) . '">' . get_the_title() . '</li>';
	                  
	            }
	              
	        } else if ( is_category() ) {
	               
	            // Category page
	            $breadcrums .= '<li class="item-current item-cat">' . single_cat_title('', false) . '</li>';
	               
	        } else if ( is_page() ) {
	               
	            // Standard page
	            if( $post->post_parent ){
	                   
	                // If child page, get parents 
	                $anc = get_post_ancestors( $post->ID );
	                   
	                // Get parents in the right order
	                $anc = array_reverse($anc);
	                   
	                // Parent page loop
	                if ( !isset( $parents ) ) $parents = null;
	                foreach ( $anc as $ancestor ) {
	                    $parents .= '<li class="item-parent item-parent-' . esc_attr( $ancestor ) . '"><a class="bread-parent bread-parent-' . esc_attr( $ancestor ) . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
	                    $parents .= '<li class="separator separator-' . esc_attr( $ancestor ) . '"> ' . esc_attr( $separator ) . ' </li>';
	                }
	                   
	                // Display parent pages
	                $breadcrums .= $parents;
	                   
	                // Current page
	                $breadcrums .= '<li class="item-current item-' . esc_attr( $post->ID ) . '"> ' . get_the_title() . '</li>';
	                   
	            } else {
	                   
	                // Just display current page if not parents
	                $breadcrums .= '<li class="item-current item-' . esc_attr( $post->ID ) . '"> ' . get_the_title() . '</li>';
	                   
	            }
	               
	        } elseif ( is_tag() ) {
	               
	            // Tag page
	               
	            // Get tag information
	            $term_id        = get_query_var('tag_id');
	            $taxonomy       = 'post_tag';
	            $args           = 'include=' . $term_id;
	            $terms          = get_terms( $taxonomy, $args );
	            $get_term_id    = $terms[0]->term_id;
	            $get_term_slug  = $terms[0]->slug;
	            $get_term_name  = $terms[0]->name;
	               
	            // Display the tag name
	            $breadcrums .= '<li class="item-current item-tag-' . esc_attr( $get_term_id ) . ' item-tag-' . esc_attr( $get_term_slug ) . '">' . esc_attr( $get_term_name ) . '</li>';
	           
	        } elseif ( is_day() ) {
	               
	            // Day archive
	            $breadcrums .= '<li class="item-current">' . get_the_date() . esc_html__( ' Archives', 'definity' ) . '</li>';
	               
	        } elseif ( is_month() ) {
	               
	            // Month Archive
	               $breadcrums .= '<li class="item-current">' . get_the_date() . esc_html__( ' Archives', 'definity' ) . '</li>';
	               
	        } elseif ( is_year() ) {
	              $breadcrums .= '<li class="item-current">' . get_the_date() . esc_html__( ' Archives', 'definity' ) . '</li>';
	               
	        } elseif ( is_author() ) {
	               
	            // Auhor archive
	               
	            // Get the author information
	            global $author;
	            $userdata = get_userdata( $author );
	               
	            // Display author name
	            $breadcrums .= '<li class="item-current item-current-' . esc_attr( $userdata->user_nicename ) . '">' . esc_html__( 'Author: ', 'definity' ) . esc_attr( $userdata->display_name ) . '</li>';
	           
	        } elseif ( get_query_var('paged') ) {
	               
	            // Paginated archives
	            $breadcrums .= '<li class="item-current item-current-' . get_query_var('paged') . '">'. esc_html__( 'Page', 'definity' ) . ' ' . get_query_var('paged') . '</strong></li>';
	               
	        } elseif ( is_search() ) {
	           
	            // Search results page
	            $breadcrums .= '<li class="item-current item-current-' . get_search_query() . '">'. esc_html__( 'Search results for: ', 'definity' ) . get_search_query() . '</li>';
	           
	        } elseif ( is_404() ) {
	               
	            // 404 page
	            $breadcrums .= '<li>' . esc_html__( 'Error 404', 'definity' ) . '</li>';
	        }
	       
	        $breadcrums .= '</ol>';
	        
	        return $breadcrums;
	           
	    }
	    
	}
}