<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 04/05/15
 * Time: 16:49
 */

namespace Test;


class BookingTest extends \UnitTestCase
{
    public function testBooking()
    {
        $reservation = new \Reservation();
        $this->assertTrue($reservation->testNew(), "successfully added");

    }

}