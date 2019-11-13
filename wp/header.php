<?php

include 'templates/parts/components/head.php';
include 'controllers/Header.php';

/**
 * + setHeaderColor($color);
 * + setBodyColor($color);
 * + setHeaderClass($class);
 * + setBodyClass($class);
 * + setBeforeHeaderHTML($html);
 * + setHeaderHTML($html);
 */
$header = new Header();

if(!is_front_page()) {
    $header->setHeaderClass('inner-header');
    $header->setBodyClass('inner-page');
}

$header->generate();