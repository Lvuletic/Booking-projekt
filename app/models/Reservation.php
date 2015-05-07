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
    protected $total_price;

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

    public function setTotalPrice($total_price)
    {
        $this->total_price = $total_price;

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

    public function getTotalPrice()
    {
        return $this->total_price;
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
            'total_price' => 'total_price',
            'apartment_code' => 'apartment_code',
            'customer_code' => 'customer_code'
        );
    }

    public function findByCustomer($code)
    {
        $items = Reservation::find("customer_code = '$code'");
        return $items;
    }

    public function createNew($reservation, $checkin, $checkout, $people, $totalPrice, $apartmentCode, $customerCode)
    {
        $reservation->setStartDate($checkin);
        $reservation->setEndDate($checkout);
        $reservation->setPeople($people);
        $reservation->setTotalPrice($totalPrice);
        $reservation->setApartmentCode($apartmentCode);
        $reservation->setCustomerCode($customerCode);
        return $reservation;
    }

    public function checkDates($code, $checkin, $checkout)
    {
        $reservations = $this->getmodelsManager()->createBuilder()
            ->columns("Reservation.*")
            ->from("Reservation")
            ->where("Reservation.apartment_code = '$code'")
            ->getQuery()
            ->execute();

        $result = "";
        foreach ($reservations as $reservation) {
            $startDate = $reservation->getStartDate();
            $endDate = $reservation->getEndDate();
            if (($checkin<$startDate && $checkout<=$startDate) || ($checkin>=$endDate && $checkout>$endDate))
            {
                $result = true;
            } else {
                $result = false;
                break;
            }
        }
        return $result;

    }

    public function calculatePrice($startDate, $endDate, $code, $people)
    {
        $seasons = Season::find();
        $formatStart = new DateTime($startDate);
        $formatEnd = new DateTime($endDate);
        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($formatStart, $interval ,$formatEnd);
        //$diff = $formatStart->diff($formatEnd);
        //$days = $diff->format("%a");
        $price = 0;
        foreach ($seasons as $season)
        {
            foreach ($daterange as $date)
            {
                if ($date->format("Y-m-d")>=$season->getStartDate() && $date->format("Y-m-d")<=$season->getEndDate())
                {
                    $seasonNumber = $season->getCode();
                    $pricelist = Pricelist::findFirst("apartment_code = '$code' AND season_code = '$seasonNumber'");
                    if ($people>1)
                    {
                        $price += $pricelist->getPriceRoom();
                    } else {
                        $price += $pricelist->getPricePerson();
                    }
                }
            }
        }
        return $price;
    }

    public function testNew()
    {
        $reservation = new Reservation();
        $reservation->setStartDate("1999-01-01");
        $reservation->setEndDate("1999-02-01");
        $reservation->setPeople(3);
        $reservation->setApartmentCode(100);
        $reservation->setCustomerCode(1000);
        return $reservation->save();
    }

}
