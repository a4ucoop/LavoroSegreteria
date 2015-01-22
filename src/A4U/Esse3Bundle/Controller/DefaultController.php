<?php

namespace A4U\Esse3Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('A4UEsse3Bundle:Default:index.html.twig', array('name' => $name));
    }

    public function show_esse3Action()
    {
        $conn = $this->get('doctrine.dbal.esse3_connection');
        #$pdo->exec("CREATE TABLE IF NOT EXISTS messages (id INTEGER PRIMARY KEY, title TEXT, message TEXT)");
        #$pdo->exec("INSERT INTO messages(id, title, message) VALUES (1, 'title', 'message')");
        $Data = $conn->fetchAll("select TABLE_NAME, OWNER from SYS.ALL_TABLES where TABLE_NAME like '%TIRO%' order by OWNER, TABLE_NAME;");
        
        if (!$Data)
        {
            throw $this->createNotFoundException('Nessun utente trovato');
        }

        return $this->render('A4UEsse3Bundle:Default:show_esse3.html.twig', array(
            'data' => $Data));
    }
}
