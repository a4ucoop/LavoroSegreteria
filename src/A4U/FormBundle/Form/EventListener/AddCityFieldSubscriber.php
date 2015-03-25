<?php

namespace A4U\FormBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;
use A4U\DataBundle\Entity\StuAnagScuole;

class AddCityFieldSubscriber implements EventSubscriberInterface
{
    private $propertyPathToCity;

    public function __construct($propertyPathToCity)
    {
        $this->propertyPathToCity = $propertyPathToCity;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA  => 'preSetData',
            FormEvents::PRE_SUBMIT    => 'preSubmit'
        );
    }

    private function addCityForm($form, $attendedSchoolDistrict)
    {
        if($attendedSchoolDistrict){
            $formOptions = array(
                'class'         => 'A4UDataBundle:StuAnagScuole',
                'mapped' => false,
                'empty_value'   => 'Scegli città',
                'label'         => 'Città della scuola di provenienza',
                'query_builder' => function(EntityRepository $er) use($attendedSchoolDistrict) {
                    return $er->getCittaStringa($attendedSchoolDistrict);
                    },
                'property' => 'citta',
                'attr' => array(
                    'class' => 'form-control',
                    ),
                'required' => false
            );
            $form->add($this->propertyPathToCity, 'entity', $formOptions);
        }
        else {
            $formOptions = array(
               'mapped' => false,
               'label' => 'Città della scuola di provenienza*',
               'choices' => array("Scegli una città..."),
               'attr' => array(
                   'class' => 'form-control',
                   ),
               'required' => false
            );
            $form->add($this->propertyPathToCity, 'choice', $formOptions);
        }

    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getForm()->get('attendedSchoolDistrict')->getData();
        $form = $event->getForm();

        $this->addCityForm($form, $data);
    }

    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        $school = array_key_exists('attendedSchoolDistrict', $data) ? $data['attendedSchoolDistrict'] : null;

        $this->addCityForm($form, $school);
    }

}
