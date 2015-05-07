<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 05/03/15
 * Time: 12:45
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;

class LoginForm extends Form
{
    public function initialize()
    {
        $text = new Text("usermail");
        $text->setLabel("Email");

        $this->add($text);

        $text2 = new Password("password");
        $text2->setLabel("Password");

        $this->add($text2);
    }

}