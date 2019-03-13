<?php

namespace App;

class View
{
    use SetGet;

    protected $position = 0;

    public function __construct()
    {
        $this->position = 0;
    }

    public function display($template)
    {
        echo $this->render($template);
    }

    public function render($template)
    {
        ob_start();
        include $template;
        $out = ob_get_contents();
        ob_end_clean();
        return $out;
    }
}