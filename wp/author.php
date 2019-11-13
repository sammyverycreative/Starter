<?php 
defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' );
global $vc;
get_header(); ?>

<?php /*
<?php
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>
<?php 
$aid = $curauth->ID;
$dname = $curauth->display_name;
$fname = $curauth->first_name;
$lname = $curauth->last_name;
$nickname = $curauth->nickname;
$nicename = $curauth->user_nicename;
$login = $curauth->user_login;
$email = $curauth->user_email;
$description = $curauth->description;
$aurl = $curauth->user_url;
$registered = $curauth->user_registered;
$aim = $curauth->aim;
$yim = $curauth->yim;
$jabber = $curauth->jabber;
?>
    <?php
        global $wp_query;
        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
        query_posts( array_merge( $wp_query->query_vars, array(
                                                            'ignore_sticky_posts' => true,
                                                            'author' => $aid,
                                                            'paged' => $paged ) ) );
    ?>
    <?php if (have_posts()) : $x = 0; ?>
    <?php while (have_posts()) : the_post(); $x++; ?>
        <?php $id = get_the_ID(); ?>
        <?php echo get_the_title($id); ?>
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

        <?php endwhile; else: ?>
            <p><?php _e('No posts by this author.'); ?></p>
    <?php endif; ?>

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