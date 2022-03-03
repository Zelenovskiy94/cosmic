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

function get_theme_svg($key) {
    $svg = isset($GLOBALS['svgs'][$key]) ? $GLOBALS['svgs'][$key] : '';
    return $svg;
}


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
			
			global $post;
			$post_type = get_post_type($post->ID);
			if($post_type == 'product') {
				$product = get_product($post->ID);
				if(isset($product)) {
					if($product->get_type() === 'phone_type') {
						echo '<a href="' . get_permalink(36) . '">Products:</a>'; echo $separator; the_title();
					} else {
						the_category( ', ' ); echo $separator; the_title();
					}
				}
			} else {
				echo $separator; the_title();

			}
		
			
			
 
		} elseif ( is_home() ){ 
 
			single_post_title();
 
		}  elseif ( is_page() ){ 
 
			the_title();
 
		}  elseif ( is_404() ) { 
 
			echo 'Error 404';
 
		} 
 
		if ( $page_num > 1 ) { 
			echo ' (' . $page_num . ')';
		}
 
	}
}


if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 331, 191, true ); // default Post Thumbnail dimensions (cropped)
}



//filter posts

add_action( 'wp_ajax_filter_post_category', 'posts_filter_by_category_function' ); 
add_action( 'wp_ajax_nopriv_filter_post_category', 'posts_filter_by_category_function' );
 
function posts_filter_by_category_function(){
	
 
	if( isset( $_POST[ 'categoryfilter' ] )) {
		if($_POST[ 'categoryfilter' ] == 'all') {
			$args = array(
				'orderby' => 'date', 
				'order'	=> 'DESC' 
			);
		} else {
			$args[ 'tax_query' ] = array(
				array(
					'taxonomy' => 'category',
					'field' => 'id',
					'terms' => $_POST[ 'categoryfilter' ]
				)
			);
		}
	
	}
 
	query_posts( $args );
 
	if ( have_posts() ) {
      		while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'blog');
		endwhile;
	} else {
		echo 'Posts not found';
	}
 
	die();
}

register_nav_menus(array(
	'main_menu'    => 'Main menu', 
	"languages_menu"    => 'Languages'   
));
add_action('languages_menu', function(){
    wp_nav_menu( array(
		'menu_class'=>'menu-language',
        'theme_location'=>'languages_menu', 
    ) );
});
add_action('main_menu', function(){
    wp_nav_menu( array(
        'theme_location'=>'main_menu', 
    ) );
});
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );
function my_wp_nav_menu_args( $args='' ){
	$args['container'] = '';
	return $args;
}
// add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

// function special_nav_class ($classes, $item) {
//   if (in_array('current-menu-item', $classes) ){
//     $classes[] = 'active ';
//   }
//   return $classes;
// }