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
    }

}