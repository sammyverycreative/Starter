<?php defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' );

# Register navigation menus
function register_navigation_menus() {
	register_nav_menu( 'header_menu', 'Header Menu' );
	register_nav_menu( 'footer_menu', 'Footer Menu' );
	register_nav_menu( 'mobile_menu', 'Mobile Menu' );
}
add_action( 'after_setup_theme', 'register_navigation_menus' );