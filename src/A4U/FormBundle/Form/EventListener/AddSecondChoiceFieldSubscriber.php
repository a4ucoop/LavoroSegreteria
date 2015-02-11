<?php

namespace A4U\FormBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;
use A4U\DataBundle\Entity\OpzioniStageDett;

class AddSecondChoiceFieldSubscriber implements EventSubscriberInterface
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
                'empty_value'   => 'Seconda scelta ...',
                'label'         => 'Seconda scelta per lo stage*',
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
               'label'  => 'Seconda scelta per lo stage*',
               'choices' => array("Seconda scelta..."),
               'attr' => array(
                   'class' => 'form-control',
                   )
            );
            $form->add($this->propertyPathToChoice, 'choice', $formOptions);
        }

    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getForm()->get('secondStudyField')->getData();
        $form = $event->getForm();

        $this->addSchoolForm($form, $data);
    }

    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        $studyField = array_key_exists('secondStudyField', $data) ? $data['secondStudyField'] : null;

        $this->addSchoolForm($form, $studyField);
    }

}
