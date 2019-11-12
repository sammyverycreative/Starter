<?php defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' );

/**
 * Theme Setup
 */
// Ajax
/*function add_localize_script()  {
?>
<script type="text/javascript">
    var jsHomeUrl = '<?php echo home_url(); ?>';
    var ajaxUrl = "<?php echo admin_url( 'admin-ajax.php' ) ?>";
</script>
<?php
}
add_action('wp_head', 'add_localize_script', 999);*/

// WooCommerce
/*function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'woocommerce_support' );*/

/*function theme_setup() {
	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support('post-thumbnails'); // size name: post-thumbnail
	set_post_thumbnail_size(1400, 475, true);
}
add_action( 'after_setup_theme', 'theme_setup' );*/

// Tooltips
add_filter('acf/tooltip/fieldeditor', '__return_true');

// design
/*function acf_tooltip_style() {
    $style = 'qtip-acf';

    return $style;
}
add_filter('acf/tooltip/style', 'acf_tooltip_style');*/

// own design
/*function acf_tooltip_css() {
    $css_file = get_bloginfo('template_url') . '/qtip-own.css'; // if the file is saved in your themes folder

    return $css_file;
}
add_filter('acf/tooltip/css', 'acf_tooltip_css');*/

// tooltip position
/*function acf_tooltip_position_my() {
    $position_my = 'center left';

    return $position_my;
}
add_filter('acf/tooltip/position/my', 'acf_tooltip_position_my');*/

// icon position
/*function acf_tooltip_position_at() {
    $position_at = 'center right';

    return $position_at;
}
add_filter('acf/tooltip/position/at', 'acf_tooltip_position_at');*/

// specific class
function acf_tooltip_class() {
    $class = 'w-tooltip'; // edit this to your prefered class name

    return $class;
}
add_filter('acf/tooltip/class/only', 'acf_tooltip_class');

// exclude class
/*function acf_tooltip_class_exclude() {
    $class = 'wo-tooltip'; // edit this to your prefered class name

    return $class;
}
add_filter('acf/tooltip/class/exclude', 'acf_tooltip_class_exclude');*/