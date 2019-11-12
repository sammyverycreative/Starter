<?php defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' );

# Register Portfolio Posts Type
/*function portfolio_posttype() {

	$labels = array(
		'name'                  => 'Portfolio',
		'singular_name'         => 'Portfolio',
		'menu_name'             => 'Portfolio',
		'name_admin_bar'        => 'Portfolio',
		'archives'              => 'Portfolio Archives',
		'attributes'            => 'Portfolio Attributes',
		'parent_item_colon'     => 'Parent Portfolio:',
		'all_items'             => 'All Portfolio',
		'add_new_item'          => 'Add New Portfolio',
		'add_new'               => 'Add New',
		'new_item'              => 'New Portfolio',
		'edit_item'             => 'Edit Portfolio',
		'update_item'           => 'Update Portfolio',
		'view_item'             => 'View Portfolio',
		'view_items'            => 'View Portfolio',
		'search_items'          => 'Search Portfolio',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into portfolio',
		'uploaded_to_this_item' => 'Uploaded to this portfolio',
		'items_list'            => 'Portfolio list',
		'items_list_navigation' => 'Portfolio list navigation',
		'filter_items_list'     => 'Filter portfolio list',
	);
	$args = array(
		'label'                 => 'Portfolio',
		'description'           => 'Portfolio Post Type',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields', 'post-formats', ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-portfolio',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'portfolio_posttype', 0 );*/

// Register Portfolio Taxonomy
/*function portfolio_customtaxonomy() {

	$labels = array(
		'name'                       => 'Categories',
		'singular_name'              => 'Category',
		'menu_name'                  => 'Category',
		'all_items'                  => 'All Categories',
		'parent_item'                => 'Parent Category',
		'parent_item_colon'          => 'Parent Category:',
		'new_item_name'              => 'New Category Name',
		'add_new_item'               => 'Add New Category',
		'edit_item'                  => 'Edit Category',
		'update_item'                => 'Update Category',
		'view_item'                  => 'View Category',
		'separate_items_with_commas' => 'Separate categories with commas',
		'add_or_remove_items'        => 'Add or remove categories',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Categories',
		'search_items'               => 'Search Categories',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No categories',
		'items_list'                 => 'Categories list',
		'items_list_navigation'      => 'Categories list navigation',
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'category', array( 'portfolio' ), $args );

}
add_action( 'init', 'portfolio_customtaxonomy', 0 );*/

/**
* Post Formats
*/
/*add_theme_support( 'post-formats', array( 'aside', 'status', 'quote', 'chat', 'link', 'image', 'gallery', 'audio', 'video' ) );*/

// Add Shortcode
/*function custom_shortcode( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'attribute-name1' => 'attribute-value1',
			'attribute-name2' => 'attribute-value2',
		),
		$atts,
		'the-shortcode'
	);

	// shortcode code
	echo 'Shortcode is working';
	// end

}
add_shortcode( 'the-shortcode', 'custom_shortcode' );*/

/*function use_post_format_templates_27425( $template ) {
    if ( is_single() && has_post_format() ) {
        $post_format_template = locate_template( 'templates/single-' . get_post_format() . '.php' );
        if ( $post_format_template ) {
            $template = $post_format_template;
        }
    }

    return $template;
}   
add_filter( 'template_include', 'use_post_format_templates_27425' );*/