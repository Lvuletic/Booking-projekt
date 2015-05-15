<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 21/04/15
 * Time: 22:12
 */




class DummyListener
{
    protected $_testCase;
    protected $_before = 0;
    protected $_after = 0;
    public function setTestCase($testCase){
        $this->_testCase = $testCase;
    }
    public function beforeAction($event, $component, $data)
    {
        $this->_testCase->assertInstanceOf('Phalcon\Events\Event', $event);
        $this->_testCase->assertInstanceOf('DummyComponent', $component);
        //$this->_testCase->assertEquals($data, "extra data");
        $this->_before++;
    }
    public function afterAction($event, $component)
    {
        $this->_testCase->assertInstanceOf('Phalcon\Events\Event', $event);
        $this->_testCase->assertInstanceOf('DummyComponent', $component);
       // $this->_testCase->assertEquals($event->getData(), array("extra","data"));
        $this->_after++;
    }
    public function getBeforeCount()
    {
        return $this->_before;
    }
    public function getAfterCount()
    {
        return $this->_after;
    }

}