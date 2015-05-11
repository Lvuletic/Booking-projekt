<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 11/05/15
 * Time: 17:49
 */

namespace Test;


class ApartmentTest extends \UnitTestCase
{
    public function testApartment()
    {
        $apartment = new \Apartment();
        $apartment->findFirst(101);

        $category = $apartment->getCategory();

        $this->assertClassHasAttribute("category", "Apartment");
        $this->assertEquals("standard",$category, "Jednaki su");
        $this->assertEquals("suite",$category, "Nisu jednaki");
    }

}