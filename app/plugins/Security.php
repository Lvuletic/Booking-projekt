<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 27/02/15
 * Time: 15:40
 */

use Phalcon\Acl,
    Phalcon\Acl\Role,
    Phalcon\Acl\Resource,
    Phalcon\Events\Event,
    Phalcon\Mvc\User\Plugin,
    Phalcon\Mvc\Dispatcher;

class Security extends Plugin
{
    public function getAcl()
    {
        $acl = new Phalcon\Acl\Adapter\Memory();

        $acl->setDefaultAction(Acl::DENY);

        $roles = array(
            "users" => new Role("Users"),
            "guests" => new Role("Guests"),
            "admin" => new Role("Admin")
        );

        foreach ($roles as $role) {
            $acl->addRole($role);
        }

        $privateResources = array(
            "reservation" => array("index", "delete", "edit", "checkEditDate"),
            "user" => array("account", "save", "reservations", "editBooking")
        );

        foreach ($privateResources as $resource => $actions) {
            $acl->addResource(new Resource($resource),$actions);
        }

        $publicResources = array(
            "index" => array("index", "changeLanguage"),
            "user" => array("index", "register"),
            "login" => array("index", "login", "logout"),
            "apartment" => array("index", "list"),
            "reservation" => array("checkPrice", "checkDate")
        );

        foreach ($publicResources as $resource => $actions) {
            $acl->addResource(new Resource($resource),$actions);
        }

        foreach ($roles as $role) {
            foreach ($publicResources as $resource => $actions) {
                foreach ($actions as $action) {
                    $acl->allow($role->getName(), $resource, $action);
                }
            }
        }

        foreach ($privateResources as $resource => $actions) {
            foreach ($actions as $action) {
                $acl->allow('Users', $resource, $action);
            }
            $this->persistent->acl = $acl;
        }

        $adminActions = array("index", "season", "apartment", "specification", "editApartment", "language", "editLanguage", "add", "saveSeason", "saveUnit", "savePrice",
            "createSpecification", "createSeason", "saveSpecification", "deleteSeason", "removeSpecification", "createApartment", "changeLanguage", "createLanguage", "deleteLanguage", "addImage", "saveLangImage");
        $adminResource = new Resource("admin");
        $acl->addResource($adminResource, $adminActions);
        foreach ($adminActions as $action)
        {
            $acl->allow("Admin", "admin", $action);
        }

        return $this->persistent->acl = $acl;
    }

    public function beforeDispatch(Event $event, Dispatcher $dispatcher)
    {
        $auth = $this->session->get("user_id");
        if (!$auth) {
            $role = "Guests";
        } else {
            if ($this->session->get("user_id")==1)
            {
                $role = "Admin";
            } else {
                $role = "Users";
            }
        }

        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();

        $acl = $this->getAcl();

        if (($controller=="user" && $action=="editBooking") || ($controller=="reservation" && $action=="delete"))
        {
            $parameter = $dispatcher->getParam(0);
            if ($parameter)
            {
                $reservation = Reservation::findFirst($parameter);
                $reservationUser=$reservation->getCustomerCode();
                $user=$this->session->get("user_id");

                if ($reservationUser!=$user)
                {
                    $this->flash->error($this->translate->_("loginNotAllow"));
                    $dispatcher->forward(
                        array(
                            "controller" => "login",
                            "action" => "index"
                        )
                    );
                    return false;
                }
            } /*else {
                if ($this->request->isPost())
                {
                    $order = $this->factory->createObject("Orders");
                    $id = $order->findCustomerId($this->request->getPost("orderCode"));
                    if ($id!=$this->session->get("user_id"))
                    {
                        $this->flash->error($this->translate->_("loginnotallow"));
                        $dispatcher->forward(
                            array(
                                "controller" => "login",
                                "action" => "index"
                            )
                        );
                        return false;
                    }
                    if ($this->request->getPost("customerId")!=$this->session->get("user_id"))
                    {
                        $this->flash->error($this->translate->_("loginnotallow"));
                        $dispatcher->forward(
                            array(
                                "controller" => "login",
                                "action" => "index"
                            )
                        );
                        return false;
                    }
                }
            }*/
        }
        $allowed = $acl->isAllowed($role, $controller, $action);
        if ($allowed != Acl::ALLOW) {
            $this->flash->error($this->translate->_("loginNotAllow"));

            $dispatcher->forward(
                array(
                    "controller" => "login",
                    "action" => "index"
                )
            );
            return false;

        }
    }

}