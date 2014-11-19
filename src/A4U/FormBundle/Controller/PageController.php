<?php

namespace A4U\FormBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use A4U\FormBundle\Entity\PorteAperteEstate;
use A4U\FormBundle\Entity\Stage;

use A4U\FormBundle\Form\Type\PorteAperteEstateType;
use A4U\FormBundle\Form\Type\StageType;

class PageController extends Controller
{
	public function indexAction()
	{
		return $this->render('A4UFormBundle:Default:homepage.html.twig');
	}


// -------------------------------PORTE APERTE ESTATE-------------------------------------

	public function porte_aperte_estateAction(Request $request)
	{

        $PorteAperteEstate = new PorteAperteEstate();

        $form = $this->createForm('porteAperteEstate', $PorteAperteEstate);

        $form->handleRequest($request);

        //Form inviato, viene validato
        if ($form->isValid()) {

            //Salva il nuovo utente nella base dati
            $em = $this->getDoctrine()->getManager();
            $em->persist($PorteAperteEstate);
            $em->flush();

            return new Response('Creato l\'utente con id '.$PorteAperteEstate->getId().' in PorteAperteEstate');
            //return $this->redirect($this->generateUrl('a4_u_form_success'));
        }

        // Form non ancora inviato
        return $this->render('A4UFormBundle:Forms:porte_aperte_estate.html.twig', array(
            'form' => $form->createView(),
        ));
	}

    public function showPAEAction()
    {
        $Users = $this->getDoctrine()
        ->getRepository('A4UFormBundle:PorteAperteEstate')
        ->findAll();

        if (!$Users)
        {
            throw $this->createNotFoundException('Nessun utente trovato');
        }

        return $this->render('A4UFormBundle:Forms:show_porte_aperte_estate.html.twig', array(
            'users' => $Users));
    }


// -------------------------------PORTE APERTE INVERNO-------------------------------------

    public function porte_aperte_invernoAction(Request $request)
    {
        // TBD
    }

    public function showPAIAction()
    {
        // TBD
    }

// ---------------------------------------STAGE--------------------------------------------

    public function stageAction(Request $request)
    {
        $Stage = new Stage();

        $form = $this->createForm('stage', $Stage);

        $form->handleRequest($request);

        //Form inviato, viene validato
        if ($form->isValid()) {

            //Salva il nuovo utente nella base dati
            $em = $this->getDoctrine()->getManager();
            $em->persist($Stage);
            $em->flush();

            return new Response('Creato l\'utente con id '.$Stage->getId(). ' in Stage');
            //return $this->redirect($this->generateUrl('a4_u_form_success'));
        }

        // Form non ancora inviato
        return $this->render('A4UFormBundle:Forms:stage.html.twig', array(
            'form' => $form->createView(),
        )); 

    }

    public function showstageAction()
    {
        $Users = $this->getDoctrine()
        ->getRepository('A4UFormBundle:Stage')
        ->findAll();

        if (!$Users)
        {
            throw $this->createNotFoundException('Nessun utente trovato');
        }

        return $this->render('A4UFormBundle:Forms:show_stage.html.twig', array(
            'users' => $Users));
    }

}
