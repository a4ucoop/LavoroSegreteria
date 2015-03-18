<?php

namespace A4U\FormBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use A4U\FormBundle\Entity\PorteAperteEstate;
use A4U\FormBundle\Entity\PorteAperteInverno;
use A4U\FormBundle\Entity\Stage;
use A4U\FormBundle\Entity\Generico;

use A4U\DataBundle\Entity\Attivita;
use A4U\DataBundle\Entity\AttivitaDate;
use A4U\DataBundle\Entity\OpzioniStage;
use A4U\DataBundle\Entity\OpzioniStageDett;
use A4U\DataBundle\Entity\StuAnagScuole;


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

    public function porte_aperte_estate_editAction($id, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $paes = $em->getRepository('A4UFormBundle:PorteAperteEstate')->find($id);
        if (!$paes) {
          throw $this->createNotFoundException(
                  'No porte aperte estate found for id ' . $id
          );
        }

        $context = array(
            'name' => $paes->getName(),
            'surname' => $paes->getSurname(),
            'fiscal_code' => $paes->getFiscalCode(),
            'cap' => $paes->getCap(),
            'city' => $paes->getCity(),
            'address' => $paes->getAddress(),
            'email' => $paes->getEmail(),
            'phone' => $paes->getPhone(),
            'birth_date' => $paes->getBirthDateAsString(),
            'birth_place' => $paes->getBirthPlace(),
            'has_attended_to_other_activities' => $paes->getHasAttendedToOtherActivitiesAsString(),
            'activity' => $paes->getActivity(), 
            'other_activity' => $paes->getOtherActivity(),
            'reference' => $paes->getReference(),
            'other_reference' => $paes->getOtherReference(),
            'unicam_course' => $paes->getUnicamCourse(),
            'attended_school' => $paes->getAttendedSchool()
        );
    
        $form = $this->createForm('porteAperteEstate', $paes);

        $form->handleRequest($request);

        //Form inviato, viene validato
        if ($form->isValid()) {

            //Salva il nuovo utente nella base dati
            $em = $this->getDoctrine()->getManager();
            $em->persist($paes);
            $em->flush();

            // Aggiunge un messaggio di successo alla homepage
            $this->get('session')->getFlashBag()->add(
                'notice', 'Utente modificato con successo!'
            );

            return $this->redirect($this->generateUrl('a4u_form_homepage'));
        }

        // Form non ancora inviato
        return $this->render('A4UFormBundle:Forms:porte_aperte_estate_edit.html.twig', array(
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
        
        $subscribed = $this->matchEsse3Action('A4UFormBundle:PorteAperteEstate');

        return $this->render('A4UFormBundle:Forms:show_porte_aperte_estate.html.twig', array(
            'users' => $Users,
            'subscribed' => $subscribed));
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
	
	   $subscribed = $this->matchEsse3Action('A4UFormBundle:PorteAperteInverno');

        return $this->render('A4UFormBundle:Forms:show_porte_aperte_inverno.html.twig', array(
            'users' => $Users,
	        'subscribed' => $subscribed));
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

        $Stage = new Stage();;      

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

        $subscribed = $this->matchEsse3Action('A4UFormBundle:Stage');

        return $this->render('A4UFormBundle:Forms:show_stage.html.twig', array(
            'users' => $Users,
            'subscribed' => $subscribed));
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

        $subscribed = $this->matchEsse3Action('A4UFormBundle:Generico');

        return $this->render('A4UFormBundle:Forms:show_generico.html.twig', array(
            'users' => $Users,
            'subscribed' => $subscribed));
    }

// ---------------------------------------Prova Hera\Internet--------------------------------------------

    public function show_HeraAction()
    {
        $conn = $this->get('doctrine.dbal.hera_connection');
        #$pdo->exec("CREATE TABLE IF NOT EXISTS messages (id INTEGER PRIMARY KEY, title TEXT, message TEXT)");
        #$pdo->exec("INSERT INTO messages(id, title, message) VALUES (1, 'title', 'message')");
        
        #$pdo->exec("select * from Orientamento");
        #$Data = $conn->fetchAll();
        
        $statement = $conn->prepare('SELECT * FROM STU_ANAG_SCUOLE');
        $statement->execute();
        $Scuole = $statement->fetchAll();


        if (!$Scuole)
        {
            throw $this->createNotFoundException('Nessun utente trovato');
        }

        return $this->render('A4UFormBundle:Default:show_hera.html.twig', array(
            'scuole' => $Scuole));
    }


// ---------------------------------------MATCH ESSE3--------------------------------------------
    
    public function matchEsse3Action($repository)
    {

        $db="(DESCRIPTION=
            (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
                (HOST=oracle11.unicam.it)(PORT=1521)
            )
            )
            (CONNECT_DATA=(SID=UGOVPROD))
        )";
        $conn = OCILogon("esse3_unicam_prod_read","r34d3ss33",$db);
        $statement = oci_parse($conn,"select COD_FIS from V_STAT_ANAGRAFICA");
        oci_execute($statement);

        $repository = $this->getDoctrine()
                ->getRepository($repository)
                ->createQueryBuilder('u')
                ->getQuery();
        $pai = $repository->getResult();


        $esse3_data = [];
        $subscribed = [];
        $not_subscribed = [];

        while ($row = oci_fetch_array($statement, OCI_ASSOC+OCI_RETURN_NULLS)) {
            array_push($esse3_data,strtolower($row['COD_FIS']));
        } 

        foreach ($pai as $item) {

            if(array_search(strtolower($item->getFiscalcode()),$esse3_data)!=False){
                array_push($subscribed,$item->getFiscalcode());
            } else {
                array_push($not_subscribed,$item->getFiscalcode());
            }

        }

        return $subscribed;
    }

// ---------------------------------------SHOW STUDENT ESSE3--------------------------------------------
    
    public function showStudentAction($fc)
    {

        $db="(DESCRIPTION=
            (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP)
                (HOST=oracle11.unicam.it)(PORT=1521)
            )
            )
            (CONNECT_DATA=(SID=UGOVPROD))
        )";

        $query="select * from V_STAT_ANAGRAFICA where LOWER(COD_FIS)='".$fc."'";//"DMNMHL94A06I324Q"

        $conn = OCILogon("esse3_unicam_prod_read","r34d3ss33",$db);
        $statement = oci_parse($conn,$query);
        oci_execute($statement);

        $student = new studente();
        $studenti = [];

        while ($row = oci_fetch_array($statement, OCI_ASSOC+OCI_RETURN_NULLS)) {
            $student->matricola = $row['MATRICOLA'];
            $student->nome = $row['NOME'];
            $student->cognome = $row['COGNOME'];
            $student->sesso = $row['SESSO'];
            $student->codiceFiscale = $row['COD_FIS'];
            array_push($studenti,$student);
        }
        return $this->render('A4UFormBundle:Forms:show_student.html.twig', array(
            'studenti' => $studenti));
    }

}

class studente{
    public $matricola;
    public $nome;
    public $cognome;
    public $sesso;
    public $codiceFiscale;
        
//  public $dataDiNascita;
//  
//  public $regioneCittaDiNascita;
//  public $provinciaCittaDiNascita;
//  public $cittaDiNascita;
//  
//  public $nazioneCittaDiResidenza;
//  public $regioneCittaDiResidenza;
//  public $provinciaCittaDiResidenza;
//  public $cittaDiResidenza;
//  public $viaCittaDiResidenza;
//  public $numeroViacittaDiResidenza;

//  public $email;
//  public $cellulare;

//  public $titoloDiStudio;
//  public $attivo;
//  public $dataImmatricolazione;
//  public $ateneo;
//  public $nome;
//  public $nome;
//  public $nome;

}

