<?php defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' ); global $vc; ?>

<?php /*
<form role="search" method="get" id="searchform"
    class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div>
        <label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
        <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
        <input type="submit" id="searchsubmit"
            value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
    </div>
</form>

<ol>
<li><?php wp_list_pages('title_li=<h4>Pages</h4>'); ?></li>

<li id="archives"><?php _e('Archives:'); ?>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>
</li>

<li id="categories"><?php _e('Categories:'); ?>
	<ul>
		<?php wp_list_cats(); ?>
	</ul>
</li>

<li>
<?php
	$tags = get_tags();
	echo '<ul>';
	    if ($tags) {
	        foreach ($tags as $tag) {
	            echo '<li><a href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "See all posts in %s" ), $tag->name ) . '" ' . '>' . $tag->name.'</a></li> ';
	        }
	    }
    echo '</ul>';
?>
</li>

<ul>
    <?php
        $lastposts = get_posts( array(
            'posts_per_page' 		=> 3,
            'post_type'				=> 'post',
            'ignore_sticky_posts'	=> true,
            'category_name'   		=> $slug,
            'order'					=> 'DESC',
            'order_by'				=> 'date'
        ) );
          
        if ( $lastposts ) {
            foreach ( $lastposts as $post ) :
                setup_postdata( $post ); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
            <?php
            endforeach; 
            wp_reset_postdata();
    } ?>
</ul>

<li id="related"><?php _e('Related Articles'); ?>
	<ul>
		<?php related_posts(10, 10, '<li>', '</li>', '', '', false, false); ?>
	</ul>
</li>

<li>
	<ul>Recently Commented Posts<br />
	   <?php c2c_get_recently_commented(5); ?>
	</ul>
</li>

<ul>
	<?php get_links(2, '<li>', '</li>', '', TRUE, 'url', FALSE); ?>
</ul>
</ol>
*/ ?>