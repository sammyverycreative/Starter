<?php defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' ); global $vc; ?>

<?php /*
<?php 
	$page_id = get_the_ID();
	$template_file = get_post_meta($page_id, '_wp_page_template', true);
?>
<?php if ($template_file == 'page-templates/page-home.php') { ?>
	<div class="side">
		<?php if ( is_active_sidebar( 'sidebar_1' ) ) : ?>
			<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
				<?php dynamic_sidebar( 'sidebar_1' ); ?>
			</div>
		<?php endif; ?>
	</div>
<?php } else ?>
<?php if ($template_file == 'page-templates/page-blog.php') { ?>
	<div class="side">
		<?php if ( is_active_sidebar( 'sidebar_2' ) ) : ?>
			<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
				<?php dynamic_sidebar( 'sidebar_2' ); ?>
			</div>
		<?php endif; ?>
	</div>
<?php } else ?>
	<?php 
		while ( have_posts() ) : the_post();
			get_template_part( 'sidebar' );
		endwhile;
	?>
<?php } ?>
*/ ?>