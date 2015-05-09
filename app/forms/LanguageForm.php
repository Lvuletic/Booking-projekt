<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 09/05/15
 * Time: 12:37
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\PresenceOf;

class LanguageForm extends Form
{
    public function initialize($object)
    {
        $text = new Text("text".$object->langWord->getCode());
        $text->setLabel($object->name);

        $this->add($text);
    }

}