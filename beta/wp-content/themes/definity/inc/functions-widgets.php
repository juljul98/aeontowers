<?php 
/**
 * Register (sidebar) widget areas.
 *
 * @package Definity
 * @version 1.0
 */
function definity_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'definity' ),
		'id'            => 'sidebar-blog',
		'description'   => esc_html__( 'Add widgets here.', 'definity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="header-widget widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Horizontal', 'definity' ),
		'id'            => 'sidebar-horizontal',
		'description'   => esc_html__( 'Add widgets here. Optional horizontal sidebar, it will show only on 3 columns blog layouts.', 'definity' ),
		'before_widget' => '<div id="%1$s" class="col-md-3 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="header-widget widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Single Post', 'definity' ),
		'id'            => 'sidebar-single-post',
		'description'   => esc_html__( 'Add widgets here, they will show in single blog post.', 'definity' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="header-widget widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'definity' ),
		'id'            => 'footer-widgets',
		'description'   => esc_html__( 'Add widgets here, they will show in footer (style 1).', 'definity' ),
		'before_widget' => '<div class="col-md-3 col-sm-6 mb-sm-100"><div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h5 class="header-widget widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'definity_widgets_init' );
