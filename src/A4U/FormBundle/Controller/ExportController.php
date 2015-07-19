<?php
namespace A4U\FormBundle\Controller;
 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use A4U\FormBundle\Entity\PorteAperteEstate;
use A4U\FormBundle\Entity\OpenDay;

use Symfony\Component\HttpFoundation\StreamedResponse;
 
class ExportController extends Controller
{
    public function generateCsvPAEAction(){
        return $this->generateCsvAction('A4UFormBundle:PorteAperteEstate','PAE',array('Nome','Cognome','Indirizzo','CAP','Città','Email','Tel.','Data di nascita','Luogo di nascita','Scuola di provenienza','Partecipato altre attività','Attività','Altra attività','Referenze','Altra referenza','Corso di laurea','Codice Fiscale','Data di visita'));
    }

    public function generateCsvOpendayAction(){
        return $this->generateCsvAction('A4UFormBundle:OpenDay','OpenDay',array('Nome','Cognome','Indirizzo','CAP','Città','Email','Tel.','Data di nascita','Luogo di nascita','Corso','Attività frequentata','Codice Fiscale'));

    }

    public function generateCsvAction($repository,$kind,$headers){
     
        $Users = $this->getDoctrine()
        ->getRepository($repository)
        ->findAll();

        $handle = fopen('php://output', 'w+');
 
        //fputcsv($handle,$headers,';');
        fputcsv($handle,$headers);

        foreach ($Users as $iscrittoForms) {

            if($kind == "PAE" || $kind == "PAI")
                $values = array($iscrittoForms->getName(),$iscrittoForms->getSurname(),$iscrittoForms->getAddress(),$iscrittoForms->getCap(),$iscrittoForms->getCity(),$iscrittoForms->getEmail(),$iscrittoForms->getPhone(),$iscrittoForms->getBirthDateAsString(),$iscrittoForms->getBirthPlace(),$iscrittoForms->getAttendedSchool(),$iscrittoForms->getHasAttendedToOtherActivitiesAsString(),$iscrittoForms->getActivity(),$iscrittoForms->getOtherActivity(),$iscrittoForms->getReference(),$iscrittoForms->getOtherReference(),$iscrittoForms->getUnicamCourse(),$iscrittoForms->getFiscalcode(),$iscrittoForms->getReservationDateAsString(),';');
            else if($kind == "OpenDay")
                $values = array($iscrittoForms->getName(),$iscrittoForms->getSurname(),$iscrittoForms->getAddress(),$iscrittoForms->getCap(),$iscrittoForms->getCity(),$iscrittoForms->getEmail(),$iscrittoForms->getPhone(),$iscrittoForms->getBirthDateAsString(),$iscrittoForms->getBirthPlace(),$iscrittoForms->getAttendedSchool(),$iscrittoForms->getAttendedActivity(),$iscrittoForms->getFiscalcode(),';');

            fputcsv($handle,$values);
       }

        $csv = stream_get_contents($handle);

        fclose($handle);

        $response = new Response($csv);        

        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
        $response->headers->set('Content-Disposition','attachment; filename="export.csv"');
     
        return $response;
    }
}
