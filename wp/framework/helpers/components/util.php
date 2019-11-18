<?php
/**
 * Other FUNCTIONS
 */

// Public Folder
function public_dir()
{
    return get_template_directory_uri() . '/assets';
}

// Mime Types
function cc_mime_types( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

// Archive Title
function indexTitle()
{
    if (is_404() || is_category() || is_tag() || is_day() || is_month() || is_year() || is_search()) { ?>
        <?php /* If this is a category archive */
        if (is_category()) { ?>
            <?php single_cat_title(); ?>
            <?php /* If this is a tag archive */
        } elseif (is_tag()) { ?>
            <?php _e('Tag: ', THEME_TEXT_DOMAIN);
            single_tag_title(); ?>
            <?php /* If this is a daily archive */
        } elseif (is_day()) { ?>
            <?php the_time('F jS, Y');
            _e(' Archives ', THEME_TEXT_DOMAIN); ?>
            <?php /* If this is a monthly archive */
        } elseif (is_month()) { ?>
            <?php the_time('F, Y');
            _e(' Archives ', THEME_TEXT_DOMAIN); ?>
            <?php /* If this is a yearly archive */
        } elseif (is_year()) { ?>
            <?php the_time('Y');
            _e(' Archives ', THEME_TEXT_DOMAIN); ?>
            <?php /* If this is an author archive */
        } elseif (is_author()) {
            _e('Author Archive ', THEME_TEXT_DOMAIN); ?>
            <?php /* If this is a paged archive */
        } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
            _e('Blog Archives ', THEME_TEXT_DOMAIN); ?>
        <?php } elseif (is_search()) { ?>
            <?php _e('Results for: ', THEME_TEXT_DOMAIN);
            the_search_query() ?>
        <?php } ?>
    <?php } else { ?>
        <?php _e('Blog ', THEME_TEXT_DOMAIN);
    }
}

// Slug
function slugify($text)
{
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
    $text = trim($text, '-');
    if (function_exists('iconv')) {
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    }
    $text = strtolower($text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}

// ACF Field Name
function _f($acfFieldName, $acfOptions = false)
{
    if ($acfOptions === 1)
        return get_field($acfFieldName, 'options');
    if ($acfOptions)
        return get_field($acfFieldName, $acfOptions);
    return get_field($acfFieldName);
}

// Breadcrumbs
function yoastBreadcrumb()
{
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<div class="breadcrumbs">', '</div>');
    }
}

// Custom Pagination
function customPagination( $args = array() ) {
    $navigation = '';

    // Don't print empty markup if there's only one page.
    if ( $GLOBALS['wp_query']->max_num_pages > 1 ) {
        $args = wp_parse_args(
            $args,
            array(
                'mid_size'           => 1,
                'prev_text'          => _x( 'Previous', 'previous set of posts' ),
                'next_text'          => _x( 'Next', 'next set of posts' ),
            )
        );

        // Make sure we get a string back. Plain is the next best thing.
        if ( isset( $args['type'] ) && 'array' == $args['type'] ) {
            $args['type'] = 'plain';
        }

        // Set up paginated links.
        $links = paginate_links( $args );

        if ( $links ) {
            $navigation = _navigation_markup( $links, 'pagination', '' );
        }
    }

    return $navigation;
}

// Phone Number
function phoneNumber($args)
{
    $str = $args;
    $str = preg_replace('/[^+0-9a-zA-Z]/', '', $str);
    return $str;
}

// Get Image
function getImage($img)
{
    return public_dir() . "/images/" . $img;
}

// Featured Image
function featureImage($id = "", $size = "full", $type = "", $class = "", $no_img)
{
    if (!$id) {
        $id = get_the_ID();
    }

    if (has_post_thumbnail($id)) {
        $img = wp_get_attachment_image_src(get_post_thumbnail_id($id), $size);
        if (!$img)
            $img[0] = $no_img;
        switch ($type) {
            case 'img':
                return '<img src="' . $img[0] . '" alt="' . esc_html(get_the_post_thumbnail_caption($id)) . '"' . ($class ? ' class="' . $class . '"' : '') . '>';
                break;
            case 'bg':
                return 'style="background-image:url(' . $img[0] . ')"';
                break;
            default:
                break;
        }
    } else {
        if (!empty($no_img)) {
            switch ($type) {
                case 'img':
                    return '<img src="' . $no_img . '" alt="">';
                    break;
                case 'bg':
                    return 'style="background-image:url(' . $no_img . ')"';
                    break;
                default:
                    break;
            }
        }
    }
}

// Create Link
function createLink($object, $class = null)
{
    $link = '<a href="';
    $link .= esc_url($object['url']);
    $link .= '" target="';
    $link .= $object['target'] ? $object['target'] : '_self';
    $link .= '" class="';
    if ($class) {
        if (!is_array($class)) {
            $link .= $class;
        } else {
            foreach ($class as $cls) {
                $link .= $cls . ' ';
            }
        }
    }

    $link .= '">';
    $link .= $object['title'];
    $link .= '</a>';
    return $link;
}

// Share Network
function shareNetwork($network, $id)
{
    switch ($network) {
        case 'facebook':
            echo "https://www.facebook.com/sharer/sharer.php?u=" . get_permalink($id);
            break;
        case 'twitter':
            echo "https://twitter.com/intent/tweet?text=" . get_the_title($id) . "+" . get_permalink($id);
            break;
        case 'linkedin':
            echo "https://www.linkedin.com/shareArticle?mini=true&url=" . get_permalink($id) . "&title=" . get_the_title($id) . "&source=" . site_url();
            break;
        case 'pinterest':
            $img = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'full');
            if ($img[0]) {
                echo "https://pinterest.com/pin/create/button/?url=" . get_permalink($id) . "&media={" . $img[0] . "}&description=" . get_the_title($id);
            }
            break;
        default:
            break;
    }
}

// Year
function copyright($year = 'auto')
{
    if (intval($year) == 'auto') {
        $year = date('Y');
    }
    if (intval($year) == date('Y')) {
        return intval($year);
    }
    if (intval($year) < date('Y')) {
        return intval($year) . ' - ' . date('Y');
    }
    if (intval($year) > date('Y')) {
        return date('Y');
    }
}

// Search Filters
function searchfilter($query) {
    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('post'));
    }
return $query;
}
add_filter('pre_get_posts','searchfilter');

// CF7 Span Removal
/*add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    return $content;
});*/

// Ajax Function
/*function functionHere() { 
  
}
add_action( 'wp_ajax_functionHere', 'functionHere' );
add_action( 'wp_ajax_nopriv_functionHere', 'functionHere' );*/