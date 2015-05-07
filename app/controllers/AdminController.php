<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 04/05/15
 * Time: 10:43
 */

class AdminController extends ControllerBase
{
    public function indexAction()
    {

    }

    public function seasonAction()
    {
        $seasons = Season::find();
        $this->view->seasons = $seasons;
        foreach ($seasons as $season)
        {
            $this->forms->set("form".$season->getCode(), new SeasonForm($season));
        }
    }

    public function apartmentAction()
    {
        $apartments = Apartment::find();
        $this->view->apartments = $apartments;
        $unitSpec = new UnitSpecification();
        $allSpecs = $unitSpec->findSpecification();
        $this->view->specifications = $allSpecs;
        foreach ($apartments as $unit)
        {
            $code = $unit->getCode();
            $this->forms->set("form" . $code, new ApartmentForm());
            foreach ($allSpecs as $spec)
            {
                if ($spec->unitSpecification->getApartmentCode() == $unit->getCode())
                {
                    $specName = $spec->specification->getName();
                    $specCode = $spec->specification->getCode();
                    $this->forms->set("form" . $code . "Spec" . $specCode, new EditSpecificationForm($spec));
                }
            }
        }
    }

    public function specificationAction()
    {
        $this->view->form = new SpecificationForm();
    }

    public function addAction($code)
    {
        $this->view->apartment = Apartment::findFirst($code);
        $this->view->form = new UnitSpecificationForm();
    }

    public function saveSeasonAction($code)
    {
        if ($this->request->isPost()==true)
        {
            $season = Season::findFirst($code);
            $name = $this->request->getPost("name");
            $startDate= $this->request->getPost("start_date".$code);
            $endDate = $this->request->getPost("end_date".$code);
            $season->setName($name);
            $season->setStartDate($startDate);
            $season->setEndDate($endDate);
            if ($season->save()==false)
            {
                foreach($season->getMessages() as $message)
                {
                    echo $message;
                }
            } else {
                $this->flash->success("Season successfully saved");
                return $this->dispatcher->forward(array("controller" => "admin", "action" => "season"));
            }
        }
    }

    public function saveUnitAction($code)
    {
        try {
            $manager = new Phalcon\Mvc\Model\Transaction\Manager;
            $transaction = $manager->get();
            $apartment = Apartment::findFirst($code);
            $apartment->setTransaction($transaction);
            $size = $this->request->getPost("size");
            $bedrooms = $this->request->getPost("bedrooms");
            $bathrooms = $this->request->getPost("bathrooms");
            $apartment->setSize($size);
            $apartment->setBedroomNumber($bedrooms);
            $apartment->setBathroomNumber($bathrooms);
            $unitSpecs = UnitSpecification::find("apartment_code = '$code'");
            foreach ($unitSpecs as $spec)
            {
                $spec->setTransaction($transaction);
                $value = $this->request->getPost("value".$spec->getSpecificationCode());
                $spec->setValue($value);
                if ($spec->save()==false)
                {
                    $transaction->rollback();
                }
            }
            if ($apartment->save()==false)
            {
                $transaction->rollback();
            }
            $transaction->commit();
            $this->flash->success("Apartment successfully updated");
            return $this->dispatcher->forward(array("controller" => "admin", "action" => "apartment"));
        } catch(Phalcon\Mvc\Model\Transaction\Failed $e)
        {
            echo 'Failed, reason: ', $e->getMessage();
        }

    }

    public function createSpecificationAction()
    {
        if ($this->request->isPost()==true)
        {
            $specifications = Specification::find();
            $name = $this->request->getPost("name");
            foreach ($specifications as $spec)
            {

                if (strcmp($spec->getName(),$name) == 0)
                {
                    $this->flash->error("Specification already exists");
                    return $this->dispatcher->forward(array("controller" => "admin", "action" => "specification"));
                }
            }
            $newSpec = new Specification();
            $newSpec->setName($name);
            if ($newSpec->save() == false)
            {
                foreach($newSpec->getMessages() as $message)
                {
                    echo $message;
                }
            } else {
                $this->flash->success("New specification successfully added");
                return $this->dispatcher->forward(array("controller" => "admin", "action" => "specification"));
            };
        }
    }

    public function saveSpecificationAction($code)
    {
        $unitSpecifications = UnitSpecification::find();
        foreach ($unitSpecifications as $spec)
        {
            if ($spec->getApartmentCode() == $code && $spec->getSpecificationCode() == $this->request->getPost("specs"))
            {
                $this->flash->error("Apartment already has the selected specification");
                return $this->dispatcher->forward(array("controller" => "admin", "action" => "add"));
            }
        }
        $unitSpec = new UnitSpecification();
        $unitSpec->setApartmentCode($code);
        $unitSpec->setSpecificationCode($this->request->getPost("specs"));
        $unitSpec->setValue($this->request->getPost("value"));
        if ($unitSpec->save() == false)
        {
            foreach($unitSpec->getMessages() as $message)
            {
                echo $message;
            }
        } else {
            $this->flash->success("New specification successfully added to apartment");
            return $this->dispatcher->forward(array("controller" => "admin", "action" => "apartment"));
        };

    }
}