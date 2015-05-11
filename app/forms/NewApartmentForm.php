<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 11/05/15
 * Time: 12:40
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
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

        $category = new Text("category");
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