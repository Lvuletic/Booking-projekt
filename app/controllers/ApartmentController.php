<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 30/04/15
 * Time: 17:04
 */

class ApartmentController extends ControllerBase
{
    public function indexAction($code)
    {
        $apartment = Apartment::findFirst($code);
        $this->view->apartmentCode = $apartment->getCode();
        $this->view->size = $apartment->getSize();
        if ($apartment->getInternetAccess()==1)
        {
            $this->view->internet = "Yes";
        } else $this->view->internet = "No";
        if ($apartment->getAirconditioning()==1)
        {
            $this->view->airconditioning = "Yes";
        } else $this->view->airconditioning = "No";
        $this->view->bedrooms = $apartment->getBedroomNumber();
        $this->view->bathrooms = $apartment->getBathroomNumber();
        if ($apartment->getAvailability()==1)
        {
            $this->view->availability = "Yes";
        } else $this->view->availability = "No";

        $this->view->form = new ReservationForm();
        $date = new DateTime();
        $realDate = $date->format("Y-m-d");
       // $this->view->pricePerson = $realDate;
       // $this->view->priceRoom = $realDate;
        $seasons = Season::find();
        foreach ($seasons as $season) {
            $seasonStart = $season->getStartDate();
            $seasonEnd = $season->getEndDate();
            if ($realDate>$seasonStart & $realDate<$seasonEnd)
            {
                $this->view->pricePerson = $season->getPricePerson();
                $this->view->priceRoom = $season->getPriceRoom();
            }
        }


    }

    public function listAction()
    {
        $list = Apartment::find();
        $this->view->list = $list;

    }

}