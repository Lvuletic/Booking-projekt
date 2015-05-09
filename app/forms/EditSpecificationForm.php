<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 07/05/15
 * Time: 14:17
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;

class EditSpecificationForm extends Form
{
    public function initialize($spec)
    {
        $text = new Text("value".$spec->specification->getCode());
        $text->setLabel($this->translate->_($spec->specification->getName()));
        $text->addValidator(new PresenceOf(array(
            'message' => 'Value is required'
        )));

        $this->add($text);
    }

}