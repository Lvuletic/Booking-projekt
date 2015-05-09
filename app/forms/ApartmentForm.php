<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 05/05/15
 * Time: 20:29
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\PresenceOf;

class ApartmentForm extends Form
{
    public function initialize()
    {
        $size = new Text("size");
        $size->setLabel($this->translate->_("size"));

        $this->add($size);

        $rating = new Text("rating");
        $rating->setLabel($this->translate->_("rating"));

        $this->add($rating);

        $category = new Text("category");
        $category->setLabel($this->translate->_("category"));

        $this->add($category);

        $bedrooms = new Text("bedrooms");
        $bedrooms->setLabel($this->translate->_("bedrooms"));
        $bedrooms->addValidator(new PresenceOf(array(
            'message' => 'Number of bedrooms is required'
        )));

        $this->add($bedrooms);

        $bathrooms = new Text("bathrooms");
        $bathrooms->setLabel($this->translate->_("bathrooms"));
        $bathrooms->addValidator(new PresenceOf(array(
            'message' => 'Number of bathrooms is required'
        )));

        $this->add($bathrooms);
    }

}