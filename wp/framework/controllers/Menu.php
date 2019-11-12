<?php

/**
 * SYNTAX:
 * $headerMenu = new Menu('header_menu','Header Menu', array('container'=> ''));
 * $header->getMenu();
 * $header->printMenu();
 */

class Menu
{
    private $name;
    private $location;
    private $options;

    public function __construct($location,$name, $options = null)
    {
        $this->name = $name;
        $this->location = $location;
        $this->options = $options;

        # register navigation menus
        $this->registerMenu();

        add_action('after_setup_theme', array($this,'registerMenu'));
    }

    public function registerMenu(){
        register_nav_menu($this->location, $this->name);
    }

    public function printMenu(){
        $this->options['theme_location'] = $this->location;
        $this->options['echo'] = true;
        wp_nav_menu($this->options);
    }

    public function getMenu(){
        $this->options['theme_location'] = $this->location;
        $this->options['echo'] = false;
        return wp_nav_menu($this->options);
    }

}