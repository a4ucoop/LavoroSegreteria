<?php

// src/A4U/FormBundle/Form/Type/PorteAperteType.php

namespace A4U\FormBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PorteAperteEstateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')//, array('required' => false))
            ->add('surname', 'text')
            ->add('address', 'text')
            ->add('cap', 'text')
            ->add('city', 'text')
            ->add('email', 'text')
            ->add('phone', 'text')
            ->add('birthDate', 'birthday')
            ->add('birthPlace', 'text')
            ->add('attendedSchool', 'text')
            ->add('attendedSchoolCity', 'text')
            ->add('hasAttendedtoOtherActivities', 'choice', array(
                'choices'   => array( true => 'Si', false => 'No')
                ))
            ->add('activity', 'text')
            ->add('otherActivity', 'text')
            ->add('reference', 'text')
            ->add('otherReference', 'text')
            ->add('unicamCourse', 'text')
            ->add('submissionDate', 'date')

            ->add('save', 'submit', array('label' => 'Iscriviti'));
    }

    public function getName()
    {
    	return 'porteAperteEstate';
    }

}