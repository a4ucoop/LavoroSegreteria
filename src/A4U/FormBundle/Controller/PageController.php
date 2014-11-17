<?php

namespace A4U\FormBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use A4U\FormBundle\Entity\PorteAperteEstate;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
	public function indexAction()
	{
		return $this->render('A4UFormBundle:Default:homepage.html.twig');
	}

	public function porte_aperte_estateAction(Request $request)
	{
        // crea un task fornendo alcuni dati fittizi per questo esempio
        $PorteAperteEstate = new PorteAperteEstate();
        //$task->setName('Gesù');
        //$task->setSurname('cristo');

        $form = $this->createFormBuilder($PorteAperteEstate)
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
                'choices'   => array('T' => 'Si', 'F' => 'No'),
                'required'  => false,
                ))
            ->add('otherActivity', 'text')
            ->add('reference', 'text')
            ->add('otherReference', 'text')
            ->add('unicamCourse', 'text')
            ->add('submissionDate', 'date')

            ->add('save', 'submit', array('label' => 'Iscriviti'))
            ->getForm();

        $form->handleRequest($request);

        //Form inviato
        if ($form->isValid()) {
            // esegue alcune azioni, come ad esempio salvare il task nella base dati
        
        // I validatori lato server sono ancora da aggiustare per ora i campi sono validati in HTML5 (a quanto pare)

        /*    $validator = $this->get('validator');
            $errori = $validator->validate($form);
            
            if (count($errori) > 0) {
                /*
                 * Usa un metodo a __toString sulla variabile $errors, che è un oggetto
                 * ConstraintViolationList. Questo fornisce una stringa adatta
                 * al debug
                 */
         /*       $errorsString = (string) $errori;

                return new Response($errorsString);
            }

            return new Response('Il nome è valido! Sì!');
        */
            return $this->redirect($this->generateUrl('a4_u_form_success'));
        }

        // Form non ancora inviato
        return $this->render('A4UFormBundle:Default:porte_aperte_estate.html.twig', array(
            'form' => $form->createView(),
        ));
	}

    public function successAction()
    {
        return $this->render('A4UFormBundle:Default:success.html.twig');
    }
}
