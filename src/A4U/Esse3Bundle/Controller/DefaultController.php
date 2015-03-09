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
        $data = oci_parse($conn,"select COD_FIS from V_STAT_ANAGRAFICA");
        oci_execute($data);

        $repository = $this->getDoctrine()
                ->getRepository('A4UFormBundle:PorteAperteInverno')
                ->createQueryBuilder('u')
                ->getQuery();
        $pai = $repository->getResult();


        $subscribed = [];
        $not_subscribed = [];
        $found = False;

        foreach ($pai as $item) {

            while ($row = oci_fetch_array($data, OCI_ASSOC+OCI_RETURN_NULLS)) {
                if (strtolower($row['COD_FIS']) == strtolower($item->getFiscalcode())) {
                    $found = True;
                    break;
                }
            } 

            if ($found){
                array_push($subscribed,$item);
            } else {
                array_push($not_subscribed,$item);
            }
            $found = False;

        }

        return $this->render('A4UEsse3Bundle:Default:show_esse3.html.twig', array(
            'subscribed' => $subscribed,
            'not_subscribed' => $not_subscribed));
    }
}
