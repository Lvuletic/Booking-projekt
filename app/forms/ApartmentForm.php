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

        $internet = new Check("internet");
        $internet->setLabel("Internet access");

        $this->add($internet);

        $ac = new Check("airconditioning");
        $ac->setLabel("Air conditioning");

        $this->add($ac);

        $bedrooms = new Text("bedrooms");
        $bedrooms->setLabel("Bedrooms");

        $this->add($bedrooms);

        $bathrooms = new Text("bathrooms");
        $bathrooms->setLabel("Bathrooms");

        $this->add($bathrooms);
    }

}