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

    public function priceAction()
    {
        $this->view->form = new SeasonForm();
        $seasons = Season::find();
        foreach ($seasons as $season)
        {
            $this->view->{"start".$season->getCode()} = $season->getStartDate();
            $this->view->{"end".$season->getCode()} = $season->getEndDate();
            $this->view->{"price".$season->getCode()} = $season->getPricePerson();
            $this->view->{"room".$season->getCode()} = $season->getPriceRoom();
        }

    }

    public function seasonAction()
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
                    $pricePerson = $this->request->getPost("price_person".$code);
                    $priceRoom = $this->request->getPost("price_room".$code);
                    $season->setStartDate($startDate);
                    $season->setEndDate($endDate);
                    $season->setPricePerson($pricePerson);
                    $season->setPriceRoom($priceRoom);
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
}