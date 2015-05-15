<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 21/04/15
 * Time: 22:12
 */




class DummyComponent
{
    protected $_eventsManager;
    public function setEventsManager($eventsManager)
    {
        $this->_eventsManager = $eventsManager;
    }
    public function Action()
    {
        $this->_eventsManager->fire('dummy:beforeAction', $this);
        $this->_eventsManager->fire('dummy:afterAction', $this);
    }

}