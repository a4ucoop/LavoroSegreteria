<?php
namespace A4U\FormBundle\Controller;
 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use A4U\FormBundle\Entity\PorteAperteEstate;
use A4U\FormBundle\Entity\PorteAperteInverno;
use A4U\FormBundle\Entity\Stage;
use A4U\FormBundle\Entity\Generico;

use Symfony\Component\HttpFoundation\StreamedResponse;
//use Doctrine\DBAL\Connection;
 
class ExportController extends Controller
{

    public function generateCsvPAEAction(){
        return $this->generateCsvAction('A4UFormBundle:PorteAperteEstate','PAE',array('Nome','Cognome','Codice','Immatricolato','Corso di laurea (form)','Corso di laurea (ESSE3)','ANNO','CFU','MEDIA','Indirizzo','CAP','Città','Email','Tel.','Data di nascita','Luogo di nascita','Scuola di provenienza','Partecipato altre attività','Attività','Altra attività','Referenze','Altra referenza','data sottoscrizione'));
    }
    public function generateCsvPAIAction(){
        return $this->generateCsvAction('A4UFormBundle:PorteAperteInverno','PAI',array('Nome','Cognome','Codice','Immatricolato','Corso di laurea (form)','Corso di laurea (ESSE3)','ANNO','CFU','MEDIA','Indirizzo','CAP','Città','Email','Tel.','Data di nascita','Luogo di nascita','Scuola di provenienza','Partecipato altre attività','Attività','Altra attività','Referenze','Altra referenza','data sottoscrizione'));
    }

    public function generateCsvStageAction(){
        return $this->generateCsvAction('A4UFormBundle:Stage','Stage',array('Nome','Cognome','Codice Fiscale','Immatricolato','Campo di Studio prima scelta','Prima Scelta','Campo di Studio seconda scelta','Seconda Scelta','Corso di laurea (ESSE3)','ANNO','CFU','MEDIA','Indirizzo','CAP','Città','Email','Tel.','Data di nascita','Luogo di nascita','Scuola di provenienza','Anno Scolastico','Contatto Facebook','Periodo di Stage','Pagamento','data sottoscrizione'));

    }

    public function generateCsvGenericoAction(){
        return $this->generateCsvAction('A4UFormBundle:Generico','Generico',array('Nome','Cognome','Codice Fiscale','Immatricolato','Attività frequentata','Corso di laurea (ESSE3)','ANNO','CFU','MEDIA','Indirizzo','CAP','Città','Email','Tel.','Data di nascita','Luogo di nascita','data sottoscrizione'));

    }

    public function generateCsvAction($repository,$kind,$headers){
     
        $Users = $this->getDoctrine()
        ->getRepository($repository)
        ->findAll();
        $subscribed = $this->matchEsse3Action($repository);
        $fcsubscribed = [];
        foreach ($subscribed as $key) {
            array_push($fcsubscribed, strtolower($key['CFSTUDENTE']));
        }

        $handle = fopen('php://output', 'w+');
 
        fputcsv($handle,$headers,';');

        foreach ($Users as $iscrittoForms) {
           $pos = array_search(strtolower($iscrittoForms->getFiscalcode()),$fcsubscribed);
           if ($pos!==False) {

                if($subscribed[$pos]['CFUCERTIFICATI'])
                    $CFU = 'N/A';
                else
                    $CFU = $subscribed[$pos]['CFUCERTIFICATI'];
                if($subscribed[$pos]['CFUCERTIFICATI'])
                    $MEDIA = 'N/A';
                else
                    $MEDIA = number_format($subscribed[$pos]['MEDIACERTIFICATA'],2,',','');

                if($kind == "PAE" || $kind == "PAI")
                    $values = array($subscribed[$pos]['NOME'],$subscribed[$pos]['COGNOME'],$subscribed[$pos]['CFSTUDENTE'],'Si',$iscrittoForms->getUnicamCourse(),$subscribed[$pos]['NOMECDS'],$subscribed[$pos]['AAID'],$CFU,$MEDIA,$iscrittoForms->getAddress(),$iscrittoForms->getCap(),$iscrittoForms->getCity(),$iscrittoForms->getEmail(),$iscrittoForms->getPhone(),$iscrittoForms->getBirthDateAsString(),$iscrittoForms->getBirthPlace(),$iscrittoForms->getAttendedSchool(),$iscrittoForms->getHasAttendedToOtherActivitiesAsString(),$iscrittoForms->getActivity(),$iscrittoForms->getOtherActivity(),$iscrittoForms->getReference(),$iscrittoForms->getOtherReference(),$iscrittoForms->getSubmissionDateAsString(),';');
                else if($kind == "Stage")
                    $values = array($subscribed[$pos]['NOME'],$subscribed[$pos]['COGNOME'],$subscribed[$pos]['CFSTUDENTE'],'Si',$iscrittoForms->getFirstStudyField(),$iscrittoForms->firstChoice(),$iscrittoForms->getSecondStudyField(),$iscrittoForms->secondChoice(),$subscribed[$pos]['NOMECDS'],$subscribed[$pos]['AAID'],$CFU,$MEDIA,$iscrittoForms->getAddress(),$iscrittoForms->getCap(),$iscrittoForms->getCity(),$iscrittoForms->getEmail(),$iscrittoForms->getPhone(),$iscrittoForms->getBirthDateAsString(),$iscrittoForms->getBirthPlace(),$iscrittoForms->getAttendedSchool(),$iscrittoForms->getSchoolYear(),$iscrittoForms->getFacebookContact(),$iscrittoForms->getStagePeriod(),$iscrittoForms->getMoneyPayed(),$iscrittoForms->getSubmissionDateAsString(),';');
                else if($kind == "Generico")
                    $values = array($subscribed[$pos]['NOME'],$subscribed[$pos]['COGNOME'],$subscribed[$pos]['CFSTUDENTE'],'Si',$iscrittoForms->getAttendedActivity(),$subscribed[$pos]['NOMECDS'],$subscribed[$pos]['AAID'],$CFU,$MEDIA,$iscrittoForms->getAddress(),$iscrittoForms->getCap(),$iscrittoForms->getCity(),$iscrittoForms->getEmail(),$iscrittoForms->getPhone(),$iscrittoForms->getBirthDateAsString(),$iscrittoForms->getBirthPlace(),$iscrittoForms->getSubmissionDateAsString(),';');

                fputcsv($handle,$values);
           }
           else{

                if($kind == "PAE" || $kind == "PAI")
                    $values = array($subscribed[$pos]['NOME'],$subscribed[$pos]['COGNOME'],$subscribed[$pos]['CFSTUDENTE'],'No',$iscrittoForms->getUnicamCourse(),'N/A','N/A','N/A','N/A',$iscrittoForms->getAddress(),$iscrittoForms->getCap(),$iscrittoForms->getCity(),$iscrittoForms->getEmail(),$iscrittoForms->getPhone(),$iscrittoForms->getBirthDateAsString(),$iscrittoForms->getBirthPlace(),$iscrittoForms->getAttendedSchool(),$iscrittoForms->getHasAttendedToOtherActivitiesAsString(),$iscrittoForms->getActivity(),$iscrittoForms->getOtherActivity(),$iscrittoForms->getReference(),$iscrittoForms->getOtherReference(),$iscrittoForms->getSubmissionDateAsString(),';');
                else if($kind == "Stage")
                    $values = array($subscribed[$pos]['NOME'],$subscribed[$pos]['COGNOME'],$subscribed[$pos]['CFSTUDENTE'],'No',$iscrittoForms->getFirstStudyField(),$iscrittoForms->firstChoice(),$iscrittoForms->getSecondStudyField(),$iscrittoForms->secondChoice(),'N/A','N/A','N/A','N/A',$iscrittoForms->getAddress(),$iscrittoForms->getCap(),$iscrittoForms->getCity(),$iscrittoForms->getEmail(),$iscrittoForms->getPhone(),$iscrittoForms->getBirthDateAsString(),$iscrittoForms->getBirthPlace(),$iscrittoForms->getAttendedSchool(),$iscrittoForms->getSchoolYear(),$iscrittoForms->getFacebookContact(),$iscrittoForms->getStagePeriod(),$iscrittoForms->getMoneyPayed(),$iscrittoForms->getSubmissionDateAsString(),';');
                else if($kind == "Generico")
                    $values = array($subscribed[$pos]['NOME'],$subscribed[$pos]['COGNOME'],$subscribed[$pos]['CFSTUDENTE'],'No',$iscrittoForms->getAttendedActivity(),'N/A','N/A','N/A','N/A',$iscrittoForms->getAddress(),$iscrittoForms->getCap(),$iscrittoForms->getCity(),$iscrittoForms->getEmail(),$iscrittoForms->getPhone(),$iscrittoForms->getBirthDateAsString(),$iscrittoForms->getBirthPlace(),$iscrittoForms->getSubmissionDateAsString(),';');

                fputcsv($handle,$values);
           }
        }

        $csv = stream_get_contents($handle);
 
        fclose($handle);

        $response = new Response($csv);        

        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
        $response->headers->set('Content-Disposition','attachment; filename="export.csv"');
     
        return $response;
    }
 
    public function matchEsse3Action($repository)
    {
    
        $repository = $this->getDoctrine()
        ->getRepository($repository)
        ->createQueryBuilder('u')
        ->getQuery();
        $iscritti = $repository->getResult();

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
            $query=$query . $append . strtolower($key->getFiscalcode()) . "' OR ";
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

       return $esse3_data;
    }

}
