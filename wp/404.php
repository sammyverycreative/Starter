<?php 
/**
 * Template Name: 404
 */
defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' );
get_header(); ?>

<?php /*
<div class="default-page error-page">
	<div class="container">
		<div class="title">
			<h1><?php the_field('error_title', 'options'); ?></h1>
		</div>
		<div class="text">
			<h3><?php the_field('error_text', 'options'); ?></h3>
			<?php $home = get_field('error_goback-page', 'options'); $homePg = $home->post_title; $homeID = $home->ID; ?>
			<p><?php the_field('error_goback-text', 'options'); ?> <a href="<?php echo get_permalink($homeID); ?>"><?php echo $homePg; ?></a>.</p>
		</div>
	</div>
</div>
*/ ?>
    
<?php get_footer(); ?>