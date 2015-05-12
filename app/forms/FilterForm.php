<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 12/05/15
 * Time: 16:24
 */

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;

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

        $category = new Text("category");
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