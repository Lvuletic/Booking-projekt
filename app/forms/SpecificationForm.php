<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 07/05/15
 * Time: 13:21
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\PresenceOf;

class SpecificationForm extends Form
{
    public function initialize()
    {
        $text = new Text("name");
        $text->setLabel("Name");
        $text->addValidator(new PresenceOf(array(
            'message' => 'Name is required'
        )));

        $this->add($text);
    }

}