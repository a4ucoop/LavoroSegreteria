<?php

namespace A4U\FormBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;
use A4U\DataBundle\Entity\OpzioniStageDett;

class AddFirstChoiceFieldSubscriber implements EventSubscriberInterface
{
    private $propertyPathToChoice;

    public function __construct($propertyPathToChoice)
    {
        $this->propertyPathToChoice = $propertyPathToChoice;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA  => 'preSetData',
            FormEvents::PRE_SUBMIT    => 'preSubmit'
        );
    }

    private function addSchoolForm($form, $studyField)
    {
        if($studyField){
            $formOptions = array(
                'class'         => 'A4UDataBundle:OpzioniStageDett',
                'empty_value'   => 'Prima scelta ...',
                'label'         => 'Prima scelta per lo stage*',
                'query_builder' => function(EntityRepository $er) use($studyField) {
                    return $er->getChoices($studyField);
                    },
                'property' => 'codStage',
                'attr' => array(
                    'class' => 'form-control',
                    )
            );
            $form->add($this->propertyPathToChoice, 'entity', $formOptions);
        }
        else {
            $formOptions = array(
               'mapped' => false,
               'label'  => 'Prima scelta per lo stage*',
               'choices' => array("Prima scelta..."),
               'attr' => array(
                   'class' => 'form-control',
                   )
            );
            $form->add($this->propertyPathToChoice, 'choice', $formOptions);
        }

    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getForm()->get('studyField')->getData();
        $form = $event->getForm();

        $this->addSchoolForm($form, $data);
    }

    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        $studyField = array_key_exists('studyField', $data) ? $data['studyField'] : null;

        $this->addSchoolForm($form, $studyField);
    }

}
