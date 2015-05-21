<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 22/04/15
 * Time: 12:44
 */



class WebTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        $this->setHost("localhost");
        $this->setPort(4444);
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://localhost/booking/gb/');
    }

    public function testLoginHasForm()
    {
        //$this->url("/en/welcome");
        //$this->assertTitle('Example Domain');
        $this->url("login");
        $username = $this->byName("usermail");
        $password = $this->byName("password");

        $this->assertEquals("", $username->value());
        $this->assertEquals("", $password->value());
    }

    public function testLogin()
    {
        $this->url("login");

        $form = $this->byCssSelector("form");
        $action = $form->attribute("action");
        $this->assertContains('login/login', $action);

        $this->byName("usermail")->value("luka@gmail.com");
        $this->byName("password")->value("123456");
        $form->submit();

        $this->assertRegExp("/luka/", $this->source());

    }

    public function testBackend()
    {
        $this->url("login");

        $form = $this->byCssSelector("form");
        $action = $form->attribute("action");

        $this->assertContains('login/login', $action);
        $this->byName("usermail")->value("admin@gmail.com");
        $this->byName("password")->value("root12345");
        $form->submit();
        $this->assertRegExp("/logout/", $this->source());
    }

    public function testHasLink()
    {
        $this->url("homepage");
        $this->assertRegExp("/Login/", $this->source());
        $this->assertRegExp("/Register/", $this->source());
        $this->assertRegExp("/Apartments/", $this->source());
    }

}
