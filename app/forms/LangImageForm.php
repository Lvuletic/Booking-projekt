<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 14/05/15
 * Time: 17:46
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\File;

class LangImageForm extends Form
{
    public function initialize()
    {
        $image = new File("imageA");
        $image->setLabel("Add new image");

        $this->add($image);
    }

}