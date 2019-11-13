<?php

/**
 * NOTE: Use it like a default repeater.
 * Elements:
 * _url
 * _alt
 * _caption
 * _sizes_custom-size
 */

class Gallery extends Repeater
{
    public function endLoop()
    {
        $gallery = $this->getRepeater();
        $loopContent = ob_get_clean();
        $content = '';

        if (!empty($gallery)) {
            foreach ($gallery as $image) {
                $string = preg_replace_callback('/{{((?:[^}]|}[^}])+)}}/', function ($match) use ($image) {
                    if($match[1] == 'url')
                        return esc_url($image['url']);
                    if($match[1] == 'alt')
                        return $image['alt'];
                    if($match[1] == 'caption')
                        return $image['caption'];
                    return $image['sizes'][$match[1]];
                }, $loopContent);
                $content .= $string;
            }
        }
        $this->setContent($content);
        ob_start();
    }
}