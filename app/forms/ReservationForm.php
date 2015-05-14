<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 03/05/15
 * Time: 14:04
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Date;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;

class ReservationForm extends Form
{
    public function initialize()
    {
        $text = new Select("people", array(1,2,3,4,5,6), array("size" => 1));
        $text->setLabel($this->translate->_("guestNumber"));

        $this->add($text);

        $start_date = new Date("checkin");
        $start_date->setLabel($this->translate->_("checkInDate"));
        $start_date->addValidator(new PresenceOf(array(
            'message' => 'Check-in date is required'
        )));

        $this->add($start_date);

        $end_date = new Date("checkout");
        $end_date->setLabel($this->translate->_("checkOutDate"));
        $end_date->addValidator(new PresenceOf(array(
            'message' => 'Check-out date is required'
        )));

        $this->add($end_date);
    }

}