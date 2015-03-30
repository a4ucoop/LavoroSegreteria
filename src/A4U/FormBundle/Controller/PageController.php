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
        return $this->render('A4UFormBundle:Forms:show_porte_aperte_estate.html.twig', array(
        'users' => $Users));
    }

    public function reportPAEAction()
    {
        $Users = $this->getDoctrine()
        ->getRepository('A4UFormBundle:PorteAperteEstate')
        ->findAll();

        if (!$Users)
        {
            return $this->render('A4UFormBundle:Exceptions:no_users_exception.html.twig');
        }
       
       //ricavo il vettore degli iscritti a PAI che si sono immatricolati (array di oggetti!)
       $subscribed = $this->matchEsse3Action('A4UFormBundle:PorteAperteEstate');
       
       //ricavo un vettore contenente solo i codici fiscali degli immatricolati per fare la ricerca
       $fcsubscribed = [];
       foreach ($subscribed as $key) {
        array_push($fcsubscribed, strtolower($key['CFSTUDENTE']));
       }

       //a questo punto devo confrontare tutti gli iscritti alle form con gli immatricolati (per codice fiscale)
       //e ottenere info. diverse a seconda che siano immatricolati (media voti, CFU) o meno (solo info delle form)
       $both_subscribed = [];
       $form_subscribed = [];

       foreach ($Users as $iscrittoForms) {
           $pos = array_search(strtolower($iscrittoForms->getFiscalcode()),$fcsubscribed);
           //studente iscritto sia sulle form che su esse3, mergiare i dati (ricavando quelli necessari)
           if ($pos!==False) {
                //dati da esse3, se viene trovata una corrispondenza, $pos DOVREBBE essere valorizzata con
                //la posizione di tale corrispondenza, quindi dovrei essere in grado di accedere ai dati in questo modo:
                //      vettoreEsse3[posizioneMatch][attributoCheCerco]
                //  vero matte?
                $dati_iscritto = new bothIscritti();
                $dati_iscritto->CFSTUDENTE=$subscribed[$pos]['CFSTUDENTE'];
                $dati_iscritto->nome=$subscribed[$pos]['NOME'];
                $dati_iscritto->cognome=$subscribed[$pos]['COGNOME'];
                $dati_iscritto->corsoDiStudi=$subscribed[$pos]['NOMECDS'];
                $dati_iscritto->anno=$subscribed[$pos]['AAID'];
                $dati_iscritto->CFUCERTIFICATI=$subscribed[$pos]['CFUCERTIFICATI'];
                $dati_iscritto->mediaCertificata=$subscribed[$pos]['MEDIACERTIFICATA'];

                //Prendo i dati necessari dalle form
                $dati_iscritto->address=($iscrittoForms->getAddress());
                $dati_iscritto->cap=($iscrittoForms->getCap());
                $dati_iscritto->city=($iscrittoForms->getCity());
                $dati_iscritto->email=($iscrittoForms->getEmail());
                $dati_iscritto->phone=($iscrittoForms->getPhone());
                $dati_iscritto->birthDate=($iscrittoForms->getBirthDate());
                $dati_iscritto->birthPlace=($iscrittoForms->getBirthPlace());
                $dati_iscritto->attendedSchool=($iscrittoForms->getAttendedSchool());
                $dati_iscritto->hasAttendedToOtherActivities=($iscrittoForms->getHasAttendedToOtherActivities());
                $dati_iscritto->activity=($iscrittoForms->getAddress());
                $dati_iscritto->otherActivity=($iscrittoForms->getOtherActivity());
                $dati_iscritto->reference=($iscrittoForms->getReference());
                $dati_iscritto->otherReference=($iscrittoForms->getOtherReference());
                $dati_iscritto->unicamCourse=($iscrittoForms->getUnicamCourse());
                $dati_iscritto->submissionDate=($iscrittoForms->getSubmissionDate());
                //metto tutto nell'array degli iscritti
               array_push($both_subscribed, $dati_iscritto);
           }
           //altrimenti metto lo studente nel vettore degli iscritti solo alle form
           else{
            array_push($form_subscribed, $iscrittoForms);
           }
       }

        return $this->render('A4UFormBundle:Forms:reportPAE.html.twig', array(
            'both_subscribed' => $both_subscribed,
            'form_subscribed' => $form_subscribed));
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

    public function porte_aperte_inverno_editAction($id, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $pais = $em->getRepository('A4UFormBundle:PorteAperteInverno')->find($id);
        if (!$pais) {
          throw $this->createNotFoundException(
                  'No porte aperte inverno found for id ' . $id
          );
        }

        $context = array(
            'name' => $pais->getName(),
            'surname' => $pais->getSurname(),
            'fiscal_code' => $pais->getFiscalCode(),
            'cap' => $pais->getCap(),
            'city' => $pais->getCity(),
            'address' => $pais->getAddress(),
            'email' => $pais->getEmail(),
            'phone' => $pais->getPhone(),
            'birth_date' => $pais->getBirthDateAsString(),
            'birth_place' => $pais->getBirthPlace(),
            'has_attended_to_other_activities' => $pais->getHasAttendedToOtherActivitiesAsString(),
            'activity' => $pais->getActivity(), 
            'other_activity' => $pais->getOtherActivity(),
            'reference' => $pais->getReference(),
            'other_reference' => $pais->getOtherReference(),
            'unicam_course' => $pais->getUnicamCourse(),
            'attended_school' => $pais->getAttendedSchool()
        );
    
        $form = $this->createForm('porteAperteInverno', $pais);

        $form->handleRequest($request);

        //Form inviato, viene validato
        if ($form->isValid()) {

            //Salva il nuovo utente nella base dati
            $em = $this->getDoctrine()->getManager();
            $em->persist($pais);
            $em->flush();

            // Aggiunge un messaggio di successo alla homepage
            $this->get('session')->getFlashBag()->add(
                'notice', 'Utente modificato con successo!'
            );

            return $this->redirect($this->generateUrl('a4u_form_homepage'));
        }

        // Form non ancora inviato
        return $this->render('A4UFormBundle:Forms:porte_aperte_inverno_edit.html.twig', array(
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

    public function reportPAIAction()
    {
        $Users = $this->getDoctrine()
        ->getRepository('A4UFormBundle:PorteAperteInverno')
        ->findAll();

        if (!$Users)
        {
            return $this->render('A4UFormBundle:Exceptions:no_users_exception.html.twig');
        }
	   
       //ricavo il vettore degli iscritti a PAI che si sono immatricolati (array di oggetti!)
	   $subscribed = $this->matchEsse3Action('A4UFormBundle:PorteAperteInverno');
       
       //ricavo un vettore contenente solo i codici fiscali degli immatricolati per fare la ricerca
       $fcsubscribed = [];
       foreach ($subscribed as $key) {
        array_push($fcsubscribed, strtolower($key['CFSTUDENTE']));
       }

       //a questo punto devo confrontare tutti gli iscritti alle form con gli immatricolati (per codice fiscale)
       //e ottenere info. diverse a seconda che siano immatricolati (media voti, CFU) o meno (solo info delle form)
       $both_subscribed = [];
       $form_subscribed = [];

       foreach ($Users as $iscrittoForms) {
           $pos = array_search(strtolower($iscrittoForms->getFiscalcode()),$fcsubscribed);
           //studente iscritto sia sulle form che su esse3, mergiare i dati (ricavando quelli necessari)
           if ($pos!==False) {
                //dati da esse3, se viene trovata una corrispondenza, $pos DOVREBBE essere valorizzata con
                //la posizione di tale corrispondenza, quindi dovrei essere in grado di accedere ai dati in questo modo:
                //      vettoreEsse3[posizioneMatch][attributoCheCerco]
                //  vero matte?
                $dati_iscritto = new bothIscritti();
                $dati_iscritto->CFSTUDENTE=$subscribed[$pos]['CFSTUDENTE'];
                $dati_iscritto->nome=$subscribed[$pos]['NOME'];
                $dati_iscritto->cognome=$subscribed[$pos]['COGNOME'];
                $dati_iscritto->corsoDiStudi=$subscribed[$pos]['NOMECDS'];
                $dati_iscritto->anno=$subscribed[$pos]['AAID'];
                $dati_iscritto->CFUCERTIFICATI=$subscribed[$pos]['CFUCERTIFICATI'];
                $dati_iscritto->mediaCertificata=$subscribed[$pos]['MEDIACERTIFICATA'];

                //Prendo i dati necessari dalle form
                $dati_iscritto->address=($iscrittoForms->getAddress());
                $dati_iscritto->cap=($iscrittoForms->getCap());
                $dati_iscritto->city=($iscrittoForms->getCity());
                $dati_iscritto->email=($iscrittoForms->getEmail());
                $dati_iscritto->phone=($iscrittoForms->getPhone());
                $dati_iscritto->birthDate=($iscrittoForms->getBirthDate());
                $dati_iscritto->birthPlace=($iscrittoForms->getBirthPlace());
                $dati_iscritto->attendedSchool=($iscrittoForms->getAttendedSchool());
                $dati_iscritto->hasAttendedToOtherActivities=($iscrittoForms->getHasAttendedToOtherActivities());
                $dati_iscritto->activity=($iscrittoForms->getAddress());
                $dati_iscritto->otherActivity=($iscrittoForms->getOtherActivity());
                $dati_iscritto->reference=($iscrittoForms->getReference());
                $dati_iscritto->otherReference=($iscrittoForms->getOtherReference());
                $dati_iscritto->unicamCourse=($iscrittoForms->getUnicamCourse());
                $dati_iscritto->submissionDate=($iscrittoForms->getSubmissionDate());
                //metto tutto nell'array degli iscritti
               array_push($both_subscribed, $dati_iscritto);
           }
           //altrimenti metto lo studente nel vettore degli iscritti solo alle form
           else{
            array_push($form_subscribed, $iscrittoForms);
           }
       }

        return $this->render('A4UFormBundle:Forms:reportPAI.html.twig', array(
            'both_subscribed' => $both_subscribed,
	        'form_subscribed' => $form_subscribed));
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

    public function stage_editAction($id, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $stages = $em->getRepository('A4UFormBundle:Stage')->find($id);
        if (!$stages) {
          throw $this->createNotFoundException(
                  'No stage found for id ' . $id
          );
        }

        $context = array(
            'name' => $stages->getName(),
            'surname' => $stages->getSurname(),
            'fiscal_code' => $stages->getFiscalCode(),
            'cap' => $stages->getCap(),
            'city' => $stages->getCity(),
            'address' => $stages->getAddress(),
            'email' => $stages->getEmail(),
            'phone' => $stages->getPhone(),
            'birth_date' => $stages->getBirthDateAsString(),
            'birth_place' => $stages->getBirthPlace(),
        );
    
        $form = $this->createForm('stage', $stages);

        $form->handleRequest($request);

        //Form inviato, viene validato
        if ($form->isValid()) {

            //Salva il nuovo utente nella base dati
            $em = $this->getDoctrine()->getManager();
            $em->persist($pais);
            $em->flush();

            // Aggiunge un messaggio di successo alla homepage
            $this->get('session')->getFlashBag()->add(
                'notice', 'Utente modificato con successo!'
            );

            return $this->redirect($this->generateUrl('a4u_form_homepage'));
        }

        // Form non ancora inviato
        return $this->render('A4UFormBundle:Forms:stage_edit.html.twig', array(
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

    public function reportStageAction()
    {
        $Users = $this->getDoctrine()
        ->getRepository('A4UFormBundle:Stage')
        ->findAll();

        if (!$Users)
        {
            return $this->render('A4UFormBundle:Exceptions:no_users_exception.html.twig');
        }
       
       //ricavo il vettore degli iscritti a PAI che si sono immatricolati (array di oggetti!)
       $subscribed = $this->matchEsse3Action('A4UFormBundle:Stage');
       
       //ricavo un vettore contenente solo i codici fiscali degli immatricolati per fare la ricerca
       $fcsubscribed = [];
       $ncsubscribed = [];
       foreach ($subscribed as $key) {
           array_push($fcsubscribed, strtolower($key['CFSTUDENTE']));
           array_push($ncsubscribed, strtolower(($key['NOME'] . $key['COGNOME'])));
       }

       //a questo punto devo confrontare tutti gli iscritti alle form con gli immatricolati (per codice fiscale)
       //e ottenere info. diverse a seconda che siano immatricolati (media voti, CFU) o meno (solo info delle form)
       $both_subscribed = [];
       $form_subscribed = [];

       foreach ($Users as $iscrittoForms) {
           $posFC = array_search(strtolower($iscrittoForms->getFiscalcode()),$fcsubscribed);
           $posNC = array_search(strtolower($iscrittoForms->getName() . $iscrittoForms->getSurname()),$ncsubscribed);
           //studente iscritto sia sulle form che su esse3, mergiare i dati (ricavando quelli necessari)
           if ($posFC!==False || $posNC!==False) {
                //dati da esse3, se viene trovata una corrispondenza, $pos DOVREBBE essere valorizzata con
                //la posizione di tale corrispondenza, quindi dovrei essere in grado di accedere ai dati in questo modo:
                //      vettoreEsse3[posizioneMatch][attributoCheCerco]
                //  vero matte?
                $dati_iscritto = new bothIscritti();
                $dati_iscritto->CFSTUDENTE=$subscribed[($posFC!==False) ? $posFC : $posNC]['CFSTUDENTE'];
                $dati_iscritto->nome=$subscribed[($posFC!==False) ? $posFC : $posNC]['NOME'];
                $dati_iscritto->cognome=$subscribed[($posFC!==False) ? $posFC : $posNC]['COGNOME'];
                $dati_iscritto->corsoDiStudi=$subscribed[($posFC!==False) ? $posFC : $posNC]['NOMECDS'];
                $dati_iscritto->anno=$subscribed[($posFC!==False) ? $posFC : $posNC]['AAID'];
                $dati_iscritto->CFUCERTIFICATI=$subscribed[($posFC!==False) ? $posFC : $posNC]['CFUCERTIFICATI'];
                $dati_iscritto->mediaCertificata=$subscribed[($posFC!==False) ? $posFC : $posNC]['MEDIACERTIFICATA'];

                //Prendo i dati necessari dalle form
                $dati_iscritto->address=($iscrittoForms->getAddress());
                $dati_iscritto->cap=($iscrittoForms->getCap());
                $dati_iscritto->city=($iscrittoForms->getCity());
                $dati_iscritto->email=($iscrittoForms->getEmail());
                $dati_iscritto->phone=($iscrittoForms->getPhone());
                $dati_iscritto->birthDate=($iscrittoForms->getBirthDate());
                $dati_iscritto->birthPlace=($iscrittoForms->getBirthPlace());
                $dati_iscritto->attendedSchool=($iscrittoForms->getAttendedSchool());

                $dati_iscritto->schoolYear=($iscrittoForms->getSchoolYear());
                $dati_iscritto->facebookContact=($iscrittoForms->getFacebookContact());
                $dati_iscritto->stagePeriod=($iscrittoForms->getStagePeriod());
                $dati_iscritto->firstStudyField=($iscrittoForms->getFirstStudyField());
                $dati_iscritto->firstChoice=($iscrittoForms->getFirstChoice());
                $dati_iscritto->secondStudyField=($iscrittoForms->getSecondStudyField());
                $dati_iscritto->secondChoice=($iscrittoForms->getSecondChoice());
                $dati_iscritto->moneyPayed=($iscrittoForms->getMoneyPayed());

                $dati_iscritto->submissionDate=($iscrittoForms->getSubmissionDate());
                //metto tutto nell'array degli iscritti
               array_push($both_subscribed, $dati_iscritto);
           }
           //altrimenti metto lo studente nel vettore degli iscritti solo alle form
           else{
            array_push($form_subscribed, $iscrittoForms);
           }
       }

        return $this->render('A4UFormBundle:Forms:report_stage.html.twig', array(
            'both_subscribed' => $both_subscribed,
            'form_subscribed' => $form_subscribed));
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

    public function generico_editAction($id, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $genericos = $em->getRepository('A4UFormBundle:Generico')->find($id);
        if (!$genericos) {
          throw $this->createNotFoundException(
                  'No generico found for id ' . $id
          );
        }

        $context = array(
            'name' => $genericos->getName(),
            'surname' => $genericos->getSurname(),
            'fiscal_code' => $genericos->getFiscalCode(),
            'cap' => $genericos->getCap(),
            'city' => $genericos->getCity(),
            'address' => $genericos->getAddress(),
            'email' => $genericos->getEmail(),
            'phone' => $genericos->getPhone(),
            'birth_date' => $genericos->getBirthDateAsString(),
            'birth_place' => $genericos->getBirthPlace(),
        );
    
        $form = $this->createForm('generico', $genericos);

        $form->handleRequest($request);

        //Form inviato, viene validato
        if ($form->isValid()) {

            //Salva il nuovo utente nella base dati
            $em = $this->getDoctrine()->getManager();
            $em->persist($pais);
            $em->flush();

            // Aggiunge un messaggio di successo alla homepage
            $this->get('session')->getFlashBag()->add(
                'notice', 'Utente modificato con successo!'
            );

            return $this->redirect($this->generateUrl('a4u_form_homepage'));
        }

        // Form non ancora inviato
        return $this->render('A4UFormBundle:Forms:generico_edit.html.twig', array(
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

    public function reportGenericoAction()
    {
        $Users = $this->getDoctrine()
        ->getRepository('A4UFormBundle:Generico')
        ->findAll();

        if (!$Users)
        {
            return $this->render('A4UFormBundle:Exceptions:no_users_exception.html.twig');
        }
       
       //ricavo il vettore degli iscritti a PAI che si sono immatricolati (array di oggetti!)
       $subscribed = $this->matchEsse3Action('A4UFormBundle:Generico');
       
       //ricavo un vettore contenente solo i codici fiscali degli immatricolati per fare la ricerca
       $fcsubscribed = [];
       foreach ($subscribed as $key) {
        array_push($fcsubscribed, strtolower($key['CFSTUDENTE']));
       }

       //a questo punto devo confrontare tutti gli iscritti alle form con gli immatricolati (per codice fiscale)
       //e ottenere info. diverse a seconda che siano immatricolati (media voti, CFU) o meno (solo info delle form)
       $both_subscribed = [];
       $form_subscribed = [];

       foreach ($Users as $iscrittoForms) {
           $pos = array_search(strtolower($iscrittoForms->getFiscalcode()),$fcsubscribed);
           //studente iscritto sia sulle form che su esse3, mergiare i dati (ricavando quelli necessari)
           if ($pos!==False) {
                //dati da esse3, se viene trovata una corrispondenza, $pos DOVREBBE essere valorizzata con
                //la posizione di tale corrispondenza, quindi dovrei essere in grado di accedere ai dati in questo modo:
                //      vettoreEsse3[posizioneMatch][attributoCheCerco]
                //  vero matte?
                $dati_iscritto = new bothIscritti();
                $dati_iscritto->CFSTUDENTE=$subscribed[$pos]['CFSTUDENTE'];
                $dati_iscritto->nome=$subscribed[$pos]['NOME'];
                $dati_iscritto->cognome=$subscribed[$pos]['COGNOME'];
                $dati_iscritto->corsoDiStudi=$subscribed[$pos]['NOMECDS'];
                $dati_iscritto->anno=$subscribed[$pos]['AAID'];
                $dati_iscritto->CFUCERTIFICATI=$subscribed[$pos]['CFUCERTIFICATI'];
                $dati_iscritto->mediaCertificata=$subscribed[$pos]['MEDIACERTIFICATA'];

                //Prendo i dati necessari dalle form
                $dati_iscritto->address=($iscrittoForms->getAddress());
                $dati_iscritto->cap=($iscrittoForms->getCap());
                $dati_iscritto->city=($iscrittoForms->getCity());
                $dati_iscritto->email=($iscrittoForms->getEmail());
                $dati_iscritto->phone=($iscrittoForms->getPhone());
                $dati_iscritto->birthDate=($iscrittoForms->getBirthDate());
                $dati_iscritto->birthPlace=($iscrittoForms->getBirthPlace());

                $dati_iscritto->attendedActivity=($iscrittoForms->getAttendedActivity());

                $dati_iscritto->submissionDate=($iscrittoForms->getSubmissionDate());
                //metto tutto nell'array degli iscritti
               array_push($both_subscribed, $dati_iscritto);
           }
           //altrimenti metto lo studente nel vettore degli iscritti solo alle form
           else{
            array_push($form_subscribed, $iscrittoForms);
           }
       }

        return $this->render('A4UFormBundle:Forms:report_generico.html.twig', array(
            'both_subscribed' => $both_subscribed,
            'form_subscribed' => $form_subscribed));
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
            array_push($fciscritti, strtolower($item->getFiscalcode()));
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
                array_push($fciscritti, strtolower($item->getFiscalcode()));
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
                array_push($fciscritti, strtolower($item->getFiscalcode()));
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
                array_push($fciscritti, strtolower($item->getFiscalcode()));
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
           array_push($esse3_fc,strtolower($iscrittoEsse3['CFSTUDENTE']));
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










    public function reportCompletoAction()
    {
        $Users = $this->getDoctrine()
        ->getRepository('A4UFormBundle:Generico')
        ->findAll();

        if (!$Users)
        {
            return $this->render('A4UFormBundle:Exceptions:no_users_exception.html.twig');
        }




        //prendo i dati da una repository
        $repository = $this->getDoctrine()
        ->getRepository('A4UFormBundle:PorteAperteInverno')
        ->createQueryBuilder('u')
        ->getQuery();
        $pai = $repository->getResult();

        //pusho tutti i dati sul vettore
        foreach ($pai as $item) {
            array_push($iscritti, $item);
            array_push($fciscritti, strtolower($item->getFiscalcode()));
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
                array_push($fciscritti, strtolower($item->getFiscalcode()));
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
                array_push($fciscritti, strtolower($item->getFiscalcode()));
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
                array_push($fciscritti, strtolower($item->getFiscalcode()));
        }






       
       //ricavo il vettore degli iscritti a PAI che si sono immatricolati (array di oggetti!)
       $subscribed = $this->matchEsse3Action('A4UFormBundle:Generico');
       
       //ricavo un vettore contenente solo i codici fiscali degli immatricolati per fare la ricerca
       $fcsubscribed = [];
       $ncsubscribed = [];
       foreach ($subscribed as $key) {
           array_push($fcsubscribed, strtolower($key['CFSTUDENTE']));
           array_push($ncsubscribed, strtolower(($key['NOME'] . $key['COGNOME'])));
       }

       //a questo punto devo confrontare tutti gli iscritti alle form con gli immatricolati (per codice fiscale)
       //e ottenere info. diverse a seconda che siano immatricolati (media voti, CFU) o meno (solo info delle form)
       $both_subscribed = [];
       $form_subscribed = [];

       foreach ($Users as $iscrittoForms) {
           $posFC = array_search(strtolower($iscrittoForms->getFiscalcode()),$fcsubscribed);
           $posNC = array_search(strtolower($iscrittoForms->getName() . $iscrittoForms->getSurname()),$ncsubscribed);
           //studente iscritto sia sulle form che su esse3, mergiare i dati (ricavando quelli necessari)
           if ($posFC!==False || $posNC!==False) {
                //dati da esse3, se viene trovata una corrispondenza, $pos DOVREBBE essere valorizzata con
                //la posizione di tale corrispondenza, quindi dovrei essere in grado di accedere ai dati in questo modo:
                //      vettoreEsse3[posizioneMatch][attributoCheCerco]
                //  vero matte?
                $dati_iscritto = new bothIscritti();
                $dati_iscritto->CFSTUDENTE=$subscribed[($posFC!==False) ? $posFC : $posNC]['CFSTUDENTE'];
                $dati_iscritto->nome=$subscribed[($posFC!==False) ? $posFC : $posNC]['NOME'];
                $dati_iscritto->cognome=$subscribed[($posFC!==False) ? $posFC : $posNC]['COGNOME'];
                $dati_iscritto->corsoDiStudi=$subscribed[($posFC!==False) ? $posFC : $posNC]['NOMECDS'];
                $dati_iscritto->anno=$subscribed[($posFC!==False) ? $posFC : $posNC]['AAID'];
                $dati_iscritto->CFUCERTIFICATI=$subscribed[($posFC!==False) ? $posFC : $posNC]['CFUCERTIFICATI'];
                $dati_iscritto->mediaCertificata=$subscribed[($posFC!==False) ? $posFC : $posNC]['MEDIACERTIFICATA'];

                //Prendo i dati necessari dalle form
                $dati_iscritto->address=($iscrittoForms->getAddress());
                $dati_iscritto->cap=($iscrittoForms->getCap());
                $dati_iscritto->city=($iscrittoForms->getCity());
                $dati_iscritto->email=($iscrittoForms->getEmail());
                $dati_iscritto->phone=($iscrittoForms->getPhone());
                $dati_iscritto->birthDate=($iscrittoForms->getBirthDate());
                $dati_iscritto->birthPlace=($iscrittoForms->getBirthPlace());

                $dati_iscritto->attendedActivity=($iscrittoForms->getAttendedActivity());

                $dati_iscritto->submissionDate=($iscrittoForms->getSubmissionDate());
                //metto tutto nell'array degli iscritti
               array_push($both_subscribed, $dati_iscritto);
           }
           //altrimenti metto lo studente nel vettore degli iscritti solo alle form
           else{
            array_push($form_subscribed, $iscrittoForms);
           }
       }

        return $this->render('A4UFormBundle:Forms:report_generico.html.twig', array(
            'both_subscribed' => $both_subscribed,
            'form_subscribed' => $form_subscribed));
    }


// ---------------------------------------MATCH ESSE3--------------------------------------------
    
    public function matchEsse3Action($repository)
    {
    
        $repository = $this->getDoctrine()
        ->getRepository($repository)
        ->createQueryBuilder('u')
        ->getQuery();
        $iscritti = $repository->getResult();

       $db="(DESCRIPTION=
           (ADDRESS_LIST=
           (ADDRESS=(PROTOCOL=TCP)
               (HOST=oracle11.unicam.it)(PORT=1521)
           )
           )
           (CONNECT_DATA=(SID=UGOVPROD))
       )";
       $conn = OCILogon("esse3_unicam_prod_read","r34d3ss33",$db);

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
            if($key->getFiscalcode() !== null){
                $append="lower(CFSTUDENTE)='";
                $query=$query . $append . str_replace("'", "''", strtolower($key->getFiscalcode())) . "' OR ";
            } else {
                $append="(lower(NOME)='";
                $query=$query . $append . str_replace("'", "''", strtolower($key->getName())) . "' AND ";
                $append="lower(COGNOME)='";
                $query=$query . $append . str_replace("'", "''", strtolower($key->getSurname())) . "') OR ";
            }
        }

        $query = substr($query, 0, -3);
        $query=$query.")";

       echo($query);
       $statement = oci_parse($conn,$query);
       oci_execute($statement);

       $esse3_data = [];     //studenti iscritti su ESSE3

       //A questo punto su esse3_data ci sono tutti i dati delle persone iscritte alle attività e su esse3
       while ($row = oci_fetch_array($statement, OCI_ASSOC+OCI_RETURN_NULLS)) {
           array_push($esse3_data,$row);
       } 

       return $esse3_data;
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

        $query="select * from V_STAT_ANAGRAFICA where LOWER(COD_FIS)='".strtolower($fc)."'";//"DMNMHL94A06I324Q"

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

//contiene dati degli studenti immatricolati per la vista /admin/report
class reportIscritti{
    public $CFSTUDENTE;
    public $nome;
    public $cognome;
    public $corsoDiStudi;
    public $anno;
    public $CFUCERTIFICATI;
    public $mediaCertificata;

}
//contiene dati degli studenti NON immatricolati per la vista /admin/report
class reportNonIscritti{
    public $CFSTUDENTE;
    public $nome;
    public $cognome;
}


//contiene dati degli studenti immatricolati per la vista /admin/form/show*
class bothIscritti{
    //roba ESSE3
    public $CFSTUDENTE;
    public $nome;
    public $cognome;
    public $corsoDiStudi;
    public $anno;
    public $CFUCERTIFICATI;
    public $mediaCertificata;

    //roba forms(PAI e PAE)
    public $address;       
    public $cap;      
    public $city;          
    public $email;         
    public $phone;         
    public $birthDate;     
    public $birthPlace;    
    public $attendedSchool;
    public $hasAttendedToOtherActivities;  
    public $activity;      
    public $otherActivity; 
    public $reference;     
    public $otherReference;
    public $unicamCourse;   
    public $submissionDate;

    //roba stage
    public $schoolYear;
    public $facebookContact;
    public $stagePeriod;
    public $firstStudyField;
    public $firstChoice;
    public $secondStudyField;
    public $secondChoice;
    public $moneyPayed;

    //roba generico
    public $attendedActivity;


}

