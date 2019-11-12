<?php
defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' );
global $vc;
get_header(); ?>

<?php /*
<?php
$searchWord = get_search_query();
$total_results = $wp_query->found_posts;
?>

<?php if (is_search()) { ?>
	<h1>Results for: <span><?php the_search_query(); ?></span> (<?php echo $total_results; ?>)</h1>
<?php } else { ?>
	Blog  <?php if ( $paged ) {echo  _e(' - Page ', THEME_TEXT_DOMAIN). $paged; } ?>
<?php } ?>
<?php if (have_posts()) { $x = 0;
	while (have_posts()) {  the_post(); $x++; ?>
	<div class="class_here">
		<?php if (has_post_thumbnail()) { ?>
			<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $page->ID, array(1920, 400) ); ?></a>
		<?php } ?>
		<?php if (!has_post_thumbnail()) { ?>
			<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/default-thumbnail.jpg" alt="Blog"></a>
		<?php } ?>
		<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>

		<i class="fa fa-user" aria-hidden="true"></i> <?php the_author_posts_link(); ?>
		DISABLE-THIS-><i class="fa fa-folder-open" aria-hidden="true"></i> <?php the_category(', '); ?>
		<i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date('j F Y'); ?>

		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>">Read more</a>
	</div>
<?php } 
} else { ?>
	<h4>Sorry, no posts matched your criteria.</h4>
<?php } ?>

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