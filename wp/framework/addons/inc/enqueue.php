<?php defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' );

/**
 * Enqueue scripts and styles for front-end.
 */
function theme_styles() {
	# jQuery
	wp_enqueue_script( 'jquery' );

	# Fonts
	wp_enqueue_style('fontawesome_style', get_template_directory_uri().'/css/fontawesome-all.min.css');
	//wp_enqueue_style('font-open-sans_style', '//fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic|Montserrat|Roboto:400,900');
	wp_enqueue_style('fonts-style', get_template_directory_uri().'/fonts.css');

	# Stylesheets
	//wp_enqueue_style('stylesheet', get_template_directory_uri().'/style.css');
	//wp_enqueue_style('stylesheet', get_template_directory_uri().'/css/custom.css', false, date('dmYHisu'));
	
	# Other(s)
	wp_enqueue_style('iealert_style', get_template_directory_uri().'/css/iealert/style.css');

	/**

	*/

	# jQuery
	wp_enqueue_script('jquery_googleapis_script', '//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js');

	# Other(s)
	wp_register_script('modernizer_script', get_template_directory_uri().'/js/modernizr_2.8.3.js', '', '', false );
	wp_enqueue_script('modernizer_script', array('jquery'));

	wp_register_script('iealert_script', get_template_directory_uri().'/js/iealert.min.js', '', '', true );
	wp_enqueue_script('iealert_script', array('jquery'));

	# Main JavaScript File
	//wp_register_script('scripts', get_template_directory_uri().'/js/custom.js', '', date('YmdHGis'), false);
	//wp_enqueue_script('scripts', array('jquery'), true);
	wp_register_script('scripts', get_template_directory_uri().'/script.js', '', false, true );
	wp_enqueue_script('scripts', array('jquery'));

	# Loads our main stylesheet.
	wp_enqueue_style( 'website-style', get_stylesheet_uri(), false, date('dmYHisu') );

}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

add_filter('style_loader_tag', 'theme_styles_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'theme_styles_remove_type_attr', 10, 2);
function theme_styles_remove_type_attr($tag, $handle) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}