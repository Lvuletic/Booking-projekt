<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 04/05/15
 * Time: 11:38
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Date;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Regex;

class SeasonForm extends Form
{
    public function initialize()
    {
        $startDate1 = new Date("start_date1");
        $startDate1->setLabel("Start date");
        $startDate1->addValidator(new PresenceOf(array(
            'message' => 'Start date is required'
        )));

        $this->add($startDate1);

        $endDate1 = new Date("end_date1");
        $endDate1->setLabel("End date");
        $endDate1->addValidator(new PresenceOf(array(
            'message' => 'End date is required'
        )));

        $this->add($endDate1);

        $pricePerson1 = new Text("price_person1");
        $pricePerson1->setLabel("Price for one person");
        $pricePerson1->addValidator(new PresenceOf(array(
            'message' => 'Price is required'
        )));
        $pricePerson1->addValidator(new Regex(array(
            'pattern' => '[0-9]+(\.[0-9][0-9]?)?',
            'message' => 'Price can only be numbers and two decimals'
        )));

        $this->add($pricePerson1);

        $priceRoom1 = new Text("price_room1");
        $priceRoom1->setLabel("Price for more");
        $priceRoom1->addValidator(new PresenceOf(array(
            'message' => 'Price is required'
        )));
        $priceRoom1->addValidator(new Regex(array(
            'pattern' => '[0-9]+(\.[0-9][0-9]?)?',
            'message' => 'Price can only be numbers and two decimals'
        )));

        $this->add($priceRoom1);

        $startDate2 = new Date("start_date2");
        $startDate2->setLabel("Start date");
        $startDate2->addValidator(new PresenceOf(array(
            'message' => 'Start date is required'
        )));

        $this->add($startDate2);

        $endDate2 = new Date("end_date2");
        $endDate2->setLabel("End date");
        $endDate2->addValidator(new PresenceOf(array(
            'message' => 'End date is required'
        )));

        $this->add($endDate2);

        $pricePerson2 = new Text("price_person2");
        $pricePerson2->setLabel("Price for one person");
        $pricePerson2->addValidator(new PresenceOf(array(
            'message' => 'Price is required'
        )));
        $pricePerson2->addValidator(new Regex(array(
            'pattern' => '[0-9]+(\.[0-9][0-9]?)?',
            'message' => 'Price can only be numbers and two decimals'
        )));

        $this->add($pricePerson2);

        $priceRoom2 = new Text("price_room2");
        $priceRoom2->setLabel("Price for more");
        $priceRoom2->addValidator(new PresenceOf(array(
            'message' => 'Price is required'
        )));
        $priceRoom2->addValidator(new Regex(array(
            'pattern' => '[0-9]+(\.[0-9][0-9]?)?',
            'message' => 'Price can only be numbers and two decimals'
        )));

        $this->add($priceRoom2);

        $startDate3 = new Date("start_date3");
        $startDate3->setLabel("Start date");
        $startDate3->addValidator(new PresenceOf(array(
            'message' => 'Start date is required'
        )));

        $this->add($startDate3);

        $endDate3 = new Date("end_date3");
        $endDate3->setLabel("End date");
        $endDate3->addValidator(new PresenceOf(array(
            'message' => 'End date is required'
        )));

        $this->add($endDate3);

        $pricePerson3 = new Text("price_person3");
        $pricePerson3->setLabel("Price for one person");
        $pricePerson3->addValidator(new PresenceOf(array(
            'message' => 'Price is required'
        )));
        $pricePerson3->addValidator(new Regex(array(
            'pattern' => '[0-9]+(\.[0-9][0-9]?)?',
            'message' => 'Price can only be numbers and two decimals'
        )));

        $this->add($pricePerson3);

        $priceRoom3 = new Text("price_room3");
        $priceRoom3->setLabel("Price for more");
        $priceRoom3->addValidator(new PresenceOf(array(
            'message' => 'Price is required'
        )));
        $priceRoom3->addValidator(new Regex(array(
            'pattern' => '[0-9]+(\.[0-9][0-9]?)?',
            'message' => 'Price can only be numbers and two decimals'
        )));

        $this->add($priceRoom3);

        $startDate4 = new Date("start_date4");
        $startDate4->setLabel("Start date");
        $startDate4->addValidator(new PresenceOf(array(
            'message' => 'Start date is required'
        )));

        $this->add($startDate4);

        $endDate4 = new Date("end_date4");
        $endDate4->setLabel("End date");
        $endDate4->addValidator(new PresenceOf(array(
            'message' => 'End date is required'
        )));

        $this->add($endDate4);

        $pricePerson4 = new Text("price_person4");
        $pricePerson4->setLabel("Price for one person");
        $pricePerson4->addValidator(new PresenceOf(array(
            'message' => 'Price is required'
        )));
        $pricePerson4->addValidator(new Regex(array(
            'pattern' => '[0-9]+(\.[0-9][0-9]?)?',
            'message' => 'Price can only be numbers and two decimals'
        )));

        $this->add($pricePerson4);

        $priceRoom4 = new Text("price_room4");
        $priceRoom4->setLabel("Price for more");
        $priceRoom4->addValidator(new PresenceOf(array(
            'message' => 'Price is required'
        )));
        $priceRoom4->addValidator(new Regex(array(
            'pattern' => '[0-9]+(\.[0-9][0-9]?)?',
            'message' => 'Price can only be numbers and two decimals'
        )));

        $this->add($priceRoom4);
    }

}