<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 21/04/15
 * Time: 22:04
 */




class EventTest extends \PHPUnit_Framework_TestCase
{
    public function testEvent()
    {

        $eventsManager = new Phalcon\Events\Manager();

        $listener = new DummyListener();
        $listener->setTestCase($this);

        $eventsManager->attach('dummy', $listener);

        $component = new DummyComponent();
        $component->setEventsManager($eventsManager);


        $component->Action();
        $component->Action();

        $this->assertEquals($listener->getBeforeCount(), 2);
        $this->assertEquals($listener->getAfterCount(), 2);


        $listener2 = new DummyListener();
        $listener2->setTestCase($this);

        $eventsManager->attach('dummy', $listener2);

        $component->Action();
        $component->Action();


        $this->assertEquals($listener->getBeforeCount(), 4);
        $this->assertEquals($listener->getAfterCount(), 4);


        $this->assertEquals($listener2->getBeforeCount(), 2);
        $this->assertEquals($listener2->getAfterCount(), 2);
    }

}
