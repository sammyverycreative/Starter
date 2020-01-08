<?php defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' ); global $vc; ?>

	<footer>
        <?php /*
		<nav class="footer-menu">
			<?php wp_nav_menu( array(
                'theme_location'    => 'footer_menu',
                'container'         => '',
                'menu_id'           => '',
                'menu_class'        => '',
                'before'            => ''
            ) ); ?>
		</nav>
        */ ?>
	</footer>
    <?php /*
    <p class="copyright">
        Copyright &copy; <?php
            $startYear = get_field('copyright_year', 'options'); 
                    $currentYear = date('Y'); 
            echo $startYear . (($startYear != $currentYear) ? '-' . $currentYear : '');
        ?>
        <?php if ( get_field('company_name', 'options') ) { ?>
            <a href="<?php bloginfo('url'); ?>"><?php get_field('company_name', 'options'); ?></a>
        <?php } ?>
    </p>
    */ ?>

	<?php wp_footer(); ?>
</body>
</html>