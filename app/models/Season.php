<?php

class Season extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $code;

    /**
     *
     * @var string
     */
    protected $start_date;

    /**
     *
     * @var string
     */
    protected $end_date;

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
     * Method to set the value of field start_date
     *
     * @param string $start_date
     * @return $this
     */
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;

        return $this;
    }

    /**
     * Method to set the value of field end_date
     *
     * @param string $end_date
     * @return $this
     */
    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;

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
     * Returns the value of field start_date
     *
     * @return string
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Returns the value of field end_date
     *
     * @return string
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'code' => 'code', 
            'start_date' => 'start_date', 
            'end_date' => 'end_date'
        );
    }

}
