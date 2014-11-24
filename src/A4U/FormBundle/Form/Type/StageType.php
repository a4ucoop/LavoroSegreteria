<?php

// src/A4U/FormBundle/Form/Type/Stage.php

namespace A4U\FormBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class StageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        
            ->add('name', 'text')
            ->add('surname', 'text')
            ->add('birthPlace', 'text')
            ->add('birthDate', 'birthday', array('format' => 'dd MM yyyy'))
            ->add('address', 'text')
            ->add('cap', 'text')
            ->add('city', 'text')
            ->add('fiscalCode', 'text')
            ->add('attendedSchool', 'text')
            ->add('schoolYear', 'integer')
            ->add('email', 'text')
            ->add('phone', 'text')
            ->add('facebookContact', 'text')
            ->add('stagePeriod', 'text')
            ->add('studyField', 'text')
            ->add('moneyPayed', 'text')
            
            ->add('save', 'submit', array('label' => 'Iscriviti'));
    }

    public function getName()
    {
    	return 'stage';
    }

}