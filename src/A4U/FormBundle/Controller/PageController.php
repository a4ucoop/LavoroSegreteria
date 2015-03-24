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


    public function reportAction(){

    //  // $repositories = array('A4UFormBundle:PorteAperteEstate',
    //  //                       'A4UFormBundle:PorteAperteInverno',
    //  //                       'A4UFormBundle:Stage',
    //  //                       'A4UFormBundle:Generico');

      $iscritti = [];         //studenti iscritti alle attività (form)
      $fciscritti = [];         //Codici Fiscali degli studenti iscritti alle attività (form)
        
        //devo creare un vettore contenente tutti gli studenti iscritti alle attivita (form)
        //senza ripetizioni di codici fiscali (ottimizzazione)

//----------------DA RIFATTORIZZARE ASSOLUTAMENTE!--------------------------

        //prendo i dati da una repository
        $repository = $this->getDoctrine()
        ->getRepository('A4UFormBundle:PorteAperteInverno')
        ->createQueryBuilder('u')
        ->getQuery();
        $pai = $repository->getResult();

        //pusho tutti i dati sul vettore
        foreach ($pai as $item) {
            array_push($iscritti, $item);
            array_push($fciscritti, $item->getFiscalcode());
        }

        $repository = $this->getDoctrine()
        ->getRepository('A4UFormBundle:PorteAperteEstate')
        ->createQueryBuilder('u')
        ->getQuery();
        $pae = $repository->getResult();

        //le volte successive controllo che i codici che sto inserendo non siano gia presenti
        foreach ($pae as $item) {
            if(array_search(strtolower($item->getFiscalcode()),$fciscritti)===False) 
                array_push($iscritti,$item);
                array_push($fciscritti, $item->getFiscalcode());
        }

        $repository = $this->getDoctrine()
        ->getRepository('A4UFormBundle:Stage')
        ->createQueryBuilder('u')
        ->getQuery();
        $stage = $repository->getResult();

        //le volte successive controllo che i codici che sto inserendo non siano gia presenti
        foreach ($stage as $item) {
            if(array_search(strtolower($item->getFiscalcode()),$fciscritti)===False) 
                array_push($iscritti,$item);
                array_push($fciscritti, $item->getFiscalcode());
        }

        $repository = $this->getDoctrine()
        ->getRepository('A4UFormBundle:Generico')
        ->createQueryBuilder('u')
        ->getQuery();
        $generico = $repository->getResult();

        //le volte successive controllo che i codici che sto inserendo non siano gia presenti
        foreach ($generico as $item) {
            if(array_search(strtolower($item->getFiscalcode()),$fciscritti)===False) 
                array_push($iscritti,$item);
                array_push($fciscritti, $item->getFiscalcode());
        }

        //interrogo ESSE3 per sapere chi degli iscritti alle attività si è realmente iscritto

        $query="WITH ORDERED AS
            (
            SELECT
                CFSTUDENTE,
                COGNOME,
                NOME,
                NOMECDS,
                CFUCERTIFICATI,
                MEDIACERTIFICATA,
                AAID,
                ROW_NUMBER() OVER (PARTITION BY CFSTUDENTE ORDER BY AAID DESC) AS rn
            FROM
                V11_ERGO_STATO_CARRIERA
            )
            SELECT
                CFSTUDENTE,
                COGNOME,
                NOME,
                NOMECDS,
                AAID,
                CFUCERTIFICATI,
                MEDIACERTIFICATA
            FROM
                ORDERED
            WHERE
                rn = 1 AND (";

        foreach ($iscritti as $key) {
            $append="lower(CFSTUDENTE)='";
            $query=$query . $append . $key->getFiscalcode() . "' OR ";
        }

        $query = substr($query, 0, -3);
        $query=$query.")";

       $db="(DESCRIPTION=
           (ADDRESS_LIST=
           (ADDRESS=(PROTOCOL=TCP)
               (HOST=oracle11.unicam.it)(PORT=1521)
           )
           )
           (CONNECT_DATA=(SID=UGOVPROD))
       )";
       $conn = OCILogon("esse3_unicam_prod_read","r34d3ss33",$db);
       $statement = oci_parse($conn,$query);
       oci_execute($statement);

       $esse3_data = [];     //studenti iscritti su ESSE3

       //A questo punto su esse3_data ci sono tutti i dati delle persone iscritte alle attività e su esse3
       while ($row = oci_fetch_array($statement, OCI_ASSOC+OCI_RETURN_NULLS)) {
           array_push($esse3_data,$row);
       } 

       //devo trovare gli iscritti alle attività che NON si sono immatricolati
       $esse3_fc=[];            //codici fiscali presenti su esse3_data
       foreach ($esse3_data as $iscrittoEsse3) {
           array_push($esse3_fc,strtolower($iscrittoEsse3['CFSTUDENTE'])) ;
       }

       $nonIscrittiEsse3 = [];
       foreach ($iscritti as $iscrittoForms) {
            if(array_search(strtolower($iscrittoForms->getFiscalcode()),$esse3_fc)===False){
                $reportNonIscritto = new reportNonIscritti();
                $reportNonIscritto->CFSTUDENTE=($iscrittoForms->getFiscalcode());
                $reportNonIscritto->nome=($iscrittoForms->getName());
                $reportNonIscritto->cognome=($iscrittoForms->getSurname());
                array_push($nonIscrittiEsse3,$reportNonIscritto);
            }
       }

        return $this->render('A4UFormBundle:Forms:report.html.twig', array(
            'query' => $query,
            'esse3_data' => $esse3_data,
            'esse3_fc'=>$esse3_fc,
            'reportNonIscritti'=>$nonIscrittiEsse3,
            'iscrittiForms'=> $iscritti));


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

class reportIscritti{
    public $CFSTUDENTE;
    public $nome;
    public $cognome;
    public $corsoDiStudi;
    public $anno;
    public $CFUCERTIFICATI;
    public $mediaCertificata;

}

class reportNonIscritti{
    public $CFSTUDENTE;
    public $nome;
    public $cognome;
}