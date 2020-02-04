<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Theme_Name
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/framework/addons/plugins/tgm.php';

add_action( 'tgmpa_register', 'theme_slug_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function theme_slug_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'=>'Classic Editor',
			'slug'=>'classic-editor',
			'required'=>true,
			'force_activation'=>true
		),
		array(
			'name'=>'Advanced Custom Fields',
			'slug'=>'advanced-custom-fields',
			'source'=>get_template_directory().'/framework/addons/plugins/archives/advanced-custom-fields-pro.zip',
			'required'=>true,
			'force_activation'=>true
		),
		array(
			'name'=>'ACF Stylizer',
			'slug'=>'acf-stylizer',
			'required'=>false,
			'force_activation'=>false
		),
		array(
			'name'=>'Advanced Custom Fields: Font Awesome',
			'slug'=>'advanced-custom-fields-font-awesome',
			'required'=>true,
			'force_activation'=>true
		),
		// array(
		// 	'name'=>'ACF Theme Code for Advanced Custom Fields',
		// 	'slug'=>'acf-theme-code',
		// 	'required'=>false,
		// 	'force_activation'=>false
		// ),
		// array(
		// 	'name'=>'Advanced Custom Fields: Link',
		// 	'slug'=>'acf-link',
		// 	'required'=>true,
		// 	'force_activation'=>true
		// ),
		array(
			'name'=>'ACF Tooltip',
			'slug'=>'acf-tooltip',
			'required'=>true,
			'force_activation'=>true
		),
		array(
			'name'=>'Breadcrumb NavXT',
			'slug'=>'breadcrumb-navxt',
			'required'=>false,
			'force_activation'=>false
		),
		array(
			'name'=>'TinyMCE Advanced',
			'slug'=>'tinymce-advanced',
			'required'=>true,
			'force_activation'=>false
		),
		array(
			'name'=>'Duplicate Page',
			'slug'=>'duplicate-page',
			'required'=>false,
			'force_activation'=>false
		),
		array(
			'name'=>'Contact Form 7',
			'slug'=>'contact-form-7',
			'required'=>true,
			'force_activation'=>true
		),
		array(
			'name'=>'Contact Form 7 Database Addon – CFDB7',
			'slug'=>'contact-form-cfdb7',
			'required'=>true,
			'force_activation'=>true
		),
		array(
			'name'=>'Contact Form 7 Honeypot',
			'slug'=>'contact-form-7-honeypot',
			'required'=>true,
			'force_activation'=>true
		),
		// array(
		// 	'name'=>'Contact Form 7 MailChimp Extension',
		// 	'slug'=>'contact-form-7-mailchimp-extension',
		// 	'required'=>false,
		// 	'force_activation'=>false
		// ),
		array(
			'name'=>'SVG Support',
			'slug'=>'svg-support',
			'required'=>true,
			'force_activation'=>false
		),
		// array(
		// 	'name'=>'WooCommerce',
		// 	'slug'=>'woocommerce',
		// 	'required'=>true,
		// 	'force_activation'=>true
		// ),
		array(
			'name'=>'Regenerate Thumbnails',
			'slug'=>'regenerate-thumbnails',
			'required'=>true,
			'force_activation'=>true
		),
		array(
			'name'=>'Yoast SEO',
			'slug'=>'wordpress-seo',
			'required'=>false,
			'force_activation'=>false
		),
		array(
			'name'=>'Admin Columns',
			'slug'=>'codepress-admin-columns',
			'required'=>false,
			'force_activation'=>false
		),
		array(
			'name'=>'Admin Menu Editor',
			'slug'=>'admin-menu-editor',
			'required'=>true,
			'force_activation'=>true
		),
		array(
			'name'=>'Base64 Images',
			'slug'=>'base64-images',
			'required'=>false,
			'force_activation'=>true
		),
		array(
			'name'=>'Smush – Compress, Optimize and Lazy Load Images',
			'slug'=>'wp-smushit',
			'required'=>false,
			'force_activation'=>true
		),
		// array(
		// 	'name'=>'WP Upload Size',
		// 	'slug'=>'wp-upload-size',
		// 	'required'=>false,
		// 	'force_activation'=>false
		// ),
		array(
			'name'=>'Autoptimize',
			'slug'=>'autoptimize',
			'required'=>false,
			'force_activation'=>false
		),
		array(
			'name'=>'WP Fastest Cache',
			'slug'=>'wp-fastest-cache',
			'required'=>false,
			'force_activation'=>false
		),
		array(
			'name'=>'iThemes Security (formerly Better WP Security)',
			'slug'=>'better-wp-security',
			'required'=>false,
			'force_activation'=>false
		),
		/*array(
			'name'=>'Easy Updates Manager',
			'slug'=>'stops-core-theme-and-plugin-updates',
			'required'=>true,
			'force_activation'=>true
		),*/
		array(
			'name'=>'BackUpWordPress',
			'slug'=>'backupwordpress',
			'required'=>false,
			'force_activation'=>false
		)
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'theme_slug',            // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'theme_slug' ),
			'menu_title'                      => __( 'Install Plugins', 'theme_slug' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'theme_slug' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'theme_slug' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'theme_slug' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'theme_slug'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'theme_slug'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'theme_slug'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'theme_slug'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'theme_slug'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'theme_slug'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'theme_slug'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'theme_slug'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'theme_slug'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'theme_slug' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'theme_slug' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'theme_slug' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'theme_slug' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme_slug. Please update the plugin.', 'theme' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'theme_slug' ),
			'dismiss'                         => __( 'Dismiss this notice', 'theme_slug' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'theme' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'theme_slug' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}
