<?php

/**
 * SYNTAX:
 * getBodyClass();
 * setBodyClass();
 * getBodyColor();
 * setBodyColor();
 * getHeaderClass();
 * setHeaderClass();
 * getHeaderColor();
 * setHeaderColor();
 */

class Header
{
    private $bodyClass = '';
    private $headerClass = '';
    private $bodyColor;
    private $headerColor;

    public function __construct()
    {

    }

    public function generate()
    {
        include TEMPLATEPATH . '/template-parts/components/header.php';
    }

    /**
     * @return mixed
     */
    public function getBodyClass()
    {
        return $this->bodyClass;
    }

    /**
     * @param mixed $bodyClass
     */
    public function setBodyClass($bodyClass)
    {
        $this->bodyClass = $bodyClass;
    }

    /**
     * @return mixed
     */
    public function getHeaderClass()
    {
        return $this->headerClass;
    }

    /**
     * @param mixed $headerClass
     */
    public function setHeaderClass($headerClass)
    {
        $this->headerClass = $headerClass;
    }

    /**
     * @return mixed
     */
    public function getBodyColor()
    {
        return $this->bodyColor;
    }

    /**
     * @param mixed $bodyColor
     */
    public function setBodyColor($bodyColor)
    {
        $this->bodyColor = $bodyColor;
    }

    /**
     * @return mixed
     */
    public function getHeaderColor()
    {
        return $this->headerColor;
    }

    /**
     * @param mixed $headerColor
     */
    public function setHeaderColor($headerColor)
    {
        $this->headerColor = $headerColor;
    }
}