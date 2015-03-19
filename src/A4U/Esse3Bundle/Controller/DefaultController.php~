<?php

namespace A4U\Esse3Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use A4U\FormBundle\Entity\PorteAperteInverno;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('A4UEsse3Bundle:Default:index.html.twig', array('name' => $name));
    }

    public function show_esse3Action()
    {
        #$conn = $this->get('doctrine.dbal.esse3_connection');
        #$pdo->exec("CREATE TABLE IF NOT EXISTS messages (id INTEGER PRIMARY KEY, title TEXT, message TEXT)");
        #$pdo->exec("INSERT INTO messages(id, title, message) VALUES (1, 'title', 'message')");

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
                ->getRepository('A4UFormBundle:PorteAperteInverno')
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
                array_push($subscribed,$item);
            } else {
                array_push($not_subscribed,$item);
            }

        }

        return $this->render('A4UEsse3Bundle:Default:show_esse3.html.twig', array(
            'subscribed' => $subscribed,
            'not_subscribed' => $not_subscribed));
    }
}
