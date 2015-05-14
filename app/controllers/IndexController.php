<?php

class IndexController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {
        $apartment = Apartment::findFirst(100);
        $stuff = $apartment->dodo;
        $detail = $apartment->unitspec;
        foreach ($stuff as $item)
        {
            $this->flashSession->notice($item->getName());
            foreach ($detail as $item2)
            {
                if ($item2->getSpecCode() == $item->getCode())
                $this->flashSession->notice($item2->getValue());
            }

        }
    }

    public function changeLanguageAction($lang)
    {
        $this->response->redirect(array(
            "for" => "homepage",
            "language" => $lang
        ),null);
    }

}

