<?php defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' ); 

/**
 * Disable the emoji's.
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Disable XML-RPC.
 */
add_filter( 'xmlrpc_methods', function( $methods ) {
   unset( $methods['pingback.ping'] );
   unset($methods['wp.getUsersBlogs']);
   return $methods;
} );
add_filter('xmlrpc_enabled','__return_false');

function remove_x_pingback($headers) {
    unset($headers['X-Pingback']);
    return $headers;
}
add_filter('wp_headers', 'remove_x_pingback');

/**
 * Hide admin bar for non admin users.
 */
/*global $current_user; 
get_currentuserinfo();
if ( ! user_can( $current_user, "manage_options" ) ) {
	show_admin_bar(false);
}*/

# Restrict Dashboard
/*add_action( 'init', 'blockusers_init' );
function blockusers_init() {
	if ( is_admin() && ! current_user_can( 'manage_options' ) && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
		wp_redirect( site_url() );
	exit;
	}
}*/

# Hide ACF
//add_filter('acf/settings/show_admin', '__return_false');

# Hide Plugins
/*add_filter( 'all_plugins', 'hide_plugins');
function hide_plugins($plugins)
{
		// Advanced Custom Fields PRO
		if(is_plugin_active('advanced-custom-fields-pro/acf.php')) {
				unset( $plugins['advanced-custom-fields-pro/acf.php'] );
		}
		// ACF Stylizer
		if(is_plugin_active('acf-stylizer/acf-stylizer.php')) {
				unset( $plugins['acf-stylizer/acf-stylizer.php'] );
		}
		// Advanced Custom Fields: Font Awesome
		if(is_plugin_active('advanced-custom-fields-font-awesome/acf-font-awesome.php')) {
				unset( $plugins['advanced-custom-fields-font-awesome/acf-font-awesome.php'] );
		}
		// ACF Theme Code for Advanced Custom Fields
		if(is_plugin_active('acf-theme-code/acf_theme_code.php')) {
				unset( $plugins['acf-theme-code/acf_theme_code.php'] );
		}
		// Advanced Custom Fields: Link
		if(is_plugin_active('acf-link/acf-link.php')) {
				unset( $plugins['acf-link/acf-link.php'] );
		}
		// ACF Tooltip
		if(is_plugin_active('acf-tooltip/acf-tooltip.php')) {
				unset( $plugins['acf-tooltip/acf-tooltip.php'] );
		}
		// Breadcrumb NavXT
		if(is_plugin_active('breadcrumb-navxt/breadcrumb-navxt.php')) {
				unset( $plugins['breadcrumb-navxt/breadcrumb-navxt.php'] );
		}
		// TinyMCE Advanced
		if(is_plugin_active('tinymce-advanced/tinymce-advanced.php')) {
				unset( $plugins['tinymce-advanced/tinymce-advanced.php'] );
		}
		// Contact Form 7
		if(is_plugin_active('contact-form-7/wp-contact-form-7.php')) {
				unset( $plugins['contact-form-7/wp-contact-form-7.php'] );
		}
		// Contact Form 7 Database Addon – CFDB7
		if(is_plugin_active('contact-form-cfdb7/contact-form-cfdb-7.php')) {
				unset( $plugins['contact-form-cfdb7/contact-form-cfdb-7.php'] );
		}
		// Contact Form 7 Honeypot
		if(is_plugin_active('contact-form-7-honeypot/honeypot.php')) {
				unset( $plugins['contact-form-7-honeypot/honeypot.php'] );
		}
		// Contact Form 7 MailChimp Extension
		if(is_plugin_active('contact-form-7-mailchimp-extension/cf7-mch-ext.php')) {
				unset( $plugins['contact-form-7-mailchimp-extension/cf7-mch-ext.php'] );
		}
		// SVG Support
		if(is_plugin_active('add-full-svg-support/add-full-svg-support.php')) {
				unset( $plugins['add-full-svg-support/add-full-svg-support.php'] );
		}
		// WooCommerce
		if(is_plugin_active('woocommerce/woocommerce.php')) {
				unset( $plugins['woocommerce/woocommerce.php'] );
		}
		// Regenerate Thumbnails
		if(is_plugin_active('regenerate-thumbnails/regenerate-thumbnails.php')) {
				unset( $plugins['regenerate-thumbnails/regenerate-thumbnails.php'] );
		}
		// Admin Columns
		if(is_plugin_active('codepress-admin-columns/codepress-admin-columns.php')) {
				unset( $plugins['codepress-admin-columns/codepress-admin-columns.php'] );
		}
		// Admin Menu Editor
		if(is_plugin_active('admin-menu-editor/menu-editor.php')) {
				unset( $plugins['admin-menu-editor/menu-editor.php'] );
		}
		// Easy Updates Manager
		if(is_plugin_active('stops-core-theme-and-plugin-updates/main.php')) {
				unset( $plugins['stops-core-theme-and-plugin-updates/main.php'] );
		}
		// BackUpWordPress
		if(is_plugin_active('backupwordpress/backupwordpress.php')) {
				unset( $plugins['backupwordpress/backupwordpress.php'] );
		}
		return $plugins;
}*/

# Hide Updates
/*
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );

function hide_update_notice_to_all_but_admin_users() 
{
    if (!current_user_can('update_core')) {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }
}
add_action( 'admin_head', 'hide_update_notice_to_all_but_admin_users', 1 );


function remove_core_updates() {
    global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');

//remove_action( 'load-update-core.php', 'wp_update_plugins' );
//add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );
//add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
*/

# Hide Editor
/*function hide_editor() {
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
	if ( !isset( $post_id ) ) return;

	$template_file = get_post_meta($post_id, '_wp_page_template', true);
    
    if ( $template_file == 'templates/page-home.php' ) {
    	remove_post_type_support('page', 'editor');
    }
}*/