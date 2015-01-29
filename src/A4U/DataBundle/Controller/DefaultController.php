<?php

namespace A4U\DataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('A4UDataBundle:Default:index.html.twig', array('name' => $name));
    }
}
