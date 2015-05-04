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

    }

    public function listAction()
    {
        $list = Apartment::find();
        $this->view->list = $list;

    }

}