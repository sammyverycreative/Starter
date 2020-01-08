<?php defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' );

/**
 * This is required for $_SESSION variables to work.
 */
session_start();

define('THEME_TEXT_DOMAIN', 'theme_slug');

/**
 * FRAMEWORK
 */
include_once( get_template_directory() . '/framework/init.php');
require_once 'framework/framework.php';

/**
 * THEME
 */
$theme = new Theme();

//$theme->enableDebug();
$theme->setAjax(true);
$theme->setHideAdminBar(false);
$theme->customThumbnailSize(1400,475,true);
$theme->setTodo(true);
$theme->setWoocommerce(false);
$theme->setAutoHomepage(false);
//$theme->setSidebar('Sidebar');

/**
* Images Sizes
*/
$theme->imageSize('landscape', 1920, 1080, true);
$theme->imageSize('portrait', 1080, 1920, true);

/**
 * ENQUEUE
 */
 $plugins = new Enqueue();
 $plugins->addJS('modernizr_2.8.3');
 $plugins->init();

/**
* ACF Pages
*/
$theme->addControlPage('General Options','Theme Options');
$theme->init();

/**
* Menus
*/
$headerMenu = new Menu('header_menu','Header Menu', array('container'=> ''));
$footerMenu = new Menu('footer_menu', 'Footer Menu', array('container' => ''));
$mobileMenu = new Menu('mobile_menu', 'Mobile Menu', array('container' => ''));