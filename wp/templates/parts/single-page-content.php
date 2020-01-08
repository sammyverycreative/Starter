<?php
defined('ABSPATH') or die('Direct access is forbidden!');
include('templates/parts/page-utils.php');
global $vc;
get_header();
?>

<div class="page">
    <div class="container">
        <?php yoastBreadcrumb() ?>
        <h1 class="page-title"><?php indexTitle() ?></h1>

        <?php
        global $wp_query;
        $args = array(
            'ignore_sticky_posts' => true,
            'paged' => (get_query_var('paged')) ? absint(get_query_var('paged')) : 1
        );

        query_posts($args);
        ?>

        <?php if (have_posts()): ?>
            <div class="posts-grid">
                <div class="row">
                    <?php
                    while (have_posts()):
                        the_post();
                        $postID = get_the_ID();
                        displayPost($postID);
                    endwhile;
                    ?>
                </div>
            </div>
            <?php
            $pagination = customPagination(array(
                'mid_size' => 2,
                'prev_text' => __('', 'textdomain'),
                'next_text' => __('', 'textdomain'),
            ));

            echo $pagination;
            ?>
        <?php endif; ?>

    </div>
</div>

<?php get_footer(); ?>