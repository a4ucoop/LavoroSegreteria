<?php

namespace A4U\FormBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;
use A4U\DataBundle\Entity\StuAnagScuole;

class AddDistrictFieldSubscriber implements EventSubscriberInterface
{
    private $propertyPathToDistrict;

    public function __construct($propertyPathToDistrict)
    {
        $this->propertyPathToDistrict = $propertyPathToDistrict;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA  => 'preSetData',
            FormEvents::PRE_SUBMIT    => 'preSubmit'
        );
    }

    private function addDistrictForm($form, $attendedSchoolRegion)
    {
        if($attendedSchoolRegion){
            $formOptions = array(
                'class'         => 'A4UDataBundle:StuAnagScuole',
                'mapped' => false,
                'empty_value'   => 'Scegli Provincia..',
                'label'         => 'Provincia della scuola di provenienza*',
                'query_builder' => function(EntityRepository $er) use($attendedSchoolRegion) {
                    return $er->getProvincieStringa($attendedSchoolRegion);
                    },
                'property' => 'provincia',
                'attr' => array(
                    'class' => 'form-control',
                    )
            );
            $form->add($this->propertyPathToDistrict, 'entity', $formOptions);
        }
        else {
            $formOptions = array(
               'mapped' => false,
               'label' => 'Provincia della scuola di provenienza*',
               'choices' => array("Scegli una provincia..."),
               'attr' => array(
                   'class' => 'form-control',
                   )
            );
            $form->add($this->propertyPathToDistrict, 'choice', $formOptions);
        }

    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getForm()->get('attendedSchoolRegion')->getData();
        $form = $event->getForm();

        $this->addDistrictForm($form, $data);
    }

    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        $school = array_key_exists('attendedSchoolRegion', $data) ? $data['attendedSchoolRegion'] : null;

        $this->addDistrictForm($form, $school);
    }

}
