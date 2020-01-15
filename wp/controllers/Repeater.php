<?php

/**
 * SYNTAX:
 * $repeater = new Repeater('list');
 * $repeater = new Repeater('list', $postID / 1 (1 = option page));
 * $repeater->startLoop(); & $repeater->endLoop();
 * $repeater->finish();
 * {{element}} / {{element_optiune}}
 *
 * E.g.:
 * <img src="{{icon_url}}" alt={{icon_alt}}>
 * <h1>{{item}}</h1>
 * <a href={{link_url}}>{{link_title}}</a>
 * {{gp_group_element1}} ***(gp = group name)
 */

class Repeater
{
    private $repeater;
    private $header;
    private $footer;
    private $content = '';
    private $key = 0;
    public function __construct($repeater, $option = null, $acf = true)
    {
        if ($acf) {
            if (!$option)
                $this->repeater = _f($repeater);
            else
                $this->repeater = _f($repeater, $option);
        } else {
            $this->repeater = $repeater;
        }
        ob_start();
    }
    public function startLoop()
    {
        $this->header = ob_get_clean();
        ob_start();
    }
    private function match($match, $element, $key)
    {
        if (($php = str_replace('php: ', '', $match[1])) != $match[1]) {
            return eval($php);
        }
        if (($group = str_replace('_group', '', $match[1])) != $match[1]) {
            $groupElement = explode('_', $group);
            if (isset($groupElement[2]))
                return ($element[$groupElement[0]][$groupElement[1]][$groupElement[2]]);
            return ($element[$groupElement[0]][$groupElement[1]]);
        }
        if (($href = str_replace('_url', '', $match[1])) != $match[1]) {
            return ($element[$href]['url']);
        }
        if (($text = str_replace('_title', '', $match[1])) != $match[1]) {
            return ($element[$text]['title']);
        }
        if (($alt = str_replace('_alt', '', $match[1])) != $match[1]) {
            return ($element[$alt]['alt']);
        }
        if (($image = str_replace('_sizes', '', $match[1])) != $match[1]) {
            $imageSize = explode('_', $image);
            return ($element[$imageSize[0]]['sizes'][$imageSize[1]]);
        }
        return ($element[$match[1]]);
    }
    public
    function endLoop()
    {
        $loopContent = ob_get_clean();
        if (!empty($this->repeater)) {
            foreach ($this->repeater as $key => $element) {
                $string = preg_replace_callback('/{{((?:[^}]|}[^}])+)}}/', function ($match) use ($key, $element) {
                    return $this->match($match, $element, $key);
                }, $loopContent);
                $this->content .= $string;
            }
        }
        ob_start();
    }
    public
    function finish()
    {
        $this->footer = ob_get_clean();
        if (!empty($this->repeater)) {
            echo $this->header;
            echo $this->content;
            echo $this->footer;
        }
    }
    /**
     * @return mixed
     */
    public
    function getRepeater()
    {
        return $this->repeater;
    }
    /**
     * @void
     * @param $content
     */
    public
    function setContent($content)
    {
        $this->content = $content;
    }
}