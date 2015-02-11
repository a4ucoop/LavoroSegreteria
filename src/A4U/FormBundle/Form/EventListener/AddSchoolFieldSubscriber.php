<?php

namespace A4U\FormBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;
use A4U\DataBundle\Entity\StuAnagScuole;

class AddSchoolFieldSubscriber implements EventSubscriberInterface
{
    private $propertyPathToSchool;

    public function __construct($propertyPathToSchool)
    {
        $this->propertyPathToSchool = $propertyPathToSchool;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA  => 'preSetData',
            FormEvents::PRE_SUBMIT    => 'preSubmit'
        );
    }

    private function addSchoolForm($form, $attendedSchoolCity)
    {
        if($attendedSchoolCity){
            $formOptions = array(
                'class'         => 'A4UDataBundle:StuAnagScuole',
                #'mapped' => false,
                'empty_value'   => 'Scegli la scuola....',
                'label'         => 'Scuola di provenienza',
                'query_builder' => function(EntityRepository $er) use($attendedSchoolCity) {
                    return $er->getSchoolString($attendedSchoolCity);
                    },
                #'property' => 'denominazione',
                'attr' => array(
                    'class' => 'form-control',
                    )
            );
            $form->add($this->propertyPathToSchool, 'entity', $formOptions);
        }
        else {
            $formOptions = array(
               'mapped' => false,
               'label' => 'Scuola di provenienza*',
               'choices' => array("Scegli una scuola..."),
               'attr' => array(
                   'class' => 'form-control',
                   )
            );
            $form->add($this->propertyPathToSchool, 'choice', $formOptions);
        }

    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getForm()->get('attendedSchoolCity')->getData();
        $form = $event->getForm();

        $this->addSchoolForm($form, $data);
    }

    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        $school = array_key_exists('attendedSchoolCity', $data) ? $data['attendedSchoolCity'] : null;

        $this->addSchoolForm($form, $school);
    }

}
