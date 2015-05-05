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
        $this->view->form1 = new SeasonForm();
        $this->view->form2 = new SeasonForm();
        $this->view->form3 = new SeasonForm();
        $this->view->form4 = new SeasonForm();
       // $this->view->form = new SeasonForm();
        $seasons = Season::find();
        foreach ($seasons as $season)
        {
            $this->view->{"start".$season->getCode()} = $season->getStartDate();
            $this->view->{"end".$season->getCode()} = $season->getEndDate();
        }

    }

    public function saveSeasonAction()
    {
        if ($this->request->isPost()==true)
        {
            try {
                $manager = new Phalcon\Mvc\Model\Transaction\Manager;
                $transaction = $manager->get();
                $seasons = Season::find();
                foreach ($seasons as $season)
                {
                    $season->setTransaction($transaction);
                    $code = $season->getCode();
                    $startDate= $this->request->getPost("start_date".$code);
                    $endDate = $this->request->getPost("end_date".$code);
                    $season->setStartDate($startDate);
                    $season->setEndDate($endDate);
                    if ($season->save()==false)
                    {
                        $transaction->rollBack();
                    }
                }

                $transaction->commit();
            } catch(Phalcon\Mvc\Model\Transaction\Failed $e) {
                echo 'Failed, reason: ', $e->getMessage();
            }
        }
    }

    public function apartmentAction()
    {
        $apartments = Apartment::find();

        $this->view->apartments = $apartments;
        foreach ($apartments as $unit) {
            $this->forms->set("form".$unit->getCode(), new ApartmentForm());
        }

    }

    public function saveUnitAction($code)
    {
        $apartment = Apartment::findFirst($code);
        $size = $this->request->getPost("size");
        $internet = $this->request->getPost("internet");
        $airconditioning = $this->request->getPost("airconditioning");
        $bedrooms = $this->request->getPost("bedrooms");
        $bathrooms = $this->request->getPost("bathrooms");
        $apartment->setSize($size);
        $apartment->setBedroomNumber($bedrooms);
        $apartment->setBathroomNumber($bathrooms);
        if ($internet == "on")
        {
            $apartment->setInternetAccess(1);
        } else $apartment->setInternetAccess(0);
        if ($airconditioning == "on")
        {
            $apartment->setAirconditioning(1);
        } else $apartment->setAirconditioning(0);
        $apartment->save();
    }
}