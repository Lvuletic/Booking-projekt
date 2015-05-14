<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 14/05/15
 * Time: 15:06
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Date;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Regex;

class PriceForm extends Form
{
    public function initialize($season)
    {
        $priceOne = new Text("priceOne".$season->getCode());
        $priceOne->setLabel("Price for one person");

        $this->add($priceOne);

        $priceRoom = new Text("priceRoom".$season->getCode());
        $priceRoom->setLabel("Price for the room");

        $this->add($priceRoom);
    }

}