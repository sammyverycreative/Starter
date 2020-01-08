<?php 
defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' );
global $vc;
get_header(); ?>

<?php /*
<?php
	global $wp_query;
	$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
	query_posts( array_merge( $wp_query->query_vars, array(
	    'posts_per_page'		=> 5,
	    'category_name'			=> $slug,
	    'ignore_sticky_posts'	=> true, 
        'post_type'				=> 'post',
        'order'					=> 'DESC',
        'order_by'				=> 'date',
        'paged'					=> $paged
	) );
?>
	 
<?php while (have_posts()) : the_post(); $x++; ?>
        <?php $id = get_the_ID(); ?>
        <div class="class_here">
			<?php if (has_post_thumbnail()) { ?>
				<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $page->ID, array(1920, 400) ); ?></a>
			<?php } ?>
			<?php if (!has_post_thumbnail()) { ?>
				<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/default-thumbnail.jpg" alt="Blog"></a>
			<?php } ?>
				<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>

				<i class="fa fa-user" aria-hidden="true"></i> <?php the_author_posts_link(); ?>
				<i class="fa fa-folder-open" aria-hidden="true"></i> <?php the_category(', '); ?>
				<i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date('j F Y'); ?>

				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>">Read more</a>
		</div>
<?php
	endwhile; 
?>

<?php
    $pgs = 999999999;
    echo paginate_links( array(
        'base'          => str_replace( $pgs, '%#%', esc_url( get_pagenum_link( $pgs ) ) ),
        'format'        => '?paged=%#%',
        'current'       => max( 1, get_query_var('paged') ),
        'total'         => $wp_query->max_num_pages,
        'type'          => 'list',
        'prev_next'     => True,
        'prev_text' => '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>',
        'next_text' => '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>'
    ) );
    wp_reset_postdata();
?>
*/ ?>
    
<?php get_footer(); ?>