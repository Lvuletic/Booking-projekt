<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 11/05/15
 * Time: 15:17
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\File;
use Phalcon\Forms\Element\Select;

class ImageForm extends Form
{
    public function initialize()
    {
        $image = new File("image");
        $image->setLabel("Add new image");

        $this->add($image);

        $text = new Select("number", array(1,2,3,4,5,6,7,8,9,10,11,12), array("size" => 1, "useEmpty" => true));
        $text->setLabel("Replace image");

        $this->add($text);
    }
}