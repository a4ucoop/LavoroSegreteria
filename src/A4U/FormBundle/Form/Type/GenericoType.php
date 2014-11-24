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
        
            ->add('name', 'text')
            ->add('surname', 'text')
            ->add('address', 'text')
            ->add('cap', 'text')
            ->add('city', 'text')
            ->add('email', 'text')
            ->add('birthDate', 'birthday', array('format' => 'dd MM yyyy'))
            ->add('birthPlace', 'text')
            ->add('fiscalCode', 'text')
            
            ->add('save', 'submit', array('label' => 'Iscriviti'));
    }

    public function getName()
    {
    	return 'generico';
    }

}