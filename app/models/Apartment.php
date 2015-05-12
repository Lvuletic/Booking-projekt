<?php

class Apartment extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $code;

    /**
     *
     * @var double
     */
    protected $size;

    /**
     *
     * @var integer
     */
    protected $bedroom_number;

    /**
     *
     * @var integer
     */
    protected $bathroom_number;
    protected $rating;
    protected $category;


    /**
     * Method to set the value of field code
     *
     * @param integer $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Method to set the value of field size
     *
     * @param double $size
     * @return $this
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Method to set the value of field bedroom_number
     *
     * @param integer $bedroom_number
     * @return $this
     */
    public function setBedroomNumber($bedroom_number)
    {
        $this->bedroom_number = $bedroom_number;

        return $this;
    }

    /**
     * Method to set the value of field bathroom_number
     *
     * @param integer $bathroom_number
     * @return $this
     */
    public function setBathroomNumber($bathroom_number)
    {
        $this->bathroom_number = $bathroom_number;

        return $this;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Returns the value of field code
     *
     * @return integer
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Returns the value of field size
     *
     * @return double
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Returns the value of field bedroom_number
     *
     * @return integer
     */
    public function getBedroomNumber()
    {
        return $this->bedroom_number;
    }

    /**
     * Returns the value of field bathroom_number
     *
     * @return integer
     */
    public function getBathroomNumber()
    {
        return $this->bathroom_number;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'code' => 'code', 
            'size' => 'size',
            'rating' => 'rating',
            'category' => 'category',
            'bedroom_number' => 'bedroom_number', 
            'bathroom_number' => 'bathroom_number'
        );
    }

    public function initialize()
    {
        $this->hasManyToMany(
            "code",
            "UnitSpecification",
            "apartment_code", "specification_code",
            "Specification",
            "code"
        );
    }

    public function filter($size, $rating, $category, $bedrooms, $bathrooms)
    {
        $items = $this->getmodelsManager()->createBuilder()
            ->columns("Apartment.*")
            ->from("Apartment")
            ->where("Apartment.size >= '$size'")
            ->andWhere("Apartment.rating >= '$rating'")
            ->andWhere("Apartment.category = '$category'")
            ->andWhere("Apartment.bedroom_number >= '$bedrooms'")
            ->andWhere("Apartment.bathroom_number >= '$bathrooms'")
            ->getQuery()
            ->execute();

        return $items;
    }

   /* public function filterSpec($code, $specType)
    {*/
        /*$phql = "SELECT Apartment.*, Customer.username FROM Orders JOIN Customer ON Orders.customerId = Customer.id ORDER BY Orders.orderCode";
        $query = $this->getModelsManager()->createQuery($phql);
        return $items = $query->execute();*/
/*
        $items = $this->getmodelsManager()->createBuilder()
            ->columns("Apartment.*")
            ->from("Apartment")
            ->where("UnitSpecification.apartment_code = :code", array("code" => $code))
            ->andWhere("UnitSpecification.specification_code = :specType", array("specType" => $specType))
            ->getQuery()
            ->execute();

        return $items;

    }*/

}
