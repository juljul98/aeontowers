<?php

function definity_child_scripts() {
	

	if(is_front_page()) {
		wp_enqueue_script( 'custom_js', get_stylesheet_directory_uri() . '/assets/js/main.js',
	     array( 'jquery' ), '1.0', true );
				wp_enqueue_script( 'prism', get_stylesheet_directory_uri() . '/assets/js/prism.js',
	     array( 'jquery' ), '1.0', true );
		wp_enqueue_script( 'numscroll', get_stylesheet_directory_uri() . '/assets/js/numscroll.js',
	     array( 'jquery' ), '1.0', true );

		wp_enqueue_style( 'prism_child', get_stylesheet_directory_uri() . '/prism.css' );
	} 
	else if (is_page('commercial')) {
		wp_enqueue_script( 'commercial_js', get_stylesheet_directory_uri() . '/assets/js/commercial.js',
     	array( 'jquery' ), '1.0', true );
	} else if (!is_front_page()) {
		
     	wp_enqueue_script( 'sub_js', get_stylesheet_directory_uri() . '/assets/js/sub.js',
     	array( 'jquery' ), '1.0', true );
     	wp_enqueue_script( 'fancy_js', get_stylesheet_directory_uri() . '/assets/dist/js/fancy.js',
     	array( 'jquery' ), '1.0', true );
     	wp_enqueue_style( 'fancy_css', get_stylesheet_directory_uri() . '/assets/dist/css/fancy.css' );
	}
	wp_enqueue_script( 'common_child_js', get_stylesheet_directory_uri() . '/assets/js/common.js',
	     array( 'jquery' ), '1.0', true );

	wp_enqueue_style( 'definity_child_theme', get_stylesheet_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/custom.css' );

}
add_action( 'wp_enqueue_scripts', 'definity_child_scripts' );
/****** Add Thumbnails in Manage Posts/Pages List ******/
if ( !function_exists('AddThumbColumn') && function_exists('add_theme_support') ) {

// for post and page
add_theme_support('post-thumbnails', array( 'post', 'page' ) );

function AddThumbColumn($cols) {

$cols['thumbnail'] = __('Thumbnail');

return $cols;
}

function AddThumbValue($column_name, $post_id) {

$width = (int) 60;
$height = (int) 60;

if ( 'thumbnail' == $column_name ) {
// thumbnail of WP 2.9
$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
// image from gallery
$attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
if ($thumbnail_id)
$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
elseif ($attachments) {
foreach ( $attachments as $attachment_id => $attachment ) {
$thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
}
}
if ( isset($thumb) && $thumb ) {
echo $thumb;
} else {
echo __('None');
}
}
}

// for posts
add_filter( 'manage_posts_columns', 'AddThumbColumn' );
add_action( 'manage_posts_custom_column', 'AddThumbValue', 10, 2 );

// for pages
add_filter( 'manage_pages_columns', 'AddThumbColumn' );
add_action( 'manage_pages_custom_column', 'AddThumbValue', 10, 2 );
}
if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'single-post-medium', 515 );
    add_image_size( 'single-post-small', 250 );
}

add_filter( 'image_size_names_choose', 'my_custom_sizes' );

function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'single-post-medium' => __('Your Medium Size Name'),
        'single-post-small' => __('Your Small Size Name'),
    ) );
}
?>