<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 21/04/15
 * Time: 10:37
 */

namespace Test;


class UnitTest extends \UnitTestCase
{
    public function testTestCase() {

        $this->assertEquals("works",
            "works",
            "This is work");

        $this->assertEquals("works",
            "works1",
            "This will fail");
    }

}
