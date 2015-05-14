<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 30/04/15
 * Time: 20:17
 */

class ReservationController extends ControllerBase
{

    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction($code)
    {
        if ($this->request->isPost() == true)
        {
            $people = $this->request->getPost("people");
            $checkin = $this->request->getPost("checkin");
            $checkout = $this->request->getPost("checkout");
            $reservation = new Reservation();
            $availability = Reservation::find("apartment_code = '$code'");
            if ($availability->count()>0)
            {
                $freedate = $reservation->checkDates($code, $checkin, $checkout);
                if ($freedate == true)
                {
                    $totalPrice = $reservation->calculatePrice($checkin, $checkout, $code, $people);
                    $reservation = $reservation->createNew($reservation, $checkin, $checkout, $people, $totalPrice, $code, $this->session->get("user_id"));
                    if ($reservation->save() == false)
                    {
                        foreach ($reservation->getMessages() as $message) {
                            $this->flash->notice($message);
                            return $this->dispatcher->forward(array("controller" => "apartment", "action" => "index", "param" => $code));
                        }
                    } else {
                        $this->flash->success($this->translate->_("reservationSuccess"));
                        return $this->dispatcher->forward(array("controller" => "apartment", "action" => "index", "param" => $code));
                    }
                } else {
                    $this->flash->error($this->translate->_("reservationFail"));
                    return $this->dispatcher->forward(array("controller" => "apartment", "action" => "index", "param" => $code));
                }
            } else {
                $totalPrice = $reservation->calculatePrice($checkin, $checkout, $code, $people);
                $reservation = $reservation->createNew($reservation, $checkin, $checkout, $people, $totalPrice, $code, $this->session->get("user_id"));
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
    }

    public function checkDateAction()
    {
        if ($this->request->isAjax() == true)
        {
            $response = new \Phalcon\Http\Response();
            $reservation = new Reservation();
            $code = $this->request->getPost("code");
            $checkin = $this->request->getPost("startDate");
            $checkout = $this->request->getPost("endDate");
            $availability = $reservation->checkDates($code, $checkin, $checkout);
            $response->setContent($availability);
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
            $code = $this->request->getPost("code");
            $reservation = new Reservation();
            $totalPrice = $reservation->calculatePrice($startDate, $endDate, $code, $people);
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