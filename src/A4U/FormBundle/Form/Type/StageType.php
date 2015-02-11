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

use A4U\FormBundle\Form\EventListener\AddCityFieldSubscriber;
use A4U\FormBundle\Form\EventListener\AddDistrictFieldSubscriber;
use A4U\FormBundle\Form\EventListener\AddSchoolFieldSubscriber;
use A4U\FormBundle\Form\EventListener\AddFirstChoiceFieldSubscriber;
use A4U\FormBundle\Form\EventListener\AddSecondChoiceFieldSubscriber;

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
                'mapped' => false,
                'label' => 'Regione della scuola*',
                'empty_value'   => 'Scegli la regione....',
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

               ->addEventSubscriber(new AddDistrictFieldSubscriber('attendedSchoolDistrict'))

              ->addEventSubscriber(new AddCityFieldSubscriber('attendedSchoolCity'))

              ->addEventSubscriber(new AddSchoolFieldSubscriber('attendedSchool'))
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

            ->add('select_firstStudyField', 'entity', array(
                'mapped' => false,
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

            ->add('firstStudyField', 'text', array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'firstStudyField'
                    )
                ))            

            ->addEventSubscriber(new AddFirstChoiceFieldSubscriber('select_firstChoice'))

            ->add('firstChoice', 'text', array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'firstChoice'
                    )
                ))  

            ->add('select_secondStudyField', 'entity', array(
                'mapped' => false,
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

            ->add('secondStudyField', 'text', array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'secondStudyField'
                    )
                ))  

            ->addEventSubscriber(new AddSecondChoiceFieldSubscriber('select_secondChoice'))

            ->add('secondChoice', 'text', array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'secondChoice'
                    )
                ))  

            ->add('moneyPayed', 'choice', array(
                'label' => 'Quota versata*',
                'choices'   => array(
                    "€ 65 ( Iscrizione + 2 pernottamenti + 5 pasti)" => "€ 65 ( Iscrizione + 2 pernottamenti + 5 pasti)",
                    "€ 35 ( Iscrizione + 5 pasti )" => "€ 35 ( Iscrizione + 5 pasti )",
                    "€ 25 ( Iscrizione + 3 pasti )" => "€ 25 ( Iscrizione + 3 pasti )",
                    "€ 10 Iscrizione" => "€ 10 Iscrizione"),
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

    }


    public function getName()
    {
    	return 'stage';
    }

}
