<?php defined( 'ABSPATH' ) or die( 'Direct access is forbidden!' ); global $vc; ?>

<!DOCTYPE html>

<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->

<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php wp_title(); ?> <?php //$title = the_title('', ' -', ''); if ($title) { echo $title; } ?> <?php //bloginfo('name'); ?></title>
    <?php /*
    <title>
    <?php
        if (!is_archive()) { $title = the_title('', ' -', ''); }
        if (is_home()) { $title = get_the_title(id_here).' -'; }
        if (is_404()) { $title = get_field('field_here', 'options').' -'; }
        if ($title) { echo $title; } ?> <?php bloginfo('name');
    ?>
    </title>
    */ ?>
	<?php /*
    <meta name="description" content="">
    <meta name="keywords" content="">
    */ ?>
    <meta name="author" content="VeryCreative">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
    <base href="<?php echo get_template_directory_uri(); ?>/"><!--[if IE]></base><![endif]-->

	<?php
        $favicon = get_field('favicon', 'options');
        if($favicon){
            ?><link rel="icon" href="<?php echo $favicon['url']; ?>" type="<?php echo $favicon['mime_type']; ?>"><?php
        }
    ?>
    <?php
        $iphone = get_field('iphone', 'options');
        if($iphone){
            ?><link rel="apple-touch-icon" href="<?php echo $iphone['url']; ?>"><?php
        }
    ?>
    <?php
        $iphoneretina = get_field('iphone_retina', 'options');
        if($iphoneretina){
            ?><link rel="apple-touch-icon" sizes="120x120" href="<?php echo $iphoneretina['url']; ?>"><?php
        }
    ?>
    <?php
        $ipad = get_field('ipad', 'options');
        if($ipad){
            ?><link rel="apple-touch-icon" sizes="76x76" href="<?php echo $ipad['url']; ?>"><?php
        }
    ?>
    <?php
        $ipadretina = get_field('ipad_retina', 'options');
        if($ipadretina){
            ?><link rel="apple-touch-icon" sizes="152x152" href="<?php echo $ipadretina['url']; ?>"><?php
        }
    ?>
</head>

<body>
	<header>
        <?php /*
        <nav class="header-menu">
            <?php wp_nav_menu( array(
                'theme_location'    => 'header_menu',
                'container'         => '',
                'menu_id'           => '2',
                'menu_class'        => '',
                'before'            => ''
            ) ); ?>
        </nav>
        */ ?>
        <?php /*<div class="menu">
            <nav>
                <?php wp_nav_menu( array(
                    'theme_location'    => 'header_menu',
                    'container'         => '',
                    'menu_id'           => '2',
                    'menu_class'        => '',
                    'before'            => ''
                ) ); ?>
            </nav>
        </div>
        <div class="burger">
            <a href="#menu-open" class="menu-toggle">
                <span class="button-menu-line button-menu-line--1"></span>
                <span class="button-menu-line button-menu-line--2"></span>
                <span class="button-menu-line button-menu-line--3"></span>
            </a>
        </div>*/ ?>
        <!-- mobile menu -->
        <?php /*<div id="menu-open" class="menu-overlay">
            <div class="mobile-overlay"></div>
            <div class="menu-content">
                <div class="menu-logo">
                    <a href="<?php echo home_url(); ?>">
                        <img src="..." alt="<?php bloginfo('name'); ?>">
                    </a>
                </div>
                <nav class="mobile-menu">
                    <?php wp_nav_menu( array( 'theme_location' => 'mobile-menu','container'=>false ) ); ?>
                </nav>
            </div>
        </div>*/ ?>
        <!-- /mobile menu -->
	</header>