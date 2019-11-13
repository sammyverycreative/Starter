<?php 
defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' );
global $vc;
get_header(); ?>

<?php /*
<?php if (has_post_thumbnail()) { ?>		
	<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single_thumbnail' ); ?>
	<div class="class_here" style="background-image: url(<?php echo $image[0]; ?>);">
<?php } ?>
<?php if (!has_post_thumbnail()) { ?>		
	<div class="class_here" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/default-thumbnail.jpg);">
<?php //} ?>
				
<?php echo get_the_title(); ?>

<i class="fa fa-user" aria-hidden="true"></i> <?php the_author_posts_link(); ?>
<i class="fa fa-folder-open" aria-hidden="true"></i> <?php the_category(', '); ?>
<i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date('j F Y'); ?>

<?php
	$tags = the_tags( '', '', '' );
	if ($tags) {
		foreach ($tags as $tag) {
			echo '<a href="' . get_tag_link( $tag->term_id ) . '" title="' . sprintf( __( "See more posts in %s" ), $tag->name ) . '" ' . '>' . $tag->name.'</a> ';
		}
	}
?>

<?php the_content(); ?>

<?php comments_template(); ?>
*/ ?>

<?php get_footer(); ?>