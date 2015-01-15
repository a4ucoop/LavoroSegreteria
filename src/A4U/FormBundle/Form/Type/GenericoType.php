<?php

// src/A4U/FormBundle/Form/Type/Generico.php

namespace A4U\FormBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class GenericoType extends AbstractType
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

            ->add('attendedActivity', 'text', array(
                'label' => 'Attivita Frequentata*',
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Attivita Frequentata'
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
    	return 'generico';
    }

}