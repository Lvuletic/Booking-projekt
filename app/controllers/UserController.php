<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 07/05/15
 * Time: 17:16
 */

class UserController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->form = new UserForm();

    }

    public function registerAction()
    {
        $form = new UserForm();
        if (!$form->isValid($this->request->getPost()))
        {
            foreach($form->getMessages() as $message) {
                $this->flash->error($message);
            }
            return $this->dispatcher->forward(array(
                "controller" => "user",
                "action" => "index"
            ));
        }
        else
        {
            $user = new User();

            $password = $this->request->getPost('password');
            $user = $user->createNew($this->request->getPost("username"), $this->request->getPost("phone"),
                $this->request->getPost("email"), $this->security->hash($password));
            if($user->save()==false)
            {
                echo "Sorry, the following problems were generated: ";
                foreach ($user->getMessages() as $message) {
                    echo $message->getMessage(), "<br/>";
                }
            }
            $this->flash->notice("You have been successfully registered");
        }
    }
}