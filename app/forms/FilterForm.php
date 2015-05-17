<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 12/05/15
 * Time: 16:24
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;

class FilterForm extends Form
{
    public function initialize()
    {
        $size = new Text("size");
        $size->setLabel($this->translate->_("size"));

        $this->add($size);

        $rating = new Text("rating");
        $rating->setLabel($this->translate->_("rating"));

        $this->add($rating);

        $category = new Select("category", array("A1", "A2", "A3", "A4", "A5", "S1", "S2", "S3"), array("size" => 1, "useEmpty" => true));
        $category->setLabel($this->translate->_("category"));

        $this->add($category);

        $bedrooms = new Text("bedrooms");
        $bedrooms->setLabel($this->translate->_("bedrooms"));

        $this->add($bedrooms);

        $bathrooms = new Text("bathrooms");
        $bathrooms->setLabel($this->translate->_("bathrooms"));

        $this->add($bathrooms);
    }

}