<?php

// src/A4U/FormBundle/Form/Type/OpenDay.php

namespace A4U\FormBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class OpenDayType extends AbstractType
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

            ->add('attendedSchool', 'choice', array(
                'label' => 'Corso*',
                'empty_value'   => 'Scegli il corso....',
                'choices'   => array(
                    "Disegno industriale e ambientale" => "Disegno industriale e ambientale",
                    "Scienze dell'architettura" => "Scienze dell'architettura",
                    "Tecnologie e diagnostica per la conservazione e il restauro" => "Tecnologie e diagnostica per la conservazione e il restauro", 
                    "Biosciences and biotechnology" => "Biosciences and biotechnology",
                    "Sicurezza delle produzioni (animali) zootecniche e valorizzazione delle tipicità alimentari di origine animale" => "Sicurezza delle produzioni (animali) zootecniche e valorizzazione delle tipicità alimentari di origine animale",
                    "Medicina veterinaria" => "Medicina veterinaria",
                    "Scienze sociali per gli enti non-profit e la cooperazione internazionale" => "Scienze sociali per gli enti non-profit e la cooperazione internazionale",
                    "Giurisprudenza" => "Giurisprudenza",
                    "Informazione scientifica sul farmaco e scienze del fitness e dei prodotti della salute" => "Informazione scientifica sul farmaco e scienze del fitness e dei prodotti della salute",
                    "Farmacia" => "Farmacia",
                    "Chimica e tecnologia farmaceutiche" => "Chimica e tecnologia farmaceutiche",
                    "Chimica" => "Chimica",
                    "Fisica" => "Fisica",
                    "Informatica" => "Informatica",
                    "Matematica e applicazioni" => "Matematica e applicazioni",
                    "Scienze geologiche, naturali e ambientali" => "Scienze geologiche, naturali e ambientali",
                    "Biologia della nutrizione" => "Biologia della nutrizione" ),
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Campo di studi'
                    )
                ))

            ->add('attendedActivity', 'choice', array(
                'label' => 'Attivita*',
                'choices'   => array(
                    "15 luglio - Ascoli Piceno" => "15 luglio - Ascoli Piceno",
                    "21 luglio - Ascoli piceno" => "21 luglio - Ascoli piceno",
                    "22 luglio Camerino - Matelica" => "22 luglio Camerino - Matelica",
                    "23 luglio - San Benedetto del Tronto" => "23 luglio - San Benedetto del Tronto"
                    ),
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
    	return 'openday';
    }

}
