<?php

namespace WBB\UserBundle\Form\Factory;

use FOS\UserBundle\Form\Factory\FactoryInterface;
use Symfony\Component\Form\FormFactoryInterface;

class FormFactory implements FactoryInterface
{
    private $formFactory;
    private $name;
    private $type;
    private $validationGroups;

    public function __construct(FormFactoryInterface $formFactory, $name, $type, array $validationGroups = null)
    {
        $this->formFactory = $formFactory;
        $this->name = $name;
        $this->type = $type;
        $this->validationGroups = $validationGroups;
    }

    public function createForm($light = false)
    {
        if($light){
            return $this->formFactory->createNamed($this->name, 'wbb_user_registration_light', null, array('validation_groups' => $this->validationGroups));
        }else{
            return $this->formFactory->createNamed($this->name, $this->type, null, array('validation_groups' => $this->validationGroups));
        }
    }
}