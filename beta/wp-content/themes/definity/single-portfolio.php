<?php
/**
 * The template for displaying all single portfolio posts and attachments
 *
 * @package Definity
 * @version 2.0
 */

get_header(); 

	// Start the loop.
	while ( have_posts() ) : the_post();

	// Include the single post content template.
	get_template_part( 'template-parts/content', 'portfolio' );

	?>

	<div class="portfolio-nav">
		<div class="container">
			<div class="row">
				
				<nav>
					<div class="prev"><?php previous_post_link( $format = '%link', $link = '<span class="nav-icon linea-arrows-slim-left"></span> %title' ); ?></div>

					<div class="all"><a href="<?php echo get_post_type_archive_link( 'portfolio' ); ?>"><span class="nav-icon linea-arrows-squares"></span></a></div>

					<div class="next"><?php next_post_link( $format = '%link', $link = '%title <span class="nav-icon linea-arrows-slim-right"></span>' ); ?></div>
				</nav>

			</div>
		</div>
	</div><!-- / .portfolio-nav -->

	<?php endwhile; ?>



<?php get_footer(); ?>