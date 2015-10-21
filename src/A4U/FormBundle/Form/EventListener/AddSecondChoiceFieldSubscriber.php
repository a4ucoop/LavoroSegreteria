<?php

namespace A4U\FormBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;
use A4U\DataBundle\Entity\StageKind;

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

    private function addSchoolForm($form, $studyField, $stagePeriod)
    {
        if($studyField){
            $formOptions = array(
                'mapped' => false,
                'class'         => 'A4UDataBundle:StageKind',
                'empty_value'   => 'Seconda scelta ...',
                'label'         => 'Seconda scelta per lo stage*',
                'query_builder' => function(EntityRepository $er) use($studyField, $stagePeriod) {
                    return $er->getChoices($studyField, $stagePeriod);
                    },
                'property' => 'nomeStage',
                'attr' => array(
                    'class' => 'form-control',
                    ),
                'required' => false
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
                   ),
               'required' => false
            );
            $form->add($this->propertyPathToChoice, 'choice', $formOptions);
        }

    }

    public function preSetData(FormEvent $event)
    {
        $data1 = $event->getForm()->get('select_secondStudyField')->getData();
        $data2 = $event->getForm()->get('stagePeriod')->getData();
        $form = $event->getForm();

        $this->addSchoolForm($form, $data1, $data2);
    }

    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        $studyField = array_key_exists('select_secondStudyField', $data) ? $data['select_secondStudyField'] : null;
        $stagePeriod = array_key_exists('stagePeriod', $data) ? $data['stagePeriod'] : null;

        $this->addSchoolForm($form, $studyField, $stagePeriod);
    }

}
