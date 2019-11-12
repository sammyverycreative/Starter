<?php defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' );

# Register option pages
if( function_exists('acf_add_options_sub_page') ){
	acf_add_options_page(array(
		'page_title' => 'Theme Options',
		'menu_title' => 'General Options',
		'menu_slug'  => 'acf-options',
		'capability' => 'manage_options',
		//'icon_url'   => get_template_directory_uri() . '/images/vc-icon.png'
		'icon_url'   => 'dashicons-admin-generic'
	));
	/*acf_add_options_sub_page(array(
		'parent'     => 'acf-options',
		'title'      => 'General',
		'slug'       => 'acf-general',
		'capability' => 'manage_options'
	));
	acf_add_options_sub_page(array(
		'parent'     => 'acf-options',
		'title'      => 'Pages',
		'slug'       => 'acf-pages',
		'capability' => 'manage_options'
	));*/
}