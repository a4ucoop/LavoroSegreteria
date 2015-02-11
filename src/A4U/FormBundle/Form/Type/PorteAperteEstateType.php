<?php

// src/A4U/FormBundle/Form/Type/PorteAperteType.php

namespace A4U\FormBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

use Doctrine\ORM\EntityRepository;

use A4U\DataBundle\Entity\StuAnagScuole;

use A4U\FormBundle\Form\EventListener\AddCityFieldSubscriber;
use A4U\FormBundle\Form\EventListener\AddDistrictFieldSubscriber;
use A4U\FormBundle\Form\EventListener\AddSchoolFieldSubscriber;

class PorteAperteEstateType extends AbstractType
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
            ->add('attendedSchoolRegion', 'entity', array(
                'mapped' => false,
                'label' => 'Regione della scuola*',
                'empty_value' => 'Scegli una regione...',
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
            ->add('hasAttendedtoOtherActivities', 'choice', array(
                'label' => 'Hai frequentato altre attività di orientamento?',
                'choices'   => array( false => 'No', true => 'Si'),
                'attr' => array(
                    'class' => 'form-control'
                    )
                ))
            ->add('activity', 'choice', array(
                'required' => false,
                'label' => 'Attività frequentata',
                'choices' => array(
                        'Incontro di orientamento presso la Scuola' => 'Incontro di orientamento presso la Scuola',
                        'Piano Lauree Scientifiche' => 'Piano Lauree Scientifiche',
                        'Porte Aperte in Unicam a Camerino' => 'Porte Aperte in Unicam a Camerino',
                        'Progetto Ponte' => 'Progetto Ponte',
                        'Progetto Alternanza Scuola Lavoro' => 'Progetto Alternanza Scuola Lavoro',
                        'Progetto Crediti' => 'Progetto Crediti',
                        'Saloni di Orientamento' => 'Saloni di Orientamento',
                        'Stage in Unicam' => 'Stage in Unicam',
                        'Viaggi nella Conoscenza' => 'Viaggi nella Conoscenza',
                        'Visite Guidate in Ateneo' => 'Visite Guidate in Ateneo',
                        'altro' => 'altro...'
                    ),
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'A quali altre attività di orientamento hai partecipato?'
                    )
                ))
            ->add('otherActivity', 'text', array(
                'required' => false,
                'label' => 'Altro',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Altro'
                    )
                ))
            ->add('reference', 'choice', array(
                'required' => false,
                'label' => 'Come sei venuto a conoscenza di Unicam?',
                'choices' => array(
                        'Ho consultato il sito internet www.unicam.it' => 'Ho consultato il sito internet www.unicam.it',
                        'Ho ricevuto la comunicazione dai docenti della mia scuola superiore' => 'Ho ricevuto la comunicazione dai docenti della mia scuola superiore',
                        'Ho visto l’annuncio pubblicitario su facebook' => 'Ho visto l’annuncio pubblicitario su facebook',
                        'altro' => 'Altro...'
                    ),
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Come sei venuto a conoscenza di unicam?'
                    )
                ))
            ->add('otherReference', 'text', array(
                'required' => false,
                'label' => 'Altro',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Altro'
                    )
                ))
            ->add('unicamCourse', 'text', array(
                'label' => 'Corso di studi*',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'A quale corso di studi sei interessato/a?'
                    )
                ))
            ->add('fiscalcode', 'text', array(
                'label' => 'Codice fiscale*',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Codice fiscale'
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
    	return 'porteAperteEstate';
    }

}
