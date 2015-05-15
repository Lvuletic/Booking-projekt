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
                    $this->session->set("username", $user->getName());
                    $this->cookies->set("user_id", $user->getId());
                    $this->flash->success($this->translate->_("logingreet") ." ". $user->getName());
                } else {
                    $this->flash->error($this->translate->_("loginerror"));
                    return $this->dispatcher->forward(array(
                        "action" => "index"
                    ));
                }
        }
        $lang = $this->dispatcher->getParam("language");
        if ($this->session->get("user_id") == 1)
        {
            return $this->response->redirect("/admin/index");
        }
        else {
            return $this->response->redirect($lang."/index/index");
        }

    }

    public function logoutAction()
    {
        $this->session->remove("user_id");
        $this->flashSession->success($this->translate->_("logout"));
        $lang = $this->dispatcher->getParam("language");
        return $this->response->redirect($lang."/index/index");
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