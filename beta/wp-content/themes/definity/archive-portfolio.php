<?php 
/**
 * The template for displaying all the portfolio items
 *
 * @package Definity
 * @version 2.0
 */
get_header();
get_template_part( 'template-parts/page-title-portfolio' );


if ( defined( 'DEFINITY_ELEMENTS' ) && defined( 'DEFINITY_PORTFOLIO' ) ) {
	global $definity_options;
	$pfolio_filters_on = $definity_options['pfolio_filters_on'];
	$pfolio_filter_all_txt = $definity_options['pfolio_filter_all_txt'];
	$pfolio_title_on = $definity_options['pfolio_title_on'];
	$pfolio_title_txt = $definity_options['pfolio_title_txt'];
	$pfolio_subtitle_txt = $definity_options['pfolio_subtitle_txt'];
}
?>
<div class="container">
	
	<?php 
		// Title & Subtitle
		if ( isset( $pfolio_title_on ) && $pfolio_title_on == true ) {
		echo '<div class="row pfolio-header-wrapper"><div class="col-md-12"><header class="sec-heading pfolio-header">';

			if ( isset( $pfolio_title_txt ) ) echo '<h2>' . $pfolio_title_txt . '</h2>';
			if ( isset( $pfolio_subtitle_txt ) ) echo '<span class="subheading">' . $pfolio_subtitle_txt . '</span>';

		echo '</header></div></div>';
		} 
	?>

	<div class="row mb-50">

		<?php 
			// Filters/Tags
			if ( isset( $pfolio_filters_on ) && $pfolio_filters_on == true ) {
				$terms = get_terms( array( 
				    'taxonomy' => 'filters',
				    'parent'   => 0
				) );

				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
					echo '<ul id="pfolio-cpt-filters" class="portfolio-filters">';
						echo '<li class="active"><a href="#" data-filter="*">';
							if ( isset( $pfolio_filter_all_txt ) ) echo esc_attr( $pfolio_filter_all_txt );
						echo '</a></li>';
					    foreach ( $terms as $term ) {
					        echo '<li><a href="#" data-filter=".filters-' . $term->name . '">' . $term->name . '</a></li>';
					    }
				    echo '</ul>';
				}
			}
		 ?>

		<div id="pfolio-cpt" class="portfolio-columns-fw">
			
		<?php	
			$args = array(
                'post_type' 	 => 'portfolio',
                'posts_per_page' => -1

            );
            $the_query = new WP_Query( $args );

		 	if ( have_posts() ) : 
			// The loop.
			while ( $the_query->have_posts() ) : $the_query->the_post();
		?>
				
			<div <?php post_class( 'pfolio-cpt-item portfolio-simple hover-simple col-md-4' ); ?>>
			    <figure>
			        <div class="img-wrapper">
			            <?php definity_post_thumbnail(); ?>
			        </div>
			        <figcaption>
			            <h5 class="p-title"><?php the_title(); ?></h5>
			            <p class="p-subtitle"><?php the_field( 'subtitle' ); ?></p>
			        </figcaption>
			    </figure>
			</div>
				
			<?php	
				endwhile;

				// If no content, include the "No posts found" template.
				else :
					get_template_part( 'template-parts/content', 'none' );

				endif;
			?>

		</div><!-- / .portfolio-columns-fw -->
	</div><!-- / .row -->
</div><!-- / .container -->

		
<?php 
// get_template_part( 'template-parts/blog-body' );
get_footer(); ?>
