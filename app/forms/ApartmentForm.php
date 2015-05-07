<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 05/05/15
 * Time: 20:29
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Check;
use Phalcon\Validation\Validator\PresenceOf;

class ApartmentForm extends Form
{
    public function initialize()
    {
        $size = new Text("size");
        $size->setLabel("Size");

        $this->add($size);

        $bedrooms = new Text("bedrooms");
        $bedrooms->setLabel("Bedrooms");
        $bedrooms->addValidator(new PresenceOf(array(
            'message' => 'Number of bedrooms is required'
        )));

        $this->add($bedrooms);

        $bathrooms = new Text("bathrooms");
        $bathrooms->setLabel("Bathrooms");
        $bathrooms->addValidator(new PresenceOf(array(
            'message' => 'Number of bathrooms is required'
        )));

        $this->add($bathrooms);
    }

}