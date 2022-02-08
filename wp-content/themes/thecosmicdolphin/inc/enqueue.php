<?php 

function google_preconnect(){
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">
		  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
}
add_action('wp_head', 'google_preconnect', 0);
function thecosmicdolphin_scripts() {

    wp_enqueue_style( 'Rajdhani-font', 'https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap', array(), _S_VERSION, 'all');
    wp_enqueue_style( 'Reckoner-font', get_template_directory_uri() . '/assets/fonts/reckoner.css', array(), _S_VERSION, 'all');


    wp_enqueue_style( 'swiper-slider-style', 'https://unpkg.com/swiper@7/swiper-bundle.min.css', array(), _S_VERSION, 'all' );

    wp_enqueue_style( 'thecosmicdolphin-style-main', get_template_directory_uri() . '/assets/css/style.min.css', array(), _S_VERSION, 'all');


    wp_enqueue_script('jquery');

	wp_enqueue_script( 'swiper-slider-script', 'https://unpkg.com/swiper@7/swiper-bundle.min.js', array(), _S_VERSION, 'all' );
	
	wp_enqueue_script( 'thecosmicdolphin-script', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'thecosmicdolphin_scripts' );