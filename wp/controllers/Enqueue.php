<?php

/**
 * // Font file
 * $theme->addFont('font.css');
 * $theme->addFont('url', true); ***(cdn)
 * // CSS file
 * $theme->addCSS('slick');
 * $theme->addCSS('url', true); ***(cdn)
 * // JS file
 * $theme->addJS('slick');
 * $theme->addJS('slick', true); ***(header enqueue)
 * $theme->addJS('url', false, true); ***(footer enqueue, cdn)
 * // CSS & JS files
 * $theme->addPlugin('slick');
 * // Version
 * $theme->setVersion('random') | $theme->setVersion('1.1') 
 */

 class Enqueue
 {
     private $fontFiles = array();
     private $fontCFiles = array();
     private $cssFiles = array();
     private $cssCFiles = array();
     private $jsFiles = array();
     private $jsCFiles = array();
     
     private $cache = false;
     public function init()
     {
         add_action('wp_enqueue_scripts', array($this, 'enqueue_files'));
     }
     public function setVersion($cache){
         if($cache == 'random')
             $this->cache = date('YmdHGis');
         else
             $this->cache = $cache;
     }
     public function addFont($file, $CDN = false)
     {
         if ($CDN)
             array_push($this->fontCFiles, $file);
         else
             array_push($this->fontFiles, $file);
     }
     public function addCSS($file, $CDN = false)
     {
         if ($CDN)
             array_push($this->cssCFiles, $file);
         else
             array_push($this->cssFiles, $file);
     }
     public function addJS($file, $header = false, $CDN = false)
     {
         if($CDN)
             array_push($this->jsCFiles,array($file,$header));
         else
             array_push($this->jsFiles, array($file, $header));
     }
     public function addPlugin($plugin, $header = false)
     {
         array_push($this->jsFiles, array($plugin, $header));
         array_push($this->cssFiles, $plugin);
     }
     function enqueue_files()
     {
         # jQuery
         wp_enqueue_script('jquery');
         # CDN Fonts
         foreach ($this->fontCFiles as $font) {
             $fontName = substr(md5(microtime()),rand(0,26),10);
             wp_enqueue_style($fontName . '-font', $font, false, $this->cache);
         }
         # Fonts
         foreach ($this->fontFiles as $font) {
             wp_enqueue_style(slugify($font) . '-font', public_dir() . '/fonts/' . $font, false, $this->cache);
         }
         # CDN CSS
         foreach ($this->cssCFiles as $cssFile) {
             $cssFileName = substr(md5(microtime()),rand(0,26),10);
             wp_enqueue_style($cssFileName . '-css', $cssFile,false, $this->cache);
         }
         # CSS
         foreach ($this->cssFiles as $cssFile) {
             wp_enqueue_style(slugify($cssFile) . '-css', public_dir() . '/css/' . $cssFile . '.css', false, $this->cache);
         }
         # JS CDN
         foreach ($this->jsCFiles as $jsFile) {
             $jsFileName = substr(md5(microtime()),rand(0,26),10);
             wp_register_script($jsFileName . '-script', $jsFile[0], '', $this->cache, $jsFile[1]);
             wp_enqueue_script($jsFileName . '-script', array('jquery'));
         }
         # JS
         foreach ($this->jsFiles as $jsFile) {
             wp_register_script(slugify($jsFile[0]) . '-script', public_dir() . '/js/' . $jsFile[0] . '.js', '', $this->cache, $jsFile[1]);
             wp_enqueue_script(slugify($jsFile[0]) . '-script', array('jquery'));
         }
         # Main JavaScript File
         wp_register_script('scripts', public_dir() . '/js/script.js', '', $this->cache, true);
         wp_enqueue_script('scripts', array('jquery'));
         # Loads our main stylesheet.
         wp_enqueue_style('site-style', get_stylesheet_uri(), false, $this->cache);
     }
 }