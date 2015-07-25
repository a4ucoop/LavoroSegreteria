<?php
namespace A4U\FormBundle\Controller;
 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use A4U\FormBundle\Entity\PorteAperteEstate;
use A4U\FormBundle\Entity\OpenDay;
use A4U\FormBundle\Entity\PorteAperteInverno;
use A4U\FormBundle\Entity\Stage;
use A4U\FormBundle\Entity\Generico;

class ExportController extends Controller
{
    public function generateCsvPAEAction(){
        return $this->generateCsvAction('A4UFormBundle:PorteAperteEstate','PAE');
    }

    public function generateCsvReportPAEAction(){
        return $this->generateCsvReportAction('A4UFormBundle:PorteAperteEstate','PAEreport');
    }

    public function generateCsvPAIAction(){
        return $this->generateCsvAction('A4UFormBundle:PorteAperteInverno','PAI');
    }

    public function generateCsvReportPAIAction(){
        return $this->generateCsvReportAction('A4UFormBundle:PorteAperteInverno','PAIreport');
    }

    public function generateCsvStageAction(){
        return $this->generateCsvAction('A4UFormBundle:Stage','Stage');
    }

    public function generateCsvReportStageAction(){
        return $this->generateCsvReportAction('A4UFormBundle:Stage','StageReport');
    }

    public function generateCsvGenericoAction(){
        return $this->generateCsvAction('A4UFormBundle:Generico','Generico');
    }

    public function generateCsvReportGenericoAction(){
        return $this->generateCsvReportAction('A4UFormBundle:Generico','GenericoReport');
    }

    public function generateCsvOpendayAction(){
        return $this->generateCsvAction('A4UFormBundle:OpenDay','OpenDay');
    }

    public function generateCsvReportOpendayAction(){
        return $this->generateCsvReportAction('A4UFormBundle:OpenDay','OpenDayReport');
    }

    public function generateCsvAction($repository,$kind){
     
        $Users = $this->getDoctrine()
        ->getRepository($repository)
        ->findAll();
        
        ##$file = fopen('/tmp/export.csv', 'w+');
        ##fwrite($file, $csv);
        ##fclose($file);
        if ($kind == 'PAE')
            $response = $this->render('A4UFormBundle:Forms:exportPAE.csv.twig',array('data' => $Users));
        else if ($kind == 'PAI')
            $response = $this->render('A4UFormBundle:Forms:exportPAI.csv.twig',array('data' => $Users));
        else if ($kind == 'Stage')
            $response = $this->render('A4UFormBundle:Forms:exportStage.csv.twig',array('kind' => $kind, 'data' => $Users));
        else if ($kind == 'Generico')
            $response = $this->render('A4UFormBundle:Forms:exportGenerico.csv.twig',array('kind' => $kind, 'data' => $Users));
        else if ($kind == 'OpenDay')
            $response = $this->render('A4UFormBundle:Forms:exportOpenDay.csv.twig',array('kind' => $kind, 'data' => $Users));
        else
            $response = $this->render('A4UFormBundle:Forms:export.csv.twig',array('kind' => $kind, 'data' => $Users));

        $response->setStatusCode(200);
        #$response->headers->set('Content-type', 'application/force-download');
        #$response->headers->set('Content-type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-type', 'application/application/vnd.ms-excel');
        $response->headers->set('Content-Disposition','attachment; filename="export.xls"');
        $response->headers->set('Content-Transfer-Encoding', 'binary');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');
     
        return $response;
    }

    public function generateCsvReportAction($repository,$kind){
     
        $Users = $this->getDoctrine()
        ->getRepository($repository)
        ->findAll();
        $subscribed = $this->matchEsse3Action($repository);
       $fcsubscribed = [];
       $ncsubscribed = [];
       foreach ($subscribed as $key) {
           array_push($fcsubscribed, strtolower($key['CFSTUDENTE']));
           array_push($ncsubscribed, strtolower(($key['NOME'] . $key['COGNOME'])));
       }

        foreach ($Users as $iscrittoForms) {
           $posFC = array_search(strtolower($iscrittoForms->getFiscalcode()),$fcsubscribed);
           $posNC = array_search(strtolower($iscrittoForms->getName() . $iscrittoForms->getSurname()),$ncsubscribed);

           $NOME = $subscribed[($posFC!==False) ? $posFC : $posNC]['NOME'];
           $COGNOME = $subscribed[($posFC!==False) ? $posFC : $posNC]['COGNOME'];
           $CFSTUDENTE = $subscribed[($posFC!==False) ? $posFC : $posNC]['CFSTUDENTE'];

           if ($posFC!==False || $posNC!==False) {

                if($subscribed[($posFC!==False) ? $posFC : $posNC]['CFUCERTIFICATI'])
                    $CFU = 'N/A';
                else
                    $CFU = $subscribed[($posFC!==False) ? $posFC : $posNC]['CFUCERTIFICATI'];
                if($subscribed[($posFC!==False) ? $posFC : $posNC]['CFUCERTIFICATI'])
                    $MEDIA = 'N/A';
                else
                    $MEDIA = number_format($subscribed[($posFC!==False) ? $posFC : $posNC]['MEDIACERTIFICATA'],2,',','');

                $IMMATRICOLATO = 'Si';
                $NOME_CDS = $subscribed[($posFC!==False) ? $posFC : $posNC]['NOMECDS'];
                $ANNO = $subscribed[($posFC!==False) ? $posFC : $posNC]['AAID'];
           }
           else{

                $IMMATRICOLATO = 'No';
                $CFU = 'N/A';
                $MEDIA = 'N/A';
                $NOME_CDS = 'N/A';
                $ANNO = 'N/A';
           }
        }
       
        $values = array(
                'data' => $Users,
                'nome' => $NOME,
                'cognome' => $COGNOME,     
                'cfstudente' => $CFSTUDENTE,
                'immatricolato' => $IMMATRICOLATO,
                'cfu' => $CFU,
                'media' => $MEDIA,
                'nome_cds' => $NOME_CDS,
                'anno' => $ANNO
                );

        if ($kind == 'PAEreport') 
            $response = $this->render('A4UFormBundle:Forms:reportPAE.csv.twig', $values);
        else if ($kind == 'PAIreport') 
            $response = $this->render('A4UFormBundle:Forms:reportPAI.csv.twig', $values);
        else if ($kind == 'StageReport') 
            $response = $this->render('A4UFormBundle:Forms:reportStage.csv.twig', $values);
        else if ($kind == 'GenericoReport') 
            $response = $this->render('A4UFormBundle:Forms:reportGenerico.csv.twig', $values);
        else if ($kind == 'OpenDayReport') 
            $response = $this->render('A4UFormBundle:Forms:reportOpenDay.csv.twig', $values);

        $response->setStatusCode(200);
        $response->headers->set('Content-type', 'application/application/vnd.ms-excel');
        $response->headers->set('Content-Disposition','attachment; filename="export.xls"');
        $response->headers->set('Content-Transfer-Encoding', 'binary');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');
     
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
