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
        $name = new Text("name".$season->getCode());
        $name->setLabel($this->translate->_("name"));

        $this->add($name);

        $startDate = new Date("start_date".$season->getCode());
        $startDate->setLabel($this->translate->_("startDate"));
        $startDate->addValidator(new PresenceOf(array(
            'message' => 'Start date is required'
        )));

        $this->add($startDate);

        $endDate = new Date("end_date".$season->getCode());
        $endDate->setLabel($this->translate->_("endDate"));
        $endDate->addValidator(new PresenceOf(array(
            'message' => 'End date is required'
        )));

        $this->add($endDate);

    }

}