<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 11/05/15
 * Time: 12:40
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;

class NewApartmentForm extends Form
{
    public function initialize()
    {
        $number = new Text("number");
        $number->setLabel("Number");

        $this->add($number);

        $size = new Text("size");
        $size->setLabel("Size");

        $this->add($size);

        $rating = new Text("rating");
        $rating->setLabel("Rating");

        $this->add($rating);

        $category = new Select("category", array("A1", "A2", "A3", "A4", "A5", "S1", "S2", "S3"), array("size" => 1, "useEmpty" => true));
        $category->setLabel("Category");

        $this->add($category);

        $bedroom = new Text("bedrooms");
        $bedroom->setLabel("Bedrooms");

        $this->add($bedroom);

        $bathroom = new Text("bathrooms");
        $bathroom->setLabel("Bathrooms");

        $this->add($bathroom);
    }

}