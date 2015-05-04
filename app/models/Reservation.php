<?php

class Reservation extends \Phalcon\Mvc\Model
{

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
     *
     * @var integer
     */
    protected $people;

    /**
     *
     * @var integer
     */
    protected $apartment_code;

    /**
     *
     * @var integer
     */
    protected $customer_code;

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
     * Method to set the value of field people
     *
     * @param integer $people
     * @return $this
     */
    public function setPeople($people)
    {
        $this->people = $people;

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
     * Method to set the value of field customer_code
     *
     * @param integer $customer_code
     * @return $this
     */
    public function setCustomerCode($customer_code)
    {
        $this->customer_code = $customer_code;

        return $this;
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
     * Returns the value of field people
     *
     * @return integer
     */
    public function getPeople()
    {
        return $this->people;
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
     * Returns the value of field customer_code
     *
     * @return integer
     */
    public function getCustomerCode()
    {
        return $this->customer_code;
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'start_date' => 'start_date',
            'end_date' => 'end_date',
            'people' => 'people',
            'apartment_code' => 'apartment_code',
            'customer_code' => 'customer_code'
        );
    }

    public function findByCustomer($code)
    {
        $items = Reservation::find("customer_code = '$code'");
        return $items;
    }

    public function createNew($reservation, $checkin, $checkout, $people, $apartmentCode, $customerCode)
    {
        $reservation->setStartDate($checkin);
        $reservation->setEndDate($checkout);
        $reservation->setPeople($people);
        $reservation->setApartmentCode($apartmentCode);
        $reservation->setCustomerCode($customerCode);
        return $reservation;
    }

}
