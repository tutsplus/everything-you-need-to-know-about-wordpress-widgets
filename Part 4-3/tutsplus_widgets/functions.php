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
function tutsplus_add_widget_areas() {
	
	register_sidebar( array(
		'name' => __( 'Before Content Widget Area', 'tutsplus' ),
		'id' => 'before-content-widget-area',
		'description' => __( 'Widget area before the content or each post.', 'tutsplus' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name' => __( 'After Content Widget Area', 'tutsplus' ),
		'id' => 'after-content-widget-area',
		'description' => __( 'Widget area after the content of each post.', 'tutsplus' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'tutsplus_add_widget_areas', 20 );


/************************************************************
function tutsplus_before_content_widget_area() - adds the widget area to the single.php file
************************************************************/
tutsplus_before_content_widget_area() {
	
	if ( is_active_sidebar( 'before-content-widget-area' ) ) { ?>
		
		<aside class="before-content widget-area full-width">
			<?php dynamic_sidebar( 'before-content-widget-area' ); ?>
		</aside>	
		
	<?php }
	
}
add_action( 'colornews_before_body_content', 'tutsplus_before_content_widget_area' );

/************************************************************
function tutsplus_after_content_widget_area() - adds the widget area to the single.php file
************************************************************/
tutsplus_after_content_widget_area() {
	
	if ( is_active_sidebar( 'after-content-widget-area' ) ) { ?>
		
		<aside class="after-content widget-area full-width">
			<?php dynamic_sidebar( 'after-content-widget-area' ); ?>
		</aside>	
		
	<?php }
	
}
add_action( 'colornews_after_body_content', 'tutsplus_after_content_widget_area' );
