<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 05/03/15
 * Time: 11:56
 */

class LoginController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {
        $this->view->form = new LoginForm();
    }

    public function loginAction()
    {
        if ($this->request->isPost()) {
            $usermail = $this->request->getPost("usermail", "email");
            $password = $this->request->getPost("password");
            $user = User::findFirst("email = '$usermail'");

                if ($user && $this->security->checkHash($password, $user->getPassword()))
                {
                    $this->session->set("user_id", $user->getId());
                    /*$this->session->set("username", $user->getName());
                    $this->cookies->set("user_id", $user->getId());
                    $this->session->set("auth", array(
                        "id" => $user->getId(),
                        "username" => $user->getName()
                    ));*/
                    $this->flash->success("Welcome". $user->getName());
                } else {
                    $this->flash->error("There was a login error");
                    return $this->dispatcher->forward(array(
                        "action" => "index"
                    ));
                }
        }
        return $this->dispatcher->forward(array(
            "controller" => "index",
            "action" => "index"
        ));
    }

    public function logoutAction()
    {
        $this->session->remove("user_id");
        $this->flashSession->success("Logout successfull");
        return $this->response->redirect("index/index");
    }

    public function testLogin($username, $password)
    {
        $user = User::findFirst("email = '$username'");

        if ($user && $this->security->checkHash($password, $user->getPassword()))
        {
            return $user->getID();
        } else {
            return false;
        }
    }

}