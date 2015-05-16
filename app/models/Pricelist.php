<?php

class Pricelist extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $apartment_code;

    /**
     *
     * @var integer
     */
    protected $season_code;

    /**
     *
     * @var double
     */
    protected $price_person;

    /**
     *
     * @var double
     */
    protected $price_room;

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
     * Method to set the value of field season_code
     *
     * @param integer $season_code
     * @return $this
     */
    public function setSeasonCode($season_code)
    {
        $this->season_code = $season_code;

        return $this;
    }

    /**
     * Method to set the value of field price_person
     *
     * @param double $price_person
     * @return $this
     */
    public function setPricePerson($price_person)
    {
        $this->price_person = $price_person;

        return $this;
    }

    /**
     * Method to set the value of field price_room
     *
     * @param double $price_room
     * @return $this
     */
    public function setPriceRoom($price_room)
    {
        $this->price_room = $price_room;

        return $this;
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
     * Returns the value of field season_code
     *
     * @return integer
     */
    public function getSeasonCode()
    {
        return $this->season_code;
    }

    /**
     * Returns the value of field price_person
     *
     * @return double
     */
    public function getPricePerson()
    {
        return $this->price_person;
    }

    /**
     * Returns the value of field price_room
     *
     * @return double
     */
    public function getPriceRoom()
    {
        return $this->price_room;
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'apartment_code' => 'apartment_code', 
            'season_code' => 'season_code', 
            'price_person' => 'price_person', 
            'price_room' => 'price_room'
        );
    }

    public function createNew($unitCode, $seasonCode, $priceOne, $priceRoom)
    {
        $priceList = new Pricelist();
        $priceList->setApartmentCode($unitCode);
        $priceList->setSeasonCode($seasonCode);
        $priceList->setPricePerson($priceOne);
        $priceList->setPriceRoom($priceRoom);
        return $priceList;
    }

    public function pricesBySeason($code)
    {
        $items = $this->getmodelsManager()->createBuilder()
            ->columns(array("Pricelist.*", "Season.*"))
            ->from("Pricelist")
            ->join("Season", "Pricelist.apartment_code = '$code' AND Pricelist.season_code = Season.code")
            ->orderBy("Season.code")
            ->getQuery()
            ->execute();

        return $items;
    }

    public function pricesByUnit($code)
    {
        $items = $this->getmodelsManager()->createBuilder()
            ->columns(array("Pricelist.*"))
            ->from("Pricelist")
            ->where("Pricelist.apartment_code = '$code'")
            ->orderBy("Pricelist.season_code")
            ->getQuery()
            ->execute();

        return $items;
    }

}
