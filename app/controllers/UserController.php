<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 07/05/15
 * Time: 17:16
 */

class UserController extends ControllerBase
{

    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {
        $this->view->form = new UserForm();

    }

    public function registerAction()
    {
        $form = new UserForm();
        if (!$form->isValid($this->request->getPost())) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }
            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "index"
            ));
        } else {
            $user = new User();

            $password = $this->request->getPost('password');
            $user = $user->createNew($this->request->getPost("username"), $this->request->getPost("phone"),
                $this->request->getPost("email"), $this->security->hash($password));
            if ($user->save() == false) {
                echo "Sorry, the following problems were generated: ";
                foreach ($user->getMessages() as $message) {
                    echo $message->getMessage(), "<br/>";
                }
            }
            $this->flash->notice("You have been successfully registered");
        }
    }

    public function accountAction()
    {
        $user = User::findFirst($this->session->get("user_id"));
        $this->view->form = new AccountForm($user);
    }

    public function saveAction()
    {
        $form = new AccountForm();
        if (!$form->isValid($this->request->getPost()))
        {
            foreach($form->getMessages() as $message) {
                $this->flash->error($message);
            }
            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "account"
            ));
        }
        else
        {
            $this->db->begin();
            $user = User::findFirst($this->session->get("user_id"));
            $password = $this->request->getPost('oldPassword');
            if ($this->security->checkHash($password, $user->getPassword()) == false)
            {
                $this->flash->error($this->translate->_("wrongpass"));
                return $this->dispatcher->forward(array(
                    "controller" => "user",
                    "action" => "account"
                ));
            }
            else
            {
                $newPassword = $this->request->getPost("newPassword");
                $user = $user->updateUser($user, $this->request->getPost("phone"), $this->request->getPost("email"),
                    $this->security->hash($newPassword));
                if($user->save()==false)
                {
                    $success = false;
                    $this->db->rollback();
                } else $success = true;
                $this->db->commit();
                if ($success) {
                    $this->flash->notice($this->translate->_("changesave"));
                } else {
                    echo "Sorry, the following problems were generated: ";
                    foreach ($user->getMessages() as $message) {
                        $this->flash->notice($message->getMessage());
                    }
                }
            }
        }
    }

    public function reservationsAction()
    {
        $userCode = $this->session->get("user_id");
        $reservation = new Reservation();
        $reservations = $reservation->findByUser($userCode);
        $this->view->reservations = $reservations;
    }

    public function editBookingAction($code)
    {
        $reservation = Reservation::findFirst($code);
        $this->view->form = new ReservationForm();
        $this->view->apartmentCode = $reservation->getApartmentCode();
        $this->view->reservation = $reservation;

    }
}