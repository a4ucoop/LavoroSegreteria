<?php

namespace A4U\FormBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use A4U\FormBundle\Entity\PorteAperteEstate;
use Symfony\Component\HttpFoundation\Request;
use A4U\FormBundle\Form\Type\PorteAperteEstateType;
use ArrayObject;

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

            //Salva il nuovo utente nella base dati
            $em = $this->getDoctrine()->getManager();
            $em->persist($PorteAperteEstate);
            $em->flush();

            return new Response('Creato l\'utente con id '.$PorteAperteEstate->getId());
            //return $this->redirect($this->generateUrl('a4_u_form_success'));
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

    public function showAction()
    {
        $Users = $this->getDoctrine()
        ->getRepository('A4UFormBundle:PorteAperteEstate')
        ->findAll();

        if (!$Users)
        {
            throw $this->createNotFoundException('Nessun utente trovato');
        }

        return $this->render('A4UFormBundle:Default:show.html.twig', array(
            'users' => $Users));
/*        $names = new ArrayObject();

        foreach ($Users as $user) {
            $names->append($user->getName());
        }
        return new Response('Utenti registrati: '. $names);*/
    }
}
