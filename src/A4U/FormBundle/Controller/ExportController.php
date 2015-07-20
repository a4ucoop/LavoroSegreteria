<?php
namespace A4U\FormBundle\Controller;
 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use A4U\FormBundle\Entity\PorteAperteEstate;
use A4U\FormBundle\Entity\OpenDay;

class ExportController extends Controller
{
    public function generateCsvPAEAction(){
        return $this->generateCsvAction('A4UFormBundle:PorteAperteEstate','PAE',"Nome,Cognome,Indirizzo,CAP,Città,Email,Tel.,Data di nascita,Luogo di nascita,Scuola di provenienza,Partecipato altre attività,Attività,Altra attività,Referenze,Altra referenza,Corso di laurea,Codice Fiscale,Data di visita;");
    }

    public function generateCsvOpendayAction(){
        return $this->generateCsvAction('A4UFormBundle:OpenDay','OpenDay',"Nome,Cognome,Indirizzo,CAP,Città,Email,Tel.,Data di nascita,Luogo di nascita,Corso,Attività frequentata,Codice Fiscale;");

    }

    public function generateCsvAction($repository,$kind,$headers){
     
        $Users = $this->getDoctrine()
        ->getRepository($repository)
        ->findAll();
        
        ##$file = fopen('/tmp/export.csv', 'w+');
        ##fwrite($file, $csv);
        ##fclose($file);
        $response = $this->render('A4UFormBundle:Forms:export.csv.twig',array('kind' => $kind, 'headers' => $headers, 'data' => $Users));

        $response->setStatusCode(200);
        $response->headers->set('Content-type', 'application/force-download');
        $response->headers->set('Content-Disposition','attachment; filename="export.ods"');
        $response->headers->set('Content-Transfer-Encoding', 'binary');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');
     
        return $response;
    }
}
