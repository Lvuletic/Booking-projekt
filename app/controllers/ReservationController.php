<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 30/04/15
 * Time: 20:17
 */

class ReservationController extends ControllerBase
{
    public function indexAction($code)
    {/*
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
*/
        if ($this->request->isPost() == true)
        {
            $people = $this->request->getPost("people");
            $checkin = $this->request->getPost("checkin");
            $checkout = $this->request->getPost("checkout");
            $reservation = new Reservation();
            $reservation = $reservation->createNew($reservation, $checkin, $checkout, $people, $code, 1002);
            if ($reservation->save() == false)
            {
                foreach ($reservation->getMessages() as $message) {
                    $this->flash->notice($message);
                    return $this->dispatcher->forward(array("controller" => "apartment", "action" => "index", "param" => $code));
                }
            } else {
                $this->flash->success("Reservation successful");
                return $this->dispatcher->forward(array("controller" => "apartment", "action" => "index", "param" => $code));
            }
        }
    }

    public function checkDateAction()
    {
        if ($this->request->isAjax() == true)
        {
            $response = new \Phalcon\Http\Response();
            $reservation = Reservation::find();
            /*$dates = [];
            foreach ($reservation as $booking)
            {
                $dates[] = [
                    "start" => $booking->getStartDate(),
                    "end" => $booking->getEndDate()
                ];
            }*/
            $dates = $reservation->toArray();
            /*foreach ($reservation as $booking)
            {
                $startDate = $booking->getStartDate();
                $endDate = $booking->getEndDate();
                if (($checkin<$startDate && $checkout<=$startDate)==false && ($checkin>=$endDate && $checkout>$endDate)==false)
                {
                    $content="nije dobro";
                    $response->setContent($content);


                } else {
                    $content="dobro je";
                    $response->setContent($content);


                }
            }*/
            $response->setContent(json_encode($dates));
            return $response;

        }
    }

    public function checkPriceAction()
    {
        if ($this->request->isAjax() == true)
        {
            $response = new \Phalcon\Http\Response();
            $startDate = $this->request->getPost("startDate");
            $endDate = $this->request->getPost("endDate");
            $people = $this->request->getPost("people");
            $reservation = new Reservation();
            $totalPrice = $reservation->calculatePrice($startDate, $endDate, $people);
            $response->setContent($totalPrice);
            return $response;
        }

    }

    public function test($startDate, $endDate)
    {
        $reservation = Reservation::findFirst();
        $checkin = $reservation->getStartDate();
        $checkout = $reservation->getEndDate();
        if (($checkin<$startDate && $checkout<=$startDate) || ($checkin>=$endDate && $checkout>$endDate))
        {
            return true;
        } else return false;
    }

}