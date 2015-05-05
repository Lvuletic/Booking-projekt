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
    protected $internet_access;

    /**
     *
     * @var integer
     */
    protected $availability;

    /**
     *
     * @var integer
     */
    protected $airconditioning;

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
     * Method to set the value of field internet_access
     *
     * @param integer $internet_access
     * @return $this
     */
    public function setInternetAccess($internet_access)
    {
        $this->internet_access = $internet_access;

        return $this;
    }

    /**
     * Method to set the value of field availability
     *
     * @param integer $availability
     * @return $this
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;

        return $this;
    }

    /**
     * Method to set the value of field airconditioning
     *
     * @param integer $airconditioning
     * @return $this
     */
    public function setAirconditioning($airconditioning)
    {
        $this->airconditioning = $airconditioning;

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
     * Returns the value of field internet_access
     *
     * @return integer
     */
    public function getInternetAccess()
    {
        return $this->internet_access;
    }

    /**
     * Returns the value of field availability
     *
     * @return integer
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * Returns the value of field airconditioning
     *
     * @return integer
     */
    public function getAirconditioning()
    {
        return $this->airconditioning;
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

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'code' => 'code', 
            'size' => 'size', 
            'internet_access' => 'internet_access', 
            'availability' => 'availability', 
            'airconditioning' => 'airconditioning', 
            'bedroom_number' => 'bedroom_number', 
            'bathroom_number' => 'bathroom_number'
        );
    }

}
