<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 12/05/15
 * Time: 19:07
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;

class FilterSpecificationForm extends Form
{
    public function initialize($spec)
    {
        $text = new Text($spec->getCode());
        $text->setLabel($spec->getName());

        $this->add($text);
    }

}