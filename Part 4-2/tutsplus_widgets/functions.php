<?php
	
/************************************************************
function enqueue_parent_stylesheet() - enqueues the stylesheet from the parent theme
************************************************************/
function enqueue_parent_stylesheet() {
	
	wp_enqueue_style( 'parent', get_template_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_stylesheet' );


/************************************************************
function tutsplus_add_widget_areas() - adds a widget area to the theme
************************************************************/
tutsplus_add_widget_areas() {
	
	//before content
	register_sidebar( array (
		'name' => __( 'Before Content Widget Area', 'tutsplus' ),
		'id' => 'before-content-widget-area',
		'description' => __( 'Widget area before the content of each post', 'tutsplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'		
	));
	
	// after content
	register_sidebar( array (
		'name' => __( 'After Content Widget Area', 'tutsplus' ),
		'id' => 'after-content-widget-area',
		'description' => __( 'Widget area after the content of each post', 'tutsplus' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'		
	));

	
}
add_action( 'widgets_init', 'tutsplus_add_widget_areas', 20 );