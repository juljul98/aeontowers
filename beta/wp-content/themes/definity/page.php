<?php
/**
 * The default template for displaying pages
 *
 * @package Definity
 * @since 1.0
 */

get_header();
get_template_part( 'template-parts/page-title' ); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12 page-default">
			
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

		</div>
	</div>
</div>


<?php get_footer(); ?>
