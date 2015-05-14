<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 30/04/15
 * Time: 17:04
 */

class ApartmentController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction($code)
    {
        $apartment = Apartment::findFirst($code);
        $this->view->apartmentCode = $apartment->getCode();
        $this->view->size = $apartment->getSize();
        $this->view->bedrooms = $apartment->getBedroomNumber();
        $this->view->bathrooms = $apartment->getBathroomNumber();
        $this->view->rating = $apartment->getRating();
        $this->view->category = $apartment->getCategory();

        $this->view->form = new ReservationForm();

        $pricelist = new Pricelist();
        $prices = $pricelist->pricesBySeason($code);
        $this->view->seasonPrices = $prices;

        $availability = Reservation::find("apartment_code = '$code'");
        if ($availability->count()>0)
        {
            $this->view->availability = false;
        } else $this->view->availability = true;

        $apartments = Apartment::find();
        $this->view->apartments = $apartments;
        $unitSpec = new UnitSpecification();
        $allSpecs = $unitSpec->findSpecification();
        $this->view->specifications = $allSpecs;



    }

    public function listAction()
    {
        if ($this->request->isPost()==true)
        {
            $apartment = new Apartment();
            $size = $this->request->getPost("size");
            $rating = $this->request->getPost("rating");
            $category = $this->request->getPost("category");
            $bedrooms = $this->request->getPost("bedrooms");
            $bathrooms = $this->request->getPost("bathrooms");
            $list = $apartment->filter($size, $rating, $category, $bedrooms, $bathrooms);
            $unitSpec = new UnitSpecification();
            $specTypes = Specification::find();
            $allSpecs = $unitSpec->findSpecification();
            $bool = false;

            foreach ($allSpecs as $type)
            {
                $value = $this->request->getPost($type->specification->getCode());
                if ($value == "on")
                {
                    $bool = true;
                }
            }

            if ($bool == true)
            {
                $items = array();
                foreach ($list as $unit)
                {
                    foreach ($allSpecs as $type)
                    {
                        if ($unit->getCode() == $type->unitSpecification->getApartmentCode())
                        {
                            $value = $this->request->getPost($type->specification->getCode());
                            if (($value == "on") && ($type->unitSpecification->getSpecificationCode() == $type->specification->getCode()))
                            {
                                $items[$unit->getCode()]["code"] = $unit->getCode();
                                $items[$unit->getCode()]["size"] = $unit->getSize();
                                $items[$unit->getCode()]["rating"] = $unit->getRating();
                                $items[$unit->getCode()]["category"] = $unit->getCategory();
                                $items[$unit->getCode()]["bedrooms"] = $unit->getBedroomNumber();
                                $items[$unit->getCode()]["bathrooms"] = $unit->getBathroomNumber();

                            }

                        }
                    }
                }
                $this->view->list = $items;
                $this->view->specifications = $allSpecs;
                $this->view->form = new FilterForm();

                $this->view->specFilter = $specTypes;
                foreach ($specTypes as $spec)
                {
                    $specCode = $spec->getCode();
                    $this->forms->set("formFilter" . $specCode, new FilterSpecificationForm($spec));
                }
                $this->view->pick("apartment/listFilter");
            } else {
                $this->view->list = $list;
                $this->view->specifications = $allSpecs;
                $this->view->form = new FilterForm();

                $this->view->specFilter = $specTypes;
                foreach ($specTypes as $spec)
                {
                    $specCode = $spec->getCode();
                    $this->forms->set("formFilter" . $specCode, new FilterSpecificationForm($spec));
                }
            }

        } else {
            $list = Apartment::find();
            $this->view->list = $list;
            $unitSpec = new UnitSpecification();
            $allSpecs = $unitSpec->findSpecification();
            $this->view->specifications = $allSpecs;
            $this->view->form = new FilterForm();
            $unitSpec = new UnitSpecification();
            $allSpecs = $unitSpec->findSpecification();
            $this->view->specifications = $allSpecs;
            $specTypes = Specification::find();
            $this->view->specFilter = $specTypes;
            foreach ($specTypes as $spec)
            {
                $specCode = $spec->getCode();
                $this->forms->set("formFilter" . $specCode, new FilterSpecificationForm($spec));
            }
        }
    }
}