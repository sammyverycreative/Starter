<?php
/**
 * Template Name: Home
 */
defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' );
global $vc;
get_header(); ?>

<?php /*
	<div class="slider">
		<div>Slide #1</div>
		<div>Slide #2</div>
		<div>Slide #3</div>
	</div>

	<section class="wow slideInLeft" data-wow-duration="2s" data-wow-delay="5s">

	</section>

	<div id="aos-body" class="aos-all">
		<div class="aos-item" data-aos="fade-in">
		</div>
	</div>

	<?php 
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/sidebar', 'default' );
		endwhile;
	?>
*/ ?>

<?php get_footer(); ?>