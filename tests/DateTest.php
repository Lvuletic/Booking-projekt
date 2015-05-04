<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 04/05/15
 * Time: 17:02
 */

namespace Test;


class DateTest extends \UnitTestCase
{
    public function testDateCheck()
    {
        $reservationController = new \ReservationController();
        $this->assertTrue($reservationController->test("2015-05-30", "2015-06-15"), "Reservation possible");
        $this->assertFalse($reservationController->test("2015-05-30", "2015-06-15"), "Reservation not possible");

    }

}