<?php
/**
 * The template part for displaying archived posts.
 *
 * @package Definity
 * @version 1.0
 */
?>

<div class="col-md-12 archive-header">
    <?php if ( is_archive() ) : ?>
        <h1>
            <?php
                if ( is_day() ) {
                    printf( esc_html__( 'Daily Archives %s', 'definity' ), '<br/><span>' . get_the_date() . '</span>' );
                } elseif ( is_month() ) {
                    printf( esc_html__( 'Monthly Archives %s', 'definity' ), '<br/><span>' . get_the_date( 'F Y' ) . '</span>' );
                } elseif ( is_year() ) {
                    printf( esc_html__( 'Yearly Archives %s', 'definity' ), '<br/><span>' . get_the_date( 'Y' ) . '</span>' );
                } elseif ( is_tag() ) {
                    single_tag_title( '<span>' . esc_html__( 'Tag: ', 'definity' ) . '</span>' );
                } elseif ( is_category() ) {
                    single_cat_title( '<span>' . esc_html__( 'Category: ', 'definity' ) . '</span>' );
                } elseif ( is_author() ) {
                    printf( esc_html__( 'Posts by: %s', 'definity' ), '<br/><span>' . get_the_author() . '</span>' );
                } else {
                    printf( esc_html__( 'Archives', 'definity' ) );
                }
            ?>
        </h1>
	<?php endif; ?>
</div>