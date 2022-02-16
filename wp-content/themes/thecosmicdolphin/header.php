<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_cosmic_dolphin
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="modal_bg"></div>
<header id="header">
	<a href="<?php echo home_url()?>" class="header_logo">
		<img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.svg"/>
	</a>
	<button class="header-btn-menu button">
		Menu

	</button>
	<div class="nav-menu-container">
		<nav class="nav-menu">
			<ul>
				<li><a href="<?php echo get_permalink( 36 ) ?>">Products</a></li>
				<li><a href="<?php echo get_permalink( 16 ) ?>">Team & Company</a></li>
				<li><a href="#">Contact Us</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="#">Shop</a></li>
				<li><a href="<?php echo get_permalink( 59 ) ?>">History & Mithology</a></li>
				<li><a href="#">Community interactive</a></li>
				<li><a href="#">Legal</a></li>
			</ul>
		</nav>
	</div>
	
</header>
