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
            $people++;
            $lang = $this->dispatcher->getParam("language");
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
                            return $this->response->redirect($lang."/apartment/index/".$code);
                        }
                    } else {
                        $this->flash->success($this->translate->_("reservationSuccess"));
                        return $this->response->redirect($lang."/apartment/index/".$code);
                    }
                } else {
                    $this->flash->error($this->translate->_("reservationFail"));
                    return $this->response->redirect($lang."/apartment/index/".$code);
                }
            } else {
                $totalPrice = $reservation->calculatePrice($checkin, $checkout, $code, $people);
                $reservation = $reservation->createNew($reservation, $checkin, $checkout, $people, $totalPrice, $code, $this->session->get("user_id"));
                if ($reservation->save() == false)
                {
                    foreach ($reservation->getMessages() as $message) {
                        $this->flash->notice($message);
                        return $this->response->redirect($lang."/apartment/index/".$code);
                    }
                } else {
                    $this->flash->success("Reservation successful");
                    return $this->response->redirect($lang."/apartment/index/".$code);
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
            $language = $this->request->getPost("language");
            $this->dispatcher->setParam("language", $language);
            $availability = $reservation->checkDates($code, $checkin, $checkout);
            $yes = $this->translate->_("checkDateTrue");
            $no = $this->translate->_("checkDateFalse");
            if ($availability == true)
            {
                $response->setContent($yes);
                return $response;
            } else {
                $response->setContent($no);
                return $response;
            }
        }
    }

    public function checkEditDateAction()
    {
        if ($this->request->isAjax() == true)
        {
            $response = new \Phalcon\Http\Response();
            $reservation = new Reservation();
            $code = $this->request->getPost("code");
            $checkin = $this->request->getPost("startDate");
            $checkout = $this->request->getPost("endDate");
            $language = $this->request->getPost("language");
            $reservationCode = $this->request->getPost("reservationCode");
            $this->dispatcher->setParam("language", $language);
            $availability = $reservation->checkDates($code, $checkin, $checkout, $reservationCode);
            $yes = $this->translate->_("checkDateTrue");
            $no = $this->translate->_("checkDateFalse");
            if ($availability == true)
            {
                $response->setContent($yes);
                return $response;
            } else {
                $response->setContent($no);
                return $response;
            }
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
            $language = $this->request->getPost("language");
            $this->dispatcher->setParam("language", $language);
            $reservation = new Reservation();
            $totalPrice = $reservation->calculatePrice($startDate, $endDate, $code, $people);
            $total = $this->translate->_("totalPrice");
            $answer = $total.$totalPrice;
            $response->setContent($answer);
            return $response;
        }

    }

    public function editAction($code)
    {
        if ($this->request->isPost()==true)
        {
            $reservation = Reservation::findFirst($code);
            $apartment = Apartment::findFirst($reservation->getApartmentCode());
            $people = $this->request->getPost("people");
            $checkin = $this->request->getPost("checkin");
            $checkout = $this->request->getPost("checkout");
            $people++;
            $freedate = $reservation->checkEditDates($apartment->getCode(), $checkin, $checkout, $reservation->getReservationCode());
            if ($freedate == true)
            {
                $totalPrice = $reservation->calculatePrice($checkin, $checkout, $apartment->getCode(), $people);
                $reservation = $reservation->edit($reservation, $checkin, $checkout, $people, $totalPrice);
                if ($reservation->save() == false)
                {
                    foreach ($reservation->getMessages() as $message) {
                        $this->flash->notice($message);
                        return $this->dispatcher->forward(array("controller" => "user", "action" => "editBooking", "param" => $code));
                    }
                } else {
                    $this->flash->success($this->translate->_("reservationSuccess"));
                    return $this->dispatcher->forward(array("controller" => "user", "action" => "editBooking", "param" => $code));
                }
            } else {
                $this->flash->error($this->translate->_("reservationFail"));
                return $this->dispatcher->forward(array("controller" => "user", "action" => "editBooking", "param" => $code));
            }
        }


    }


    public function deleteAction($code)
    {
        $reservation = Reservation::findFirst($code);
        if ($reservation->delete() == false)
        {
            foreach ($reservation->getMessages() as $message)
            {
                $this->flash->notice($message);
            }
        } else {
            $this->flash->notice($this->translate->_("reservationDelete"));
            return $this->dispatcher->forward(array("controller" => "user", "action" => "reservations"));
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