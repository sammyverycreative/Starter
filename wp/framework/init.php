<?php defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' );

# General (theme setup, enqueue css/js, hide admin bar)
require_once TEMPLATEPATH . '/framework/addons/inc/general.php';
//require_once TEMPLATEPATH . '/framework/addons/inc/enqueue.php';
require_once TEMPLATEPATH . '/framework/addons/inc/post-types.php';
require_once TEMPLATEPATH . '/framework/addons/inc/widgets.php';
require_once TEMPLATEPATH . '/framework/addons/inc/shortcodes.php';
require_once TEMPLATEPATH . '/framework/helpers/components/util.php';

# Addons
require_once TEMPLATEPATH . '/controllers/Enqueue.php';
require_once TEMPLATEPATH . '/controllers/Repeater.php';
require_once TEMPLATEPATH . '/controllers/Gallery.php';
//require_once TEMPLATEPATH . '/controllers/Header.php';
require_once TEMPLATEPATH . '/controllers/Image.php';
require_once TEMPLATEPATH . '/controllers/Menu.php';
//require_once TEMPLATEPATH . '/controllers/Scorpio.php';
require_once TEMPLATEPATH . '/controllers/Theme.php';

# Register navigation menus
//require_once TEMPLATEPATH . '/framework/addons/inc/navigation.php';

# Theme security
require_once TEMPLATEPATH . '/framework/addons/inc/security.php';

# Settings page
//require_once TEMPLATEPATH . '/framework/addons/inc/settings.php';

/**

*/

# TGM Plugin Activation
require_once dirname( __FILE__ ) . '/addons/plugins/config.php';