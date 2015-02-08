<?php

// src/A4U/FormBundle/Form/Type/Stage.php

namespace A4U\FormBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

use Doctrine\ORM\EntityRepository;

use A4U\DataBundle\Entity\Attivita;
use A4U\DataBundle\Entity\AttivitaDate;
use A4U\DataBundle\Entity\OpzioniStage;
use A4U\DataBundle\Entity\OpzioniStageDett;
use A4U\DataBundle\Entity\StuAnagScuole;

class StageType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name', 'text', array(
                'label' => 'Nome*',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Nome'
                    )
                ))

            ->add('surname', 'text', array(
                'label' => 'Cognome*',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Cognome'
                    )
                ))

            ->add('address', 'text', array(
                'label' => 'Indirizzo*',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Indirizzo'
                    )
                ))

            ->add('cap', 'text', array(
                'label' => 'CAP*',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Codice aviazione postale'
                    )
                ))

            ->add('city', 'text', array(
                'label' => 'Città*',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Città di residenza'
                    )
                ))

            ->add('email', 'text', array(
                'label' => 'Email*',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Email'
                    )
                ))

            ->add('phone', 'text', array(
                'label' => 'Telefono*',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Numero di telefono'
                    )
                ))

            ->add('birthDate', 'collot_datetime', array( 
                'label' => 'Data di nascita*',
                'attr' => array(
                    'class' => 'form-control'),
                'pickerOptions' => array(
                        'minView' => 'month',
                        'format' => 'dd/mm/yyyy',
                        'autoclose' => true,
                        'language' => 'it',
                    )
                ))

            ->add('birthPlace', 'text', array(
                'label' => 'Luogo di nascita*',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Luogo di nascita'
                    )
                ))
            
            ->add('fiscalcode', 'text', array(
                'label' => 'Codice fiscale*',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Codice fiscale'
                    )
                ))

            ->add('attendedSchoolRegion', 'entity', array(
                /*
                    usando mapped false si dice a simfony che il campo non deve essere scritto
                    nell'entità
                */
                'mapped' => false,
                'label' => 'Regione della scuola*',
                'class' => 'A4UDataBundle:StuAnagScuole',
                'query_builder' => function(EntityRepository $er) {
                    return $er->getRegioni();
                    },
                'property' => 'regione',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Campo di studi'
                    )
                ))

            ->add('attendedSchoolDistrict', 'choice', array(
                'mapped' => false,
                'label' => 'Provincia della scuola di provenienza*',
                'choices' => array("Scegli una provincia..."),
                'attr' => array(
                    'class' => 'form-control',
                    )
                ))

             ->add('attendedSchoolCity', 'choice', array(
                'mapped' => false,
                'label' => 'Città della scuola di provenienza*',
                'choices' => array("Scegli una città..."),
                'attr' => array(
                    'class' => 'form-control',
                    )
                ))

             ->add('attendedSchool', 'choice', array(
                'mapped' => false,
                'label' => 'Scuola di provenienza*',
                'choices' => array("Scegli una scuola..."),
                'attr' => array(
                    'class' => 'form-control',
                    )
                ))

            ->add('schoolYear', 'choice', array(
                'label' => 'A quale anno sei iscritto?',
                'choices'   => array(3 =>'III', 4 => 'IV', 5 => 'V'),
                'attr' => array(
                    'class' => 'form-control'
                    )
                ))

            ->add('facebookContact', 'text', array(
                'label' => 'Contatto Facebook*',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Contatto Facebook'
                    )
                ))

            /*  
                invoca il query builder per interrogare la repo e farsi
                restituire le date disponibili che appartengono all'attivita
                con id 37, che non esiste ma vabbè... è cosi che lo fa il sito ufficiale!

                poi tramite property seleziona solo la descrizione del periodo
            */
            ->add('stagePeriod', 'entity', array(
                'label' => 'Periodo dello stage',
                'class' => 'A4UDataBundle:AttivitaDate',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('AD')
                                ->where('AD.attivo=1')
                                ->andWhere('AD.idAttivita=37');
                    },
                'property' => 'periodoDesc',
                'attr' => array(
                    'class' => 'form-control'
                    )
                ))

            ->add('studyField', 'entity', array(
                'label' => 'Campo di studi*',
                'class' => 'A4UDataBundle:OpzioniStage',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('OS')
                                ->where('OS.attivo=1');
                    },
                //'property' => 'Descrizione',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Campo di studi'
                    )
                ))


            ->add('secondChoice', 'choice', array(
                'label' => 'Seconda scelta*',
                'choices'   => array(3 =>'III', 4 => 'IV', 5 => 'V'),
                'attr' => array(
                    'class' => 'form-control'
                    )
                ))

            ->add('moneyPayed', 'choice', array(
                'label' => 'Quota versata*',
                'choices'   => array(
                    "€ 65 ( Iscrizione + 2 pernottamenti + 5 pasti)",
                    "€ 35 ( Iscrizione + 5 pasti )",
                    "€ 25 ( Iscrizione + 3 pasti )",
                    "€ 10 Iscrizione"),
                'attr' => array(
                    'class' => 'form-control'
                    )
                ))
 
            ->add('save', 'submit', array(
                'label' => 'Iscriviti',
                'attr' => array(
                    'class' => 'btn btn-primary btn-success'
                    )
                ));


        $formModifier = function (FormInterface $form, OpzioniStage $studyField = null)
        {
            $availableChoices = null === $studyField ? array("scegli un campo di studi...") : $studyField->getAvailableChoices($studyField);
            
            if ( !$availableChoices[0] == "scegli un campo di studi..." )
            {
                $form->add('firstChoice', 'choice', array(
                'label' => 'Prima scelta*',
                //'class' => 'A4UDataBundle:OpzioniStageDett',
                'choices'     => $availableChoices,
                //'property' => 'codStage',
                //'expanded' => true,
                //'multiple' => true,
                'attr' => array(
                    'class' => 'form-control',
                    )
                ));
            }
            else
            {
                $form->add('firstChoice', 'text', array(
                'label' => 'Prima scelta*',
                'attr' => array(
                    'class' => 'form-control disabled',
                    'placeholder' => 'Scegli un campo di studi...'
                    )
                ));
            }

        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
    
                // this would be your entity, i.e. SportMeetup
                $data = $event->getData();

                $formModifier($event->getForm(), $data->getstudyField());

            }
        );
    

        $builder->get('studyField')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                // It's important here to fetch $event->getForm()->getData(), as
                // $event->getData() will get you the client data (that is, the ID)
                $studyField = $event->getForm()->getData();

                // since we've added the listener to the child, we'll have to pass on
                // the parent to the callback functions!
                $formModifier($event->getForm()->getParent(), $studyField);
            }
        );


#--------------------------------Riempie la lista delle provincie--------------------------

        $addDistrict = function (FormInterface $form, StuAnagScuole $attendedSchoolRegion)
        {
            //$districts = $attendedSchoolRegion->getProvincie($attendedSchoolRegion);
                $form->add('attendedSchoolDistrict', 'entity', array(
                'mapped' => false,
                'label' => 'Provincia della scuola di provenienza*',
                'class' => 'A4UDataBundle:StuAnagScuole',
                'query_builder' => function(EntityRepository $er) use($attendedSchoolRegion) {
                    return $er->getProvincie($attendedSchoolRegion);
                    },
                'property' => 'provincia',
                'attr' => array(
                    'class' => 'form-control',
                    )
                ));
            
        };

        $builder->get('attendedSchoolRegion')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($addDistrict){
                $attendedSchoolRegion = $event->getForm()->getData();
                $addDistrict($event->getForm()->getParent(), $attendedSchoolRegion);
            }
        );

#--------------------------------Riempie la lista delle Città--------------------------

        $addCity = function (FormInterface $form, StuAnagScuole $attendedSchoolDistrict)
        {
            //$districts = $attendedSchoolRegion->getProvincie($attendedSchoolRegion);
                $form->add('attendedSchoolCity', 'entity', array(
                'mapped' => false,
                'label' => 'Città della scuola di provenienza*',
                'class' => 'A4UDataBundle:StuAnagScuole',
                'query_builder' => function(EntityRepository $er) use($attendedSchoolDistrict) {
                    return $er->getCitta($attendedSchoolDistrict);
                    },
                'property' => 'citta',
                'attr' => array(
                    'class' => 'form-control',
                    )
                ));
            
        };

        $builder->get('attendedSchoolDistrict')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($addCity){
                $attendedSchoolDistrict = $event->getForm()->getData();
                $addCity($event->getForm()->getParent(), $attendedSchoolDistrict);
            }
        );

    

    }


    public function getName()
    {
    	return 'stage';
    }

}
