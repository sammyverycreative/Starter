<?php

/**
 * // Font file
 * $theme->addFont('font.css');
 * // CSS file
 * $theme->addCSS('slick');
 * // JS file
 * $theme->addJS('slick');
 * // CSS & JS files
 * $theme->addPlugin('slick');
 */

class Enqueue
{
    private $cssFiles = array();
    private $jsFiles = array();
    private $fontFiles = array();

    public function init(){
        add_action('wp_enqueue_scripts', array($this,'enqueue_files'));
    }

    public function addCSS($file){
        array_push($this->cssFiles,$file);
    }

    public function addFont($file){
        array_push($this->fontFiles,$file);
    }

    public function addJS($file,$footer = false){
        array_push($this->jsFiles, array($file,$footer));
    }

    public function addPlugin($plugin,$footer = false){
        array_push($this->jsFiles, array($plugin,$footer));
        array_push($this->cssFiles, $plugin);
    }

    function enqueue_files()
    {
        # jQuery
        wp_enqueue_script('jquery');


        # Fonts
        foreach($this->fontFiles as $font){
            wp_enqueue_style(slugify($font).'-font', public_dir() . '/fonts/'.$font);
        }

        # CSS
        foreach($this->cssFiles as $cssFile){
            wp_enqueue_style(slugify($cssFile).'-css', public_dir() . '/css/'.$cssFile.'.css');
        }

        # JS
        foreach($this->jsFiles as $jsFile){
            wp_register_script(slugify($jsFile[0]).'-script', public_dir() . '/js/'.$jsFile[0].'.js', '', '', $jsFile[1]);
            wp_enqueue_script(slugify($jsFile[0]).'-script', array('jquery'));
        }

        # Main JavaScript File
        wp_register_script('scripts', public_dir() . '/js/script.js', '', false, true);
        wp_enqueue_script('scripts', array('jquery'));

        # Loads our main stylesheet.
        wp_enqueue_style('site-style', get_stylesheet_uri(), false, '');
    }
}