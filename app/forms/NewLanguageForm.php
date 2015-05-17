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
use Phalcon\Validation\Validator\Regex;

class NewLanguageForm extends Form
{
    public function initialize()
    {
        $fullname = new Text("fullname");
        $fullname->setLabel("Full name");
        $fullname->addValidator(new PresenceOf(array(
            'message' => 'Fullname is required'
        )));

        $this->add($fullname);

        $name = new Text("name");
        $name->setLabel("Short name");
        $name->addValidator(new PresenceOf(array(
            'message' => 'Shortname is required'
        )));
        $name->addValidator(new Regex(array(
            'pattern' => '/[a-z]{2}+/',
            'message' => "Language's short form must be two small letters"
        )));

        $this->add($name);
    }

}