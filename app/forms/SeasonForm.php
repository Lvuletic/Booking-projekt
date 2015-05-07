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
    public function initialize($season)
    {
        $name = new Text("name");
        $name->setLabel("Name");

        $this->add($name);

        $startDate = new Date("start_date".$season->getCode());
        $startDate->setLabel("Start date");
        $startDate->addValidator(new PresenceOf(array(
            'message' => 'Start date is required'
        )));

        $this->add($startDate);

        $endDate = new Date("end_date".$season->getCode());
        $endDate->setLabel("End date");
        $endDate->addValidator(new PresenceOf(array(
            'message' => 'End date is required'
        )));

        $this->add($endDate);

    }

}