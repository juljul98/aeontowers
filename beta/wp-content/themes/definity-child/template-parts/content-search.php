<?php
/**
 * The template part for displaying search queries.
 *
 * @package Definity
 * @version 1.0
 */
?>

<div class="col-md-12 search-header">
    <h1><?php wp_kses( printf( __( '%s Search Results for: %s', 'definity' ), $wp_query->found_posts, '</br><span>"' . get_search_query() . '"</span>' ), array( 'span' => array(), 'br' => array() ) ); ?></h1>
</div>