<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 07/05/15
 * Time: 13:35
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;

class UnitSpecificationForm extends Form
{
    public function initialize()
    {
        $select = new Select("specs", Specification::find(), array("size" => 1, "useEmpty" => true, "using" => array("code", "name")));
        $select->setLabel("Specifications");

        $this->add($select);

        $text = new Text("value");
        $text->setLabel("Value");
        $text->addValidator(new PresenceOf(array(
            'message' => 'Value is required'
        )));

        $this->add($text);
    }

}