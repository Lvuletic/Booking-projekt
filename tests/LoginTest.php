<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 21/04/15
 * Time: 19:52
 */

namespace Test;


class LoginTest extends \UnitTestCase
{
    public function testLogin()
    {

        $controller = new \LoginController();
        $this->assertEquals($controller->testLogin("admin@gmail.com", "root1234"), 1, "Jednaki su");
        $this->assertEquals($controller->testLogin("admin@gmail.com", "root1234"), 2, "Nisu jednaki");

    }

}
