<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 06/03/15
 * Time: 18:37
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\StringLength;

class AccountForm extends Form
{
    public function initialize()
    {

        $text = new Text("phone");
        $text->setLabel($this->translate->_("accountphone"));
        $text->addValidator(new PresenceOf(array(
            'message' => 'Phone number is required'
        )));

        $this->add($text);

        $text2 = new Text("email");
        $text2->setLabel("E-mail");
        $text2->addValidator(new PresenceOf(array(
            'message' => 'Email is required'
        )));
        $text2->addValidator(new Email(array(
            'message' => 'Email must be in the proper format'
        )));

        $this->add($text2);

        $text4 = new Password("oldPassword");
        $text4->setLabel($this->translate->_("accountoldpass"));
        $text4->addValidator(new PresenceOf(array(
            'message' => 'Password is required'
        )));
        $text4->addValidator(new StringLength(array(
            'message' => 'Password must be between 6 and 16 characters in length',
            'max' => 16,
            'min' => 6
        )));

        $this->add($text4);

        $text5 = new Password("newPassword");
        $text5->setLabel($this->translate->_("accountnewpass"));
        $text5->addValidator(new PresenceOf(array(
            'message' => 'Password is required'
        )));
        $text5->addValidator(new StringLength(array(
            'message' => 'Password must be between 6 and 16 characters in length',
            'max' => 16,
            'min' => 6
        )));

        $this->add($text5);
    }


}