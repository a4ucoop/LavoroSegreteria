<?php

namespace A4U\FormBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use A4U\FormBundle\Entity\PorteAperteEstate;
use A4U\FormBundle\Entity\PorteAperteInverno;
use A4U\FormBundle\Entity\Stage;
use A4U\FormBundle\Entity\Generico;

use A4U\FormBundle\Form\Type\PorteAperteEstateType;
use A4U\FormBundle\Form\Type\PorteAperteInvernoType;
use A4U\FormBundle\Form\Type\StageType;
use A4U\FormBundle\Form\Type\GenericoType;

class PageController extends Controller
{
	public function indexAction()
	{
		return $this->render('A4UFormBundle:Default:homepage.html.twig');
	}


// -------------------------------PORTE APERTE ESTATE-------------------------------------

	public function porte_aperte_estateAction(Request $request)
	{
        $context = array(
            'name' => $request->get('name',''),
            'surname' => $request->get('surname',''),
            'fiscal_code' => $request->get('fiscal_code',''),
            'cap' => $request->get('cap',''),
            'city' => $request->get('city',''),
            'address' => $request->get('address',''),
            'email' => $request->get('email',''),
            'phone' => $request->get('phone',''),
            'birth_date' => $request->get('birth_date',''),
            'birth_place' => $request->get('birth_place',''),
        );


        $PorteAperteEstate = new PorteAperteEstate();

        $form = $this->createForm('porteAperteEstate', $PorteAperteEstate);

        $form->handleRequest($request);

        //Form inviato, viene validato
        if ($form->isValid()) {

            //Salva il nuovo utente nella base dati
            $em = $this->getDoctrine()->getManager();
            $em->persist($PorteAperteEstate);
            $em->flush();

            // Aggiunge un messaggio di successo alla homepage
            $this->get('session')->getFlashBag()->add(
                'notice', 'Utente registrato con successo!'
            );

            return $this->redirect($this->generateUrl('a4u_form_homepage'));
        }

        // Form non ancora inviato
        return $this->render('A4UFormBundle:Forms:porte_aperte_estate.html.twig', array(
            'form' => $form->createView(),
            'context' => $context,
        ));
	}

    public function showPAEAction()
    {
        $Users = $this->getDoctrine()
        ->getRepository('A4UFormBundle:PorteAperteEstate')
        ->findAll();

        if (!$Users)
        {
            return $this->render('A4UFormBundle:Exceptions:no_users_exception.html.twig');
        }

        return $this->render('A4UFormBundle:Forms:show_porte_aperte_estate.html.twig', array(
            'users' => $Users));
    }


// -------------------------------PORTE APERTE INVERNO-------------------------------------

    public function porte_aperte_invernoAction(Request $request)
    {
        $context = array(
            'name' => $request->get('name',''),
            'surname' => $request->get('surname',''),
            'fiscal_code' => $request->get('fiscal_code',''),
            'cap' => $request->get('cap',''),
            'city' => $request->get('city',''),
            'address' => $request->get('address',''),
            'email' => $request->get('email',''),
            'phone' => $request->get('phone',''),
            'birth_date' => $request->get('birth_date',''),
            'birth_place' => $request->get('birth_place',''),
        );

        $PorteAperteInverno = new PorteAperteInverno();

        $form = $this->createForm('porteAperteInverno', $PorteAperteInverno);

        $form->handleRequest($request);

        //Form inviato, viene validato
        if ($form->isValid()) {

            //Salva il nuovo utente nella base dati
            $em = $this->getDoctrine()->getManager();
            $em->persist($PorteAperteInverno);
            $em->flush();

            // Aggiunge un messaggio di successo alla homepage
            $this->get('session')->getFlashBag()->add(
                'notice', 'Utente registrato con successo!'
            );

            return $this->redirect($this->generateUrl('a4u_form_homepage'));
        }

        // Form non ancora inviato
        return $this->render('A4UFormBundle:Forms:porte_aperte_inverno.html.twig', array(
            'form' => $form->createView(),
            'context' => $context,
        ));
    }

    public function showPAIAction()
    {
        $Users = $this->getDoctrine()
        ->getRepository('A4UFormBundle:PorteAperteInverno')
        ->findAll();

        if (!$Users)
        {
            return $this->render('A4UFormBundle:Exceptions:no_users_exception.html.twig');
        }

        return $this->render('A4UFormBundle:Forms:show_porte_aperte_inverno.html.twig', array(
            'users' => $Users));
    }

// ---------------------------------------STAGE--------------------------------------------

    public function stageAction(Request $request)
    {
        $context = array(
            'name' => $request->get('name',''),
            'surname' => $request->get('surname',''),
            'fiscal_code' => $request->get('fiscal_code',''),
            'cap' => $request->get('cap',''),
            'city' => $request->get('city',''),
            'address' => $request->get('address',''),
            'email' => $request->get('email',''),
            'phone' => $request->get('phone',''),
            'birth_date' => $request->get('birth_date',''),
            'birth_place' => $request->get('birth_place',''),
        );

        $Stage = new Stage();

        $form = $this->createForm('stage', $Stage);

        $form->handleRequest($request);

        //Form inviato, viene validato
        if ($form->isValid()) {

            //Salva il nuovo utente nella base dati
            $em = $this->getDoctrine()->getManager();
            $em->persist($Stage);
            $em->flush();

            // Aggiunge un messaggio di successo alla homepage
            $this->get('session')->getFlashBag()->add(
                'notice', 'Utente registrato con successo!'
            );

            return $this->redirect($this->generateUrl('a4u_form_homepage'));
        }

        // Form non ancora inviato
        return $this->render('A4UFormBundle:Forms:stage.html.twig', array(
            'form' => $form->createView(),
            'context' => $context,
        )); 

    }

    public function showstageAction()
    {
        $Users = $this->getDoctrine()
        ->getRepository('A4UFormBundle:Stage')
        ->findAll();

        if (!$Users)
        {
            return $this->render('A4UFormBundle:Exceptions:no_users_exception.html.twig');
        }

        return $this->render('A4UFormBundle:Forms:show_stage.html.twig', array(
            'users' => $Users));
    }

// ---------------------------------------GENERICO--------------------------------------------

    public function genericoAction(Request $request)
    {
        $context = array(
            'name' => $request->get('name',''),
            'surname' => $request->get('surname',''),
            'fiscal_code' => $request->get('fiscal_code',''),
            'cap' => $request->get('cap',''),
            'city' => $request->get('city',''),
            'address' => $request->get('address',''),
            'email' => $request->get('email',''),
            'phone' => $request->get('phone',''),
            'birth_date' => $request->get('birth_date',''),
            'birth_place' => $request->get('birth_place',''),
        );

        $Generico = new Generico();

        $form = $this->createForm('generico', $Generico);

        $form->handleRequest($request);

        //Form inviato, viene validato
        if ($form->isValid()) {

            //Salva il nuovo utente nella base dati
            $em = $this->getDoctrine()->getManager();
            $em->persist($Generico);
            $em->flush();

            // Aggiunge un messaggio di successo alla homepage
            $this->get('session')->getFlashBag()->add(
                'notice', 'Utente registrato con successo!'
            );

            return $this->redirect($this->generateUrl('a4u_form_homepage'));
        }

        // Form non ancora inviato
        return $this->render('A4UFormBundle:Forms:generico.html.twig', array(
            'form' => $form->createView(),
            'context' => $context,
        )); 

    }

    public function showgenericoAction()
    {
        $Users = $this->getDoctrine()
        ->getRepository('A4UFormBundle:Generico')
        ->findAll();

        if (!$Users)
        {
            return $this->render('A4UFormBundle:Exceptions:no_users_exception.html.twig');
        }

        return $this->render('A4UFormBundle:Forms:show_generico.html.twig', array(
            'users' => $Users));
    }

// ---------------------------------------Prova Hera\Internet--------------------------------------------

    public function show_HeraAction()
    {
        $conn = $this->get('doctrine.dbal.hera_connection');
        #$pdo->exec("CREATE TABLE IF NOT EXISTS messages (id INTEGER PRIMARY KEY, title TEXT, message TEXT)");
        #$pdo->exec("INSERT INTO messages(id, title, message) VALUES (1, 'title', 'message')");
        
        #$pdo->exec("select * from Orientamento");
        #$Data = $conn->fetchAll();
        
        $statement = $conn->prepare('SELECT * FROM "Attivita"');
        $statement->execute();
        $Data = $statement->fetchAll();


        if (!$Data)
        {
            throw $this->createNotFoundException('Nessun utente trovato');
        }

        return $this->render('A4UFormBundle:Default:show_hera.html.twig', array(
            'data' => $Data));
    }
}

