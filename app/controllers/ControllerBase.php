<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model\Resultset;

class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->assets
            ->addJs("js/jquery.min.js")
            ->addJs("js/jquery-ui.min.js")
            ->addJs("js/carousel.js")
            ->addJs("js/apartment.js")
            ->addJs("js/admin.js")
            ->addJs("https://maps.googleapis.com/maps/api/js")
            ->addJs("js/google.js")
            ->addJs("js/bootstrap.js");
        $this->assets
            ->addCss("css/jquery-ui.min.css")
            ->addCss("css/bootstrap.css")
            ->addCss("css/bootstrap-theme.css")
            ->addCss("css/bootstrap.css.map")
            //->addCss("css/carousel.css")
            ->addCss("css/admin.css")
            ->addCss("css/bootstrap-theme.css.map");

        $this->tag->setDoctype(\Phalcon\Tag::HTML5);
        $this->loadTranslation();
        $languages = Language::find();
        $this->view->languages = $languages;

    }

    public function loadTranslation()
    {
        //$language = $this->session->get("lang");
        $language = $this->dispatcher->getParam("language");
        if (!$language)
        {
            $this->dispatcher->setParam("language", "gb");
            //$this->session->set("lang", "gb");
            $language = "gb";
        }
        $lang = Language::findFirst("name = '$language'");
        $langWord = new LangWord();
        $words = $langWord->findWords($lang->getCode());
        $messages = array();
        foreach ($words as $word=>$item)
        {
            $messages[$item->name] = $item->value;
        }
        $translator = new Phalcon\Translate\Adapter\NativeArray(array(
            "content" => $messages
        ));
        $this->view->setVar("t", $translator);
    }


}
