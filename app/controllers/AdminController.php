<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 04/05/15
 * Time: 10:43
 */

class AdminController extends ControllerBase
{

    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {

    }

    public function seasonAction()
    {
        $seasons = Season::find();
        $this->view->seasons = $seasons;
        foreach ($seasons as $season) {
            $this->forms->set("form" . $season->getCode(), new SeasonForm($season));
        }
        $this->view->form = new NewSeasonForm();
    }

    public function apartmentAction()
    {
        $apartments = Apartment::find();
        $this->view->apartments = $apartments;
        $unitSpec = new UnitSpecification();
        $allSpecs = $unitSpec->findSpecification();
        $this->view->specifications = $allSpecs;
        foreach ($apartments as $unit) {
            $code = $unit->getCode();
            $this->forms->set("form" . $code, new ApartmentForm());
            foreach ($allSpecs as $spec) {
                if ($spec->unitSpecification->getApartmentCode() == $unit->getCode()) {
                    $specCode = $spec->specification->getCode();
                    $this->forms->set("form" . $code . "Spec" . $specCode, new EditSpecificationForm($spec));
                }
            }
        }
        $this->view->form = new NewApartmentForm();
    }

    public function specificationAction()
    {
        $this->view->form = new SpecificationForm();
    }

    public function editApartmentAction($code)
    {
        $apartment = Apartment::findFirst($code);
        $this->view->apartmentCode = $code;
        $this->view->apartmentSize = $apartment->getSize();
        $this->view->apartmentRating = $apartment->getRating();
        $this->view->apartmentCategory = $apartment->getCategory();
        $this->view->apartmentBedrooms = $apartment->getBedroomNumber();
        $this->view->apartmentBathrooms = $apartment->getBathroomNumber();
        $this->view->form = new ApartmentForm();

        $unitSpec = new UnitSpecification();
        $allSpecs = $unitSpec->findSpecification();
        $this->view->specifications = $allSpecs;
        foreach ($allSpecs as $spec) {
            if ($spec->unitSpecification->getApartmentCode() == $code) {
                $specCode = $spec->specification->getCode();
                $this->forms->set("formSpec" . $specCode, new EditSpecificationForm($spec));
            }
        }
        $seasons = Season::find();
        foreach ($seasons as $season)
        {
            $seasonCode = $season->getCode();
            $this->forms->set("formPrice" . $seasonCode, new PriceForm($season));
        }
        $priceList = new Pricelist();
        $prices = $priceList->pricesBySeason($code);
        $this->view->prices = $prices;
        $this->view->formImage = new ImageForm();
    }

    public function languageAction()
    {
        $languages = Language::find();
        $this->view->languages = $languages;
        $this->view->form = new NewLanguageForm();
        /*foreach ($languages as $lang)
        {
            $langCode = $lang->getCode();
            $this->forms->set("formImage".$langCode, new LangImageForm($lang));
        }*/
        $this->forms->set("formImage", new LangImageForm());
    }

    public function editLanguageAction($name)
    {
        $lang = Language::findFirst("name = '$name'");
        $langWord = new LangWord();
        $words = $langWord->findAll($lang->getCode());
        $this->view->messages = $words;
        $this->view->langName = $name;
        $this->view->langFullName = $lang->getFullname();
        foreach ($words as $row=>$item)
        {
            $name = $item->name;
            $this->forms->set("form".$name, new LanguageForm($item));
        }
    }

    public function addAction($code)
    {
        $this->view->apartment = Apartment::findFirst($code);
        $this->view->form = new UnitSpecificationForm();
    }

    public function saveSeasonAction()
    {
        if ($this->request->isPost()==true)
        {
            $manager = new Phalcon\Mvc\Model\Transaction\Manager;
            $transaction = $manager->get();
            $seasons = Season::find();
            foreach ($seasons as $season)
            {
                $season->setTransaction($transaction);
                $code = $season->getCode();
                $name = $this->request->getPost("name".$code);
                $startDate= $this->request->getPost("start_date".$code);
                $endDate = $this->request->getPost("end_date".$code);
                if ($endDate < $startDate)
                {

                    $this->flash->success("Dates are wrong");
                    return $this->dispatcher->forward(array("controller" => "admin", "action" => "season"));
                }
                $season->setName($name);
                $season->setStartDate($startDate);
                $season->setEndDate($endDate);
                $seasonCode = $season->getCode();
                if ($season->checkDates($startDate, $endDate, $seasonCode)== false)
                {
                    $this->flash->success("Season dates overlap, please choose different dates");
                    return $this->dispatcher->forward(array("controller" => "admin", "action" => "season"));
                }
                if ($season->save()==false)
                {
                    $transaction->rollback();
                }
            }
            $transaction->commit();
            $this->flash->success("Seasons successfully updated");
            return $this->dispatcher->forward(array("controller" => "admin", "action" => "season"));

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
            $rating = $this->request->getPost("rating");
            $category = $this->request->getPost("category");
            $apartment->setSize($size);
            $apartment->setBedroomNumber($bedrooms);
            $apartment->setBathroomNumber($bathrooms);
            $apartment->setRating($rating);
            $apartment->setCategory($category);
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
            return $this->response->redirect("admin/apartment");
        } catch(Phalcon\Mvc\Model\Transaction\Failed $e)
        {
            echo 'Failed, reason: ', $e->getMessage();
        }
    }

    public function savePriceAction($code)
    {
        if ($this->request->isPost()==true)
        {
            try {
                $manager = new Phalcon\Mvc\Model\Transaction\Manager;
                $transaction = $manager->get();
                $priceList = new Pricelist();
                $prices = $priceList->pricesByUnit($code);
                foreach ($prices as $price)
                {
                    $price->setTransaction($transaction);
                    $price->setPricePerson($this->request->getPost("priceOne".$price->getSeasonCode()));
                    $price->setPriceRoom($this->request->getPost("priceRoom".$price->getSeasonCode()));
                    if ($price->save() == false)
                    {
                        $transaction->rollback();
                    }
                }
                $transaction->commit();
                $this->flash->success("Apartment successfully updated");
                return $this->dispatcher->forward(array("controller" => "admin", "action" => "editApartment", "parameter" => $code));
            } catch(Phalcon\Mvc\Model\Transaction\Failed $e)
            {
                echo 'Failed, reason: ', $e->getMessage();
            }
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
            $keyword = new Keyword();
            $keyword->setName($name);
            $keyword->save();
            $languages = Language::find();
            foreach ($languages as $lang)
            {
                $langWord = new LangWord();
                $langWord->setLanguageCode($lang->getCode());
                $langWord->setKeywordCode($keyword->getCode());
                $langWord->save();
            }
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

    public function createSeasonAction()
    {
        try {
            $manager = new Phalcon\Mvc\Model\Transaction\Manager;
            $transaction = $manager->get();
            $season = new Season();
            $season->setTransaction($transaction);
            $season->setName($this->request->getPost("name"));
            $startDate = $this->request->getPost("start_date");
            $endDate = $this->request->getPost("end_date");
            $season->setStartDate($startDate);
            $season->setEndDate($endDate);
            if ($season->checkDates($startDate, $endDate) == true)
            {
                if ($season->save()==false)
                {
                    $transaction->rollback();
                } else {
                    $transaction->commit();
                    $transaction->begin();
                }
                $apartments = Apartment::find();
                foreach ($apartments as $unit)
                {
                    $priceList = new Pricelist();
                    $priceList->setTransaction($transaction);
                    $priceList = $priceList->createNew($unit->getCode(), $season->getCode(), 0, 0);
                    if ($priceList->save()==false)
                    {
                        $transaction->rollback();
                    }
                }
                $transaction->commit();
                $this->flash->success("New season added");
                return $this->dispatcher->forward(array("controller" => "admin", "action" => "season"));
            } else {
                $this->flash->notice("Season dates overlap, please choose different dates");
                return $this->dispatcher->forward(array("controller" => "admin", "action" => "season"));
            }

        } catch(Phalcon\Mvc\Model\Transaction\Failed $e)
        {
            echo 'Failed, reason: ', $e->getMessage();
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
            return $this->response->redirect("admin/apartment");
        }
    }

    public function deleteSeasonAction($code)
    {
        try {
            $manager = new Phalcon\Mvc\Model\Transaction\Manager;
            $transaction = $manager->get();
            $season = Season::findFirst($code);
            $season->setTransaction($transaction);
            $code = $season->getCode();
            $prices = Pricelist::find("season_code = '$code'");
            foreach ($prices as $pricelist)
            {
                $pricelist->setTransaction($transaction);
                if ($pricelist->delete()==false)
                {
                    $transaction->rollback();
                }
            }
            if ($season->delete()==false)
            {
                $transaction->rollback();
            }
            $transaction->commit();
            $this->flash->success("Season successfully deleted");
            return $this->dispatcher->forward(array("controller" => "admin", "action" => "season"));

        } catch(Phalcon\Mvc\Model\Transaction\Failed $e)
        {
            echo 'Failed, reason: ', $e->getMessage();
        }

    }

    public function removeSpecificationAction($code)
    {
        $unitSpec = UnitSpecification::findFirst($code);
        if ($unitSpec->delete()==false)
        {
            foreach($unitSpec->getMessages() as $message)
            {
                echo $message;
            }
        } else {
            $this->flash->success("Specification successfully removed");
            return $this->response->redirect("admin/apartment");
        }
    }

    public function createApartmentAction()
    {
        if ($this->request->getPost()==true)
        {
            $apartment = new Apartment();
            $code = $this->request->getPost("number");
            $size = $this->request->getPost("size");
            $category = $this->request->getPost("category");
            $rating = $this->request->getPost("rating");
            $bedrooms = $this->request->getPost("bedrooms");
            $bathrooms = $this->request->getPost("bathrooms");
            $apartment = $apartment->createNew($apartment, $code, $size, $rating, $category, $bedrooms, $bathrooms);
            if ($apartment->save()==false)
            {
                foreach ($apartment->getMessages() as $message)
                {
                    $this->flash->error($message);
                }
            }
            $seasons = Season::find();
            foreach ($seasons as $season)
            {
                $unitPrice = new Pricelist();
                $unitPrice->setApartmentCode($code);
                $unitPrice->setSeasonCode($season->getCode());
                $unitPrice->setPricePerson(0);
                $unitPrice->setPriceRoom(0);
                $unitPrice->save();
            }
            if (mkdir("img/".$this->request->getPost("number"))==false)
            {
                    $this->flash->error("Failed to create a folder");
            }
            $this->flash->success("Specification successfully removed");
            return $this->response->redirect("admin/apartment");
        }
    }

    public function changeLanguageAction($name)
    {
        try {
            $manager = new Phalcon\Mvc\Model\Transaction\Manager;
            $transaction = $manager->get();
            $lang = Language::findFirst("name = '$name'");
            $code = $lang->getCode();
            $langWords = LangWord::find("language_code = '$code'");
            foreach ($langWords as $word)
            {
                $word->setTransaction($transaction);
                $value = $this->request->getPost("text".$word->getCode());
                $word->setValue($value);
                if ($word->save() == false) {
                    $transaction->rollback();
                }
            }
            $transaction->commit();
            $this->flash->success("Language successfully updated");
            return $this->response->redirect("admin/editLanguage/".$name);
        } catch(Phalcon\Mvc\Model\Transaction\Failed $e)
        {
            echo 'Failed, reason: ', $e->getMessage();
        }

    }

    public function createLanguageAction()
    {
        try {
            $form = new NewLanguageForm();
            if (!$form->isValid($this->request->getPost())) {
                foreach ($form->getMessages() as $message) {
                    $this->flashSession->error($message);
                }
                return $this->response->redirect("admin/language");
            }
            $manager = new Phalcon\Mvc\Model\Transaction\Manager;
            $transaction = $manager->get();
            $language = new Language();
            $language->setTransaction($transaction);
            $name = $this->request->getPost("name");
            $fullname = $this->request->getPost("fullname");
            $language->setName($name);
            $language->setFullname($fullname);
            $keywords = Keyword::find();
            if ($language->save() == false) {
                $transaction->rollback();
            } else {
                $transaction->commit();
                $transaction->begin();
            }
            foreach ($keywords as $keyword) {
                $langword = new LangWord();
                $langword->setTransaction($transaction);
                $langword->setKeywordCode($keyword->getCode());
                $langword->setLanguageCode($language->getCode());
                if ($langword->save() == false) {
                    $transaction->rollback();
                }
            }
            $transaction->commit();
            $this->flash->success($fullname . " language successfully added");
            return $this->response->redirect("admin/language");

        } catch(Phalcon\Mvc\Model\Transaction\Failed $e)
        {
            echo 'Failed, reason: ', $e->getMessage();
        }
    }

    public function deleteLanguageAction($code)
    {
        try {
            $manager = new Phalcon\Mvc\Model\Transaction\Manager;
            $transaction = $manager->get();
            $language = Language::findFirst($code);
            $language->setTransaction($transaction);
            $fullname = $language->getFullname();
            $langWords = LangWord::find("language_code = '$code'");
            foreach ($langWords as $langWord) {
                $langWord->setTransaction($transaction);
                if ($langWord->delete()==false)
                {
                    $transaction->rollback();
                } else {
                    $transaction->commit();
                    $transaction->begin();
                }
            }
            if ($language->delete())
            {
                //$transaction->rollback();
            }
            $transaction->commit();
            $this->flash->success($fullname . " language successfully deleted");
            return $this->response->redirect("admin/language");
        } catch(Phalcon\Mvc\Model\Transaction\Failed $e)
        {
            echo 'Failed, reason: ', $e->getMessage();
        }
    }

    public function addImageAction($code)
    {
        if ($this->request->hasFiles()==true)
        {
            $image = $this->request->getUploadedFiles();
            $picNumber = $this->request->getPost("number");
            $picNumber++;
            foreach ($image as $item)
            {
                $ext = pathinfo($item->getName(), PATHINFO_EXTENSION);
                if ($ext=="jpg" || $ext=="gif" || $ext=="png")
                {
                    if ($item->getSize()>1000000)
                    {
                        $this->flash->notice("Uploaded file is larger than 1MB, cannot save");
                    } else {
                        $destination = "img/".$code;
                        $item->moveTo($destination."/picture".$picNumber.".jpg");
                    }
                } else {
                    $this->flash->notice("Uploaded file is in the wrong format");
                }
            }
            return $this->dispatcher->forward(array("controller" => "admin", "action" => "editApartment"));
        }
    }

    public function saveLangImageAction($code)
    {
        if ($this->request->hasFiles()==true)
        {
            $image = $this->request->getUploadedFiles();
            $language = Language::findFirst($code);
            $name = $language->getName();

            foreach ($image as $item)
            {
                $ext = pathinfo($item->getName(), PATHINFO_EXTENSION);
                if ($ext=="jpg" || $ext=="gif" || $ext=="png")
                {
                    if ($item->getSize()>1000000)
                    {
                        $this->flash->notice("Uploaded file is larger than 1MB, cannot save");
                    } else {
                        $destination = "img/flags";
                        $item->moveTo($destination."/".$name.".gif");
                    }
                } else {
                    $this->flash->notice("Uploaded file is in the wrong format");
                }


            }
            return $this->response->redirect("admin/language");
        }

    }

    public function deleteApartmentAction($code)
    {
        try {
            $manager = new Phalcon\Mvc\Model\Transaction\Manager;
            $transaction = $manager->get();
            $reservations = Reservation::find("apartment_code = '$code'");
            if ($reservations->count()>0)
            {
                $this->flashSession->notice("Cannot delete an apartment because there are still reservations on it");
                return $this->response->redirect("admin/apartment");
            } else {
                $prices = Pricelist::find("apartment_code = '$code'");
                foreach ($prices as $price)
                {
                    $price->setTransaction($transaction);
                    if ($price->delete()==false)
                    {
                        $transaction->rollback();
                    }
                }
                $unitSpecs = UnitSpecification::find("apartment_code = '$code'");
                foreach ($unitSpecs as $spec)
                {
                    $spec->setTransaction($transaction);
                    if ($spec->delete()==false)
                    {
                        $transaction->rollback();
                    }
                }
                $apartment = Apartment::findFirst($code);
                $apartment->setTransaction($transaction);
                if ($apartment->delete()==false)
                {
                    $transaction->rollback();
                }
                $path = "img/".$code."/";
                $pictures = glob($path."*");
                foreach ($pictures as $picture)
                {
                    unlink($picture);
                }
                rmdir($path);
                $this->flashSession->notice("Delete successfull");
                $transaction->commit();
                return $this->response->redirect("admin/apartment");

            }
        } catch(Phalcon\Mvc\Model\Transaction\Failed $e)
        {
            echo 'Failed, reason: ', $e->getMessage();
        }


    }

}