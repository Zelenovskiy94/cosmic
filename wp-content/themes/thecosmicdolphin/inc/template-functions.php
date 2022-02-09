<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package The_cosmic_dolphin
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function thecosmicdolphin_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'thecosmicdolphin_body_classes' );


function true_breadcrumbs(){
 
	$page_num = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
 
	$separator = '<span class="breadcrumbs__separator">// </span>'; 
 
	if( is_front_page() ){
 
		if( $page_num > 1 ) {
			echo '<a href="' . site_url() . '">control_panel:</a>';
		} else {
			echo 'You are on the home page';
		}
 
	} else { 
 
		echo '<a href="' . site_url() . '">control_panel:</a>' . $separator;
 
		if ( is_search()) {
			the_category( ', ' ); echo $separator; echo 'Search results';
		} elseif( is_single() ){ 
 
			the_category( ', ' ); echo $separator; the_title();
 
		} elseif ( is_page() ){ 
 
			the_title();
 
		}  elseif ( is_404() ) { 
 
			echo 'Error 404';
 
		} 
 
		if ( $page_num > 1 ) { 
			echo ' (' . $page_num . ')';
		}
 
	}
}


