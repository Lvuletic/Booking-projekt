<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 30/04/15
 * Time: 17:04
 */

class ApartmentController extends ControllerBase
{
    public function indexAction()
    {
        $apartment = Apartment::findFirst(103);
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

        $reservation = new Reservation();
        $reservation = $reservation->findByCustomer(1000);
        foreach ($reservation as $item)
        {
            $startDate = new DateTime($item->getStartDate());
            $endDate = new DateTime($item->getEndDate());
            $interval = new DateInterval("P1D");
            $dateRange = new DatePeriod($startDate, $interval, $endDate);


        }

        $this->view->datedate = $dateRange;
    }

}