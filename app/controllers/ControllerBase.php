<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->assets
            ->addJs("js/jquery.min.js")
            ->addJs("js/jquery-ui.min.js")
            ->addJs("js/carousel.js")
            ->addJs("js/apartment.js")
            ->addJs("js/bootstrap.js");
        $this->assets
            ->addCss("css/jquery-ui.min.css")
            ->addCss("css/bootstrap.css")
            ->addCss("css/bootstrap-theme.css")
            ->addCss("css/bootstrap.css.map")
            //->addCss("css/carousel.css")
            ->addCss("css/bootstrap-theme.css.map");

        $this->tag->setDoctype(\Phalcon\Tag::HTML5);

    }


}
