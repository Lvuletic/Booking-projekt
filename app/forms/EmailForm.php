<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 17/05/15
 * Time: 17:42
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;

class EmailForm extends Form
{
    public function initialize()
    {
        $name = new Text("subject");
        $name->setLabel("Subject");

        $this->add($name);

        $text = new TextArea("textarea");
        $text->setLabel($this->translate->_("mailMessage"));

        $this->add($text);

    }

}