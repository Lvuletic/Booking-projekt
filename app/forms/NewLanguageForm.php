<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 11/05/15
 * Time: 11:38
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\PresenceOf;

class NewLanguageForm extends Form
{
    public function initialize()
    {
        $fullname = new Text("fullname");
        $fullname->setLabel("Full name");

        $this->add($fullname);

        $name = new Text("name");
        $name->setLabel("Short name");

        $this->add($name);
    }

}