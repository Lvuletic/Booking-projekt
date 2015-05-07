<?php

class UnitSpecification extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $code;

    /**
     *
     * @var integer
     */
    protected $apartment_code;

    /**
     *
     * @var integer
     */
    protected $specification_code;

    /**
     *
     * @var string
     */
    protected $value;

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
     * Method to set the value of field apartment_code
     *
     * @param integer $apartment_code
     * @return $this
     */
    public function setApartmentCode($apartment_code)
    {
        $this->apartment_code = $apartment_code;

        return $this;
    }

    /**
     * Method to set the value of field specification_code
     *
     * @param integer $specification_code
     * @return $this
     */
    public function setSpecificationCode($specification_code)
    {
        $this->specification_code = $specification_code;

        return $this;
    }

    /**
     * Method to set the value of field value
     *
     * @param string $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

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
     * Returns the value of field apartment_code
     *
     * @return integer
     */
    public function getApartmentCode()
    {
        return $this->apartment_code;
    }

    /**
     * Returns the value of field specification_code
     *
     * @return integer
     */
    public function getSpecificationCode()
    {
        return $this->specification_code;
    }

    /**
     * Returns the value of field value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'code' => 'code', 
            'apartment_code' => 'apartment_code', 
            'specification_code' => 'specification_code', 
            'value' => 'value'
        );
    }

    public function initialize()
    {
        $this->belongsTo('apartment_code', 'Apartment', 'code');
        $this->belongsTo('specification_code', 'Specification', 'code');
    }

    public function findSpecification()
    {
        $unitSpecs = $this->getmodelsManager()->createBuilder()
            ->columns(array("UnitSpecification.*, Specification.*"))
            ->from("UnitSpecification")
            ->join("Specification", "UnitSpecification.specification_code = Specification.code")
            ->orderBy("UnitSpecification.code")
            ->getQuery()
            ->execute();

        return $unitSpecs;
    }

}
