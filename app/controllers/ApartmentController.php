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
        $this->view->bedrooms = $apartment->getBedroomNumber();
        $this->view->bathrooms = $apartment->getBathroomNumber();

        $this->view->form = new ReservationForm();

        $pricelist = new Pricelist();
        $prices = $pricelist->pricesBySeason($code);
        $this->view->seasonPrices = $prices;

        $availability = Reservation::find("apartment_code = '$code'");
        if ($availability->count()>0)
        {
            $this->view->availability = false;
        } else $this->view->availability = true;



    }

    public function listAction()
    {
        $list = Apartment::find();
        $this->view->list = $list;

    }

}