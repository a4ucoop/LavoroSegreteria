<?php

namespace A4U\FormBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use A4U\FormBundle\Entity\PorteAperteEstate;
use Symfony\Component\HttpFoundation\Request;
use A4U\FormBundle\Form\Type\PorteAperteEstateType;

class PageController extends Controller
{
	public function indexAction()
	{
		return $this->render('A4UFormBundle:Default:homepage.html.twig');
	}

	public function porte_aperte_estateAction(Request $request)
	{

        $PorteAperteEstate = new PorteAperteEstate();

        $form = $this->createForm('porteAperteEstate', $PorteAperteEstate);

        $form->handleRequest($request);

        //Form inviato, viene validato
        if ($form->isValid()) {
            // esegue alcune azioni, come ad esempio salvare il task nella base dati

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
